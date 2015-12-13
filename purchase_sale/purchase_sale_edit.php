
<?php 

include "../connect.php";

$ndkp = $_POST['key'];

$sql = "SELECT 
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
AND order.KINN=clients.INN AND purchase_sale.NDKP='".$ndkp."';";

if(!$result = mysql_query($sql, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

$row = mysql_fetch_array($result);

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
<form class="form-edit" action="purchase_sale_save.php"  method="post">
<header class="form_header"><h2>Изменить запись</h2></header>
<input type="text" class="form__company-var" name="number" value="<?php echo $ndkp; ?>">
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="ndkp">Номер договора</label></td>
				<td><input type="text" disabled id="ndkp" name="NDKP" value="<?php echo $row['NDKP']; ?>"></td>
			</tr>
			<tr>
				<td><label for="ddate">Дата договора</label></td>
				<td><input type="date" required id="ddate" name="DDATE" value="<?php echo $row['DDATE']; ?>"></td>
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
				<td><label for="popl">Предоплата, руб.</label></td>
				<td><input type="number" required id="popl" name="POPL" value="<?php echo $row['POPL']; ?>"></td>
			</tr>
			<tr>
				<td><label for="pdate">Дата предоплаты, дни</label></td>
				<td><input type="number" required id="pdate" name="PDATE" value="<?php echo $row['PDATE']; ?>"></td>
			</tr>
			<tr>
				<td><label for="opl">Сумма оплаты за вычетом предоплаты, руб.</label></td>
				<td><input type="number" required id="opl" name="OPL" value="<?php echo $row['OPL']; ?>"></td>
			</tr>
			<tr>
				<td><label for="odate">Срок гарантии объекта, лет</label></td>
				<td><input type="number" required id="odate" name="ODATE" value="<?php echo $row['ODATE']; ?>"></td>
			</tr>
			<tr>
				<td><label for="sr">Дата оплаты, дни</label></td>
				<td><input type="number" required id="sr" name="SR" value="<?php echo $row['SR']; ?>"></td>
			</tr>
			<tr>
				<td><label for="undate">Дата устранения неисправностей, дни</label></td>
				<td><input type="number" required id="undate" name="UNDATE" value="<?php echo $row['UNDATE']; ?>"></td>
			</tr>
			<tr>
				<td><label for="pnp">Пеня за  нарушение  сроков  поставки, руб.</label></td>
				<td><input type="number" required id="pnp" name="PNP" value="<?php echo $row['PNP']; ?>"></td>
			</tr>
			<tr>
				<td><label for="pnd">Пеня за  несвоевременное  устранение  дефектов, руб.</label></td>
				<td><input type="number" required id="pnd" name="PND" value="<?php echo $row['PND']; ?>"></td>
			</tr>
			<tr>
				<td><label for="pno">Пеня за несвоевременную   оплату, руб.</label></td>
				<td><input type="number" required id="pno" name="PNO" value="<?php echo $row['PNO']; ?>"></td>
			</tr>
			<tr>
				<td id="purchase_sale_doc.php" class="table__td-button table__td-button_border" onclick="viewDoc(this.id);">Документ</td>
				<td class="form__td-button"><label>Изменить<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>


	
</body>
</html>