<?php
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$id_thread = $_POST['id_thread'];
$id_autor= $_POST['id_user'];

 
 if ( $_SESSION['id'] == $id_autor){ 
 
$del_thread = mysqli_query($connexion,"DELETE  FROM threads  WHERE  id_th= '$id_thread' AND autor_th = '$id_autor'"  );
 
$del_rel_thread = mysqli_query($connexion,"DELETE  FROM  rel_threads  WHERE  id_th= '$id_thread' "  );

} else {
echo "error";
}

 ?>