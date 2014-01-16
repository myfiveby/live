<?phpfunction show_obj($objeto){if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php'); 
 $error_sh= 0;
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
$tipo = substr($objeto,-1,1);
 if ($tipo !=="1" AND $tipo !=="3" )$tipo=2;
  
switch ($tipo){
 
case '1': //panel
require ('fonction/mostrar_panel.php');
$extra_clause="";
$comprueba_exists_tit = Requete ("SELECT id_myf, title FROM myfive_panels  WHERE url  = '$objeto'  $extra_clause " , $connexion);
$cont = 1;  
if (mysqli_num_rows($comprueba_exists_tit) !==0 ){ 
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$id_panel = $datos_tit['id_myf'];
$titulo_panel = $datos_tit['title'];

?>
<script>
show_panel_main_offline('<?php echo $id_panel; ?>');
</script>
<?php 


}   else { $error_sh= 1;}
break;


case '2': // user 
//require ('fonction/function_show_user.php');
$comprueba_exists_tit = Requete ("SELECT id_user,fb_id FROM users  WHERE url  = '$objeto'  $extra_clause " , $connexion);
$cont = 1;
 
if (mysqli_num_rows($comprueba_exists_tit) !==0 ){
    
    
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$id_user = $datos_tit['id_user'];
$id_userfb_id = $datos_tit['fb_id'];
?>
<script>
show_user_offline('<?php echo $id_userfb_id; ?>');
</script>
<?php 

 

} else { $error_sh= 1;}
break;

case '3'://thread


require ('fonction/mostrar_panel.php');

$extra_clause="";
$comprueba_exists_tit = Requete ("SELECT id_th, name_th FROM threads  WHERE url_th  = '$objeto'  $extra_clause " , $connexion);
$cont = 1;  

if (mysqli_num_rows($comprueba_exists_tit) !==0 ){ 
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$id_panel = $datos_tit['id_th'];
$titulo_panel = $datos_tit['name_th'];

?>
<script> show_thread_offline('<?php echo $id_panel; ?>');</script>
<?php 


}  else { $error_sh= 1;}
break;

}


if ( $error_sh >= 1){

?>

<script>
 

show_panel_main_offline('122');

</script>

<?php 
	
	
	
}
 ?>


<?php 
} // end function
?>