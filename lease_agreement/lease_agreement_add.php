<?php 

include '../connect.php';

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
$stk = $_POST['STK'];
$stv = $_POST['STV'];   
$prv = $_POST['PRV'];
$psu = $_POST['PSU'];    
$snds = $_POST['SNDS'];
$av = $_POST['AV'];     
$k = $_POST['K'];       
$pvi = $_POST['PVI'];
$opdate = $_POST['OTDATA'];   
$pnp = $_POST['PNP'];
$sh = $_POST['SH'];

$str_sql = 'INSERT INTO `leasing`.`lease_agreement` 
	(`DDATE`, `NZN`, `CPOL`, `POSDATE`, `T`, 
	`PP`, `NDATE`, `CP`, `KU`, `Q`, 
	`STK`, `STV`, `PRV`, `PSU`, `SNDS`, 
	`AV`, `K`, `PVI`, `OTDATA`, `PNP`, `SH`) 
VALUES ("'.$ddate.'", "'.$nzn.'", "'.$cpol.'", "'.$posdate.'", "'.$t.'", 
	"'.$pp.'", "'.$ndate.'", "'.$cp.'", "'.$ku.'", "'.$q.'", 
	"'.$stk.'",  "'.$stv.'", "'.$prv.'", "'.$psu.'", "'.$snds.'", 
	"'.$av.'","'.$k.'", "'.$pvi.'", "'.$opdate.'", "'.$pnp.'", "'.$sh.'");';

$result = mysql_query($str_sql, $link);

if(!$result) {
	echo "Возникла ошибка при добавлении данных"; 
}
else echo '<script language="javascript">window.location.href="lease_agreement_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными


?>