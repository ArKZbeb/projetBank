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

<block class="block">
    <h2><a href="../www/retrait.php">RETRAIT</a></h2>
</br>
<h2><a href="../www/transaction.php">TRANSACTION</a></h2>
</br>
<h2><a href="../www/depot.php">DEPOT</a></h2>
</block>
<?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>
</html>