<?php

class regModel extends Model
{
    public function doRegistration($params)
    {
        $phone = htmlspecialchars($params['phone']);
        $names = htmlspecialchars($params['names']);
        $password = htmlspecialchars($params['password']);
        $repeatPassword = htmlspecialchars($params['repeatPassword']);

        if(!self::getUserByPhone($phone))
        {
            if($password == $repeatPassword)
            {
                if(self::passwordLengthCheck($password))
                {
                    $names = self::prepareNames($names);
                    if($names)
                    {
                        $salt = uniqid();
                        $password .= $salt;
                        $password = md5($password);
                        $regDate = date('Y-m-d H:i:s');
                        $sql = "INSERT INTO users(`phone`, `name`, `surname`, `lastname`, `registerDate`, `password`, `salt`) VALUES(:phone , :name , :surname , :lastname , :registerdate , :password, :salt)";
                        self::exec($sql, [$phone, $names[0], $names[1], $names[2], $regDate, $password, $salt]);
                        return false;
                    }else
                    {
                        return 'Некорректный ФИО';
                    }
                }else
                {
                    return 'Слишком легкий пароль!';
                }
            }else
            {
                return 'Пароли не совпадают';
            }
        }else
        {
            return 'Пользователь с таким телефоном уже есть!';
        }
    }

    public function prepareNames($names)
    {
        $names = explode(' ', $names);
        foreach($names as $name)
        {
            if($name == '')
            {
                return false;
            }
        }
        return $names;
    }

    public function passwordLengthCheck($password)
    {
        if(preg_match_all('/[!@#$%^&*()_+=?\/.,]+/', $password) AND mb_strlen($password) > 6)
        {
            return true;
        }
        return false;
    }
}