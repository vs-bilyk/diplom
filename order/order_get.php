<link rel="stylesheet" type="text/css" href="../css/main.css">
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>

<?php

include "../connect.php";

$sql_order = "SELECT 
order.NZN, 
order.DDATE, 
order.NAME , 
order.PRICE, 
order.KINN, 
suppliers.NAME AS supp_name, 
clients.NAME AS cl_name 
FROM leasing.order, leasing.suppliers, leasing.clients 
WHERE order.PINN=suppliers.INN AND order.KINN=clients.INN";

if(!$result_order = mysql_query($sql_order, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}
?>

<nav class="navigation">
	<a class="navigation__item" href="../index.php">Меню</a>
	<a class="navigation__item" href="../clients/clients_get.php">Клиенты</a>
	<a class="navigation__item" href="../suppliers/suppliers_get.php">Поставщики</a>
	<a class="navigation__item" href="../banks/banks_get.php">Банки</a>
	<a class="navigation__item" href="#">Заказ-наряд</a>
	<a class="navigation__item" href="../lease_agreement/lease_agreement_get.php">Договор лизинга</a>
	<a class="navigation__item" href="../crediting/crediting_get.php">Кредитование</a>
	<a class="navigation__item" href="../purchase_sale/purchase_sale_get.php">Купля-продажа</a>
	<a class="navigation__item" href="../payments/payments_get.php">Контроль платежей</a>
</nav>

<section>
	<table class="table-show-db">
		<thead class="table-show-db__thead">
			<tr>
				<th>Номер заказ-наряда</th>
				<th>Дата</th>
				<th>Поставщик</th>
				<th>Предмет лизинга</th>
				<th>Цена имущества</th>
				<th>Лизингополучатель</th>
			</tr>
		</thead>
		<tbody class="table-show-db__tbody">
			<?php
				while ($row = mysql_fetch_array($result_order)) {  // вывод результата запроса
			?>
			<tr  id='order_<?php echo $row['NZN']; ?>' onclick="transferDataPhp(this.id);">
				<td><?php echo $row['NZN']; ?></td>
				<td><?php echo $row['DDATE']; ?></td>
				<td><?php echo $row['supp_name']; ?></td>
				<td><?php echo $row['NAME']; ?></td>
				<td><?php echo $row['PRICE']; ?></td>
				<td><?php echo $row['cl_name']; ?></td>
			</tr>
			<?php }  ?>
			<tr>
				<td id="order_new.php" class="table__td-button" colspan="6" onclick="formAddContract(this.id);">Добавить</td>
			</tr>
		</tbody>		
	</table>

	<div class="span-add-form-add"></div>
	<div class="span-add-form-edit"></div>
</section>


