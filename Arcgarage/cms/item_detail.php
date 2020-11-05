 <?php
$id = $_GET["id"]; //?id~**を受け取る
// echo ($id);
// require_once("funcs.php");
// $pdo = db_connect();

// 1.db接続
try {
    $pdo = new PDO('mysql:dbname=ec_db;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_item_table WHERE id=" . $id);
// $stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();


//３．データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?> 



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="item_list.php">アイテム一覧へ戻る</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->

       <!--商品本情報-->
       <div class="wrapper wrapper-cms">
      <!--商品選択フォーム-->
      <form action="item_update.php" method="post" class="flex-parent cartin-area cms-area" enctype="multipart/form-data">
        <!--商品情報-->
         <p class="cms-thumb"><img src="../img/<?= $row["fname"] ?>" width="200" ></p>
        <dl class="cms-list">
          <dt>画像</dt>
          <dd><input type="file" name="fname" class="cms-item" accept="image/*" ></dd>
          <dt>商品名</dt>
          <dd><input type="text" name="itemname" value="<?= $row['itemname'] ?>" class="cms-item"></dd>
          <dt>金額</dt>
          <dd><input type="text" name="value" value="<?= $row['value'] ?>" class="cms-item"></dd>
          <dt>メーカー</dt>
          <dd><input type="text" name="brand" value="<?= $row['brand'] ?>" class="cms-item"></dd>
          <dt>取り扱い会社</dt>
          <dd><input type="text" name="company" value="<?= $row['company'] ?>" class="cms-item"></dd>
          <dt>製品番号</dt>
          <dd><input type="text" name="modelnum" value="<?= $row['modelnum'] ?>" class="cms-item"></dd>
          <dt>商品紹介文</dt>
          <dd><textarea name="detail" id="" cols="30" rows="10" class="cms-item" ><?= $row['detail'] ?></textarea></dd>
        </dl>
        <!--end 商品情報-->
        <ul class="btn-list btn-list__cms">
          <li class="btn-calculate">
            <input type="submit" id="btn-update" value="登録">
          </li>
        </ul>
        </form>
        <!--end 商品選択フォーム-->
    </div>
    <!--end 商品本情報-->
  </div>


<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
<script>
//---------------------------------------------------
//画像サムネイル表示
//---------------------------------------------------
// アップロードするファイルを選択
$('input[type=file]').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.cms-thumb > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.cms-thumb > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});
</script>


</body>

</html>
