<?phpif (!session_id() || session_id()==""){
	session_start();
}
$extra_clause="";
if (!function_exists('Requete')){
require ('../conf/sangchaud.php');
require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php'); 
require ('../fonction/time_ago.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
 
}
 

 ?>    
<script type="text/javascript">		$('#list_panels_th<?php echo $id_thread; ?>').sbscroller('refresh'); </script>
     	<script type="text/javascript">
$().ready(function(){
		 

 //$(".item_post_on_convers").mouseover(function(){$(".bot_delete_from_conv", this).fadeIn(500);}).mouseout(function(){$(".bot_delete_from_conv", this).fadeOut(200);});

	}); // end ready
	
	 
			 function show_others_convers(panel,thread) {
			 
			    	$(".box_rel_conversations").hide();	 
				  var coord_now = getMousePosition(); 
			  		
$.ajax({
   data:  { "id_post":panel,"id_thread":thread}, 
   url:   'fonction/show_others_conversations.php',
   type:  'post',
   beforeSend: function () {
   
   },
   error: function(response) { alert(response + " error!"); },
   success:  function (response) {              
   
   $("#escenario").prepend(response);
    
   
   
     $("#box_rel_conversations"+panel).topZIndex(); 
     $("#box_rel_conversations"+panel).css("left",coord_now[0]+10);
		 $("#box_rel_conversations"+panel).css("top",coord_now[1]-50);
		 $("#box_rel_conversations"+panel).css("height","140px");
 
    
    
    
   }  
  }); // end ajax  



			  
			 }
			 
			 
			 
			 
			 
				function getMousePosition(e) {
 
    _x = event.clientX + document.body.scrollLeft;
    _y = event.clientY + document.body.scrollTop;
 

posX=_x;
posY=_y;

var coords = new Array();

coords[0]=posX;
coords[1]=posY;


  return coords;
}
</script>



 
	
	
	
<?php
$clause_where_list="f_rel DESC";
$cont_p_th=0;
$consulta_thread_panel_list =  Requete ("SELECT *  FROM rel_threads LEFT JOIN myfive_panels ON myfive_panels.id_myf = rel_threads.id_panel  WHERE rel_threads.id_th  = '$_POST[id_thread]' AND myfive_panels.privacy = '0' ORDER BY $clause_where_list  " , $connexion);
  
 while($datos_consulta_thread_panel_list = mysqli_fetch_array($consulta_thread_panel_list)){
 
        $id_thread = $datos_consulta_thread_panel_list['id_th']; 
        //$id_thread = $datos_consulta_thread_panel_list['id_panel']; 
        
        
        $id_myf = $datos_consulta_thread_panel_list['id_myf'];
$titulo_panel = stripslashes($datos_consulta_thread_panel_list['title']);

$f_creado = $datos_consulta_thread_panel_list['f_creado'];

     
$autor = $datos_consulta_thread_panel_list['autor'];
     
$loves = $datos_consulta_thread_panel_list['loves'];
$favs = $datos_consulta_thread_panel_list['favs'];

$f_creado = time_ago($f_creado);



$consulta_user_datos = Requete ("SELECT *  FROM users  WHERE id_user  = '$autor'  $extra_clause " , $connexion);
$datos_user = mysqli_fetch_array($consulta_user_datos) ;
$id_user = $datos_user['id_user'];
$name_user = $datos_user['name_user'];
$fb_id = $datos_user['fb_id'];

$fb_id_user = $fb_id;
$title =  $titulo_panel; 



$comprueba_exists_frasesfrase_mft = Requete ("SELECT frase_mf FROM myfive_content   WHERE   id_myf = '$id_myf'   " , $connexion);
  
 $datos_frasesfrase_mft = mysqli_fetch_array($comprueba_exists_frasesfrase_mft);
  
 $caption_post =  strip_tags($datos_frasesfrase_mft['frase_mf']);
 
 $caption_post = substr($caption_post,0,140);
 
 $caption_post = $caption_post." ...";
 
 
 

 /*        
     $caption_post = stripslashes($datos_consulta_thread_panel['description_th']);
      $description_teaser = substr($description_complete,0,110);
        
         
			
  $description_complete = str_replace("\n","<br>",$description_complete);	 
  $description_teaser = str_replace("\n","<br>",$description_teaser);	 	 
  $description_teaser = str_replace("<br>","",$description_teaser);	 
	
	
	if ($description_teaser !=="" ){  $description_teaser = $description_teaser."..."; }
                // AND threads.id_th != '$_POST[id_thread]'*/
 
 
 
 
 
$consulta_convers_post = Requete ("SELECT name_th, rel_threads.id_th,threads.id_th,id_panel  FROM rel_threads LEFT JOIN threads ON rel_threads.id_th = threads.id_th  WHERE id_panel  = '$id_myf'   $extra_clause " , $connexion);
$num_convers_post = mysqli_num_rows($consulta_convers_post);
 if (!empty($title)){
   ?>
     
 <div id="box_convers_this_post<?php echo $id_myf; ?>" style="position:absolute;display:block;" >  <?php // echo $lista_convers; ?></div>
    
<div id="tit_col_<?php echo $id_myf; ?>" style="width:375px;padding:4px;padding-top:5px;border-bottom:1px solid #eee;" class="item_post_on_convers item_list_box_conversation">     
		 																											 
<div id="image_user"  style="float:left; padding:0px; padding-left:0px;width:45px;height:70px;display:inline-block;cursor:pointer;"  ><div onclick="show_user('<?php echo $fb_id_user; ?>');" ><img src="https://graph.facebook.com/<?php echo $fb_id_user;?>/picture" width="40" align="absmiddle" alt="<?php echo $name_user; ?>"  style="-webkit-border-radius: .5em;-moz-border-radius: .5em;border-radius: .5em;border:0px;"></div>

<?php if ( isset($_SESSION['id'] ) AND ($_SESSION['fb_id'] == $fb_id) ){  ?>
<a href="javascript:void_()"; onclick="delete_from_thread('<?php echo $id_thread; ?>','<?php echo $id_myf; ?>','<?php echo $_SESSION['id']; ?>');" style="margin-top:5px;display:block;height:18px;"  title="Delete" class="bot_delete_from_conv" ><div style="left:0;margin-top:5px;padding:2px;">x</div></a>
<?php } ?>
</div>

 				 
<div style="position:relative; width:280px; float:left;left:0px;padding-top:0px;text-align:left;"  class="texto_10 gris">


<div><a  href="javascript:void_()" onclick="show_panel_main('<?php echo $id_myf; ?>');"  class="texto_14 negro"><?php echo $title; ?> </a>  </div>


<div class="texto_11 gris"> <?php echo $caption_post;?> </div>


 	           
  <div class="texto_10 negro" style="float:left;margin-left:0px;width:280px;display:inline-block;letter-spacing:0px;padding:0px;padding-top:0px; " > by<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id_user; ?>');"   ><?php echo " <span class=\"texto_10 azul\">".$name_user."</span> </a>  <span class=\"texto_10 gris\">".$f_creado; ?></span></div>
  
 </div>	
 
		 				 
<div  style="position:relative; width:40px; float:right;margin-right:2px;padding-top:0px;text-align:right;"  class="texto_10 gris box_tools_conv"> 
<div  class=" negro  "   style="display:inline-block;height:19px;"><img src="img/ico_love.png" align="absmiddle"> <?php echo $loves; ?>  &nbsp;&nbsp;</div> 
 </div>



 
 
<div style="width:390px;clear:both;margin-top:5px;margin-bottom:10px; "> </div><script type="text/javascript">		$('#list_panels_th<?php echo $id_thread; ?>').sbscroller('refresh'); </script>

					</div>

     
     
     <?php    
        $cont_p_th++;
 }
}
 
?>
 