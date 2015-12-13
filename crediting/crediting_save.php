<?php

include "../connect.php";

$nd = $_POST['number']; 
$ddate = $_POST['DDATE'];
$binn = $_POST['BINN'];
$summa = $_POST['SUMMA'];
$pdate = $_POST['PDATE'];
$ps = $_POST['PS'];
$zdate = $_POST['ZDATE'];
$nld = $_POST['NLD'];

$sql = "UPDATE `leasing`.`crediting` 
SET `DDATE`='".$ddate."', `BINN`='".$binn."', `SUMMA`='".$summa."', `PDATE`='".$pdate."', `PS`='".$ps."',
`ZDATE`='".$zdate."', `NLD`='".$nld."'
WHERE `ND`='".$nd."';";

$result = mysql_query($sql, $link); //Отправляем запрос

if ($result == 0) {
	echo "Возникла ошибка при изменении данных!";
}
else echo '<script language="javascript">window.location.href="crediting_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными

?>
