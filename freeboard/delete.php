<?
   session_start();

   include "../dbconn.php";

   $sql = "select passwd from freeboard where num=$num";
   $result = mysql_query($sql, $connect);
   $row = mysql_fetch_array($result); // 해당 레코드 가져옴 

   // $passwd : 사용자가 passwd_form.php 화면에서 입력한 값 
   // $row[passwd] : DB에 들어있는 값 
   if ($passwd != $row[passwd] and $userid != "admin")   
  // 관리자가 아니고 비밀번호가 틀리면
   {
      echo("
           <script>
             window.alert('비밀번호가 틀립니다.')
             history.go(-1)
           </script>
          ");
      exit;
   }
   else
   {
      $sql = "delete from freeboard where num = $num";
      mysql_query($sql, $connect);

      mysql_close();
      Header("Location:list.php?page=$page");
   }

?>


