<?php

require_once 'connect.php';

$sql_db = "CREATE DATABASE leasing"; // запрос для создание базы данных
$result_db = mysql_query($sql_db, $link);  // создание базы данных

$name_table_array = array('clients', 'suppliers', 'leasing_company'); // массив с названием таблиц
$length_array = count($name_table_array);

for ($i = 0; $i < $length_array; $i++) { // цикл для создания трех одинаковых по содержанию таблиц

	$sql_company = "CREATE TABLE `leasing`.`".$name_table_array[$i]."` ( 
		`NAME` VARCHAR(40) NOT NULL,
		`OGRN` VARCHAR(13) NOT NULL,
		`ADDL` VARCHAR(40) NOT NULL,
		`ADDM` VARCHAR(40) NOT NULL,
		`INN` VARCHAR(10) NOT NULL,
		`KPP` VARCHAR(9) NOT NULL,
		`RS` VARCHAR(20) NOT NULL,
		`BIK` VARCHAR(9) NOT NULL,
		`TF` VARCHAR(10) NOT NULL,
		`FX` VARCHAR(10) NOT NULL,
		`FIO` VARCHAR(35) NOT NULL,
		PRIMARY KEY(`INN`, `NAME`))";
	
	$result_company = mysql_query($sql_company, $link);
}

$sql_banks = "CREATE TABLE `leasing`.`banks` (
	`NAME` VARCHAR(40) NOT NULL,
	`BIK` VARCHAR(9) NOT NULL,
	`OGRN` VARCHAR(13) NOT NULL,
	`ADDL` VARCHAR(40) NOT NULL,
	`ADDM` VARCHAR(40) NOT NULL,
	`INN` VARCHAR(10) NOT NULL,
	`KPP` VARCHAR(9) NOT NULL,
	`RS` VARCHAR(20) NOT NULL,
	`KS` VARCHAR(20) NOT NULL,
	`SS` VARCHAR(20) NOT NULL,
	`TF` VARCHAR(10) NOT NULL,
	`FX` VARCHAR(10) NOT NULL,
	`FIO` VARCHAR(35) NOT NULL,
	PRIMARY KEY(`INN`, `NAME`))";

$sql_order = "CREATE TABLE `leasing`.`order` (
	`NZN` INT(9) ZEROFILL AUTO_INCREMENT NOT NULL,
	`DDATE` DATE NOT NULL,
	`PINN` VARCHAR(10) NOT NULL,
	`NAME` VARCHAR(40) NOT NULL,	
	`PRICE` DECIMAL(10, 2) NOT NULL,
	`KINN` VARCHAR(10) NOT NULL,
	PRIMARY KEY(`NZN`))"; 

$sql_crediting = "CREATE TABLE `leasing`.`crediting` (
	`ND` INT(9) ZEROFILL AUTO_INCREMENT  NOT NULL,	
	`DDATE` DATE  NOT NULL,
	`BINN` VARCHAR(10)  NOT NULL,
	`SUMMA` DECIMAL(10, 2)  NOT NULL,
	`PDATE` DATE NOT NULL,
	`PS` INT NOT NULL,
	`ZDATE` DATE NOT NULL,
	`NLD` VARCHAR(9) NOT NULL,
	`KINN` VARCHAR(10) NOT NULL,
	PRIMARY KEY(`ND`))";

$sql_lease_agreement = "CREATE TABLE `leasing`.`lease_agreement` (
	`NLD` INT(9) ZEROFILL AUTO_INCREMENT NOT NULL,
	`DDATE` DATE NOT NULL,
	`KINN` VARCHAR(10) NOT NULL,
	`NZN` VARCHAR(9) NOT NULL,
	`PURPOSE` VARCHAR(40) NOT NULL,
	`POSDATE` DATE NOT NULL,
	`PINN` VARCHAR(10) NOT NULL,
	`T` INT NOT NULL NOT NULL,
	`PP` VARCHAR(7) NOT NULL,
	`NDATE` DATE NOT NULL,
	`CP` INT NOT NULL,
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
	`NDKP` INT(9) ZEROFILL AUTO_INCREMENT NOT NULL,
	`DDATE`	DATE NOT NULL,
	`PINN` VARCHAR(10) NOT NULL,
	`KINN` VARCHAR(10) NOT NULL,
	`NZN` VARCHAR(9) NOT NULL,
	`NLD` VARCHAR(9) NOT NULL,
	`POPL` DECIMAL(10, 2),
	`PDATE` INT,
	`OPL` DECIMAL(10, 2) NOT NULL,
	`ODATE` INT NOT NULL,
	`SR` INT NOT NULL,
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
else echo '<script language="javascript">window.location.href="index.php?thnx=0";</script>';

?>