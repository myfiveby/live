<?php if (!session_id() || session_id()==""){
	session_start();
} ?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/myfiveby.css" type="text/css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="../js/core_myfiveby.js"></script>

 
<link rel="stylesheet" type="text/css" href="uploadify.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jquery.uploadify-3.1.js"></script>



 <style type="text/css">
  body{background: #f1f1f1;}
 #uploadify object { 
  position:absolute;
  left:0; right:0;  
  width:100%        
} 
    .uploadify-button {
        background-color: #f1f1f1;
        border: none;
        padding: 0;
    }
    .uploadify:hover .uploadify-button {
        background-color: #f1f1f1;
    }
</style>
	<script type="text/javascript">

	
	
	function remove_picture_fpost(id_pic_, user_,img_name_){
  
  $("#listItem_"+id_pic_).fadeOut(200);
  	
$.ajax({ 
   url:   '../action_remove_picture_post.php',
   data:  {"user_":user_, "id_pic_":id_pic_, "img_name_":img_name_},
   type:  'post',
   beforeSend: function () {},
   error: function(response) { alert(response + " error!"); },
   success:  function (response) {}  
  }); // end ajax  
  }
</script>


<script type="text/javascript" >
    $(function() {
    $('#file_upload').uploadify({
        'buttonText' : 'Upload image',
        'buttonImg': 'button_upload_image.png',
        'swf'      : 'uploadify.swf',
        'uploader' : 'uploadify.php',
	'fileExt': '*.jpg;*.gif;*.png;',
        'fileDesc': '*.jpg;*.gif;*.png;',
'width': '92',
'height': '32', 
	'sizeLimit': 1048576,
    'method'   : 'post',
    'formData' : { 'u' : '<?php echo $_GET['i']; ?>' ,'p' : '<?php echo $_GET['p']; ?>' },
    'onUploadSuccess' : function(file, data, response) {
//alert('The file was saved to: ' + file.name);
       // $("#infoimg").append(response);
       //$("#infoimg").append(data);
   
      
     parent.load_my_pictures('1');
  
  
       
    }
        // Put your options here
    });
});
    
   
       
      
       
</script>
<body style="background:#f1f1f1;">
 <div id="box_item_uploading5" style="position:relative;display: inline-block;left:0;top:0; padding:0px;padding-left:0px;width:400px;height: 40px;float:left;">
<input type="file" name="file_upload" id="file_upload" style="width: 100px;display:inline-block;"/> 
</div> 
</body>