<!-- faire une page avec des selects pour choisir de quelle compte on va faire un virement-->
<!-- faire un input pour choisir le montant du virement-->
<!-- faire un bouton pour faire le virement-->

<?php
require_once __DIR__ . '/../src/init.php';
$page_title = 'Virement';

// class bankAccount extends DbObject {
// 	public $id;
// 	public $id_user;
// 	public $somme_compte_cheque;
// 	public $somme_livret_a;
// 	public $somme_zebitcoin;
// 	public $somme_bitcoin;
// 	public $somme_eth;
// 	public $euro;
// }

$id_user = $_SESSION['id'];
        $req = $db->prepare('SELECT * FROM bankaccount WHERE id_user = ?');
        $req->execute([$id_user]);
        $bankaccounts2 = $req->fetchAll();
        foreach ($bankaccounts2 as $bankaccount) {   
            echo '<li>Compte Euro  : ' . $bankaccount['compte_euro'] . '€</li>';
            echo '<li>Compte Chèque : ' . $bankaccount['somme_compte_cheque'] . '€</li>';
            echo '<li>Compte livretA : ' . $bankaccount['somme_compte_livretA'] . '€</li>';
            echo '<li>Compte Zebitcoin : ' . $bankaccount['somme_compte_zebitcoin'] . '€</li>';
            echo '<li>Compte Bitcoin : ' . $bankaccount['somme_compte_bitcoin'] . '€</li>';
            echo '<li>Compte ETH : ' . $bankaccount['somme_compte_eth'] . '€</li>';
        }

