<?php
/*//фильтрация данных
function clearData($data, $type="s"){
	switch($type){
		case "s":
			return mysql_real_escape_string(
			trim(strip_tags($data)));
		case "i":
			return (int)$data;
	}
}*/
//сохраняет новый товар в каталог (в таблицу catalog)
function save($title, $material, $stone, $price){
	$sql = "INSERT INTO catalog(
							title,
							material,
							stone,
							price)
						VALUES(
							'$title',
							'$material',
							'$stone',
							'$price')";
	mysql_query($sql) or die(mysql_error());
}
//конвертируем данные в массив
function db2Array($data){
	$arr = array();
	while($row = mysql_fetch_assoc($data)){
		$arr[] = $row;
	}
	return $arr;
}
//возвращение всего содержимого каталога товаров
function selectAll(){
	$sql = "SELECT * FROM catalog";
	$result = mysql_query($sql) or die(mysql_error());
	return db2Array($result);
}
//добавление товаров в корзину
function add2basket($customer, $goodsid, $quantity, $datetime){
	$sql = "INSERT INTO basket(
							customer,
							goodsid,
							quantity,
							datetime)
						VALUES(
							'$customer',
							'$goodsid',
							'$quantity',
							'$datetime')";
	$result = mysql_query($sql) or die(mysql_error());
}
//вывод корзины пользователя
function myBasket(){
	$sql = "SELECT * FROM catalog, basket
				WHERE customer='".session_id()."'
				and catalog.id=basket.goodsid";
	$result = mysql_query($sql) or die(mysql_error());
	return $result;
}
//удаление товара из корзины
function basketDel($id){
	$sql = "DELETE FROM basket WHERE id = $id";
	$result = mysql_query($sql) or die(mysql_error());
}
//пересохранение товаров из корзины в заказы
function resave($datetime){
	$goods = myBasket();
	while ($good = mysql_fetch_assoc($goods)){
			$sql = "INSERT INTO orders(
								title,
								material,
								stone,
								price,
								customer,
								quantity,
								datetime
						)VALUES(
							'". $good["title"] ."',
							'". $good["material"] ."',
							'". $good["stone"] ."',
							'". $good["price"] ."',
							'". $good["customer"] ."',
							'". $good["quantity"] ."',
							$datetime)";
		mysql_query($sql) or die(mysql_error());
}
//удаление данных из таблицы basket
$sql = "DELETE FROM basket WHERE customer='" . session_id() . "'";
mysql_query($sql) or die(mysql_error());
}
//получение информации о заказе
function getOrders() {
	//получение заказчиков из log-файла
	$orders = file(ORDERS_LOG);
	$allorders = array();

	foreach ($orders as $order) {
		list($name, $email, $phone, $address, $customer, $date) = 
		explode("|", $order);

		$orderinfo = array();

		$orderinfo["name"] = $name;
		$orderinfo["email"] = $email;
		$orderinfo["phone"] = $phone;
		$orderinfo["address"] = $address;
		$orderinfo["customer"] = $customer;
		$orderinfo["date"] = $date;
	//товары из заказов:
		$sql = "SELECT * FROM orders
				WHERE customer='".$orderinfo["customer"]."' AND datetime=
				".$orderinfo["date"];
		$result = mysql_query($sql) or die(mysql_error());
		$orderinfo["goods"] = $result;
		$allorders[] = $orderinfo;
	}
	return $allorders;
}
?>