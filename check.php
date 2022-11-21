<?php
    $pdo = new PDO("mysql:host=localhost;dbname=funtasy;chaset=utf8","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    session_start();
    $stmt = $pdo->prepare("SELECT * FROM คนไข้ WHERE Username = ? AND Password = ?");
    $stmt->bindParam(1,$_POST["Username"]);
    $stmt->bindParam(2,$_POST["Password"]);
    $stmt->execute();
    $row = $stmt->fetch();

    if(!empty($row)){
        session_regenerate_id();
        $_SESSION["Username"] = $row["Username"];
        header("location: loginsuccess.php?Username=".$_POST["Username"]);
    }
    else{ ?>
        <html>
        <head>
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
            <h1>Login unsuccess!</h1>
            <h2>No User or Wrong Password</h2><br>
            <form>
                <button formaction="index.php">Login again</button>
            </form>
        </body>
        </html>
   
<?php } ?>
       