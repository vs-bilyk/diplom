
<?php 

include "../connect.php";

$inn = $_POST['key'];

$sql="SELECT suppliers.NAME,
suppliers.OGRN,
suppliers.ADDL,
suppliers.ADDM,
suppliers.INN,
suppliers.KPP,
suppliers.RS,
suppliers.BINN,
suppliers.TF,
suppliers.FX,
suppliers.FIO,
banks.INN,
banks.NAME AS banks_name
FROM leasing.suppliers, leasing.banks
WHERE suppliers.BINN=banks.INN AND suppliers.INN='".$inn."';";  //строка запроса для вывода данных

if(!$result = mysql_query($sql, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

$row = mysql_fetch_array($result);

$sql_banks = "SELECT NAME AS banks_name, INN AS BINN FROM leasing.banks";

if(!$result_banks = mysql_query($sql_banks, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

?>

<form class="form-edit" action="../company/company_save.php" method="post">
<header class="form_header"><h2>Изменить запись</h2></header>
<input type="text" class="form__company-var" name="company" value="suppliers">
<input type="text" class="form__company-var" name="company_inn" value="<?php echo $inn; ?>">
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="name">Название организации</label></td>
				<td><input type="text" required id="name" name="NAME" value="<?php echo $row['NAME']; ?>"></td>
			</tr>
			<tr>
				<td><label for="ogrn">ОГРН</label></td>
				<td><input type="number" required id="ogrn" name="OGRN" value="<?php echo $row['OGRN']; ?>"></td>
			</tr>
			<tr>
				<td><label for="addl">Юридический адрес</label></td>
				<td><input type="text" required id="addl" name="ADDL" value="<?php echo $row['ADDL']; ?>"></td>
			</tr>
			<tr>
				<td><label for="addm">Почтовый адрес</label></td>
				<td><input type="text" required id="addm" name="ADDM" value="<?php echo $row['ADDM']; ?>"></td>
			</tr>
			<tr>
				<td><label for="inn">ИНН</label></td>
				<td><input type="number" disabled id="inn" name="INN" value="<?php echo $row['INN']; ?>"></td>
			</tr>
			<tr>
				<td><label for="kpp">КПП</label></td>
				<td><input type="number" required id="kpp" name="KPP" value="<?php echo $row['KPP']; ?>"></td>
			</tr>
			<tr>
				<td><label for="rs">Расчетный счет</label></td>
				<td><input type="number" required id="rs" name="RS" value="<?php echo $row['RS']; ?>"></td>
			</tr>
			<tr>
				<td><label for="binn">Название банка</label></td>
				<td>
					<select size="1" required id="binn" name="BINN" value="">
						<option selected value="<?php echo $row['BINN']; ?>"><?php echo $row['banks_name']; ?></option>
						<?php
							while ($row_banks = mysql_fetch_array($result_banks)) {  // вывод результата запроса
								if ($row['banks_name'] !== $row_banks['banks_name']) { // проверка, чтобы второй раз не вывел пункт по умолчанию
						?>
						<option value="<?php echo $row_banks['BINN']; ?>"><?php echo $row_banks['banks_name']; ?></option>
						<?php }} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="tf">Телефон</label></td>
				<td><input type="text" required id="tf" name="TF" value="<?php echo $row['TF']; ?>"></td>
			</tr>
			<tr>
				<td><label for="fx">Факс</label></td>
				<td><input type="text" required id="fx" name="FX" value="<?php echo $row['FX']; ?>"></td>
			</tr>
			<tr>
				<td><label for="fio">Руководитель организации</label></td>
				<td><input type="text" required id="fio" name="FIO" value="<?php echo $row['FIO']; ?>"></td>
			</tr>
			<tr>
				<td class="form__td-button" colspan='2'><label>Изменить<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>


