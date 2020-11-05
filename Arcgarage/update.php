<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$kana   = $_POST["kana"];
$email   = $_POST["email"];
$pass   = $_POST["pass"];
$postnum  = $_POST["postnum"];
$adress = $_POST["adress"];
$id = $_POST["id"];

echo ($name);

//  echo ($name);
//2. DB接続します
require_once("funcs.php");
$pdo = db_connect();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_acc_table 
SET name=:name, kana=:kana, email=:email, pass=:pass, postnum=:postnum, adress=:adress WHERE id = :id");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kana', $kana, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':postnum', $postnum, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':adress', $adress, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

// // ４．データ登録処理後
// if ($status == false) {
//     sql_error($stmt);
// } else {
//     redirect("select.php");
// }


// ４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
  
  }else{
    //５．index.phpへリダイレクト
    header("Location: select.php");
    exit;
  
  }
?>