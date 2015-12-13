<link rel="stylesheet" type="text/css" href="../css/main.css">
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>

<?php

include "../connect.php";

$sql_crediting = "SELECT 
crediting.ND,
crediting.DDATE,
crediting.BINN,
crediting.SUMMA,
crediting.PDATE,
crediting.PS,
crediting.ZDATE,
crediting.NLD,
lease_agreement.NZN AS NZN,
banks.NAME AS banks_name,
clients.NAME AS cl_name,
order.NZN AS order_nzn,
order.KINN AS order_kinn
FROM leasing.crediting, leasing.lease_agreement, leasing.banks, leasing.clients, leasing.order 
WHERE crediting.NLD =lease_agreement.NLD 
AND lease_agreement.NZN=order.NZN 
AND order.KINN=clients.INN 
AND banks.INN=crediting.BINN";

if(!$result_crediting = mysql_query($sql_crediting, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}
?>

<nav class="navigation">
	<a class="navigation__item" href="../index.php">Меню</a>
	<a class="navigation__item" href="../clients/clients_get.php">Клиенты</a>
	<a class="navigation__item" href="../suppliers/suppliers_get.php">Поставщики</a>
	<a class="navigation__item" href="../banks/banks_get.php">Банки</a>
	<a class="navigation__item" href="../order/order_get.php">Заказ-наряд</a>
	<a class="navigation__item" href="../lease_agreement/lease_agreement_get.php">Договор лизинга</a>
	<a class="navigation__item" href="#">Кредитование</a>
	<a class="navigation__item" href="../purchase_sale/purchase_sale_get.php">Купля-продажа</a>
	<a class="navigation__item" href="../payments/payments_get.php">Контроль платежей</a>
</nav>

<section>
	<table class="table-show-db">
		<thead class="table-show-db__thead">
			<tr>
				<th>Номер договора</th>
				<th>Дата договора</th>
				<th>Банк</th>
				<th>Сумма кредита, руб.</th>
				<th>Дата погашения</th>
				<th>Процентная ставка, %</th>
				<th>Дата заявки</th>
				<th>Номер лизингового договора</th>
				<th>Лизингополучатель</th>
			</tr>
		</thead>
		<tbody class="table-show-db__tbody">
			<?php
				while ($row = mysql_fetch_array($result_crediting)) {  // вывод результата запроса
			?>
			<tr  id='crediting_<?php echo $row['ND']; ?>' onclick="transferDataPhp(this.id);">
				<td><?php echo $row['ND']; ?></td>
				<td><?php echo $row['DDATE']; ?></td>
				<td><?php echo $row['banks_name']; ?></td>
				<td><?php echo $row['SUMMA']; ?></td>
				<td><?php echo $row['PDATE']; ?></td>
				<td><?php echo $row['PS']; ?></td>
				<td><?php echo $row['ZDATE']; ?></td>
				<td><?php echo $row['NLD']; ?></td>
				<td><?php echo $row['cl_name']; ?></td>
			</tr>
			<?php }  ?>
			<tr>
				<td id="crediting_new.php" class="table__td-button" colspan="24" onclick="formAddContract(this.id);">Добавить</td>
			</tr>
		</tbody>		
	</table>

	<div class="span-add-form-add"></div>
	<div class="span-add-form-edit"></div>
</section>


