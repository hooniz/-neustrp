<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Фондовая биржа - NYSE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/includes/magnific_popup/jquery.magnific-popup.min.js"></script>
    <script src="/js/index.js?<?=time()?>"></script>
    <link rel="stylesheet" href="/includes/magnific_popup/magnific-popup.css" />
    <link rel="stylesheet" href="/css/index.css" />
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-4">
                    <span class="sr-only">Меню</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">NYSE</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-4">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/myActions/index">Мои акции</a></li>
                    <li><a href="/buyActions/index">Купить акции</a></li>
                    <?if(isset($data['USER'])):?>
                    <li>
                        <a class="btn btn-default btn-outline btn-circle" data-toggle="collapse" href="#nav-collapse4" aria-expanded="false" aria-controls="nav-collapse4">Профиль<i class=""></i> </a>
                    </li>
                    <?endif;?>
                </ul>
                <ul class="collapse nav navbar-nav nav-collapse" role="search" id="nav-collapse4">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$data['USER']['phone']?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#profile" class="show-popup">Мой профиль</a></li>
                            <li class="divider"></li>
                            <li><a href="/auth/lgout">Выйти</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--popup layout-->
<div id="profile" class="mfp-hide" style="position: relative;background: #FFF;padding: 25px;max-width: 400px;margin: 0 auto;">
    <div class="container" style="display:flex; flex-direction: column; padding: 5px">
        <div class="container" style="display:flex; flex-direction: row; padding: 0">
            <img src="/upload/test.jpg" style="width: 50px; height: 50px; border-radius: 10px">
            <div class="container" style="display: flex; flex-direction: column">
                <p style="margin: 0"><?=$data['USER']['surname']?></p>
                <p style="margin-top: 7px"><?=$data['USER']['name']?></p>
            </div>
        </div>
        <p>Дата регистрации <?=$data['USER']['registerDate']?></p>
        <div class="container" style="display: flex; flex-direction: row; align-items: center; padding: 0">
            <p style="margin: 0px">Ваш статус - <?=$data['USER']['statusName']?></p>
            <div style="background-color: <?=$data['USER']['color']?>; width: 15px; height: 15px; border-radius: 15px; margin-left: 2px">

            </div>
        </div>
    </div>
</div>