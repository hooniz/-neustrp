<?php

class Router
{
    static public function route()
    {
        $route = explode("/",$_SERVER['REQUEST_URI']);
        if($route[1] != null)
        {
            $controllerClassName = $route[1];
        }else
        {
            $controllerClassName = "main";
        }

        if($route[2] != null)
        {
            $actionName = $route[2];
        }else
        {
            $actionName = "index";
        }

        $controllerName = "{$controllerClassName}Controller";
        $modelName = "{$controllerClassName}Model";

        $controllerPath = "controller/{$controllerName}.php";
        $modelPath = "model/{$modelName}.php";

        try
        {
            if(file_exists($controllerPath))
            {
                require_once $controllerPath;
            }else
            {
                throw new Exception("{$controllerPath} dont exists", 1);
            }
        }catch(Exception $e)
        {
            echo $e->getMessage();
            /*self::notFound404($e->getMessage());*/
        }

        try
        {
            if(file_exists($modelPath))
            {
                require_once $modelPath;
            }else
            {
                throw new Exception("{$modelPath} dont exists", 1);
            }
        }catch(Exception $e)
        {
            echo $e->getMessage();
            /*self::notFound404($e->getMessage());*/
        }

        $controller = new $controllerName();

        try
        {
            if(method_exists($controller, $actionName))
            {
                $controller->$actionName();
            }else
            {
                throw new Exception("Method not exists", 1);
            }
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    static public function notFound404($message)
    {

    }
}