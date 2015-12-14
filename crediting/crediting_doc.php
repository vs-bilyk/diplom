<?php 

include "../connect.php";

$key = $_GET['message'];

include "crediting_get_data_doc.php";

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
		ДОГОВОР О КРЕДИТНОМ ФИНАНСИРОВАНИИ ЛИЗИНГА № <?php echo $key; ?>
	</h1>
	<div class="date-doc">
		<script type="text/javascript"> // преобразовываем дату
			formatDate( <?php echo $year ?>, <?php echo $month ?>, <?php echo $day ?>, 'date-doc');
		</script>
	</div><br>
	<p class="paragraph-doc">
		<?php echo $row_banks['NAME'];?>, в лице Генерального директора <?php echo $row_banks['FIO'];?>, 
		действующего на основании устава, именуемый в дальнейшем Банк, с одной стороны, и 
		<?php echo $row_leasing_company['NAME'];?> в лице <?php echo $row_leasing_company['FIO'];?>, 
		действующего на основании устава, именуемый в дальнейшем Лизингодатель, с другой стороны, 
		именуемые в дальнейшем Стороны, заключили настоящий договор, в дальнейшем Договор, о нижеследующем:<br> 
		1. Банк финансирует лизинговый контракт № <?php echo $row_lease_agreement['NLD'] ?> от 
		<span class="date">
		<script type="text/javascript"> // преобразовываем дату
			formatDate( <?php echo $year_nld ?>, <?php echo $month_nld ?>, <?php echo $day_nld ?>);
		</script>
		</span> между Лизингодателем, фирмой <?php echo $row_clients['NAME'] ?> (именуемой далее Фирма) 
		и предприятием (далее - Лизингополучатель ), оплачивая обязательства Лизингодателя по п.1.2. 
		этого контракта в сумме <?php echo $row_crediting['SUMMA'] ?> рублей.<br>
		2. В обеспечение этого платежа Банк получает <?php echo $row_crediting['PS'] ?>% всех сумм в рублях, 
		поступивших от Лизингополучателя, за что Банк выплачивает Лизингодателю до 
		<span class="date">
		<script type="text/javascript"> // преобразовываем дату
			formatDate( <?php echo $year_p ?>, <?php echo $month_p ?>, <?php echo $day_p ?>);
		</script>
		</span> <?php echo $row_crediting['SUMMA'] ?> рублей.
		В случае невыполнения Лизингополучателем своих платежных обязательств по соответствующему пункту контракта, 
		имущественные права на оборудование, возникающие у Лизингодателя, переходят к Банку.
		В случае невыполнения Фирмой своих обязательств по вышеуказанному контракту, права на получение штрафов, 
		неустоек, пени и т.д., а также права на возвращенные фирмой в случае невыполнения обязательств средства 
		в СКВ переходят к Банку.<br>
		3. Настоящий договор вступает в силу только вместе со вступлением в силу Контракта 
		№ <?php echo $row_lease_agreement['NLD'] ?>.
		Срок действия Договора ограничен моментом выполнения взаимных обязательств и урегулирования расчетов.<br>
		4. Настоящий договор составлен в 2-х экземплярах, по одному для каждой из сторон.<br><br>

		ЛИЗИНГОДАТЕЛЬ:<br><br>
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

		Подпись: ______________________________<br><br><br>


		БАНК:<br><br>
		Юридический адрес: <?php echo $row_banks['ADDL'];?><br>
		Почтовый адрес: <?php echo $row_banks['ADDM'];?><br>
		Телефон: <?php echo $row_banks['TF'];?><br>
		Факс: <?php echo $row_banks['FX'];?><br>
		ИНН: <?php echo $row_banks['INN'];?><br>
		КПП: <?php echo $row_banks['KPP'];?><br>
		Расчетный счет: <?php echo $row_banks['RS'];?><br>
		Банк: <?php echo $row_banks['NAME'];?><br>
		Корреспондентский счет: <?php echo $row_banks['KS'];?><br>
		БИК: <?php echo $row_banks['BIK'];?><br><br>

		Подпись: ______________________________<br>

	</p>
</section>

<nav class="nav-doc">
	<span class="button_print-doc" onclick="printDoc();">Печать</span>
	<span><a class="button_link-doc" href="order_get.php">Назад</a></span>
</nav>
</body>
</html>