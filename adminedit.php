<?php
session_start();
//DB接続情報
$dns = "mysql:host=localhost;dbname=phpwork;charset=utf8";
//ユーザー名とパスワード
$pdo = new PDO($dns,"root","root");

$sql = "SELECT * FROM auth
    	WHERE name = '".$_SESSION["USERID"]."'";

$stmh = $pdo->prepare($sql);
$stmh->execute();
$result = $stmh->fetch(PDO::FETCH_ASSOC);

$_SESSION["userid"] = $result["userid"];
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

<script type="text/javascript">
function disp(){

	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
	if(window.confirm('本当によろしいですか？')){

		location.href = "userdel.php"; // example_confirm.html へジャンプ

	}
	// 「OK」時の処理終了

	// 「キャンセル」時の処理開始
	else{

	}
	// 「キャンセル」時の処理終了

}
</script>
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
    <p class="navbar-text navbar-right"><a href="./main.php"style="margin-right:25px;">戻る
    </a></p>
    </div>
    </div>
    </nav>

<h2 class="form-signin-heading">アカウント情報編集フォーム</h2>
<div class="container">
<form class="form-inline" action="./adminedit_confirm.php" method="POST" style="text-align:center;">
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>
      <label for="name">User ID</label>
      <span class="reauired">(必須)</span>
      </th>
      <td>
      <div class="form-group">
      <input type="text" id="username" name="editusername" class="form-control" disabled="disable" value="<?php print $result["name"]?>" size="20">
      </div>
      </td>
      </tr>
      <tr>
<th>
<label for="addr1">編集するパスワード</label>
<span class="reauired">(必須)</span>
</th>
<td>
<div class="form-group">
 <input type="password" class="form-control" id="password" name="editpassword" value="" size="20" onkeyup="setPasswordLevel(this.value);">
 <input type="text" disabled="disabled" style="border:none;" id="level">
</div>
</td>
</tr>
</thead>
 </table>
<br>
<a href="#" onClick="disp()">退会する </a>
<br>
<br>
<input type="submit" class="btn btn-secondary" value="送信"> 
<input type="reset" class="btn btn-secondary" value="リセット"> 
</form>
</div>
</body>
</html>