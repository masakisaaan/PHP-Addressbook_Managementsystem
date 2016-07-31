<?php
// 接続情報
$dns = "mysql:host=localhost;dbname=phpwork;charset=utf8";
// ユーザ名、パスワード
$pdo = new PDO($dns,"root","root");

$deleteid = $_POST["deletesid"];
$deletename = $_POST["delname"];
$deletezip1 = $_POST["delzip1"];
$deletezip2 = $_POST["delzip2"];
$deleteref = $_POST["delpref"];
$deleteaddr1 = $_POST["deladdr1"];
$deleteaddr2 = $_POST["deladdr2"];
$deleteaddr = $_POST["deladdr"];



$sql = "DELETE FROM work01
        WHERE id = $deleteid;
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
      <a class="navbar-brand" href="main.php">
        住所録システム
      </a>
    </div>

<div class="collapse navbar-collapse" id="navbarEexample8">
  <ul class="nav navbar-nav">
        <li><a href="./adminedit.php">アカウント編集</a></li>
        <li><a href="./add.php">住所追加</a></li>
      </ul>
    <p class="navbar-text navbar-right"><a href="./logout.php" style="margin-right:20px;">ログアウト
    </a></p>
    <p class="navbar-text navbar-right">ようこそ<?=htmlspecialchars($_SESSION["USERID"], ENT_QUOTES); ?>さん</p>
    </div>
     </div>
</nav>

<h2 class="form-signin-heading">住所録情報の追加が完了しました。</h2>
<div class="container" style="text-align:center;">
<a href="main.php">ホームに戻る</a>
</div>

</body>
</html>
