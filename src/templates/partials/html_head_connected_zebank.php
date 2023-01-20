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
        <a href="../connexion.php">SE CONNECTER </a>
        <a href="../inscription.php">S'INSCRIRE </a>
    <?php } ?>

    
        <?php if(isset($_SESSION['connected'])){ ?>

        <?php
        if($user['role'] == 'admin'){?>
            <a href="../admin.php">ADMIN </a>
        <?php
        }else{
            ?>
            <a href="../accueil_compte.php">MON COMPTE </a>
        <?php
        }
        ?>
        <a href="../logout.php">SE DECONNECTER </a>
        <?php } ?>
        
    </nav>
</head>
