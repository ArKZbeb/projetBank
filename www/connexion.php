<!-- faire une page de connexion d'un utilisateur de la banque-->
<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Connexion';

?>

<body>
    <div>
        <h1>Connexion</h1>
    </div>
    <div>
</br>
        <h2><a href="connexion_client.php">Espace Client</a></h2>
</br>
        <h2><a href="connexion_admin.php">Espace Administrateur</a></h2>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>