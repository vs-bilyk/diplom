<?php

include "../connect.php"

?>
<style>
.table-add-row__company-var {
	display:none;
}
</style>

<form action="company_add.php" method="post">
<input type="text" class="table-add-row__company-var" required name="company" value="clients">
	<table class="table-add-row">
		<tbody class="table-add-row__tbody">
			<tr>
				<td><label for="name">Название организации</label></td>
				<td><input type="text" required id="name" name="NAME" value=""></td>
			</tr>
			<tr>
				<td><label for="ogrn">ОГРН</label></td>
				<td><input type="text" required id="ogrn" name="OGRN" value=""></td>
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
				<td><input type="text" required id="inn" name="INN" value=""></td>
			</tr>
			<tr>
				<td><label for="kpp">КПП</label></td>
				<td><input type="text" required id="kpp" name="KPP" value=""></td>
			</tr>
			<tr>
				<td><label for="rs">Расчетный счет</label></td>
				<td><input type="text" required id="rs" name="RS" value=""></td>
			</tr>
			<tr>
				<td><label for="bik">БИК банка</label></td>
				<td><input type="text" required id="bik" name="BIK" value=""></td>
			</tr>
			<tr>
				<td><label for="tf">Телефон</label></td>
				<td><input type="text" required id="tf" name="TF" value=""></td>
			</tr>
			<tr>
				<td><label for="fx">Факс</label></td>
				<td><input type="text" required id="fx" name="FX" value=""></td>
			</tr>
			<tr>
				<td><label for="fio">Руководитель организации</label></td>
				<td><input type="text" required id="fio" name="FIO" value=""></td>
			</tr>
			<tr>
				<td colspan='2'><input type="submit" value="Добавить"></td>
			</tr>
		</tbody>
	</table>
</form>