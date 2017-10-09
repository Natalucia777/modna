<?php
//адрес сервера базы данных MySQL
define("DB_HOST", "localhost");
//логин для соединения с базой данных MySQL
define("DB_LOGIN", "natali");
//пароль для соединения с базой данных MySQL
define("DB_PASSWORD", "natali");
//имя базы данных
define("DB_NAME", "modna");
//имя файла с личными данными пользователей
define("ORDERS_LOG", "orders.log");
//кличество товаров в корзине пользователя
$count = 0;
//соединение с сервером базы данных MySQL
$conn = mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die("Не могу соединиться с сервером базы данных!");
//выбор базы данных
mysql_select_db(DB_NAME) or die(mysql_error());

//сколько единиц товара выбрал пользователь
$sql = "SELECT count(*) FROM basket WHERE customer='".session_id()."'";
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_row($result);
$count = $row[0];
//$count =mysql_result($res, 0, "count(*)");
?>