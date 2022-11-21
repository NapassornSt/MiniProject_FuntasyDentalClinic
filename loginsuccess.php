<!-- //เพิ่ม -->
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
    <link rel="stylesheet" href="ck.css">
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

        .mySlides {
            display: none;
        }

        img {
            display: block;
            margin-right: auto;
            margin-left: auto;
        }

        .content1 {
            margin: 20px;
            margin-left: 13em;
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

        .tutorial {
            display: inline-block;
            padding-top: 0.5em;
            padding-left: 2em;
            width: 70%;
            margin: 0.5em;
        }

        .content1 {
            margin: 20px;
            
        }

        .mySlides {
            display: none;
        }

        h2 {
            color: #47467b;
            font-size: 1.5em;
            padding: 0.2em;

        }

        footer {
            text-align: center;
            background-color: #7867bf;
            color: #fff;
            padding-top: 1em;
            font-size: 0.8em;
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
                margin-left: 0%;
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

            .tutorial {
                display: inline-block;
                padding-top: 1em;
                padding-left: 2em;
                width: 30%;
                margin: 2em;
            }

            footer {
                font-size: 1.3em;
                background-color: #7867bf;
                color: #F9f2e7;
                text-align: center;
                padding-top: 1em;
                margin-top: 1em;
            }

            h2 {
                color: #47467b;
                font-size: 2em;
                padding: 0.2em;
            }

            .content1{
    
                margin-left:13em;
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
    <!-- //cookie -->
    <div class="wrapper">
        <img src="cookie1.png">
        <div class="content">
            <header>คุกกี้แอนด์ครีม</header>
            <p>เราใช้คุกกี้เพื่อให้ท่านมีความสะดวกสบายในการใช้งานบนเว็บไซต์ของเรา</p>
            <div class="buttons">
                <button class="item">ฉันยอมรับและเข้าใจ</button>
                <a href="https://www.borntodev.com/2020/07/10/cookie-vs-session/" class="item">เรียนรู้เพิ่มเติม</a>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <table align="center">
        <td>
            <div class="content1" style="max-width:1000px">
                <img class="mySlides" src="1.jpg" style="width:100%">
                <img class="mySlides" src="2.jpg" style="width:100%">
                <img class="mySlides" src="3.jpg" style="width:100%">

            </div>
        </td>
    </table>

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

        const cookieBox = document.querySelector(".wrapper"),
            acceptBtn = cookieBox.querySelector("button");

        acceptBtn.onclick = () => {
            document.cookie = "cookiename=<?=$_SESSION["Username"] ?>; max-age=" + 3600 * 24 * 7;
            if (document.cookie) {
                cookieBox.classList.add("hide");
            } else {
                alert("Cookie can't be set! Please unblock this site from the cookie setting of your browser.");
            }
        }
        let checkCookie = document.cookie.indexOf("cookiename=<?=$_SESSION["Username"] ?>"); //checking our cookie
        checkCookie != -1 ? cookieBox.classList.add("hide") : cookieBox.classList.remove("hide");
    </script>

<h2>
        <center>เกร็ดความรู้เกี่ยวกับเรื่องฟันของพวกเรา</center>
    </h2>
    <center>
        <a href="https://th.wikihow.com/%E0%B9%81%E0%B8%9B%E0%B8%A3%E0%B8%87%E0%B8%9F%E0%B8%B1%E0%B8%99"><img class="tutorial" src="วิธีแปรงฟัน.jpg" title="วิธีแปรงฟันที่ถูกวิธี"></a>
        <a href="https://www.sanook.com/health/26725/"><img class="tutorial" src="อาหารต้องห้าม.jpg" title="อาหารและเครื่องดื่มที่ทำลายสุขภาพฟัน"></a><br>
        <a href="https://www.cosdentbyslc.com/dentist-advise/knowledge/yellow-tooth"><img class="tutorial" src="ทำไมฟันเหลือง.jpg" title="ทำไมฟันเหลือง"></a>
        <a href="https://medthai.com/%E0%B8%9F%E0%B8%B1%E0%B8%99%E0%B8%9C%E0%B8%B8/"><img class="tutorial" src="ฟันผุ.jpg" title="ฟันผุเกิดจากอะไร"></a><br>
    </center>
    <footer>
        <b>คลินิคทันตกรรมฟันตาซี่</b><br>
        ให้บริการทางทันตกรรม เช่น จัดฟัน อุดฟัน ถอนฟัน ทำรากเทียม ทางคลินิคของเราได้รวมเทคโนโลยีทางทันตกรรมมาไว้ที่นี่ รับรองเรื่องความปลอดภัย และความสะอาดครบวงจร <br>
        ติดต่อ Email : funtasyclinicdental@email.com, โทร : 083-498-8661 หรือ Line : @funtasyclinicdental
    </footer>

</body>

</html>