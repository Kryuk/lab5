<?php
$connect = mysql_connect('127.0.0.1', 'root', '');
$db=mysql_select_db("lab5",$connect);
if (!$connect || !$db)
{
  exit(mysql_error());
}

?>
