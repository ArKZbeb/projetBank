<!-- faire une page html permet de faire des depots d'une banque-->

<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'depot';
require_once __DIR__ . '/../src/templates/partials/html_head_zebank.php';
if (isset($_POST['depot'])){
    $somme = $_POST['somme'];
    if ($somme != ''){
            $req = $db->prepare('INSERT INTO depot(somme) VALUES(?)');
            $req->execute([$somme]);
            header('Location:./index_zebank.php');
    }

}
?>

<body>
    <div>
        <h1>Dépôt</h1>
    </div>
    <div>
        <form action="depot.php" method="post">
            <div>
                <label for="prenom">somme</label>
                <input type="int" name="somme" id="somme">
            </div>
                <button type="submit" name="depot">Déposer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>