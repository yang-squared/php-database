<?php
$conn = mysqli_connect("127.0.0.1",'root','b689041','test');
mysqli_query($conn, "
  insert into topic
    (title, decription, created)
    VALUE(
      'MySQL',
      'MySQL is ...',
      NOW()
      )
");
 ?>
