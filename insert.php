<?php
$conn = mysqli_connect("localhost",'root',
'*******','test');
mysqli_query($conn, "
  INSERT INTO topic
    (title, description, created)
    VALUES(
      'MySQL',
      'MySQL is ...',
      NOW()
      )
");
 ?>
