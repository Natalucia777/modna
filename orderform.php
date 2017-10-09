<!DOCTYPE html>
<html>
<head>
<title>Форма оформления заказа</title>
<meta charset="UTF-8"></head>
<body>
<form action="saveorder.php" method="post">
<p>Заказчик: <input type="text" name="name" size="50"></p>
<p>Email заказчика: <input type="text" name="email" size="50"></p>
<p>Телефон для связи: <input type="text" name="phone" size="50"></p>
<p>Адрес доставки: </p><br>
<textarea name="address" cols="50" rows="5">
</textarea>
<p><input type="submit" value="Заказать"></p>
</form>
</body>
</html>

