$(function(){
	
	var dropbox = $('#dropbox'),
		message = $('.message', dropbox)    ;
	
	var id_post_upload = $("#id_post_to_upload").val();
	
	//alert(id_post_upload);
	dropbox.filedrop({
		// The name of the $_FILES entry:
		paramname:'pic',
		maxfiles: 5,
    	maxfilesize: 2,
		url: 'uploaderh5/post_file.php',
		data: {id_post_upload:id_post_upload},
		uploadFinished:function(i,file,response){
		
	//	alert(i+' -  '+file.name );
			$.data(file).addClass('done');
			
			
			 				
  $.ajax({
 data:  {
 "nom_image_":file.name
  },
 url:   'muestra_foto_topostup.php',
 type:  'post',
 beforeSend: function (response) { 

			 			$.data(file).fadeOut(500);

 },
 success:  function (response) { 
 
      $("#dropbox").toggle();
			$("#box_pictures_inpost").append(response);			 
     $(".message").show();
 }
 });	 			
			 			
			//$("#box_insert_picture").append(file); 
			 
			// response is the JSON object that post_file.php returns
		},
		
    	error: function(err, file) {
			switch(err) {
				case 'BrowserNotSupported':
					showMessage('Your browser does not support HTML5 file uploads!');
					break;
				case 'TooManyFiles':
					alert('Too many files! Please select 5 at most!');
					break;
				case 'FileTooLarge':
					alert(file.name+' is too large! Please upload files up to 2mb.');
					break;
				default:
					break;
			}
		},
		
		// Called before each upload is started
		beforeEach: function(file){
			if(!file.type.match(/^image\//)){
				alert('Only images are allowed!');
				
				// Returning false will cause the
				// file to be rejected
				return false;
			}
		},
		
		uploadStarted:function(i, file, len){
			createImage(file);
		},
		
		progressUpdated: function(i, file, progress) {
			$.data(file).find('.progress').width(progress);
		}
    	 
	});
	
	var template = '<div class="preview">'+
						'<div onClick="delete_pic_from_post();">Delete picture</div><span class="imageHolder">'+
							'<img />'+
							'<span class="uploaded"></span>'+
						'</span>'+
						'<div class="progressHolder">'+
							'<div class="progress"></div>'+
						'</div>'+
					'</div>'; 
	
	
	function createImage(file){

		var preview = $(template), 
			image = $('img', preview);
			
		var reader = new FileReader();
		
		image.width = 100;
		image.height = 100;
		
		reader.onload = function(e){
			
			// e.target.result holds the DataURL which
			// can be used as a source of the image:
			
			image.attr('src',e.target.result);
		};
		
		// Reading the file as a DataURL. When finished,
		// this will trigger the onload function above:
		reader.readAsDataURL(file);
		
		 message.hide();
		preview.appendTo(dropbox);
		
		// Associating a preview container
		// with the file, using jQuery's $.data():
		
		$.data(file,preview);
	}

	function showMessage(msg){
		message.html(msg);
	}

});