<?php 

include "../connect.php";

$nld = $_POST['key'];

$sql = "SELECT * FROM leasing.payments WHERE NLD='".$nld."';";

if(!$result = mysql_query($sql, $link)) { // выполнение запроса
	echo "Не удалось выполнить запрос!";
	exit();
}

$row = mysql_fetch_array($result);

 ?>
<form class="form-edit" action="payments_save.php"  method="post">
<header class="form_header"><h2>Платежи</h2></header>
<input type="text" class="form__company-var" name="number" value="<?php echo $nld; ?>">
	<table class="form__table">
		<tbody class="form__tbody">
			<tr>
				<td><label for="nld">Номер договора</label></td>
				<td><input type="text" disabled id="nld" name="NLD" value="<?php echo $row['NLD']; ?>"></td>
			</tr>
			<?php for ($i=1; $i <= 40; $i++) {

				if($row[$i.'p'] > 0) { ?>
				<tr>
					<td><label for='<?php echo $i?>p'><?php echo $i?> период</label></td>
					<td><input class="form__input-no-paid" type="number" disabled id='<?php echo $i?>p' name='<?php echo $i?>p' value="<?php echo $row[$i.'p']; ?>"></td>
				</tr>
			<?php }
				else if($row[$i.'p'] < 0) { ?>
				<tr>
					<td><label for='<?php echo $i?>p'><?php echo $i?> период</label></td>
					<td><input type="number" disabled id='<?php echo $i?>p' name='<?php echo $i?>p' value="<?php echo substr($row[$i.'p'],1); ?>"></td>
				</tr>
			<?php }} ?>
			<tr>
				<td  colspan="2" class="form__td-button"><label>Оплатить один период<input type="submit"  class="form__input-submit"></label></td>
			</tr>
		</tbody>
	</table>
	<div onclick="formAddClassHidden(this);"><img class="form__corner-button" src="../img/corner.png"></div>
</form>