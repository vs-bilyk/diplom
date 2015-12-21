<?php

require_once 'connect.php';

$sql_db = "CREATE DATABASE leasing"; // запрос для создание базы данных
$result_db = mysql_query($sql_db, $link);  // создание базы данных

$sql_banks = "CREATE TABLE `leasing`.`banks` (
	`NAME` VARCHAR(40) NOT NULL,
	`OGRN` BIGINT(13) ZEROFILL NOT NULL,
	`ADDL` VARCHAR(40) NOT NULL,
	`ADDM` VARCHAR(40) NOT NULL,
	`INN` BIGINT(10) ZEROFILL NOT NULL,
	`KPP` INT(9) ZEROFILL NOT NULL,
	`BIK` INT(9) ZEROFILL NOT NULL,
	`RS` VARCHAR(20) NOT NULL,
	`KS` VARCHAR(20) NOT NULL,
	`SS` VARCHAR(20) NOT NULL,
	`TF` VARCHAR(15),
	`FX` VARCHAR(15),
	`FIO` VARCHAR(35),
	PRIMARY KEY(`INN`))";

$result_banks = mysql_query($sql_banks, $link);

$name_table_array = array('clients', 'suppliers', 'leasing_company'); // массив с названием таблиц
$length_array = count($name_table_array);

for ($i = 0; $i < $length_array; $i++) { // цикл для создания трех одинаковых по содержанию таблиц

	$sql_company = "CREATE TABLE `leasing`.`".$name_table_array[$i]."` ( 
		`NAME` VARCHAR(40) NOT NULL,
		`OGRN` BIGINT(13) ZEROFILL NOT NULL,
		`ADDL` VARCHAR(40) NOT NULL,
		`ADDM` VARCHAR(40) NOT NULL,
		`INN` BIGINT(10) ZEROFILL NOT NULL,
		`KPP` INT(9) ZEROFILL NOT NULL,
		`RS` VARCHAR(20) NOT NULL,
		`BINN` BIGINT(10) ZEROFILL NOT NULL,
		`TF` VARCHAR(15) NOT NULL,
		`FX` VARCHAR(15) NOT NULL,
		`FIO` VARCHAR(35) NOT NULL,
		PRIMARY KEY(`INN`),
		FOREIGN KEY (`BINN`) REFERENCES `banks`(`INN`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT)";
	
	$result_company = mysql_query($sql_company, $link);
}

$sql_order = "CREATE TABLE `leasing`.`order` (
	`NZN` INT(9) ZEROFILL AUTO_INCREMENT NOT NULL,
	`DDATE` DATE NOT NULL,
	`PINN` BIGINT(10) ZEROFILL NOT NULL,
	`NAME` VARCHAR(40) NOT NULL,	
	`PRICE` DECIMAL(10, 2) NOT NULL,
	`KINN` BIGINT(10) ZEROFILL NOT NULL,
	PRIMARY KEY(`NZN`),
	FOREIGN KEY (`PINN`) REFERENCES `suppliers`(`INN`)
	ON UPDATE CASCADE
	ON DELETE RESTRICT,
	FOREIGN KEY (`KINN`) REFERENCES `clients`(`INN`)
	ON UPDATE CASCADE
	ON DELETE RESTRICT)"; 

$sql_lease_agreement = "CREATE TABLE `leasing`.`lease_agreement` (
	`NLD` INT(9) ZEROFILL AUTO_INCREMENT NOT NULL,
	`DDATE` DATE NOT NULL,
	`NZN` INT(9) ZEROFILL NOT NULL,
	`CPOL` VARCHAR(40) NOT NULL,
	`POSDATE` DATE NOT NULL,
	`T` INT NOT NULL NOT NULL, --изменила
	`PP` INT NOT NULL, --изменила
	`NDATE` DATE NOT NULL,
	`CP` INT NOT NULL,
	`KU` DECIMAL(9, 1),
	`Q` DECIMAL(9, 2),
	-- `STK` INT,
	`STV` INT,
	-- `PRV` BOOLEAN NOT NULL, -- VARCHAR(3),
	`PSU` DECIMAL(10, 2),
	`SNDS` INT,
	`AV` DECIMAL(10, 2),
	`K` INT(3),
	`PVI` BOOLEAN NOT NULL, -- VARCHAR(3),
	`OTDATA` INT,
	`PNP` INT,
	`SH` DECIMAL(10, 2),
	PRIMARY KEY(`NLD`),
	FOREIGN KEY (`NZN`) REFERENCES `order`(`NZN`)
	ON UPDATE CASCADE
	ON DELETE RESTRICT)"; 

$sql_crediting = "CREATE TABLE `leasing`.`crediting` (
	`ND` INT(9) ZEROFILL AUTO_INCREMENT  NOT NULL,	
	`DDATE` DATE  NOT NULL,
	`BINN` BIGINT(10) ZEROFILL NOT NULL,
	`SUMMA` DECIMAL(10, 2)  NOT NULL,
	`PDATE` DATE NOT NULL,
	`PS` INT NOT NULL,
	`ZDATE` DATE NOT NULL,
	`NLD` INT(9) ZEROFILL NOT NULL,
	PRIMARY KEY(`ND`),
	FOREIGN KEY (`NLD`) REFERENCES `lease_agreement`(`NLD`)
	ON UPDATE CASCADE
	ON DELETE RESTRICT)";

$sql_purchase_sale = "CREATE TABLE `leasing`.`purchase_sale` (
	`NDKP` INT(9) ZEROFILL AUTO_INCREMENT NOT NULL,
	`DDATE`	DATE NOT NULL,
	`NLD` INT(9) ZEROFILL NOT NULL,
	`POPL` DECIMAL(10, 2),
	`PDATE` INT,
	`OPL` DECIMAL(10, 2) NOT NULL,
	`ODATE` INT NOT NULL,
	`SR` INT NOT NULL,
	`UNDATE` INT,
	`PNP` INT,
	`PND` INT,
	`PNO` INT,
	PRIMARY KEY(`NDKP`),
	FOREIGN KEY (`NLD`) REFERENCES `lease_agreement`(`NLD`)
	ON UPDATE CASCADE
	ON DELETE RESTRICT)"; 

$result_order = mysql_query($sql_order, $link);
$result_lease_agreement = mysql_query($sql_lease_agreement, $link);
$result_crediting = mysql_query($sql_crediting, $link);
$result_purchase_sale = mysql_query($sql_purchase_sale, $link);

if(!$result_db) {
	echo 'Ошибка при создании базы данных! <br>';
	exit();
}

if(!$result_company || !$result_banks || !$result_order || !$result_crediting || !$result_lease_agreement || !$result_purchase_sale) {
	echo 'Ошибка при создании таблиц!';
}
else echo '<script language="javascript">window.location.href="index.php?thnx=0";</script>';

?>