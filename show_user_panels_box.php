<?php if (!session_id() || session_id()==""){
	session_start();
}
$extra_clause="";
?>

	<script type="text/javascript">
	$(function() {
		$( ".draggable_post" ).draggable({ revert: "invalid",containment: "#escenario" });
		
		$( ".thread" ).droppable({
			activeClass: "",
			hoverClass: "",
			drop: function( event, ui ) {
				$( this )
					.addClass( "" )
					.find( "" )
						.append( "Dropped!" );
			}
		});
	});
	</script>
<?php
 

require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ('fonction/fonction_requete.php'); 
require ('fonction/time_ago.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);

 
$comprueba_exists_panels = Requete ("SELECT title, id_myf, f_creado,loves,privacy FROM myfive_panels  WHERE autor  = '$_POST[id_u]'    ORDER BY id_myf DESC" , $connexion);

$num_panels=mysqli_num_rows($comprueba_exists_panels); 			
// $id_thread_tot = $id_thread;
$id_thread_tot = $num_panels;

 
?>
<div id="scrolluserpanels<?php echo $_POST['id_u'];?>"  style="position: relative; left:0px;float:left;width:310px;height:224px;">		
<!--<ul id="lista_panels_left" style="position: relative; left:0px;float:left;margin:0;padding:0px;width:95%;">
-->
<?php 
if ($num_panels == 0){


if ($_POST['id_u'] == $_SESSION['id']){


echo '<div id="item_post_user_'.$_SESSION['id'].'" style="background:#ffffff;border-bottom:1px solid #ddd;padding-top:0px;margin-top:5px;">
<div style="position:relative; width:290px; float:left;left:0px;padding-top:5px;text-align:left;display:inline-block;" class="texto_10 gris">

<a href="javascript:void_()" onclick="crear_a_panel_post(\''.$_SESSION['id'].'\');" class="texto_13 negro" style="clear:both;">My First Post</a>

 <br>   <div class="texto_10 gris" style=" width:180px;display:inline-block; letter-spacing:0px;padding:0px;padding-top:0px; ">&#9638; Just now</div>

  

<div class=" negro  " style="width:30px;display:inline-block;height:19px;float:right;right:0px;text-align:right;"><img src="img/ico_love.png" align="absmiddle">0  &nbsp;&nbsp;</div> 

 </div>	
	 				 

<div style="position:relative; width:80px; float:right;right:0px;padding-top:5px;text-align:left;display:inline-block;" class="texto_10 gris box_tools_conv">

 </div>

<div style="width:100%;clear:both;margin-top:5px;height:5px;border-bottom:1px solid #e8e8e8;"> &nbsp;</div>

	</div>';
/*	
echo "<div style=\"width:100%;padding:10px;text-align:center;\" class=\"texto_12 gris\">

<span class=\"texto_14 \">What's on your mind?</span>

<br>

<br> To create your first post, click \"create a new post\" in the top bar.</div>";*/

} else {
	
	
	
$consulta_user_datoss = Requete ("SELECT id_user,name_user   FROM users  WHERE id_user  = '$_POST[id_u]'  $extra_clause " , $connexion);

$datos_users = mysqli_fetch_array($consulta_user_datoss) ;

$name_user = ($datos_users['name_user']);


	
echo "<div style=\"width:100%;padding:10px;text-align:center;\" class=\"texto_12 gris\">$name_user has not yet created a post</div>";

}
	
	
	
	
} else {
while ($datos_panels = mysqli_fetch_array($comprueba_exists_panels) ){ 
		$title =  $datos_panels['title'] ;
		$id_post =  $datos_panels['id_myf'] ; 
		$loves =  $datos_panels['loves'] ;
		$f_creado =  $datos_panels['f_creado'] ;
		$privacy_post =  $datos_panels['privacy'] ;
		
	
  
if (($privacy_post == 0) OR ( $privacy_post == 1  AND $_POST['id_u'] == $_SESSION['id'])){
 	                             
$f_creado = time_ago($f_creado);

 
 //if (!empty($title)){ 
$consulta_convers_post = Requete ("SELECT name_th, rel_threads.id_th,threads.id_th,id_panel  FROM rel_threads LEFT JOIN threads ON rel_threads.id_th = threads.id_th  WHERE id_panel  = '$id_post'   $extra_clause " , $connexion);
$num_convers_post = mysqli_num_rows($consulta_convers_post);
 
 
 
 
          if ($title!==""){
 
?>
 <div id="item_post_user_<?php echo $id_post; ?>" style="background:#ffffff;border-bottom:1px solid #ddd;padding-top:0px;margin-top:5px;">

				  				 
<div style="position:relative; width:290px; float:left;left:0px;padding-top:5px;text-align:left;display:inline-block;"  class="texto_10 gris">

<a  href="javascript:void_()" onclick="show_panel_main('<?php echo $id_post; ?>');"  class="texto_13 negro" style="clear:both;"><?php echo $title; ?></a>
 <br>   <div class="texto_10 gris" style=" width:170px;display:inline-block; letter-spacing:0px;padding:0px;padding-top:0px; " > &#9638;  <?php echo  $f_creado; ?> </div>
  
<div  class=" negro  "   style="width:30px;display:inline-block;height:19px;float:right;right:0px;text-align:right;"><img src="img/ico_love.png" align="absmiddle"><?php echo $loves; ?>  &nbsp;&nbsp;</div> 
</div>	
 
 <!--		 				 
<div  style="position:relative; width:80px; float:right;right:0px;padding-top:5px;text-align:left;display:inline-block;"  class="texto_10 gris box_tools_conv">
	-->																																	<!--								 
<div  class=" negro  "   style="display:inline-block;height:19px;"><a href="#" class="popover" onclick="show_others_convers('<?php echo $id_post; ?>','<?php echo $id_thread; ?>')" title="Other's conversations "><img src="img/ico_conversations.png" align="absmiddle"> <?php echo $num_convers_post; ?></a></div>
     -->    			
	<!--		 
							  		      
<?php if ($_SESSION['id'] == $_POST['id_u'] ){  ?>
   <div style="position:relative; width:30px; float:right;right:5px;padding-top:5px;text-align:left; "  >
<div class=" button small red" id="button_borrar_<?php echo $id_myf;?>" onclick="borrar_panel('<?php echo $_SESSION['id'];?>','<?php echo $id_post;?>')"><img src="img/ico_trash.png"></div>     </div>
<?php } ?>
		-->	
			
			
<!--					 
</div>-->
<div style="width:100%;clear:both;margin-top:5px;height:5px;border-bottom:1px solid #e8e8e8;"> &nbsp;</div>
	</div> 
<?php

//} 
}  // end while
 }  // end privacy
 }  // end while
 } // if no posts
?>
<!--</ul>-->
</div>
 <script type="text/javascript">$('#scrolluserpanels<?php echo $_POST['id_u'];?>').sbscroller('refresh'); </script> 
