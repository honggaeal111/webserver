<?php

$db = mysql_connect( 'localhost', 'root', '1234' );

if( !$db ) {

  die( 'MYSQL connect ERROR: ' . mysql_error());

}



$ret = mysql_select_db( 'test', $db );

if( !$ret ) {

  die( 'MYSQL select ERROR: ' . mysql_error());

}

?>
