<?
   // 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
   // 메시지 출력
   if(!$name) {
     echo("
	   <script>
	     window.alert('이름을 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   if(!$passwd) {
     echo("
	   <script>
	     window.alert('비밀번호를 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   if(!$subject) {
     echo("
	   <script>
	     window.alert('제목을 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   if(!$content) {
     echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   include "../dbconn.php";

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장
   

   $sql = "update freeboard set name='$name', subject='$subject', ";
   $sql .= "content='$content', passwd='$passwd' where num=$num";
   
   mysql_query($sql, $connect);
   mysql_close();
   
   Header("Location:list.php?num=$num&page=$page");  // list.php 로 이동
?>

   
