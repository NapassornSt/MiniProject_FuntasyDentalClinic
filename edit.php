<?php
    $pdo = new PDO("mysql:host=localhost;dbname=funtasy;chaset=utf8","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
<?php 
        $stmt = $pdo->prepare("UPDATE ใบนัด SET รหัสใบนัด=? ,วันที่นัด=? WHERE Username=?");
        $stmt->bindParam(1, $_POST["รหัสใบนัด"]);
        $stmt->bindParam(2, $_POST["วันที่นัด"]);
        $stmt->bindParam(3, $_GET["Username"]);
        if($stmt->execute()){
            echo '<script>alert("เลื่อนวันที่จองสำเร็จ");</script>';
            header("location: loginsuccess.php?Username=".$_GET["Username"]);
        }

?>