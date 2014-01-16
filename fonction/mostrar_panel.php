<?php   
function show_panel($id_panel) {
if (!session_id() || session_id()==""){
	session_start();
}

require ('conf/sangchaud.php');
require ('fonction/time_ago.php');

 $connexion = Connexion ($login_base, $password_base, $base, $host_base);
 


 	$query_id_fixed = Requete("SELECT id_panel_fix FROM  fix_panel  WHERE id_panel_fix='".$id_panel."' AND autor_fix ='".$_SESSION['id']."' ",$connexion);
 	if (mysqli_num_rows($query_id_fixed)>=1){ $fixed = 1;  }else{ $fixed = 0;}






$zindex = $id_panel + 100;


 
	$query_new_panel_imf = mysqli_query($connexion,"SELECT id_myf,autor,tipo FROM  myfive_panels WHERE id_myf = '".$id_panel."'"  );
      	
      	
  		if (mysqli_num_rows($query_new_panel_imf) >0 ){
  	
    		$result_panel = mysqli_fetch_array($query_new_panel_imf);		
		$_POST['id_user'] = $result_panel['autor'];	
		$_POST['tipo_panel'] = $result_panel['tipo'];
 


$consulta_user_datos = Requete ("SELECT id_user,name_user,fb_id  FROM users  WHERE id_user  = '$_POST[id_user]'  $extra_clause " , $connexion);
$datos_user = mysqli_fetch_array($consulta_user_datos) ;
$id_user = $datos_user['id_user'];
$name_user = $datos_user['name_user'];
$fb_id_user = $datos_user['fb_id'];
 
 
 
    
    }
    
?>

	<!-- <script src="js/jquery.flip.min.js" type="text/javascript" language="javascript"></script> -->
	<script  type="text/javascript" language="javascript">
function largestZindex(element) {
    var allObjects = $(element);
    var allObjectsArray = $.makeArray(allObjects);
    var zIndexArray = [0];
    var largestZindex = 0;
    for (var i = 0; i < allObjectsArray.length; i++) {
          var zIndex = $(allObjectsArray[i]).css('z-index');
          zIndexArray.push(zIndex);
    }
    var largestZindex = Math.max.apply(Math, zIndexArray);
    return largestZindex;
};

	$(function() { 
		$( ".panel" ).draggable({  cursor: "move", stack:"div", scrollSensitivity:1,containment: "#escenario" , handle:".handle_panel", opacity: 1  }); 	}); 



		//$( "#box_frases_<?php echo $id_panel; ?>" ).resizable({ containment: 'document',alsoResize: '#box_content_panel_<?php echo $id_panel; ?>',minHeight: 480 });
		
		
		
var currentRotation=null;

function checkOrientAndLocation(){
	if(currentRotation != window.orientation){
		setOrientation();
	}
}

function setOrientation(){
	switch(window.orientation){
		case 0:
			orient = 'portrait';
			break;
		case 90:
			orient = 'landscape';
			break;
		case -90:
			orient = 'landscape';
			break;
      	}
	currentRotation = window.orientation;
	document.body.setAttribute("orient",orient);
	setTimeout(scrollTo,0,0,1);
}

$().ready(function(){
	setInterval(checkOrientAndLocation,1000);
	$('.panel').touch({
		animate: false,
		sticky: true,
		dragx: true,
		dragy: true,
		rotate: true,
		resort: true,
		scale: true
	});
	
	}); // end ready


function show_privacy_users_panel(post){

$("#box_panel_privacy_"+post).fadeIn(500);

}
	</script> 
	
	    <style>
	#draggable { width: 100px; height: 100px; padding: 0.5em; float: left; margin: 10px 10px 10px 0; }
	#droppable { width: 150px; height: 150px; padding: 0.5em; float: left; margin: 10px; }
	</style>
	<script type="text/javascript">
	$(function() {
	
	          

					
$("#panel_<?php echo $id_panel; ?>").click(function(){
//alert("click");
 
$(this).topZIndex();
});
 
 
	});
	
	
	
    function load_entire_panel(){
	
 $.ajax({ 
 data:  { "idp":'<?php echo $id_panel; ?>'  
	     },
 url:   'fonction/function_show_entire_panel.php',
 type:  'post',
 beforeSend: function (response) {
    
    $("#box_content_panel_<?php echo $id_panel; ?>").html("<div  class=\"texto_18 gris  \" style=\"width:100%;text-align:center;font-size:22px;padding-top:30px;text-shadow: #fff 1px 1px 1px;color:#ddd;font-family: 'Satisfy', cursive; \"><img src=\"img/loader.gif\"><br>Just a sec</div>"); 


		    },

 success:  function (response) {
    
    $("#box_content_panel_<?php echo $id_panel; ?>").html(response);
    
		 }

 });

    }// end load_entire_panel()
	
	
	</script>
 

<?php
require ('conf/sangchaud.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);


$comprueba_exists_tit = Requete ("SELECT id_myf,f_creado,title,loves,favs,url, autor,privacy,tipo, dofrom FROM myfive_panels  WHERE id_myf  = '".$id_panel."' " , $connexion);
 
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$id_myf = $datos_tit['id_myf'];
$titulo_panel = stripslashes($datos_tit['title']);

$f_creado = $datos_tit['f_creado'];
$url_panel = $datos_tit['url'];


$privado = $datos_tit['privacy'];
$tipo_panel = $datos_tit['tipo'];
$id_user = $datos_tit['autor'];

$loves = $datos_tit['loves'];
$favs = $datos_tit['favs'];

$_POST['from'] = $datos_tit['dofrom'];

$f_creado = time_ago($f_creado);





$titulo_panele = addslashes($datos_tit['title']);
 
 
$query2 = Requete("INSERT INTO history (id_user, object, id_object, text_object, date_view,fb_id_object,name_object) VALUES ( '".$_SESSION['id']."', 'p', '".$id_panel."', '".$titulo_panele."',NOW(),'".$fb_id_user."','".$name_user."' )" , $connexion);


 


?>
	
<div id="panel_<?php echo $id_panel; ?>" class="panel panel_drag "  style="width:450px;position:absolute;left:10%;top:5%;margin-bottom:40px;">
			  
			  
<div id="caja_frases" style="display:inline-block;float:left;padding:0px;  color:#2e4c68;background:#e8e8e8;border-top-left-radius: .3em;border-top-right-radius:  .3em;margin:0px;top:0;margin-top:-3px;border-bottom:0px solid #ccc;">

<!--</div><?php if($privado==1){ echo "style=\"background:#ffffff url('img/fons_panel.png') no-repeat top left\"";} ?>> -->
<div class="handle_panel" style="border-bottom:1px solid #ccc;height:28px;">

<div id="menu_caja_<?php echo $id_panel; ?>" style="display:inline-block;float:right;  padding:0px; cursor:move;">

<!--
<?php if ($fixed==1){ ?>
<a href="javascript:void_();" class=" button blue small bigrounded" id="button_fix_<?php echo $id_panel; ?>" onclick="unfix_panel('<?php echo $id_panel; ?>');"  title="Fix post"><b>o</b></a>
<?php } else { ?>
<a href="javascript:void_();" class=" button white small bigrounded" id="button_fix_<?php echo $id_panel; ?>" onclick="fix_panel('<?php echo $id_panel; ?>');"  title="Fix post"><b>o</b></a>							
<?php }





 ?>

-->

<style>


.button_top {
	display: inline-block;
	zoom: 1; /* zoom and *display = ie7 hack for display:inline-block */
	*display: inline;
	vertical-align: baseline;
	margin: 0;
	outline: none;
	cursor: pointer;
	text-align: center;
	text-decoration: none;
	font: 11px/100% Arial, Helvetica, sans-serif;
 
	text-shadow: 0 1px 1px rgba(0,0,0,.1);
 
	-webkit-box-shadow: 0 1px 1px rgba(232,232,232,1);
	-moz-box-shadow: 0 1px 1px rgba(232,232,232,1);
	box-shadow: 0 1px 4px rgba(232,232,232,1);
 
	border: solid 1px #b3b3b3;
	border-bottom:0;
	border-top:0;
        height:100%;
 color:#333;
 padding: .2em 1em .275em;

box-shadow:inset 0 0 10px #b6b6b6;
-moz-box-shadow:inset 0 0 10px #b6b6b6;
margin-left:1px;

}

</style>

<a href="javascript:void_();" class="  button white small bigrounded" onclick="min_panel('<?php echo $id_panel; ?>','<?php echo $titulo_panele; ?>','<?php echo $name_user; ?>','<?php echo $fb_id_user; ?>');"  style="margin-top:4px;">-</a><a href="javascript:void_();"  class="  button white small bigrounded  " onclick="close_panel('<?php echo $id_panel; ?>');" style=" margin-top:4px;"><b>x</b></a></div>
<div style="float:right;padding-top:4px;"><?php include("fonction/action_follow.php"); ?></div>

<?php if ( $_SESSION['id'] == $id_user){ ?>
<div id="menu_caja" style="float:right;  padding:1px;padding-top:1px;">

    
<a href="javascript:void_();" class=" button blue small bigrounded" id="boton_edit<?php echo $id_panel; ?>" onclick="edita_panel('<?php echo $id_panel;?>');" style="margin-top:4px;" >Edit</a> <a href="javascript:void_();" class=" button red small bigrounded" style="display:none;" id="boton_close_edit<?php echo $id_panel; ?>" onclick="cancel_edit_panel('<?php echo $id_panel;?>');" style="margin-top:4px;">Cancel</a></div>
<?php } ?>


<div id="" style="display:inline-block;float:left; padding:2px; padding-top:0px;padding-left:0px;z-index:20001;">
<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id_user; ?>');"  class=" texto_12 negro" style="border:none;text-decoration: none;">

<div id="image_user" style="float:left;display:inline-block;margin-top:2px;" ><img src="https://graph.facebook.com/<?php echo $fb_id_user?>/picture" width="30" align="absmiddle" alt="<?php echo $name_user; ?>"></div>


 

<div  style="display:inline-block;float:left;height:20px;padding:4px;padding-top:5px;">
<span class="texto_13 azul  " style="text-shadow: #fff 1px 1px 1px; font-family: 'Satisfy', cursive; " ><?php echo $name_user; ?></span>  </a>
<span class="texto_13 gris  " style="text-shadow: #fff 1px 1px 1px; ;font-family: 'Satisfy', cursive; " >wrote this post</span>   </div>
</div>
 </div>

 <div id="box_frases_<?php echo $id_myf; ?>" style="width:450px;background:#f1f1f1;border-top:1px solid #fff;">
  
 <?php  $full_url_panel= "http://".$_SERVER['SERVER_NAME']."/".$url_panel; ?>
 
 

 
<?php 
if ($privado == 1) {?>
  
 
<div id="box_panel_privacy_<?php echo $id_myf; ?>" style="position:absolute;top:65px;z-index:25011;display:none;width:260px;margin-left:20px;background:#fff;box-shadow:  0 0 18px rgba(0,0,0, .4);-webkit-box-shadow: 0 0 18px rgba(0,0,0, .4);  -moz-box-shadow: 0 0 18px rgba(0,0,0, .4);padding:5px;">
 


<div style="float:left;width:220px; font-family:satisfy, cursive; font-size:18px;color:#999;">
Only you can view this post
</div>


<a href="javascript:void_()"  class=" button white small bigrounded" onclick="close_box('box_panel_privacy_<?php echo $id_myf; ?>')" ><b>x</b></a>


</div> 
<?php
} 
?>
 


 

<div  class="titulo_myfive_panel edit_tit azul" id="<?php echo $id_myf; ?>"   style="letter-spacing:0px;width:90%;display:inline-block;padding-left:4px;padding-top:5px;font-family: 'Bitter', sans-serif;font-size:23px;text-shadow:1px 1px 1px #fff;color:#003366;min-height:30px;">
 
    <?php
if($privado !== "0"){ echo '<div style="display:inline-block;cursor:pointer;padding:3px;"  class="button2"  onclick="show_privacy_users_panel(\''.$id_myf.'\')"><img src="img/privacy_icon.png"></div>'; }
    
 echo $titulo_panel; ?> 
 
 </div>  



  <div class="texto_10 gris"  style="width:200px;position:relative;padding:0px;padding-left:5px;padding-bottom:5px;color:#999999;float:left;  ">&#9638; <?php echo $f_creado; ?> <?php if(isset($_POST['from']) AND $_POST['from'] !=="") { echo " -  From ".$_POST['from'].".";}?>
 

</div> <!-- end div date + from -->



 <?php
$consulta_thread_panel = Requete ("SELECT f_rel,id_th FROM rel_threads   WHERE id_panel  = '".$id_panel."' ORDER BY f_rel ASC " , $connexion);
	$num_conversations= mysqli_num_rows($consulta_thread_panel);
  
 ?>
<div style="width: 240px;float:right;text-align:right;font-family:'Satisfy';font-size:13px;padding-right:5px;font-weight:100;" class="gris">
<?php if ( $num_conversations >0){ ?>

<?php if ( $num_conversations >=2){ $s_num_conv="s"; 

?>
<div onclick="ver_conversations_in_panel('<?php echo $id_myf; ?>','<?php echo $id_user; ?>');" style="cursor:pointer;" >
<?php

} else {$s_num_conv="";

$datos_conversation_direct = mysqli_fetch_array($consulta_thread_panel) ;
$id_conversation_direct = $datos_conversation_direct['id_th'];
?>


<div  onclick="show_thread('<?php echo $id_conversation_direct; ?>');" style="cursor:pointer;" >


<?php } ?>



This post is part of <span class="azul"><?php echo $num_conversations;?> conversation<?php echo $s_num_conv; ?></span>





</div>
<?php } ?>
</div>



<div style="clear: both;width: 100%;border-top:1px solid #ddd;background: #fff;border-bottom:0px solid #fff;height:1px;"></div>

 

<!--  line buttons -->


<div id="line_buttons" style="background: #e9e9e9;">
	
<div class="icons_panel_content" style="clear:both;position:relative;left:0px;float:left;width:170px;padding:2px; padding-top:0px; color:#999; z-index:20000; ">

  <?php require("function_check_love.php"); ?>
 <div id="ico_love_box<?php echo $id_myf; ?>"  style="color:#999999;font-size:10px;height:20px;" class="button2"  > 
 <?php
 if ( isset($_SESSION['id']) ){ 
 
if ( check_love($id_myf,$_SESSION['id'])  == 0 ){ ?>
<a href="javascript:void_()" onclick="lovep('<?php echo $id_myf; ?>','<?php echo $loves; ?>');" class=" gris ico_love" id="loves_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $loves; ?></a>
 <?php } else {?>
 
<a href="javascript:void_()" onclick="nolove('<?php echo $id_myf; ?>','<?php echo $loves; ?>');" class=" gris ico_love_checked"  id="loves_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $loves; ?></a>
<?php }
} else { ?>


  <span class=" gris ico_love" id="loves_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $loves; ?></span>
 <?php } ?>
 </div>
 <?php require("function_check_fav.php"); ?>
 <div id="ico_fav_box<?php echo $id_myf; ?>"  style="color:#999999;font-size:10px;height:20px;" class="button2"  > 
 <?php
  
   if ( isset($_SESSION['id']) ){ 
 
  if (check_fav($id_myf,$_SESSION['id'])  == 0 ){ ?>
<a href="javascript:void_()" onclick="favp('<?php echo $id_myf; ?>','<?php echo $favs; ?>');" class=" gris ico_fav" id="favs_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $favs; ?></a>

 <?php } else { ?>

 <a href="javascript:void_()" onclick="nofav('<?php echo $id_myf; ?>','<?php echo $favs; ?>');" class=" gris ico_fav_checked"  id="favs_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $favs; ?></a>
 <?php }
 }else {
 ?>
  <span class=" gris ico_fav" id="favs_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $favs; ?></span>
 <?php
 }
 ?>
  </div>
  <!--<div id="ico_conv_box<?php echo $id_myf; ?>" onclick="ver_conversations_in_panel('<?php echo $id_myf; ?>','<?php echo $id_user; ?>');"   style="color:#999999;font-size:10px;height:20px;" class="button2"  ><a href="javascript:void_();"  class="ico_conversation gris"  style="display:inline-block;height:19px;" title="Conversations" > <?php echo $num_conversations;?>
</a>
 </div> -->  <?php
$consulta_commentspanel = Requete ("SELECT relacionado_coment FROM comments WHERE relacionado_coment='".$id_panel."'" , $connexion);
	$num_comments= mysqli_num_rows($consulta_commentspanel);
  
 ?> 
 
   <div id="ico_comment<?php echo $id_myf; ?>" onclick="ver_comments('<?php echo $id_myf; ?>','<?php echo $_SESSION['id']; ?>');"  style="color:#999999;font-size:10px;height:20px;" class="button2"  ><a href="javascript:void_();"  class="ico_comment gris" id="box_num_comments_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;" title="Comments"> <?php echo $num_comments;?>
</a>
 </div>

   </div>




 <div id="box_sharer_<?php echo $url_panel; ?>"  style="float:right;padding:4px;padding-top:2px;display:inline-block;background:#f1f1f1;">
 
 

 
  <div id="field_url_obj_<?php echo $url_panel; ?>" style="display:none;background:#f1f1f1;">URL: <input type="text" value="<?php echo $full_url_panel; ?>" class="texto_10 " style="color:#999999;border:1px solid #c8c8c8;padding:2px;width:180px;margin:3px;"></div>
 
 <span class="texto_10 gris">Share:</span>


<div  style="color:#999999;font-size:10px;height:20px;display:inline;padding-top:12px;" class="button2"  onClick="show_share('<?php echo $url_panel; ?>')" title="View link" ><img src="img/ico_sh_link.png" border="0"></div>
<!--
<?php $titulo_to_url = str_replace("\'","&#39",$titulo_panele); ?>

<script>function fbs_click() {u='<?php echo $full_url_panel; ?>';t='<?php echo $titulo_panele; ?>';window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click();" target="_blank" class="button2"  title="Share on Facebook" ><img src="img/ico_sh_facebook.png" border="0"></a>
-->

<?php
$comprueba_exists_frasesfrase_mf = Requete ("SELECT frase_mf,id_myf FROM myfive_content   WHERE   id_myf = '$id_myf'   " , $connexion);
 
 
 
 $datos_frasesfrase_mf = mysqli_fetch_array($comprueba_exists_frasesfrase_mf);
  
 $texto_post =  strip_tags($datos_frasesfrase_mf['frase_mf']);
 
 $texto_post = substr($texto_post,0,200);
 
 $texto_post = $texto_post." ...";
 
$texto_post = str_replace( '"','&quot;',$texto_post);


 ?>

<a href="https://www.facebook.com/dialog/feed?app_id=set_up_your_own_facebook_key&link=<?php echo $full_url_panel; ?>&picture=http://<?php echo($_SERVER['SERVER_NAME']); ?>/myfiveby_logo.png&name=<?php echo stripslashes($titulo_panele); ?>&caption=Posted by <?php echo $name_user; ?> at myFIVEby.com&redirect_uri=http://www.facebook.com/&description=<?php echo ($texto_post); ?>" target="_blank" class="button2"  title="Share on Facebook" ><img src="img/ico_sh_facebook.png" border="0"></a>

<a href="http://twitter.com/home?status=I'm reading '<?php echo $titulo_to_url; ?>' on @myfiveby  <?php echo $full_url_panel; ?>" title="Share on Twitter" target="_blank" class="button2"  title="Share on Twitter" ><img src="img/ico_sh_twitter.png" border="0"></a>
<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $full_url_panel; ?>&title=<?php echo $titulo_panel; ?>&source=myfiveby.com" target="_blank" class="button2"  title="Share on Linkedin" ><img src="img/ico_sh_linkedin.png" border="0" ></a>
 
 
<a href="  javascript:( function(){var w=480;var h=380;var x=Number((window.screen.width-w)/2);var y=Number((window.screen.height-h)/2);
    window.open('https://plusone.google.com/_/+1/confirm?hl=en&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'','width='+w+',height='+h+',left='+x+',top='+y+',scrollbars=no');})();" class="button2"   title="Share on Google+" ><img src="img/ico_sh_gplus.png" border="0"></a>
</div>
</div>


  

  
<div id="view_conversation_<?php echo $id_myf; ?>" style="background:#f1f1f1;position:absolute;top:50px;z-index:10000;display:none;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;border:1px solid #d1d1d1; width:370px;min-height:100px;left:50px;padding:0px;padding-left:0px;   box-shadow:  0 0 25px rgba(0,0,0, .3);-webkit-box-shadow: 0 0 25px rgba(0,0,0, .3);-moz-box-shadow: 0 0 25px rgba(0,0,0, .3);"><?php echo $id_myf; ?></div>






<?php


  if(isset($_SESSION['fold_up']) AND $_SESSION['fold_up']=="1"){
 $expanded_panels_style="inline-block";} else { $expanded_panels_style="none";}
 
if(!isset($_SESSION['fold_up']) OR $_SESSION['fold_up']==""){$expanded_panels_style="inline-block"; }
  ?>
 
 <!-- fin box_content_panel -->

 
   
   
  <div  id="box_convers_<?php echo $id_panel; ?>" style="clear: both;background:#ffffff;display:none; width:450px;max-height:350px;" >&nbsp;
</div> 
   
<div id="box_flip_panel_<?php echo $id_panel; ?>" style="min-height:2px;" >


<div id="box_content_panel_<?php echo $id_panel; ?>" style="min-height:2px;display:<?php echo $expanded_panels_style; ?>;border-top:1px solid #ddd;border-left:0px solid #eeeeee;background:#fff;">
 
<?php  include("fonction/function_show_entire_panel.php"); ?>
  
</div>

<div style="clear: both;"></div>

  
<div  id="caja_comments_<?php echo $id_panel; ?>" style="background:#ffffff;display:none;width:450px;max-height:350px;" class="caja_comments_">&nbsp;</div>

 
   
   </div>
   
<!--
<div style="text-align:center;width:98%;padding:0px;border-top:0px solid #eee;border-bottom:0px solid #eee;"><a href="javascript:void_()" onClick="show_content_panel('<?php echo $id_panel; ?>')" class="texto_15 azul" style="line-height:12px;"><div style="postition:relative;margin:0px;padding:0px;height:26px;width:100%;background:transparent url('img/bottom_user_box.png') no-repeat top center;"> </div></a></div>
-->


</div>  <!-- fin caja_frases 


  
<div id="box_conversation_<?php echo $id_panel; ?>" style="display:none;"></div>     -->



</div> <!-- fin box_frases 1 -->

 
 
 
<?php
 $_SESSION['panels_open']=$_SESSION['panels_open']+1;

}

?>

	 
</div> <!-- fin caja_frases -->

<?php /* 
<!--   <script type="text/javascript"> $('#scrollcolpsotpanel<?php echo $id_panel; ?>').sbscroller('refresh');</script> -->
*/
?>
