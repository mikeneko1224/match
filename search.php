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

    //$name = "";
    $name = [];
    $results = [];

    if(isset($_POST["text"])) {
      $sql = 'SELECT * FROM recochoku.test';
      $stmt = $pdo->query($sql);
      $results = $stmt->fetchAll();
      //echo $results;

      foreach ($results as $row){
        //echo $row['name'];
          if($_POST["text"] == $row["comment"])
              //$rowの中にはテーブルのカラム名が入る
              //print_r($row);
              array_push($name,$row['name']);
              //$name = $row['name'];
             // break;
          }
      }


} catch(PDOException $e) {
    echo "データベースが接続できませんでした。";
    //$e -> getMessage();
}

$PDO = null;
//$user = array("# 野球"=>"佐藤", "# 料理"=>"鈴木")
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>マッチ&ゴー</title>
</head>

<body>
  <header>
    <h1><a href="index.html">マッチ&ゴー</a></h1>
    <div class="user">
      <p>ようこそRinさん</p>
      <img src="./img/user-green.png">
    </div>
  </header>
  <main>
  <article>
  <p><b>マッチする人が見つかりました！</b></p>
  <?php foreach ($name as $user) : ?>
        <section>
          <div class="user-visual">
            <img src="./img/user-blue.png">
            <h2> <?php echo $user;?> さん</h2>
          </div>
          <div class="user-introduction">
            <p>
              ○○に興味があるので行ってみたいです！<br>
              誰でも話しかけてください。
              よろしくお願いします！！
            </p>
          </div>
          <a href="http://localhost:8000/talk.html" class="btn btn--green btn--radius btn--cubic">PUSH!<i class="fas fa-angle-right fa-position-right"></i></a>
        </section>
    <?php endforeach; ?>
    </article>
    <a href="index.html" class="turn">戻る</button>
  </main>
  <footer>
    <p>&copy; 2023 Match and Go</p>
  </footer>
</body>

<style>
    a,
    a:visited {
        color: #24292e;
        text-decoration: none;
    }

    body{
        margin: 0;
    }
    header {
        max-width: 100%;
        display: flex;
        justify-content: space-between;
        height: 5em;
        padding: 0 3%;
        align-items: center;
        position: sticky;
        top: 0;
        box-shadow: 0 0 30px rgba(100, 100, 100, 0.4);
        background-attachment: fixed;
      }
      
      header h1{
        font-weight: 100;
        font-family: "Arial";
      }
      .user{
        display: flex;
        list-style: none;
      }
      header img{
        max-height: 3em;
        margin-left: 2em;
      }
      .main-visual img{
        width: 100%;
        position:relative;
      }
      .main-visual h2{
        position:absolute;
        top: 10%;
        left: 60%;
        color: #f3f7c3;
      }
      .search{
        padding: 0.5em;
        text-align:center;
      }

      #name{
        display: inline-block;
        width: 80%;
        font-size: 30px;
      }

      button{
        font-size: 30px;
      }
      article{
        background-image: url(./img/background.png);
        background-attachment: fixed;
        background-size: cover;
      }
      article p{
        padding: 0 5%;
      }
      section{
        padding: 3% 7%;
        margin: 1em;
        border-radius: 3em;
        border: grey 0.9px solid;
        background-color: rgba(255, 255, 255, 0.95);
      }
      .user-visual{
        display: flex;
        list-style: none;
        margin: 2em;
      }
      .user-visual h2{
        padding-left: 3em;
      }

      .user-visual img{
        width: 5em;
      }

      footer {
        background-color: #24292e;
        color: #fff;
        font-size: 0.5rem;
        padding: 10px 20px;
        text-align: center;
      }
      a.btn{
        background-color: #add8e6;
        padding: 10px;
        margin-left: 25px;
      }
      a.btn--green .btn--cubic {
        border-bottom: 5px solid #add8e6;
      }

      a.btn--green .btn--cubic:hover {S
        margin-top: 3px;
        border-bottom: 2px solid #add8e6;
      }

      a.btn--radius {
        border-radius: 100vh;
      }

      .fa-position-right {
        position: absolute;
        top: calc(50% - .5em);
        right: 1rem;
      }

      .turn {
        text-align: center;
      }








</style>

</html>