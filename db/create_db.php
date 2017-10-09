<?php
define("DB_HOST", "localhost");
define("DB_LOGIN", "natali");
define("DB_PASSWORD", "natali");
define("DB_NAME", "modna");

mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die(mysql_error());
$sql = 'CREATE DATABASE ' . DB_NAME;

mysql_query($sql) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());

$sql = "
CREATE TABLE catalog (
		id int(11) NOT NULL auto_increment,
		title varchar(50) NOT NULL
default '',
		material varchar(50) NOT NULL 
default '',
		stone varchar(20) NOT NULL default '',
		price int(11) NOT NULL default 0,
		PRIMARY KEY(id) )";
mysql_query($sql) or die(mysql_error());

$sql = "
CREATE TABLE basket (
		id int(11) NOT NULL auto_increment,
		customer varchar(32) NOT NULL
default '',
		goodsid int(11) NOT NULL default 0,
		quantity int(4) NOT NULL default 0,
		datetime int(11) NOT NULL default 0,
		PRIMARY KEY (id))";
mysql_query($sql) or die(mysql_error());

$sql = "
CREATE TABLE orders (
		id int(11) NOT NULL auto_increment,
		title varchar(50) NOT NULL default '',
		material varchar(50) NOT NULL default '',
		stone varchar (20) NOT NULL default '',
		price int(11) NOT NULL default 0,
		customer varchar(32) NOT NULL default '',
		quantity int(4) NOT NULL default 0,
		datetime int(11) NOT NULL default 0,
		PRIMARY KEY (id))";
mysql_query($sql) or die(mysql_error());
mysql_close();

print '<p>Структура базы данных успешно созданна!</p>';
?>