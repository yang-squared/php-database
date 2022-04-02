<?php
$conn = mysqli_connect("localhost",'root',
  '*******','test');
$sql = "SELECT * FROM topic LIMIT 10";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];
}
?>
