<?php
    $mysql = new mysqli('localhost', 'mysql', '', 'labworks');
    $mysql->query("SELECT * FROM `complete_work`");
    $id = $_GET['id'];
    $mysql->query("DELETE FROM `complete_work` WHERE `id` = $id");
    $mysql->close();
?>