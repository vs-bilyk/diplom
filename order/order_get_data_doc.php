
<?php 

 // получаем данные из таблицы order
$sql_order = "SELECT * FROM leasing.order WHERE NZN='".$key."';";

if(!$result_order = mysql_query($sql_order, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_order = mysql_fetch_array($result_order);
 // конец

 // получаем данные из таблицы leasing_company
$sql_leasing_company = "SELECT NAME, FIO  FROM leasing.leasing_company;";

if(!$result_leasing_company = mysql_query($sql_leasing_company, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_leasing_company = mysql_fetch_array($result_leasing_company);
 // конец

 // получаем данные из таблицы suppliers
$sql_suppliers = "SELECT NAME, FIO  FROM leasing.suppliers WHERE INN='".$row_order['PINN']."';";

if(!$result_suppliers = mysql_query($sql_suppliers, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_suppliers = mysql_fetch_array($result_suppliers);
 // конец

// получаем данные из таблицы clients
$sql_clients = "SELECT NAME, ADDM FROM leasing.clients WHERE INN='".$row_order['KINN']."';";

if(!$result_clients = mysql_query($sql_clients, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_clients = mysql_fetch_array($result_clients);
 // конец

list ($year, $month, $day) = split ('[/.-]', $row_order['DDATE']); // разбиваем дату для передечи в js функцию
 ?>

