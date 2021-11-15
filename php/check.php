<?php
    $login = filter_var(trim($_POST['login_acc']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password_acc']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost', 'mysql', '', 'labworks');
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    $user = $result->fetch_assoc();

    if(count($user) == 0){
        echo "Такой пользователь не найден или пароль не верен";
        exit();
    }

    setcookie('user', $user['login'], time() + 3600, "/");
    setcookie('rank', $user['rank'], time() + 3600, "/");
    setcookie('name', $user['Name'], time() + 3600, "/");
    setcookie('surname', $user['Surname'], time() + 3600, "/");
    $mysql->close();
    header('Location: /php/profile.php');
?>