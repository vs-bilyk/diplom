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

$sql_payments = "CREATE TABLE `leasing`.`payments` (
	`NLD` INT(9) ZEROFILL NOT NULL,
	`1p`	DECIMAL	(10, 2),
	`2p`	DECIMAL	(10, 2),
	`3p`	DECIMAL	(10, 2),
	`4p`	DECIMAL	(10, 2),
	`5p`	DECIMAL	(10, 2),
	`6p`	DECIMAL	(10, 2),
	`7p`	DECIMAL	(10, 2),
	`8p`	DECIMAL	(10, 2),
	`9p`	DECIMAL	(10, 2),
	`10p`	DECIMAL	(10, 2),
	`11p`	DECIMAL	(10, 2),
	`12p`	DECIMAL	(10, 2),
	`13p`	DECIMAL	(10, 2),
	`14p`	DECIMAL	(10, 2),
	`15p`	DECIMAL	(10, 2),
	`16p`	DECIMAL	(10, 2),
	`17p`	DECIMAL	(10, 2),
	`18p`	DECIMAL	(10, 2),
	`19p`	DECIMAL	(10, 2),
	`20p`	DECIMAL	(10, 2),
	`21p`	DECIMAL	(10, 2),
	`22p`	DECIMAL	(10, 2),
	`23p`	DECIMAL	(10, 2),
	`24p`	DECIMAL	(10, 2),
	`25p`	DECIMAL	(10, 2),
	`26p`	DECIMAL	(10, 2),
	`27p`	DECIMAL	(10, 2),
	`28p`	DECIMAL	(10, 2),
	`29p`	DECIMAL	(10, 2),
	`30p`	DECIMAL	(10, 2),
	`31p`	DECIMAL	(10, 2),
	`32p`	DECIMAL	(10, 2),
	`33p`	DECIMAL	(10, 2),
	`34p`	DECIMAL	(10, 2),
	`35p`	DECIMAL	(10, 2),
	`36p`	DECIMAL	(10, 2),
	`37p`	DECIMAL	(10, 2),
	`38p`	DECIMAL	(10, 2),
	`39p`	DECIMAL	(10, 2),
	`40p`	DECIMAL	(10, 2),
	PRIMARY KEY(`NLD`),
	FOREIGN KEY (`NLD`) REFERENCES `lease_agreement`(`NLD`)
	ON UPDATE CASCADE
	ON DELETE RESTRICT)"; 

$result_order = mysql_query($sql_order, $link);
$result_lease_agreement = mysql_query($sql_lease_agreement, $link);
$result_crediting = mysql_query($sql_crediting, $link);
$result_purchase_sale = mysql_query($sql_purchase_sale, $link);
$result_payments = mysql_query($sql_payments, $link)

if(!$result_db) {
	echo 'Ошибка при создании базы данных! <br>';
	exit();
}

if(!$result_company || !$result_banks || !$result_order || !$result_crediting || !$result_lease_agreement || !$result_purchase_sale || !$result_payments) {
	echo 'Ошибка при создании таблиц!';
}
else echo '<script language="javascript">window.location.href="index.php?thnx=0";</script>';

?>