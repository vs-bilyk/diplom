<link rel="stylesheet" type="text/css" href="../css/main.css">
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>

<?php

include "../connect.php";

$sql_purchase_sale = "SELECT 
purchase_sale.NDKP,
purchase_sale.DDATE,
purchase_sale.NLD,
purchase_sale.POPL,
purchase_sale.PDATE,
purchase_sale.OPL,
purchase_sale.ODATE,
purchase_sale.SR,
purchase_sale.UNDATE,
purchase_sale.PNP,
purchase_sale.PND,
purchase_sale.PNO,
lease_agreement.NZN AS NZN,
clients.NAME AS cl_name,
order.NZN AS order_nzn,
order.KINN AS order_kinn
FROM leasing.purchase_sale, leasing.lease_agreement, leasing.clients, leasing.order 
WHERE purchase_sale.NLD =lease_agreement.NLD 
AND lease_agreement.NZN=order.NZN 
AND order.KINN=clients.INN";

if(!$result_purchase_sale = mysql_query($sql_purchase_sale, $link)) { // выполнение запроса
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
	<a class="navigation__item" href="../crediting/crediting_get.php">Кредитование</a>
	<a class="navigation__item" href="#">Купля-продажа</a>
	<a class="navigation__item" href="../payments/payments_get.php">Контроль платежей</a>
</nav>

<section>
	<table class="table-show-db">
		<thead class="table-show-db__thead">
			<tr>
				<th>Номер договора</th>
				<th>Дата договора</th>
				<th>Номер лизингового договора</th>
				<th>Лизинго- получатель</th>
				<th>Предоплата, руб.</th>
				<th>Дата предоплаты, дни</th>
				<th>Сумма оплаты-предоплата, руб.</th>
				<th>Срок гарантии объекта, лет</th>
				<th>Дата оплаты, дни</th>
				<th>Дата устранения неисправностей, дни</th>
				<th>Пеня за  нарушение  сроков поставки, руб.</th>
				<th>Пеня за  неустранение  дефектов, руб.</th>
				<th>Пеня за неуплату, руб.</th>
			</tr>
		</thead>
		<tbody class="table-show-db__tbody">
			<?php
				while ($row = mysql_fetch_array($result_purchase_sale)) {  // вывод результата запроса
			?>
			<tr  id='purchase_<?php echo $row['NDKP']; ?>' onclick="transferDataPhp(this.id);">
				<td><?php echo $row['NDKP']; ?></td>
				<td><?php echo $row['DDATE']; ?></td>
				<td><?php echo $row['NLD']; ?></td>				
				<td><?php echo $row['cl_name']; ?></td>
				<td><?php echo $row['POPL']; ?></td>
				<td><?php echo $row['PDATE']; ?></td>
				<td><?php echo $row['OPL']; ?></td>
				<td><?php echo $row['ODATE']; ?></td>
				<td><?php echo $row['SR']; ?></td>
				<td><?php echo $row['UNDATE']; ?></td>
				<td><?php echo $row['PNP']; ?></td>
				<td><?php echo $row['PND']; ?></td>
				<td><?php echo $row['PNO']; ?></td>
			</tr>
			<?php }  ?>
			<tr>
				<td id="purchase_sale_new.php" class="table__td-button" colspan="24" onclick="formAddContract(this.id);">Добавить</td>
			</tr>
		</tbody>		
	</table>

	<div class="span-add-form-add"></div>
	<div class="span-add-form-edit"></div>
</section>


