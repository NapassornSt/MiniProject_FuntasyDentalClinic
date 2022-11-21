<?php
$pdo = new PDO("mysql:host=localhost;dbname=funtasy;chaset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
session_start();

$stmt = $pdo->prepare("SELECT * FROM คนไข้ WHERE Username=?");
$stmt->bindParam(1, $_SESSION["Username"]);
$stmt->execute();
$row = $stmt->fetch();
?>

<html>

<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/62a50d0c8f.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #F9f2e7;
            font-family: 'Mitr', sans-serif;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fad26d;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover {
            color: red;
            text-decoration: none;
            cursor: pointer;
        }

        .nav-toggle {
            position: fixed;
            top: 0.1em;
            left: 20px;
            font-size: 30px;
            display: inline-block;
            cursor: pointer;
            color: #47467b;
        }

        li ul {
            position: absolute;
            display: none;
            width: inherit;
        }

        ul .user {
            color: #F9f2e7;
            display: none;
        }

        ul {
            flex-direction: column;
            justify-content: center;
            padding-left: 0;
            display: none;
            margin: 0;

        }

        .nav {
            display: flex;
            height: auto;
            background: #7867bf;
            justify-content: center;
            align-items: center;
            flex-direction: column;


        }

        ul .name {
            color: #F9f2e7;
            cursor: default;
            display: none;
        }



        .nav ul {
            list-style: none;
            background-color: #7867bf;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .nav li {
            font-size: 1.2em;
            line-height: 35px;
            text-align: left;
        }

        li {
            width: 500px;
        }

        ul li {
            list-style-type: none;
            font-size: 1em;
            cursor: pointer;
            border-bottom-style: solid;
            border-bottom-color: #F9f2e7;
            border-bottom-width: 1px;
            padding: 5px 30px;
        }

        .nav a {
            text-decoration: none;
            color: #f9f2e7;
            display: block;
            padding-left: 15px;
            transition: .3s;
        }

        ul {
            flex-direction: column;
            justify-content: center;
            padding-left: 0;
            display: none;
            margin: 0;
        }

        .home:hover {
            background-color: #47467b;
        }

        .booking:hover {
            background-color: #47467b;
        }

        .postpone:hover {
            background-color: #47467b;
        }

        .cancle:hover {
            background-color: #47467b;
        }

        .nav li li {
            font-size: .8em;
        }

        .nav li li:hover {
            background-color: #47467b;
        }

        .logo {
            background-color: #fad26d;
            padding: 0.8em;
            text-align: center;
            height: 18em;

        }

        .logo img {
            width: 30%;
            display: inline-block;

        }

        .logo h1 {
            display: inline-block;
            margin-left: 2%;
            font-size: 3em;
            color: #7867bf;
        }


        .name {
            margin-left: 200px;
            color: #F9f2e7;
        }

        .user {
            color: #f9f2e7;
        }

        .active {
            display: flex;
        }

        .profile {
            border-radius: 20px;
            height: 20em;
            width: 20em;
            border: 15px solid #f7b1c3;
            padding: 15px;
            margin: 10px;
            margin-bottom: 150px;
            background-color: #f7b1c3;
            font-size: 1em;
            color: #000;
            box-shadow: 5px 5px #333;
            color: #47467b;
        }

        p {
            color: #47467b;
            font-size: 2em;

        }

        /*web หน้าจอใหญ่เกิน800 จะให้รูปแบบเปลี่ยน*/
        @media screen and (min-width: 1060px) {
            .logo {
                padding-top: 0.2em;
                padding-left: 1.5em;
                margin: 0;
                background: #fad26d;
                height: 9em;
                font-size: 1em;
                text-align: left;
            }

            .logo img {
                width: 10em;
                height: 8em;
            }

            .logo h1 {
                display: inline-block;
                margin:0px;
                font-size: 3em;
                color: #7867bf;
                
            }

            .nav li {
                width: 200px;
                border-bottom: none;
                height: auto;
                line-height: 50px;
                font-size: 1.4em;
                display: inline-block;

            }

            ul li {
                display: inline-block;
                font-size: 1em;
                cursor: pointer;
                border-bottom-style: none;
                border-bottom-color: none;
                border-bottom-width: 0;
                padding: 0;
            }

            ul {
                display: inline-block;
            }

            .nav a {
                border-bottom: none;
            }

            .nav>ul>li {
                text-align: center;
            }

            .nav>ul>li>a {
                padding-left: 0;
            }

            .limobile {
                display: none;
            }

            .nav li ul {
                position: absolute;
                display: none;
                width: inherit;
            }

            .nav li:hover ul {
                display: block;
            }

            .nav li ul li {
                display: block;
            }

            .nav-toggle {
                display: none;
            }

            .profile {
                border-radius: 20px;
                height: 18em;
                width: 20em;
                border: 15px solid #f7b1c3;
                padding: 15px;
                margin: 10px;
                margin-bottom: 150px;
                background-color: #f7b1c3;
                font-size: 2em;
                color: #000;
                box-shadow: 5px 5px #333;
                color: #47467b;
            }

            p {
                color: #47467b;
                font-size: 4em;

            }

        }
    </style>
     <script>
        function send() {
            request = new XMLHttpRequest();
            request.onreadystatechange = showResult;
            var url = "bookingstatus.php";
            request.open("GET", url, true);
            request.send(null);
        }

        function showResult() {
            if (request.readyState == 4) {
                if (request.status == 200)
                    document.getElementById("result").innerHTML = request.responseText;
            }
        }
    </script>
</head>

<body>
<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="result"></div>
        </div>
    </div>
    <header>
        <div class="logo"><img src="logo.png">
            <h1>Funtasy Dental Clinic</h1>
        </div>

        <div class="nav">
            <span class="nav-toggle" id="js-nav-toggle">
                <i class="fas fa-bars"></i>
            </span>
            <ul id="js-menu">
                <li class="home"><a href="loginsuccess.php">HOME</a></li>
                <li class="booking"><a href="booking.php">BOOKING</a></li>
                <li class="postpone"><a href="postpone.php">POSTPONE</a></li>
                <li class="cancle"><a href="cancle.php">CANCLE</a></li>
                <li class="name" id="re"><?= $row["ชื่อ-สกุลคนไข้"] ?></li>
                <li class="user"><i class="fa-regular fa-user fa-1x"></i></a>
                    <ul>
                        <li><a href="profile.php">ข้อมูลส่วนตัว</a></li>
                        <li><a href="bookinghistory.php">ประวัติการเข้ารับรักษา</a></li>
                        <li><a href="#" onclick="popup()" id="myBtn">ข้อมูลการนัดคนไข้</a></li>
                        <li><a href="logout.php">Log out</a></li>
                    </ul>
                </li>
                <div class="limobile">
                    <li><a href="profile.php">ข้อมูลส่วนตัว</a></li>
                    <li><a href="bookinghistory.php">ประวัติการเข้ารับรักษา</a></li>
                    <li><a href="#" onclick="popup()" id="myBtn">ข้อมูลการนัดคนไข้</a></li>
                    <li><a href="logout.php">LOG OUT</a></li>
                </div>
            </ul>
        </div>
    </header>
    <script src="script.js"></script>
    <script>
          var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];

        function popup() {
            modal.style.display = "block";
            send();
        }
        //คลิ๊กที่กากบาทออก
        span.onclick = function() {
            modal.style.display = "none";
        }

    </script>
    <center>
        <p><b>PROFILE</b></p>
        <div class="profile">
            <b>Username :</b> <?= $row["Username"] ?><br><br>
            <b>ชื่อ-สกุล :</b> <?= $row["ชื่อ-สกุลคนไข้"] ?><br><br>
            <b>รหัสบัตรประชาชน :</b> <?= $row["รหัสบัตรประชาชนคนไข้"] ?><br><br>
            <b>วันเดือนปีเกิด :</b> <?= $row["วันเดือนปีเกิด"] ?><br><br>
            <b>เบอร์โทร :</b> <?= $row["เบอร์โทรคนไข้"] ?><br><br>
            <b>Email :</b> <?= $row["Email"] ?>
        </div>

    </center>
</body>

</html>