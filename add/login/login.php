<?
   // ����ȭ�鿡�� �̸��� �Էµ��� �ʾ����� "�̸��� �Է��ϼ���"
   // �޽��� ���
   if(!$id) {
     echo("
           <script>
             window.alert('���̵� �Է��ϼ���.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   if(!$passwd) {
     echo("
           <script>
             window.alert('��й�ȣ�� �Է��ϼ���.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   include "../dbconn.php";

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect);

   $num_match = mysql_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('��ϵ��� ���� ���̵��Դϴ�.')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysql_fetch_array($result);

        $db_passwd = $row[passwd];

        if($passwd != $db_passwd)
        {
           echo("
              <script>
                window.alert('��й�ȣ�� Ʋ���ϴ�.')
                history.go(-1)
              </script>
           ");

           exit;
        }
        else
        {
           $userid = $row[id];
           $username = $row[name];

           session_start();
           session_register(userid);
           session_register(username);

           echo("
              <script>
                top.location.href = '../index.php';
              </script>
           ");
        }
   }        
      
?>
