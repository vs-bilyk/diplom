<?php 

include "../connect.php";

$key = $_GET['message'];

include "crediting_get_data_applic.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<script type="text/javascript" src="../js/main.js"></script>
	<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
</head>
<body>
	
<section class="print-doc">	

	<h1 class="header-doc">
		ЗАЯВКА НА КРЕДИТ ДЛЯ ЦЕЛЕЙ ЛИЗИНГА
	</h1><br><br>
	<div class="date-doc">
		<script type="text/javascript"> // преобразовываем дату
			formatDate( <?php echo $year ?>, <?php echo $month ?>, <?php echo $day ?>, 'date-doc');
		</script>
	</div>
	<p class="paragraph-doc">
		<?php echo $row_leasing_company['NAME'];?>, в лице Генерального директора <?php echo $row_leasing_company['FIO'];?>, действующего на основании устава, просит Вас  <?php echo $row_banks['NAME'] ?>, в лице Генерального директора <?php echo $row_banks['FIO'] ?>, действующего на основании устава,
		предоставить кредит для финансирования лизингового контракта №<?php echo $row_crediting['NLD'];?> в сумме <?php echo $row_crediting['SUMMA'];?> руб.<br>
		Объект лизинга - <?php echo $row_lease_agreement['NAME'];?>, цель получения объекта лизинга - <?php echo $row_lease_agreement['CPOL'];?>. <br>
		Дата погашения кредита <span class="date">
		<script type="text/javascript"> // преобразовываем дату
			formatDate( <?php echo $year_p ?>, <?php echo $month_p ?>, <?php echo $day_p ?>);
		</script></span>, процентная ставка <?php echo $row_crediting['PS'];?>% годовых, за фактически используемые ресурсы с ежемесячной выплатой процентов.<br><br><br>

		РЕКВИЗИТЫ:<br><br>
		Юридический адрес: <?php echo $row_leasing_company['ADDL'];?><br>
		Почтовый адрес: <?php echo $row_leasing_company['ADDM'];?><br>
		Телефон: <?php echo $row_leasing_company['TF'];?><br>
		Факс: <?php echo $row_leasing_company['FX'];?><br>
		ИНН: <?php echo $row_leasing_company['INN'];?><br>
		КПП: <?php echo $row_leasing_company['KPP'];?><br>
		Расчетный счет: <?php echo $row_leasing_company['RS'];?><br>
		Банк: <?php echo $row_leasing_bank['NAME'];?><br>
		Корреспондентский счет: <?php echo $row_leasing_bank['KS'];?><br>
		БИК: <?php echo $row_leasing_bank['BIK'];?><br><br>

		Подпись: ______________________________

	</p>
</section>

<nav class="nav-doc">
	<span class="button_print-doc" onclick="printDoc();">Печать</span>
	<span><a class="button_link-doc" href="crediting_get.php">Назад</a></span>
</nav>
</body>
</html>