<link rel="stylesheet" type="text/css" href="../css/main.css">
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>

<?php

include "../connect.php";

$str_sql_query = "SELECT * FROM leasing.banks";  //строка запроса для вывода данных

if(!$result = mysql_query($str_sql_query, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}
?>

<nav class="navigation">
	<a class="navigation__item" href="../index.php">Меню</a>
	<a class="navigation__item" href="../clients/clients_get.php">Клиенты</a>
	<a class="navigation__item" href="../suppliers/suppliers_get.php">Поставщики</a>
	<a class="navigation__item" href="#">Банки</a>
	<a class="navigation__item" href="../index.php">Договора</a>
</nav>

<section>
	<table class="table-show-db">
		<thead class="table-show-db__thead">
			<tr>
				<th>Название банка</th>
				<th>ОГРН</th>
				<th>Юридический адрес</th>
				<th>Почтовый адрес</th>
				<th>ИНН</th>
				<th>КПП</th>
				<th>БИК банка</th>
				<th>Расчетный счет</th>
				<th>Корреспондентский счет</th>
				<th>Ссудный счет</th>
				<th>Телефон</th>
				<th>Факс</th>
				<th>ФИО руководителя</th>
			</tr>
		</thead>
		<tbody class="table-show-db__tbody">
			<?php
				while ($row = mysql_fetch_array($result)) {  // вывод результата запроса
			?>
			<tr  id='banks_<?php echo $row['INN']; ?>' onclick="transferDataPhp(this.id);">
				<td><?php echo $row['NAME']; ?></td>
				<td><?php echo $row['OGRN']; ?></td>
				<td><?php echo $row['ADDL']; ?></td>
				<td><?php echo $row['ADDM']; ?></td>
				<td><?php echo $row['INN']; ?></td>
				<td><?php echo $row['KPP']; ?></td>
				<td><?php echo $row['BIK']; ?></td>
				<td><?php echo $row['RS']; ?></td>
				<td><?php echo $row['KS']; ?></td>
				<td><?php echo $row['SS']; ?></td>
				<td><?php echo $row['TF']; ?></td>
				<td><?php echo $row['FX']; ?></td>
				<td><?php echo $row['FIO']; ?></td>
			</tr>
			<?php }  ?>
			<tr>
				<td class="table__td-button" colspan="13" onclick="formAddClassVisibility();">Добавить</td>
			</tr>
		</tbody>		
	</table>

	<div class="span-add-form-edit"></div>
</section>
<?php  
include "banks_new.php";
?>

