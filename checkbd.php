<?php
    
    $pdo = new PDO("mysql:host=localhost;dbname=funtasy;chaset=utf8","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT รหัสใบนัด FROM ใบนัด");
    $stmt->execute();
    $row = $stmt->fetch();
    sleep(1);
    if (!in_array( $_GET["username"], $row ) ) {
        echo "okay";
    } else {
        echo "denied";
    }
?>