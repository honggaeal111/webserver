<?
   $scale = 5;   // 한 화면에 표시되는 글 수

   include "../dbconn.php";

   $sql = "select * from freeboard order by num desc";
   $result = mysql_query($sql, $connect);
?>
<html>
<META http-equiv="Content-Type" content="text/html; charset=Korean">
 <head>
  <title> :: PHP 프로그래밍 입문에 오신것을 환영합니다~~ :: </title>
  <link rel="stylesheet" href="../style.css" type="text/css">	
 </head>
 <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <table border=0 cellspacing=0 cellpdding=0 width='776' align='center'>
        <tr><td colspan="5" height=25>
            <img src="img/freeboard_title.gif"></td></tr>
        <tr><td background="img/bbs_bg.gif">
            <img border="0" src="img/blank.gif" width="1" height="3"></td>
        </tr>
        <tr><td height=10></td></tr>

<?  $total_record = mysql_num_rows($result); // 전체 글 수?>
        <tr>
          <td align="right" colspan="5" height=20>전체 
            <? echo $total_record; ?>건 
            </td></tr>
        <tr>
          <td>

    <table border=0 cellspacing=0 cellpdding=0 width='100%' class="txt">
        <tr bgcolor="#5AB2C8"> 
          <td colspan="5" height=1></td>
        </tr>
        <tr bgcolor="#D2EAF0" height=25> 
          <td width="50" align="center"><strong>번호</strong></td>
          <td width="450" align=center><strong>제목</strong></td>
          <td width="76" align=center><strong>글쓴이</strong></td>
          <td width="145" align=center><strong>작성일</strong></td>
          <td width="55" align=center><strong>조회</strong></td>
        </tr>
        <tr bgcolor="#5AB2C8"> 
          <td colspan="5" height=1></td>
        </tr>
  
<?
   // 전체 페이지 수($total_page) 계산 
   if ($total_record % $scale == 0)     
      $total_page = floor($total_record/$scale);      
   else
      $total_page = floor($total_record/$scale) + 1; 
 
   if (!$page)                 // 페이지번호($page)가 0 일 때
       $page = 1;              // 페이지 번호를 1로 초기화
 
   // 표시할 페이지($page)에 따라 $start 계산  
   $start = ($page - 1) * $scale;      

   $number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
      
      $day = $row[regist_day];
     
      // 레코드 화면에 출력하기
      echo "
        <tr height=25>
          <td align=center>$number</td>
          <td><img src='img/record_id.gif' border=0>
              <a href='view.php?num=$row[num]&page=$page'>
                       $row[subject] </a></td>
          <td align=center>$row[name] </td>
          <td align=center>$day</td>
          <td align=center>$row[hit]</td>
        </tr>
        <tr bgcolor='#CCCCCC' height=1> 
          <td colspan='5'></td>
        </tr>
           ";
    $number--;
   } 
?>
        <tr> 
          <td colspan="5" height=20></td>
        </tr>

        <tr height=25>
          <td colspan=5 align=center>
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
       if ($page == $i)     
       {
          echo "<font color='4C5317'><b>[$i]</b></font>";
       }
       else
       { 
          echo "<a href='list.php?page=$i'>
               <font color='4C5317'>[$i]</font></a>";
       }      
   }
?>
          </td>
        </tr>
        <tr bgcolor="#CCCCCC" height=1> 
          <td colspan="5"></td>
        </tr>
    </table>

          </td>
        </tr>      
    </table>
       <!-- 검색하기 시작 -->
    <table width=766 align=center border=0 cellpadding=0 
               cellspacing=0 bgcolor="#D2EAF0">
        <tr height=5>
          <td></td>
        </tr>
       <form name=searchForm method=post action="search.php">
        <tr>
          <td>&nbsp;&nbsp;
            <select name="find" class="txt">
              <option value="subject">제목에서</option>
              <option value="content">본문에서</option>
              <option value="name">글쓴이에서</option>
            </select>
                         
              <input type="text" name="search" size=10>
              <input type="image" src="img/i_search.gif" 
                    align=absmiddle border=0>
          </td>

          <td align=right>
              <a href="write_form.php">
               <img src="img/i_write.gif" align=absmiddle border=0></a>
        &nbsp;<a href="list.php"><img src="img/i_list.gif" border=0></a>
        &nbsp;</td>
        </tr>
        <tr height=5>
          <td></td>
        </tr>
        <tr bgcolor="#5AB2C8" height=1>
          <td colspan=2></td>
        </tr>
       </form>
    </table>
   <!-- 검색하기 끝 -->
 </body>
</html>
