<?php
  $mysql_host = "localhost:8889";
  $mysql_user="root";
  $mysql_password="1234";
  $mysql_database="test";

  $mysqli=new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

  if($mysqli->connect_errno){
    die('DB connect Error'.$mysqli->connect_error);
  }
  else {
    echo "mysql connect <br>";
  }
 ?>
