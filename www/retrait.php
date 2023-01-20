<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'retrait';
if (isset($_POST['retrait'])){
    $id_user = $_SESSION['id'];
    $montant = $_POST['montant'];
    if (is_numeric($montant) && $montant > 0) {
        // Vérifier que le solde du compte est suffisant pour effectuer le dépôt
        
            $req = $db->prepare('INSERT INTO retrait(id_user,montant) VALUES(?, ?)');

            $req->execute([$id_user, $montant]);
            

            $req2 =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
            $req2->execute([$id_user]);
            $bankAccount = $req2->fetch();
            $userMoney = $bankAccount['euro'];

            $don = $userMoney - $montant;

            $var2 = $db-> prepare('UPDATE bankaccount SET euro = ? WHERE id_user = ?');
            $var2 -> execute([$don, $id_user]);
            echo 'Votre transaction a été effectuée avec succès.';
        }else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer ce dépôt.';
            echo $message;
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
                <label for="compte">montant</label>
                <input type="int" name="montant" id="montant">
            </div>
                <button type="submit" name="retrait">Retirer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>