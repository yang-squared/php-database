<?php
$conn = mysqli_connect("localhost",'root',
'*******','test');

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=> mysqli_real_escape_string($conn,$_POST['id'])
);
$sql = "
  DELETE FROM author
  WHERE id = {$filtered['id']}
  ";
  $result = mysqli_query($conn,$sql);
  if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
  } else{
    header("Location: author.php");
  }
 ?>
