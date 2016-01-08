<?php 

include '../connect.php';

$name = $_POST['NAME'];
$ogrn = $_POST['OGRN'];
$addl = $_POST['ADDL'];
$addm = $_POST['ADDM'];
$inn = $_POST['INN'];
$kpp = $_POST['KPP'];
$bik = $_POST['BIK'];
$rs = $_POST['RS'];
$ks = $_POST['KS'];
$ss = $_POST['SS'];
$tf = $_POST['TF'];
$fx = $_POST['FX'];
$fio = $_POST['FIO'];

$str_sql = 'INSERT INTO `leasing`.`banks` (`NAME`, `OGRN`, `ADDL`, `ADDM`, `INN`, `KPP`, `BIK`, `RS`, `KS`, `SS`, `TF`, `FX`, `FIO`) VALUES ("'.$name.'", "'.$ogrn.'", "'.$addl.'", "'.$addm.'", "'.$inn.'", "'.$kpp.'", "'.$bik.'", "'.$rs.'", "'.$ks.'", "'.$ss.'", "'.$tf.'", "'.$fx.'", "'.$fio.'");';

$result = mysql_query($str_sql, $link);

if(!$result) {
	echo "Возникла ошибка при добавлении данных"; 
}
else echo '<script language="javascript">window.location.href="banks_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными

?>