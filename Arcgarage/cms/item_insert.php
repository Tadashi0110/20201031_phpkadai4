<?php
//----------------------------------------------------
//１．入力チェック(受信確認処理追加)
//----------------------------------------------------
//商品名 受信チェック:item
if(!isset($_POST["itemname"]) || $_POST["itemname"] == ""){
  exit("ParamError!itemname!");
}

//金額 受信チェック:value
if(!isset($_POST["value"]) || $_POST["value"] == ""){
  exit("ParamError!value!");
}

//ファイル受信チェック※$_FILES["******"]["name"]の場合
if(!isset($_FILES["fname"]["name"]) || $_POST["itemname"]["name"] == ""){
  exit("ParamError!Files!");
}

//商品紹介文 受信チェック:brand
if(!isset($_POST["brand"]) || $_POST["brand"] == ""){
  exit("ParamError!brand!");
}

//商品紹介文 受信チェック:company
if(!isset($_POST["company"]) || $_POST["company"] == ""){
  exit("ParamError!company!");
}

//商品紹介文 受信チェック:modelnum
if(!isset($_POST["modelnum"]) || $_POST["modelnum"] == ""){
  exit("ParamError!modelnum!");
}

//商品紹介文 受信チェック:description
if(!isset($_POST["detail"]) || $_POST["detail"] == ""){
  exit("ParamError!description!");
}

// echo $_POST["value"] ;


//----------------------------------------------------
//２. POSTデータ取得
//----------------------------------------------------
$fname  = $_FILES["fname"]["name"];   //File名
$itemname  = $_POST["itemname"];   //商品名
$value  = $_POST["value"];   //価格(数字：intvalを使う)
$brand  = $_POST["brand"];   //メーカー
$company = $_POST["company"]; //取り扱い会社
$modelnum = $_POST["modelnum"]; //製品番号
$detail = $_POST["detail"];   //商品紹介文


//1-2. FileUpload処理
$upload = "../img/"; //画像アップロードフォルダへのパス ..は一つ上の
//アップロードした画像を../img/へ移動させる記述↓
if(move_uploaded_file($_FILES['fname']['tmp_name'], $upload.$fname)){
  //FileUpload:OK
} else {
  //FileUpload:NG
  echo "Upload failed";
  echo $_FILES['fname
  ']['error'];
}

//----------------------------------------------------
//３. DB接続します(エラー処理追加)
//----------------------------------------------------
try {
  $pdo = new PDO('mysql:dbname=ec_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//----------------------------------------------------
//４．データ登録SQL作成
//----------------------------------------------------
$stmt = $pdo->prepare("INSERT INTO gs_item_table(id, itemname, fname, value, brand, company, modelnum, detail
)VALUES(NULL, :itemname, :fname, :value, :brand, :company, :modelnum, :detail )");
$stmt->bindValue(':itemname', $itemname, PDO::PARAM_STR);
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
$stmt->bindValue(':value', $value, PDO::PARAM_INT); //数値
$stmt->bindValue(':brand', $brand, PDO::PARAM_STR);
$stmt->bindValue(':company', $company, PDO::PARAM_STR);
$stmt->bindValue(':modelnum', $modelnum, PDO::PARAM_STR);
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
$status = $stmt->execute();

//----------------------------------------------------
//５．データ登録処理後
//----------------------------------------------------
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．item.phpへリダイレクト
  header("Location: item_list.php");
  exit;
}
?>
