<?php 

include "../connect.php";

$key = $_GET['message'];

include "lease_agreement_get_data_sched.php";

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
	<div class="header-annex-doc">
		<h2 class="annex-doc">
			Приложение №2<br>
			к договору № <?php echo $key; ?> от 
			<span class="date">
				<script type="text/javascript"> // преобразовываем дату
					formatDate( <?php echo $year ?>, <?php echo $month ?>, <?php echo $day ?>);
				</script>
			</span><br><br><br>
		</h2>
	</div>
	<h1 class="header-doc header-doc_small">
		ГРАФИК<br>
		лизинговых платежей (руб.)
	</h1><br>
	<p class="paragraph-doc">
		Дата начала первого расчетного периода: 
		<span class="date">
			<script type="text/javascript"> // преобразовываем дату
				formatDate( <?php echo $year_posdate ?>, <?php echo $month_posdate ?>, <?php echo $day_posdate ?>);
			</script>
		</span><br>
		Периодичность платежей: 
		<span class='period'>
			<script type="text/javascript"> // преобразовываем период
				formatPeriod(<?php echo $row_lease_agreement['PP'];?>);
			</script>.
		</span><br>
		<table class="table-doc">
			<thead>
				<tr>
					<th>Номер периода п/п</th>
					<th>Сумма авансового платежа</th>
					<th>Суммы периодических платежей</th>
					<th>Сумма выкупа имущества</th>
					<th>Суммы выплат по договору</th>
				</tr>
			</thead>			
			<script>
				CalculateLeasePayments(<?php echo $cp ?>,<?php echo $bs ?>,<?php echo $ku ?>,<?php echo $q ?>,<?php echo $st ?>,<?php echo $p ?>,<?php echo $pdu ?>,<?php echo $snds ?>,<?php echo $t ?>,<?php echo $p ?>,<?php echo $av ?>);
			</script>
		</table><br><br>
		Лизингодатель:<?php echo $row_leasing_company['NAME']; ?><br>
		Генеральный директор <br><br><br><br>
		____________________ <?php echo $row_leasing_company['FIO']; ?><br><br><br><br>

		Лизингополучатель:<?php echo $row_clients['NAME']; ?><br>
		Генеральный директор <br><br><br><br>
		____________________ <?php echo $row_clients['FIO']; ?><br>
	</p>
</section>

<nav class="nav-doc">
	<span class="button_print-doc" onclick="printDoc();">Печать</span>
	<span><a class="button_link-doc" href="lease_agreement_get.php">Назад</a></span>
</nav>
</body>
</html>