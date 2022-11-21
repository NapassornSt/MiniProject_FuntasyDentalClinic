<!-- //ใหม่ -->
<?php
$pdo = new PDO("mysql:host=localhost;dbname=funtasy;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();
?>
<html>
<head>
    <meta chaset="utf-8">
    <style>
        body {
            background-color: #F9f2e7;
            color: #47467b;
        }

        h1 {
            font-size: 5.5em;
            margin-top: 0.6em;
            text-align: center;
        }

        table {
            float: left;
            width: 100%;
            font-size: 1.4em;
        }

        td,
        th {
            padding: 0.5em;
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            border-color: black;
            border: black 1.5px solid;
        }

        th {
            background-color: #fad26d;
        }

        .total {
            border-radius: 2em;
            padding: 0em;
        }

        fieldset {
            border: none;
            margin:0;
            text-align: center;
            font-size: 2em;
        }

        button,
        #submit {
            border: none;
            font-size: 30px;
            color: #fff;
            padding: 20px 50px;
            text-align: center;
            cursor: pointer;
            background-color: #7867bf;
            border-radius: 20px;
        }
        button{
            margin-left: 2em;
        }

        input {
            font-size: 1em;
            color: #47467b;
            border-color: #47467b;
            border-radius: 1em;
            padding: 0.5em;
            display: inline-block;
        }

        select {
            font-size: 1em;
            color: #47467b;
            border-color: #47467b;
            border-radius: 0.5em;
            padding: 0.3em;
            display: inline-block;
        }
        button:hover {
            background-color: #47467b;
            color: white;
        }

        #submit:hover {
            background-color: #47467b;
            color: white;
        }

        footer {
            margin: 1em;
            margin-left: 0;
            float: left;
        }
        @media (min-width: 858px) {
            table {
                width: 45%;
                font-size: 1.3em;
            }

            .total {
                display: block;
                padding: 0.2em;
                margin-bottom: 10em;
            }

            footer {
                margin-left: 0;
            }
        }

        @media (min-width: 1060px) {
            table {
                width: 60%;
                font-size: 1.6em;
            }

            .total {
                display: block;
                padding: 2.5em;
                margin-bottom: 10em;
            }

            footer {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT
                            `ตารางนัดทันตแพทย์`.`วันที่ทันตแพทย์เข้าเวร`,
                            `ตารางนัดทันตแพทย์`.`เวลาที่ทันตแพทย์เข้าเวร`,
                            `ประเภทการทำทันตกรรม`.`ประเภท`
                        FROM
                            `การบันทึกข้อมูล`
                        JOIN `ใบนัด` ON `ใบนัด`.`รหัสใบนัด` = `การบันทึกข้อมูล`.`รหัสใบนัด`
                        JOIN `ตารางนัดทันตแพทย์` ON `การบันทึกข้อมูล`.`รหัสคนไข้` = `ตารางนัดทันตแพทย์`.`รหัสคนไข้`
                        JOIN `การตรวจสอบ` ON `ตารางนัดทันตแพทย์`.`รหัสคนไข้` = `การตรวจสอบ`.`รหัสคนไข้`
                        JOIN  `ประเภทการทำทันตกรรม` ON  `ประเภทการทำทันตกรรม`.`รหัสประเภททันตกรรม` = `การบันทึกข้อมูล`.`รหัสประเภททันตกรรม`
                        ");
    $stmt->execute();
    ?>
    <h1>BOOKING</h1>
    <div class="total">
        <div class="Table">
            <table>
                <tr>
                    <th>วัน</th>
                    <th>เวลา</th>
                    <th>ประเภททันตกรรม</th>
                </tr>
                <?php while ($row = $stmt->fetch()) : ?>
                    <tr>
                        <td><?= $row["วันที่ทันตแพทย์เข้าเวร"] ?></td>
                        <td><?= $row["เวลาที่ทันตแพทย์เข้าเวร"] ?></td>
                        <td><?= $row["ประเภท"] ?></td>
                    </tr>
                <?php endwhile ?>

            </table>
        </div>

        <br>
        <div>
            <br>
            <form action="insert2.php" method="POST">
                <fieldset>
                    <b>เลือกวันและเวลา</b>
                    <input type="date" name="วันที่นัด" required><br><br>
                    <input type="submit" id="submit"  value="SUBMIT">
                </fieldset>
            </form>
        </div>
    </div>

    <footer>
        <form>
            <center><button formaction="loginsuccess.php">BACK</button></center>
        </form>
    </footer>

</body>

</html>