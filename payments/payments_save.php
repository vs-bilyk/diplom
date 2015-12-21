<?php 

include "../connect.php";

$nld = $_POST['number'];

$sql = "SELECT * FROM leasing.payments WHERE NLD='".$nld."';";

if(!$result = mysql_query($sql, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

$row = mysql_fetch_array($result);

for ($i=1; $i <= 40; $i++) {
	if($row[$i.'p'] > 0) {
		break;
	}
}

$sql_update = "UPDATE `leasing`.`payments` 
SET `".$i."p`='-".$row[$i.'p']."' WHERE `NLD`='".$nld."';";

$result_update = mysql_query($sql_update, $link); //Отправляем запрос

if ($result_update == 0) {
	echo "Возникла ошибка при изменении данных!";
}
else echo '<script language="javascript">window.location.href="payments_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными

 ?>