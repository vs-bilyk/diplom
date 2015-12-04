function formAddClassVisibility() {
	$('.form-add').addClass('form-add_visibility');
}
function formAddClassHidden() {
	$('.form-add').removeClass('form-add_visibility');
}
function transferDataPhp(inn) {
// 		var message = encodeURIComponent(inn);
// window.location.href = 'clients_edit.php?message='+message;

var message = 'Hello, server!';
$.get('clients_edit.php', {message:message}, function(data)	{
	alert('Сервер ответил: '+data);
});
	// var message = inn;
	// $.get('clients_get.php', {message:message}, function(data)	{
	// 	$('span').html('<?php  include "clients_edit.php"; ?>')
	// 	alert('Сервер ответил: '+data);
	// });


}



 
