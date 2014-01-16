<?php 

if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/functions_myfiveby.php');

require ('fonction/mostrar_thread.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$extra_clause="";
$comprueba_exists_tit = Requete ("SELECT id_th, name_th FROM threads  WHERE id_th  = '$_POST[p]'  $extra_clause " , $connexion);
$cont = 1;  

if (mysqli_num_rows($comprueba_exists_tit) !==0 ){ 
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$id_thread = $datos_tit['id_th'];
$titulo_thread = $datos_tit['name_th'];

$query2 = Requete("INSERT INTO history (id_user, object, id_object, text_object, date_view ) VALUES ( '$_SESSION[id]', 't', '$id_thread', '$titulo_thread',NOW() )" , $connexion);



show_thread($id_thread) ;



}   
    ?>