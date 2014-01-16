<?php
function is_owner($autor,$id_myf) {
require ('conf/sangchaud.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
$comprueba_is_panel = Requete ("SELECT autor FROM myfive_panels   WHERE autor  = '$autor'  AND id_myf = '$id_myf'  " , $connexion);
 if (mysqli_num_rows($comprueba_is_panel) == 0 ){return false;} else {return true; }
// mysqli_close($connexion);
// mysqli_free_result($comprueba_is_panel);
}
function url_object($id, $tipo,$date){
$date_unix=1;
$url_id = $id.$tipo.$date_unix;
return $url_id; 
}


function validate_html_insert($cadena){ 
return $cadena; 
} 

/*
function validate_html_insert($cadena){ 
$cadena = htmlspecialchars($cadena); 
$cadena = trim($cadena); 
$cadena = stripslashes($cadena); 
$cadena = nl2br($cadena); 
return $cadena; 
} 
*/






function privacy_post($post,$user){
    /*
require ('conf/sangchaud.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$comprueba_is_priv = Requete ("SELECT id_post_priv, users_allow_priv FROM rel_privacy_posts   WHERE IN('$post', id_post_priv)" , $connexion);


if ($comprueba_is_priv){echo "false";} else {echo "true"; }




mysql_close($connexion);
mysql_free_result($comprueba_is_panel); 
    
    */
}







function show_item_post(){
	/*$fb_id_user="";
	$name_user=""; 
	$id_post="";  
	$title=""; 
	$loves="";
	$f_creado="";  */

?>

   
<div id="image_user"  style="float:left; padding:4px;width:40px;height:60px;display:inline-block;cursor:pointer;" onclick="show_user('<?php echo $fb_id_user; ?>');"  ><img src="https://graph.facebook.com/<?php echo $fb_id_user;?>/picture" width="40" align="absmiddle" alt="<?php echo $name_user; ?>"  style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;"></div>
 				 
<div style="position:relative; width:160px; float:left;left:0px;padding-top:0px;text-align:left;"  class="texto_10 gris">

<a  href="javascript:void_()" onclick="show_panel_main('<?php echo $id_myf; ?>');"  class="texto_13 negro"><?php echo $title; ?> </a>

 	           
  <div class="texto_10 negro" style="float:left;margin-left:0px;width:145px;display:inline-block;letter-spacing:0px;padding:0px;padding-top:0px; " > by<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id_user; ?>');"   ><?php echo " <span class=\"texto_10 azul\">".$name_user."</span> </a> <br /><span class=\"texto_10 gris\">".$f_creado; ?></span></div>
  
 </div>	
 
 

									 <div id="ico_love_box<?php echo $id_myf; ?>" style="margin:0px;display:inline-block;float:right; height:18px;"  class="button2 ico_love_base"> 
<div  class=" negro ico_love_base"   style="display:inline-block;height:19px;"><?php echo $loves; ?></div> 
</div>
 
 
 
 
<div style="width:95%;clear:both;border-top:1px solid #ddd;margin-top:5px;height:10px;margin-left:4px;"> </div>
 
<?php




}



?>