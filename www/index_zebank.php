<?php
session_start();
$page_title = 'Home page';
require_once __DIR__ . '/../src/templates/partials/html_head_zebank.php';
?>
<body>
<link rel="stylesheet" href="../src/style.css">
<div>
    <h1>💶 ZEBANK 💶</h1>
</div>

<?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
</body>
</html>