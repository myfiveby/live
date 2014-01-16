<?php
	if (!session_id() || session_id()==""){
		session_start();
	}
	$id_myf  = 0;$_POST['p'] = 0;
$_GET['p'] = $_POST['p'];
require ('conf/sangchaud.php');
require ('lib/myfiveby.php');
$sess_id = (isset($_SESSION['id'])) ? $_SESSION['id'] : "";
$sess_fb_id = (isset($_SESSION['fb_id'])) ? $_SESSION['fb_id'] : "";
$sess_user_name = (isset($_SESSION['user_name'])) ? $_SESSION['user_name'] : (isset($_SESSION['username'])) ? $_SESSION['username'] : "";
$post_th = (isset($_POST['th'])) ? $_POST['th'] : "0";
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
$titulo_panel = (isset($titulo_panel)) ? $titulo_panel : "";
$cont=0;
?>
<script type="text/javascript"  language="javascript" src="js/jquery.wordcount.js"></script>
<script type="text/javascript" >
	setInterval("save_draft_newpost('<?php echo ($sess_id); ?>')",10000);
	$("#t_10").charCount({
	    allowed: 140,		
	    warning: 20,
	    counterText: ''	
	});
	function largestZindex(element) {
    var allObjects = $(element);
    var allObjectsArray = $.makeArray(allObjects);
    var zIndexArray = [0];
    var largestZindex = 0;
    for (var i = 0; i < allObjectsArray.length; i++) {
          var zIndex = $(allObjectsArray[i]).css('z-index');
          zIndexArray.push(zIndex);
    }
    var largestZindex = Math.max.apply(Math, zIndexArray);
    return largestZindex;
	};
	$(function() { 
		$( ".panel" ).draggable({  cursor: "move", stack:"div", scrollSensitivity:1,containment: "#escenario" , handle:".handle_panel", opacity: 1  });
	});
	var currentRotation=null;

	function checkOrientAndLocation(){
		if(currentRotation != window.orientation){
			setOrientation();
		}
	}

	function show_privacy_users_panel(post){
		$("#box_panel_privacy_"+post).fadeIn(500);
	}
</script> 
<style>
	#draggable { width: 100px; height: 100px; padding: 0.5em; float: left; margin: 10px 10px 10px 0; }
	#droppable { width: 150px; height: 150px; padding: 0.5em; float: left; margin: 10px; }
</style>
<script type="text/javascript">
	$(function() { 
		$("#panel_0").click(function(){$(this).topZIndex();});
	});
</script>
  
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
	function remove_picture_fpost(id_pic_, user_,img_name_) {
		$("#listItem_"+id_pic_).fadeOut(200); $.ajax({
			url:   'action_remove_picture_post.php',
			data:  {"user_":user_, "id_pic_":id_pic_, "img_name_":img_name_},
			type:  'post',
			beforeSend: function () {},
			error: function(response) { alert(response + " error!"); },
			success:  function (response) {}
		}); // end ajax
	}
</script>
<style>
	#box_pictures_inpost ul{position:relative;top:0;clear:both;}
	#box_pictures_inpost li{margin:0px;padding:0px;position:relative;top:0;display:inline-block; }
	#box_pictures_inpost > li { float: left; }
</style>
<div id="panel_0" class="panel panel_drag "  style="width:450px;position:absolute;left:30%;top:15%;margin-bottom:40px;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;">
<div id="caja_frases" style="background: #f1f1f1;"> 
<div class="handle_panel" style="background: transparent url('img/fons_panel.png') repeat-x top center;">
<div id="menu_caja_0" style="display:inline-block;float:right; height:20px;padding:2px;padding-top:4px;">  
<a href="javascript:void_();"  class=" button white small bigrounded" onclick="close_panel('0')"><b>x</b></a></div>
<div id="" style="display:inline-block;float:left;height:30px;padding:0px;padding-left:0px;">
<a href="javascript:void_()"; onclick="show_user('<?php echo ($sess_fb_id); ?>')" class="texto_12 negro no_underline">

