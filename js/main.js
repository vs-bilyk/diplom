function formAddClassVisibility() {
	$('.form-add').addClass('form_visibility');
}
function formAddClassHidden(obj) {
	$(obj).parent().removeClass('form_visibility');
}
function transferDataPhp(primaryKey) {
	arr = primaryKey.split('_');
	type = arr[0]; // где искать
	primaryKey = arr[1]; // первичный ключ строки

	$('.span-add-form-edit').html('<?php  include "clients_edit.php"; ?>')

	$.post('clients_edit.php',{primaryKey:primaryKey},function(result){
	$('.span-add-form-edit').append(result);
	})

	$('.form-edit').addClass('form_visibility');
}



 
