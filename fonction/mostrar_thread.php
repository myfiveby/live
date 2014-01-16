<?php
function show_thread($id_thread) {
if (!session_id() || session_id()==""){
	session_start();
}

$id_thread_tot = $id_thread;

require ('fonction/time_ago.php');
 

$zindex = $id_thread + 100;

require ('conf/sangchaud.php');

 $connexion = Connexion ($login_base, $password_base, $base, $host_base);
 
 ?>
 

	<script  type="text/javascript" language="javascript">
//	$(".box_rel_conversations").hide();	
	
	
		
	

		
	
	function read_more_description (id_thread){ 
	$("#more_description_conversation_"+id_thread).fadeIn();
	
	}
	
	
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
	
	      	          

					
$("#thread_<?php echo $id_thread; ?>").click(function(){
//alert("click");
 
$(this).topZIndex();
});

	
	
	
	
	
		$( ".thread" ).draggable({  cursor: "move", stack:"div", scrollSensitivity:1,containment: "#escenario" , handle:".handle_thread",
		start: function(event,ui){
				    	$(".box_rel_conversations").hide();	
				
		  }   }); 	}); 
		
		
		
		

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

$().ready(function(){
		 
		
		

 //$(".item_post_on_convers").mouseover(function(){$(".bot_delete_from_conv", this).fadeIn(500);}).mouseout(function(){$(".bot_delete_from_conv", this).fadeOut(200);});

	}); // end ready
	
	
	</script>
 

<div id="thread_<?php echo $id_thread; ?>" rel="<?php echo $id_thread; ?>" class="thread panel_drag"  style="position:absolute;left:20%;top:5%;margin-bottom:5px;">

<div id="caja_thread" style="width:400px;min-height:430px;"> 
<?php
require ('conf/sangchaud.php');


