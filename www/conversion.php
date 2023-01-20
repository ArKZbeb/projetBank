


<?php

require_once __DIR__ . '/../src/init.php';
$page_title = 'account';



?>

<body>
        <head>
            <link rel="stylesheet" href="style.css">
        </head>
        <div>
            <h1>Conversion</h1>
        </div>
        <!-- faire un menu d'eroulant avec differente monney-->
        <form>
            <label for="monney">Choisissez votre monnaie</label>
            <select name="monney" id="monney">
                <option value="cheque">Compte Cheque</option>
                <option value="livreta">Livret A</option>
                <option value="zebi">Zebitcoin</option>
                <option value="bitcoin">Bitcoin</option>
                <option value="ETH">ETH</option>
            </select>
            <label for="montant">Montant</label>
            <input type="number" name="montant" id="montant">
            <label for="monney2">Choisissez votre monnaie</label>
            <select name="monney2" id="monney2">
                <option value="cheque">Compte Cheque</option>
                <option value="livreta">Livret A</option>
                <option value="zebi">Zebitcoin</option>
                <option value="bitcoin">Bitcoin</option>
                <option value="ETH">ETH</option>
            </select>
            <button type="submit">Convertir</button>
        </form>
        <?php 


        if(isset($_POST['monney']) && isset($_POST['monney2']) && isset($_POST['montant'])){
            $monney = $_POST['monney'];
            $monney2 = $_POST['monney2'];
            $montant = $_POST['montant'];
            //si le bouton est appuyer et que les 3 champs sont remplis alors on fait la conversion et on affiche le resultat
            if($monney == 'cheque' && $monney2 == 'livreta'){
                $montant = $montant * 0.75;
            }
            if($monney == 'cheque' && $monney2 == 'zebi'){
                $montant = $montant * 0.5;
            }
            if($monney == 'cheque' && $monney2 == 'bitcoin'){
                $montant = $montant * 0.0003;
            }
            if($monney == 'cheque' && $monney2 == 'ETH'){
                $montant = $montant * 0.0001;
            }
            if($monney == 'livreta' && $monney2 == 'cheque'){
                $montant = $montant * 1.33;
            }
            if($monney == 'livreta' && $monney2 == 'zebi'){
                $montant = $montant * 0.67;
            }
            if($monney == 'livreta' && $monney2 == 'bitcoin'){
                $montant = $montant * 0.0004;
            }
            if($monney == 'livreta' && $monney2 == 'ETH'){
                $montant = $montant * 0.0001;
            }
            if($monney == 'zebi' && $monney2 == 'cheque'){
                $montant = $montant * 2;
            }
            if($monney == 'zebi' && $monney2 == 'livreta'){
                $montant = $montant * 1.5;
            }
            if($monney == 'zebi' && $monney2 == 'bitcoin'){
                $montant = $montant * 0.0006;
            }
            if($monney == 'zebi' && $monney2 == 'ETH'){
                $montant = $montant * 0.0002;
            }
            if($monney == 'bitcoin' && $monney2 == 'cheque'){
                $montant = $montant * 3333.33;
            }
            if($monney == 'bitcoin' && $monney2 == 'livreta'){
                $montant = $montant * 2500;
            }
            if($monney == 'bitcoin' && $monney2 == 'zebi'){
                $montant = $montant * 1666.67;
            }
            if($monney == 'bitcoin' && $monney2 == 'ETH'){
                $montant = $montant * 0.33;
            }
            if($monney == 'ETH' && $monney2 == 'cheque'){
                $montant = $montant * 10000;
            }
            if($monney == 'ETH' && $monney2 == 'livreta'){
                $montant = $montant * 7500;
            }
            if($monney == 'ETH' && $monney2 == 'zebi'){
                $montant = $montant * 5000;
            }
            if($monney == 'ETH' && $monney2 == 'bitcoin'){
                $montant = $montant * 3;
            }
            echo $montant;
        }        
        echo $monney;
        echo $monney2;
        echo $montant;
        ?>

        <?php require_once __DIR__ . '/../src/templates/partials/html_footer_zebank.php'; ?>
    </body>
</html>