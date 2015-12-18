<?php 

include "../connect.php";

$key = $_GET['message'];

include "lease_agreement_get_data_doc.php";

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
		ДОГОВОР ЛИЗИНГА № <?php echo $key; ?>
	</h1>
	<div class="date-doc">
		<script type="text/javascript"> // преобразовываем дату
			formatDate( <?php echo $year ?>, <?php echo $month ?>, <?php echo $day ?>, 'date-doc');
		</script>
	</div><br>
	<p class="paragraph-doc"> 
		<?php echo $row_leasing_company["NAME"] ?> в лице <?php echo $row_leasing_company['FIO'] ?>, 
		действующего на основании устава, 
		именуемый в дальнейшем Лизингодатель, с одной стороны, и <?php echo $row_clients['NAME'] ?> 
		в лице <?php echo $row_clients['FIO'] ?>, действующего на основании устава, 
		именуемый в дальнейшем Пользователь, с другой стороны, именуемые в дальнейшем Стороны, заключили настоящий договор, 
		в дальнейшем Договор, о нижеследующем:<br> <br>

		1. ПРЕДМЕТ ДОГОВОРА<br>
		1.1. Лизингодатель обязуется предоставить по настоящему договору Пользователю оборудование 
		для <?php echo $row_lease_agreement["CPOL"]; ?>.<br>
		1.2. Состав (перечень) оборудования с указанием технических характеристик приведен в Приложении 1.<br>
		1.3. Стоимость передаваемого в пользование оборудования составляет <?php echo $row_order['PRICE']; ?> руб.<br>
		1.4. Поставка оборудования, являющегося предметом настоящего договора, будет произведена 
			<span class="date">
				<script type="text/javascript"> // преобразовываем дату
					formatDate( <?php echo $year_posdate ?>, <?php echo $month_posdate ?>, <?php echo $day_posdate ?>);
				</script>
			</span> в месте, указанном в настоящем договоре.<br><br>
		2. СРОК ДЕЙСТВИЯ ДОГОВОРА<br>
		2.1. Настоящий договор вступает в силу с даты ввода Пользователем оборудования в эксплуатацию.<br>
		2.2. Срок действия договора <?php echo $row_lease_agreement["T"]; ?> лет.<br><br>

		3. ОБЯЗАТЕЛЬСТВА СТОРОН<br>
		3.1. Лизингодатель обязуется:<br>
		3.1.1. Предоставить оборудование в соответствии с соглашением о лизинге, заключенном сторонами 
		по настоящему договору от 
			<span class="date">
				<script type="text/javascript"> // преобразовываем дату
					formatDate( <?php echo $year ?>, <?php echo $month ?>, <?php echo $day ?>);
				</script>
			</span><br>
		3.1.2. Подписать акт приемки оборудования после ввода его в эксплуатацию Пользователем.<br>
		3.1.3. Заключить договор страхования оборудования на срок действия настоящего договора.<br>
		3.2. Пользователь обязуется:<br>
		3.2.1. Произвести приемку оборудования при поставке его в пункт назначения
		 <?php echo $row_suppliers ['NAME']; ?>.<br>
		3.2.2. Осуществить за свой счет монтаж и ввод оборудования в эксплуатацию.<br>
		3.2.3. Подтвердить в протоколе приемки комплектность поставки, безупречное функционирование 
		оборудования и достижение намеченных производственных результатов.<br>
		3.2.4. Производить за свой счет техническое обслуживание оборудования и текущий ремонт.<br>
		3.2.5. Соблюдать все инструкции поставщика по уходу, техническому обслуживанию и эксплуатации оборудования.<br>
		3.2.6. Обеспечить Лизингодателю беспрепятственный доступ к ознакомлению со своей бухгалтерской отчетностью, 
		годовыми отчетами и предоставлять Лизингодателю полную информацию о своем экономическом положении 
		в течение всего срока действия договора.<br><br>

		4. УСЛОВИЯ ПЛАТЕЖА<br>
		4.1. Срок пользования предмета лизинга составляет по настоящему договору <?php echo $row_lease_agreement["CP"]; ?> лет.<br>
		4.2. Пользователь обязуется периодически вносить плату за пользование оборудованием на расчетный 
		счет Лизингодателя.<br>
		4.3. Ставки платы за пользование оборудованием являются окончательными и изменению не подлежат.<br>
		4.4. Платежи производятся с периодичностью раз в 
			<span class='period'>
				<script type="text/javascript"> // преобразовываем период
					formatPeriod(<?php echo $row_lease_agreement['PP'];?>);
				</script>.
			</span><br>
		4.4. Внесение платы за 1-й период производится с <?php echo $row_lease_agreement['NDATE'];?> <br>
		4.5. Коэффициент ускоренной амортизации по настоящему договору составляет - <?php echo $row_lease_agreement['KU'];?>. 
		Коэффициент доли заемных средств составляет - <?php echo $row_lease_agreement['Q'];?>. <br>
		4.6. Ставка оплаты за привлекаемые ресурсы <?php echo $row_crediting['PS']; ?>% годовых.<br>
		4.7. Расчет комиссионного вознаграждения лизингодателя осуществляется методом 
		(расчета от балансовой стоимости имущества или расчета от среднегодовой остаточной 
		стоимости имущества). Ставка комиссионного вознаграждения лизингодателя <?php echo $row_lease_agreement['STV'];?>% годовых. 
		Суммарная стоимость прочих услуг лизингодателя за весь срок действия договора, 
		без НДС составляет <?php echo $row_lease_agreement['PSU'];?> рублей (по умолчанию 0).<br>
		4.8. Ставка налога на добавленную стоимость по настоящему договору составляет <?php echo $row_lease_agreement['SNDS'];?>%.<br>
		4.9. Размер авансового платежа, включая НДС <?php echo $row_lease_agreement['AV'];?> рублей.<br>
		4.10. Величина отсрочки первого платежа составляет <?php echo $row_lease_agreement['K'];?> дней.<br>
		4.11. Выкуп имущества по завершению действия настоящего договора 
			<span class="redemption">
				<script type="text/javascript">
					formatRedemption(<?php echo $row_lease_agreement['PVI'];?>);
				</script>.
			</span><br><br>

		5. ПЕРЕДАЧА ОБЪЕКТА ЛИЗИНГА<br>
		5.1. Передача оборудования производится путем его поставки по адресу: <?php echo $row_clients['ADDM']; ?> 
		(пункт назначения) в соответствии с п.1.4 настоящего договора.<br>
		5.2. После осуществления монтажа поставленного оборудования составляется акт приемки 
		(Приложение 2), подписываемый надлежаще уполномоченными представителями 
		Пользователя и Поставщика и пересылается Лизингодателю.<br>
		5.3. Обнаружение некомплектности оборудования при поставке или недостатков в период монтажа, 
		исключающих возможность нормального функционирования оборудования, подлежит отражению в протоколе, 
		составляемом в соответствии с п.5.2. Выявленные недостатки (некомплектность) оборудования 
		подлежит устранению за счет Лизингодателя, а при невозможности их устранения Лизингодатель 
		обеспечивает полную замену оборудования.<br>
		5.4. В случае отказа от приемки оборудования из-за наличия недостатков, исключающих его нормальную 
		эксплуатацию, Пользователь извещает Лизингодателя об этом в письменной форме в <?php echo $row_lease_agreement['OTDATA'];?> - 
		дневный срок с даты их выявления.<br>
		5.5. Передача оборудования в субаренду может осуществляться Пользователем с согласия Лизингодателя.<br>
		5.6. По окончании срока действия настоящего договора Пользователь имеет опцион (преимущественное право) 
		на покупку оборудования по остаточной стоимости.<br><br>

		6. ОТВЕТСТВЕННОСТЬ<br>
		6.1. В случае невнесения платы за пользование оборудованием в сроки, установленные в п.4.4. настоящего 
		договора, Пользователь уплачивает пеню в размере <?php echo $row_lease_agreement['PNP'];?>% от суммы невнесенного платежа за 
		каждый день просрочки.<br>
		6.2. За неисполнение или ненадлежащее исполнение обязательств по настоящему договору, а также за 
		досрочное расторжение договора виновная сторона уплачивает штрафную неустойку в 
		сумме <?php echo $row_lease_agreement['SH'];?> руб., не исключающей возможности 
		предъявления иска о взыскании убытков.<br><br>

		7. НЕПРЕОДОЛИМАЯ СИЛА (ФОРС-МАЖОР)<br>
		7.1. При наступлении обстоятельств, повлекших невозможность полного или частичного исполнения любой 
		из сторон обязательств по настоящему договору, а именно: пожара, блокады, запрещения вывоза 
		грузов или других, независимых от сторон обстоятельств, срок исполнения обязательств отодвигается 
		соразмерно времени, в течение которого будут действовать такие обстоятельства.<br>
		7.2. Если эти обстоятельства будут продолжаться более 6 месяцев, то каждая сторона вправе отказаться 
		от дальнейшего исполнения обязательств по договору исключением права любой из сторон требовать возмещения убытков.<br>
		7.3. Сторона, для которой создалась невозможность исполнения обязательств по договору, должна о наступлении 
		или прекращении обстоятельств, препятствующих исполнению обязательств, немедленно извещать другую сторону.<br>
		7.4. Надлежащим доказательством наличия указанных выше обстоятельств и их продолжительности будут служить 
		справки, выдаваемые соответственно местным органом государственного управления Лизингодателя или 
		Пользователя или органом, на который возложено оперативное руководство в данной местности на период 
		ликвидации последствий стихийного бедствия.<br><br>

		8. РАССМОТРЕНИЕ СПОРОВ<br>
		8.1. Стороны будут стремиться урегулировать споры, возникшие из настоящего договора, путем проведения 
		переговоров.<br>
		8.2. В случае, если указанные споры не могут быть решены путем переговоров, они подлежат 
		разрешению арбитражным судом в соответствии с действующим законодательством.<br><br>

		9. ИНЫЕ УСЛОВИЯ<br>
		9.1. Внесение изменений в состав (перечень) оборудования производится лишь при наличии письменного 
		согласия Лизингодателя.<br>
		9.2. Любое извещение, отправляемое одной из сторон по настоящему договору другой стороне, должно быть 
		отправлено по почте, телефоном или вручено лично под расписку.<br>
		9.3. Стороны обязаны сообщить друг другу об изменении своего юридического адреса, номеров телефонов, 
		телефаксов не позднее 48 часов с даты их изменения.<br>
		9.4. С даты заключения настоящего договора вся предшествующая переписка и переговоры между 
		сторонами по вопросам, являющимся предметом настоящего договора, теряют силу.<br>
		9.5. Любые изменения и дополнения к настоящему договору действительны лишь при условии, если они 
		совершены в письменной форме и подписаны надлежаще уполномоченными на то представителями сторон.<br>
		9.6. В случаях, не предусмотренных настоящим договором, применяется действующее гражданское 
		законодательство РФ.<br>
		Приложения к настоящему договору являются его неотъемлемой частью.<br><br>

		10. РЕКВИЗИТЫ И ПОДПИСИ СТОРОН<br>
		<br><br>

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


		ЛИЗИНГОПОЛУЧАТЕЛЬ:<br><br>
		Юридический адрес: <?php echo $row_clients['ADDL'];?><br>
		Почтовый адрес: <?php echo $row_clients['ADDM'];?><br>
		Телефон: <?php echo $row_clients['TF'];?><br>
		Факс: <?php echo $row_clients['FX'];?><br>
		ИНН: <?php echo $row_clients['INN'];?><br>
		КПП: <?php echo $row_clients['KPP'];?><br>
		Расчетный счет: <?php echo $row_clients['RS'];?><br>
		Банк: <?php echo $row_clients_bank['NAME'];?><br>
		Корреспондентский счет: <?php echo $row_clients_bank['KS'];?><br>
		БИК: <?php echo $row_clients_bank['BIK'];?><br><br>

		Подпись: ______________________________<br>

	</p>
</section>

<nav class="nav-doc">
	<span class="button_print-doc" onclick="printDoc();">Печать</span>
	<span><a class="button_link-doc" href="lease_agreement_get.php">Назад</a></span>
</nav>
</body>
</html>