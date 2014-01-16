<?php 
if (!session_id() || session_id()==""){
	session_start();
}

 require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);


if ($_SESSION['id']==$_POST['autor']){ 

 
$del_panel_th = mysqli_query($connexion,"DELETE  FROM rel_threads  WHERE id_th = '$_POST[id_thread]' AND  id_panel = '$_POST[id_panel]'"  );


}
 ?>