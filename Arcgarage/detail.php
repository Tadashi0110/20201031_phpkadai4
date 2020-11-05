 <?php
$id = $_GET["id"]; //?id~**を受け取る
// echo ($id);
require_once("funcs.php");
$pdo = db_connect();

//２．データ登録SQL作成
// $stmt = $pdo->prepare("SELECT * FROM gs_acc_table WHERE id=:id");
// $stmt->bindValue(":id", $id, PDO::PARAM_INT);
// $status = $stmt->execute();

$stmt = $pdo->prepare("SELECT * FROM gs_acc_table WHERE id=" . $id);
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
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
        <?= $view ?>
            <fieldset>
                <legend>[編集]</legend>
                <label>名前：<input type="text" name="name" value="<?= $row['name'] ?>"></label><br>
                <label>フリガナ：<input type="text" name="kana" value="<?= $row['kana'] ?>"></label><br>
                <label>Email：<input type="text" name="email" value="<?= $row['email'] ?>"></label><br>
                <label>Pass：<input type="text" name="pass" value="<?= $row['pass'] ?>"></label><br>
                <label>郵便番号：<input type="text" name="postnum" value="<?= $row['postnum'] ?>"></label><br>
                <label>住所：<input type="text" name="adress" value="<?= $row['adress'] ?>"></label><br>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="submit" value="送信">
                
  
                
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
