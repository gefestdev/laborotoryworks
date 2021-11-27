<?php
    $workname = filter_var(trim($_POST['inputtitle']), FILTER_SANITIZE_STRING);
    $lastdate = filter_var(trim($_POST['lastdate']), FILTER_SANITIZE_STRING);
    $file = basename($_FILES['fileupload']['name']);
    $uploadpath = '/domains/laborotoryworks/files/'.$file;
    if (move_uploaded_file($_FILES['fileupload']['tmp_name'], $uploadpath)) {
        $mysql = new mysqli('localhost', 'mysql', '', 'labworks');
        $mysql->query("SELECT * FROM `works`");
        $mysql->query("INSERT INTO `works` (`work_name`, `deadline`, `file`,`path`)
        VALUES ('$workname', '$lastdate', '$file','$uploadpath')");
        $mysql->close();
        header('Location: /php/user.php');
    }
    else{
        echo "Ошибка";
    }
?>