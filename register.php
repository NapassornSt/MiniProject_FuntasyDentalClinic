<!-- //ใหม่ -->
<?php
$pdo = new PDO("mysql:host=localhost;dbname=funtasy;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<html>

<head>
    <meta charset="UTF-8">
<style>
    body {
        background-color: #F9f2e7;
    }
    .head {
        text-align: center;
    }
    img {
        margin-top: 0.5em;
        width: 12em;
    }
    .head>h1 {
        color: #7867bf;
        font-size: 3.5em;
        margin: 0.2em;
        margin-bottom: 0.1em;
        padding: 0;
    }

    .head>h4 {
        color: #f7b1c3;
        font-size: 2.5em;
        margin: 0;
        margin-bottom: 2em;
        padding: 0;
    }
    .regis {
        margin: 20px 60px;
        background-color: #f7b1c3;
        border-radius: 20px;
        padding: 1.5em;
        font-size: 1em;
        color: red;
        display: inline-block;
    }
    .regis input{
        height: 1.5em;
        font-size: 1em;
        margin: 0em 1em;
        padding: 0.8em;
        border-radius: 10px;
        background-color: #F9f2e7;
    }
    .regis p{
        padding: 0em 1em;
        color: black;
    }
    .regis h1{
        padding-left: 0.5em;
        color: #47467b;
        font-size: 2.5em;
    }
    i {
        color: grey;
        font-size: 1em;
        margin: 0em 1em;
    }
    #B{
            visibility: hidden;
    }
    a {
        background-color: #47467b; 
        color: #F9f2e7; border: 0; 
        border: 0px;
        margin-bottom:5em;
        padding: 0.2em 2em 0.2em;
        font-size: 2em; 
        text-decoration:none;
    }

    a:hover {
        background-color: #47467b;
        color: #f7b1c3;
    }
    fieldset {
        border-color:#47467b;
        border-radius: 20px;
        padding: 15px;
    }
    .button{
        margin-top: 1em;
        margin-bottom: 1em;
    }
    .button input {
        cursor: pointer;
        background-color: #F9f2e7;
        color: #47467b;
        border: 0;
        border-radius: 15px;
        padding: 0em 3em 0em;
        font-size: 1.2em;  
    }
    .button input:hover {
        background-color: #47467b;
        color:#F9f2e7;
        border: 0;
        border-radius: 15px;
        padding: 0em 3em 0em;
        font-size: 1.2em;  
    }
    @media ( min-width: 850px) {
        .regis {
            display: block;
        }
        i {
            font-size: 0.9em;
        }
        .regis {
            margin: 20px 35px;
        }
    }
    @media ( min-width: 1060px) {
        #S{
            visibility: hidden;
        }
        #B{
            visibility: visible;
        }
        .head {
            position: fixed;
            left:5em;
            top:5em;
        }
        .head>h1 {
            font-size: 5em;
        }
        fieldset{
            padding-left: 3em;
            padding-right: 8em;
        }
        .regis {
            margin: 20px 60px;
            position: absolute;
            top: 4em;
            right: 3em;
            padding: 30px;
            font-size: 1.3em;
        }
        .regis p{
            font-size: 1.2em;
        }
        .regis h1{
            font-size: 2.5em;
        }
        i {
            font-size: 1.05em;
        }
    
    }
    </style>
</head>

<body>
    <form action="insert.php" method="POST">
        <div class="head">
            <img src="logo.png">
            <h1>Funtasy</h1>
            <h4>Dental Clinic</h4>
            <center><a href="index.php" id="B">BACK</a></center>
        </div>
        <div class="regis">
            <fieldset>
                <legend><h1>Register</h1></legend>
                <p>ชื่อ-สกุล</p>
                <input type="text" name="ชื่อ-สกุลคนไข้" pattern="^[ก-๙\s]+$" required autofocus>*<br>
                <p>รหัสบัตรประชาชน</p>
                <input type="text" name="รหัสบัตรประชาชนคนไข้" pattern="[0-9]{13}" maxlength="13" placeholder="xxxxxxxxxxxxx" required>*<br>
                <p>วันเดือนปีเกิด</p>
                <input type="date" name="วันเดือนปีเกิด" required>*
                <p>เบอร์โทรศัพท์</p>
                <input type="text" name="เบอร์โทรคนไข้" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" placeholder="xxx-xxx-xxxx" required>*
                <p>Email</p>
                <input type="text" name="Email" placeholder="@xxx.com" required>*
                <p>Username</p>
                <input type="text"  name="Username" pattern="[A-Za-z0-9_]{8,10}" placeholder="xxxxxxxxxx" maxlength="10" title="Eight or Ten characters" required>*<br>
                <i>ตัวอักษรมีได้ตั้งแต่ 8-10 ตัว</i>
                <p>Password</p>
                <input type="password" name="Password" pattern="[A-Z]{1}[a-z0-9]{7}" maxlength="8" placeholder="Xxxxxxxx" title="The first one is capitalized" required>*<br>
                <i>มีได้เพียง 8 ตัวเท่านั้นโดยตัวแรกสุดเป็นอักษรตัวพิมพ์ใหญ่</i><br><br>
                <div class="button">
                    <input type="submit" value="สมัครสมาชิก">
                </div>
            </fieldset>
        </div>
    </form>
    <center><a href="index.php" id="S">BACK</a></center>
</body>

</html>