if (isset($_POST['convert'])) {
    $compte = $_POST['compte'];
    $compte2 = $_POST['compte2'];
    $somme = $_POST['somme'];
    $req = $db->prepare('SELECT * FROM bankaccount WHERE id_user = ?');
    $req->execute([$id_user]);
    $bankaccounts = $req->fetchAll();
    foreach ($bankaccounts as $bankaccount) {

           
            if ($compte =='euro' && $compte2 == 'cheque2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['compte_euro'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET compte_euro = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_cheque'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_cheque = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);
            }
            if ($compte =='euro' && $compte2 == 'livreta2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['compte_euro'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET compte_euro = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_livretA'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_livretA = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='euro' && $compte2 == 'zebi2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['compte_euro'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET compte_euro = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_zebitcoin'];

                $don = ($receiverMoney + $somme)*3000;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_zebitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='euro' && $compte2 == 'Bitcoin2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['compte_euro'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET compte_euro = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_bitcoin'];

                $don = ($receiverMoney + $somme)*19701;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='euro' && $compte2 == 'eth2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['compte_euro'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET compte_euro = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_eth'];

                $don = ($receiverMoney + $somme)*1500;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_eth = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='cheque' && $compte2 == 'livreta2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_cheque'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_cheque = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_livretA'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_livretA = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='cheque' && $compte2 == 'zebi2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_cheque'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_cheque = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_zebitcoin'];

                $don = ($receiverMoney + $somme)*3000;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_zebitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='cheque' && $compte2 == 'Bitcoin2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_cheque'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_cheque = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_bitcoin'];

                $don = ($receiverMoney + $somme)*19701;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='cheque' && $compte2 == 'eth2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_cheque'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_cheque = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_eth'];

                $don = ($receiverMoney + $somme)*1500;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_eth = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='livreta' && $compte2 == 'cheque2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_livretA'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_livretA = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_cheque'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_cheque = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='livreta' && $compte2 == 'zebi2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_livretA'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_livretA = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_zebitcoin'];

                $don = ($receiverMoney + $somme)*3000;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_zebitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='livreta' && $compte2 == 'Bitcoin2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_livretA'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_livretA = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_bitcoin'];

                $don = ($receiverMoney + $somme)*19701;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='livreta' && $compte2 == 'eth2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_livretA'];
                

                $don = $userMoney - $somme;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_livretA = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_eth'];

                $don = ($receiverMoney + $somme)*1500;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_eth = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='zebi' && $compte2 == 'cheque2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_zebitcoin'];
                

                $don = ($userMoney - $somme)/3000;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_zebitcoin = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_cheque'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_cheque = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='zebi' && $compte2 == 'livreta2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_zebitcoin'];
                

                $don = ($userMoney - $somme)/3000;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_zebitcoin = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_livretA'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_livretA = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='zebi' && $compte2 == 'Bitcoin2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_zebitcoin'];
                

                $don = ($userMoney - $somme)/3000;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_zebitcoin = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_bitcoin'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='zebi' && $compte2 == 'eth2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_zebitcoin'];
                

                $don = ($userMoney - $somme)/3000;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_zebitcoin = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_eth'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_eth = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='Bitcoin' && $compte2 == 'cheque2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_bitcoin'];
                

                $don = ($userMoney - $somme)/1500;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_cheque'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_cheque = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='Bitcoin' && $compte2 == 'livreta2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_bitcoin'];
                

                $don = ($userMoney - $somme)/1500;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_livretA'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_livretA = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='Bitcoin' && $compte2 == 'zebi2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_bitcoin'];
                

                $don = ($userMoney - $somme)/1500;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_zebitcoin'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_zebitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='Bitcoin' && $compte2 == 'Bitcoin2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_bitcoin'];
                

                $don = ($userMoney - $somme)/1500;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_bitcoin'];

                $don = $receiverMoney;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='Bitcoin' && $compte2 == 'eth2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_bitcoin'];
                

                $don = ($userMoney - $somme)/1500;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_eth'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_eth = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='eth' && $compte2 == 'cheque2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_eth'];
                

                $don = ($userMoney - $somme)/1500;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_eth = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_cheque'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_cheque = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='eth' && $compte2 == 'livreta2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_eth'];
                

                $don = ($userMoney - $somme)/1500;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_eth = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_livretA'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_livretA = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='eth' && $compte2 == 'zebi2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_eth'];
                

                $don = ($userMoney - $somme)/1500;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_eth = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_zebitcoin'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_zebitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }
            if ($compte =='eth' && $compte2 == 'Bitcoin2') {
                echo 'ok';
                //compte donneur
                $req =$db -> prepare('SELECT * FROM bankaccount WHERE id_user = ?');
                $req->execute([$id_user]);
                $bankAccount = $req->fetch();
                $userMoney = $bankAccount['somme_compte_eth'];
                

                $don = ($userMoney - $somme)/1500;

                $var = $db-> prepare('UPDATE bankaccount SET somme_compte_eth = ? WHERE id_user = ?');
                $var->execute([$don, $id_user]);

                // compte receiver

                $receiverMoney = $bankAccount['somme_compte_bitcoin'];

                $don = $receiverMoney + $somme;

                $var2 = $db-> prepare('UPDATE bankaccount SET somme_compte_bitcoin = ? WHERE id_user = ?');
                $var2 -> execute([ $don, $id_user]);

            }

        }
    
    




}


?>

<form method="POST">
    <select name="compte">
        <option value="euro">Compte Euro</option>
        <option value="cheque">Compte Chèque</option>
        <option value="livreta">Livret A</option>
        <option value="zebi">Compte Zebitcoin</option>
        <option value="Bitcoin">Compte Bitcoin</option>
        <option value="eth">Compte Ethereum</option>
    </select>

    <select name="compte2">
        <option value="cheque2">Compte Chèque</option>
        <option value="livreta2">Livret A</option>
        <option value="zebi2">Compte Zebitcoin</option>
        <option value="Bitcoin2">Compte Bitcoin</option>
        <option value="eth2">Compte Ethereum</option>
    </select>

    <input type="text" name="somme" placeholder="somme">
    <button name="convert" type="submit">Convertion</button>
</form>


