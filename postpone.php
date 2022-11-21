<!-- //ใหม่ -->
<?php
    $pdo = new PDO("mysql:host=localhost;dbname=funtasy;chaset=utf8","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    session_start();
?>
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
<html>
    <head>
        <meta chaset="UTF-8">
        <script>
            function send() {
                request = new XMLHttpRequest();
                request.onreadystatechange = showResult;
                var keyword = document.getElementById("keyword").value;
                var url = "doc.php?keyword=" + keyword;
                request.open("GET", url, true);
                request.send(null);
            }
            function showResult() {
                if (request.readyState == 4) {
                    if (request.status == 200)
                        document.getElementById("result").innerHTML = request.responseText;
                }
            }
            function editdate() {
                var ans = confirm("Do you want to postpone?");
                if (ans == true){
                    <?php
                        $stmt = $pdo->prepare("UPDATE ใบนัด SET วันที่นัด=? WHERE รหัสใบนัด = ? AND Username = ?");
                        $stmt->bindParam(1, $_GET["วันที่นัด"]);
                        $stmt->bindParam(2, $_GET["รหัสใบนัด"]);
                        $stmt->bindParam(3, $_SESSION["Username"]);
                        $stmt->execute();
                    ?>
                    alert("Postpone the date of successful booking.");
                }
                else{
                    alert("Postpone the date of unsuccessful booking!!!");
                }
                
            }
        </script>
        <style>
            body{
                background-color: #7867bf;
                font-size: 1.4em;
            }
            #keyword{
                float: right;
                font-size: 0.7em;
                padding: 0.5em;
            }
            h1{
                text-align: center;
                color: #fad26d;
                margin: 0.6em 0em 0em;
                font-size: 2.5em;
            }
            h1+h1{
                text-align: center;
                color: #f7b1c3;
                margin: 0.4em 0em 2em;
                font-size: 1.5em;
            }
            center{
                margin: 1em;
            }
            form{
                margin: 1.5em 5em 1.5em;
                padding: 2em 2em  6em;
                border-radius: 1em;
                color: #47467b;
                background-color: #F9f2e7;
            }
            input,select{
                cursor: pointer;
                color: #47467b;
                border-radius: 15px;
                padding: 0.1em 0.5em 0.1em;
                font-size: 0.7em; 
            }
            #ps{
                padding: 0.1em 0.5em 0.1em;
                font-size: 0.7em; 
            }
            a{
                background-color: #47467b; 
                color: #F9f2e7; border: 0; 
                border-radius: 15px; 
                padding: 0.2em 2em 0.2em;
                font-size: 1.5em; 
                text-decoration:none;
            }
            a:hover{
                background-color: #F9f2e7; 
                color: #47467b;
            }
            #sub{
                background-color: #f7b1c3; 
                color: #47467b;  
                font-size: 1em; 
                border: 0; margin: 1em 0em;
                padding: 0.2em 2em 0.2em;
                cursor: pointer;
            }
            #sub:hover{
                background-color: #47467b; 
                color: #F9f2e7;
            }
            @media ( min-width: 1060px) {
            h1{
                font-size: 3em;
            }
            form{
                font-size: 1.3em;
                margin: 1.5em 5em 1.5em;
                padding: 2em 3.5em  2em;
                border-radius: 1em;
                color: #47467b;
                background-color: #F9f2e7;
            }
            input,select{
                
                color: #47467b;
                border-radius: 15px;
                padding: 0.1em 0.3em 0.1em;
                font-size: 0.9em; 
            }
            a{
                background-color: #47467b; 
                color: #F9f2e7; border: 0; 
                border-radius: 15px; 
                padding: 0.2em 2em 0.2em;
                font-size: 2em; 
                text-decoration:none;
            }
            a:hover{
                background-color: #F9f2e7; 
                color: #47467b;
            }
            #sub{
                background-color: #f7b1c3; 
                color: #47467b;  
                font-size: 1em; 
                border: 0; margin: 1em 0em;
                padding: 0.2em 2em 0.2em;
            }
            #sub:hover{
                background-color: #47467b; 
                color: #F9f2e7;
            }
            }
        </style>
    </head>
    <body>
        <input type="text" id="keyword" onkeyup="send()" placeholder ="ค้นหาวันที่ (ประเภททันตกรรม)"><br>
        <div id="result"></div>
        <h1>POSTPONE</h1>
        <h1>เลื่อนวันที่จองการทำทันตกรรม</h1>
        <form>
            รหัสใบนัด:  <input id="ps" type="text" name="รหัสใบนัด"  value="<?=$key?>"  required ><br><br>
            ประเภทที่ต้องการทำทันตกรรม:  
            <select>
                <option value="">-- select --</option>
                <option value="TB">ถอนฟัน</option>
                <option value="TE">จัดฟัน</option>
                <option value="TF">ขูดหินปูน</option>
                <option value="TI">อุดฟัน</option>
                <option value="TS">รากเทียม</option>
            </select><br><br>
			วันที่นัด: <input type="date" id="date" name="วันที่นัด" required><br><br>
			<input id="sub" type="submit"  value="เลื่อนวันที่นัด" onclick='editdate()'>
        </form>
        <center><a href="loginsuccess.php">BACK</a></center>
    </body>
</html>
