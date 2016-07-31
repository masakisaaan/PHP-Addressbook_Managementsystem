<?php
session_start();
//DB接続情報
$dns = "mysql:host=localhost;dbname=phpwork;charset=utf8";
//ユーザー名とパスワード
$pdo = new PDO($dns,"root","root");

$sql = "DELETE FROM work01 WHERE list_userid = '".$_SESSION["USERID"]."'
";

$stmh = $pdo->prepare($sql);
$stmh->execute();

$sql = "DELETE FROM auth WHERE userid = '".$_SESSION["userid"]."'
";

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
      <a class="navbar-brand" href="main.php">
        住所録システム
      </a>
    </div>
</nav>

<h2 class="form-signin-heading">退会処理が完了しました。</h2>
<div class="container" style="text-align:center;">
<a href="login.php">TOP</a>
</div>

</body>
</html>
