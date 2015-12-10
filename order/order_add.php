<?php 

include '../connect.php';

$ddate = $_POST['DDATE'];
$pinn = $_POST['PINN'];
$name = $_POST['NAME'];
$price = $_POST['PRICE'];
$kinn = $_POST['KINN'];

$str_sql = 'INSERT INTO `leasing`.`order` (`DDATE`, `PINN`, `NAME`, `PRICE`, `KINN`) VALUES ("'.$ddate.'", "'.$pinn.'", "'.$name.'", "'.$price.'", "'.$kinn.'");';

$result = mysql_query($str_sql, $link);

if(!$result) {
	echo "Возникла ошибка при добавлении данных"; 
}
else echo '<script language="javascript">window.location.href="order_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными


?>