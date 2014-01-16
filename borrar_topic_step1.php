<?php
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);


$consulta_thread_panel_list =  Requete ("SELECT id_th FROM rel_threads WHERE  id_th  = '$_POST[id_thread]'  " , $connexion);

$num_posts = mysqli_num_rows($consulta_thread_panel_list);

 ?>
 
 <div style="width:99%;text-align:center;" class="texto_13 negro"><br /> 
 
 <span class="texto_16 rojo">Delete this conversation.<br><b>Are you sure?</b></span><br /><br />
 
 There are <?php echo $num_posts; ?> posts in this conversation.
 <br /><br />
 
 <div style="text-align:center;" >
<div id="cancel_new_conversation" class="button white  "  onClick="close_box('delete_panel_conversation_<?php echo $_POST['id_thread'];?>')">Cancel</div>
<div id="confirma_new_conversation" class="button red " onClick="delete_thh('<?php echo $_POST['id_thread']; ?>','<?php echo $_SESSION['id']; ?>')" >Delete!</div>
</div>
 </div>