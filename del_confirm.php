<?php
//DB接続情報
$dns = "mysql:host=localhost;dbname=phpwork;charset=utf8";
//ユーザー名とパスワード
$pdo = new PDO($dns,"root","root");

$dellid = $_POST['delid'];

$sql = "SELECT * FROM work01 
    	WHERE id = '$dellid'";

$stmh = $pdo->prepare($sql);
$stmh->execute();

$result = $stmh->fetch(PDO::FETCH_ASSOC);
?>

<html lang="ja">
<head>

<link href="css/reset.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">

<script src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script src="js/bootstrap.min.js" charset="UTF-8"></script>
<script src="js/ajaxzip3.js" charset="UTF-8"></script>	
</head>
<title>確認</title>


</head>
<body>


<?php

	echo "<p>"."氏名：".$result["name"]."</p>";
	echo "<p>"."郵便番号：".$result["zip1"]."ー".$result["zip2"]."</p>";
	echo "<p>"."都道府県：".$result["pref"]."</p>";
	echo "<p>"."市区町村：".$result["addr1"]."</p>";
	echo "<p>"."町名・番地：".$result["addr2"]."</p>";
	echo "<p>"."建物名:".$result["addr"]."</p>";
	echo "<p>"."この内容でよろしければ、削除ボタンを押して下さい。"."</p>";

	echo "<form action=\"./del_complete.php\" method=\"POST\">
 <input type=\"hidden\" name=\"deletesid\" value=\" '".$dellid."'\">
 <input type=\"hidden\" name=\"delname\" value=\"{$_POST["name"]}\">
 <input type=\"hidden\" name=\"delzip1\" value=\"{$_POST["zip1"]}\">
 <input type=\"hidden\" name=\"delzip2\" value=\"{$_POST["zip2"]}\">
 <input type=\"hidden\" name=\"delpref\" value=\"{$_POST["pref"]}\">
 <input type=\"hidden\" name=\"deladdr1\" value=\"{$_POST["addr1"]}\">
 <input type=\"hidden\" name=\"deladdr2\" value=\"{$_POST["addr2"]}\">
 <input type=\"hidden\" name=\"deladdr\" value=\"{$_POST["addr"]}\">
 <input type=\"submit\" value=\"削除\"></form>";

 echo "<input type=\"submit\" value=\"戻る\" onclick=\"location.href='./main.php' \">";

?>





</body>
</html>
