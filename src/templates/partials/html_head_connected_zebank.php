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
        <a href="../connexion.php">Se connecter </a>
        <a href="../inscription.php">S'inscrire </a>
    <?php } ?>


        <?php if(isset($_SESSION['connected'])){ ?>
        <a href="../account/account.php">Mon compte </a>
        <a href="../logout.php">Se déconnecter </a>
        <?php } ?>
        
    </nav>
</head>