


<script type="text/javascript">

function remove_rss_to_my5_wp(id_rss){
$.ajax({ data:  { 
 "id_rss":id_rss },
 url:   'xml_connection/delete_rss.php', type:
'post', beforeSend: function () {
    
$("#box_result_parse_xml_wp").html("<img src=\"img/loader.gif\"> ");
  },
 success:  function (response) {
$("#box_result_parse_xml_wp").html("");
$("#buton_wp_"+id_rss).remove();
} }); // end ajax
}




function search_rss_to_add_wp(){

var url_blog_wp = $("#url_blog_wp").val();

$.ajax({ data:  { 
 "url_blog":url_blog_wp },
 url:   'xml_connection/parse_url_blog_wp.php', type:
'post', beforeSend: function () {
    
$("#box_result_parse_xml_wp").fadeIn(300);
$("#box_result_parse_xml_wp").html('Wait ...');
 
  },
 success:  function (response) { 
$("#box_result_parse_xml_wp").html(response);

$(".item_rss_connected").fadeOut(300);
} }); // end ajax
}




function add_rss_to_my5_wp(url_blog_wp){
  //alert(url_blog);
$.ajax({ data:  { 
 "url_blog":url_blog_wp },
 url:   'xml_connection/action_save_rss.php', type:
'post', beforeSend: function () {
    
$(".item_rss_connected").fadeIn(300);
$("#box_result_parse_xml_wp").html('Connecting ...');
 },
success:  function (response) { 
$("#new_rss_item_wp").append(response);

$("#box_result_parse_xml_wp").fadeOut(300);

} }); // end ajax


}

 </script>

 <div class="texto_11 negro" style="padding:2px;" valign="top">

<div style=" text-align:left;display:inline;float:left;"><img src="img/connect_rss.jpg"   ></div> 

<div style="text-align:left;display:inline;margin-top:40px;width:420px;padding-top:30px; " class="gris texto_14" > 
<p>
Connect your existing content via RSS and make it easier for readers to access your latest posts! 
</p>
 </div>





    <div style="clear:both;"></div>

     


    <div style="float:center;" align="center">

 <input type="text" value="" placeholder="Website or RSS feed"  style="width:360px;height:22px;padding:2px;border:1px solid #ccc;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;margin-left:20px;font-size:14px;" id="url_blog_wp" class="texto_12"> <div class="button blue medium" style="cursor:pointer;display:inline;" onClick="search_rss_to_add_wp()">Connect</div>  </div>
    <div style="clear:both;"></div>

     
<div id="box_result_parse_xml_wp" style="width:560px;height:30px;padding:2px;text-align:center;" class="texto_12 gris"> </div>

<div id="rss_list_settings_wp "  style="width:560px;height:60px;">

<div id="new_rss_item_wp">

</div>

<?php

require ('conf/sangchaud.php');

require ('fonction/fonction_connexion.php');

require ('fonction/fonction_requete.php'); 

 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$today=date("Y-m-d");

 

 

$consulta_rss_datos = Requete ("SELECT *  FROM connections_rss  WHERE banned_connection  = '0' AND status_connection='1' AND  user_myfiveby='$_SESSION[id]' " , $connexion);



if (mysqli_num_rows($consulta_rss_datos) !== 0){ 



while ($datos_user_rss_conn = mysqli_fetch_array($consulta_rss_datos)){



		$id_user_my5 = $datos_user_rss_conn['user_myfiveby'];

		$rss_name = $datos_user_rss_conn['url_rss'];

		$id_connection_spider = $datos_user_rss_conn['id_rss_connection'];

  

	  

	  echo  '<div id="buton_wp_'.$id_connection_spider.'" class="texto_13 gris item_rss_connected" style="padding:5px;width:90%;float:left;text-align:left;margin-left:15px;">  <div style="display:inline-block;cursor:pointer;" class="button white small texto_12 " onClick="remove_rss_to_my5_wp(\''.$id_connection_spider.'\',\''.$_SESSION['id'].'\',\''.$rss_name.'\')">  x </div> '.$rss_name.'</div>';

	  

		} 

	

	

	}

?>



	</div>



	</div>

<script type="text/javascript">
$().ready(function(){
$('#box_settings_twitterconn').lionbars();
$('#box_settings_rssconn').lionbars();

 }); // end ready
 </script>
