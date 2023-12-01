<?php

class Model
{
    protected $pdo;

    public function __construct()
    {
        self::getPdo();
    }

    public function getPdo()
    {
        //Получим конфигурацию подключения к БД
        $config = require_once "vendor/configs/config.php";

        //Сформируем строку DSN
        $dsn = "{$config['PDO']['driver']}:host={$config['PDO']['host']};dbname={$config['PDO']['dbName']};charset={$config['PDO']['charset']}";

        //Передаем настройки подключения.
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        //Подключаемся к БД
        $this->pdo = new PDO($dsn, $config['PDO']['dbUser'], $config['PDO']['dbPassword'], $opt);
    }

    public function exec($sql, array $params = null)
    {
        $preparedParams = [];
        if($params)
        {
            $preparedParams = self::sqlPrepare($sql, $params);
        }
        $stmt = $this->pdo->prepare($sql);
        if(empty($preparedParams))
        {
            $stmt->execute();
        }else
        {
            $stmt->execute($preparedParams);
        }
        $result = [];
        while($iterator = $stmt->fetch())
        {
            array_walk($iterator, function($item, $key) use (&$iterator){
                $iterator[$key]  = htmlspecialchars($item);
            });
            $result[] = $iterator;
        }
        return $result;
    }

    public function sqlPrepare($sql, $params)
    {
        $prParams = [];
        preg_match_all('/:([a-zA-Z0-9_]+)/u', $sql, $matches);
        foreach($matches[1] as $key => $placeholder)
        {
            $prParams[$placeholder] = $params[$key];
        }
        return $prParams;
    }

    public function getUserByPhone($phone)
    {
        $sql = "SELECT us.name,
                        us.surname,
                        us.lastname,
                        us.registerDate,
                        us.phone,
                        us.avatarPath,  
                        us.salt,
       					us.id,
                        us.password,
                        st.name as 'statusName',
                        st.color
                FROM users us JOIN statuses st ON us.statuses_id = st.id WHERE `phone` = :phone";
        return self::exec($sql, [$phone]);
    }

    public function getUserInfo()
    {
        $result = self::getUserByPhone($_SESSION['USER']['PHONE'])[0];
        return $result;
    }
}