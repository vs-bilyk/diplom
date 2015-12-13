<?php 

include "../connect.php";

$sql_lease_agreement = "SELECT lease_agreement.NLD, lease_agreement.NZN, clients.NAME AS cl_name
FROM leasing.lease_agreement, leasing.order, leasing.clients
WHERE lease_agreement.NZN=order.NZN 
AND order.KINN=clients.INN";

if(!$result_lease_agreement = mysql_query($sql_lease_agreement, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

 ?>
<form class="form-add form_hidden" action="purchase_sale_add.php" method="post">
<header class="form_header"><h2>Добавление</h2></header>
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="ddate">Дата договора</label></td>
				<td><input type="date" placeholder="гг-мм-дд" required id="ddate" name="DDATE" value=""></td>
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
				<td><label for="popl">Предоплата, руб.</label></td>
				<td><input type="number" required id="popl" name="POPL" value=""></td>
			</tr>
			<tr>
				<td><label for="pdate">Дата предоплаты, дни</label></td>
				<td><input type="number" required id="pdate" name="PDATE" value=""></td>
			</tr>
			<tr>
				<td><label for="opl">Сумма оплаты за вычетом предоплаты, руб.</label></td>
				<td><input type="number" required id="opl" name="OPL" value=""></td>
			</tr>
			<tr>
				<td><label for="odate">Срок гарантии объекта, лет</label></td>
				<td><input type="number" required id="odate" name="ODATE" value=""></td>
			</tr>
			<tr>
				<td><label for="sr">Дата оплаты, дни</label></td>
				<td><input type="number" required id="sr" name="SR" value=""></td>
			</tr>
			<tr>
				<td><label for="undate">Дата устранения неисправностей, дни</label></td>
				<td><input type="number" required id="undate" name="UNDATE" value=""></td>
			</tr>
			<tr>
				<td><label for="pnp">Пеня за  нарушение  сроков  поставки, руб.</label></td>
				<td><input type="number" required id="pnp" name="PNP" value=""></td>
			</tr>
			<tr>
				<td><label for="pnd">Пеня за  несвоевременное  устранение  дефектов, руб.</label></td>
				<td><input type="number" required id="pnd" name="PND" value=""></td>
			</tr>
			<tr>
				<td><label for="pno">Пеня за несвоевременную   оплату, руб.</label></td>
				<td><input type="number" required id="pno" name="PNO" value=""></td>
			</tr>
			<tr>
				<td  class="form__td-button" colspan='2'><label>Добавить<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>