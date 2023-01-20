<?php

require_once __DIR__ . '/../src/init.php';
$page_title = 'account';

// Récupération des données de la table "users"



// Affichage des données dans la page

?>

    <body>
    <link rel="stylesheet" href="../../src/style.css">
        <head>
             <link rel="stylesheet" href="account.css">
             <link rel="stylesheet" href="/../../src/style.css">
        </head>
        <div>
            <h1>Mon compte</h1>
        </div>
        <div>
            <form action="account.php" method="post">
                <div>
                    <label for="nom">Nom</label>
                    <?php echo $_SESSION['nom'] ?>
                </div>
                <div>
                    <label for="prenom">Prenom</label>
                    <?php echo $_SESSION['prenom'] ?>
                </div>
                <div>
                    <label for="mail">Email</label>
                    <?php echo $_SESSION['email'] ?>
                </div>

                <div>
            <form>
                <select name="comptes">
                    <option value="compte_cheque">Compte chèque</option>
                    <option value="livret_A">Livret A</option>
                    <option value="compte_epargne">Compte épargne</option>
                </select>
            </form>
        </div>
        
        <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
    </body>
</html>