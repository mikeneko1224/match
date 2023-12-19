<?php
try {
    $dsn = "";
    $user = '';
    $password = '';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::ATTR_EMULATE_PREPARES => false,));
    //echo "成功しました";

    $sql = "CREATE TABLE IF NOT EXISTS test"
    ."("
    ."id INT AUTO_INCREMENT PRIMARY KEY,"
    ."`name` CHAR(32),"
    ."`comment` TEXT,"
    ."`pass` CHAR(32)"
    .");";
    $stmt = $pdo->query($sql);


} catch(PDOException $e) {
    echo "データベースが接続できませんでした。";
    //$e -> getMessage();
}

$PDO = null;
//$user = array("# 野球"=>"佐藤", "# 料理"=>"鈴木")
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>recochoku</title>
    </head>

    <body>

    <?php
    if(isset($_POST["text"])) {
        $sql = 'SELECT * FROM test';
        $stmt = $pdo->query($sql);
        $results = $stmt->fetchAll();
        //echo $results;

        foreach ($results as $row){
            if($_POST["text"] == $row["comment"])
                //$rowの中にはテーブルのカラム名が入る
                //print_r($row);
                echo $row['name'];
        }
    }
    ?>
    </body>
</html>




