<?php if (!session_id() || session_id()==""){
	session_start();
} ?>
<div style="clear:both;"></div>
<div style="width:200px;margin:0 auto; "  >
 
<br>  
<h4 style="font-size:14px;margin:5px;font-weight:normal;">Connect your post:</h4>

<?php

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$comprueba_exists_panels = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '$_SESSION[id]' ORDER BY orden ASC" , $connexion);

echo"<select name=\"my_panels_at_converse\" id=\"my_panels_at_converse\" style=\"width:180px; \" class=\"texto_14 azul\" onChange=\"add_to_conversation(this)\">";
echo "<option value=\"--\">Select a panel</option>";
while ($datos_panels = mysqli_fetch_array($comprueba_exists_panels) ){
?>
<option value="<?php echo $datos_panels['id_myf']; ?>" style="width:200px;word-wrap:break-word;"><?php echo $datos_panels['title']; ?></option>
<?php
}  // end while
echo "</select>";
?><br> 
<div style="width:200px;margin:0 auto;" align="center">- or -<br>
<div id="confirma_new_conversation" class="button   white small texto_11" onClick="open_crear_new_panel(<?php echo $_SESSION['id']; ?>, '<?php echo $_POST['thread']; ?>')" >Create a new panel</div>
<input type="hidden" name="panel_b" id="panel_b" >
<input type="hidden" name="thread" id="thread" value="<?php if( isset($_POST['thread'])){echo $_POST['thread'];} ?>">
</div>
<br><br>
<div style="text-align:center;">
<div id="cancel_new_conversation" class="button white  " onClick="close_u_panel_conversation('<?php echo $_POST['thread']; ?>')" >Cancel</div>
<div id="confirma_new_conversation" class="button blue  " onClick="conf_add_new_convers('<?php echo $_POST['panel']; ?>','<?php echo $_SESSION['id']; ?>','<?php echo $_POST['thread']; ?>')" >Add!</div>
</div>


<br>

</div>
