function formAddClassVisibility() {
	$('.form-add').addClass('form_visibility');
}

function formAddClassHidden(obj) {
	$(obj).parent().addClass('form_hidden');
	$(obj).parent().removeClass('form_visibility');
}

function formAddContract(addr) {

	var text = '<?php  include "'+addr+'"; ?>'
	$('.span-add-form-add').html(text);

	$.post(addr,{},function(result){
	$('.span-add-form-add').append(result);
	$('.form-add').addClass('form_visibility');
	})
}

function transferDataPhp(key) {
	var arr = key.split('_');
	var type = arr[0]; // где искать
	var key = arr[1]; // первичный ключ строки
	var addr;

	switch(type) {
		case 'clients': addr = 'clients_edit.php';
		break;

		case 'suppliers': addr = 'suppliers_edit.php';
		break;

		case 'banks': addr = 'banks_edit.php';
		break;

		case 'order': addr = 'order_edit.php';
		break;

		case 'lease': addr = 'lease_agreement_edit.php';
		break;

		case 'crediting': addr = 'crediting_edit.php';
		break;

		case 'purchase': addr = 'purchase_sale_edit.php';
		break;
	}
	var text = '<?php  include "'+addr+'"; ?>'
	$('.span-add-form-edit').html(text);

	$.post(addr,{key:key},function(result){
	$('.span-add-form-edit').append(result);
	$('.form-edit').addClass('form_visibility'); 
	})
}

function viewDoc(addr) {

	var key=$('.form__company-var').val(); 
	window.location.href = addr+'?message='+key;
}

function formatDate(year, month, day, cl) {
	switch(month) {
		case 1: month = 'января';
		break;

		case 2: month = 'февраля';
		break;

		case 3: month = 'марта';
		break;

		case 4: month = 'апреля';
		break;

		case 5: month = 'мая';
		break;

		case 6: month = 'июня';
		break;

		case 7: month = 'июля';
		break;

		case 8: month = 'августа';
		break;

		case 9: month = 'сентября';
		break;

		case 10: month = 'октября';
		break;

		case 11: month = 'ноября';
		break;

		case 12: month = 'декабря';
		break;
	}
	var date = +day+' '+month+' '+year+'г.';

	if (cl == 'date-doc') {
		$('.date-doc').html(date);
		return;
	}

	$('.date').each( function () {
		if (isNaN(parseInt($(this).text()))) {
			$(this).html(date);
			return;
		}
	})
}

function formatPeriod(period) {
	switch(period) {
		case 1: period = 'год';
		break;

		case 4: period = 'квартал';
		break;

		case 12: period = 'месяц';
		break;
	}
	$('.period').each( function () {
		if ($(this).text() !== 'год' || $(this).text() !== 'квартал' || $(this).text() !== 'месяц') {
			$(this).html(period);
			return;
		}
	})
}

function formatRedemption(redemption) {
	if (redemption) {
		redemption = "производится";
	}
	else redemption = "не производится";
	$('.redemption').each( function () {
		if ($(this).text() !== 'производится' || $(this).text() !== 'не производится') {
			$(this).html(redemption);
			return;
		}
	})
}
function printDoc() {

	$('.nav-doc').hide().show('2000') ;
	$(document).ready(function(){
		window.print();
	})
}

