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


require_once __DIR__ . '/templates/partials/html_head_connected_zebank.php';

