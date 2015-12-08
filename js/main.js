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

		case 'clients':  
		addr = 'clients_edit.php';
		break;

		case 'suppliers':  
		addr = 'suppliers_edit.php';
		break;

		case 'banks':  
		addr = 'banks_edit.php';
		break;

		case 'order':  
		addr = 'order_edit.php';
		break;
	}

	var text = '<?php  include "'+addr+'"; ?>'
	$('.span-add-form-edit').html(text);

	$.post(addr,{key:key},function(result){
	$('.span-add-form-edit').append(result);
	$('.form-edit').addClass('form_visibility'); 
	})
}
function printDoc() {
	window.print();
}


 
