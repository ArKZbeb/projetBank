<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Inscription';
function hash_password($password){
    return hash('sha256', $password);
}

if(isset($_POST['inscription']))
{
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $telephone = $_POST['telephone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password_retype = $_POST['password_retype'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    
            if($password_retype == $password){
                $password = hash_password($password);
                $new_member_form = new users();
                $new_member_form->nom = $_POST['nom'];
                $new_member_form->prenom = $_POST['prenom'];
                $new_member_form->telephone = $_POST['telephone'];
                $new_member_form->email = $_POST['email'];
                $new_member_form->password = $password;
                $idNewMember = $dbManager-> insert_advanced($new_member_form);
                // echo "inscription réussie";
                
                // // créer un compte pour le nouveau membre
                // // $new_account_form = new bankAccount();
                // // $new_account_form->id_user = $idNewMember;
                // // $dbManager-> insert_advanced($new_account_form);
                
                header('Location:./connexion.php');

}}
}
else{
    echo "Veuillez remplir tous les champs";
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
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password">Confirmer votre mot de passe</label>
                <input type="password" name="password_retype" id="password_retype">
            </div>
            <div>
                <button type="submit" name="inscription">s'inscrire</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>
