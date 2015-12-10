<?php

include "../connect.php";

$company = $_POST['company']; // получение данных из невидимого input для определения таблицы
$inn = $_POST['company_inn'];
$name = $_POST['NAME'];
$ogrn = $_POST['OGRN'];
$addl = $_POST['ADDL'];
$addm = $_POST['ADDM'];
$kpp = $_POST['KPP'];
$rs = $_POST['RS'];
$binn = $_POST['BINN'];
$tf = $_POST['TF'];
$fx = $_POST['FX'];
$fio = $_POST['FIO'];

$sql = "UPDATE `leasing`.`".$company."` SET `NAME`='".$name."', `OGRN`='".$ogrn."', `ADDL`='".$addl."', `ADDM`='".$addm."', `KPP`='".$kpp."',  `RS`='".$rs."', `BINN`='".$binn."', `TF`='".$tf."', `FX`='".$fx."', `FIO`='".$fio."' WHERE `INN`='".$inn."';";

$result = mysql_query($sql, $link); //Отправляем запрос

if ($result == 0) {
	echo "Возникла ошибка при изменении данных!";
}
else echo '<script language="javascript">window.location.href="../'.$company.'/'.$company.'_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными

?>