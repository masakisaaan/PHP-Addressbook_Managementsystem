<html lang="ja">
<head>

<link href="css/reset.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">

<script src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script src="js/bootstrap.min.js" charset="UTF-8"></script>	
</head>
<title>確認</title>

</head>
<body>

<?php
session_start();
//入力チェック
if(empty($_POST["editpassword"])){
	echo "<p>パスワードが入力されていません。<a href=\"adminedit.php\">こちら</a>からやり直してください。</p>";
}
else{
//全て入力が正常にされている場合項目を表示させる。
	echo "<p>"."UserID：".$_SESSION["USERID"]."</p>";
	echo "<p>"."パスワード：".$_POST["editpassword"]."</p>";
	echo "<p>"."この内容でよろしければ、登録ボタンを押して下さい。"."</p>";

	echo "<form action=\"./adminedit_complete.php\" method=\"POST\">
 <input type=\"hidden\" name=\"editusername\" value=\"{$_SESSION["userid"]}\">
  <input type=\"hidden\" name=\"editpassworddone\" value=\"{$_POST["editpassword"]}\">
 <input type=\"submit\" value=\"送信\">
</form>";
}
?>

</body>
</html>