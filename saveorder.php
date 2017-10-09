<?php 
//запуск сессии
session_start ();
//подключение библиотек
require "/db/eshop_db.inc.php";
require "/db/eshop_lib.inc.php";
//получение донных о заказе
$name = strip_tags(addslashes(trim($_POST["name"])));
$email = strip_tags(addslashes(trim($_POST["email"])));
$phone = strip_tags(addslashes(trim($_POST["phone"])));
$address = strip_tags(addslashes(trim($_POST["address"])));
$customer = session_id();
$datetime = time();

//создание строки из полученных данных
$data = "$name|$email|$phone|$address|$customer|$datetime\r\n";

//сохранение данных в файл
file_put_contents(ORDERS_LOG, $data, FILE_APPEND);

//пересохранение купленных товаров из корзины в таблицу 
resave($datetime); ?>
<!DOCTYPE html>
<html>
<head><title>Созранение данных заказа</title>
<meta charset="UTF-8">
</head>
<body>
<p>Ваш заказ принят.</p>
<p><a href="catalog.php">Каталог товаров</a></p>
</body></html>