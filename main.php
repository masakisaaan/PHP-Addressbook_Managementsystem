<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: logout.php");
  exit;
}

// 接続情報
$dns = "mysql:host=localhost;dbname=phpwork;charset=utf8";
// ユーザ名、パスワード
$pdo = new PDO($dns,"root","root");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// URLからページの値をとってくる
if(isset($_GET["page"]))
{
    $page = $_GET["page"];
}
else
{
    $page = 1;// デフォルト値
}

$offset = ($page-1)*10;
$sql = "select * from work01 where list_userid = '".$_SESSION["USERID"]."'
limit 10 offset $offset";
$stmh = $pdo->prepare($sql);
$stmh->execute();
?>

<html>
<head>
	<link href="css/reset.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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

<div class="container" style="margin-top:150px;">
<div class="table-responsive">
	<table class="table">
    <thead>
      <tr>
        <th style="text-align:center;">ID</th>
        <th style="text-align:center;">氏名</th>
        <th style="text-align:center;">郵便番号</th>
        <th style="text-align:center;">都道府県</th>
        <th style="text-align:center;">市区町村</th>
        <th style="text-align:center;">町名・番地</th>
        <th style="text-align:center;">建物名</th>
      </tr>
      </thead>
     <tbody>

     
            <?php
                while($result = $stmh->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td style=\"text-align:center;\">".$result["id"]."</td>";
                    echo "<td style=\"text-align:center;\">".$result["name"]."</td>";
                    echo "<td style=\"text-align:center;\">".$result["zip1"]."ー".$result["zip2"]."</td>";
                    echo "<td style=\"text-align:center;\">".$result["pref"]."</td>";
                    echo "<td style=\"text-align:center;\">".$result["addr1"]."</td>";
                    echo "<td style=\"text-align:center;\">".$result["addr2"]."</td>";
                    echo "<td style=\"text-align:center;\">".$result["addr"]."</td>";

                    echo "<form action=\"edit.php\" method=\"POST\">
                    <td>
                    <input type=\"hidden\" name=\"editid\" value=\"".$result["id"]."\">
                    <input type=\"submit\" class=\"btn btn-success\" name=\"edit\" value=\"編集\" onclick=\"location.href='./edit.php'\"></td>
                    </form>";

                    echo "<form action=\"./del_confirm.php\" method=\"POST\">
                    <td>
                    <input type=\"hidden\" name=\"delid\" value=\"".$result["id"]."\">
                    <input type=\"submit\" class=\"btn btn-danger\" name=\"delete\" value=\"削除\" onclick=\"location.href='./del.php'\"></td>
                    </form>";
                    
                    echo "</tr>";


                }
            ?>

            </form>
            </table>
            </div>
            </div>

     <nav style="text-align:center;">
          <ul class="pagination">
            <li>
              <a href="main.php?page=<?php print($page - 1); ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="?page=1">1</a></li>
            <li><a href="?page=2">2</a></li>
            <li><a href="?page=3">3</a></li>
            <li><a href="?page=4">4</a></li>
            <li><a href="?page=5">5</a></li>
            <li>
              <a href="main.php?page=<?php print($page + 1); ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>

</body>
</html>