// модуль для расчета лизинговых платежей
// и заполнения "графика платежей"
// начало
function CalculateLeasePayments(cp, bs, ku, q, st, p, pdu, snds, t, p, av) { 

	var arrAO = []; // массив с амортизацией
	var arrPK = []; // массив с платой за кредитные ресурсы
	var arrKV = []; // массив комиссионного вознаграждения
	var arrNDS = []; // массив с НДС

	var summ = 0; // Общая сумма лизинговых платежей
	var summAO = 0;
	var ao, pk, kv, nds, os;
	
	this.calculateAO = function(cp, bs, ku) { // расчет амотризации
		var na = (1/cp) * 100; // норма мортизации

		if(!ku) ku=1; // коэф ускоренной амортизации по умолчанию = 1

		ao = (bs * na * ku)/100; // амортизация
		arrAO.push(ao); // добавляем расчитанную амортизацию в массив 
	}

	this.calculatePK = function(q, st) { // расчет платы за используемые лизингодателем ресурсы
		var osn, osk;

		if(arrAO.length > 1) {
			for (var i = 0; i < arrAO.length - 1; i++) { // расчет остаточной стоимости на начало года
				osn = bs - arrAO[i];
			} 
		}
		else osn = 0;

		for (var i = 0; i < arrAO.length; i++) { // расчет остаточной стоимости на конец года
			osk = bs - arrAO[i];
		}

		var kr = (q *(osn + osk)) /2; // расчет кредитных ресурсов
		pk = (kr * st) / 100; // расчет платы за кредитные ресурсы
		arrPK.push(pk); // добавляем расчитанную плату в массив
	}

	this.calculateKV = function(p) { // расчет комиссионного вознаграждения
		kv = (p * bs)/100;
		arrKV.push(kv);
	}

	this.calculateNDS = function(snds) { // расчет НДС
		var vt = pdu + ao + pk + kv;
		nds = (vt * snds) / 100;
		arrNDS.push(nds);
	}

	this.calculateSummLP = function() { // расчет общей суммы лизинговых платежей
		for( var i = 0; i < arrPK.length; i++) {
			var arr = arrAO[i] + arrPK[i] + arrKV[i] + arrNDS[i];
			summAO = summAO + arrAO[i];
			summ = summ + arr;
		}
	this.calculateLP(t, p, av);	
	}

	this.calculateLP = function(t, p, av) { // расчет лизинговых платежей

		if (av) { // если есть аванс
			lp = (summ - av) / (t*p);
		}
		else lp = summ/(t*p);// если нет аванса

		lpAv = lp+av;
		lpAv = lpAv.toFixed(2); // убираем лишние цифры после запятой для первого платежа+аванса

		lp = lp.toFixed(2); // убираем лишние цифры после запятой для лизингово платежа
		
		console.log(lpAv);
	}

	this.calculateOS = function() {
		os = bs - summAO;

	}

	for (var i = 0; i < t; i++) { // вызов методов для заданного количества лет
		this.calculateAO(cp, bs, ku);
		this.calculatePK(q, st);
		this.calculateKV(p);
		this.calculateNDS(snds);
	}
	this.calculateSummLP();
	this.calculateOS();

	this.createTrTd = function () { // создаем строки и ячейки для таблицы
		this.$td1 = $('<td>-</td>');
		this.$td2 = $('<td>-</td>');
		this.$td3 = $('<td>-</td>');
		this.$td4 = $('<td>-</td>');
		this.$td5 = $('<td>-</td>');
		this.$tr = $('<tr></tr>');
	}

	this.createString = function () { // вставляем строки со значениями
		var $tbody = $('<tbody></tbody>');
		var i;

		if (av) { // если есть аванс, то вносим его в первую строку

			this.createTrTd();

			this.$td2.text(av);
			this.$tr.append(this.$td1).append(this.$td2).append(this.$td3).append(this.$td4).append(this.$td5);

			$tbody.append(this.$tr);
		}

		for (i = 1; i < (t*p)+1; i++) { // заполняем все лизинговые платежи
			this.createTrTd();

			this.$td1.text(i);
			this.$td3.text(lp);

			if(i == 1 && av) this.$td5.text(lpAv); // если есть аванс, то прибавляем его к первому платежу
			else this.$td5.text(lp);

			this.$tr.append(this.$td1).append(this.$td2).append(this.$td3).append(this.$td4).append(this.$td5);
			$tbody.append(this.$tr);
		}

		if (os) { // если есть остаточная стоимость вставляем ее
			this.createTrTd();

			this.$td1.text(i);
			this.$td4.text(os);

			this.$tr.append(this.$td1).append(this.$td2).append(this.$td3).append(this.$td4).append(this.$td5);
			$tbody.append(this.$tr);
		}

		{
			this.createTrTd(); // заполняем последнюю строку с итого
			this.$td1.text('Итого:');
			if (av) this.$td2.text(av);
			this.$td3.text(summ - av);
			if (os) this.$td4.text(os);
			this.$td5.text(os+summ);

			this.$tr.append(this.$td1).append(this.$td2).append(this.$td3).append(this.$td4).append(this.$td5);
			$tbody.append(this.$tr);

		}
		$('.table-doc').append($tbody); // вставляем заполненную таблицу в документ
	}

	this.createString();
}
// конец модуля для расчета лизинговых платежей

