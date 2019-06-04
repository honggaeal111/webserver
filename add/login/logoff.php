<?
  session_start();
  session_unregister("userid");
  session_unregister("username");

  echo("
       <script>
          top.location.href = '../index.php'; 
          </script>
       ");

?>
