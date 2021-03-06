<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/popup.js"></script>
    <title>Laborotory Work</title>
</head>
<body>
    <header class="header">
        <div class="search">
            <img src="/img/search.svg" alt="" class="search__image">
            <input type="text" placeholder="Найдите работу" class="search__input">
            <button class="search__btn">ОК</button>
        </div>
        <div class="login">
            <button class="login__btn" onclick="OpenPopup_Login()">Вход</button>
        </div>
    </header>
    <div class="container">
        <?php
            $mysql = new mysqli('localhost', 'mysql', '', 'labworks');
            $result = $mysql->query("SELECT * FROM `works`");
            while ($works_his = $result->fetch_assoc()){
                $real_path = $works_his['path'];
                $real_path = str_replace('/domains/laborotoryworks', '', $real_path);
        ?>
        <div class="laborotory">
            <img src="/img/science_chemistry_lab_laboratory_experiment_icon_124722 7.png" alt="" class="lab__image">
            <h1 class="laborotory__text"><?=$works_his['work_name']?></h1>
            <h1 class="laborotory__text light__font">СДАТЬ ДО <?=$works_his['deadline']?></h1>
            <a href="<?=$real_path?>" class="laborotory__link-downloader">
                <img src="/img/googledocs.svg" alt="" class="laborotory__img-docs">
            </a>
            <button id="workID(<?=$works_his['id']?>)" class="laborotory__send-docs"><span class="material-icons-outlined">move_to_inbox</span>Отправить</button>
        </div>
        <?php }
            $mysql->close();
        ?>
    </div>
    <div class="popup__bg">
        <div class="popup">
            <a href="#" onclick="ClosePopup_Login()" class="close__popup-link">
                <span class="material-icons-outlined close__popup">arrow_back</span>
            </a>
            <h1 class="popup__top-text">Вход</h1>
            <form action="/php/check.php" method="POST">
                <div class="popup__input-inner">
                    <div class="head__login">
                        <span class="material-icons-outlined head__icon">face</span>
                    </div>
                    <input type="text" class="input__login" placeholder="Введите логин" name="login_acc" id="login_acc">
                </div>
                <div class="popup__input-inner">
                    <div class="head__login">
                        <span class="material-icons-outlined head__icon">lock</span>
                    </div>
                    <input type="password" class="input__login" placeholder="Введите пароль" name="password_acc" id="password_acc">
                </div>
                <button class="input__login-btn" type="submit">Войти</button>
            </form>
        </div>
    </div>
</body>
</html>