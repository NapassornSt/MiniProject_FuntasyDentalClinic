<?php
$pdo = new PDO("mysql:host=localhost; dbname=funtasy; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
    $stmt = $pdo->prepare("SELECT
                            `การบันทึกข้อมูล`.`รหัสใบนัด`,
                            `การบันทึกข้อมูล`.`รหัสคนไข้`,
                            `การบันทึกข้อมูล`.`รหัสประเภททันตกรรม`,
                            `ใบนัด`.`วันที่นัด`,
                            `ตารางนัดทันตแพทย์`.`วันที่ทันตแพทย์เข้าเวร`,
                            `ตารางนัดทันตแพทย์`.`เวลาที่ทันตแพทย์เข้าเวร`,
                            `การตรวจสอบ`.`รหัสทันตแพทย์`
                            FROM
                                `การบันทึกข้อมูล`
                            JOIN `ใบนัด` ON `ใบนัด`.`รหัสใบนัด` = `การบันทึกข้อมูล`.`รหัสใบนัด`
                            JOIN `ตารางนัดทันตแพทย์` ON `การบันทึกข้อมูล`.`รหัสคนไข้` = `ตารางนัดทันตแพทย์`.`รหัสคนไข้`
                            JOIN `การตรวจสอบ` ON `ตารางนัดทันตแพทย์`.`รหัสคนไข้` = `การตรวจสอบ`.`รหัสคนไข้`
                            ORDER BY `การบันทึกข้อมูล`.`รหัสคนไข้`;
                        ");
    $stmt->execute();
?>
<html>

<head>
    <style>
    table {
        margin-top: 3em;
        color: #47467b;
        margin-bottom: 3em;
    }

    table,
    th,
    tr,
    td {
        /* border: 2px solid; */
        border-radius: 0.3em;
        /* border-color: #7867bf; */
        background-color: none;
    }

    th,
    tr,
    td {
        padding: 1em;
        background-color: #F9f2e7;
    }
    </style>
</head>

<body>
    <center>
        <h1>ตารางข้อมูลการนัดของคนไข้</h1>
        <table>
            <tr>
                <th>รหัสใบนัด</th>
                <th>รหัสคนไข้</th>
                <th>รหัสประเภททันตกรรม</th>
                <th>วันที่นัด</th>
                <th>วันที่ทันตแพทย์เข้าเวร</th>
                <th>เวลาที่ทันตแพทย์เข้าเวร</th>
                <th>รหัสทันตแพทย์</th>
            </tr>
            <?php while($row = $stmt->fetch()){ ?>
            <tr style="text-align:center;">
                <td><?php echo $row["รหัสใบนัด"]?></td>
                <td><?php echo $row["รหัสคนไข้"]?></td>
                <td><?php echo $row["รหัสประเภททันตกรรม"]?></td>
                <td><?php echo $row["วันที่นัด"]?></td>
                <td><?php echo $row["วันที่ทันตแพทย์เข้าเวร"]?></td>
                <td><?php echo $row["เวลาที่ทันตแพทย์เข้าเวร"]?></td>
                <td><?php echo $row["รหัสทันตแพทย์"]?></td>
            </tr>
            <?php }?>
        </table>
    </center>

</body>

</html>