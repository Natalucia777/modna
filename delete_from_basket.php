<?php 
//запуск сессии
session_start();
//подключение библиотек
require "/db/eshop_db.inc.php";
require "/db/eshop_lib.inc.php";

//ID удаляемого товара
$id = $_GET['id'];

//удаление товара из корзины
basketDel($id);

header('Location: basket.php');
?>