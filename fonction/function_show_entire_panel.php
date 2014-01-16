<?php  
$comprueba_exists_frases = Requete ("SELECT * FROM myfive_content   WHERE   id_myf = '$id_panel' ORDER BY id_myf DESC" , $connexion);
 
 if (mysqli_num_rows($comprueba_exists_frases) ==0 ){echo" ";}
 
 $datos_frases = mysqli_fetch_array($comprueba_exists_frases);
 
 $tipo_content = $datos_frases['tipo'];
 $texto_post = $datos_frases['frase_mf'];
  
 
 $height_post = "350px;";
//if (strlen($texto_post) == 0 ){ $height_post = "30px;";} 
 
  function autoblank($text) {
 $return = str_replace('<a href=', '<a target="_blank" href=', $text);
 $return = str_replace('<a target="_blank" href="', '<a href="', $return);
 $return = str_replace('<a target="_blank" href="#', '<a href="#', $return);
 
 
 $return = str_replace('<a href=', '<a target="_blank" href=', $text);
 
 
 return $return;
 }

$texto_post =  autoblank($texto_post);
 
 $texto_post = str_replace('<p>&nbsp;</p>', ' ', $texto_post); 
 $texto_post = str_replace('<p></p>', ' ', $texto_post); 
 
?> 
 
 
 
<div id="scrollcolpsotpanel<?php echo $id_panel; ?>" style="width:450px; ?>;"  class="scrollpanel tse-scrollable ">

 
 <div class="tse-content">


<style>
   #<?php echo $datos_frases['id_mf'];?> img{
    
    max-width:420px;
    }  
    
    
</style>

<?php
 
  

echo '<div  id="'.$datos_frases['id_mf'].'"    class="linea_post " style="width:420px;border-bottom:0px solid #eee;
">'.stripslashes($texto_post).'</div>';

 
 ?>



</div>



</div>

   <script type="text/javascript">
   
   $("#<?php echo $datos_frases['id_mf']; ?> img").css("max-width","420px"); 
   $("#<?php echo $datos_frases['id_mf']; ?> img").css("max-height","100%");
   
   
   
  /*  $('#scrollcolpsotpanel<?php echo $id_panel; ?>').sbscroller('refresh');
   
   $("#<?php echo $datos_frases['id_mf']; ?> img").css("max-width","410px");

$('.scrollpane').sbscroller('refresh');
   */
   </script>
   
   
  <script>
  $(document).ready(function() {
    // Initialize scrollers.
    $('.scrollpanel').TrackpadScrollEmulator();
    $('.scrollpanel').TrackpadScrollEmulator('recalculate'); 
  });
  </script>
  
  