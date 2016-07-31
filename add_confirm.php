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

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed"data-toggle="collapse"data-target="#navbarEexample8">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        住所録システム
      </a>
    </div>
    </div>
    </nav>

<?php
session_start();
//入力チェック
if(empty($_POST["name"]) && empty($_POST["zip1"]) && empty($_POST["zip2"]) && empty($_POST["pref"]) &&empty($_POST["addr1"]) && empty($_POST["addr2"])){
	echo "<p>項目が入力されていません。<a href=\"./add.php\">こちら</a>からやり直してください。</p>";
}
else if(empty($_POST["name"])){
	echo "<p>氏名が入力されていません。<a href=\"./add.php\">こちら</a>からやり直してください。</p>";
	}
else if(empty($_POST["zip1"]) && empty($_POST["zip2"])){
	echo "<p>郵便番号が入力されていません。<a href=\"./add.php\">こちら</a>からやり直してください。</p>";
}
else if(empty($_POST["pref"])){
	echo "<p>都道府県が入力されていません。<a href=\"./add.php\">こちら</a>からやり直してください。</p>";
}
else if(empty($_POST["addsr1"]) && empty($_POST["addr2"])){
	echo "<p>市区町村または町名・番地が入力されていません。<a href=\"./add.php\">こちら</a>からやり直してください。</p>";
}
else{
//全て入力が正常にされている場合項目を表示させる。

	echo "<p>"."氏名：".$_POST["name"]."</p>";
	echo "<p>"."郵便番号：".$_POST["zip1"]."ー".$_POST["zip2"]."</p>";
	echo "<p>"."都道府県：".$_POST["pref"]."</p>";
	echo "<p>"."市区町村：".$_POST["addr1"]."</p>";
	echo "<p>"."町名・番地：".$_POST["addr2"]."</p>";
	echo "<p>"."建物名:".$_POST["addr"]."</p>";
	echo "<p>"."この内容でよろしければ、登録ボタンを押して下さい。"."</p>";

	echo "<form action=\"./add_complete.php\" method=\"POST\">
 <input type=\"hidden\" name=\"name\" value=\"{$_POST["name"]}\">
 <input type=\"hidden\" name=\"zip1\" value=\"{$_POST["zip1"]}\">
 <input type=\"hidden\" name=\"zip2\" value=\"{$_POST["zip2"]}\">
 <input type=\"hidden\" name=\"pref\" value=\"{$_POST["pref"]}\">
 <input type=\"hidden\" name=\"addr1\" value=\"{$_POST["addr1"]}\">
 <input type=\"hidden\" name=\"addr2\" value=\"{$_POST["addr2"]}\">
 <input type=\"hidden\" name=\"addr\" value=\"{$_POST["addr"]}\">
 <input type=\"submit\" value=\"送信\">
</form>";
 } 
?>



</body>
</html>

