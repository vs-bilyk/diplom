
<?php 

include "../connect.php";

$nzn = $_POST['key'];

$sql = "SELECT order.NZN, order.DDATE, order.NAME , order.PRICE, order.KINN, suppliers.NAME AS supp_name, clients.NAME AS cl_name FROM leasing.order, leasing.suppliers, leasing.clients WHERE order.PINN=suppliers.INN AND order.KINN=clients.INN AND order.NZN='".$nzn."';";

if(!$result = mysql_query($sql, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

$row = mysql_fetch_array($result);

$sql_suppliers = "SELECT NAME AS supp_name, INN AS PINN FROM leasing.suppliers";
$sql_clients = "SELECT NAME AS cl_name, INN AS KINN FROM leasing.clients";

if(!$result_suppliers = mysql_query($sql_suppliers, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

if(!$result_clients = mysql_query($sql_clients, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

?>

<form class="form-edit" action="order_save.php" method="post">
<header class="form_header"><h2>Изменить запись</h2></header>
<input type="text" class="form__company-var" name="number" value="<?php echo $nzn; ?>">
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="nzn">Номер заказ-наряда</label></td>
				<td><input type="text" disabled id="nzn" name="NZN" value="<?php echo $row['NZN']; ?>"></td>
			</tr>
			<tr>
				<td><label for="data">Дата</label></td>
				<td><input type="text" required id="data" name="DDATE" value="<?php echo $row['DDATE']; ?>"></td>
			</tr>
			<tr>
				<td><label for="pinn">Поставщик</label></td>
				<td>
					<select size="1" required id="pinn" name="PINN" value="">
						<option selected value="<?php echo $row['PINN']; ?>"><?php echo $row['supp_name']; ?></option>
						<?php
							while ($row_supp = mysql_fetch_array($result_suppliers)) {  // вывод результата запроса
								if ($row['supp_name'] !== $row_supp['supp_name']) { // проверка, чтобы второй раз не вывел пункт по умолчанию
						?>
						<option value="<?php echo $row_supp['PINN']; ?>"><?php echo $row_supp['supp_name']; ?></option>
						<?php }} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="name">Предмет лизинга</label></td>
				<td><input type="text" required id="name" name="NAME" value="<?php echo $row['NAME']; ?>"></td>
			</tr>
			<tr>
				<td><label for="price">Цена имущества</label></td>
				<td><input type="text" required id="price" name="PRICE" value="<?php echo $row['PRICE']; ?>"></td>
			</tr>
			<tr>
				<td><label for="kinn">Лизингополучатель</label></td>
				<td>
					<select size="1" required id="kinn" name="KINN" value="">
						<option selected value="<?php echo $row['KINN']; ?>"><?php echo $row['cl_name']; ?></option>
						<?php
							while ($row_cl = mysql_fetch_array($result_clients)) {  // вывод результата запроса
								if ($row['cl_name'] !== $row_cl['cl_name']) { // проверка, чтобы второй раз не вывел пункт по умолчанию
						?>
						<option value="<?php echo $row_cl['KINN']; ?>"><?php echo $row_cl['cl_name']; ?></option>
						<?php }} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="table__td-button table__td-button_border" onclick="printDoc();"><div>Печать</div></td>
				<td class="form__td-button"><label>Изменить<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>


