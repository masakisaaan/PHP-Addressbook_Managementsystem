<?php
session_start();

// 接続情報
$dns = "mysql:host=localhost;dbname=phpwork;charset=utf8";
// ユーザ名、パスワード
$pdo = new PDO($dns,"root","root");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$listid = $_SESSION["USERID"];
$name = $_POST["name"];
$zip1 = $_POST["zip1"];
$zip2 = $_POST["zip2"];
$pref = $_POST["pref"];
$addr1 = $_POST["addr1"];
$addr2 = $_POST["addr2"];
$addr = $_POST["addr"];


$sql = "INSERT INTO `work01` (`id`,`list_userid`,`name`,`zip1`,`zip2`,`pref`,`addr1`,`addr2`,`addr`) VALUES ('NULL','$listid','$name','$zip1','$zip2','$pref','$addr1','$addr2','$addr');";
$stmh = $pdo->prepare($sql);
$stmh->execute();
?>

<html>
<head>
<link href="css/reset.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<script src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script src="js/bootstrap.min.js" charset="UTF-8"></script>
<script src="js/ajaxzip3.js" charset="UTF-8"></script>	
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

<h2 class="form-signin-heading">住所録情報の追加が完了しました。</h2>
<div class="container" style="text-align:center;">
<a href="main.php">ホームに戻る</a>
</div>

</body>
</html>
