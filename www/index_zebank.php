<?php
session_start();
$page_title = 'Home page';
require_once __DIR__ . '../src/templates/partials/html_head_zebank.php';
?>
<body>
<link rel="stylesheet" href="../src/style.css">
<div>
    <h1>💶 ZEBANK 💶</h1>
</div>
<div>
    <a href="../www/inscription.php">S'INSCRIRE </a>
</div>
<div>
    <a href="../www/connexion.php">SE CONNECTER </a>
</div>

<?php require_once __DIR__ . '../src/templates/partials/html_footer_zebank.php'; ?>
</body>
</html>