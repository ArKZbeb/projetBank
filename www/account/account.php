<?php
    require_once __DIR__ . '/../src/init.php';
    $page_title = 'account';
    ?>
    
    <body>
        <div>
            <h1>Mon compte</h1>
        </div>
        <div>
            <form action="account.php" method="post">
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom">
                </div>
                <div>
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" id="prenom">
                </div>
                <div>
                    <label for="mail">Email</label>
                    <input type="text" name="email" id="email">
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="text" name="mdp" id="mdp">
                </div>
                <div>
                    <label for="compte">Solde</label>
                    <input type="int" name="solde" id="solde">
                </div>
                <div>
                    <label for="compte">Compte Checque</label>
                    <input type="int" name="solde" id="solde">
                </div>
                <div>
                    <label for="compte">Livret A</label>
                    <input type="int" name="solde" id="solde">
                <div>
                    <label for="compte">Compte Epargne</label>
                    <input type="int" name="solde" id="solde">
                </div>
            </form>
        </div>
        <?php require_once __DIR__ . '/../www../src/templates/partials/html_footer_zebank.php'; ?>
    </body>
    
    </html>