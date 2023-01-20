<?php

class users extends DbObject {
    public $id_user;
	public $id_account;
	public $nom;
	public $prenom;
	public $telephone;
	public $email;
	public $password;
	public $role;
	public $created_at;
}
?>

<?php
class bankAccount extends DbObject {
	public $id;
	public $id_user;
	public $somme_compte_cheque;
	public $somme_livret_a;
	public $somme_zebitcoin;
	public $somme_bitcoin;
	public $somme_eth;
	public $euro;
}
?>
<?php
class retrait extends DbObject {
	public $id_retrait;
	public $id_account;
	public $montant;
	public $created_at;
}
