<!-- faire une page de connexion d'un utilisateur de la banque-->
<?php
session_start();
$page_title = 'Connexion';
require_once __DIR__ . '/../src/templates/partials/html_head_zebank.php';
?>

<body>
    <div>
        <h1>Connexion</h1>
    </div>
    <div>
        <form action="connexion.php" method="post">
            
            <div>
                <label for="email">identifiant</label>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label for="password">mot de passe</label>
                <input type="text" name="password" id="password">
            </div>
            <div>
                <button type="submit">se connecter</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>