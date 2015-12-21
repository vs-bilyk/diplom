<?php

include "../connect.php";

$nld = $_POST['number']; 
$ddate = $_POST['DDATE'];
$nzn = $_POST['NZN'];
$cpol = $_POST['CPOL'];
$posdate = $_POST['POSDATE'];    
$t = $_POST['T'];
$pp = $_POST['PP'];
$ndate = $_POST['NDATE'];      
$cp = $_POST['CP'];       
$ku = $_POST['KU'];   
$q = $_POST['Q'];
$stv = $_POST['STV'];     
$psu = $_POST['PSU'];    
$snds = $_POST['SNDS'];
$av = $_POST['AV'];     
$k = $_POST['K'];     
$pvi = $_POST['PVI'];
$opdate = $_POST['OTDATA'];   
$pnp = $_POST['PNP'];
$sh = $_POST['SH'];

$sql = "UPDATE `leasing`.`lease_agreement` 
SET `DDATE`='".$ddate."', `NZN`='".$nzn."', `CPOL`='".$cpol."', `POSDATE`='".$posdate."', `T`='".$t."',
`PP`='".$pp."', `NDATE`='".$ndate."', `CP`='".$cp."', `KU`='".$ku."', `Q`='".$q."',
 `STV`='".$stv."', `PSU`='".$psu."', `SNDS`='".$snds."',
`AV`='".$av."', `K`='".$k."', `PVI`='".$pvi."', `OTDATA`='".$opdate."', `PNP`='".$pnp."', `SH`='".$sh."'
WHERE `NLD`='".$nld."';";

$result = mysql_query($sql, $link); //Отправляем запрос

if ($result == 0) {
	echo "Возникла ошибка при изменении данных!";
}
else echo '<script language="javascript">window.location.href="lease_agreement_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными

?>
