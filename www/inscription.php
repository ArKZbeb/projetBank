<!-- faire une page d'inscription d'un utilisateur de la banque-->
<?php
session_start();
$page_title = 'Inscription';
require_once __DIR__ . '/../src/templates/partials/html_head_zebank.php';

if(isset($_POST['submit']))
{
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $telephone = $_POST['telephone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password_retype = $_POST['password_retype'];
   if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    
            if($password_retype == $password){
                $sth = $dbh->prepare("INSERT INTO users (nom, prenom, telephone, email, mdp) VALUES (?, ?, ?, ?, ?)");
                $sth->execute([$nom, $prenom, $telephone, $email, $password]);
                $data = $sth->fetch();
                header('Location:./connexion.php');

}}
}
?>

<body>
    <div>
        <h1>Inscription</h1>
    </div>
    <div>
        <form action="inscription.php" method="post">
            <div>
                <label for="nom">nom</label>
                <input type="text" name="nom" id="nom">
            </div>
            <div>
                <label for="prenom">prenom</label>
                <input type="text" name="prenom" id="prenom">
            </div>
            <div>
                <label for="telephone">telephone</label>
                <input type="text" name="telephone" id="telephone">
            </div>
            <div>
                <label for="email">email</label>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label for="password">mot de passe</label>
                <input type="text" name="password" id="password">
            </div>
            <div>
                <button type="submit">s'inscrire</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>

