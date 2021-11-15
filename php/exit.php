<?php
    setcookie('user', $user['user'], time() - 3600, "/");
    setcookie('rank', $user['rank'], time() - 3600, "/");
    setcookie('name', $user['name'], time() - 3600, "/");
    setcookie('surname', $user['surname'], time() - 3600, "/");
    header('Location: /');
?>