<?php
require_once __DIR__ . '/../src/init.php';
$page_title = 'Admin page';


if ($user['role'] == 'admin') {
    header('Location:./admin.php');
} else {
    header('Location:./accueil_compte.php');
}
?>
 
<block class="block">
    <h2><a href="/admin_retrait">RETRAIT</a></h2>
</block>
