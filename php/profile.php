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
    <?php
        if($_COOKIE['user'] == ''):
            header('Location: /');
        endif;
    ?>
    <header class="header">
        <div class="search">
            <img src="/img/search.svg" alt="" class="search__image">
            <input type="text" placeholder="Найдите работу" class="search__input">
            <button class="search__btn">ОК</button>
        </div>
        <?php
            if($_COOKIE['rank'] == "Преподаватель"){
                $icon = '/img/icon_teacher.svg';
            }
            else{
                $icon = '/img/icon_student.svg';
            }
        ?>
        <div class="login">
            <a href="/php/user.php" class="login__inner">
                <img src="<?=$icon?>" alt="" class="user__img">
                <div class="user__info">
                    <h1 class="user__rank"><?=$_COOKIE['rank']?></h1>
                    <h2 class="user__name"><?=$_COOKIE['name']?> <?=$_COOKIE['surname']?></h2>
                </div>
            </a>
            <a href="/php/exit.php"><img src="/img/exit.svg" alt="" class="exit"></a>
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
            <button class="laborotory__send-docs"><span class="material-icons-outlined">move_to_inbox</span>Отправить</button>
        </div>
        <?php }
            $mysql->close();
        ?>
    </div>
</body>
</html>