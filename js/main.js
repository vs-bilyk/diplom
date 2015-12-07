function formAddClassVisibility() {
	$('.form-add').addClass('form_visibility');
}
function formAddClassHidden(obj) {
	$(obj).parent().addClass('form_hidden');
	$(obj).parent().removeClass('form_visibility');
}
function transferDataPhp(primaryKey) {
	var arr = primaryKey.split('_');
	var type = arr[0]; // где искать
	var primaryKey = arr[1]; // первичный ключ строки
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
	}

	var text = '<?php  include "'+addr+'"; ?>'
	$('.span-add-form-edit').html(text);

	$.post(addr,{primaryKey:primaryKey},function(result){
	$('.span-add-form-edit').append(result);
	})

	$('.form-edit').addClass('form_visibility');
}


 
