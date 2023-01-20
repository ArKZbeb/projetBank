<!-- faire une page html permet de faire des transactions d'une banque-->

<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'transaction';

if (isset($_POST['transaction'])){
    $somme = $_POST['somme'];
    $id_user = $_SESSION['id'];
    $id_receiver = $_POST['id_receiver'];
    $devise = $_POST['devise'];
if ($somme != '') {
        // Effectuer le dépôt
        // $req = $db->prepare('INSERT INTO depot(id_user,somme) WHERE id_user = ? AND somme = ?');
        // $req->execute([$id_user, $somme]);

        // Enregistrer la transaction dans la table transactions

        //donneur
        $req = $db->prepare('INSERT INTO transaction(id_user,somme,id_receiver, devise) VALUES(?, ?, ?, ?)');
        $req->execute([$id_user, $somme,$id_receiver, $devise]);

        $req2 =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
        $req2->execute([$id_user]);
        $bankAccount = $req2->fetch();
        $userMoney = $bankAccount['euro'];

        $don = $userMoney - $somme;

        $var = $db-> prepare('UPDATE bankaccount SET euro = ? WHERE id_user = ?');
        $var->execute([$don, $id_user]);

        // receiver

        $req = $db->prepare('INSERT INTO transaction(id_user, id_receiver, somme, devise) VALUES(?, ?, ?, ?)');
        $req->execute([$id_receiver, $id_user, $somme, $devise]);

        $req2 =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
        $req2->execute([$id_receiver]);
        $bankAccount = $req2->fetch();
        $receiverMoney = $bankAccount['euro'];

        $don = $userMoney + $somme;

        $var2 = $db-> prepare('UPDATE bankaccount SET euro = ? WHERE id_user = ?');
        $var2 -> execute([$don, $id_receiver]);

        

            $message = 'Votre transaction a été effectuée avec succès.';
        } else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer cette transaction.';
        }
    } else {
        $message = 'Veuillez entrer une somme valide.';
    }
?>

<body>
    <div>
        <h1>Transaction</h1>
    </div>
    <div>
        <form action="transaction.php" method="post">
            <div>
                <label for="id_receiver">ID receveur</label>
                <input type="int" name="id_receiver" id="id_receiver">
            </div>
            <div>
                <label for="prenom">somme</label>
                <input type="int" name="somme" id="somme">
            </div>
            <div>
                <label for="devise">devise</label>
                <input type="text" name="devise" id="devise">
            </div>
                <button type="submit" name="transaction">Transférer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>