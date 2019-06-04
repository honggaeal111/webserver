<?php
  $id=$_POST["id"];

             $hostname = "localhost"; //아아피 혹은 도메인이름
             $username= "root";   //아이디 (root)
             $password = "1234"; //root 비번
             $dbname = "test";   //데이터베이스 이름 중 하나
             $mysqli = new mysqli($hostname, $username, $password, $dbname);

             echo "$id";
              $sql = "select*from member where id='$id' ";

              $result = mysqli_query($mysqli, $sql);

              $num_record = mysqli_num_rows($result);

              if ($num_record)
              {
                echo "아이디 사용가능.";
              }
              else
              {
                 echo "아이디가 있습니다";
              }

              mysqli_close();

?>
