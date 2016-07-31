<?php
//DB接続情報
$dns = "mysql:host=localhost;dbname=phpwork;charset=utf8";
//ユーザー名とパスワード
$pdo = new PDO($dns,"root","root");


$editid1 = $_POST['editida'];
$editname = $_POST["editname"];
$editzip1 = $_POST["editzip1"];
$editzip2 = $_POST["editzip2"];
$editpref = $_POST["editpref"];
$editaddr1 = $_POST["editaddr1"];
$editaddr2 = $_POST["editaddr2"];
$editaddr = $_POST["editaddr"];


$sql = "UPDATE `work01` SET `name`='".$editname."',`zip1`='".$editzip1."',`zip2`='".$editzip2."',`pref`='".$editpref."',`addr1`='".$editaddr1."',`addr2`='".$editaddr2."',`addr`='".$editaddr."' WHERE id = '".$editid1."'
";

$stmt = $pdo -> prepare($sql);
$stmt->execute();

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
      <a class="navbar-brand" href="#">
        住所録システム
      </a>
    </div>
    </div>
    </nav>

<h2 class="form-signin-heading">住所録の編集が完了しました。</h2>
<div class="container" style="text-align:center;">
<a href="main.php">戻る</a>
</div>
<br>

</body>
</html>