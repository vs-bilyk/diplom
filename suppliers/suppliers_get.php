<link rel="stylesheet" type="text/css" href="../css/main.css">
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>

<?php

include "../connect.php";

$str_sql_query = "SELECT suppliers.NAME,
suppliers.OGRN,
suppliers.ADDL,
suppliers.ADDM,
suppliers.INN,
suppliers.KPP,
suppliers.RS,
suppliers.BINN,
suppliers.TF,
suppliers.FX,
suppliers.FIO,
banks.INN AS BINN,
banks.NAME AS banks_name
FROM leasing.suppliers, leasing.banks
WHERE suppliers.BINN=banks.INN";  //строка запроса для вывода данных

if(!$result = mysql_query($str_sql_query, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}
?>

<nav class="navigation">
	<a class="navigation__item" href="../index.php">Меню</a>
	<a class="navigation__item" href="../clients/clients_get.php">Клиенты</a>
	<a class="navigation__item" href="#">Поставщики</a>
	<a class="navigation__item" href="../banks/banks_get.php">Банки</a>
	<a class="navigation__item" href="../index.php">Договора</a>
</nav>

<section>
	<table class="table-show-db">
		<thead class="table-show-db__thead">
			<tr>
				<th>Название организации</th>
				<th>ОГРН</th>
				<th>Юридический адрес</th>
				<th>Почтовый адрес</th>
				<th>ИНН</th>
				<th>КПП</th>
				<th>Расчетный счет</th>
				<th>Название банка</th>
				<th>Телефон</th>
				<th>Факс</th>
				<th>ФИО руководителя</th>
			</tr>
		</thead>
		<tbody class="table-show-db__tbody">
			<?php
				while ($row = mysql_fetch_array($result)) {  // вывод результата запроса
			?>
			<tr  id='suppliers_<?php echo $row['INN']; ?>' onclick="transferDataPhp(this.id);">
				<td><?php echo $row['NAME']; ?></td>
				<td><?php echo $row['OGRN']; ?></td>
				<td><?php echo $row['ADDL']; ?></td>
				<td><?php echo $row['ADDM']; ?></td>
				<td><?php echo $row['INN']; ?></td>
				<td><?php echo $row['KPP']; ?></td>
				<td><?php echo $row['RS']; ?></td>
				<td><?php echo $row['banks_name']; ?></td>
				<td><?php echo $row['TF']; ?></td>
				<td><?php echo $row['FX']; ?></td>
				<td><?php echo $row['FIO']; ?></td>
			</tr>
			<?php }  ?>
			<tr>
				<td class="table__td-button" colspan="11" onclick="formAddClassVisibility();">Добавить</td>
			</tr>
		</tbody>		
	</table>

	<div class="span-add-form-edit"></div>
</section>

<?php  
include "suppliers_new.php";
?>

