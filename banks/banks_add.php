<?php 

include '../connect.php';

$name = $_POST['NAME'];
$bik = $_POST['BIK'];
$ogrn = $_POST['OGRN'];
$addl = $_POST['ADDL'];
$addm = $_POST['ADDM'];
$inn = $_POST['INN'];
$kpp = $_POST['KPP'];
$rs = $_POST['RS'];
$ks = $_POST['KS'];
$ss = $_POST['SS'];
$tf = $_POST['TF'];
$fx = $_POST['FX'];
$fio = $_POST['FIO'];

$str_sql = 'INSERT INTO `leasing`.`banks` (`NAME`, `BIK`, `OGRN`, `ADDL`, `ADDM`, `INN`, `KPP`, `RS`, `KS`, `SS`, `TF`, `FX`, `FIO`) VALUES ("'.$name.'", "'.$bik.'", "'.$ogrn.'", "'.$addl.'", "'.$addm.'", "'.$inn.'", "'.$kpp.'", "'.$rs.'", "'.$ks.'", "'.$ss.'", "'.$tf.'", "'.$fx.'", "'.$fio.'");';

$result = mysql_query($str_sql, $link);

if(!$result) {
	echo "Возникла ошибка при добавлении данных"; 
}
else echo '<script language="javascript">window.location.href="banks_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными


?>