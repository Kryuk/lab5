<!DOCTYPE html>
<html>
	<head>
		<title> lab5</title>
		 <meta charset="utf-8">
		  <link rel="stylesheet" href="style.css" type='text/css'>

	</head>
	<body >
		<?php
		   include_once('connection.php');
		?>
		<header>
			<div class="about">
				<a href="add.php">Добавить товар</a>
				<a href="delete.php">Удалить товар</a>
			</div>
		</header>
<div class="sort">
	<hr><div class="sortirovka">   Сортировать: </div>
	<form action="local.php" method="post" enctype="multipart/form-data">
		<?php $color1="#20B2AA" ?>


	<label > <font   echo "<table cellpadding='20px' cellspacing='3' border='2'>";
	  echo "<tr><td>Название";
	 echo "<a href='index.php?sort=down&ret=0'> D </a>" . "|";
	 echo "<a href='index.php?sort=up&ret=0'> U </a></td><td align='center'>";
	  echo "Фото</td></tr>";
	  for ($i = 0; $i <= $line_num; $i++) {
		  echo "<tr>";
		  for ($j=0; $j <2; $j++) {
			  echo "<td>".$table[$i][$j]."</td>";
		  }
		  echo "</tr>";
	  }>По убыванию цены</font>
	<input type="submit" name="Sort" value="Down"
	<?php if($_POST["Sort"]=="Down"){echo "checked";$lab= "DESC"; } ?>
	</label>
	<label> <font <font <?php if($_POST["Sort"]=="UP"){echo "color='#20B2AA'";}?>>По возрастанию цены</font>
	<input type="submit" name="Sort" value="UP"
	<?php if($_POST["Sort"]=="UP"){echo "checked"; $lab= "ASC";} ?>
	</label>
	<label > <font <?php if($_POST["Sort"]=="a"){echo "color='#20B2AA'";}?>>По произодителю a:</font>
	<input type="submit" name="Sort" value="a"
	<?php if($_POST["Sort"]=="a"){echo "checked";$lab= "ASC"; } ?>
	</label>
	<label > <font <?php if($_POST["Sort"]=="z"){echo "color='#20B2AA'";}?>>По произодителю z:</font>
	<input type="submit" name="Sort" value="z"
	<?php if($_POST["Sort"]=="z"){echo "checked";$lab= "DESC"; } ?>
	</label>





</form>
</div>


	<hr>
	<?php
	$id;
	if($_POST['Sort'] == "a" || $_POST['Sort']=="z" ){
		$result=mysql_query("SELECT tovary.tovar_name ,tovary.description,tovary.images,tovary.Price,proizvoditel.Name_proizvoditel,
			tovary.tovary_id,proizvoditel.proizvoditel_id FROM tovary LEFT JOIN proizvoditel ON tovary.proizvoditel_id = proizvoditel.proizvoditel_id ORDER BY proizvoditel.Name_proizvoditel $lab ");}
			else {
		$result=mysql_query("SELECT tovary.tovar_name ,tovary.description,tovary.images,tovary.Price,proizvoditel.Name_proizvoditel,
		tovary.tovary_id,proizvoditel.proizvoditel_id FROM tovary LEFT JOIN proizvoditel ON tovary.proizvoditel_id = proizvoditel.proizvoditel_id ORDER BY tovary.Price $lab ");}


		while ($row= mysql_fetch_assoc($result)) {

			$puth=$row['images'];
			$tovarid= $row['tovary_id'];
			$nametovar=$row['tovar_name'];
			$proizvoditelname=$row['Name_proizvoditel'];
			$proizvoditelid =$row['proizvoditel_id'];
			$price=$row['Price'];
			$description=$row['description'];

	      echo 	"Название:"	."<a href='page.php?id=$tovarid'>$nametovar</a>"."<br>";
			echo  "<img class=img src='$puth'>"."<br>";
	      echo  "Описание:".$description."<br>";
	      echo  "Цена:".$price."р."."<br>";
	      echo  "Производитель:"."
					<a href='proizvoditel.php?proizvoditel=$proizvoditelid'>$proizvoditelname</a>"."<br>";
			echo	"ID товара:".$tovarid."<hr>";
		}
	 ?>
	</body>
</html>
