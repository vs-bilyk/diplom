<?php 

include "../connect.php";

$sql_banks = "SELECT banks.INN AS banks_inn, banks.NAME AS banks_name 
FROM leasing.banks";

if(!$result_banks = mysql_query($sql_banks, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

$sql_lease_agreement = "SELECT lease_agreement.NLD, lease_agreement.NZN, clients.NAME AS cl_name
FROM leasing.lease_agreement, leasing.order, leasing.clients
WHERE lease_agreement.NZN=order.NZN 
AND order.KINN=clients.INN";

if(!$result_lease_agreement = mysql_query($sql_lease_agreement, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

 ?>

<form class="form-add form_hidden" action="crediting_add.php" method="post">
<header class="form_header"><h2>Добавление</h2></header>
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="ddate">Дата договора</label></td>
				<td><input type="date" placeholder="гг-мм-дд" required id="ddate" name="DDATE" value=""></td>
			</tr>
			<tr>
				<td><label for="binn">Банк</label></td>
				<td>
					<select size="1" required id="binn" name="BINN" value="">
						<?php
							while ($row = mysql_fetch_array($result_banks)) {  // вывод результата запроса
						?>
						<option value="<?php echo $row['banks_inn']; ?>"><?php echo $row['banks_name'];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="summa">Сумма кредита, руб.</label></td>
				<td><input type="number" required id="summa" name="SUMMA" value=""></td>
			</tr>
			<tr>
				<td><label for="pdate">Дата погашения</label></td>
				<td><input type="date" required id="pdate" name="PDATE" value=""></td>
			</tr>
			<tr>
				<td><label for="ps">Процентная ставка, %</label></td>
				<td><input type="number" required id="ps" name="PS" value=""></td>
			</tr>
			<tr>
				<td><label for="zdate">Дата заявки</label></td>
				<td><input type="date" required id="zdate" name="ZDATE" value=""></td>
			</tr>
			<tr>
				<td><label for="nld">Номер лизингового договора</label></td>
				<td>
					<select size="1" required id="nld" name="NLD" value="">
						<?php
							while ($row = mysql_fetch_array($result_lease_agreement)) {  // вывод результата запроса
						?>
						<option value="<?php echo $row['NLD']; ?>"><?php echo $row['NLD'].' '.$row['cl_name'];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td  class="form__td-button" colspan='2'><label>Добавить<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>