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
<script src="js/ajaxzip3.js" charset="UTF-8"></script>

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

<h2 class="form-signin-heading">住所追加フォーム</h2>
<div class="container">
<form class="form-inline" action="./add_confirm.php" method="POST" style="text-align:center;">
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
      <th>
      <label for="name">氏名</label>
      <span class="reauired">(必須)</span>
      </th>
      <td>
      <div class="form-group">
      <input type="text" class="form-control" name="name" size="20">
      </div>
      </td>
      </tr>
      <tr>
      <th>
      <label for="zip1">郵便番号 (半角)</label>
      <span class="reauired">(必須)</span>
      </th>
      <td>
      <div class="form-group">
    <input type="text" class="form-control" name="zip1" size="4" maxlength="3"> － 
         <input type="text" class="form-control" name="zip2" size="5" maxlength="4">
<input type="button" class="btn btn-default" value="〒→変換" onClick="AjaxZip3.zip2addr('zip','zip2','pref','addr1','addr2')"
onkeyup="AjaxZip3.zip2addr('zip1','zip2','pref','addr1','addr2');">
</div>
</td>
</tr>
<tr>
<th>
<label for="pref">都道府県</label>
<span class="reauired">(必須)</span>
</th>
<td>
<div class="form-group">
            <select class="form-control" name="pref">
            <option value="">-- 選択してください --</option>
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="岩手県">岩手県</option>
            <option value="宮城県">宮城県</option>
            <option value="秋田県">秋田県</option>
            <option value="山形県">山形県</option>
            <option value="福島県">福島県</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
        </select>
</div>
</td>
</tr>
<tr>
<th>
<label for="addr1">市区町村 (全角)</label>
<span class="reauired">(必須)</span>
</th>
<td>
<div class="form-group">
 <input type="text" class="form-control" name="addr1" size="40">
</div>
</td>
</tr>
<tr>
<th>
<label for="addr2">町名・番地 (全角)</label>
<span class="reauired">(必須)</span>
</th>
<td>
<div class="form-group">
 <input type="text" class="form-control" name="addr2" size="40"> <br>
</div>
</td>
</tr>
<tr>
<th>
<label for="addr">建物名 (全角)</label>
</th>
<td>
<div class="form-group">
 <input type="text" class="form-control" name="addr" size="40"> <br>
</div>
</td>
 </tr>      
 </thead>
 </table>
<br>
<input type="submit" class="btn btn-secondary" value="送信"> 
<input type="reset" class="btn btn-secondary" value="リセット"> 

</form>
</div>
</body>
</html>
