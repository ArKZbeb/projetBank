<?php

require_once __DIR__ . '/../../src/init.php';
$page_title = 'account';

// Récupération des données de la table "users"
$query = 'SELECT * FROM users';
$stmt = $pdo->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();

// Affichage des données dans la page
echo "<table>";
echo "<tr><th>ID</th><th>Nom</th><th>Email</th></tr>";
foreach ($users as $user) {
    echo "<tr>";
    echo "<td>" . $user['id'] . "</td>";
    echo "<td>" . $user['name'] . "</td>";
    echo "<td>" . $user['email'] . "</td>";
    echo "</tr>";
}
echo "</table>";
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
            <form>
                <select name="comptes">
                    <option value="compte_cheque">Compte chèque</option>
                    <option value="livret_A">Livret A</option>
                    <option value="compte_epargne">Compte épargne</option>
                </select>
            </form>
        </div>
        <?php require_once __DIR__ . '/../../src/templates/partials/html_footer_zebank.php'; ?>
    </body>
</html>