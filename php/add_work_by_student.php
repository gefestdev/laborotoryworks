<?php
    $describe = filter_var(trim($_POST['inputtitle']), FILTER_SANITIZE_STRING);
    $id_work = filter_var(trim($_POST['id_work']), FILTER_SANITIZE_STRING);
    $name_student = $_COOKIE['name'] ." ". $_COOKIE['surname'];
    $status = "Оценивается";
    $date = date("Y.m.d");
    echo $name_student ." ". $describe ." ". $id_work;
    $file = basename($_FILES['fileupload']['name']);
    $uploadpath = '/domains/laborotoryworks/files/'.$file;
    if (move_uploaded_file($_FILES['fileupload']['tmp_name'], $uploadpath)) {
        $mysql = new mysqli('localhost', 'mysql', '', 'labworks');
        $mysql->query("SELECT * FROM `complete_work`");
        $mysql->query("INSERT INTO `complete_work` (`name_student`,`comment`, `id_comp_work`, `date`, `status`,`file`, `path`)
        VALUES ('$name_student', '$describe', '$id_work', '$date', '$status', '$file', '$uploadpath')");
        $mysql->close();
        header('Location: /php/profile.php');
    }
    else{
        echo "Ошибка";
    }
?>