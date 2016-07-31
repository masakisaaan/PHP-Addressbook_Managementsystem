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
if(empty($_POST["username"]) && empty($_POST["password"])){
	echo "<p>項目が入力されていません。<a href=\"./register.php\">こちら</a>からやり直してください。</p>";
}
else if(empty($_POST["username"])){
	echo "<p>UserIDが入力されていません。<a href=\"./register.php\">こちら</a>からやり直してください。</p>";
	}
	else if(empty($_POST["password"])){
	echo "<p>パスワードが入力されていません。<a href=\"./register.php\">こちら</a>からやり直してください。</p>";
	}

else{
//全て入力が正常にされている場合項目を表示させる。
	echo "<p>"."UserID：".$_POST["username"]."</p>";
	echo "<p>"."パスワード：".$_POST["password"]."</p>";
	echo "<p>"."この内容でよろしければ、登録ボタンを押して下さい。"."</p>";

	echo "<form action=\"./register_complete.php\" method=\"POST\">
 <input type=\"hidden\" name=\"username\" value=\"{$_POST["username"]}\">
  <input type=\"hidden\" name=\"passworddone\" value=\"{$_POST["password"]}\">
 <input type=\"submit\" value=\"送信\">
</form>";
}
?>





</body>
</html>