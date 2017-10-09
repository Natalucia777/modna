<?php
//запуск сессии
session_start();
//подключение библиотек
require "/db/eshop_db.inc.php";
require "/db/eshop_lib.inc.php";?>
<!DOCTYPE html>
<html>
<head>
<title>Каталог товаров</title>
<meta charset="UTF-8">
<meta name="author" content="natalucia777@ukr.net" />
<meta name="description"  эксклюзивная бижутерия,модные украшения для женщин, 
	бижутерия, кольца, серьги, камни, подарки/>
<meta name="keywords" стиль, мода, бижутерия, кольца, серьги, украшения, камни,
	подарки, аксесуары, браслеты, для женщин, эксклюзивная бижутерия, кольцо, печатка />
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>:
<?php echo $count; ?></p>
<table border="1" cellpadding="5" cellspecing="0" width="100%">
<tr>
	<th>Название</th>
	<th>№ модели</th>
	<th>Камень</th>
	<th>Цена, грн.</th>
	<th>В корзину</th>
</tr>
<?php 
$result = selectAll();
foreach($result as $item){
?>
    <tr>
	<td><?=$item["title"]?></td>
	<td><?=$item["material"]?></td>
	<td><?=$item["stone"]?></td>
	<td><?=$item["price"]?></td>
	<td><a href="add2basket.php?id=<?=$item[
    "id"]?>">В корзину</a></td>
    </tr>
<?php 
}
?>
</table>
</body>
</html>