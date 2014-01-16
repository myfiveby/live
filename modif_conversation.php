<?php if (!session_id() || session_id()==""){
	session_start();
} ?>

<script type="text/javascript" src="js/jquery.wordcount.js"></script>
<?php 
if ( isset($_POST['id_thread'])  ){
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/functions_myfiveby.php');
 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$consulta_thread_panel = Requete ("SELECT *  FROM  threads   LEFT JOIN users   ON id_user = autor_th  WHERE id_th  = '$_POST[id_thread]' " , $connexion);
	if (mysqli_num_rows($consulta_thread_panel) > 0 ){
	
	
  
 $datos_consulta_thread_panel = mysqli_fetch_array($consulta_thread_panel);
         
        $id_thread = $datos_consulta_thread_panel['id_th'];
        $name_thread = $datos_consulta_thread_panel['name_th'];
        $name_user = $datos_consulta_thread_panel['name_user'];
        $fb_id = $datos_consulta_thread_panel['fb_id'];
        
        $f_creado = $datos_consulta_thread_panel['f_th'];
        $autor_th = $datos_consulta_thread_panel['autor_th'];

        $url_panel = $datos_consulta_thread_panel['url_th'];
        $loves = $datos_consulta_thread_panel['loves'];
        $favs = $datos_consulta_thread_panel['favs'];
        
        
     $description_complete = stripslashes($datos_consulta_thread_panel['description_th']);
 
 
 
?>
<script type="text/javascript" >
$("#title_convers_<?php echo $id_thread; ?>").charCount({
    allowed: 140,		
    warning: 20,
    counterText: ''	
});
</script>
 <script type="text/javascript">

	
	function remove_picture_fpost(id_pic_, user_,img_name_){
  
  $("#listItem_"+id_pic_).fadeOut(200);
  	
$.ajax({ 
   url:   'action_remove_picture_post.php',
   data:  {"user_":user_, "id_pic_":id_pic_, "img_name_":img_name_},
   type:  'post',
   beforeSend: function () {},
   error: function(response) { alert(response + " error!"); },
   success:  function (response) {}  
  }); // end ajax  
  }
	
		$(function() { 
//$( ".picture_post_m" ).sortable({  cursor: "move", stack:"div", scrollSensitivity:1,containment: "#box_pictures_inpost" , handle:".picture_post", opacity: 1  });


$( "#box_pictures_inpost" ).sortable({ cursor: 'move' ,revert: true,


    update : function () {
		var order = $('#box_pictures_inpost').sortable('serialize');
		$("#info").load("action_guarda_orden_pictures_post.php?"+order);

      } 
    
    	}); 
    	
    	
    	
    	
    	
    	});
      
      function show_box_drop(){
      
      
      $("#dropbox").toggle();
      
      }
       
</script>
<style>
#box_pictures_inpost ul{position:relative;top:0;clear:both;}
#box_pictures_inpost li{margin:0px;padding:0px;position:relative;top:0;display:inline-block; }
#box_pictures_inpost > li { float: left; }
?
</style>

 
<div style="display:inline-block;padding:0px;"  > 
 
<input type="text" name="t_1" id="title_convers_<?php echo $id_thread; ?>" class="input_t " style="width:320px;height:40px;resize:none;text-shadow: 1px 1px 1px #ffffff;;font-family: 'Bitter', sans-serif;font-size:19px;color:#333;margin-left:0px;" maxlength="140" placeholder="Add a title" value="<?php echo $name_thread; ?>">

</div><div style="padding-top:5px;float:right;margin-right:0px;width:50px;display:inline-block;text-align:center;" class="texto_9 gris">Chars. left:<div id="box_chars_left" class="texto_14 gris"></div></div>
 
<div  style="clear:both;"></div>
  
 
<div  class="titulo_myfive_panel edit_tit" style="padding:0px;" > 
 
<input type="hidden"  id="id_convers_<?php echo $id_thread; ?>" class="input_t"  value="<?php echo $datos_frases['id_mf']; ?>"> 
 
        
        
        
<div id="texto_description_<?php echo $cont; ?>" style="padding-top:20px;" > 
 <textarea name="f_post_<?php echo $id_thread; ?>"  placeholder="Write a description here"  id="descrip_conversation_<?php echo $id_thread; ?>" class="input_t" style="width:380px;height:110px;resize: none;border:1px solid #ccc;font-size:12px;" ><?php echo $description_complete; ?></textarea>

 </div>

 
 </div>
 
 <div style="width:390px;margin-left:8px;padding-bottom:10px;height:25px;padding-top:20px;">
 
   <div style="float:left;padding-top:10px;display:inline-block;width:30px"  >
<div class=" button small red" id="button_borrar_<?php echo $id_thread;?>" onclick="delete_th('<?php echo $id_thread;?>','<?php echo $_SESSION['id'];?>')"><img src="img/ico_trash.png"></div>

</div>

<div  class="texto_12" style="padding-left:20px;width:200px;display:inline-block;padding-top:5px;" id="box_privacity_edit_<?php echo $datos_frases['id_mf']; ?>"  >
 <script>
 
 function show_friends_privacity(){
 
 $("#box_panel_options_<?php echo $id_thread_tot; ?>").toggle();
 
 }
 
 </script>
<?php  $cat_priv = Array(0 => "for everyone",1 => "just for me" ); ?>




<span  style="font-family: 'Satisfy', cursive; " >This post is </span>
<select name="post_priv" id="post_priv" class="texto_11" onChange="show_friends_privacity()">
<?php 
  for($i=0;$i<count($cat_priv);$i++) {?>
  
<option value="<?php  echo $i; ?>"  <?php if ($i == $priv ) echo "selected"; ?> ><?php  echo $cat_priv[$i]; ?></option>
<?php   }?>
</select> 
  
</div>

 <div  id="botonsubmitc<?php echo $id_thread;?>" style="width:120px;float:right;"> 
<a href="javascript:void_()" class=" button blue big" onclick="modif_f_conversation('<?php echo $_SESSION['id'];?>','<?php echo $id_thread;?>')">Update</a>
</div> 

 
 <div  id="botonsubmit_waitc<?php echo $id_thread;?>" style="width:120px;display:none;float:right; "  >
<a href="javascript:void_()" class=" button blue big"  >Wait...</a>
</div> 


   <!-- fin box_frases -->
   <div   style="float:left;height:15px;"  >&nbsp; </div>
   
   
   
</div> 
 
<?php

}
}


 
  ?>
  