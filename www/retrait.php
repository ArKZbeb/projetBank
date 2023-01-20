<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'retrait';
$id_user = $_POST['id_user'];
if (isset($_POST['retrait'])){
    $somme = $_POST['somme'];
    if (is_numeric($somme) && $somme > 0) {
        // Vérifier que le solde du compte est suffisant pour effectuer le dépôt
        $req = $db->prepare('SELECT somme FROM depot WHERE id = ?');
        $req->execute([$id_user]);
        $solde = $req->fetch();
        

        if ($somme != '') {
            // Effectuer le dépôt
            $req = $db->prepare('UPDATE retrait SET somme = solde - ? WHERE id = ?');
            $req->execute([$somme, $id_user]);
            echo "ta mere";
            // Enregistrer la transaction dans la table transaction
            $req = $db->prepare('INSERT INTO transaction(id_user, type, somme) VALUES(?, ?, ?)');
            $req->execute([$id_user, 'retrait', $somme]);

            $message = 'Votre retrait a été effectué avec succès.';
        } else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer ce dépôt.';
        }
    } else {
        $message = 'Veuillez entrer une somme valide.';
    }
}
?>
<body>
    <div>
        <h1>Retrait</h1>
    </div>
    <div>
        <form action="retrait.php" method="post">
            <div>
                <label for="id_user">id_user</label>
                <input type="int" name="id_user" id="id_user">
            </div>
            <div>
                <label for="compte">somme</label>
                <input type="int" name="somme" id="somme">
            </div>
                <button type="submit" name="retrait">Retirer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>