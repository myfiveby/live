<?php if (!session_id() || session_id()==""){
	session_start();
} ?>  
<div class="texto_11 negro" style="padding:2px;margin-bottom:20px;height:60px;" valign="top">
<p style="position:relative;text-align:left;display:inline-block; width:136px;height:60px;top:0;"><img src="img/connect_twitter.jpg"  width="136"></p> 
<p style="text-align:left;display:inline-block; width:130px;" class="gris texto_12" ><span class="texto_11">Connect your Twitter account and post directly to myFIVEby using the hastag <b>#my5by</b>.</span></p>


    <div style="clear:both;"></div>
    <div style="float:right">
 <input type="text" value=""  placeholder="Your Twitter user name" style="-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;width:180px;padding:2px;border:1px solid #ccc;height:22px; " id="user_twitter"><div class="button blue small" style="cursor:pointer;display:inline;" onClick="add_tw_to_my5()">Connect</div>
                              </div>
 </div>
    <div style="clear:both;height:10px;"></div>
<div id="box_result_parse" class="texto_11 negro" style="width:180px;padding:4px;"></div> 
 <?php
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexiontw = Connexion ($login_basetw, $password_basetw, $basetw, $host_basetw); 
$today=date("Y-m-d"); 
$consulta_tw_datos = Requete ("SELECT *  FROM connections_twitter  WHERE banned_connection  = '0' AND status_connection='1' AND  user_myfiveby='$_SESSION[id]' " , $connexiontw);

if (mysqli_num_rows($consulta_tw_datos) !== 0){ 
															 
while ($datos_user_tw_conn = mysqli_fetch_array($consulta_tw_datos)){

		$id_user_my5 = $datos_user_tw_conn['user_myfiveby'];
		$twitter_name = $datos_user_tw_conn['user_twitter'];
		$id_connection_spider = $datos_user_tw_conn['id_tw_connection'];
  
	  
	  echo  '<div id="buton_'.$twitter_name.'" class="btn white small texto_12 bigrounded" style="padding:5px; display:inline-block;text-align:left;margin:4px;"><img src="img/ico_sh_twitter.png" border="0" valing="absmiddle"><div style="display:inline-block;top:-5px;">@'.$twitter_name.'</div><div style="display:inline-block;position:relative;top:-10px;cursor:pointer;" class=" texto_12 " onClick="remove_tw_to_my5(\''.$_SESSION['id'].'\',\''.$twitter_name.'\')">x</div></div>';
	  
		} 
	
	
	}
?>


<script type="text/javascript">
$().ready(function(){
//	$('#box_connection_twitter_scroll').lionbars();
}); // end ready

function add_tw_to_my5(){
  //alert(url_blog);
 var user_twitter = $("#user_twitter").val();
 
 if  (!user_twitter) { 
  alert("Type your twitter user name, please.");
 
 $("#user_twitter").css("border","1px solid #ff0000");
 
 } else {
 
$.ajax({ data:  { 
 "user_twitter":user_twitter },
 url:   'tw_connection/action_save_tw.php', type:
'post', beforeSend: function () {

$("#box_result_parse").html('Connecting ...');
  },


error: function(response) { alert(response + " error!"); },

 success:  function (response) {

$("#box_result_parse").html(response);

$("#box_result_parse").append('<div id="buton_'+user_twitter+'"  class="btn white medium texto_14 bigrounded" style="font-size:14px;padding:5px;float:left;text-align:left;"><img src="img/ico_sh_twitter.png" border="0" valing="absmiddle"> '+user_twitter+'<div style="display:inline-block;position:relative;top:-10px;" class="  texto_12 " onClick="remove_tw_to_my5(\'<?php echo $_SESSION['id']; ?>\',\''+user_twitter+'\')"> [x]</div></div>');


 $("#user_twitter").val("");
 
} }); // end ajax

}
}

function remove_tw_to_my5(user_my5,user_twitter){

$.ajax({ data:  { 
 "user_twitter":user_twitter,
 "user_my5":user_my5 },
 url:   'tw_connection/action_delete_tw.php', type:
'post', beforeSend: function () {


$("#box_result_parse").html('Connecting ...');
  },


error: function(response) { alert(response + " error!"); },

 success:  function (response) {

$("#box_result_parse").html(response);

 $("#user_twitter").val("");
 
$("#buton_"+user_twitter).fadeOut(); 
 
} }); // end ajax
 
 
}
</script > 
 