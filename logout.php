<?php
session_start();

if (isset($_SESSION["USERID"])) {
  echo "<h2 class=\"form-signin-heading\">ログアウトしました。</h2>";
}
else {
  echo "<h2 class=\"form-signin-heading\">セッションがタイムアウトしました。</h2>";
}
$_SESSION = array();
@session_destroy();
?>
<html>
  <head>
  <link href="css/reset.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet"> 
  <link href="css/style.css" rel="stylesheet">
  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <title>ログアウト</title>
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
<div class="container" style="text-align:center;">
<a href="login.php">ログイン画面に戻る</a>
  </body>
</html>