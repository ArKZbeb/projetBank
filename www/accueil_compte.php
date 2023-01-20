<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Home page';
?>
<body>
<div>
    <h1>💶 ZEBANK 💶</h1>
</div>
    <p>Bienvenue sur votre espace bancaire!
</br>
        Vous pouvez désormais effectuer des retraits, dépôts, et transactions de votre ou vos compte(s) bancaire(s)
    </p>

    <p>Voici la liste de vos comptes bancaires:</p>
    <ul>
        <?php
        $id_user = $_SESSION['id'];
        $req = $db->prepare('SELECT * FROM bankaccount WHERE id_user = ?');
        $req->execute([$id_user]);
        $bankaccounts = $req->fetchAll();
        foreach ($bankaccounts as $bankaccount) {   
            echo '<li>Compte Euro  : ' . $bankaccount['compte_euro'] . '€</li>';
            echo '<li>Compte Chèque : ' . $bankaccount['somme_compte_cheque'] . '€</li>';
            echo '<li>Compte livretA : ' . $bankaccount['somme_compte_livretA'] . '€</li>';
            echo '<li>Compte Zebitcoin : ' . $bankaccount['somme_compte_zebitcoin'] . '€</li>';
            echo '<li>Compte Bitcoin : ' . $bankaccount['somme_compte_bitcoin'] . '€</li>';
            echo '<li>Compte ETH : ' . $bankaccount['somme_compte_eth'] . '€</li>';
        }
        ?>
<block class="block">
    <h2><a href="/retrait.php">RETRAIT</a></h2>
</br>
<h2><a href="/transaction.php">TRANSACTION</a></h2>
</br>
<h2><a href="/depot.php">DEPOT</a></h2>
</br>
<h2><a href="/virement.php">VIREMENT</a></h2>
</block>
<?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>
</html>