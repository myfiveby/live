
function void_ (){

}



function   muestra_texto_extra(id_texto_extra){

$("#texto_extra_"+id_texto_extra).toggle();


}




function save_f (){

var id_user_fb = $("#fb_id_mf").val();

  $.ajax({
 data:  {
 "id_user_fb":id_user_fb 
  },
 url:   'save_sentences.php',
 type:  'post',
 beforeSend: function (response) {
    
 $("#box_frases").html('wait...');
 $("#boton_save_f").html('working..');

 },
 success:  function (response) { 
 $("#box_frases").html(response);
 $("#boton_save_f").html('');
 
 }
 });

}





function edita_panel (id_panel_edit){
// $("#box_frases").hide(); 
$("#box_frases").load("new_panel.php"); 
	  	  
	  
	 

}