<?php

  $id=$_POST["id"];
  $passwd=$_POST["passwd"];
   if(!$id) {
     echo("
           <script>
             window.alert('아이디를 입력해 주세요')
             history.go(-1)
           </script>
         ");
         exit;
   }

   if(!$passwd) {
     echo("
           <script>
             window.alert('비밀번호를 입력해주세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   include "testmysql.php";

   $sql = "select * from member where id='$id'";
   $result = mysqli_query($mysqli, $sql);

   $num_match = mysqli_num_rows($result);

   if(!$num_match)
   {
     echo("
           <script>
             window.alert('틀렸습니다.')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);

        $db_passwd = $row[passwd];

        if($passwd != $db_passwd)
        {
           echo("
              <script>
                window.alert('비밀번호가 틀렸습니다.')
                history.go(-1)
              </script>
           ");

           exit;
        }
        else
        {
           $userid = $row[id];
           $username = $row[name];


           echo("
              <script>
                top.location.href = 'logout.php';
              </script>
           ");
        }
   }

?>
