<?php
require_once __DIR__ . '/../src/init.php';
$page_title = 'Admin page';


if ($user['role'] != 'admin') {
    header('Location:./accueil_compte.php');
}


$forms = $dbManager->select('SELECT * FROM users', [], 'users');
//renvoie un tableau d'objets de la classe users

foreach($forms as $form) {
    echo $form->id_user;
    echo " ";
    echo $form->nom;
    echo " ";
    echo $form->prenom;
    echo " ";
    echo $form->email;
    echo " ";
    echo $form->role;
    echo " ";
    echo $form->created_at;
    echo "<br>";
}
?>
 
 <!--faire une page de bannissement de compte-->

 


<block class="block">
    <h2><a href="/admin_retrait.php">RETRAIT</a></h2>
</br>
    <h2><a href="/admin_transaction.php">TRANSACTION</a></h2>
</br>
    <h2><a href="/admin_depot.php">DEPOT</a></h2>
</br>
    <h2><a href="/ban.php">BANNISSEMENT</a></h2>
</br>
    <h2><a href="/unban.php">DÉBANNIR</a></h2>
</block>
