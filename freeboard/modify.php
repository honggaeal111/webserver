<?
   // ����ȭ�鿡�� �̸��� �Էµ��� �ʾ����� "�̸��� �Է��ϼ���"
   // �޽��� ���
   if(!$name) {
     echo("
	   <script>
	     window.alert('�̸��� �Է��ϼ���.')
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
   
   if(!$subject) {
     echo("
	   <script>
	     window.alert('������ �Է��ϼ���.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   if(!$content) {
     echo("
	   <script>
	     window.alert('������ �Է��ϼ���.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   include "../dbconn.php";

   $regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����
   $ip = $REMOTE_ADDR;         // �湮���� IP �ּҸ� ����
   

   $sql = "update freeboard set name='$name', subject='$subject', ";
   $sql .= "content='$content', passwd='$passwd' where num=$num";
   
   mysql_query($sql, $connect);
   mysql_close();
   
   Header("Location:list.php?num=$num&page=$page");  // list.php �� �̵�
?>

   
