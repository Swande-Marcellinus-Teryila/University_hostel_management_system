<?php require('includes/autoloader.php'); 
$crud =  new Crud();
$pswd = password_hash('jostum#123', PASSWORD_DEFAULT);
$crud->insertAdmin('jostum',$pswd,'1');
