
<?php 

include "../connect.php";

$nd = $_POST['key'];

$sql = "SELECT 
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
banks.INN AS banks_inn,
clients.NAME AS cl_name,
order.NZN AS order_nzn,
order.KINN AS order_kinn
FROM leasing.crediting, leasing.lease_agreement, leasing.banks, leasing.clients, leasing.order 
WHERE crediting.NLD =lease_agreement.NLD 
AND lease_agreement.NZN=order.NZN 
AND order.KINN=clients.INN 
AND banks.INN=crediting.BINN AND crediting.ND='".$nd."';";

if(!$result = mysql_query($sql, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

$row = mysql_fetch_array($result);

$sql_banks = "SELECT banks.INN AS banks_inn, banks.NAME AS banks_name 
FROM leasing.banks";

if(!$result_banks = mysql_query($sql_banks, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

$sql_lease_agreement = "SELECT lease_agreement.NLD AS lease_nld, lease_agreement.NZN, clients.NAME AS cl_name
FROM leasing.lease_agreement, leasing.order, leasing.clients
WHERE lease_agreement.NZN=order.NZN 
AND order.KINN=clients.INN";

if(!$result_lease_agreement = mysql_query($sql_lease_agreement, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>		
<form class="form-edit" action="crediting_save.php"  method="post">
<header class="form_header"><h2>Изменить запись</h2></header>
<input type="text" class="form__company-var" name="number" value="<?php echo $nd; ?>">
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="nd">Номер договора</label></td>
				<td><input type="text" disabled id="nd" name="ND" value="<?php echo $row['ND']; ?>"></td>
			</tr>
			<tr>
				<td><label for="ddate">Дата договора</label></td>
				<td><input type="date" required id="ddate" name="DDATE" value="<?php echo $row['DDATE']; ?>"></td>
			</tr>
			<tr>
				<td><label for="binn">Банк</label></td>
				<td>
					<select size="1" required id="binn" name="BINN" value="">
						<option selected value="<?php echo $row['BINN']; ?>"><?php echo $row['banks_name']; ?></option>
						<?php
							while ($row_banks = mysql_fetch_array($result_banks)) {  // вывод результата запроса
								if ($row['BINN'] !== $row_banks['banks_inn']) {
						?>
						<option value="<?php echo $row_banks['banks_inn']; ?>"><?php echo $row_banks['banks_name'];?></option>
						<?php }} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="summa">Сумма кредита, руб.</label></td>
				<td><input type="number" required id="summa" name="SUMMA" value="<?php echo $row['SUMMA']; ?>"></td>
			</tr>
			<tr>
				<td><label for="pdate">Дата погашения</label></td>
				<td><input type="date" required id="pdate" name="PDATE" value="<?php echo $row['PDATE']; ?>"></td>
			</tr>
			<tr>
				<td><label for="ps">Процентная ставка, %</label></td>
				<td><input type="number" required id="ps" name="PS" value="<?php echo $row['PS']; ?>"></td>
			</tr>
			<tr>
				<td><label for="zdate">Дата заявки</label></td>
				<td><input type="date" required id="zdate" name="ZDATE" value="<?php echo $row['ZDATE']; ?>"></td>
			</tr>
			<tr>
				<td><label for="nld">Номер лизингового договора</label></td>
				<td>
					<select size="1" required id="nld" name="NLD" value="">
						<option selected value="<?php echo $row['NLD']; ?>"><?php echo $row['NLD']." ".$row['cl_name']; ?></option>
						<?php
							while ($row_lease_agreement = mysql_fetch_array($result_lease_agreement)) {  // вывод результата запроса
								if ($row['NLD'] !== $row_lease_agreement['lease_nld']) {
						?>
						<option value="<?php echo $row_lease_agreement['lease_nld']; ?>"><?php echo $row_lease_agreement['lease_nld'].' '.$row_lease_agreement['cl_name'];?></option>
						<?php }} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td id="lease_agreement_doc.php" class="table__td-button table__td-button_border" onclick="viewDoc(this.id);">Документ</td>
				<td class="form__td-button"><label>Изменить<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>


	
</body>
</html>