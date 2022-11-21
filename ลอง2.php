<?php
$pdo = new PDO("mysql:host=localhost;dbname=funtasy;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
$stmt = $pdo->prepare("SELECT * FROM คนไข้ WHERE Username = ?");
$stmt->bindParam(1, $_SESSION["Username"]);
$stmt->execute();
$row = $stmt->fetch();
?>

<html>

<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/62a50d0c8f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".btn-hamburger").on("click", function() {
                $("nav ul").toggleClass("nav-active");
            })
        });
    </script>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #F9f2e7;
            font-family: 'Mitr', sans-serif;
        }

        nav {
            display: flex;
            height: 80px;
            background-color: #7867bf;
            justify-content: center;
            align-items: center;
            position: relative;
            color: #e5e5e5;
        }

        nav ul {
            list-style: none;
            background-color: #7867bf;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        nav li {
            width: 200px;
            border-bottom: none;
            height: auto;
            line-height: 50px;
            font-size: 1.4em;
            display: inline-block;
        }

        nav a {
            border-bottom: none;
            text-decoration: none;
            color: #f9f2e7;
            display: block;
            padding-left: 15px;
            transition: .3s;
        }

        nav>ul>li {
            text-align: center;
        }

        nav>ul>li>a {
            padding-left: 0;
        }

        nav li li:hover {
                background-color: #47467b;
            }


        nav li ul {
            position: absolute;
            display: none;
            width: inherit;
        }

        nav li:hover ul {
            display: block;
        }

        nav li ul li {
            display: block;
            background-color: #7867bf;
            font-size: 0.8em;
            padding-right: 2%;
        }

        .btn-hamburger {
            position: absolute;
            font-size: 1.5rem;
            padding: 10px;
            background: none;
            border: none;
            cursor: pointer;
            display: none;
        }


        .logo img {
            width: 10%;
            display: inline-block;
        }

        .logo {
            background-color: #fad26d;
            padding: 0.8em;

        }

        .logo h1 {
            display: inline-block;
            margin-left: 2%;
            font-size: 4em;
            color: #7867bf;
        }

        footer {
            font-size: 1.3em;
            background-color: #7867bf;
            color: #F9f2e7;
            text-align: center;
            padding-top: 1em;
            margin-top: 1em;
        }

        .tutorial {
            display: inline-block;
            padding-top: 1em;
            padding-left: 2em;
            width: 30%;
            margin: 2em;
        }

        .name {
            margin-left: 200px;
            color: #F9f2e7;
        }

        h1 {
            font-size: 2.5em;
        }

        .content {
            margin: 20px;
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

        
        .mySlides {
                display: none;
        }


        @media screen and (max-width: 900px) {
           
            nav{
                display: inline-block;
            }

            .btn-hamburger {
                display: block;
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 10;
                font-size: 1.5rem;
                padding: 10px;
                color: #47467b;
                background: none;
                border: none;
                cursor: pointer;
            }

            .nav-active {
                display: flex;
            }

            nav ul {
                list-style: none;
                background-color: #7867bf;
                text-align: center;
                margin: 0;
                padding: 0;
                display: none;
                flex-direction: column;
            }

            nav li {
                font-size: 1.2em;
                line-height: 40px;
                text-align: left;
            }

            nav a {
                text-decoration: none;
                color: #f9f2e7;
                display: block;
                padding-left: 0.8em;
                transition: .3s;
                border-bottom: 1px solid #e5e5e5;
                margin-left: 3%;
            }

            nav>ul>li {
                text-align: left;
            }   

            nav li li {
                font-size: .8em;
            }
            
            img {
                display: block;
                margin-right: auto;
                margin-left: auto;
            }

            .logo {
                background-color: #fad26d;
                padding: 0.8em;
                text-align: center;

            }

            .logo img {
                width: 30%;
                text-align: center;
            }

            .logo h1 {
                display: inline-block;
                margin-left: 2%;
                font-size: 3em;
                color: #7867bf;
                text-align: center;
            }

            .tutorial {
                display: inline-block;
                padding-top: 0.5em;
                padding-left: 2em;
                width: 70%;
                margin: 0.5em;
            }

            footer {
                text-align: center;
                background-color: #7867bf;
                color: #F9f2e7;
                padding-top: 1em;
                font-size: 0.8em;
                margin-top: 1em;
            }

            h1 {
                color: #7867bf;
                font-size: 1.5em;
                padding: 0.2em;
            }


            .name {
                margin-left: 3%;
                color: #F9f2e7;
            }

            .user {
                margin-left: 3%;
                color: #f9f2e7;
            }

        }
    </style>
</head>

<body>


    <header>
        <div class="logo"><img src="logo.png">
            <h1>Funtasy Dental Clinic</h1>
        </div>

        <nav>
            <button class="btn-hamburger">
                <i class="fas fa-bars"></i>
            </button>

            <ul>
                <!-- <div class="nav1"> -->
                    <li class="home"><a href="loginsuccess.php?Username=<?= $row['Username'] ?>">HOME</a></li>
                    <li class="booking"><a href="booking.php">BOOKING</a></li>
                    <li class="postpone"><a href="postpone.php?Username=<?= $row['Username'] ?>">POSTPONE</a></li>
                    <li class="cancle"><a href="cancle.php">CANCLE</a></li>
                <!-- </div> -->
                <li class="name"><?= $row["ชื่อ-สกุลคนไข้"] ?></li>
                <li class="user"><i class="fa-regular fa-user fa-1x"></i></a>
                    <ul>
                        <li><a href="profile.php">ข้อมูลส่วนตัว</a></li>
                        <li><a href="bookingstatus.php">ประวัติการเข้ารับรักษา</a></li>
                        <li><a href="logout.php">Log out</a></li>
                    </ul>
                </li>
                
                
            </ul>

        </nav>
    </header>

    <table align="center">
        <td>
            <div class="content" style="max-width:1000px">
                <img class="mySlides" src="1.jpg" style="width:100%">
                <img class="mySlides" src="2.jpg" style="width:100%">
                <img class="mySlides" src="3.jpg" style="width:100%">

            </div>
        </td>
    </table>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 5 seconds
        }
    </script>

    <h1>
        <center>เกร็ดความรู้เกี่ยวกับเรื่องฟันของพวกเรา</center>
    </h1>
    <!-- <div class="topic"> -->
    <center>
        <a href="https://th.wikihow.com/%E0%B9%81%E0%B8%9B%E0%B8%A3%E0%B8%87%E0%B8%9F%E0%B8%B1%E0%B8%99"><img class="tutorial" src="วิธีแปรงฟัน.jpg" title="วิธีแปรงฟันที่ถูกวิธี"></a>
        <a href="https://www.sanook.com/health/26725/"><img class="tutorial" src="อาหารต้องห้าม.jpg" title="อาหารและเครื่องดื่มที่ทำลายสุขภาพฟัน"></a><br>
        <a href="https://www.cosdentbyslc.com/dentist-advise/knowledge/yellow-tooth"><img class="tutorial" src="ทำไมฟันเหลือง.jpg" title="ทำไมฟันเหลือง"></a>
        <a href="https://medthai.com/%E0%B8%9F%E0%B8%B1%E0%B8%99%E0%B8%9C%E0%B8%B8/"><img class="tutorial" src="ฟันผุ.jpg" title="ฟันผุเกิดจากอะไร"></a><br>
    </center>
    <!-- </div> -->

    <footer>
        <b>คลินิคทันตกรรมฟันตาซี่</b><br>
        ให้บริการทางทันตกรรม เช่น จัดฟัน อุดฟัน ถอนฟัน ทำรากเทียม ทางคลินิคของเราได้รวมเทคโนโลยีทางทันตกรรมมาไว้ที่นี่ รับรองเรื่องความปลอดภัย และความสะอาดครบวงจร <br>
        ติดต่อ Email : funtasyclinicdental@email.com, โทร : 083-498-8661 หรือ Line : @funtasyclinicdental
    </footer>

</body>

</html>