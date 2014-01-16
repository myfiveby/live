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

$extra_clause="";






$comprueba_exists_tit = Requete ("SELECT id_myf, title,privacy, autor FROM myfive_panels  WHERE id_myf  = '$_POST[p]'  $extra_clause " , $connexion);
$cont = 1;  

if (($comprueba_exists_tit) && mysqli_num_rows($comprueba_exists_tit) !==0 ){ 
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$id_panel = $datos_tit['id_myf'];
$privado = $datos_tit['privacy'];
$autor = $datos_tit['autor'];
$titulo_panel = addslashes($datos_tit['title']);


if ($privado == 0 OR $autor == $_SESSION['id']  ){
    
    show_panel($id_panel) ;
}

}   
    ?>