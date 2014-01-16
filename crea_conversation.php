<?php if (!session_id() || session_id()==""){
	session_start();
} ?>
<br>

<div style="width:100%;margin:0 auto;"  >

<div class="texto_14" style="padding:0px;padding-bottom:10px;text-align:left;">Start a new topic:</div>
<span class="texto_14 azul">Topic title:</span> <input type="text" style="width:210px;" value="<?php echo $titulo_panel; ?>" name="name_new_conversation" id="name_new_conversation" class="texto_14"><br>


<?php
if ($_SESSION['id'] !== $_POST['id_user']) {?>
<br> <h4 style="font-size:12px;margin:0px;font-weight:normal;" class="azul">Connect your post:</h4>

<?php

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$comprueba_exists_panels = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '$_SESSION[id]' ORDER BY orden ASC" , $connexion);

echo"<select name=\"my_panels_at_converse\" id=\"my_panels_at_converse\" style=\"width:240px;word-wrap:break-word;\" class=\"texto_12 negro\" onChange=\"add_to_conversation(this)\">";
echo "<option value=\"--\">Select a panel</option>";
while ($datos_panels = mysqli_fetch_array($comprueba_exists_panels) ){
?>
<option value="<?php echo $datos_panels['id_myf']; ?>" style="width:100%;word-wrap:break-word;"><?php echo $datos_panels['title']; ?></option>
<?php
}  // end while
echo "</select>";
?><br> 
<div style="width:90%;margin:0 auto;" align="center">- or -<br>
<div id="confirma_new_conversation" class="button   white small texto_11" onClick="open_crear_new_panel('<?php echo $_SESSION['id']; ?>','new')" >Create a new panel</div>
<input type="hidden" name="panel_b" id="panel_b" >
</div>
<?php } ?>
<br><br>
<div style="text-align:center;"><div id="confirma_new_conversation" class="button blue  " onClick="crear_new_convers('<?php echo $_POST['panel']; ?>','<?php echo $_SESSION['id']; ?>')" >Create a new topic</div></div>


<br>

</div>
 

<br>