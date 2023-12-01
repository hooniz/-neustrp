<?php

class View
{
    public function generate($viewName, $data = null)
    {
        require_once "view/templates/header.php";
        require_once "view/{$viewName}.php";
        require_once "view/templates/footer.php";
    }
}