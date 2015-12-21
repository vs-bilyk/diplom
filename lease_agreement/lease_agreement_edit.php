
<?php 

include "../connect.php";

$nld = $_POST['key'];

$sql = "SELECT 
lease_agreement.NLD, 
lease_agreement.DDATE,  
lease_agreement.NZN, 
lease_agreement.CPOL, 
lease_agreement.POSDATE, 
lease_agreement.T,
lease_agreement.PP,
lease_agreement.NDATE,
lease_agreement.CP,
lease_agreement.KU,
lease_agreement.Q,
lease_agreement.STV,
lease_agreement.PSU,
lease_agreement.SNDS,
lease_agreement.AV,
lease_agreement.K,
lease_agreement.PVI,
lease_agreement.OTDATA,
lease_agreement.PNP,
lease_agreement.SH,
clients.NAME AS cl_name,
order.NZN AS order_nzn,
order.KINN AS order_kinn
FROM leasing.lease_agreement, leasing.clients, leasing.order 
WHERE lease_agreement.NZN=order.NZN AND order.KINN=clients.INN AND lease_agreement.NLD='".$nld."';";

if(!$result = mysql_query($sql, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

$row = mysql_fetch_array($result);

$sql_order = "SELECT order.NZN AS order_nzn, order.KINN, clients.NAME AS cl_name 
FROM leasing.order, leasing.clients 
WHERE order.KINN = clients.INN";

if(!$result_order = mysql_query($sql_order, $link)) { // выполнение запроса
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
<form class="form-edit" action="lease_agreement_save.php"  method="post">
<header class="form_header"><h2>Изменить запись</h2></header>
<input type="text" class="form__company-var" name="number" value="<?php echo $nld; ?>">
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td colspan="2"><label for="nld">Номер договора</label></td>
				<td><input type="text" disabled id="nld" name="NLD" value="<?php echo $row['NLD']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="ddate">Дата договора</label></td>
				<td><input type="date" required id="ddate" name="DDATE" value="<?php echo $row['DDATE']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="nzn">Номер заказ-наряда</label></td>
				<td>
					<select size="1" required id="nzn" name="NZN" value="">
						<option selected value="<?php echo $row['NZN']; ?>"><?php echo $row['NZN'].' '; echo $row['cl_name']; ?></option>
						<?php
							while ($row_order = mysql_fetch_array($result_order)) {  // вывод результата запроса
								if ($row['NZN'] !== $row_order['order_nzn']) {
						?>
						<option value="<?php echo $row_order['order_nzn']; ?>"><?php echo $row_order['order_nzn'].' '; echo $row_order['cl_name'];?></option>
						<?php }} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><label for="cpol">Цель получения объекта</label></td>
				<td><input type="text" required id="cpol" name="CPOL" value="<?php echo $row['CPOL']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="posdate">Дата поставки</label></td>
				<td><input type="date" required id="posdate" name="POSDATE" value="<?php echo $row['POSDATE']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="t">Срок договора, в годах</label></td>
				<td><input type="number" required id="t" name="T" value="<?php echo $row['T']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="pp">Периодичность платежей</label></td>
				<td>
					<select size="1" required id="pp" name="PP" value="">
					
						<option value="1" <?php if($row['PP'] == 1) {?> selected <?php } ?> >год</option>
						<option value="4" <?php if($row['PP'] == 4) {?> selected <?php } ?> >квартал</option>
						<option value="12" <?php if($row['PP'] == 12) {?> selected <?php } ?>>месяц</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><label for="ndate">Дата начала 1-го расчетного периода</label></td>
				<td><input type="date" required id="ndate" name="NDATE" value="<?php echo $row['NDATE']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="cp">Срок полезного использования, в годах</label></td>
				<td><input type="number" required id="cp" name="CP" value="<?php echo $row['CP']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="ku">Коэффициент ускоренной амортизации</label></td>
				<td><input type="text" id="ku" name="KU" value="<?php echo $row['KU']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="q">Коэффициент доли заемных средств</label></td>
				<td><input type="text" id="q" name="Q" value="<?php echo $row['Q']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="stv">Ставка комиссионного вознаграждения (КВ), %</label></td>
				<td><input type="number" id="stv" name="STV" value="<?php echo $row['STV']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="psu">Стоимость прочих услуг лизингодателя, без НДС</label></td>
				<td><input type="text" id="psu" name="PSU" value="<?php echo $row['PSU']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="snds">Ставка НДС, %</label></td>
				<td><input type="number" id="snds" name="SNDS" value="<?php echo $row['SNDS']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="av">Аванс, c НДС</label></td>
				<td><input type="number" id="av" name="AV" value="<?php echo $row['AV']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="k">Отсрочка начала платежей, в днях</label></td>
				<td><input type="text" id="k" name="K" value="<?php echo $row['K']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="pvi">Выкуп имущества</label></td>
				<td>
					<select size="1" required id="pvi" name="PVI" value="">
						<option value="1" <?php if($row['PVI'] == 1) {?> selected <?php } ?>>да</option>
						<option value="0" <?php if($row['PVI'] == 0) {?> selected <?php } ?>>нет</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><label for="opdate">Дата извещения при отказе от приемки, в днях</label></td>
				<td><input type="number" id="opdate" name="OTDATA" value="<?php echo $row['OTDATA']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="pnp">Пеня за неуплату, %</label></td>
				<td><input type="number" id="pnp" name="PNP" value="<?php echo $row['PNP']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><label for="sh">Штрафная неустойка, руб.</label></td>
				<td><input type="text" id="sh" name="SH" value="<?php echo $row['SH']; ?>"></td>
			</tr>
			<tr>
				<td id="lease_agreement_doc.php" class="table__td-button table__td-button_border" onclick="viewDoc(this.id);">Документ</td>
				<td id="lease_agreement_sched.php" class="table__td-button table__td-button_border" onclick="viewDoc(this.id);">График платежей</td>
				<td class="form__td-button"><label>Изменить<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>


	
</body>
</html>