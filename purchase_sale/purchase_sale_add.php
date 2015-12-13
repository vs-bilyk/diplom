<?php 

include '../connect.php';

$ddate = $_POST['DDATE'];
$nld = $_POST['NLD'];
$popl = $_POST['POPL'];
$pdate = $_POST['PDATE'];
$opl = $_POST['OPL'];
$odate = $_POST['ODATE'];
$sr = $_POST['SR'];
$undate = $_POST['UNDATE']; 
$pnp = $_POST['PNP'];
$pnd = $_POST['PND'];
$pno = $_POST['PNO'];

$str_sql = 'INSERT INTO `leasing`.`purchase_sale` (`DDATE`, `NLD`, `POPL`, `PDATE`, `OPL`, `ODATE`, `SR`, `UNDATE`, `PNP`, `PND`, `PNO`) 
VALUES ("'.$ddate.'", "'.$nld.'", "'.$popl.'", "'.$pdate.'", "'.$opl.'", "'.$odate.'", "'.$sr.'", "'.$undate.'", "'.$pnp.'", "'.$pnd.'", "'.$pno.'");';

$result = mysql_query($str_sql, $link);

if(!$result) {
	echo "Возникла ошибка при добавлении данных"; 
}
else echo '<script language="javascript">window.location.href="purchase_sale_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными


?>