<link rel="stylesheet" type="text/css" href="../css/main.css">
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>

<?php

include "../connect.php";

$sql_lease_agreement = "SELECT 
lease_agreement.NLD, 
lease_agreement.DDATE, 
lease_agreement.KINN, 
lease_agreement.NZN, 
lease_agreement.PURPOSE, 
lease_agreement.POSDATE, 
lease_agreement.PINN,
lease_agreement.T,
lease_agreement.PP,
lease_agreement.NDATE,
lease_agreement.CP,
lease_agreement.KU,
lease_agreement.Q,
lease_agreement.STK,
lease_agreement.STV,
lease_agreement.PRV,
lease_agreement.PSU,
lease_agreement.SNDS,
lease_agreement.LV0,
lease_agreement.K,
lease_agreement.PVI,
lease_agreement.OTDATA,
lease_agreement.PNP,
lease_agreement.SH,
suppliers.NAME AS supp_name, 
clients.NAME AS cl_name,
order.NZN
FROM leasing.lease_agreement, 
leasing.suppliers, 
leasing.clients,
leasing.order 
WHERE lease_agreement.PINN=suppliers.INN 
AND lease_agreement.KINN=clients.INN
AND lease_agreement.NZN=order.NZN";

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
	<a class="navigation__item" href="#">Договор лизинга</a>
</nav>

<section>
	<table class="table-show-db">
		<thead class="table-show-db__thead">
			<tr>
				<th>Номер договора</th>
				<th>Дата</th>
				<th>Лизинго- получатель</th>
				<th>Номер заказ- наряда</th>
				<th>Цель получения объекта</th>
				<th>Дата поставки</th>
				<th>Поставщик</th>
				<th>Срок договора</th>
				<th>Периодичность платежей</th>
				<th>Начало 1-го расчетного периода</th>
				<th>Срок полезного использования</th>
				<th>Коэффициент ускоренной амортизации</th>
				<th>Коэффициент доли заемных средств</th>
				<th>Ставка за кредитные ресурсы</th>
				<th>Ставка комиссионного вознаграждения (КВ)</th>
				<th>Признак метода расчета КВ</th>
				<th>Стоимость прочих услуг лизингодателя, без НДС</th>
				<th>Ставка НДС</th>
				<th>Аванс, c НДС</th>
				<th>Отсрочка платежей</th>
				<th>Признак выкупа имущества</th>
				<th>Дата извещения при отказе от приемки</th>
				<th>Пеня за неуплату</th>
				<th>Штрафная неустойка</th>
			</tr>
		</thead>
		<tbody class="table-show-db__tbody">
			<?php
				while ($row = mysql_fetch_array($result_lease_agreement)) {  // вывод результата запроса
			?>
			<tr  id='lease_agreement_<?php echo $row['NLD']; ?>' onclick="transferDataPhp(this.id);">
				<td><?php echo $row['NLD']; ?></td>
				<td><?php echo $row['DDATE']; ?></td>
				<td><?php echo $row['cl_name']; ?></td>
				<td><?php echo $row['NZN']; ?></td>
				<td><?php echo $row['PURPOSE']; ?></td>
				<td><?php echo $row['POSDATE']; ?></td>
				<td><?php echo $row['supp_name']; ?></td>
				<td><?php echo $row['T']; ?></td>
				<td><?php echo $row['PP']; ?></td>
				<td><?php echo $row['NDATE']; ?></td>
				<td><?php echo $row['CP']; ?></td>
				<td><?php echo $row['KU']; ?></td>
				<td><?php echo $row['Q']; ?></td>
				<td><?php echo $row['STK']; ?></td>
				<td><?php echo $row['STV']; ?></td>
				<td><?php echo $row['PRV']; ?></td>
				<td><?php echo $row['PSU']; ?></td>
				<td><?php echo $row['SNDS']; ?></td>
				<td><?php echo $row['LV0']; ?></td>
				<td><?php echo $row['K']; ?></td>
				<td><?php echo $row['PVI']; ?></td>
				<td><?php echo $row['OTDATA']; ?></td>
				<td><?php echo $row['PNP']; ?></td>
				<td><?php echo $row['SH']; ?></td>
			</tr>
			<?php }  ?>
			<tr>
				<td id="lease_agreement_new.php" class="table__td-button" colspan="24" onclick="formAddContract(this.id);">Добавить</td>
			</tr>
		</tbody>		
	</table>

	<div class="span-add-form-add"></div>
	<div class="span-add-form-edit"></div>
</section>


