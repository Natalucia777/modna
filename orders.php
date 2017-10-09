<?php
//запуск сессии
session_start();
//подключение библиотек
require "/db/eshop_db.inc.php";
require "/db/eshop_lib.inc.php";
?>
<!DOCTYPE html>
<html>
<head><title>Поступившие заказы</title>
<meta charset="UTF-8">
</head>
<body>
<h2>Поступившие заказы</h2>
<?php
$result = getOrders();
foreach($result as $order){?>
<hr>
<p><b>Заказчик</b>: <?php echo $order["name"] ?></p>
<p><b>Email</b>: <?php echo $order["email"] ?></p>
<p><b>Телефон</b>: <?php echo $order["phone"] ?></p>
<p><b>Адрес доставки</b>: <?php echo $order["address"] ?></p>
<p><b>Дата размещения заказа</b>: <?php echo date("d.m.y H:i", $order["date"]) ?></p>
<h3>Купленные товары:</h3>
<table border="1" cellpadding="5" cellspacing="0" width="90%">
<tr>
<th>№ п/п</th>
<th>Название</th>
<th>№ модели</th>
<th>Камень</th>
<th>Цена, грн.</th>
<th>Количество</th>
</tr>
<?php $i = 0; $sum = 0; 
while ($row = mysql_fetch_assoc($order["goods"])){
	$sum += $row["price"] * $row["quantity"];?>
<tr>
<td align="center"><?php echo ++$i ?></td>
<td><?php echo $row["title"] ?></td>
<td><?php echo $row["material"] ?></td>
<td align="center"><?php echo $row["stone"] ?></td>
<td align="center"><?php echo $row["price"] ?></td>
<td align="center"><?php echo $row["quantity"] ?></td>
</tr>
<?php }?>
</table>
<p>Всего товаров в корзине на суму: <?php echo $sum ?> грн. <?php }?> 
</body>
</html>