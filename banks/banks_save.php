<?php

include "../connect.php";

$inn = $_POST['company_inn']; 
$name = $_POST['NAME'];
$bik = $_POST['BIK'];
$ogrn = $_POST['OGRN'];
$addl = $_POST['ADDL'];
$addm = $_POST['ADDM'];
$kpp = $_POST['KPP'];
$rs = $_POST['RS'];
$ks = $_POST['KS'];
$ss = $_POST['SS'];
$tf = $_POST['TF'];
$fx = $_POST['FX'];
$fio = $_POST['FIO'];

$sql = "UPDATE `leasing`.`banks` SET `NAME`='".$name."', `BIK`='".$bik."', `OGRN`='".$ogrn."', `ADDL`='".$addl."', `ADDM`='".$addm."', `KPP`='".$kpp."', `RS`='".$rs."', `KS`='".$ks."', `SS`='".$ss."', `TF`='".$tf."', `FX`='".$fx."', `FIO`='".$fio."' WHERE `INN`='".$inn."';";

$result = mysql_query($sql, $link); //Отправляем запрос

if ($result == 0) {
	echo "Возникла ошибка при изменении данных!";
}
else echo '<script language="javascript">window.location.href="banks_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными

?>