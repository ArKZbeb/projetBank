<?php
require_once __DIR__ . '/../src/init.php';
$page_title = 'Admin page';


if ($user['role'] != 'admin') {
    header('Location:./accueil_compte.php');
}

$hihi = $db->prepare('SELECT * FROM depot');
$hihi->execute();
$donnes = $hihi->fetchAll();
foreach($donnes as $donne) {
    echo $donne['id'];
    echo " ";
    echo $donne['id_user'];
    echo " ";
    echo $donne['somme'];
    echo " ";
    echo $donne['devise'];
    echo " ";
    echo $donne['date'];
    echo "<br>";
}
