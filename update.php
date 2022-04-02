<?php
$conn = mysqli_connect("localhost",'root',
  'b689041','test');
  $sql = "SELECT * FROM topic";
  $result = mysqli_query($conn,$sql);
  $list = '';
  while($row = mysqli_fetch_array($result)){
    $escaped_title =htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">
    {$escaped_title}
    </a></li>";
  }
  $update_link = '';
  if(isset($_GET['id'])){
  $filtered_id= mysqli_real_escape_string($conn,$_GET['id']);
  $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $article = array(
  'title'=>htmlspecialchars($row['title']),
  'description'=>htmlspecialchars($row['description']));
  $update_link = '<a href = "update.php?id='.$_GET['id'].'">update</a>';
}
  else{
    $article = array(
    'title'=>'Welcome',
    'description'=>'php&DATABase 연습페이지입니다.');
  }
  $update_result = mysqli_query($conn,$sql);
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
    <form  method="post" action="process_update.php">
      <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <p><input type="text" name ="title" placecholder="title"
          value ="<?=$article['title']?>"></p>
        <p><textarea name='description'
        placecholder ="description"><?=$article['description']?>
      </textarea></p>
        <p><input type="submit"></p>
    </form>
  </body>
</html>
