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
//入力チェック
if(empty($_POST["editname"]) && empty($_POST["editzip1"]) && empty($_POST["editzip2"]) && empty($_POST["editpref"]) &&empty($_POST["editaddr1"]) && empty($_POST["editaddr2"])){
	echo "<p>項目が入力されていません。<a href=\"./edit.php\">こちら</a>からやり直してください。</p>";
}
else if(empty($_POST["editname"])){
	echo "<p>氏名が入力されていません。<a href=\"./edit.php\">こちら</a>からやり直してください。</p>";
	}
else if(empty($_POST["editzip1"]) && empty($_POST["editzip2"])){
	echo "<p>郵便番号が入力されていません。<a href=\"./edit.php\">こちら</a>からやり直してください。</p>";
}
else if(empty($_POST["editaddr1"]) && empty($_POST["editaddr2"])){
	echo "<p>市区町村または町名・番地が入力されていません。<a href=\"./edit.php\">こちら</a>からやり直してください。</p>";
}
else{
//全て入力が正常にされている場合項目を表示させる。
	echo "<p>"."氏名：".$_POST["editname"]."</p>";
	echo "<p>"."郵便番号：".$_POST["editzip1"]."ー".$_POST["editzip2"]."</p>";
	echo "<p>"."都道府県：".$_POST["editpref"]."</p>";
	echo "<p>"."市区町村：".$_POST["editaddr1"]."</p>";
	echo "<p>"."町名・番地：".$_POST["editaddr2"]."</p>";
	echo "<p>"."建物名:".$_POST["addr"]."</p>";
	echo "<p>"."この内容でよろしければ、編集ボタンを押して下さい。"."</p>";

	echo "<form action=\"./edit_complete.php\" method=\"POST\">
 <input type=\"hidden\" name=\"editida\" value=\"{$_POST["editids"]}\">
 <input type=\"hidden\" name=\"editname\" value=\"{$_POST["editname"]}\">
 <input type=\"hidden\" name=\"editzip1\" value=\"{$_POST["editzip1"]}\">
 <input type=\"hidden\" name=\"editzip2\" value=\"{$_POST["editzip2"]}\">
 <input type=\"hidden\" name=\"editpref\" value=\"{$_POST["editpref"]}\">
 <input type=\"hidden\" name=\"editaddr1\" value=\"{$_POST["editaddr1"]}\">
 <input type=\"hidden\" name=\"editaddr2\" value=\"{$_POST["editaddr2"]}\">
 <input type=\"hidden\" name=\"editaddr\" value=\"{$_POST["editaddr"]}\">
 <input type=\"submit\" value=\"編集\">
</form>";

}
?>





</body>
</html>