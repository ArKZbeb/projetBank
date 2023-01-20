<?php
require_once __DIR__ . '/../src/init.php';

$forms = $dbManager->select('SELECT * FROM users WHERE role = banned', [], 'users');
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
<!-- faire des input pour choisir qui bannir via l'id_user -->
<!-- faire un bouton pour bannir le compte -->

<form>
    <input type="text" name="id_user" placeholder="id_user">
    <input type="submit" value="Bannir">
</form>

<?php
$sql = "UPDATE users SET role = 'client' WHERE id_user = :id";

$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $_GET['id_user']);
$stmt->execute();
?>