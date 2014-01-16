<?php
function show_panel($id_panel) {


?>

<div id="panel_<?php echo $id_panel; ?>" class="panel" >
<?php
require ('conf/sangchaud.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

 $comprueba_exists_tit = Requete ("SELECT * FROM myfive_panels  WHERE id_myf  = '$id_panel' " , $connexion);
 
 
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$id_myf = $datos_tit['id_myf'];
 $titulo_panel = $datos_tit['title'];
?>

<div id="caja_frases" >

<?php if (is_owner($_SESSION['id'],$id_panel)){ ?>
<div id="menu_caja" style="float:right; height:20px;padding:4px;"><a href="javascript:void_()" class=" button rosy medium" onclick="edita_panel('<?php echo $id_myf;?>')">Edit</a></div>
<?php } ?>

<div id="box_frases">
<?php 


 echo "<div  class=\"titulo_myfive_panel edit_tit\" id=\"$id_myf\" >".$titulo_panel."</div>";


 $comprueba_exists_frases = Requete ("SELECT * FROM myfive_content   WHERE autor_mf  = '$_SESSION[id]'  AND id_myf = '$id_myf' ORDER BY id_myf DESC" , $connexion);
 
 if (mysqli_num_rows($comprueba_exists_tit) ==0 ){echo"vacío!";}
 
 
 while ($datos_frases = mysqli_fetch_array($comprueba_exists_frases) ){

echo '<div  id="'.$datos_frases['id_mf'].'"    class="linea_frase ">'.$datos_frases['frase_mf'].'</div><div  class="menu_frase"><a href="javascript:void_()" onclick="muestra_texto_extra('.$datos_frases['id_mf'].')">+</a></div>';

echo '<br /><div id="texto_extra_'.$datos_frases['id_mf'].'"    class="texto_frase " style="display:none;">'.$datos_frases['texto_mf'].'</div>';

$cont++;

}

 
 
 ?>
</div>  <!-- fin caja_frases -->
</div> <!-- fin box_frases -->

</div> <!-- fin panel -->
<?php


}

?>