<?php

session_start();

// db
require_once __DIR__ . '/db.php';

// class
require_once __DIR__ . '/class/DbObject.php';
//require_once __DIR__ . '/class/ContactForm.php';

// db manager
require_once __DIR__ . '/class/DbManager.php';

$dbManager = new DbManager($db);

// $test = bin2hex(random_bytes(10));
// echo $test;


// utils
require_once __DIR__ . '/utils/errors.php';

$user = false;
if (isset($_SESSION['id'])){
    $sth = $db->prepare('SELECT * FROM users WHERE id_user = ?');
    $sth->execute([$_SESSION['id']]);
    $user = $sth->fetch();

}

if(isset($_SESSION['id']) && $user['role']=='banned'){
    header('Location:./banned.php');
}

require_once __DIR__ . '/templates/partials/html_head_connected_zebank.php';

