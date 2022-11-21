<?php
$pdo = new PDO("mysql:host=localhost;dbname=funtasy;chaset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
      <style>
        body {
            background-color: #F9f2e7;
        }

        .component {
            padding: 1em;
            background-color: #7867bf;
            border-radius: 20px;
            margin-top: 2em;
        }


        button {
            border: none;
            font-size: 30px;
            color: #47467b;
            padding: 20px 50px;
            text-align: center;
            cursor: pointer;
            background-color: #f7b1c3;
            border-radius: 20px;
        }

        .b3 {
            background-color: #f7b1c3;
            margin: 2em;
        }

        .b3:hover {
            background-color: #47467b;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php
    $stmt = $pdo->prepare("INSERT INTO `ใบนัด` VALUES ( '', ?, ?)");
    $stmt->bindParam(1, $_POST["วันที่นัด"]);   
    $stmt->bindParam(2, $_SESSION["Username"]);
    $id = $pdo->lastInsertId();
    $stmt->execute()
    ?>
    <h1>จองสำเร็จ!!</h1>
    <form>
        <center>
        <div>
        <button class="b3" formaction="booking.php">BACK</button>
        <button class="b3" formaction="loginsuccess.php">HOME</button>
    </div>
        </center>
    </form>

</body>

</html>