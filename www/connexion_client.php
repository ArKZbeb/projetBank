<!-- faire une page de connexion d'un utilisateur de la banque-->
<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Connexion_client';


if(isset($_POST['connexion'])){

    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
        if($email != '' && $password != ''){
            $sth = $db->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
            $sth->execute([$email, $password]);
            $donnees = $sth->fetch();
        }
        if($donnees != ""){
            header('Location:./accueil_compte.php');
            $_SESSION['connected'] = true;
        }
}

?>

<body>
    <div>
        <h1>-Espace Client-</h1>
    </div>
    <div>
        <form action="connexion_client.php" method="post">
            
            <div>
                <label for="email">identifiant</label>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label for="password">mot de passe</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <button type="submit" name="connexion">se connecter</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>