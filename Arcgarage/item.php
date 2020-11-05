<?php
session_start();

//GETでidを取得
if(!isset($_GET["id"]) || $_GET["id"]==""){
  exit("ParamError!");
}else{
  $id = intval($_GET["id"]); //intval数値変換
}

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=ec_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_item_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  $row = $stmt->fetch(); //１レコードだけ取得：$row["フィールド名"]で取得可能
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
</head>
<body>
  <!--header-->
  <header class="header">
    <p class="site-title"><a href="#"><img src="images/common/logo.png" alt="G's Academy Tokyo"></a></p>
    <a href="cart.php" class="btn btn-cart"><img src="images/common/icon-cart.png" alt="G's Academy Tokyo"></a>
    <a href="#" class="btn btn-menu"><img src="images/common/icon-menu.png" alt=""></a>
  </header>
  <!-- end header-->
<form action="cartadd.php" method="POST">
  <div class="outer">
    <!--商品本情報-->
    <div class="wrapper wrapper-item flex-parent">

      <main class="wrapper-main">

        <!--商品情報-->
        <p class="item-thumb"><img src="./img/<?=$row["fname"]?>" width="200"></p>
        <div class="flex-parent item-label">
          <h3 class="item-name"><?=$row["itemname"]?></h3>
          <p class="item-price"><?=$row["value"]?></p>
          <p><input type="number" value="1" name="num" class="cartin-number"></p>
        </div>
        <!--カートボタン-->
        <div class="flex-parent item-label">
          <input type="submit" class="btn-cartin" value="カートに入れる">
        </div>
        <!--商品詳細情報-->
        <div class="flex-parent item-label">
          <p class="item-text"><?=$row["brand"]?></p>
          <p class="item-text"><?=$row["company"]?></p>
          <p class="item-text"><?=$row["modelnum"]?></p>  
          <p class="item-text"><?=$row["detail"]?></p>
        </div>
        <input type="hidden" name="itemname" value="<?=$row["itemname"]?>">
        <input type="hidden" name="value" value="<?=$row["value"]?>">
        <input type="hidden" name="id" value="<?=$row["id"]?>">
        <input type="hidden" name="fname" value="<?=$row["fname"]?>">
        <input type="hidden" name="brand" value="<?=$row["brand"]?>">
        <input type="hidden" name="company" value="<?=$row["company"]?>">
        <input type="hidden" name="modelnum" value="<?=$row["modelnum"]?>">
        <input type="hidden" name="detail" value="<?=$row["detail"]?>">
   
      </main>
    </div>
  </div>
</form>

  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">

      <div class="footer-widget__long">
        <p><a href="#"><img src="images/common/art.png" alt="g's academy tokyo"></a></p>
      </div>


      <div class="footer-widget">
        <ul class="nav-footer">
          <li class="nav-footer__item"><a href="../index.php">Top Page</a></li>
          <li class="nav-footer__item"><a href="../cart.php">Cart</a></li>
          <li class="nav-footer__item"><a href="../login.php">Login</a></li>
          <li class="nav-footer__item"><a href="../acc.php">Create Account</a></li>
        </ul>
      </div>

      <div class="footer-widget">
        <ul class="social-list">
          <li class="social-item"><a href="#"><img src="images/common/facebook.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="images/common/instagram.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="images/common/twitter.png" alt=""></a></li>
        </ul>
      </div>

    </div>
    <p class="copyrights"><small>Copyrights G’s Academy Tokyo All Rights Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
</body>
</html>
