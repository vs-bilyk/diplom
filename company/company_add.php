<?php 

include '../connect.php';

$company = $_POST['company']; // получение данных из невидимого input для определения таблицы
$name = $_POST['NAME'];
$ogrn = $_POST['OGRN'];
$addl = $_POST['ADDL'];
$addm = $_POST['ADDM'];
$inn = $_POST['INN'];
$kpp = $_POST['KPP'];
$rs = $_POST['RS'];
$binn = $_POST['BINN'];
$tf = $_POST['TF'];
$fx = $_POST['FX'];
$fio = $_POST['FIO'];

$str_sql = 'INSERT INTO `leasing`.`'.$company.'` (`NAME`, `OGRN`, `ADDL`, `ADDM`, `INN`, `KPP`, `RS`, `BINN`, `TF`, `FX`, `FIO`) VALUES ("'.$name.'", "'.$ogrn.'", "'.$addl.'", "'.$addm.'", "'.$inn.'", "'.$kpp.'", "'.$rs.'", "'.$binn.'", "'.$tf.'", "'.$fx.'", "'.$fio.'");';

$result = mysql_query($str_sql, $link);

if(!$result) {
	echo "Возникла ошибка при добавлении данных"; 
}
else echo '<script language="javascript">window.location.href="../'.$company.'/'.$company.'_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными


?>