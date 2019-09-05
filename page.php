<meta charset="utf-8">
<link rel="stylesheet" href="style.css" type='text/css'>
<?php
   include_once('connection.php');
?>
<a href="local.php">На главную</a>
<hr>
<?php

   $get=$_GET['id'];


   $result=mysql_query("SELECT tovary.tovar_name,    tovary.description,tovary.images,tovary.Price,proizvoditel.Name_proizvoditel,
   tovary.tovary_id FROM tovary LEFT JOIN proizvoditel ON tovary.proizvoditel_id = proizvoditel.proizvoditel_id WHERE tovary.tovary_id = $get" );

 $row= mysql_fetch_assoc($result);
    //var_dump(".$row['tovary_id']");
         $puth=$row['images'];
         $nametovar=$row['tovar_name'];
      echo 			"Название:  "	.$row['tovar_name']."<br>".
                  "<img src='$puth'>"."<br>".
                  "Описание:".$row['description']."<br>".
                  "Цена:".$row['Price']."р."."<br>".
                  "Производитель:".$row['Name_proizvoditel']."<br>".
                  "ID товара:".$row['tovary_id']."<hr>";








?>
