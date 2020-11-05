<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="acc_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>アカウント作成</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>フリガナ：<input type="text" name="kana"></label><br>
     <label>Email：<input type="text" name="email"></label><br>
     <label>Pass：<input type="text" name="pass"></label><br>
     <label>郵便番号：<input type="text" name="postnum"></label><br>
     <label>住所：<input type="text" name="adress"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
