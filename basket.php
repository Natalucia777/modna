<?php
//запуск сессии
session_start();
//подключение библиотек
require "/db/eshop_db.inc.php";
require "/db/eshop_lib.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Корзина пользователя</title>
<meta charset="UTF-8"></head>
<body>
<?php
if($count == 0){
	echo "<p>Корзина пуста! Перейти в <a href=\"catalog.php\">каталог</a>
	товаров.</p>"; }
		else {?>
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>№ п/п</th>
	<th>Название</th>
	<th>№ модели</th>
	<th>Камень</th>
	<th>Цена, грн.</th>
	<th>Количество</th>
	<th>Удалить</th>
</tr>
<?php 
$result = myBasket();
$i = 0;
$sum = 0;
while ($row = mysql_fetch_assoc($result)){
	$sum += $row["price"] * $row["quantity"];?>
<tr>
	<td align="center"><?php echo ++$i ?></td>
	<td><?php echo $row["title"] ?></td>
	<td><?php echo $row["material"] ?></td>
	<td align="center"><?php echo $row["stone"] ?></td>
	<td align="center"><?php echo $row["price"] ?></td>
	<td align="center"><?php echo $row["quantity"] ?></td>
	<td align="center"><a href="delete_from_basket.php?id=
	<?php echo $row["id"] ?>">удалить</a></td>
</tr>
<?php }?>
</table>
<p>Всего товаров в корзине на сумму:<?php echo $sum ?>грн.
<div align="center">
<input type="button" value="Оформить заказ!"
					onClick="location.href='orderform.php'"></div>
</p>
<?php }?>
</body>
</html>

