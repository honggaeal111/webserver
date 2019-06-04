<!DOCTYPE html>
<?
   include "dbconn.php";

   $sql = "select * from notice_board order by num desc limit 4";
   $result_notice = mysql_query($sql, $connect);

   $sql = "select * from freeboard order by num desc limit 4";
   $result_freeboard = mysql_query($sql, $connect);

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheettest.css">
    <title>test</title>
    <script>
      function input(){
        document.login.submit();
      }
      function logoutt(){
        document.login.submit();
      }
    </script>
  </head>
  <body>
    <div class="top">
        <div class="header"> MYSQLPHP </div>
        <div class="menu">
          <div class="notice" onclick="location.href='notice/nootice.html'" style="cursor:pointer">notice</div>
          <div class="board" style="cursor:pointer">bulletin board</div>
          <div class="add" style="cursor:pointer" onclick="location.href='add/formtest.html'">회원가입</div>
        </div>
    </div>
    <form name="login" method=post action=login.php>
      <div class="grid">
        <div class="login">
          login<br><input type="text" name="id" placeholder="아이디 입력"><br>
          password<br> <input type="text" name="passwd" placeholder="pw 입력"><br>
        </div>
        <div class="button">
          <input type="button" style="cursor:pointer" value="login" onclick="input();">
          <input type="button" style="cursor:pointer" value="logout" onclick="logoutt();">
        </div>
      </form>
      <div class="free">
        여기에 자유게시판
      </div>
      <iframe class="iframe" src="notice/nootice.html" width="530px" height="240"></iframe>
    </div>
  </body>
</html>
