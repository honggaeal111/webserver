<?
    $connect=mysql_connect( "localhost", "root", "1234") or
        die( "안됨");

    mysql_select_db("test",$connect);
?>
