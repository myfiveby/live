<?php if (empty($_SESSION['id'])){?> 
  
 <div align="center" id ="main"  style="position:relative;top:0px;margin: auto 0px;width:980px;height:650px;border:1px solid #cccccc;" >

<div id ="main1" style="height:300px;border:0px solid #ff0000;"> &nbsp;</div>
<div id ="main2" align="left" valign="top" style="postion:relative;top:10px;padding:0px;border:0px solid #ff0000;" >
 
<div id ="blog_main" align="left" valign="top" style="postion:relative;top:10px;padding:0px;margin-left:200px;border:0px solid #ff0000;" >
 <?php		 
$result_ultimosposts= Requete ("SELECT post_status,post_title,guid,post_date FROM wp_posts WHERE post_status = 'publish' ORDER BY post_date DESC  LIMIT 0,6",$connexion);				
	
while($row_ultimosposts= mysqli_fetch_array($result_ultimosposts))	 
	{
	
		$titulo		= utf8_encode($row_ultimosposts["post_title"]); 
		$guid		= utf8_encode($row_ultimosposts["guid"]); 
	
		$post_date		= retour_date_formater($row_ultimosposts["post_date"],3); 
	if (isset($titulo)){
echo "<li style=\"border-bottom:0px dotted #eeeeee;padding:5px;padding-left:0px;\"><!--<a href =\"$guid\" class=\"texto_10 \">$post_date</a>&nbsp;&nbsp;- --><a href =\"$guid\" class=\"texto_15 blanco shine\" target=\"blank\" ><b>$titulo</b></a> &nbsp;&nbsp;<br></li>";}
	
	} 
?> 

</div>
</div>

<div style="clear:both;"></div>

<div id ="mainb" valign="top">

<div id ="colmain1" style="margin:5px;padding:0px;position:relative;top:0px;display:inline-block;width:430px;height:305px;font-size:18px;text-shadow:#eee 1px 1px 1px;color:#999" class="negro" valign="top"> <em> <font color="#b02200"><b>myFIVEby</b></font> is a new place to write about, record and share the things that interest you most. </em> 
 

<img src="img/comingsoon_main.gif"  ><br><br>
<!--<font color="#666">coming soon...</font>-->
<?php 
if (!empty($_SESSION['id'])){

	//header("Location:home.php ");
  
  }else{
  include("login_facebook_main.php");
  } ?>
 
 
 
 
 
 </div>
 
<div id ="colmain3" style="position:relative;top:50px;display:inline-block;width:410px;height:225px ">
<!-<iframe src="http://player.vimeo.com/video/27433685?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0b0b" width="400" height="225" frameborder="0"></iframe>--></div>

</div>

<div style="clear:both;">&nbsp;</div>

<div id ="foot_main">
 
<a href="http://www.soooshial.com/myfiveby" title="soooshial" target="blank"><img src="img/soooshial.png" alt="soooshial"></a>  

<a href="https://twitter.com/#!/myfiveby" title="Twitter" target="blank"><img src="img/twitter.png" alt="Twitter"></a> 
<a href="https://www.facebook.com/myfiveby" title="Facebook" target="blank"><img src="img/facebook.png" alt="Twitter"></a>   
<a href="http://vimeo.com/myfiveby" title="Facebook" target="blank"><img src="img/vimeo.png" alt="Vimeo"></a>    
<a href="http://<?php echo($_SERVER['SERVER_NAME']); ?>" title="myfiveby"  >
<br><br><b>myfiveby.com</b></a> 
<br />
<a href="mailto:harry@myfiveby.com" title="harry@myfiveby.com"  >harry@myfiveby.com</a> <br><br>



</div>
 
</div>
 


<?php } else {





include("main_user.php");


} ?>