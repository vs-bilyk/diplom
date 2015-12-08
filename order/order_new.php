<?php 

include "../connect.php";

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

<form class="form-add form_hidden" action="order_add.php" method="post">
<header class="form_header"><h2>Добавление</h2></header>
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="ddate">Дата</label></td>
				<td><input type="text" placeholder="гг-мм-дд" required id="ddate" name="DDATE" value=""></td>
			</tr>
			<tr>
				<td><label for="pinn">Поставщик</label></td>
				<td>
					<select size="1" required id="pinn" name="PINN" value="">
						<?php
							while ($row = mysql_fetch_array($result_suppliers)) {  // вывод результата запроса
						?>
						<option value="<?php echo $row['PINN']; ?>"><?php echo $row['supp_name']; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="name">Предмет лизинга</label></td>
				<td><input type="text" required id="name" name="NAME" value=""></td>
			</tr>
			<tr>
				<td><label for="price">Цена имущества</label></td>
				<td><input type="text" required id="price" name="PRICE" value=""></td>
			</tr>
			<tr>
				<td><label for="kinn">Лизингополучатель</label></td>
				<td>
					<select size="1" required id="kinn" name="KINN" value="">
						<?php
							while ($row = mysql_fetch_array($result_clients)) {  // вывод результата запроса
						?>
						<option value="<?php echo $row['KINN']; ?>"><?php echo $row['cl_name']; ?></option>
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