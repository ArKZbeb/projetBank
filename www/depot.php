<!-- faire une page html permet de faire des depots d'une banque-->

<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'depot';
if (isset($_POST['somme'])){
    $id_user = $_SESSION['id'];
    $montant = $_POST['somme'];
    
        // Vérifier que le solde du compte est suffisant pour effectuer le dépôt
        
            $req = $db->prepare('INSERT INTO depot(id_user,somme) VALUES(?, ?)');
            $req->execute([$id_user, $montant]);
            

            $req2 =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
            $req2->execute([$id_user]);
            $bankAccount = $req2->fetch();
            $userMoney = $bankAccount['euro'];

            $don = $userMoney + $montant;

            $var2 = $db-> prepare('UPDATE bankaccount SET euro = ? WHERE id_user = ?');
            $var2 -> execute([$don, $id_user]);
            echo 'Votre transaction a été effectuée avec succès.';
        }else {
            $message = 'Le solde de votre compte est insuffisant pour effectuer ce dépôt.';
            echo $message;
        }
    
?>

<body>
    <div>
        <h1>Dépôt</h1>
    </div>
    <div>
        <form action="depot.php" method="post">
            <div>
                <label for="somme">somme</label>
                <input type="int" name="somme" id="somme">
            </div>
                <button type="submit" name="depot">Déposer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>