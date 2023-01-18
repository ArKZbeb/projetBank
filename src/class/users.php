<?php

class User extends DbObject {
    public $id_user;
	public $id_account;
	public $nom;
	public $prenom;
	public $telephone;
	public $email;
	public $password;
	public $role;
	public $created_at;
?>

<?php
class bankAccount extends DbObject {
	public $id_account;
	public $id_user;
	public $nom;
	public $prenom;
	public $telephone;
	public $email;
	public $password;
	public $role;
	public $created_at;
?>