<div id="image_user" style="float:left;display:inline-block;margin-top:2px;" ><img src="https://graph.facebook.com/<?php echo ($sess_fb_id); ?>/picture" width="30" align="absmiddle" alt="<?php echo $_SESSION['user_name']; ?>"></div>

<div style="display:inline-block;float:left;height:20px;padding:4px;padding-top:3px;"> <span class="texto_13 azul" style="text-shadow: #fff 1px 1px 1px; text-shadow:1px 1px 1px #fff; font-family: 'Satisfy', cursive; " ><?php echo ($sess_user_name); ?></span> <div class="texto_14 gris" style="position:relative;top:0;padding:4px;padding-top:3px;display:inline-block;font-family: 'Satisfy', cursive;text-shadow:1px 1px 1px #fff;">wrote this post:</div>
</a>  </div>
 </div>
 </div>
  
<div  class="titulo_myfive_panel edit_tit" style="display:inline-block;padding-top:15px;"  > 

          <form name="new_post" id="new_post" method="post">
<input type="hidden" id="id_new_post" value="0">

<input type="hidden" id="toth" value="<?php echo ($post_th); ?>">

<input type="text" name="t_1" id="t_1<?php echo $id_myf; ?>" class="input_t" style="padding:4px;width:375px;height:35px;resize:none;text-shadow: 1px 1px 1px #ffffff;font-family: 'Bitter', sans-serif;font-size:20px;color:#333;" maxlength="140" placeholder="Add a title" value="<?php echo stripslashes($titulo_panel); ?>">

</div><div style="padding-top:15px;float:right;margin-right:5px;width:50px;display:inline-block;text-align:center;" class="texto_9 gris">Chars. left:<div id="box_chars_left" class="texto_14 gris"></div></div>

 <div style="width:100%;margin:0px;display:inline-block; " align="center">
 
 <div   style="text-align:center;padding-right:4px;display:inline-block;" align="center" >
 <a href="javascript:void_();" class="texto_12 negro" onclick="load_my_pictures('0')" id="button_show_myimages">
 <img src="img/ico_image_media_post.png" alt="Insert a picture" valign="absmiddle"></a>
 <img src="img/future_media_elements.png"  valign="absmiddle">
 </div>

<div id="box_pictures_inpost<?php echo $id_myf; ?>" style="margin:4px;min-height:50px;display:none;clear:both;">
</div>
</div>
 
<div style="display:inline;">  
<div  style="clear:both;"></div>
 
			<input type="hidden" id="id_post_to_upload" value="">

 <div id="info" style="display:none;"></div>
 
<div id="response_autosave" style="text-align:center;width:100%;border-bottom:1px solid #eee;display:none;">saved</div>


<div style="width:100%;margin:4px;display:inline-block;text-align:center;" align="center"> </div>



 <script type="text/javascript">
	
         
	

	function remove_picture_fpost(id_pic_, user_,img_name_){

  

  $("#listItem_"+id_pic_).fadeOut(200);

			

$.ajax({ 

   url:   'action_remove_picture_post.php',

   data:  {"user_":user_, "id_pic_":id_pic_, "img_name_":img_name_},

   type:  'post',

   beforeSend: function () {},

   error: function(response) { alert(response + " error!"); },

   success:  function (response) {}  

  }); // end ajax  

  }

 function load_my_pictures(from_w){

 if (from_w == 1) $("#box_pictures_inpost<?php echo $id_myf; ?>").hide();
 
 
      $("#box_pictures_inpost<?php echo $id_myf; ?>").toggle();
 
      
$.ajax({ 

   url:   'my_pictures.php',

   type:  'post',

   beforeSend: function () {
  
  $("#box_pictures_inpost<?php echo $id_myf; ?>").html("<img src=\"img/loader.gif\"> Loading your images.");
    },

  success:  function (response) { 

  $("#box_pictures_inpost<?php echo $id_myf; ?>").html(response);} 
  
  }); // end ajax  

  }

	

		$(function() { 

//$( ".picture_post_m" ).sortable({  cursor: "move", stack:"div", scrollSensitivity:1,containment: "#box_pictures_inpost" , handle:".picture_post", opacity: 1  });

					});


     function show_box_img(){
      $("#img_box_extra<?php echo $id_myf; ?>").toggle();
          
		
                }      

      function show_box_drop(){$("#dropbox").toggle(); }

 
