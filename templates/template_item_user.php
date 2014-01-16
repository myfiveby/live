<div id="u_<?php echo $fb_id_user; ?>"> 

<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id_user; ?>');"  class=" negro"  style="float:left;" >	
 <div id="image_user" style="float:left; padding:4px;width:40px;"><img src="https://graph.facebook.com/<?php echo $fb_id_user; ?>/picture" width="40" align="absmiddle" alt="<?php echo  ($name_user); ?>" style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;">
</div>
		</a>	 

<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id_user; ?>');"  style="float:left;" >
<div   class="texto_12 negro"   ><?php echo  ($name_user); ?>      </a>
<br>  
 <div style="position:relative; width:220px; float:left;left:0px;padding-top:0px;" class="texto_10 gris">
  <?php
    $bio_user = substr($bio_user,0,200);
  echo $bio_user;?> 
  
 </div>
 
 <?php echo "  <div class=\"texto_10 gris\"  style=\"display:inline-block;\"> &#9638; ".$f_creado; ?></div>
                                                                                         
			 
</div>

<div style="width:95%;clear:both;border-top:1px solid #ddd;margin-top:5px;height:10px;margin-left:4px;"> </div> 