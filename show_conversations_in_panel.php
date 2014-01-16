<?php if (!session_id() || session_id()==""){
	session_start();
} 

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
require ('fonction/time_ago.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);


$id_panel = $_POST['id_panel'];
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
 
  	<script type="text/javascript">
$().ready(function(){
		$('#scroll_lista_convers_<?php echo $id_panel; ?>').lionbars();
 
	}); // end ready
	
	</script>
	
	
	
<div class=" " style=" height:26px;padding-top:4px;background:#eee;width:450px;border-bottom:1px solid #ddd;">
<div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:0px; ">
<a href="javascript:void_()" class=" button white small bigrounded"  onClick="ver_content_panel('<?php echo $id_panel;?>')"><b>x</b></a></div>


<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;text-shadow:1px 1px 1px #ffffff;" class=" ">
<b>Conversations</b></div>

</div>
<div style="width:100%;padding:10px;">

<?php



$consulta_thread_panel = Requete ("SELECT *  FROM rel_threads   WHERE id_panel  = '$id_panel' ORDER BY f_rel DESC " , $connexion);
	if (mysqli_num_rows($consulta_thread_panel) > 0 ){
    		$datos_consulta_thread_panel = mysqli_fetch_array($consulta_thread_panel);
        $id_thread = $datos_consulta_thread_panel['id_th'];
        
} else {
$id_thread =0;
}
         
   
 ?>
 
 <div id="box_convers_over<?php echo $id_panel;?>" >
  <div id="scroll_lista_convers_<?php echo $id_panel; ?>" style="width:440px;height:200px;">
 <?php 
 

$consulta_thread_panel = Requete ("SELECT * FROM rel_threads LEFT JOIN threads ON threads.id_th = rel_threads.id_th  LEFT JOIN users   ON id_user = autor_th  WHERE id_panel  = '$id_panel' AND name_th <> '' AND privacy <> '1' ORDER BY f_rel ASC " , $connexion);

if (mysqli_num_rows($consulta_thread_panel) > 0 ){
 
 
 if (!isset($_SESSION['id'])){
 echo '<a href="https://www.facebook.com/dialog/oauth?client_id=set_up_your_own_facebook_key&redirect_uri=http%3A%2F%2F'.$_SERVER['SERVER_NAME'].'%2Findex.php&state=5ebfd7460a8d334921a16cfbfd70183b&scope=email,manage_pages,user_about_me" ><p><u>SignUp with Facebook </u></p></a>';
 } 
  
     while($datos_consulta_thread_panel = mysqli_fetch_array($consulta_thread_panel)){
		
        $id_thread = $datos_consulta_thread_panel['id_th'];
        $name_thread = $datos_consulta_thread_panel['name_th'];
        $name_user = $datos_consulta_thread_panel['name_user'];
        $fb_id = $datos_consulta_thread_panel['fb_id'];
        
	        
$description_complete = stripslashes($datos_consulta_thread_panel['description_th']);
$description_teaser = substr($description_complete,0,110);
        
   

$f_creado = $datos_consulta_thread_panel['f_th'];

$f_creado = time_ago($f_creado);      
			
  $description_complete = str_replace("\n","<br>",$description_complete);	 
  $description_teaser = str_replace("\n","<br>",$description_teaser);	 	 
  $description_teaser = str_replace("<br>","",$description_teaser);	 
	

?>


<div style="width:235px;padding:4px;padding-left:8px;border-bottom:1px solid #eee;margin-bottom:5px;margin-top:5px;" id="item_thread_col_convers_<?php echo $id_myf; ?>">

<a href="javascript:void_()" onclick="show_thread('<?php echo $id_thread; ?>')"  class="texto_13 negro "><?php echo $name_thread;?></a><br />  



 <div id="image_user" style="float:left; padding:4px;padding-left:0px;width:20px;height:20px;display:inline-block;cursor:pointer;"  ><img src="https://graph.facebook.com/<?php echo $fb_id?>/picture" width="20" align="absmiddle" alt="<?php echo $name_user; ?>"></div>



 <div class="texto_10 negro" style="margin-left:0px;width:200px;display:inline-block;letter-spacing:0px;padding:0px;padding-top:0px; " > by<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id; ?>');"   ><?php echo " <span class=\"texto_10 azul\">".$name_user."</span> </a> <br /><span class=\"texto_10 gris\">".$f_creado; ?></span>
 

 </div>

 

 



</div>

<?php
	
/*	
        echo "<div style=\"width:95%;padding-top:8px;padding-bottom:4px;border-bottom:1px solid #e8e8e8;\"><a href=\"javascript:void_()\"  onclick=\"show_thread('".$id_thread."');\"   class=\" texto_14 negro\"> ".$name_thread." </a><br>
	
	<div class=\"texto_11 gris\">".$description_complete."</div>
	
	<a href=\"javascript:void_()\"; onclick=\"show_user('".$fb_id."')\"  class=\" texto_10 azul\"  > by 
 $name_user</a></div>";*/

 }

 ?>
 
      </div> <!-- end scroll -->
 <?php
  
} else {
echo "<div align=\"center\">   <div class=\"texto_13 gris  \" style=\"margin:0 auto;text-align:center;width:79%;\"><br><br><br><br>This post is not connected to any conversations</div> 
";
        
          if (isset($_SESSION['id'])){ } else {
 echo '<a href="https://www.facebook.com/dialog/oauth?client_id=set_up_your_own_facebook_key&redirect_uri=http%3A%2F%2Fmyfiveby.com%2Findex.php&state=5ebfd7460a8d334921a16cfbfd70183b&scope=email,manage_pages,user_about_me" ><p><u>SignUp with Facebook </u></p></a>';
 } 
 echo "</div>";     
$id_thread =0;
}
/* 
*************************************************************************************************************************************
*************************************************************************************************************************************
*
*    end  CONVERSATIONS
*
*************************************************************************************************************************************
*************************************************************************************************************************************
*/
?>
</div>
</div>