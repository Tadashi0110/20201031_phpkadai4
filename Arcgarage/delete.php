<?php
//1. POSTデータ取得
$id = $_GET["id"];

//2. DB接続します
require_once("funcs.php");
$pdo = db_connect();

//３．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_acc_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

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