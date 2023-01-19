<!-- faire une page html permet de faire des transactions d'une banque-->

<?php

require_once __DIR__ . '/../../src/init.php';

$page_title = 'transaction';

if (isset($_POST['transaction'])){
    $somme = $_POST['somme'];
    if ($somme != ''){
            $req = $db->prepare('INSERT INTO transaction(somme) VALUES(?)');
            $req->execute([$somme]);
            header('Location:./index_zebank.php');
    }

}
?>

<body>
<link rel="stylesheet" href="../../src/style.css">
    <div>
        <h1>Transaction</h1>
    </div>
    <div>
        <form action="transaction.php" method="post">
            <div>
                <label for="nom">ID receveur</label>
                <input type="int" name="id_receveur" id="id_receveur">
            </div>
            <div>
                <label for="prenom">somme</label>
                <input type="int" name="somme" id="somme">
            </div>
                <button type="submit" name="transaction">Envoyer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>