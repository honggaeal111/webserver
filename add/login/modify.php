<?
   session_start();

   include "../dbconn.php";       // dconn.php 파일을 불러옴

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장
   
   if ($phone1 && $phone2 && $phone3)
        $tel = $phone1."-".$phone2."-".$phone3;
   else
        $tel = "";

   $sql = "update member set passwd='$passwd', name='$name' , ";
   $sql .= "sex='$sex', tel='$tel', address='$address' where id='$userid'";

   mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행

   mysql_close();                // DB 연결 끊기
   
   Header("Location:../main.php");  // main.php 로 이동
?>

   
