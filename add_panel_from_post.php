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
  <script type="text/javascript">		$('#list_post_own_createconversp<?php echo $_POST['thread']; ?>').sbscroller(); </script>
 
	<script type="text/javascript">
$().ready(function(){
		//$('#list_post_own_createconversp<?php echo $_POST['thread']; ?>').lionbars();



$(".item_post_to_convers", this).toggle(
function(){
var id_item_select = $(this).attr("rel");
$(this).css("background-color","#19a5da");
$(this).css("color","#ffffff");
 /*
$("#box_inputs_convers_<?php echo $_POST['thread']; ?>").append('<input type="radio" rel="'+id_item_select+'" class="intems_selected<?php echo $_POST['thread']; ?>" value="'+id_item_select+'" style="display:none;" id="item_select_post'+id_item_select+'"  checked>');*/
 

},
function(){
var id_item_select = $(this).attr("rel");
$(".select_usert"+id_item_select).remove();
//alert(id_item_select);


$(this).css("background-color","#f1f1f1");
$(this).css("color","#333333");
}


);



	}); // end ready

		
		
function select_post_to_convers(item_select){
 
$("#box_inputs_select").append('<input id="input_posts_select_usert"  class="select_usert'+item_select+'" type="hidden" value ="'+item_select+'" name="psu">');

}		
		
		
function add_to_convers(autor){
 //var items_selected_to = new Object();
 

//var posts_click_user = $(".intems_selected<?php echo $_POST['thread']; ?>").each(function(){ items_selected_to[$(this).attr("rel")] = $(this).val(); }); 
 var posts_selectedd = $("input#input_posts_select_usert").serialize();
 
 	if (posts_selectedd){  				 					 
		 var autor ="<?php echo $_SESSION['id']; ?>";

$.ajax({
   data:  { "selected_user_conv":posts_selectedd , "autor":autor,"id_thread":'<?php echo $_POST['thread']; ?>'},
   url:   'action_create_new_conversation.php',
   type:  'post',
   beforeSend: function () {
   
 
   },
   error: function(response) { alert(response + " error!"); },
   success:  function (response) {

	 if (response == "ok"){
                                                
		//$("#add_panel_conversation_?php echo $_POST['thread']; ?>").fadeOut();
	                                     
     	add_u_panel_conversation('<?php echo $_POST['thread']; ?>','<?php echo $_SESSION['id']; ?>');
			 
			 				 
$.ajax({
   data:  {"id_thread":'<?php echo $_POST['thread']; ?>'},
  url:   'fonction/lista_panels_th.php',
   type:  'post',
   beforeSend: function () {
   
      $("#list_panels_th<?php echo $_POST['thread']; ?>").html('<div align="center"  style="width:95%;text-align:center;"  ><br><br><img src=\"img/loader.gif\">  Loading ...</div>');   
   },
   error: function(response) { alert(response + " error!"); },
   success:  function (response) {
  //$("#list_panels_th<?php echo $_POST['thread']; ?>").html(response);
//$('#list_panels_th<?php echo $_POST['thread']; ?>').sbscroller('refresh');

show_thread('<?php echo $_POST['thread']; ?>');


   } 
	  
  }); // end ajax   
                                      
                                           
  
	 } else {  
   
       $("#alert_error_<?php echo $_POST['thread']; ?>").html(response);
                            
		   }
    
   } 
	  
  }); // end ajax   

  }   else {
		
		alert("Select one or more posts.");
		
  }
}
</script>
     
					 
<div  style="width:100%;margin:0 auto; height:29px;border-bottom:1px solid #ccc;background:#e8e8e8;" class="tit_col_box">
 
<div id="" style="display:inline-block;float:left;height:25px;padding:4px; " class="texto_13 negro" >Contribute</div>

<div id="confirma_new_conversation"  class=" button white small bigrounded" style="float:right;margin-top:5px;margin-right:5px;" onClick="close_box_posts('<?php echo $_POST['thread']; ?>')" >x</div>
</div>

		   
<div style="clear:both;"></div>



<div  style="width:100%;margin:0 auto; height:29px;text-align:center;padding :4px;padding-top:10px;text-shadow:1px 1px 1px #fff;" class="texto_12 gris  "><div class="button medium blue  " onClick="crear_a_new_panel_post('<?php echo $_POST['thread']; ?>');" >Add a new post</div></div>



<div  style="width:100%;margin:0 auto;text-align:center;letter-spacing:-2px; " class="texto_10 gris  ">--------------------------------------------------------------------------------------------------------------------&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O&nbsp;&nbsp;&nbsp;&nbsp;R&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--------------------------------------------------------------------------------------------------------------------</div>




<div  style="width:100%;margin:0 auto; height:29px;text-align:center;padding :4px;text-shadow:1px 1px 1px #fff;" class="texto_12 gris  ">Add an existing post</div>

 

<style>
.item_post_to_convers{}
.item_post_to_convers:hover{ background:#f1f1f1;}
</style>
 
<?php
if ($_SESSION['id'] == $_POST['id_user']) {  ?>		 
<div id=" " style="width:360px;height:140px;margin:0 auto;padding:4px;"   >
 <div id="list_post_own_createconversp<?php echo $_POST['thread']; ?>" style="width:320px;margin:0 auto;padding-top:0px;height:140px;"  >

<?php
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
$comprueba_exists_panels = Requete ("SELECT title, id_myf,f_creado FROM myfive_panels   WHERE autor  = '$_SESSION[id]' AND privacy = '0'  ORDER BY f_creado DESC" , $connexion);
while ($datos_panels = mysqli_fetch_array($comprueba_exists_panels) ){

																																								/*
		$consulta_thread_panel_onconvers =  Requete ("SELECT id_panel, id_th  FROM rel_threads WHERE  id_th  = '$_POST[thread]' AND id_panel ='' ORDER BY $clause_where_list " , $connexion);
  $num_convers_post = mysqli_num_rows($consulta_thread_panel_onconvers);       */
 
?>
 
<div class="item_post_to_convers" rel="<?php echo $datos_panels['id_myf']; ?>" id="post_to_conver_<?php echo $datos_panels['id_myf']; ?>" style="border-bottom:1px solid #ddd;border-top:0px solid #eee;width:300px;padding:4px;display:inline-block;font-size:11px;cursor:pointer;border-bottom:1px solid #ccc;border-top:1px solid #fff;" onClick="select_post_to_convers('<?php echo $datos_panels['id_myf']; ?>')" valign="top"><?php echo $datos_panels['title']; ?></div>
<div style="clear:both;border-bottom:0px solid #eee;width:300px;"></div>



<?php
 

}  // end while 


} ?>
		</div>      

</div>
<div style="text-align:right;margin-top:0px;padding-top:2px; padding-right:40px;" id="box_inputs_convers_<?php echo $_POST['thread']; ?>">
<div id="alert_error_<?php echo $_POST['thread']; ?>" style="display:inline-block;">&nbsp;</div>  
<!--<input type="hidden" id="posts_selected_user_conv" value="">-->
<div id="box_inputs_select"></div>
<div id="confirma_new_conversation" class="button medium blue  " onClick="add_to_convers('<?php echo $_POST['thread']; ?>','<?php echo $_SESSION['id']; ?>')" >Add</div>



</div>