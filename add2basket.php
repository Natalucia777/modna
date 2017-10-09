<?php
//запуск сессии
session_start();
//подключение библиотек
require "/db/eshop_db.inc.php";
require "/db/eshop_lib.inc.php";
//покупатель
$customer = session_id();
//получить id товара, добавляемого в корзину
$goodsid = $_GET["id"];
//количество товара
$quantity = 1;
//дата добавления товара в корзину
$datetime = time();

add2basket($customer, $goodsid, $quantity, $datetime);

header("Location: catalog.php");
?>