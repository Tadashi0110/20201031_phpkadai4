<?php
//1. POSTデータ取得
$fname  = $_FILES["fname"]["name"];   //File名
$itemname  = $_POST["itemname"];   //商品名
$value  = $_POST["value"];   //価格(数字：intvalを使う)
$brand  = $_POST["brand"];   //メーカー
$company = $_POST["company"]; //取り扱い会社
$modelnum = $_POST["modelnum"]; //製品番号
$detail = $_POST["detail"];   //商品紹介文
$id = $_POST["id"];



//1-2. FileUpload処理
// $upload = "../img/"; //画像アップロードフォルダへのパス ..は一つ上の
// //アップロードした画像を../img/へ移動させる記述↓
// if(move_uploaded_file($_FILES['fname']['name'], $upload.$fname)){
//   //FileUpload:OK
// } else {
//   //FileUpload:NG
//   echo "Upload failed";
//   echo $_FILES['fname
//   ']['error'];
// }

//  echo ($name);
//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=ec_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_item_table 
SET itemname=:itemname, fname=:fname,  value=:value, brand=:brand, company=:company, modelnum=:modelnum, detail=:detail WHERE id = :id");
$stmt->bindValue(':itemname', $itemname, PDO::PARAM_STR);
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
$stmt->bindValue(':value', $value, PDO::PARAM_INT); //数値
$stmt->bindValue(':brand', $brand, PDO::PARAM_STR);
$stmt->bindValue(':company', $company, PDO::PARAM_STR);
$stmt->bindValue(':modelnum', $modelnum, PDO::PARAM_STR);
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();


// ４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
  
  }else{
    //５．index.phpへリダイレクト
    header("Location: item_list.php");
    exit;
  
  }
?>