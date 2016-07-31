<?php

/*
http://replication.hatenablog.com/entry/2014/06/30/005815
から引用。
*/

require './password.php';

session_start();

$db['host'] = ""; //addres
$db['user'] = ""; //user_id
$db['pass'] = ""; //password
$db['dbname'] = ""; //dbname

$errorMessage = "";

//入力チェック
if (isset($_POST["login"])) {
  if (empty($_POST["userid"])) {
    $errorMessage = "ユーザIDが未入力です。";
  } else if (empty($_POST["password"])) {
    $errorMessage = "パスワードが未入力です。";
  } 

  //認証
  if (!empty($_POST["userid"]) && !empty($_POST["password"])) {
    // mysqlへ接続
    $mysqli = new mysqli($db['host'], $db['user'], $db['pass']);
    if ($mysqli->connect_errno) {
      print('<p>データベースへの接続に失敗しました。</p>' . $mysqli->connect_error);
      exit();
    }

    // データベースの選択
    $mysqli->select_db($db['dbname']);

    // サニタイジング
    $userid = $mysqli->real_escape_string($_POST["userid"]);

    // クエリの実行
    $query = "SELECT * FROM auth WHERE name = '" . $userid . "'";
    $result = $mysqli->query($query);
    if (!$result) {
      print('クエリーが失敗しました。' . $mysqli->error);
      $mysqli->close();
      exit();
    }

    while ($row = $result->fetch_assoc()) {
      // パスワード(暗号化済み）の取り出し
      $db_hashed_pwd = $row['password'];
      $passwordHash = password_hash($db_hashed_pwd, PASSWORD_DEFAULT);
    }

    // データベースの切断
    $mysqli->close();

    // ３．画面から入力されたパスワードとデータベースから取得したパスワードのハッシュを比較します。
    //if ($_POST["password"] == $pw) {
    if (password_verify($_POST["password"], $passwordHash)) {
      // ４．認証成功なら、セッションIDを新規に発行する
      session_regenerate_id(true);
      $_SESSION["USERID"] = $_POST["userid"];
      header("Location: ./main.php");
      exit;
    } 
    else {
      // 認証失敗
      $errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
    } 
  } else {
    // 未入力なら何もしない
  } 
} 
 
?>
<!doctype html>
<html>
  <head>
  <link href="css/reset.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet"> 
  <link href="css/style.css" rel="stylesheet">
  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <title>ログイン</title>
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

    <div class="collapse navbar-collapse" id="navbarEexample8">
    <p class="navbar-text navbar-right"><a href="./register.php"style="margin-right:25px;">登録
    </a></p>
    </div>
     </div>
</nav>


  <!-- $_SERVER['PHP_SELF']はXSSの危険性があるので、actionは空にしておく -->
  <!--<form id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">-->
  <div><?php echo $errorMessage ?></div>
  <div class="container" style="  margin-top: 100px;
  width:20%;
  margin-right:auto;
  margin-left:auto;
";>
  <form class="form-signin" id="loginForm" name="loginForm" action="" method="POST">
        <h2 class="form-signin-heading">ログイン</h2>

        <label for="userid" class="sr-only">User ID</label>
        <input type="text"class="form-control" id="userid" name="userid" value="<?php echo htmlspecialchars($_POST["userid"], ENT_QUOTES); ?>" placeholder="User ID" required autofocus>
        <br>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" value=""class="form-control" placeholder="Password" required>
        
        <div class="checkbox">
          <label><input type="checkbox" value="remember-me"> Remember me</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block"  id="login" name="login" type="submit" value="">Login</button>
      </form>
    </div> 
  </body>
</html>
