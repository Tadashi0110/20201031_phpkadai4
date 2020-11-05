<!-- 基本機能完了 -->
<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["kana"]) || $_POST["kana"]=="" ||
  !isset($_POST["email"]) || $_POST["email"]=="" ||
  !isset($_POST["pass"]) || $_POST["pass"]=="" ||
  !isset($_POST["postnum"]) || $_POST["postnum"]=="" ||
  !isset($_POST["adress"]) || $_POST["adress"]==""
){
  exit('ParamError');
}


//1. POSTデータ取得

$name   = $_POST["name"];
$kana   = $_POST["kana"];
$email   = $_POST["email"];
$pass   = $_POST["pass"];
$postnum  = $_POST["postnum"];
$adress = $_POST["adress"];



//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=ec_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_acc_table(id, name, kana, email, pass, postnum, adress)
VALUES(NULL, :name, :kana, :email, :pass, :postnum, :adress) ");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kana', $kana, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':postnum', $postnum, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':adress', $adress, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //５．index.phpへリダイレクト
  header("Location: acc.php");
  exit;

}
?>
