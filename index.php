<?php
$pdo = new PDO("mysql:host=localhost;dbname=funtasy;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
  $stmt = $pdo->prepare("SELECT * FROM คนไข้ ");
  $row = $stmt->fetch();
?>
<html>
<head>
    <meta charset='utf-8'>
    <style>
    body {
        text-align: center;
    }

    #content {
        background-color: #F9f2e7;
        padding: 2em;
        margin: 30px 60px 50px 65px;
        border-radius: 5em;
    }
    form{
        margin-bottom: 0;
    }

    img {
        margin-top: 0.5em;
        width: 12em;
    }

    .head>h1 {
        color: #7867bf;
        font-size: 4.5em;
        margin: 0.3em;
        margin-bottom: 0.1em;
        padding: 0;
    }

    .head>h4 {
        color: #f7b1c3;
        font-size: 2.5em;
        margin: 0;
        margin-bottom: 0.5em;
        padding: 0;
    }

    .comp {
        color:   #7867bf;
        display: inline-block;
    }

    p {
        font-size: 2em;
        padding-left: 0.1em;
        padding-right: 0em;
        margin: 0.1em;
        margin-top: 1em;
        text-align: left;
    }

    .user>input {
        border: 3px solid;
        color: #47467b;
        height: 2em;
        font-size: 1.3em;
    }

    #pu {
        text-align: center;
        color:   #7867bf;
        padding-left: 0;
        margin-top: 0.5em;
        font-size: 1.3em;
    }

    .button>input {
        background-color: #f7b1c3;
        color: #7867bf;
        border: 0px;
        padding: 1em 8.5em 1em;
        margin-top: 1.5em;
        font-size: 0.9em;
        cursor: pointer;
    }

    .button>input:hover {
        background-color: #47467b;
        color: #f7b1c3;
    }

    button {
        background-color: #f7b1c3;
        color: #7867bf;
        border: 0em;
        padding: 1em 8em 1em;
        font-size: 0.9em;
        cursor: pointer;
    }

    button:hover {
        background-color: #47467b;
        color: #f7b1c3;
    }
    @media ( min-width: 900px) {
        #content {
            padding: 3em;
            margin: 30px 180px 50px;
            border-radius: 5em;
        }
    }
    @media ( min-width: 1300px) {
        .head>h1 {
            font-size: 6em;
            display: inline-block;
        }
        .head>h4 {
            font-size: 5em;
            display: inline-block;
        }
        #content {
            background: none;
            margin: 0px 0px 0px;
            border-radius: 0em;
        }
        img {
            margin-top: 0em;
            width: 15em;
        }
        .comp{
            background-color: #F9f2e7;
            margin: 1em 4em;
            color: #7867bf;
            padding: 3em 25em 5em;
            border-radius: 0.8em;
        }
        .user>input {
            font-size: 1.5em;
        }
        .button>input {
            font-size: 1.5em;
            padding: 0.5em 5em 0.5em;
        }
        button {
            font-size: 1.5em;
            padding: 0.5em 4.5em 0.5em;
        }  
    }
    </style>
</head>
<body>
    <div id="content">
        <form action="check.php" method="POST">
            <div class="head">
                <img src="logo.png">
                <h1>Funtasy</h1>
                <h4>Dental Clinic</h4>
            </div>
            <div class="comp">     
                <div class="user"> 
                    <p>Username </p><br>
                    <input type="text" name="Username" pattern="[A-Za-z0-9_]{8,10}" maxlength="10" required autofocus><br>
                    <p>Password </p><br>
                    <input type="password" name="Password" pattern="[A-Z]{1}[a-z0-9]{7}" maxlength="8" required><br><br>
                </div> 
                <div class="button">
                    <input type="submit" value="Login"><br>    
                </div>
        </form>
        <form>
            <p id="pu">Or</p><br>
            <button type="submit" formaction="register.php">Sign Up</button>
        </form>
        </div>
    </div>
</body>
</html>