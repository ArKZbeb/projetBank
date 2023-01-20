<?php
require_once __DIR__ . '/../src/init.php';
$page_title = 'Admin page';


if ($user['role'] != 'admin') {
    header('Location:./accueil_compte.php');
}


$forms = $dbManager->select('SELECT * FROM retrait', [], 'retrait');
var_dump($forms);