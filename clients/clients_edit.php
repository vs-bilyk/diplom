
<?php 

include "../connect.php";

$inn = $_POST['primaryKey'];

$sql="
SELECT * FROM leasing.clients WHERE INN='".$inn."'; 
";

$result = mysql_query($sql, $link); //Отправляем запрос
$row = mysql_fetch_array($result);

?>

<form class="form-edit" action="../company/company_save.php" method="post">
<h2>Изменить запись</h2>
<input type="text" class="table-add-row__company-var" name="company" value="clients">
<input type="text" class="table-add-row__company-var" name="company_inn" value="<?php echo $inn; ?>">
	<table class="table-add-row">
		<tbody class="table-add-row__tbody">
			<tr>
				<td><label for="name">Название организации</label></td>
				<td><input type="text" required id="name" name="NAME" value="<?php echo $row['NAME']; ?>"></td>
			</tr>
			<tr>
				<td><label for="ogrn">ОГРН</label></td>
				<td><input type="text" required id="ogrn" name="OGRN" value="<?php echo $row['OGRN']; ?>"></td>
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
				<td><input type="text" disabled id="inn" name="INN" value="<?php echo $row['INN']; ?>"></td>
			</tr>
			<tr>
				<td><label for="kpp">КПП</label></td>
				<td><input type="text" required id="kpp" name="KPP" value="<?php echo $row['KPP']; ?>"></td>
			</tr>
			<tr>
				<td><label for="rs">Расчетный счет</label></td>
				<td><input type="text" required id="rs" name="RS" value="<?php echo $row['RS']; ?>"></td>
			</tr>
			<tr>
				<td><label for="bik">БИК банка</label></td>
				<td><input type="text" required id="bik" name="BIK" value="<?php echo $row['BIK']; ?>"></td>
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
				<td colspan='2'><input type="submit" value="Изменить"></td>
			</tr>
		</tbody>
	</table>
	<button onclick="formAddClassHidden(this); ">Закрыть</button>
</form>


