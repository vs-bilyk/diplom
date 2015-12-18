
<?php 

 // получаем данные из таблицы lease_agreement
$sql_lease_agreement = "SELECT * FROM leasing.lease_agreement WHERE NLD='".$key."';";

if(!$result_lease_agreement = mysql_query($sql_lease_agreement, $link)) {
	echo "Не удалось выполнить запрос!"; 
	exit();
}
$row_lease_agreement = mysql_fetch_array($result_lease_agreement);
 // конец

 // получаем данные из таблицы leasing_company
$sql_leasing_company = "SELECT *  FROM leasing.leasing_company;";

if(!$result_leasing_company = mysql_query($sql_leasing_company, $link)) {
	echo "Не удалось выполнить запрос!"; 
	exit();
}
$row_leasing_company = mysql_fetch_array($result_leasing_company);
 // конец

// получаем данные из таблицы order
$sql_order ="SELECT order.NAME, order.PRICE
FROM leasing.order, leasing.lease_agreement
WHERE order.NZN = lease_agreement.NZN
AND lease_agreement.NLD='".$key."';";

if(!$result_order = mysql_query($sql_order, $link)) {
	echo "Не удалось выполнить запрос!"; 
	exit();
}
$row_order = mysql_fetch_array($result_order);
// конец

// получаем данные из таблицы clients
$sql_clients = "SELECT clients.NAME, clients.OGRN, clients.ADDL, clients.ADDM, 
clients.INN, clients.KPP, clients.RS, clients.BINN, clients.TF, clients.FX, clients.FIO
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

// получаем данные из таблицы suppliers
$sql_suppliers = "SELECT suppliers.NAME FROM leasing.suppliers, leasing.order, leasing.lease_agreement  
WHERE suppliers.INN=order.PINN 
AND order.NZN=lease_agreement.NZN 
AND lease_agreement.NLD='".$key."';";

if(!$result_suppliers = mysql_query($sql_suppliers, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_suppliers = mysql_fetch_array($result_suppliers);
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

// получаем данные банка клиента
$sql_clients_bank = "SELECT clients.BINN, banks.NAME, banks.BIK, banks.KS 
FROM leasing.banks, leasing.clients, leasing.order, leasing.lease_agreement 
WHERE clients.BINN=banks.INN
AND clients.INN=order.KINN 
AND order.NZN=lease_agreement.NZN 
AND lease_agreement.NLD='".$key."';";

if(!$result_clients_bank = mysql_query($sql_clients_bank, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_clients_bank = mysql_fetch_array($result_clients_bank);
 // конец

// получаем данные банка лизинговой компании
$sql_leasing_bank = "SELECT leasing_company.BINN, banks.NAME, banks.BIK, banks.KS 
FROM leasing.leasing_company, leasing.banks 
WHERE leasing_company.BINN=banks.INN;";

if(!$result_leasing_bank = mysql_query($sql_leasing_bank, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_leasing_bank = mysql_fetch_array($result_leasing_bank);
 // конец

list ($year, $month, $day) = split ('[/.-]', $row_lease_agreement['DDATE']); // разбиваем дату для передечи в js функцию
list ($year_posdate, $month_posdate, $day_posdate) = split ('[/.-]', $row_lease_agreement['POSDATE']);
list ($year_ndate, $month_ndate, $day_ndate) = split ('[/.-]', $row_lease_agreement['NDATE']);
 ?>

