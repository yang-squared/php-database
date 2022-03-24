<?php
$conn = mysqli_connect("localhost",'root',
  'b689041','test');
  $sql = "SELECT * FROM topic";
  $result = mysqli_query($conn,$sql);
  $list = '';
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">
    {$row['title']}
    </a></li>";
  }
  if(isset($_GET['id'])){
  $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $article = array(
  'title'=>$row['title'],
  'description'=>$row['description']
);
}
  else{
    $article = array(
    'title'=>'Welcome',
    'description'=>'php&DATABase 연습페이지입니다.'
  );
  }
  ?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</h1>
    <ol>
      <?=$list?>
    </ol>
    <a href="create.php">create</a>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
  </body>
</html>
