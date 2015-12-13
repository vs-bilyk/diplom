<?php

include "../connect.php";

$ndkp = $_POST['number']; 
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

	
	
$sql = "UPDATE `leasing`.`purchase_sale` 
SET `DDATE`='".$ddate."', `NLD`='".$nld."', `POPL`='".$popl."', `PDATE`='".$pdate."', `OPL`='".$opl."', 
`ODATE`='".$odate."', `SR`='".$sr."', `UNDATE`='".$undate."', `PNP`='".$pnp."', `PND`='".$pnd."', `PNO`='".$pno."'
WHERE `NDKP`='".$ndkp."';";

$result = mysql_query($sql, $link); //Отправляем запрос

if ($result == 0) {
	echo "Возникла ошибка при изменении данных!";
}
else echo '<script language="javascript">window.location.href="purchase_sale_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными

?>