$consulta_thread_panel = Requete ("SELECT *  FROM  threads   LEFT JOIN users   ON id_user = autor_th  WHERE id_th  = '$id_thread' " , $connexion);
	if (mysqli_num_rows($consulta_thread_panel) > 0 ){
	
	
  
 $datos_consulta_thread_panel = mysqli_fetch_array($consulta_thread_panel);
         
        $id_thread = $datos_consulta_thread_panel['id_th'];
        $name_thread = $datos_consulta_thread_panel['name_th'];
        $name_user = $datos_consulta_thread_panel['name_user'];
        $fb_id = $datos_consulta_thread_panel['fb_id'];
        
        $f_creado = $datos_consulta_thread_panel['f_th'];
        $autor_th = $datos_consulta_thread_panel['autor_th'];

        $url_panel = $datos_consulta_thread_panel['url_th'];
        $type_th = $datos_consulta_thread_panel['type_th'];
        $loves = $datos_consulta_thread_panel['loves'];
        $favs = $datos_consulta_thread_panel['favs'];
        
        
     $description_complete = stripslashes($datos_consulta_thread_panel['description_th']);
      $description_teaser = substr($description_complete,0,110);
        
         
			
  $description_complete = str_replace("\n","<br>",$description_complete);	 
  $description_teaser = str_replace("\n","<br>",$description_teaser);	 	 
  $description_teaser = str_replace("<br>","",$description_teaser);	 
	
	
	if ($description_teaser !=="" ){  $description_teaser = $description_teaser."..."; }
	
				 
				         

$f_creado = time_ago($f_creado);

$id_myf =  $id_thread;
?>


<div> 
<div style="width:400px;display:inline-block;float:left;padding:0px;  color:#2e4c68;background:#e8e8e8;border-top-left-radius: .2em;border-top-right-radius:  .2em;margin:0px;top:0;margin-top:-3px;border-bottom:1px solid #ccc;cursor:move;height:28px;" class="texto_19 handle_thread"  >

<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id; ?>');" style="text-decoration:none;border:none;"  >
<div id="image_user" style="margin-top:2px;float:left;display:inline-block; " ><img src="https://graph.facebook.com/<?php echo $fb_id?>/picture" width="30" align="absmiddle" alt="<?php echo $name_user; ?>"></div> </a>



   <div class="texto_14 negro" style="position:relative;top:0;padding:4px;padding-top:3px;display:inline-block;font-family: 'Satisfy', cursive;text-shadow:1px 1px 1px #fff;text-shadow:1px 1px 1px #fff;" >
 <a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id; ?>');" style="text-decoration:none;border:none;"  >   
<span class="texto_13 azul  " style="text-shadow: #fff 1px 1px 1px; font-family: 'Satisfy', cursive; " ><?php echo $name_user; ?></span> </a>
<span class="texto_13 gris  " style="text-shadow: #fff 1px 1px 1px; ;font-family: 'Satisfy', cursive; " >started this conversation</span> 
 </div>   
   <div style="display:inline-block;float:right; padding:0px;margin:0px; margin-right:5px;margin-top:-3px;height:15px;">
    
<a href="javascript:void_()"  class=" button white small bigrounded" onclick="close_thread('<?php echo $id_thread; ?>')" >x</a>
</div>
  <div id="menu_caja" style="display:inline-block;float:right; padding:0px;margin:0px;top:0;margin-top:-3px;height:15px;">
    
    
        
    <?php if ( $_SESSION['id'] == "2"){ ?>
    <a href="javascript:void_();" class=" button gris <?php if ($type_th == 1){ echo " green ";} ?> small bigrounded" id="boton_u<?php echo $id_thread; ?>" onclick="univ('<?php echo $id_thread;?>','<?php echo $_SESSION['id']; ?>')"> </a>
    <?php } ?>
    
    
  <?php if ( $_SESSION['id'] == $autor_th){ ?>
<a href="javascript:void_()" id="boton_editc<?php echo $id_thread; ?>"  class=" button blue small bigrounded" onclick="edita_conversation('<?php echo $id_thread; ?>')" >Edit</a><a href="javascript:void_()" id="boton_close_editc<?php echo $id_thread; ?>"   class=" button red small bigrounded" style="display:none;margin:0px;" onclick="close_edita_conversation('<?php echo $id_thread; ?>')">Cancel</a></div>
<?php } ?>
 </div> 

 </div>
<div style="clear:both;"></div> 
  
 
<div id="delete_panel_conversation_<?php echo $id_thread_tot; ?>" style="position:absolute;top:100px;z-index:10011;display:none;	width:400px;height:180px;background:#fff ;  box-shadow:  0 0 78px rgba(0,0,0, .4);-webkit-box-shadow: 0 0 78px rgba(0,0,0, .4);    -moz-box-shadow: 0 0 78px rgba(0,0,0, .4);"><?php echo $id_thread_tot; ?></div> 

<div id="box_edit_convs_<?php echo $id_thread; ?>" style="position:absolute;top:35px;z-index:10001;display:none;	width:380px;height:270px;   box-shadow:  0 0 78px rgba(0,0,0, .4);-webkit-box-shadow: 0 0 78px rgba(0,0,0, .4);    -moz-box-shadow: 0 0 78px rgba(0,0,0, .4);background:#e8e8e8;padding:10px;"></div>
 
<div id="add_embed_<?php echo $url_panel; ?>" style="position:absolute;top:100px;z-index:10001;display:none;	width:380px;height:240px;   box-shadow:  0 0 78px rgba(0,0,0, .4);-webkit-box-shadow: 0 0 78px rgba(0,0,0, .4);    -moz-box-shadow: 0 0 78px rgba(0,0,0, .4);background:#2e4c68;padding:10px;"></div>

 
<div id="more_description_conversation_<?php echo $id_thread_tot; ?>" style="position:absolute; top:60px; z-index:10000; display:none;	width:390px;min-height:80px; max-height:360px; overflow:auto; background:#e8e8e8; box-shadow: 0 0 78px rgba(0,0,0, .4); -webkit-box-shadow: 0 0 78px rgba(0,0,0, .4); -moz-box-shadow: 0 0 78px rgba(0,0,0, .4); padding:5px;">

<div style="width:20px; display:inline-block; float:right; margin-right:13px;" ><a href="javascript:void_()"  class=" button white small bigrounded" onclick="close_box('more_description_conversation_<?php echo $id_thread; ?>')"><b>x</b></a></div> 
<div style="position:relative; width:357px; left:0px;padding-top:2px; text-shadow: 0px 1px 1px #fff;" class="texto_12 negro" id="box_description_complete_txt<?php echo $id_thread_tot; ?>" ><?php echo $description_complete; ?></div>


</div> 

 
<div id="add_panel_conversation_<?php echo $id_thread_tot; ?>" style="position:absolute;bottom:5px;z-index:10000;display:none;	width:400px;height:320px;background:#f1f1f1;  box-shadow:  0 0 8px rgba(0,0,0, .5);-webkit-box-shadow: 0 0 8px rgba(0,0,0, .5);    -moz-box-shadow: 0 0 8px rgba(0,0,0, .5);"><?php echo $id_thread_tot; ?></div>     
	 
<div style="clear:both;"></div>


  <div class="icons_panel_content  " style="border-top:1px solid #fff;clear:both;padding-top:0px;padding:5px;color:#999;background:#f1f1f1;">

<div style="letter-spacing:0px;width:350px;display:inline-block;padding-left:4px;padding-top:4px;font-family: 'Bitter', sans-serif;font-size:19px;text-shadow:1px 1px 1px #fff;color:#003366;" id="box_title_conversation<?php echo $id_thread_tot; ?>" ><?php echo $name_thread; ?>

</div>
<!--
<div style="float:left;display:inline-block;padding:0px;">
	<div class="texto_10 gris" style="position:relative;top:0;padding:4px;padding-left:6px;padding-top:0px;">Conversation by </div> 
 <a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id; ?>');"  class=" texto_12 negro">
 <div id="image_user" style="float:left;display:inline-block;" ><img src="https://graph.facebook.com/<?php echo $fb_id?>/picture" width="30" align="absmiddle" alt="<?php echo $name_user; ?>"></div> 
 

 
  <div class="texto_13 negro" style=" position:relative;top:0;width:140px;display:inline-block;letter-spacing:0px;padding:0px;padding-top:0px;padding-left:4px; font-family: 'Open Sans', sans-serif;font-size:12px;" ><?php echo "<span class=\"azul\"> <b>".$name_user."</span></b><br><span class=\"texto_10 gris\">&#9638;  ".$f_creado; ?></span></div>
                                                                                                                                         </a>

		 </div>-->


			 <div id="box_description_convers_<?php echo $id_thread_tot; ?>" class="texto_11 gris" style="float:left;width:390px;display:inline-block;text-shadow:1px 1px 1px #fff;padding-left:4px;border-bottom:1px solid #ddd; ">

       
       <?php if (strlen($description_teaser)  >= 1){ ?>
       			 <div id="box_description_short_txt<?php echo $id_thread_tot; ?>"  style="height:30px;"><?php echo $description_teaser;?></div>
       <div onclick="read_more_description('<?php echo $id_thread; ?>')" style="cursor:pointer;display:inline-block;text-decoration:underline;" class="texto_10 gris">Read more</div>
<br />
<div  class="texto_10 gris" style="padding: 4px 0;font-family:Arial;">&#9638;  <?php echo $f_creado; ?></div>
 <?php } ?>
 
 
																																													 </div>


	 

  
  
  
  
  
  

	<div style="clear:both;"></div>
	 
 
  <div class="icons_panel_content" style="width:390px;border-top:1px solid #f9f9f9;border-bottom:1px solid #ccc;padding:5px;padding-top:2px; color:#999;background:#e9e9e9;margin:0px;margin-left:-5px;margin-bottom:-5px;">
<?php require("function_check_love_th.php"); ?>
 <div id="ico_love_box<?php echo $id_myf; ?>" style="color:#999999;font-size:10px;height:20px;margin-top:2px;"    class="button2"> 
 <?php
 if ( isset($_SESSION['id']) ){ 
 
if ( check_love_th($id_myf,$_SESSION['id'])  == 0 ){ ?>
<a href="javascript:void_()" onclick="loveth('<?php echo $id_myf; ?>','<?php echo $loves; ?>');" class=" gris ico_love" id="loves_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $loves; ?></a>
 <?php } else {?>
 
<a href="javascript:void_()" onclick="noloveth('<?php echo $id_myf; ?>','<?php echo $loves; ?>');" class=" gris ico_love_checked"  id="loves_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $loves; ?></a>
<?php }
} else { ?>


  <span class=" gris ico_love" id="loves_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $loves; ?></span>
 <?php } ?>
 </div> 
 <?php require("function_check_fav_th.php"); ?>
 <div id="ico_fav_box<?php echo $id_myf; ?>" style="color:#999999;font-size:10px;height:20px;margin-top:2px;" class="button2"  > 
 <?php
  
   if ( isset($_SESSION['id']) ){ 
 
  if (check_fav_th($id_myf,$_SESSION['id'])  == 0 ){ ?>
<a href="javascript:void_()" onclick="favth('<?php echo $id_myf; ?>','<?php echo $favs; ?>');" class=" gris ico_fav" id="favs_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $favs; ?></a>

 <?php } else { ?>

 <a href="javascript:void_()" onclick="nofavth('<?php echo $id_myf; ?>','<?php echo $favs; ?>');" class=" gris ico_fav_checked"  id="favs_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $favs; ?></a>
 <?php }
 }else {
 ?>
  <span class=" gris ico_fav" id="favs_<?php echo $id_myf; ?>" style="display:inline-block;height:19px;"><?php echo $favs; ?></span>
 <?php
 }
 ?>
  </div>
  
    
 <?php  $full_url_panel= "http://".$_SERVER['SERVER_NAME']."/".$url_panel;
        $titulo_panel = $name_thread; ?>

 <div   id="box_sharer_<?php echo $url_panel; ?>"  style="float:right;border:0px solid #eeeeee;background:transparent;padding:0px;padding-top:2px;display:inline-block;width:240px;text-align:right;">
   <span class="texto_10 gris">Share:</span>

   
   <div   style="color:#999999;font-size:10px;height:20px;" class="button2"  onClick="show_embed('<?php echo $url_panel; ?>')" title="Embed Code" ><img src="img/ico_sh_embed.png" border="0"></div>
   
   
   <div  style="color:#999999;font-size:10px;height:20px;" class="button2"  onClick="show_share('<?php echo $url_panel; ?>')" title="View link" ><img src="img/ico_sh_link.png" border="0"></div>
 


<a href="https://www.facebook.com/dialog/feed?app_id=set_up_your_own_facebook_key&link=<?php echo $full_url_panel; ?>&picture=http://<?php echo($_SERVER['SERVER_NAME']); ?>/myfiveby_logo.png&name=<?php echo stripslashes($titulo_panel); ?>&caption=Conversation started by <?php echo $name_user; ?> at myFIVEby.com&description=<?php echo $description_complete; ?>&redirect_uri=http://www.facebook.com/" target="_blank" class="button2"  title="Share on Facebook" ><img src="img/ico_sh_facebook.png" border="0"></a>


<a href="http://twitter.com/home?status=I'm reading: '<?php echo $titulo_panel; ?>' on @myfiveby <?php echo $full_url_panel; ?>" title="Share on Twitter" target="_blank" class="button2"  title="Share on Twitter" ><img src="img/ico_sh_twitter.png" border="0"></a>
<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $full_url_panel; ?>&title=<?php echo $titulo_panel; ?>&source=myfiveby.com" target="_blank" class="button2"  title="Share on Linkedin" ><img src="img/ico_sh_linkedin.png" border="0" ></a>
 
 
<a href="  javascript:( function(){var w=480;var h=380;var x=Number((window.screen.width-w)/2);var y=Number((window.screen.height-h)/2);
    window.open('https://plusone.google.com/_/+1/confirm?hl=en&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'','width='+w+',height='+h+',left='+x+',top='+y+',scrollbars=no');})();" class="button2"   title="Share on Google+" ><img src="img/ico_sh_gplus.png" border="0"></a>
 
</div>
   <div id="field_url_obj_<?php echo $url_panel; ?>" style="margin-top:10px;float:right;display:none;">URL: <input type="text" value="<?php echo $full_url_panel; ?>" class="texto_10 " style="color:#999999;border:1px solid #c8c8c8;padding:1px;width:200px;margin:1px;"></div>


</div> 
 		 </div>
		 
 	<div   style="text-align:right;padding:0px;padding-left:5px;height:20px;width:387px;display:none;" class="lista_posts_thread texto_10 gris" >
	 Order by: <strong>Date</strong> | <strong>Popularity</strong>
	

</div> 


<script type="text/javascript"> $('#list_panels_th<?php echo $id_thread_tot; ?>').sbscroller(); </script>
 
 	<div id="list_panels_th<?php echo $id_thread_tot; ?>" style="float:left; padding:0px;padding-left:0px;height:260px;width:398px;margin-bottom:10px;" class="lista_posts_thread texto_13 negro  scrolledcontent" > 
 
 	<?php  $_POST['id_thread']=$id_thread; include("fonction/lista_panels_th.php");  ?>
 
	</div>

 

 
       
 
<div style="clear:both;"></div>
  <div align="center" style="botom:0px;postition:fixed;bottom:0;width:398px;border:0px solid #eeeeee;text-align:center;padding:0px;margin-left:0px;height:30px;padding-top:0px; " class="texto_13 negro" >
 <?php
 if (isset($_SESSION['id'])){


 echo "<a href=\"javascript:void_()\" onclick=\"add_u_panel_conversation('".$id_thread_tot."','".$_SESSION['id']."')\" class=\"texto_13 azul button blue medium bigrounded\" style=\"padding:4px:\"> Contribute </a>";


 } else {



 echo '<a href="https://www.facebook.com/dialog/oauth?client_id=set_up_your_own_facebook_key&redirect_uri=http%3A%2F%2F'.$_SERVER['SERVER_NAME'].'%2Findex.php&state=5ebfd7460a8d334921a16cfbfd70183a&scope=email,manage_pages,user_about_me" ><p><u>Connect with Facebook</u></p></a>';
 }
 ?>

  
<?php  } ?>
</div>


</div>
	  

</div>
<?php
}

?>