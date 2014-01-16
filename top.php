<?php 
if (!session_id() || session_id()==""){
	session_start();
}
 

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/functions_myfiveby.php');
require ('fonction/mostrar_panel.php');




$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$query_friends = mysqli_query($connexion,"SELECT id_to_follow FROM follow WHERE  id_user_f='$_SESSION[id]' "  );


$lista_amigos=Array('0');
while($lista_amigos_view = mysqli_fetch_array($query_friends)){


		$lista_amigos[] = $lista_amigos_view['id_to_follow'];

}



//require ('user.class.php');

//$user  = new usuario();
//$user->conectado($_SESSION['id_u']);


?>



<div style="clear:both;"></div>

<div style="clear:both;background:#fff;"  id ="escenario">