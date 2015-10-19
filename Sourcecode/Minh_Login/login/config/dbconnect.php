<?php

$user = "root";
$pass = "";
$db = "demo";	

$link = mysql_connect( "localhost", "root", "");
if ( ! $link )
	die( "Couldn't connect to MySQL" );
mysql_select_db( $db ) or die ( "Couldn't open $db: ".mysql_error() );

?>
