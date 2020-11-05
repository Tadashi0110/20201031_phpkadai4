<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=ec_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_item_table");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
 //execute（SQL実行時にエラーがある場合）
 $error = $stmt->errorInfo();
 exit("ErrorQuery:".$error[2]);

} else {
 //Selectデータの数だけ自動でループしてくれる
 while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
      $view .='<li class="cart-list">';
      $view .='<p class="cart-thumb"><img src="../img/'.$res["fname"].'" width="200"></p>';
      $view .='<h2 class="cart-title">'.$res["itemname"].'</h2>';
      $view .='<p class="cart-price">'.$res["value"].'</p>';
      $view .='<a href="item_detail.php?id=' . $res["id"] . ' " class="btn-update">';
      $view .='編集';
      $view .='</a>';   
      $view .= '<a href="item_delete.php?id=' . $res["id"] . ' " class="btn-update">';
      $view .='削除';
      $view .='</a>';
      $view .='</li>';
 }
 echo $view;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
</head>
<body class="cms">
  <!--header-->

  <header class="header">
    <p class="site-title"><a href="item_add.php"><img src="../images/common/art.png" width="200px"></a></p>
  </header>
  <!--end header  -->



  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">

     

      <div class="footer-widget">
        <ul class="nav-footer">
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
        </ul>
      </div>

      <div class="footer-widget">
        <ul class="nav-footer">
          <li class="nav-footer__item"><a href="../index.php">Top Page</a></li>
          <li class="nav-footer__item"><a href="#">Contact Us</a></li>
          <li class="nav-footer__item"><a href="#">Cart</a></li>
          <li class="nav-footer__item"><a href="#">Member Page</a></li>
        </ul>
      </div>

      <div class="footer-widget">
        <ul class="social-list">
          <li class="social-item"><a href="#"><img src="../images/common/facebook.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="../images/common/instagram.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="../images/common/twitter.png" alt=""></a></li>
        </ul>
      </div>

    </div>
    <p class="copyrights"><small>Copyrights G’s Academy Tokyo All Rights Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
</body>
</html>
