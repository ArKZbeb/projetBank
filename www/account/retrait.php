<?php
session_start();
$page_title = 'retrait';
require_once __DIR__ . '/../src/templates/partials/html_head_zebank.php';
?>

<body>
    <div>
        <h1>Retrait</h1>
    </div>
    <div>
        <form action="retrait.php" method="post">
            <div>
                <label for="compte">somme</label>
                <input type="int" name="somme" id="somme">
            </div>
                <button type="submit">Envoyer</button>
            </div>
        </form>
    </div>
    <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>

</html>