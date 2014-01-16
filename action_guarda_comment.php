<?php
if (!session_id() || session_id()==""){
	session_start();
}

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/time_ago.php');
 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);

/*



`comentarios` (
`id_coment` INT( 22 ) NOT NULL AUTO_INCREMENT ,
`autor_coment` INT( 22 ) NOT NULL ,
`texto_coment` TEXT NOT NULL ,
`f_coment` DATETIME NOT NULL ,
`tipo_coment` INT( 1 ) NOT NULL ,
`relacionado_coment` VARCHAR( 200 ) NOT NULL ,
`sub_coment` VARCHAR( 200 ) NOT NULL ,
`estado` INT( 1 ) NOT NULL ,
PRIMARY KEY (  `id_coment` )

*/


  $comprueba_location = Requete ("SELECT autor,id_myf FROM myfive_panels  WHERE id_myf  = '$_POST[id_panel]'    " , $connexion);

  $datos_location = mysqli_fetch_array($comprueba_location) ; 

  $autor_post = $datos_location['autor'];
  
  $_POST['txt_comment'] = addslashes($_POST['txt_comment']);
  
  

$_POST['txt_comment'] = str_replace("\n","<br>", $_POST['txt_comment']);
		
$query2 = mysqli_query($connexion,"INSERT INTO comments (autor_coment,id_fb_autor, texto_coment, f_coment, tipo_coment, relacionado_coment, sub_coment, estado) VALUES ('$_SESSION[id]','$_SESSION[fb_id]','$_POST[txt_comment]',NOW(), '$_POST[tipo_comment]','$_POST[id_panel]','$_POST[sub_comment]','$_POST[estado]'      )");

		$id_comment= mysqli_insert_id($connexion);  


require_once('fonction/function_do_feed.php'); 
do_feed($_SESSION['fb_id'], $_SESSION['username'], '7', '', 'p', $_POST['id_panel'], $_SESSION['id']);



require_once('fonction/function_do_notifications.php'); 
do_notif($autor_post,  '7', $_POST['id_panel'], 'p', $_POST['id_panel'], $_SESSION['id']);

		
		
require_once("fonction/fucntion_5mailer_aws.php");
send_notif_5('2', $id_comment );


  $_POST['txt_comment'] = stripslashes($_POST['txt_comment']);
  
  
  
$id_panel = $_POST['id_panel'];
$id_user= $_SESSION['id'];
 $query_comment = Requete("SELECT id_coment, autor_coment,id_fb_autor,texto_coment,name_user,f_coment,rel_feed FROM comments  LEFT JOIN users ON id_user = autor_coment WHERE relacionado_coment='$id_panel' ORDER BY f_coment DESC" , $connexion ); 
 
$num_comments= mysqli_num_rows($query_comment); 
  
 if ($num_comments==0){
    
echo '<div style="clear: both;"></div>
<div id="no_comments_text" style="width:98%;text-align:center;margin-top:10px;float:left;padding:4px;padding-left:0px;" class="gris" >Be the first to leave a comment.</div>';    
    
 } 
 while($query_comment_view = mysqli_fetch_array($query_comment)){
		$id_autor = $query_comment_view['autor_coment'];
		$id_fb_autor =  $query_comment_view['id_fb_autor'] ; 
		$texto_coment =  $query_comment_view['texto_coment'] ; 
		$user_name =  $query_comment_view['name_user'] ; 
		$id_coment =  $query_comment_view['id_coment'] ; 
		$rel_feed =  $query_comment_view['rel_feed'] ; 
		
		$f_creado = time_ago($query_comment_view['f_coment']);
                
                 
		$cont++;
		
	//	echo $id_user_f."<br /><br />";
        
?>

<div style="clear: both;"></div>
<div id="item_commment_<?php echo $id_coment; ?>" style="width:410px;margin-top:10px;float:left;padding:4px;padding-left:0px;">
<div id="image_user" style="cursor:pointer;float:left;display:inline-block;" ><img src="https://graph.facebook.com/<?php echo $id_fb_autor?>/picture" width="30"  onclick="show_user('<?php echo $id_fb_autor; ?>');"   align="absmiddle" alt="<?php echo $id_fb_autor; ?>">

<?php if ($_SESSION['id'] == $id_autor){?>
<a href="javascript:void();" onClick="delete_comments('<?php echo $id_panel; ?>','<?php echo $num_comments; ?>','<?php echo $id_coment; ?>','<?php echo $_SESSION['id']; ?>')" >x</a>
<?php } ?>
</div>

<div class="texto_11 negro" style="border-bottom:0px solid #ddd;width:360px;display:inline-block;float:left; padding:4px;padding-top:0px;
 "> <div class="texto_12 gris"   > <a href ="javascript:void_();" onclick="show_user('<?php echo $id_fb_autor; ?>');" ><?php echo $user_name ; ?></a></div>
<?php echo $texto_coment; ?></a>
 <div class="texto_10 gris"><?php echo $f_creado; ?></div>
 </div>
 
 </div>
<?php
        
		
 }
  
 

 
 ?>

    <script type="text/javascript"> $('#lista_comments_<?php echo $id_panel; ?>').sbscroller();</script>

<!--
 <div style="clear: both;"></div>
<div id="item_commment_<?php //echo $id_comment; ?>" style="width:410px;margin-top:10px;float:left;padding:4px;padding-left:0px;">
<div id="image_user"  style="cursor:pointer;float:left;display:inline-block;" ><img src="https://graph.facebook.com/<?php //echo $_SESSION['fb_id']?>/picture" onclick="show_user('<?php //echo $_SESSION['fb_id']; ?>');"   width="30" align="absmiddle"  >
 
<a href="javascript:void();" onClick="delete_comments('<?php //echo $_POST['id_panel']; ?>','<?php //echo $_POST['num_comments']; ?>','<?php //echo $id_comment; ?>','<?php //echo $_SESSION['id']; ?>')">x</a>
 
</div>

<div class="texto_11 negro" style="border-bottom:0px solid #ddd;width:360px;display:inline-block;float:left; padding:4px;padding-top:0px;
 "> <div class="texto_12 azul" onclick="show_user('<?php //echo $_SESSION['fb_id']; ?>');"   style="cursor:pointer;text-shadow: #eee 1px 1px 1px; " ><?php //echo ($_SESSION['username']) ; ?></div>
 <?php //echo $_POST['txt_comment']; ?>
 <div class="texto_10 gris">Just now.</div>
 </div>
 
 </div>
 -->
 
 