<!-- //ใหม่ -->
<?php
$pdo = new PDO("mysql:host=localhost; dbname=funtasy; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <style>
    h1 {
        margin-top: 0.7em;
        text-align: center;
        color: #7867bf;
        font-size: 6em;
    }

    body {
        background-color: #f7b1c3;
        color: #fff;
    }

    input {
        color: #47467b;
        font-size: 1em;
    }

    .form1 {
        font-size: 1em;
        background-color: #7867bf;
        border-radius: 20px;
        padding: 1em;
    }

    fieldset {
        padding: 1em;
        text-align: center;
        font-size: 1.6em;
        color: #F9f2e7;
        border: none;
    }

    button {
        border: none;
        font-size: 1em;
        color: #47467b;
        padding: 7px 30px;
        text-align: center;
        cursor: pointer;
        background-color: #f7b1c3;
        border-radius: 10px;
        margin-top: 2em;
    }

    button:hover {
        background-color: #47467b;
        color: white;
    }

    footer {
        margin: 2em;
    }

    .b3 {
        background-color: #7867bf;
        margin: 2em;
        padding: 0.5em 1em;
        font-size: 3em;
        color: #fff;
    }

    .b3:hover {
        background-color: #47467b;
        color: #fff;
    }

    @media (min-width: 768px) {
        button {
            margin-top: 0;
        }

        .form1 {
            padding: 3em;
        }
    }
    </style>
</head>

<body>

    <?php
       $stmt = $pdo->prepare("SELECT * FROM ใบนัด WHERE Username=?");
       $stmt->bindParam(1,$_SESSION["Username"]);
       $stmt->execute();
       $row = $stmt->fetch();
        if(empty($row)){
            $key = 'ยังไม่มีรายการจอง';
        }
        else{
            $key = $row["รหัสใบนัด"];
            while($row = $stmt->fetch()){
                $key = $row["รหัสใบนัด"];
            }
        }  
    ?>
    <h1>CANCLE</h1>
    <div class="form1">
        <form action="confirm.php" method="get">
            <fieldset>
                <label for="รหัสใบนัด">รหัสใบนัด : </label>
                <input type="text" name="รหัสใบนัด" pattern=[0-9]{1,3} require autofocus value="<?=$key?>">
                <button type="submit">NEXT</button>
            </fieldset>

        </form>
    </div>


</body>
<footer>
    <form>
        <button class="b3" formaction="loginsuccess.php">BACK</button>
    </form>

</footer>

</html>