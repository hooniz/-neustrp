<?php

class authModel extends Model
{
    public function doAuth($params)
    {
        $phone = htmlspecialchars($params['phone']);
        $password = htmlspecialchars($params['password']);

        if($result = self::getUserByPhone($phone))
        {
            $inputPassword = md5($password . $result[0]['salt']);
            if($inputPassword == $result[0]['password'])
            {
                $_SESSION['USER'] = [
                    'PHONE' => $phone
                ];
                return false;
            }else
            {
                return 'Неправильный пароль!';
            }
        }else
        {
            return 'Такого пользователя нет!';
        }
    }

    public function lgout()
    {
        unset($_SESSION['USER']);
        header('Location: /auth/index');
    }
}