function show_my_pictures(){
$("#box_pictures_inpost<?php echo $id_myf; ?>").slideToggle();
 
}

       
function add_to_textarea(content){
//alert(content);

var content = '<img src="'+content+'" width="400">';
 $("#f_post_<?php echo $id_myf; ?>").tinymce().execCommand('mceInsertContent',false,content);
 
}

       
$(".picture_post_m").hover(

function(){ $(".div_remove_img", this).fadeIn(200); },
function(){ $(".div_remove_img", this).fadeOut(200); }


);
       

</script>

<style>

#box_pictures_inpost ul{position:relative;top:0;clear:both;}

#box_pictures_inpost li{margin:0px;padding:0px;position:relative;top:0;display:inline-block; }

#box_pictures_inpost > li { float: left; }

</style>
 
 
 
 
<div id="img_box_extra<?php echo $id_myf; ?>" style="position:absolute;top:130px;z-index:10001;display: none;width:450px;height:150px;   box-shadow:  0 0 78px rgba(0,0,0, .4);-webkit-box-shadow: 0 0 78px rgba(0,0,0, .4);    -moz-box-shadow: 0 0 78px rgba(0,0,0, .4);background:#f1f1f1;padding:0px;">
<div class=" " style="height:26px;padding-top:4px;background:#eee;width:450px;border-bottom:1px solid #ddd;border-top:1px solid #fff;">
<div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:0px; ">
<a href="javascript:void_()" class=" button white small bigrounded"  onClick="show_box_img();"><b>x</b></a></div>
<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;text-shadow:1px 1px 1px #ffffff;" class=" ">
<img src="../img/ico_comment_hover.png"   align="absmiddle"> <b>Images</b></div>
</div>
<iframe style="border:0px;width:450px;height:150px;background-color:#f1f1f1;" src="uploadify/upload_image_post.php?i=<?php echo $_SESSION['id'];?>&p=0"></iframe>
</div>




<div id="box_alerts_post_<?php echo $id_myf; ?>" style="position:absolute;bottom:5px;z-index:10000;display:none;	width:400px;height:320px;background:#fff ;  box-shadow:  0 0 78px rgba(0,0,0, .7);-webkit-box-shadow: 0 0 78px rgba(0,0,0, .7);    -moz-box-shadow: 0 0 78px rgba(0,0,0, .7);"><?php // echo $id_thread_tot;
?></div>     

 
<div id="box_panel_options_<?php echo $id_myf; ?>" style="position:absolute;top:180px;z-index:10000;display:none;	width:450px;border:1px solid #999;background:#eee;  box-shadow:  0 0 28px rgba(0,0,0, .5);-webkit-box-shadow: 0 0 28px rgba(0,0,0, .5); -moz-box-shadow: 0 0 28px rgba(0,0,0, .5);">


<?php //include("select_friends_auto.php");
 ?>
</div> 

<div  class="titulo_myfive_panel edit_tit"  > 

<input type="hidden" name="idf_<?php echo $cont; ?>" id="idf_<?php echo $cont; ?>" class="input_f"  value="<?php echo $id_myf; ?>"> 
<div  class="menu_frase" id="texto_extra_<?php echo $cont; ?>"  >
 <textarea name="f_post_<?php echo $id_myf; ?>"  placeholder="Write your post" id="f_post_<?php echo $id_myf; ?>" style="width:420px;height:200px;resize: none;" ></textarea></div>
