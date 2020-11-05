<?php
session_start();

//----------------------------------------------------
//１．入力チェック(受信確認処理追加)
//----------------------------------------------------

//商品名 受信チェック:id
if(!isset($_POST["id"]) || $_POST["id"] == ""){
  exit("ParamError!id!");
}

//金額 受信チェック:value
if(!isset($_POST["value"]) || $_POST["value"] == ""){
  exit("ParamError!value!");
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

//商品紹介文 受信チェック:description
if(!isset($_POST["num"]) || $_POST["num"] == ""){
  exit("ParamError!num!");
}

//----------------------------------------------------
//２. POSTデータ取得
//----------------------------------------------------
$id  = intval($_POST["id"]);   //id
$fname  = $_POST["fname"];   //File名
$itemname  = $_POST["itemname"];   //商品名
$value  = intval($_POST["value"]);   //価格(数字：intvalを使う)
$brand  = $_POST["brand"];   //メーカー
$company = $_POST["company"]; //取り扱い会社
$modelnum = $_POST["modelnum"]; //製品番号
$detail = $_POST["detail"];   //商品紹介文
$num = intval($_POST["num"]);   //商品紹介文

//----------------------------------------------------
//３．カートへ登録: array([0]=item,[1]=value,[2]=num,[3]=fname);
//----------------------------------------------------
$_SESSION["cart"][$id] = array($itemname, $value, $num, $fname);

//----------------------------------------------------
//４．次のページへ移動 cart.php
//----------------------------------------------------
header("Location: cart.php");
exit;
?>
