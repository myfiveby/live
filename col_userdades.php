
<div style="clear:both;">  </div>
<div class="texto_12" style="padding:15px;">

 <?php  $full_url_panel= "http://www.sioque.es/myfiveby/".$_SESSION['url_user'] ; ?>
 
<div style="position:relative;float:left;padding:0px;display:inline-block;"><img src="https://graph.facebook.com/<?php echo $_SESSION['fb_id']; ?>/picture" width="35" align="absmiddle" alt="<?php echo $_SESSION['username']; ?>"></div>                                                                                
 <div style="position:relative;display:inline-block;padding-top:8px;padding-left:8px;"><span class="texto_19 azul"><?php echo $_SESSION['username'] ;?></span><br><br></div>
 


 <div   id="box_sharer_<?php echo $_SESSION['url_user']; ?>"  style="border-bottom:1px solid #ddd;padding:4px;padding-bottom:10px;display:inline-block; ">
 
 

  <div id="field_url_obj_<?php echo $_SESSION['url_user']; ?>" style="display:none;">URL: <input type="text" value="<?php echo $full_url_panel; ?>" class="texto_10 " style="color:#999999;border:1px solid #c8c8c8;padding:2px;width:225px;margin:3px;"></div>
 
 
 <span class="texto_10 gris">Share:</span>

                                                                       
<a href="javascript:void_()" target="_blank" style="color:#999999;font-size:10px;height:20px;" class="button2"  onClick="show_share('<?php echo $_SESSION['url_user']; ?>')" title="View link" ><img src="img/ico_sh_link.png" border="0"></a>



<script>function fbs_click() {u='<?php echo $full_url_panel; ?>';t='<?php echo $titulo_panel; ?>';window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click()" target="_blank" class="button2"  title="Share on Facebook" ><img src="img/ico_sh_facebook.png" border="0"></a>
<a href="http://twitter.com/home?status=Reading: <?php echo $_SESSION['username']; ?> at @myfiveby more... <?php echo $full_url_panel; ?>" title="Click to share this post on Twitter" target="_blank" class="button2"  title="Share on Twitter" ><img src="img/ico_sh_twitter.png" border="0"></a>
<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $full_url_panel; ?>&title=<?php echo $_SESSION['username']; ?>&source=myfiveby.com" target="_blank" class="button2"  title="Share on Linkedin" ><img src="img/ico_sh_linkedin.png" border="0" ></a>
 
 
<a href="  javascript:(    function(){var w=480;var h=380;var x=Number((window.screen.width-w)/2);var y=Number((window.screen.height-h)/2);window.open('https://plusone.google.com/_/+1/confirm?hl=en&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'','width='+w+',height='+h+',left='+x+',top='+y+',scrollbars=no');})();" class="button2"   title="Share on Google+" ><img src="img/ico_sh_gplus.png" border="0"></a>
 
 </div>

<div style="padding-left:0px;">
<br>
<a href="settings.php" id="link_settings" class="texto_13 negro">Settings</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="exit.php"  class="texto_13 negro">Logoff</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="about.php"  class="texto_13 negro" target="_blank">About</a>





</div> 
</div>