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

 
