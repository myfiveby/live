<div id="p_<?php echo $id_myf; ?>">																								 																											 
<div id="image_user"  style="float:left; padding:4px;width:40px;height:60px;display:inline-block;cursor:pointer;" onclick="show_user('<?php echo $fb_id_user; ?>');"  ><img src="https://graph.facebook.com/<?php echo $fb_id_user;?>/picture" width="40" align="absmiddle" alt="<?php echo $name_user; ?>"  style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;"></div>
 				 
<div style="position:relative; width:160px; float:left;left:0px;padding-top:0px;text-align:left;"  class="texto_10 gris">

<a  href="javascript:void_()" onclick="show_panel_main('<?php echo $id_myf; ?>');"  class="texto_13 negro"><?php echo $title; ?> </a>

 	           
  <div class="texto_10 negro" style="float:left;margin-left:0px;width:145px;display:inline-block;letter-spacing:0px;padding:0px;padding-top:0px; " > by<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id_user; ?>');"   ><?php echo " <span class=\"texto_10 azul\">".$name_user."</span> </a> <br /><span class=\"texto_10 gris\"> &#9638; ".$f_creado; ?></span></div>
  
 </div>	
 
 

									 <div id="ico_love_box<?php echo $id_myf; ?>" style="margin:0px;display:inline-block;float:right; height:18px;"  class="button2 ico_love_base"> 
<div  class=" negro ico_love_base"   style="display:inline-block;height:19px;"><?php echo $loves; ?></div> 
</div>
 
 
 
 
<div style="width:95%;clear:both;border-top:1px solid #ddd;margin-top:5px;height:10px;margin-left:4px;"> </div>  </div>