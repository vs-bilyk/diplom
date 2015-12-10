<form class="form-add form_hidden" action="banks_add.php" method="post">
<header class="form_header"><h2>Добавление</h2></header>
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="name">Название банка</label></td>
				<td><input type="text" required id="name" name="NAME" value=""></td>
			</tr>
			<tr>
				<td><label for="bik">БИК банка</label></td>
				<td><input type="text" required id="bik" name="BIK" value=""></td>
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
				<td><label for="ks">Корреспондентский счет</label></td>
				<td><input type="text" required id="ks" name="KS" value=""></td>
			</tr>
			<tr>
				<td><label for="ss">Ссудный счет</label></td>
				<td><input type="text" required id="ss" name="SS" value=""></td>
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
				<td  class="form__td-button" colspan='2'><label>Добавить<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>