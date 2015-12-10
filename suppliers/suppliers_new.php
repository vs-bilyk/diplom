<?php 

include "../connect.php";

$sql_banks = "SELECT NAME AS banks_name, INN AS BINN FROM leasing.banks";

if(!$result_banks = mysql_query($sql_banks, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

?>

<form class="form-add form_hidden" action="../company/company_add.php" method="post">
<header class="form_header"><h2>Добавление</h2></header>
<input type="text" class="form__company-var" name="company" value="suppliers">
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="name">Название организации</label></td>
				<td><input type="text" required id="name" name="NAME" value=""></td>
			</tr>
			<tr>
				<td><label for="ogrn">ОГРН</label></td>
				<td><input type="number" required id="ogrn" name="OGRN" value=""></td>
			</tr>
			<tr>
				<td><label for="addl">Юридический адрес</label></td>
				<td><input type="text" required id="addl" name="ADDL" value=""></td>
			</tr>
			<tr>
				<td><label for="addm">Почтовый адрес</label></td>
				<td><input type="text" required id="addm" name="ADDM" value=""></td>
			</tr>
			<tr>
				<td><label for="inn">ИНН</label></td>
				<td><input type="number" required id="inn" name="INN" value=""></td>
			</tr>
			<tr>
				<td><label for="kpp">КПП</label></td>
				<td><input type="number" required id="kpp" name="KPP" value=""></td>
			</tr>
			<tr>
				<td><label for="rs">Расчетный счет</label></td>
				<td><input type="number" required id="rs" name="RS" value=""></td>
			</tr>
			<tr>
				<td><label for="binn">Название банка</label></td>
				<td>
					<select size="1" required id="binn" name="BINN" value="">
						<?php
							while ($row = mysql_fetch_array($result_banks)) {  // вывод результата запроса
						?>
						<option value="<?php echo $row['BINN']; ?>"><?php echo $row['banks_name']; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="tf">Телефон</label></td>
				<td><input type="text" placeholder="(###)-###-##-##" required id="tf" name="TF" value=""></td>
			</tr>
			<tr>
				<td><label for="fx">Факс</label></td>
				<td><input type="text" placeholder="(###)-###-##-##" required id="fx" name="FX" value=""></td>
			</tr>
			<tr>
				<td><label for="fio">Руководитель организации</label></td>
				<td><input type="text" required id="fio" name="FIO" value=""></td>
			</tr>
			<tr>
				<td  class="form__td-button" colspan='2'><label>Добавить<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>