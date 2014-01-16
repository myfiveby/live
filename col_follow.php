<br><br>
<?php 
if (!empty($_SESSION['id'])){
?>

<h3   class="tit_box" >Following<div style="position:relative;margin-top:20px;float:right;margin:0px;width:30px; "><a href="javascript:void_()" onClick="hide_follow_menu()"><img src="img/boton_close.png"></a></div></h3> 
<?php
 	$lista_amigos  =array();
$query_friends = mysqli_query($connexion,"SELECT id_to_follow FROM follow WHERE  id_user_f='".$_SESSION['id']."' "  );
while($lista_amigos_view = mysqli_fetch_array($query_friends)){


		$lista_amigos[] = $lista_amigos_view['id_to_follow'];

}
?>
<div id="box_follow"> 
<?php 



if ( count($lista_amigos)>0 ){
	foreach ($lista_amigos as $key => $value1) {
	
    echo"<div style=\"margin:1px;padding:3px;display:inline-block;\" id=\"avatar_friend_".$value1."\"><a href=\"javascript:void()\"  onClick=\"show_user('".$value1."')\"   class=\" texto_9 negro\"><img src=\"https://graph.facebook.com/".$value1."/picture\" width=\"35\" align=\"absmiddle\" alt=\"\" border=\"0\" ><br />View</a></div>";
}
}
 ?>

</div> 
<?php   
 	$cuantos_amigos_comun=count($_SESSION['friends_comun']);	
 	
	if ($cuantos_amigos_comun>=1)echo"Algunos amigos tuyos ya est&aacute;n en myFIVEby.com <br />";
	//print_r($friends_comun);
	
	foreach ($_SESSION['friends_comun'] as $value) { 
	
	
    echo"<div style=\"padding:2px;display:inline-block;\" id=\"avatar_friend_".$value."\"><img src=\"https://graph.facebook.com/".$value."/picture\" width=\"35\" align=\"absmiddle\" alt=\"\"><br /><a href=\"javascript:void_()\" onClick=\"follow_user('".$value."')\" class=\"texto_9 negro\">Follow</a></div>";
  
    
}
	
	
?>

<?php

} 


?> 