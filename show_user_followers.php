<?php 
if (!session_id() || session_id()==""){
	session_start();
}
?>

<?php

require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ("fonction/fonction_requete.php");

$connexion = Connexion ($login_base, $password_base, $base, $host_base);


  
$query_friends = mysqli_query($connexion,"SELECT id_user_f,fb_id,name_user,id_to_follow,id_user_to_follow, bio FROM follow LEFT JOIN users on id_user = id_user_f  WHERE  id_to_follow='$_POST[id_f]' ORDER BY name_user"  );
$num_following=mysqli_num_rows($query_friends);

?>
<div id="scrollbarfollowers<?php echo $_POST['id_u'];?>" style="position: relative; left:0px;float:left;width:100%;height:224px; ">

<?php
while($lista_amigos_view = mysqli_fetch_array($query_friends)){


			$id_user_to_follow = $lista_amigos_view['id_to_follow'];
			$id_user_f = $lista_amigos_view['id_user_f'];
			$id_user_to_f = $lista_amigos_view['id_user_to_follow'];
			$bio_user = $lista_amigos_view['bio'];
			
			  $bio_user = substr($bio_user,0,200);
			
			$id_userfb_id = $lista_amigos_view['fb_id'];
		
		$name_user = $lista_amigos_view['name_user'];
	
	if($name_user){
	
	 									
$comprueba_exists_panelsu = Requete ("SELECT  id_myf FROM myfive_panels  WHERE autor  = '$id_user_f' AND privacy ='0' " , $connexion);
$num_postsu=mysqli_num_rows($comprueba_exists_panelsu);
  
  
  
  
$query_followers_u = mysqli_query($connexion,"SELECT id_user_f FROM follow LEFT JOIN users on id_user = id_user_f  WHERE  id_to_follow='$id_userfb_id' "  );
 
$num_followersu=mysqli_num_rows($query_followers_u); 
	                    $fb_id =  $id_user_f;     
	                    $fb_id_user =  $id_userfb_id;
	
	                              ?>
				      
				      
	   <div style="width:95%"> 
<a href="javascript:void_()"; onclick="show_user('<?php echo $id_userfb_id; ?>');"  class=" negro"  style="float:left;" >	

 <div id="image_user" style="float:left; padding:4px;width:40px;"><img src="https://graph.facebook.com/<?php echo $id_userfb_id; ?>/picture" width="40" align="absmiddle" alt="<?php echo $name_user; ?>" style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;">

</div>
</a>	



<a href="javascript:void_()"; onclick="show_user('<?php echo $id_userfb_id; ?>');"  style="float:left;" >

<div   class="texto_14 negro" style="width: 310px;"  ><?php echo $name_user; ?>&nbsp;&nbsp;<div style="float:right;margin-right:10px;"> <?php include("fonction/action_follow.php"); ?></div>       </a>

<br> <div style="padding-top:0px; width:100%;" class="texto_12 negro"> 

 	<?php echo $num_followersu; ?> followers   |   <?php echo $num_postsu; ?> posts  

 </div>

 <div style="position:relative; width:82%; float:right;right:4px;padding-top:0px;" class="texto_10 gris">

  <?php echo $bio_user;?> 

  

 </div>


          </div>                                                                                      

<div style="width:99%;clear:both;border-top:1px solid #ddd;margin-top:5px;height:10px;"> </div>
          </div>  
<?php 
}

}
 
?> 
</div>



<script type="text/javascript">
	  $('#scrollbarfollowers<?php echo $_POST['id_u'];?>').sbscroller();
</script>