</div>
 
 <div style="width:430px;margin-left:8px;padding-bottom:10px;height:25px;">
 <!--
   <div style="float:left;padding-top:10px;display:inline-block;width:50px;"  >
<div class=" button small red" id="button_borrar_<?php echo $id_myf;?>" onclick="borrar_panel('<?php echo $_SESSION['id'];?>','<?php echo $id_myf;?>')"><img src="img/ico_trash.png"></div>

</div>
-->
<div  class="texto_12" style="padding-left:5px;width:160px;display:inline-block;padding-top:5px;" id="box_privacity_edit_<?php echo $id_myf; ?>"  >
 <script>
 
 function show_friends_privacity(){
 
 var w_select_= $("#post_priv<?php echo $id_myf;?>").val();
 
if(w_select_ == 2) { $("#box_panel_options_<?php echo $id_myf;?>").fadeIn(500); } else {

 $("#box_panel_options_<?php echo $id_myf;?>").fadeOut(500);

}
 
 }
 
 </script>
<?php  $cat_priv = Array(0 => "for everyone",1 => "just for me" ); 
$priv = -1; // because it hasn't been defined yet...
?>


<span  style="font-family: 'Satisfy', cursive; " >This post is </span>
<select name="post_priv<?php echo $id_myf;?>" id="post_priv<?php echo $id_myf;?>" class="texto_11" onChange="show_friends_privacity()">
<?php 
  for($i=0;$i<count($cat_priv);$i++) {?>
  
<option value="<?php echo $i; ?>" ><?php  echo $cat_priv[$i]; ?></option>
<?php   }?>
</select>
</div>
		<input type="hidden" id="friends_selected<?php echo $id_myf; ?>" value="<?php echo $users_allow_priv; ?>">
<div id="mess_draft" style="width:120px;display:inline-block;text-align:right;" class="texto_11 gris"> </div>
 <div  id="botonsubmit0" style="width:120px;float:right;"> 
<a href="javascript:void_()" class=" button blue big" onclick="create_f_post('<?php echo $sess_id;?>','0')">Publish</a>
</div> 
<div  id="botonsubmit_wait0" style="width:120px;display:none;float:right; "  > 
<a href="javascript:void_()" class=" button blue big"  >Wait...</a>
</div> 
</form>
   <!-- fin box_frases -->
   <div   style="float:left;height:15px;"  >&nbsp; </div>
</div>
</div>
</div>

</div> 
 
<script>
  
	$().ready(function() { 
		$('#f_post_<?php echo $id_myf; ?>').tinymce({

			// Location of TinyMCE script

        force_br_newlines : false,
			script_url : 'tinymce/jscripts/tiny_mce/tiny_mce_src.js',

	// General options

			theme : "advanced",
 //theme_advanced_buttons3_add : "pastetext,pasteword,selectall",

      content_css : "css/editor_css_myfive.css",
			plugins : "spellchecker,paste",
                       theme_advanced_font_sizes : "13px,15px,18px,22px",
                        theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_resizing : true,
			theme_advanced_statusbar_location : "bottom",
			paste_text_sticky: true,
			paste_retain_style_properties : "none",
			paste_strip_class_attributes : "all",
			paste_remove_spans : true,
			paste_remove_styles : true,
paste_text_sticky_default: true,
gecko_spellcheck : true,
			// Theme options
			//theme_advanced_buttons1: "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,fontsizeselect,image,media,link,unlink,code",
theme_advanced_buttons1:"bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,fontsizeselect,link,unlink,image",
   theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : ""

    });




});

 

$().ready(function(){
    
    $("#panel_0").topZIndex();
 
});
$().ready(function(){
    
    show_friends_privacity();
 
});
</script> 
