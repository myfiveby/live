  <div id="menu_caja" style="display:inline-block;float:right; height:20px;padding:1px;padding-top:4px;padding-right:2px;"><a href="javascript:void_()" class=" button white small bigrounded" onclick="close_box('add_embed_<?php echo $_POST['thread']; ?>')"><b>x</b></a></div>
<span class="blanco">Copy and Paste the following snippet of code to embed this on other websites: </span><br>

<script type="text/javascript"> 
function select_all()
{
var text_val=eval("document.fmyfiveby_t_<?php echo $_POST['thread']; ?>.ftmyfiveby_t_<?php echo $_POST['thread']; ?>");
text_val.focus();
text_val.select();
}
</script>

<form name="fmyfiveby_t_<?php echo $_POST['thread']; ?>">
<textarea name="ftmyfiveby_t_<?php echo $_POST['thread']; ?>" onClick="select_all();" style="margin:10px;width:95%;height:160px;border:1px solid #ccc;color:#666;font-size:11px;">
 <div id="w_my5by_topic" class="w_my5by_topic" data-id="<?php echo $_POST['thread']; ?>"></div>
<script type="text/javascript">var my5by_topic=<?php echo $_POST['thread']; ?>;var uvOptions = {};(function() { var uv =document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;    uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'myfiveby.com/widget/embed_thread.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);  })();</script>  
</textarea>
</form>
