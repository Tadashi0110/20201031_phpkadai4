<?php

// 基本機能完了
session_start();
$email = $_POST["email"];
$pass = $_POST["pass"];

//1. 接続します
try {
  $pdo = new PDO('mysql:dbname=ec_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_acc_table WHERE email=:email AND pass=:pass";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':pass', $pass);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//３．抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//４. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["email"]   = $val['email'];
  //Login処理OKの場合select.phpへ遷移
  header("Location: select.php");
}else{
  //Login処理NGの場合login.phpへ遷移
  header("Location: login.php");
}
//処理終了
exit();
?>

