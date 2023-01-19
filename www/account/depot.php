<!-- faire une page html permet de faire des depots d'une banque-->

<?php

require_once __DIR__ . '/../../src/init.php';

$page_title = 'depot';
$user_id = $_POST['id_user'];
if (isset($_POST['depot'])){
    $somme = $_POST['somme'];
    if (is_numeric($somme) && $somme > 0) {
        // Vérifier que le solde du compte est suffisant pour effectuer le dépôt
        $req = $db->prepare('SELECT somme FROM depot WHERE id = ?');
        $req->execute([$user_id]);
        $solde = $req->fetchColumn();

        if ($somme <= $solde) {
            // Effectuer le dépôt
            $req = $db->prepare('UPDATE depot SET somme = solde + ? WHERE id = ?');
            $req->execute([$somme, $user_id]);

            // Enregistrer la transaction dans la table transactions
            $req = $db->prepare('INSERT INTO transactions(user_id, type, somme) VALUES(?, ?, ?)');
            $req->execute([$user_id, 'depot', $somme]);

            $message = 'Votre dépôt a été effectué avec succès.';
        } else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer ce dépôt.';
        }
    } else {
        $message = 'Veuillez entrer une somme valide.';
    }
}
?>

<body>
<link rel="stylesheet" href="../../src/style.css">
    <div>
        <h1>Dépôt</h1>
    </div>
    <div>
        <form action="depot.php" method="post">
            <div>
                <label for="id_user">id_user</label>
                <input type="int" name="id_user" id="id_user">
            </div>
            <div>
                <label for="somme">somme</label>
                <input type="int" name="somme" id="somme">
            </div>
                <button type="submit" name="depot">Déposer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>