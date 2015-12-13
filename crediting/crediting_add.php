<?php 

include '../connect.php';

$ddate = $_POST['DDATE'];
$binn = $_POST['BINN'];
$summa = $_POST['SUMMA'];
$pdate = $_POST['PDATE'];
$ps = $_POST['PS'];
$zdate = $_POST['ZDATE'];
$nld = $_POST['NLD'];

$str_sql = 'INSERT INTO `leasing`.`crediting` (`DDATE`, `BINN`, `SUMMA`, `PDATE`, `PS`, `ZDATE`, `NLD`) 
VALUES ("'.$ddate.'", "'.$binn.'", "'.$summa.'", "'.$pdate.'", "'.$ps.'", "'.$zdate.'", "'.$nld.'");';

$result = mysql_query($str_sql, $link);

if(!$result) {
	echo "Возникла ошибка при добавлении данных"; 
}
else echo '<script language="javascript">window.location.href="crediting_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными


?>