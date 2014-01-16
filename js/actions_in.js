

//////////////////////////////////////////////////////////////////////
function cerrar_box_nuevo_servicio(){
$("#box_nuevo_servicio").hide();
}

//////////////////////////////////////////////////////////////////////
function  muestra_nuevo_serv(){
$("#box_nuevo_servicio").show();
}

 
   $(document).ready(function(){
 
 $("#tweet_submit").click(
 function(){
 
 
 var txt_status = $("#tweet_txt").val();
 var t_reply = $("#t_reply").val();
 
 var usr_srv = $("#usr_srv").val();
 
 
   $.ajax({  
    type: "POST",  
    data: {tweet_txt:txt_status,reply_id:t_reply,usr_srv:usr_srv},  
    url: "in/tw/update_status_tw.php",
    beforeSend: function () {
    $("#tweet_submit").html("Enviando...");
        $("#tweet_txt").css("color","#eeeeee");},
   error: function(response) { alert(response + " error!"); },   
    success: function(response){ 
$("#box_update_status").html('<div id="box_update_status" style="width: 400px; margin: 0pt auto;clear:right;"><textarea rows="4" cols="49" name="tweet_txt" id="tweet_txt" onKeyUp="contar(this);"></textarea><input type="hidden" name="reply_id" id="t_reply"/><input type="hidden" name="usr_srv" id="usr_srv" value="'+usr_srv+'"/><span id="letras">140</span>	<div id="tweet_submit" class="tweet_button">Enviar</div></div>');

 } 
});
 
 } );
 
 
 
	    $("ul.t_tab li").click(function()     //cada vez que se hace click en un li
       {
		$("ul.t_tab li").removeClass("t_selected"); //removemos clase active de todos
		$(this).addClass("t_selected"); //añadimos a la actual la clase active
		$(".tab_content").hide(); //escondemos todo el contenido
 
		var content = $(this).attr("id"); //obtenemos el atributo id
		$(content).fadeIn(); // mostramos el contenido
		return false; //devolvemos false para el evento click
	});
 
});
 
function replyTo(id,name){
			$('#t_reply').val(id);
			$('#tweet_txt').val("@"+name+" ").focus();
 
			return false;
}
function contar(input) {
//Comprobamos que no pase de 140 caracteres y si pasa, que borre los sobrantes
if (input.value.length >= 140) {
input.value = input.value.substring(0,140);
}
//alamacenamos el resto
var resto = 140 - input.value.length;
 
//imprimimos los caracteres restantes en el span
$('#letras').html(resto);
 
} 




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

url2link = function(text)
{
	var expr = /(https?:\/\/\S+)/gi;
	
	var anchr= '<a href="$1" target="_blank" style="z-index:2020;" rel="nofollow"  >$1</a>'; 
	return text.replace(expr,anchr);
}
pax2link = function(text)
{
	var expr = /(@\S+)/gi;
	var anchr= '<a href="http://twitter.com/$1" target="_blank"  style="z-index:2020;" >$1</a>'; 
	var text = text.replace(expr,anchr);
return   text.replace(":\"", "\"");
}


hash2link = function(text)
{
	var expr = /(#\S+)/gi;
	
	
	var anchr= '<a href="http://search.twitter.com/search?q=%23$1" target="_blank"  style="z-index:2020;" rel="nofollow">$1</a>'; 
 
	
	var text =  text.replace(expr,anchr);
	
	return   text.replace("search?q=%23#", "search?q=%23");
	
	
}

function wbr(str, num) {
return str.replace(RegExp("(\\w{" + num + "})(\\w)", "g"), function(all,text,char){
return text + "<wbr>" + char;
});
}
 