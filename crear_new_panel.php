	<?php 
if (!session_id() || session_id()==""){
	session_start();
}

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

if ($_SESSION['id']==$_POST['izt']){ 

  	$query_new_panel = mysqli_query($connexion,"SELECT * FROM users WHERE id_user = '$_POST[izt]'"  );
  	
		$result_new_panel = mysqli_fetch_array($query_new_panel);		
		$_POST['id_user_new_panel'] = $result_new_panel['id_user'];
 
			$query_panel = mysqli_query($connexion,"INSERT INTO myfive_panels (f_creado,autor,title, tipo) VALUES (NOW(),'$_POST[id_user_new_panel]','Personal panel','0')");
			$id_panel= mysqli_insert_id($connexion);
			
			
			
$comprueba_exists_tit = Requete ("SELECT id_myf,f_creado,title  FROM myfive_panels   WHERE id_myf = '$id_panel' " , $connexion);
 
$datos_tit = mysqli_fetch_array($comprueba_exists_tit);
$id_myf = $datos_tit['id_myf']; 
$f_creado = $datos_tit['f_creado'];

$tipo = "1";
$tiempo_UNIX=time();
$d_unix  = strtotime($f_creado);

$date_url =  $d_unix.$id_myf.$tipo;




	 $resultat_update_tit =  Requete  ("UPDATE myfive_panels
								SET 
								url = '$date_url' 
								WHERE id_myf = '$id_myf' ", $connexion);
  

			
			
			
			
			for ($i = 1; $i <= 5; $i++) {
			$query_frase = mysqli_query($connexion,"INSERT INTO myfive_content (f_creado,frase_mf, autor_mf,id_myf,tipo) VALUES (NOW(),'','$_POST[id_user_new_panel]','$id_panel','0')");
			
      }
       
 
 
?>
 
<script >
show_panel_main('<?php echo $id_panel; ?>','1'); 
</script>
<?php } else {

echo "ERROR!";

}?>