<?php
$pdo = new PDO("mysql:host=localhost;dbname=funtasy;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
    $keyword = $_GET["keyword"];
    $stmt = $pdo->prepare("SELECT
                            `ทันตแพทย์`.`ชื่อ_สกุลทันตแพทย์`,
                            `ทันตแพทย์`.`ด้านเฉพาะทาง`,
                            `ทันตแพทย์`.`สังกัดโรงพยาบาล`,
                            `ทันตแพทย์`.`เบอร์โทรศัพท์ทันตแพทย์`,
                            `ตารางนัดทันตแพทย์`.`วันที่ทันตแพทย์เข้าเวร`,
                            `ตารางนัดทันตแพทย์`.`เวลาที่ทันตแพทย์เข้าเวร`,
                            COUNT(`การตรวจสอบ`.`รหัสทันตแพทย์`) AS `จำนวนคนไข้เดือนนี้`
                        FROM
                            `การตรวจสอบ`
                        JOIN `ทันตแพทย์` ON `การตรวจสอบ`.`รหัสทันตแพทย์` = `ทันตแพทย์`.`รหัสทันตแพทย์`
                        JOIN `การบันทึกข้อมูล` ON `การบันทึกข้อมูล`.`รหัสคนไข้` = `การตรวจสอบ`.`รหัสคนไข้`
                        JOIN `ตารางนัดทันตแพทย์` ON `การบันทึกข้อมูล`.`รหัสคนไข้` = `ตารางนัดทันตแพทย์`.`รหัสคนไข้`
                        WHERE
                            `ทันตแพทย์`.`ด้านเฉพาะทาง` LIKE '%$keyword%' AND `การบันทึกข้อมูล`.`สถานะการบันทึกข้อมูล` = '1'
                        GROUP BY
                            `การตรวจสอบ`.`รหัสทันตแพทย์`");
        $stmt->execute();
?>
<html>
    <head>
        <style>
            table{
                margin-top: 3em;
            }
            table,th,tr,td{
                border: 2px solid;
                border-color: #7867bf;
            }
            th,tr,td{
                padding: 1em;
                background-color: #F9f2e7;
            }
        </style>
    </head>
    <body>
    <center>
    <table>
        <tr>
            <th>ชื่อ_สกุลทันตแพทย์</th>
            <th>ด้านเฉพาะทาง</th>
            <th>สังกัดโรงพยาบาล</th>
            <th>เบอร์โทรศัพท์ทันตแพทย์</th>
            <th>วันที่ทันตแพทย์เข้าเวร</th>
            <th>เวลาที่ทันตแพทย์เข้าเวร</th>
            <th>จำนวนคนไข้เดือนนี้</th>
        </tr>
    <?php while($row = $stmt->fetch()){ ?>
        <tr  style="text-align:center;">
            <td><?php echo $row["ชื่อ_สกุลทันตแพทย์"]?></td>
            <td><?php echo $row["ด้านเฉพาะทาง"]?></td>
            <td><?php echo $row["สังกัดโรงพยาบาล"]?></td>
            <td><?php echo $row["เบอร์โทรศัพท์ทันตแพทย์"]?></td>
            <td><?php echo $row["วันที่ทันตแพทย์เข้าเวร"]?></td>
            <td><?php echo $row["เวลาที่ทันตแพทย์เข้าเวร"]?></td>
            <td><?php echo $row["จำนวนคนไข้เดือนนี้"]?></td>
        </tr>
    <?php }?>
</table>
    </center>

    </body>
</html>