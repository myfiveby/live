<?php if (!session_id() || session_id()==""){
	session_start();
} 

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
 
$id_user= $_POST['id_user'];
/* 
*************************************************************************************************************************************
*************************************************************************************************************************************
*
*      CONVERSATIONS
*
*************************************************************************************************************************************
*************************************************************************************************************************************
*/

?>

<script type="text/javascript" src="js/jquery.wordcount.js"></script>
<script type="text/javascript" >
$("#name_new_conversation").charCount({
    allowed: 140,		
    warning: 20,
    counterText: ''	
});
</script><script type="text/javascript">
    
    
		$('#list_post_own_createconvers').sbscroller();  
	
$().ready(function(){
		 

$(".item_post_to_convers", this).toggle(
function(){
$(this).css("background-color","#19a5da");
$(this).css("color","#ffffff");
},
function(){

$(this).css("background-color","#ffffff");
$(this).css("color","#333333");
}


);
		 		$( "#box_new_conversation" ).draggable({  cursor: "move", stack:"div", scrollSensitivity:1,containment: "#escenario" , handle:".handle_thread"  }); 


	}); // end ready

		
		
function select_post_to_convers(item_select){

var items_ex = $("#posts_selected_user_conv").val();
var itmes_ac = items_ex + ","+item_select;	 
$("#posts_selected_user_conv").val(itmes_ac);

}		
		
		
function create_new_convers(autor){


var pasa= 0;

var name_new_conversation = $("#name_new_conversation").val();

if (!name_new_conversation  ){ csscody.alert("Type your conversation title, please.");

$("#name_new_conversation").css("border","1px solid #19a5da");

 } else {  var pasa= pasa + 1;
					 }
					 
					 
					 

var selected_user_conv = $("#posts_selected_user_conv").val();

if (!selected_user_conv  ){ // csscody.alert("Select someone post, please.");

			 var pasa= pasa + 1;

 } else {  var pasa= pasa + 1;
					 }
					 
					 
	if (pasa == 2  ){  				 					 
					 
					 var autor ="<?php echo $_SESSION['id']; ?>";
			
			
	var descrip_conversation = $("#descrip_conversation").val();		
			
			
					 
$.ajax({
   data:  { "selected_user_conv":selected_user_conv , "autor":autor, "name_new_conversation":name_new_conversation, "descrip_conversation":descrip_conversation},
   url:   'action_create_new_convers_main.php',
   type:  'post',
   beforeSend: function () {
   
 
   },
   error: function(response) { alert(response + " error!"); },
   success:  function (response) {
   $("#box_new_conversation").hide();
   
  show_thread(response);
   }  
  }); // end ajax   
  }  
}
</script>

<?php $name_user = $_SESSION['username']; $fb_id = $_SESSION['fb_id']; ?>
<div class="new_thread" id="new_thread">
 
<div> 
<div style="width:380px;display:inline-block;float:left;padding:0px;  color:#2e4c68;background:#e8e8e8;border-top-left-radius: .2em;border-top-right-radius:  .2em;margin:0px;top:0;margin-top:-3px;border-bottom:1px solid #ccc;cursor:move;height:28px;" class="texto_19 handle_thread"  >

<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id; ?>');" style="text-decoration:none;border:none;"  >
<div id="image_user" style="margin-top:2px;float:left;display:inline-block; " ><img src="https://graph.facebook.com/<?php echo $fb_id?>/picture" width="30" align="absmiddle" alt="<?php echo $name_user; ?>"></div> </a>



   <div class="texto_14 negro" style="position:relative;top:0;padding:4px;padding-top:3px;display:inline-block;font-family: 'Satisfy', cursive;text-shadow:1px 1px 1px #fff;text-shadow:1px 1px 1px #fff;" >
 <a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id; ?>');" style="text-decoration:none;border:none;"  >   
<span class="texto_13 azul  " style="text-shadow: #fff 1px 1px 1px; font-family: 'Satisfy', cursive; " ><?php echo $name_user; ?></span> </a>
<span class="texto_13 gris  " style="text-shadow: #fff 1px 1px 1px; ;font-family: 'Satisfy', cursive; " >started this conversation</span> 
 </div>   
