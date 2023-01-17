<!-- faire une page html permet de faire des transactions d'une banque-->

<?php
session_start();
$page_title = 'transaction';
require_once __DIR__ . '/../src/templates/partials/html_head_zebank.php';
?>

<body>
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
                <button type="submit">Envoyer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>
