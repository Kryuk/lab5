<!DOCTYPE html>
<html>
<head>
	<title> lab5</title>
	 <meta charset="utf-8">
	 <link rel="stylesheet" href="style.css" type='text/css'>
</head>
<body>
   <?php
      include_once('connection.php');
    ?>


    <form  action="delete.php" method="post" enctype="multipart/form-data">
      <input type="text" name="tovary_id_delete" placeholder="Введите id товара">
      <input type="submit" name="delete" value="Удалить товар">

    </form>
   <?php

   if(isset($_POST['delete'])){
      $strSQL = ("DELETE FROM tovary WHERE tovary_id='$_POST[tovary_id_delete]'");
      mysql_query($strSQL);
      echo "Запис успешно удалена";
   }

   ?>
   <hr>
   <a href="local.php">Вернуться на главную страницу</a>
</body>
