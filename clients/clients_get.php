<?php

include "../connect.php";

$str_sql_query = "SELECT * FROM leasing.clients";  //строка запроса для вывода данных

if(!$result = mysql_query($str_sql_query, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}
?>

<table class="table-show-db">
	<thead class="table-show-db__thead">
		<tr>
			<td>Название организации</td>
			<td>Основной государственный регистрационный номер</td>
			<td>Юридический адрес</td>
			<td>Почтовый адрес</td>
			<td>Индивидуальный номер налогоплательщика</td>
			<td>Код причины постановки на учет</td>
			<td>Расчетный счет</td>
			<td>БИК банка</td>
			<td>Телефон</td>
			<td>Факс</td>
			<td>Руководитель организации</td>
		</tr>
	</thead>
	<tbody class="table-show-db__tbody">
		<?php
			while ($row = mysql_fetch_array($result)) {  // вывод результата запроса
		?>
		<tr>
			<td><?php echo $row['NAME']; ?></td>
			<td><?php echo $row['OGRN']; ?></td>
			<td><?php echo $row['ADDL']; ?></td>
			<td><?php echo $row['ADDM']; ?></td>
			<td><?php echo $row['INN']; ?></td>
			<td><?php echo $row['KPP']; ?></td>
			<td><?php echo $row['RS']; ?></td>
			<td><?php echo $row['BIK']; ?></td>
			<td><?php echo $row['TF']; ?></td>
			<td><?php echo $row['FX']; ?></td>
			<td><?php echo $row['FIO']; ?></td>
		</tr>
		<?php }  ?>
	</tbody>		
</table>
