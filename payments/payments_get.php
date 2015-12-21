<link rel="stylesheet" type="text/css" href="../css/main.css">
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>

<?php

include "../connect.php";

$sql_lease_agreement = "SELECT 
lease_agreement.NLD, 
lease_agreement.DDATE,  
lease_agreement.NZN, 
lease_agreement.T,
lease_agreement.PP,
suppliers.NAME AS supp_name, 
clients.NAME AS cl_name,
order.NZN AS order_nzn,
order.PINN AS order_pinn,
order.KINN AS order_kinn
FROM leasing.lease_agreement, leasing.suppliers, leasing.clients, leasing.order, leasing.payments 
WHERE lease_agreement.NZN=order.NZN 
AND order.PINN=suppliers.INN 
AND order.KINN=clients.INN
AND payments.NLD=lease_agreement.NLD";

if(!$result_lease_agreement = mysql_query($sql_lease_agreement, $link)) { // выполнение запроса
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
	<a class="navigation__item" href="../purchase_sale/purchase_sale_get.php">Купля-продажа</a>
	<a class="navigation__item" href="#">Контроль платежей</a>
</nav>

<section>
	<table class="table-show-db">
		<thead class="table-show-db__thead">
			<tr>
				<th>Номер договора</th>
				<th>Дата договора</th>
				<th>Лизингополучатель</th>
				<th>Поставщик</th>
				<th>Срок договора, в годах</th>
				<th>Периодичность платежей</th>
			</tr>
		</thead>
		<tbody class="table-show-db__tbody">
			<?php
				while ($row = mysql_fetch_array($result_lease_agreement)) {  // вывод результата запроса
			?>
			<tr  id='payments_<?php echo $row['NLD']; ?>' onclick="transferDataPhp(this.id);">
				<td><?php echo $row['NLD']; ?></td>
				<td><?php echo $row['DDATE']; ?></td>
				<td><?php echo $row['cl_name']; ?></td>
				<td><?php echo $row['supp_name']; ?></td>
				<td><?php echo $row['T']; ?></td>
				<td>
					<?php if($row['PP'] == 1) echo'год'; 
						elseif ($row['PP'] == 4) echo 'квартал'; 
						elseif ($row['PP'] == 12) echo 'месяц';
					?>
				</td>
			</tr>
			<?php }  ?>
		</tbody>		
	</table>
	<div class="span-add-form-edit"></div>
</section>


