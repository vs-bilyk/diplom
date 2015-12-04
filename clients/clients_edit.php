
<?php  

echo $_GET['message'];


?>
<form class="contact_form_call" action="iz1_sotrudnikov.php" method="post" name="contact_form_call" id="callBack0">
  <input type="text" placeholder="Имя сотрудника" value="<?php echo $row['imya_sotr']; ?>" name="Name" class="name">
  <input type="text" placeholder="Фамилия" value="<?php echo $row['familiya_sotr']; ?>" name="Familiya" class="name">
  <input type="text" placeholder="Телефон" value="<?php echo $row['telefon_sotr']; ?>" name="Telefon" class="name">
  <input type="hidden" value="<?php echo $row['idsotrudniki']; ?>" name="id">
    
  <button class="button btn submit_call" type="submit" value="Оставьте заявку">Изменить</button>
</form>
}
