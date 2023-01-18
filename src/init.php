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


// utils
require_once __DIR__ . '/utils/errors.php';

// conditions connection db

if ($dbManager->isConnected()) {
    require_once __DIR__ .'/../src/templates/partials/html_head_connected_zebank.php';
} else {
    require_once __DIR__ . '/../src/templates/partials/html_head_not_connected_zebank.php';
}
?>
<link rel="'style.css'">