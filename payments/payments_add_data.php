<?php 

include "../connect.php";

$key = $_GET['message'];
echo $key;
list ($nld, $p1, $p2, $pn) = split ('[-]', $key);

$str_period = '`NLD`, `1p`,`2p`';
$str_value = '"'.$nld.'", "'.$p1.'", "'.$p2.'"';

for ($i = 3; $i <= $pn; $i++) {
	$str_period = $str_period.', `'.$i.'p`';
	$str_value = $str_value.', "'.$p2.'"';
}

$str_sql = 'INSERT INTO `leasing`.`payments` ('.$str_period.') VALUES ('.$str_value.');'; 
echo $str_sql; 

$result = mysql_query($str_sql, $link);

if(!$result) {
	echo "Возникла ошибка при добавлении данных"; 
}
else echo '<script language="javascript">window.location.href="../lease_agreement/lease_agreement_get.php?thnx=0";</script>'; // перенаправление на таблицу с данными
 ?>
