<?php
function clearData($data, $type='i'){
	switch ($type){
		case 'i':
			return $data*1;break;
		case 's':
			return trim(strip_tags($data));break;
	}
}
$output = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
	$n1 = clearData($_POST['num1']);
	$n2 = clearData($_POST['num2']);
	$op = clearData($_POST['operator'], 's'); 
	$output = "$n1 $op $n2 = ";
	switch($op){
		case '+': $output .= $n1+$n2;break;
		case '-': $output .= $n1-$n2;break;
		case '*': $output .= $n1*$n2;break;
		case '/': 
			if($n2==0)
				$output = 'Деление на ноль запрещено!';
			else
				$output .=$n1/$n2;
			break;
		default: $output = "Неизвестный оператор $op";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Калькулятор</title>
	<meta charset="utf-8">
	<meta name="author" content="natalucia777@ukr.net" />
	<meta name="description" калькулятор, расчет, считать, эксклюзивная бижутерия,модные украшения для женщин, бижутерия, кольца, серьги, камни, подарки/>
	<meta name="keywords" калькулятор, стиль, мода, бижутерия, кольца, серьги, украшения, камни,	подарки, аксесуары, браслеты, для женщин, эксклюзивная бижутерия, кольцо, печатка />
	<link rel="stylesheet" href="/style/style_1.css" type="text/css">
</head>
<body class="body">
<?php
if($output)
	echo "";
	echo "Калькулятор: $output";
?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
число 1:
<input class="inp" type="text" name="num1"/><br/>
оператор:
<input class="inp" type="text" name="operator"/><br/>
число 2:
<input class="inp" type="text" name="num2"/><br/>
<input type="submit" value="Считать!"/>
</form>
</body>
</html>