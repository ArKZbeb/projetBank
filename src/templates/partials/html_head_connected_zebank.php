<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title; ?></title>
    <link rel="stylesheet" href="../src/style.css">
    
    <a href="../www/index_zebank.php"><img src="../logo.png"></a>
    <nav>
    <?php if(!isset($_SESSION['connected'])){ ?>
        <a href="../www/connexion.php">SE CONNECTER </a>
        <a href="../www/inscription.php">S'INSCRIRE </a>
    <?php } ?>


        <?php if(isset($_SESSION['connected'])){ ?>
        <a href="../www/account/account.php">MON COMPTE </a>
        <a href="../www/logout.php">SE DECONNECTER </a>
        <?php } ?>
        
    </nav>
</head>