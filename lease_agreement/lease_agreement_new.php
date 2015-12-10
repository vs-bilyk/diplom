<?php 

include "../connect.php";

$sql_order = "SELECT order.NZN AS order_nzn, order.KINN, clients.NAME AS cl_name 
FROM leasing.order, leasing.clients 
WHERE order.KINN = clients.INN";

if(!$result_order = mysql_query($sql_order, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

 ?>

<form class="form-add form_hidden" action="lease_agreement_add.php" method="post">
<header class="form_header"><h2>Добавление</h2></header>
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="ddate">Дата договора</label></td>
				<td><input type="date" placeholder="гг-мм-дд" required id="ddate" name="DDATE" value=""></td>
			</tr>
			<tr>
				<td><label for="nzn">Номер заказ-наряда</label></td>
				<td>
					<select size="1" required id="nzn" name="NZN" value="">
						<?php
							while ($row = mysql_fetch_array($result_order)) {  // вывод результата запроса
						?>
						<option value="<?php echo $row['order_nzn']; ?>"><?php echo $row['order_nzn'].' '; echo $row['cl_name'];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="cpol">Цель получения объекта</label></td>
				<td><input type="text" required id="cpol" name="CPOL" value=""></td>
			</tr>
			<tr>
				<td><label for="posdare">Дата поставки</label></td>
				<td><input type="date" required id="posdare" name="POSDATE" value=""></td>
			</tr>
			<tr>
				<td><label for="t">Срок договора, в годах</label></td>
				<td><input type="number" required id="t" name="T" value=""></td>
			</tr>
			<tr>
				<td><label for="pp">Периодичность платежей</label></td>
				<td>
					<select size="1" required id="pp" name="PP" value="">
						<option value="1">год</option>
						<option value="4">квартал</option>
						<option value="12">месяц</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="ndate">Дата начала 1-го расчетного периода</label></td>
				<td><input type="date" required id="ndate" name="NDATE" value=""></td>
			</tr>
			<tr>
				<td><label for="cp">Срок полезного использования, в годах</label></td>
				<td><input type="number" required id="cp" name="CP" value=""></td>
			</tr>
			<tr>
				<td><label for="ku">Коэффициент ускоренной амортизации</label></td>
				<td><input type="text" id="ku" name="KU" value=""></td>
			</tr>
			<tr>
				<td><label for="q">Коэффициент доли заемных средств</label></td>
				<td><input type="text" id="q" name="Q" value=""></td>
			</tr>
			<tr>
				<td><label for="stk">Ставка за кредитные ресурсы, %</label></td>
				<td><input type="number" id="stk" name="STK" value=""></td>
			</tr>
			<tr>
				<td><label for="stv">Ставка комиссионного вознаграждения (КВ), %</label></td>
				<td><input type="number" id="stv" name="STV" value=""></td>
			</tr>
			<tr>
				<td><label for="prv">Расчет КВ</label></td>
				<td>
					<select size="1" required id="prv" name="PRV" value="">
						<option value="1">да</option>
						<option value="0">нет</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="psu">Стоимость прочих услуг лизингодателя, без НДС</label></td>
				<td><input type="text" id="psu" name="PSU" value=""></td>
			</tr>
			<tr>
				<td><label for="snds">Ставка НДС, %</label></td>
				<td><input type="number" id="snds" name="SNDS" value=""></td>
			</tr>
			<tr>
				<td><label for="av">Аванс, c НДС</label></td>
				<td><input type="number" id="av" name="AV" value=""></td>
			</tr>
			<tr>
				<td><label for="k">Отсрочка начала платежей, в днях</label></td>
				<td><input type="text" id="k" name="K" value=""></td>
			</tr>
			<tr>
				<td><label for="pvi">Выкуп имущества</label></td>
				<td>
					<select size="1" required id="pvi" name="PVI" value="">
						<option value="1">да</option>
						<option value="0">нет</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="opdate">Дата извещения при отказе от приемки, в днях</label></td>
				<td><input type="number" id="opdate" name="OTDATA" value=""></td>
			</tr>
			<tr>
				<td><label for="pnp">Пеня за неуплату, %</label></td>
				<td><input type="number" id="pnp" name="PNP" value=""></td>
			</tr>
			<tr>
				<td><label for="sh">Штрафная неустойка, руб.</label></td>
				<td><input type="text" id="sh" name="SH" value=""></td>
			</tr>
			<tr>
				<td  class="form__td-button" colspan='2'><label>Добавить<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>