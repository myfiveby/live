<?php
if (!session_id() || session_id()=="") {
	session_start();
}
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

// jeditable by default sends two parameters: "id" and "value" - id is the id of the element being sent, value is its new value.
// firstly clean id to extract userid
if ( isset($_POST['id']) && $_POST['id']) {
	$userid = substr($_POST['id'],7);
	if ($userid ==  $_SESSION['id']) {
		if (strlen($_POST['value'])>200) {
			$_POST['value'] = substr($_POST['value'],0,200);
		}
		$_POST['value'] = addslashes($_POST['value']); 								//name_user = '$_POST[perso_name]' ,
		// $sqlstr = "UPDATE users SET bio = '" + $_POST['value'] + "' WHERE id_user = '" + $_SESSION['id'] + "' ";
		$sqlstr = "UPDATE users SET bio = '" . $_POST['value'] . "' WHERE id_user = '" . $_SESSION['id'] . "' ";
		Requete ($sqlstr, $connexion);
		print_r(stripslashes($_POST['value']));
	}
}
  ?>