<div style="display:inline-block;float:right; padding:0px;margin:0px; margin-right:5px;margin-top:-3px;height:15px;"><a href="javascript:void_()"  class=" button white small bigrounded" onclick="close_box('box_new_conversation')" >x</a></div>
 

 </div>
<div style="clear:both;"></div> 
  
<div style="width:100%;margin:0 auto;padding-top:5px;"  >
 
<div style="display:inline-block;padding-top:15px;"  > 
 
<input type="text" name="name_new_conversation" id="name_new_conversation" class="input_t " style="width:300px;height:30px;resize:none;text-shadow: 1px 1px 1px #ffffff;;font-family: 'Bitter', sans-serif;font-size:19px;color:#333;margin-left:10px;padding:4px;" maxlength="140" placeholder="Add a title" value="">

</div><div style="padding-top:15px;float:right;margin-right:5px;width:50px;display:inline-block;text-align:center;" class="texto_9 gris">Chars. left:<div id="box_chars_left" class="texto_14 gris"></div></div>
 
<div  style="clear:both;"></div>
  
 
<div  class="titulo_myfive_panel edit_tit"  > 
 
 
        
        
        
<div   id="texto_description" style="padding-top:20px;" > 
 <textarea name="f_post"  placeholder="Write a description here"  id="descrip_conversation" class="input_t" style="width:350px;height:90px;resize: none;border:1px solid #ccc;font-size:12px;margin-left:5px;padding:4px;" ></textarea>

 </div>

 
 </div>
 
<style>
.item_post_to_convers{}
.item_post_to_convers:hover{ background:#f1f1f1;}
</style>
 
<?php
if ($_SESSION['id'] == $_POST['id_user']) {  ?>
<h4 style="font-size:12px;margin:10px;font-weight:normal;" class="negro">Contribute an existing post?</h4>
		 
<div id="list_post_own_createconvers" style="width:360px;height:100px;margin:0 auto;padding:4px;padding-bottom:20px;"  >

<?php
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
$comprueba_exists_panels = Requete ("SELECT title, id_myf,f_creado FROM myfive_panels  WHERE autor  = '$_SESSION[id]' AND privacy = '0' ORDER BY f_creado DESC" , $connexion);

		if  ( mysqli_num_rows($comprueba_exists_panels) > 0 )		{

while ($datos_panels = mysqli_fetch_array($comprueba_exists_panels) ){


				if (!empty($datos_panels['title'])){
?>
 
<div class="item_post_to_convers" rel="<?php echo $datos_panels['id_myf']; ?>" id="post_to_conver_<?php echo $datos_panels['id_myf']; ?>" style="border-bottom:1px solid #ccc;border-top:1px solid #fff;width:340px;padding:4px;display:inline-block;font-size:11px;cursor:pointer;" onClick="select_post_to_convers('<?php echo $datos_panels['id_myf']; ?>')" valign="top"><?php echo $datos_panels['title']; ?></div>
<div style="clear:both;border-bottom:0px solid #eee;width:268px;"></div>
<?php
} // end empty
}  // end while 

			 }   else {
			 
			/* echo '<div style="width:100%;text-align:center;" class="gris">There\'s no posts.<br><br>	 <div  style="top:5px;width:70px; cursor:pointer;display:inline-block;border:0px solid #ccc;line-height:12px; text-shadow:1px 1px 1px #333;padding-top:10px;"  onClick="crear_new_panel_post(\''.$_SESSION['id'].'\');"  class="item_menu_crear texto_14 blanco   texto  button small red" >  <span class="texto_10" style="margin-top:10px;color:#fff; ">Create a</span> 
     <br><b><span class="texto_13">New Post</span></b></div></div>';*/
			 
			 }



} ?>
		</div>      <br />
<div style="text-align:center;">
<input type="hidden" id="posts_selected_user_conv">
<div id="confirma_new_conversation" class="button blue  " onClick="create_new_convers('<?php echo $_SESSION['id']; ?>')" >Create</div></div>
<br>
</div>
</div>