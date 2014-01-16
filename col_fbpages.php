<?php  
if (!empty($_SESSION['id'])){  ?>  
	<script type="text/javascript">
$().ready(function(){
		$('#scrollcolfbpages').lionbars();
		    $('#col_fbpages').topZIndex();
	}); // end ready

</script>
 <div class="tit_box" style="cursor:move;height:30px;">
<div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:0px; ">
<a href="javascript:void_()" class=" button white small bigrounded" onClick="close_box('col_fbpages')"><b>x</b></a>

</div>


<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;" class=" texto_14 tit_col_box">Use myFIVEby as:</div>

</div>

	   <script type="text/javascript"> $('#scrollcolfbpages').sbscroller();</script>

<div id="scrollcolfbpages" style="width:255px;height:450px; padding-left:5px;padding-top:5px;">
 <?php
  echo '  
<a href="javascript:void_()"   onClick="muestra_box_fb_lista(\''.$_SESSION['iduser_propietario_fbpages'].'\',\''.$_SESSION['acuser_propietario_fbpages'].'\', \''.$_SESSION['nuser_propietario_fbpages'].'\')" class=" texto_16 blanco "  ><div style="left:0px;float:left;"> <img src="https://graph.facebook.com/'.$_SESSION['iduser_propietario_fbpages'].'/picture" width="30" class="encuadre" align="absmiddle"/></div>   <div class=" texto_12 negro " style="float:left;padding:10px;">'.$_SESSION['nuser_propietario_fbpages'].'</div><div style="clear:both;width:98%; border-bottom:1px solid #eeeeee;margin-bottom:10px;"></div>  </a>';
 
  foreach ($_SESSION['uaccounts']['data'] as $key => $value){
  //print_r($value);
  
  //echo $value['name']."<br>";
  
  if ($value['category'] !== "Application")
  echo '
  
  <a href="javascript:void_()"   onClick="muestra_box_fb_lista(\''.$value['id'].'\',\''.$value['access_token'].'\', \''.$value['name'].'\')" class=" texto_16 blanco "  ><div style="left:0px;float:left;"> <img src="https://graph.facebook.com/'.$value['id'].'/picture" width="30" class="encuadre"align="absmiddle"/></div>   <div class=" texto_12 negro " style="float:left;padding:10px;">'.$value['name'].'</div><div style="clear:both;width:98%; border-bottom:1px solid #eeeeee;margin-bottom:10px;"></div>  </a>
  
  ';
  
  
}
 
 
 ?>
 
 
 
 
 
</div> 
<?php  } ?>