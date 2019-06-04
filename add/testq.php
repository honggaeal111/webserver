<?php
$hostname = "localhost"; //아아피 혹은 도메인이름
$username= "root";   //아이디 (root)
$password = "1234"; //root 비번
$dbname = "test";   //데이터베이스 이름 중 하나
$mysqli = new mysqli($hostname, $username, $password, $dbname);

  $id=$_POST["id"];
  $passwd=$_POST["passwd"];
  $name=$_POST["name"];
  $sex=$_POST["sex"];
  $tel="01086962301";
  $address=$_POST["address"];
  echo $id. $passwd. $name. $sex. $tel. $address;
  $sql = "insert into member values('$id', '$passwd', '$name', '$sex', '$tel', '$address')";
  $query=mysqli_query($mysqli, $sql);
  mysqli_free_result($query);

 ?>
