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

<form action="add.php" method="post" enctype="multipart/form-data">
   Название товара:<br>
   <input type="text" name="tovar_name"><br>
   Описание товара:<br>
   <textarea cols="40" rows="10" name="description"></textarea><br>
   Фото товара:<br>
   <input type="file" name="image"><br>
   Цена:<br>
   <input type="text" name="price" ><br>
   Производитель:<br>


	<Select name="proizvoditel_vibor">
		<option value="null"  <?php if($_POST["proizvoditel_vibor"]=="null")
		{echo "selected";} ?>></option>
		<option value="1"<?php if($_POST["proizvoditel_vibor"]=="1")
		{echo "selected";} ?>>Apple</option>
		<option value="2"<?php if($_POST["proizvoditel_vibor"]=="2")
		{echo "selected";} ?> >Acer</option>
		<option value="3"<?php if($_POST["proizvoditel_vibor"]=="3")
		{echo "selected";} ?> >Samsung Corporation</option>
		<option value="4"<?php if($_POST["proizvoditel_vibor"]=="4")
		{echo "selected";} ?> >DNS</option>
		<option value="5"<?php if($_POST["proizvoditel_vibor"]=="5")
		{echo "selected";} ?> >msi</option>
		<option value="6"<?php if($_POST["proizvoditel_vibor"]=="6")
		{echo "selected";} ?> >ASUS</option>
		<option value="7"<?php if($_POST["proizvoditel_vibor"]=="7")
		{echo "selected";} ?> >lenovo</option>
	</select>
   <input type="submit" name="add" value="Добавить">
</form>

   <?php
      if (isset($_POST['add'])){
         $tovar_name= strip_tags(trim(($_POST['tovar_name'])));
         $description= strip_tags(trim(($_POST['description'])));
         $price = ($_POST['price']);
         $proizvoditel = ($_POST['proizvoditel_vibor']);
			//img
			$gallaryDir ='img';
			$name = $_FILES['image']['name'];
			$tmp_name = $_FILES['image']['tmp_name'];
			move_uploaded_file($tmp_name,"img/". "$name");
			$puth= "img/". "$name";
         mysql_query("
            INSERT INTO tovary(tovar_name,description,images,Price,proizvoditel_id)
            VALUES ('$tovar_name','$description','$puth','$price','$proizvoditel')
         ");
			//var_dump("$puth");
			   if (isset($_POST["add"]))
			   {
			     echo "Товар успешно добавлен";

			  }else {echo "Товар не добавлен";}


      }

   ?>
<hr ><a href="local.php">Вернуться на главную страницу</a>


</body>
