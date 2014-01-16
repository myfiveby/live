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
 $query_comment = Requete("SELECT id_coment, autor_coment,id_fb_autor,texto_coment,name_user,f_coment,rel_feed FROM comments  LEFT JOIN users ON id_user = autor_coment WHERE relacionado_coment='$id_panel' ORDER BY f_coment DESC" , $connexion ); 
 
$num_comments= mysqli_num_rows($query_comment); 
?>

<script src="js/expand_textarea.js"></script>
<script type="text/javascript">

$('textarea.textarea_comment_own').autoResize({
	onBeforeResize: function(){
 original:30 
	},
	onAfterResize: function(){ 
	},maxHeight: 90, original:30 
});

</script>
<div class=" " style="height:26px;padding-top:4px;background:#eee;width:450px;border-bottom:1px solid #ddd;border-top:1px solid #fff;">
<div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:0px; ">
<a href="javascript:void_()" class=" button white small bigrounded"  onClick="ver_content_panel('<?php echo $id_panel;?>')"><b>x</b></a></div>


<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;text-shadow:1px 1px 1px #ffffff;" class=" ">
<img src="img/ico_comment_hover.png"   align="absmiddle"><b>Comments</b></div>

</div>

 
<div id="" style=" float:left;padding:4px;padding-left:0px;background:#ffffff;">
<?php if ( isset($_SESSION['id']) AND $_SESSION['id']!==""){ ?>


<div id="image_user" ><img src="https://graph.facebook.com/<?php echo $_SESSION['fb_id'];?>/picture" width="30" align="absmiddle" alt="<?php echo $_SESSION['name_user']; ?>"></div>



<div  style="position: relative;background: #ffffff;top:0;left:0px;width:390px;display:inline-block;float:left; padding:4px;padding-top:0px;">
 <textarea placeholder="Add a comment..." id="textarea_comment_<?php echo $id_panel; ?>" class="textarea_comment_own" style="width:280px;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;padding:2px;border:1px solid #ccc;background: #ffffff;"></textarea>
 <div class="button medium white bigrounded" id="button_comment_<?php echo $id_panel; ?>" style="display:inline-block;margin-top:5px;float:right;width:55px;" onclick="insert_comments('<?php echo $id_panel; ?>','<?php echo $num_comments; ?>');">Comment</div>
 </div>
 
 <?php }   else {
 echo '<div style="width: 435px;text-align:center;margin-top:10px; padding:4px; "><a href="https://www.facebook.com/dialog/oauth?client_id=set_up_your_own_facebook_key&redirect_uri=http%3A%2F%2F'.$_SERVER['SERVER_NAME'].'%2Findex.php&state=5ebfd7460a8d334921a16cfbfd70183a&scope=email,manage_pages,user_about_me" ><p><u>Sign up with Facebook</u></p></a></div>';
 } ?>
 
<div style="clear: both;"></div>
</div>

<div style="margin-top:10px;clear: both;width: 445px; height:200px;" id="lista_comments_<?php echo $id_panel; ?>">
 <?php
 if ($num_comments==0){
    
echo '<div style="clear: both;"></div>
<div id="no_comments_text" style="width: 435px;text-align:center;margin-top:10px; padding:4px; " class="gris" >Be the first to leave a comment.</div>';    
    
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
 
 </div>
 
 
    <script type="text/javascript"> $('#lista_comments_<?php echo $id_panel; ?>').sbscroller();</script>