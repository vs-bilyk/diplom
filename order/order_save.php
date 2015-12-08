<?php

include "../connect.php";

$nzn = $_POST['number']; 
$ddate = $_POST['DDATE'];
$pinn = $_POST['PINN'];
$name = $_POST['NAME'];
$price = $_POST['PRICE'];
$kinn = $_POST['KINN'];

$sql = "UPDATE `leasing`.`order` SET `DDATE`='".$ddate."', `PINN`='".$pinn."', `NAME`='".$name."', `PRICE`='".$price."', `KINN`='".$kinn."' WHERE `NZN`='".$nzn."';";

$result = mysql_query($sql, $link); //Отправляем запрос

if ($result == 0) {
	echo "Возникла ошибка при изменении данных!";
}
else echo '<script language="javascript">window.location.href="order_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными

?>