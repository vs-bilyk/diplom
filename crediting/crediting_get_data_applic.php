
<?php 

 // получаем данные из таблицы crediting
$sql_crediting = "SELECT * FROM leasing.crediting WHERE ND='".$key."';";

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

 // получаем данные из таблицы banks
$sql_banks = "SELECT NAME, FIO  FROM leasing.banks WHERE INN='".$row_crediting['BINN']."';";

if(!$result_banks = mysql_query($sql_banks, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_banks = mysql_fetch_array($result_banks);
 // конец

// получаем данные из таблицы по предмету лизинга
$sql_lease_agreement = "SELECT lease_agreement.CPOL, order.NAME 
FROM leasing.lease_agreement, leasing.order, leasing.crediting 
WHERE lease_agreement.NZN = order.NZN
AND lease_agreement.NLD = crediting.NLD 
AND crediting.ND='".$key."';";

if(!$result_lease_agreement = mysql_query($sql_lease_agreement, $link)) {
	echo "Не удалось выполнить запрос!";
	exit();
}
$row_lease_agreement = mysql_fetch_array($result_lease_agreement);
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

list ($year, $month, $day) = split ('[/.-]', $row_crediting['ZDATE']); // разбиваем дату для передечи в js функцию
list ($year_p, $month_p, $day_p) = split ('[/.-]', $row_crediting['PDATE']); // разбиваем дату погашения
 ?>

