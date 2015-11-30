<?php

$link = mysql_connect('localhost', 'root', '12345qQ');

if(!$link) {
	echo 'Ошибка! Соединение не установлено!';
	exit;
}

?>