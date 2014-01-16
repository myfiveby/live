
<script type="text/javascript">
$().ready(function(){
		$('#box_rel_conversations<?php echo $_POST[id_post]; ?>').lionbars();
 
	}); // end ready
	
	</script>
<?php

if (!function_exists('Requete')){
require ('../conf/sangchaud.php');
require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
 
 //AND threads.id_th != '$_POST[id_thread]'
}																									 
$consulta_convers_post = Requete ("SELECT name_th, rel_threads.id_th,threads.id_th,id_panel  FROM rel_threads LEFT JOIN threads ON rel_threads.id_th = threads.id_th  WHERE id_panel  = '$_POST[id_post]'  $extra_clause " , $connexion);

			$lista_convers =' ';

$num_convers_post = mysqli_num_rows($consulta_convers_post);
if ($num_convers_post>0){
			
			
			$lista_convers .='
			 
			<div class="caja_frases box_rel_conversations" style="padding:4px;width:300px;height:195px;position:absolute;z-index:60000;" id="box_rel_conversations'.$_POST[id_post].'"><div  style=" height:30px;">This post is also part of: </div>
			
			
			
			
			';
			
			
			
			
while ($datos_convers_post= mysqli_fetch_array($consulta_convers_post)){


$lista_convers .='<li style="width:93%;cursor:pointer;padding:5px;border-bottom:1px solid #ddd;" onclick="show_thread(\''.$datos_convers_post['id_th'].'\')" ><img src="img/ico_conversations_hover.png" align="absmiddle"> '.$datos_convers_post['name_th'].'</li>';

 

}
  
 $lista_convers .="</div >";


 }
 echo $lista_convers;
 
 ?>