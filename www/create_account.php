<?php 
require_once __DIR__ . '/../src/init.php';


$id_user = $dbManager->selectLastId('users');
$id_user = $id_user[0];

$new_account_form = new bankAccount();
$new_account_form->id_user = $id_user;
$idNewAccount = $dbManager-> insert_advanced($new_account_form);
echo "inscription rÃ©ussie";


header('Location:./connexion.php');
?>