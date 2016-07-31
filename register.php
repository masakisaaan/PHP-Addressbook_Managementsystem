<?php
//DB接続情報
$dns = "mysql:host=localhost;dbname=phpwork;charset=utf8";
//ユーザー名とパスワード
$dns = new PDO($dns,"root","root");
?>

<html>
<head>
<link href="css/reset.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<script src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script src="js/bootstrap.min.js" charset="UTF-8"></script>
 <script src="js/passwordchecker.js"></script>
  
  <script  type="text/javascript">
   function setPasswordLevel(password) {
    var level = getPasswordLevel(password);
    var text = "";
  
    if (level == 1) { text = "弱い";}
    if (level == 2) { text = "やや弱い";}
    if (level == 3) { text = "普通";}
    if (level == 4) { text = "やや強い";}
    if (level == 5) { text = "強い";}
  
    document.getElementById("level").value = text;
  }
  </script>
</head>
<body>

<div id="progress-bar"></div>

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
    <div class="collapse navbar-collapse" id="navbarEexample8">
    <p class="navbar-text navbar-right"><a href="./main.php"style="margin-right:25px;">戻る
    </a></p>
    </div>
    </div>
    </nav>

<h2 class="form-signin-heading">アカウント登録</h2>
<div class="container">
<form class="form-inline" action="./register_confirm.php" method="POST" style="text-align:center;">
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>
      <label for="userid">登録するユーザーID</label>
      <span class="reauired">(必須)</span>
      </th>
      <td>
      <div class="form-group">
      <input type="text" class="form-control" name="username" value="" size="20">
      </div>
      </td>
      </tr>
      <tr>
      <th>
      <label for="userid">登録するパスワード</label>
      <span class="reauired">(必須)</span>
      </th>
      <td>
      <div class="form-group">
      <input type="password" class="form-control" name="password" value="" size="20" onkeyup="setPasswordLevel(this.value);">
      <input type="text" disabled="disabled" style="margin-left:20px; border:none;" id="level">
      </div>
      </td>
      </tr>
      </thead>
      </table>
<br>
<input type="submit" class="btn btn-primary"value="送信">
<input type="reset" class="btn btn-primary"value="リセット">

</form>
</div>
</body>
</html>

