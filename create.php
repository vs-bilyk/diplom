<?php

require_once 'connect.php';

$sql_db = "CREATE DATABASE leasing"; // запрос для создание базы данных
$result_db = mysql_query($sql_db, $link);  // создание базы данных

$name_table_array = array('clients', 'suppliers', 'leasing_company'); // массив с названием таблиц
$length_array = count($name_table_array);

for ($i = 0; $i < $length_array; $i++) { // цикл для создания трех одинаковых по содержанию таблиц

	$sql_company = "CREATE TABLE `leasing`.`".$name_table_array[$i]."` ( 
		`NAME` VARCHAR(40),
		`OGRN` VARCHAR(13),
		`ADDL` VARCHAR(40),
		`ADDM` VARCHAR(40),
		`INN` VARCHAR(10),
		`KPP` VARCHAR(9),
		`RS` VARCHAR(20),
		`BIK` VARCHAR(9),
		`TF` VARCHAR(10),
		`FX` VARCHAR(10),
		`FIO` VARCHAR(35),
		PRIMARY KEY(`INN`))";
	
	$result_company = mysql_query($sql_company, $link);
}

$sql_banks = "CREATE TABLE `leasing`.`banks` (
	`NAME` VARCHAR(40),
	`BIK` VARCHAR(9),
	`OGRN` VARCHAR(13),
	`ADDL` VARCHAR(40),
	`ADDM` VARCHAR(40),
	`INN` VARCHAR(10),
	`KPP` VARCHAR(9),
	`RS` VARCHAR(20),
	`KS` VARCHAR(20),
	`SS` VARCHAR(20),
	`TF` VARCHAR(10),
	`FX` VARCHAR(10),
	`FIO` VARCHAR(35),
	PRIMARY KEY(`INN`))";

$sql_order = "CREATE TABLE `leasing`.`order` (
	`NZN` INT(9) ZEROFILL AUTO_INCREMENT,
	`DDATE` DATE,
	`PINN` VARCHAR(10),
	`NAME` VARCHAR(40),	
	`PRICE` DECIMAL(10, 2),
	`KINN` VARCHAR(10),
	PRIMARY KEY(`NZN`))"; 

$sql_crediting = "CREATE TABLE `leasing`.`crediting` (
	`ND` INT(9) ZEROFILL AUTO_INCREMENT,	
	`DDATE` DATE,
	`BINN` VARCHAR(10),
	`SUMMA` DECIMAL(10, 2),
	`PDATE` DATE,
	`PS` INT,
	`ZDATE` DATE,
	`NLD` VARCHAR(9),
	`KINN` VARCHAR(10),
	PRIMARY KEY(`ND`))";

$sql_lease_agreement = "CREATE TABLE `leasing`.`lease_agreement` (
	`NLD` INT(9) ZEROFILL AUTO_INCREMENT,
	`DDATE` DATE,
	`KINN` VARCHAR(10),
	`NZN` VARCHAR(9),
	`PURPOSE` VARCHAR(40),
	`POSDATE` DATE,
	`PINN` VARCHAR(10),
	`T` INT,
	`PP` VARCHAR(7),
	`NDATE` DATE,
	`CP` INT,
	`KU` DECIMAL(9, 1),
	`Q` DECIMAL(9, 2),
	`STK` INT,
	`STV` INT,
	`PRV` VARCHAR(3),
	`PSU` DECIMAL(10, 2),
	`SNDS` INT,
	`LV0` DECIMAL(10, 2),
	`K` VARCHAR(10),
	`PVI` VARCHAR(3),
	`OTDATA` INT,
	`PNP` INT,
	`SH` DECIMAL(10, 2),
	PRIMARY KEY(`NLD`))"; 

$sql_purchase_sale = "CREATE TABLE `leasing`.`purchase_sale` (
	`NDKP` INT(9) ZEROFILL AUTO_INCREMENT,
	`DDATE`	DATE,
	`PINN` VARCHAR(10),
	`KINN` VARCHAR(10),
	`NZN` VARCHAR(9),
	`NLD` VARCHAR(9),
	`POPL` DECIMAL(10, 2),
	`PDATE` INT,
	`OPL` DECIMAL(10, 2),
	`ODATE` INT,
	`SR` INT,
	`UNDATE` INT,
	`PNP` INT,
	`PND` INT,
	`PNO` INT,
	PRIMARY KEY(`NDKP`))"; 

$result_banks = mysql_query($sql_banks, $link);
$result_order = mysql_query($sql_order, $link);
$result_crediting = mysql_query($sql_crediting, $link);
$result_lease_agreement = mysql_query($sql_lease_agreement, $link);
$result_purchase_sale = mysql_query($sql_purchase_sale, $link);

if(!$result_db) {
	echo 'Ошибка при создании базы данных! <br>';
}

if(!$result_company || !$result_banks || !$result_order || !$result_crediting || !$result_lease_agreement || !$result_purchase_sale) {
	echo 'Ошибка при создании таблиц!';
}

?>