<?php
//XSS対応関数
function h($val){
  return htmlspecialchars($val,ENT_QUOTES);
}


// LOGIN認証チェック
function loginCheck (){
  if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()){
    echo "LOGIN Error";
    exit();
  }else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}


  // 1. DB接続します
function db_connect(){

  try {
    $pdo = new PDO('mysql:dbname=ec_db;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  } 
  return $pdo;
}

?>
