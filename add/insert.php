<?
$hostname = "localhost"; //아아피 혹은 도메인이름
$username= "root";   //아이디 (root)
$password = "1234"; //root 비번
$dbname = "test";   //데이터베이스 이름 중 하나
$mysqli = new mysqli($hostname, $username, $password, $dbname);

   $sql = "select * from member where id='$id'";
   $result = mysqli_query($mysqli, $sql);
   $exist_id = mysqli_num_rows($result);

   if($exist_id) {
     echo("

           오류
         ");
         exit;
   }

   $regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����
   $ip = $REMOTE_ADDR;         // �湮���� IP �ּҸ� ����

   if ($phone1 && $phone2 && $phone3)
       $tel = $phone1."-".$phone2."-".$phone3;
   else
       $tel = "";

       echo $id,$passwd,$name,$sex,$tel,$address;

   $sql = "insert into member values('$id', '$passwd', '$name', '$sex', '$tel', '$address')";

   // ���ڵ� ���� ����
   mysqli_query($mysqli, $sql);  // $sql �� ������ ���� ����

  // login_form.html �� �̵�
?>
