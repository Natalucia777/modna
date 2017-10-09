<?php
//подключение библиотек
require "/db/eshop_db.inc.php";
require "/db/eshop_lib.inc.php";
//получаем данные из формы
$title = addslashes(trim($_POST["title"]));
$material = addslashes(trim($_POST["material"]));
$stone = addslashes(trim($_POST["stone"]));
$price = addslashes (trim($_POST["price"]));
//сохранение нового товара в базе данных
save($title,$material,$stone,$price);
//переадресовуем пользователя на страницу добавления товара
header("Location: add2cat.php");
?>