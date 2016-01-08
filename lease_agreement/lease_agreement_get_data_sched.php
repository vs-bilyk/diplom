<?php 

 // получаем данные из таблицы lease_agreement
$sql_lease_agreement = "SELECT * FROM leasing.lease_agreement WHERE NLD='".$key."';";

if(!$result_lease_agreement = mysql_query($sql_lease_agreement, $link)) {
	echo "Не удалось выполнить запрос!"; 
	exit();
}
$row_lease_agreement = mysql_fetch_array($result_lease_agreement);
 // конец

// получаем данные из таблицы order
$sql_order ="SELECT order.PRICE
FROM leasing.order, leasing.lease_agreement
WHERE order.NZN = lease_agreement.NZN
AND lease_agreement.NLD='".$key."';";

if(!$result_order = mysql_query($sql_order, $link)) {
	echo "Не удалось выполнить запрос!"; 
	exit();
}
$row_order = mysql_fetch_array($result_order);
// конец

// получаем данные из таблицы crediting
$sql_crediting = "SELECT crediting.PS FROM leasing.crediting 
WHERE crediting.NLD='".$key."';";

if(!$result_crediting = mysql_query($sql_crediting, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_crediting = mysql_fetch_array($result_crediting);
 // конец

 // получаем данные из таблицы leasing_company
$sql_leasing_company = "SELECT *  FROM leasing.leasing_company;";

if(!$result_leasing_company = mysql_query($sql_leasing_company, $link)) {
	echo "Не удалось выполнить запрос!"; 
	exit();
}
$row_leasing_company = mysql_fetch_array($result_leasing_company);
 // конец

// получаем данные из таблицы clients
$sql_clients = "SELECT clients.NAME, clients.FIO
FROM leasing.clients, leasing.order, leasing.lease_agreement  
WHERE clients.INN=order.KINN 
AND order.NZN=lease_agreement.NZN 
AND lease_agreement.NLD='".$key."';";

if(!$result_clients = mysql_query($sql_clients, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_clients = mysql_fetch_array($result_clients);
 // конец


list ($year, $month, $day) = split ('[/.-]', $row_lease_agreement['DDATE']); // разбиваем дату для передечи в js функцию
list ($year_posdate, $month_posdate, $day_posdate) = split ('[/.-]', $row_lease_agreement['NDATE']);

$cp = $row_lease_agreement['CP'] ? $row_lease_agreement['CP'] : 0;
$bs = $row_order['PRICE'] ? $row_order['PRICE']: 0;
$ku = $row_lease_agreement['KU'] ? $row_lease_agreement['KU'] : 0;
$q = $row_lease_agreement['Q'] ? $row_lease_agreement['Q'] : 0;
$st = $row_crediting['PS'] ? $row_crediting['PS'] : 0;
$p = $row_lease_agreement['STV'] ? $row_lease_agreement['STV'] : 0;
$pdu = $row_lease_agreement['PSU'] ? $row_lease_agreement['PSU'] : 0;
$snds = $row_lease_agreement['SNDS'] ? $row_lease_agreement['SNDS'] : 0;
$t = $row_lease_agreement['T'] ? $row_lease_agreement['T'] : 0;
$p = $row_lease_agreement['PP'] ? $row_lease_agreement['PP'] : 0;
$av = $row_lease_agreement['AV'] ? $row_lease_agreement['AV'] : 0;
$pvi = $row_lease_agreement['PVI'] ? $row_lease_agreement['PVI'] : 0; 

?>
