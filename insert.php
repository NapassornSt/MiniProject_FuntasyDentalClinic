<?php
    $pdo = new PDO("mysql:host=localhost;dbname=funtasy;chaset=utf8","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            body {
                background-color: #F9f2e7;
                color: #47467b;
                margin: 3em;
                font-size: 2em;
            }
            button {
                border: none;
                font-size: 1em;
                color: white;
                padding: 10px 30px 10px;
                text-align: center;
                cursor: pointer;
                background-color: #f7b1c3;
            }
            button:hover {
                background-color: #7867bf;
                color: white;
            }
        </style>
    </head>
    <body>
    <?php 
       $stmt = $pdo->prepare("INSERT INTO คนไข้ VALUES (?,?,?,?,?,?,?)");
	   $stmt->bindParam(1, $_POST["Username"]);
	   $stmt->bindParam(2, $_POST["Password"]);
	   $stmt->bindParam(3, $_POST["รหัสบัตรประชาชนคนไข้"]);
	   $stmt->bindParam(4, $_POST["ชื่อ-สกุลคนไข้"]);
	   $stmt->bindParam(5, $_POST["วันเดือนปีเกิด"]);
	   $stmt->bindParam(6, $_POST["เบอร์โทรคนไข้"]);
	   $stmt->bindParam(7, $_POST["Email"]);

       $stmt->execute();
    ?>
        <h1>สมัครสมาชิกสำเร็จ!!</h1>
		<form>
        	<button type="submit"  formaction="index.php">go to Login</button>
    	</form>
    </body>
</html>