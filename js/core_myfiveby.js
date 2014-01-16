//jQuery.fn.exists = function(){return this.size()>0;}  
/*window.onload = init_sess;
var interval;
function init_sess()
{
    interval = setInterval(trackLogin,10000);
}
function trackLogin()
{
    var xmlReq = false;
    try {
    xmlReq = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
    try {
    xmlReq = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e2) {
    xmlReq = false;
    }
    }
    if (!xmlReq && typeof XMLHttpRequest != 'undefined') {
    xmlReq = new XMLHttpRequest();
    }
 
    xmlReq.open('get', 'timeCheck.php', true);
    xmlReq.setRequestHeader("Connection", "close");
    xmlReq.send(null);
    xmlReq.onreadystatechange = function(){
        if(xmlReq.readyState == 4 && xmlReq.status==200) {
            if(xmlReq.responseText == "true")
            {
                clearInterval(interval);
                alert('You have been logged out.You will now be redirected to home page.');
                document.location.href = "index.html";
            }
        }
    }
}


 		
$(function() {
     $(document).mousedown(function () { trackLogin;  });
});
 
*/ 
function void_(){ }

function show_menu_background(){  
//alert("aa");

$("#bckg_button").hide();

$("#box_others_bckg").remove();
$("#box_selector_bg").animate({'width': "230px"}).append("<div style=\"display:inline-block;margin-left:0px;\" id=\"box_others_bckg\" ><img src= \"img/bg/002_m.jpg\" onClick=\"change_background('002.jpg');\"> <img src= \"img/bg/bkg02_m.jpg\" onClick=\"change_background('bkg02.jpg');\"> <img src= \"img/bg/001_m.jpg\" onClick=\"change_background('001.jpg');\"> <img src= \"img/bg/005_m.jpg\" onClick=\"change_background('005.jpg');\"> <img src= \"img/bg/008_m.jpg\" onClick=\"change_background('008.jpg');\"> <img src= \"img/bg/014_m.jpg\" onClick=\"change_background('014.jpg');\">  <img src= \"img/bg/015_m.jpg\" onClick=\"change_background('015.jpg');\"> <img src= \"img/bg/020_m.jpg\" onClick=\"change_background('020.jpg');\"> <img src= \"img/bg/021_m.jpg\" onClick=\"change_background('021.jpg');\"> <img src= \"img/bg/013_m.jpg\" onClick=\"change_background('013.jpg');\"><!-- <div  onClick=\"close_menu_background();\"  class=\"button white small bigrounded\" style=\"position:relative; display:inline-block;float:right;\">x</div>--> </div>");
 
 }
  
 

function change_background(bkgimage){
 $("body").css("background-image","url('img/bg/"+bkgimage+"')");
  $.ajax({
 data:  { "bkgimage":bkgimage 
  },
 url:   'action_guarda_background.php',
 type:  'post',
 beforeSend: function (response) { 


 },
 success:  function (response) { 
 
 $("#bckg_button").html('<a href="javascript:void_();" onClick="show_menu_background();"><img src="img/bg/'+bkgimage+'" height="20" width="20"></a>  ');
 close_menu_background();
 }
 });
 
    }
    
    
    
 
function close_menu_background(){ 
 $("#bckg_button").show();
 
$("#box_selector_bg").animate({
   'width': "20px"
});
$("#box_others_bckg").html("");
$("#box_others_bckg").hide("");


 
 }
 
 
 
 
 
  
 

function show_content_panel(id_panel_show){  
/*
    $.ajax({
 data:  {
 "id_panel":id_panel_show 
  },
 url:   'fonction/function_show_entire_panel.php',
 type:  'post',
 beforeSend: function (response) { 
 
 $("#box_content_panel_"+id_panel_show).toggle();
 
 $("#box_content_panel_"+id_panel_show).html("<div style=\"text-align:center;margin:0 auto;width:300px;padding:2px;border-bottom:0px solid #eee;\" align=\"center\"><img src=\"img/loader.gif\"> Loading...</div>");

 },
 success:  function (response) { 
  

 
 }
 }); */
 
  $("#box_content_panel_"+id_panel_show).toggle();

 
  
 }
 
 
 
 


function close_box(id_box_to_close){
$("#" + id_box_to_close).fadeOut(); 
 }
 
 
function show_box(id_box_to_open){
 
$("#" + id_box_to_open).toggle(); 
 }
 
function show_panels_menu (){

$(".columna_menus").hide();
$("#col_menu_panels").toggle();
//$(".item_menu_top").css("background","transparent");
//$("#bot_mypanels").css("background","#b82603");

	$("#mcs5_container").mCustomScrollbar("vertical",300,"easeOutCirc",1.05,"auto","yes","yes",15); 

 } 
 
 
function hide_panels_menu (){
$("#col_menu_panels").hide();
//$(".item_menu_top").css("background","transparent");

}
 
 
function show_follow_menu (){

$(".columna_menus").hide();
$("#col_menu_follow").toggle(); 
//$(".item_menu_top").css("background","transparent");
$("#bot_following").css("background","#b82603");
 } 
function hide_follow_menu (){
$("#col_menu_follow").hide();
//$(".item_menu_top").css("background","transparent");
}
 
   
 
function show_boxl (col_to_view){
  

 $.ajax({ 
 url:   col_to_view+'.php',
 type:  'post',
 beforeSend: function (response) {
                       

   $('#col_feed').animate({opacity:'1',right:'0'},400);

       $("#col_feed").show();


   $("#col_feed").html("");
   $("#col_feed").html("<div  class=\"texto_18 gris  \" style=\"width:100%;text-align:center;font-size:22px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#ddd;font-family: 'Satisfy', cursive; \"><img src=\"img/loader.gif\"><br>Just a sec</div>"); 


 },
 success:  function (response) {
 
   $("#col_feed").html("");
 $("#col_feed").html(response); 
 
 
 }
 }); 
  }
 
function show_history_menu (){
$("#col_menu_history").toggle(); 


 $.ajax({ 
 url:   'col_history.php',
 type:  'post',
 beforeSend: function (response) {
     
   $("#col_menu_history").html("");
   $("#col_menu_history").html("<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"><div  style=\"text-align:center;height:35px;width:150px;font-family:Satisfy;font-size:18px;color:#333;\"> Just a sec</div></div>"); 


 },
 success:  function (response) {
 
   $("#col_menu_history").html("");
 $("#col_menu_history").html(response); 
 
 
 }
 }); 
  }
 
function show_settings (){
 skip_tour(); 

  $("#escenario").append('<div id="settings_prev"   style="background:#ffffff; display:none;"></div>');  

$("#settings_prev").fadeIn(600);  	 	 
 $.ajax({ 
 url:   'settings.php',
 type:  'post',
 beforeSend: function (response) {
     
   $("#settings_prev").html("<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"> <div  style=\"text-align:center;height:35px;width:150px;font-family:Satisfy;font-size:18px;color:#333;\"> Just a sec</div></div>"); 
 },
 success:  function (response) {

 $("#settings_prev").html(response); 
 
//$("#col_feed").fadeOut(300);
//$("#col_conversations").fadeOut(300);
//$("#col_lat_right").fadeOut(300);
 
    $('#settings_prev').topZIndex();
 

 }
 });
 

//$("body").append('<div id="fondo_velo" style="position:absolute;top:39px;left:0;width:100%;height:100%;min-height:89%;background:#333333;opacity:0.5;"> .</div>');
//$("#escenario").append('<div id="fond_start" style="position:relative;top:0:left:0;width:100%;height:750px;background: transparent url(fons_m.png) center;z-index:3;"></div>');

 
//$(".item_menu_top").css("background","transparent");
//$("#bot_history").css("background","#b82603"); 
 
 }
 
function hide_history_menu (){$("#col_menu_history").hide();
//$(".item_menu_top").css("background","transparent");
}

  
 
function show_fav_menu (){
 
$("#col_menu_fav").toggle(); 




 $.ajax({ 
 url:   'col_fav.php',
 type:  'post',
 beforeSend: function (response) {
     
   $("#col_menu_fav").html("");
   $("#col_menu_fav").html("<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"> <div  style=\"text-align:center;height:35px;width:150px;font-family:Satisfy;font-size:18px;color:#333;\"> Just a sec</div> </div>"); 


 },
 success:  function (response) {
 
   $("#col_menu_fav").html("");
 $("#col_menu_fav").html(response); 
 
 
 }

});
 
 




//$(".item_menu_top").css("background","transparent");
//$("#bot_fav").css("background","#b82603"); 
 
 }
 
  
 
function show_fbpages_menu (){ 
$("#col_fbpages").toggle(); 
    $('#col_fbpages').topZIndex();

 }
 
 
 
 
function hide_fav_menu (){$("#col_menu_fav").hide();
//$(".item_menu_top").css("background","transparent");
}

 
 
function show_panels_facebookpages (){

$(".columna_menus").hide();
$("#col_menu_fbpages").toggle(); 
 }

 
 
function show_panels_user (){

$(".columna_menus").hide();
$("#col_menu_user").toggle(); 



 }

 


function view_user_panels (id_p, id_u){
   
   
$("#menu_user_box_"+id_u+"  li").removeClass("item_menuu_selected");
$("#menu_user_box_"+id_u+"  li").addClass("item_menuu_normal");
$("#posts_menu_box_"+id_u+" ").removeClass("item_menuu_normal");
$("#posts_menu_box_"+id_u+" ").addClass("item_menuu_selected");
   
 $.ajax({
 data:  {
 "id_p":id_p,
 "id_u":id_u 
  },
 url:   'show_user_panels_box.php',
 type:  'post',
 beforeSend: function (response) {
     
   $("#box_user_"+id_u).show(); 
   $("#box_user_"+id_u).html("<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"> <div  style=\"text-align:center;height:35px;width:150px;font-family:Satisfy;font-size:18px;color:#333;\"> Just a sec</div> </div>");


 },
 success:  function (response) { 
 
   $("#box_user_"+id_u).html(""); 
   $("#box_user_"+id_u).html(response); 
  
 
 
 }
 });

}


function view_follow (id_p,id_u){
   
   
$("#menu_user_box_"+id_u+"  li").removeClass("item_menuu_selected");
$("#menu_user_box_"+id_u+"  li").addClass("item_menuu_normal");
$("#follow_menu_box_"+id_u+" ").removeClass("item_menuu_normal");
$("#follow_menu_box_"+id_u+" ").addClass("item_menuu_selected");

   
 $.ajax({
 data:  {
 "id_p":id_p,
 "id_u":id_u 
  },
 url:   'show_user_following.php',
 type:  'post',
 beforeSend: function (response) {
     
   
   $("#box_user_"+id_u).show("");
   $("#box_user_"+id_u).html("");
   $("#box_user_"+id_u).html("<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\">  <div  style=\"text-align:center;height:35px;width:150px;font-family:Satisfy;font-size:18px;color:#333;\"> Just a sec</div> </div>");


 },
 success:  function (response) { 
 
  
   $("#box_user_"+id_u).html("");
   $("#box_user_"+id_u).html(response);  
 
 }
 });

}




function view_topics (id_f,id_u){
  
   
$("#menu_user_box_"+id_u+" li").removeClass("item_menuu_selected");
$("#menu_user_box_"+id_u+"  li").addClass("item_menuu_normal");
$("#topics_menu_box_"+id_u+" ").removeClass("item_menuu_normal");
$("#topics_menu_box_"+id_u+" ").addClass("item_menuu_selected");

 $.ajax({
 data:  { 
 "id_u":id_u,
 "id_f":id_f 
  },
 url:   'show_user_topics.php',
 type:  'post',
 beforeSend: function (response) {
     
   
   $("#box_user_"+id_u).show("");
   $("#box_user_"+id_u).html("");
   $("#box_user_"+id_u).html("<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"> <div  style=\"text-align:center;height:35px;width:150px;font-family:Satisfy;font-size:18px;color:#333;\"> Just a sec</div> </div>"); 


 },
 success:  function (response) {
 
   $("#box_user_"+id_u).html("");
 $("#box_user_"+id_u).html(response); 
 
 
 }
 });

}



function view_followers (id_f,id_u){
  
   
$("#menu_user_box_"+id_u+" li").removeClass("item_menuu_selected");
$("#menu_user_box_"+id_u+"  li").addClass("item_menuu_normal");
$("#followers_menu_box_"+id_u+" ").removeClass("item_menuu_normal");
$("#followers_menu_box_"+id_u+" ").addClass("item_menuu_selected");

 $.ajax({
 data:  { 
 "id_u":id_u,
 "id_f":id_f 
  },
 url:   'show_user_followers.php',
 type:  'post',
 beforeSend: function (response) {
     
   
   $("#box_user_"+id_u).show("");
   $("#box_user_"+id_u).html("");
   $("#box_user_"+id_u).html("<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\">  <div  style=\"text-align:center;height:35px;width:150px;font-family:Satisfy;font-size:18px;color:#333;\"> Just a sec</div> </div>"); 


 },
 success:  function (response) {
 
   $("#box_user_"+id_u).html("");
 $("#box_user_"+id_u).html(response); 
 
 
 }
 });

}



function view_about (id_u){
   
     
   $("#box_user_"+id_u).html("");
    
}





function follow_user (idtofoll){
  
 $.ajax({
 data:  {
 "idtofollw":idtofoll 
  },
 url:   'followuser.php',
 type:  'post',
 beforeSend: function (response) {
    $("#bot_follow_panel_"+idtofoll).html(' <a href="javascript:void_()" class="  button_f blue   bigrounded texto_9 negro"  onClick="unfollow_user('+idtofoll+')"  style="width:60px;">Subscribed</a>'); 

update_follow_button (idtofoll,'f');

 },
success:  function (response) { 
$("#bot_follow_panel_"+idtofoll).html(' <a href="javascript:void_()" class="  button_f blue   bigrounded texto_9 negro"  onClick="unfollow_user('+idtofoll+')"  style="width:60px;">Subscribed</a>');   
 }
 });

}




function unfollow_user (idtofoll){
  
 $.ajax({
 data:  {
 "idtofollw":idtofoll 
  },
 url:   'unfollowuser.php',
 type:  'post',
 beforeSend: function (response) {
      
   $("#bot_follow_panel_"+idtofoll).html('<a href="javascript:void_()" class=" button white small bigrounded texto_9 negro" ><img src=\"img/loader.gif\"></a>');
update_follow_button (idtofoll,'u');

 },
 success:  function (response) { 
 
                  
   $("#avatar_friend_"+idtofoll).html("");
   $("#avatar_friend_"+idtofoll).remove();
 
 
 
   $("#bot_follow_panel_"+idtofoll).html('<a href="javascript:void_()" class=" button_f white   bigrounded texto_9 negro"  onClick="follow_user('+idtofoll+')"  style="width:60px;">Subscribe</a>'); 
 
 
 }
 });

}



function   muestra_texto_extra(id_texto_extra){

$("#texto_extra_"+id_texto_extra).toggle();
//$("#f_box_"+id_texto_extra).css("background","#eeeeee");
 
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




function borrar_panel (izt, imf){
 
 
 var user_box = izt;
 
$.ajax({
 data:  {
 "izt":izt,
 "imf":imf
  },
 url:   'action_borrar_pb.php',
 type:  'post',
 beforeSend: function (response) {
    
 $("#boton_borrar_" + imf).html('wait...'); 

 },
 success:  function (response) { 
  
  
  $("#item_post_user_" + imf).fadeOut(500);
  $("#panel_" + imf).fadeOut(500);
  $("#p_" + imf).fadeOut(500);
 
 
 
 var num_posts_user = $("#input_num_posts"+user_box).val();
        
 var post_user_left =  num_posts_user-1;
 
 $("#item_num_posts" + user_box).html(post_user_left);
 $("#input_num_posts" + user_box).val(post_user_left);
  
 
  
  
 
 
 //alert(imf);
 
 
 }
 });

}



function crear_new_panel (izt){ 

$("#panel_open").remove();   


  $.ajax({
 data:  {
 "izt":izt 
  },
 url:   'crear_new_panel.php',
 type:  'post',
 beforeSend: function (response) {
 
 },
 success:  function (response) {  
//$("#escenario").append(response);
    show_newpanel_main(response);
 
 }
 });

}


function crear_new_panel_post (izt){ 

 

  $.ajax({
 data:  {
 "izt":izt 
  },
 url:   'crear_new_panel_post.php',
 type:  'post',
 beforeSend: function (response) { 
 
 },
 success:  function (response) { 
 
//$("#escenario").append(response);

    show_newpanel_main(response);
  
 
 
 }
 });

}

 

function crear_new_panel_postfrom_convers (izt,thread){ 
  $.ajax({
 data:  {
 "izt":izt, 
 "id_th":thread 
  },
 url:   'crear_new_panel_post.php',
 type:  'post',
 beforeSend: function (response) { 
 
 },
 success:  function (response) { 
 
//$("#escenario").append(response);

    show_panel_main(response);
  
 
 
 }
 });

}




			 


function show_newpanel_main(id_panel_show){
 

 //$("#escenario").append('<div id="panel_'+id_panel_show+'"></div>');
 $("#escenario").append('<div id="minimized_'+id_panel_show+'"></div>');
 
 
 
 
 //$(".item_menu_lat").css("background","#f1f1f1");
 //$(".item_menu_lat a").css("color","#666666");
 
 //$("#tit_col_"+id_panel_show).css("background","#c15034");
 //$("#tit_col_"+id_panel_show + " a").css("color","#ffffff");
   
//alert(id_panel_show);
 $.ajax({
 data:  {
 "p":id_panel_show 
  },
 url:   'show_panel.php',
 type:  'post',
 beforeSend: function (response) {
     
     
   $("#escenario").append('<div id="panel_prev'+id_panel_show+'" class="panel panel_drag"  style="height:120px;width:180px;position:absolute;left:50%;top:30%;z-index:20000;"><div id="caja_frases" style="height:35px;width:150px;"><img src=\"img/loader.gif\">  Creating new post...</div> </div>'); 
   
       $('#panel_prev'+id_panel_show).topZIndex();
   //$("#main_1").hide(); 

 },
 success:  function (response) { 

       $('#panel_prev'+id_panel_show).topZIndex();
  
if ($('#panel_prev'+id_panel_show).exists()) {

$('#panel_prev'+id_panel_show).remove(); 
}     
        
   $("#escenario").append(response); 
   
  $("#boton_edit"+id_panel_show).bind('onClick');
   

   var randomnumber  = Math.floor(Math.random()*20);
   var randomnumbert = Math.floor(Math.random()*20);


    
  $('#panel_'+id_panel_show).animate({left:'+='+randomnumber+'%',top:'+='+randomnumbert+'%', opacity:1},500);
    
$('#panel_'+id_panel_show).topZIndex();
 

edita_panel(id_panel_show,'1');

 
 }
 });

 
}
 
 
 
 
 function open_crear_new_panel (izt, addtothread){ 

$("#panel_open").remove();

  $.ajax({
 data:  {
 "izt":izt 
  },
 url:   'open_crear_new_panel.php',
 type:  'post',
 beforeSend: function (response) { 
 
 },
 success:  function (response) { 
 
$("#escenario").append(response);
  
 
 
 }
 });

}

function open_crear_convers_panel (izt){ 

$("#panel_open").remove();

  $.ajax({
 data:  {
 "izt":izt 
  },
 url:   'open_crear_new_panel.php',
 type:  'post',
 beforeSend: function (response) { 
 
 },
 success:  function (response) { 
 
$("#escenario").append(response);
  
 
 
 }
 });

}





function univ (th_u,autor){ 

  $.ajax({
 data:  {
 "th_u":th_u,
 "autor":autor
  },
 url:   'action_universal.php',
 type:  'post',
 beforeSend: function (response) { 
 },
 success:  function (response) {
     
     if (response==1){$("#boton_u"+th_u).addClass("green");}
     if (response==0){$("#boton_u"+th_u).removeClass("green");}
     
     
 }
 });

}





function lovep (panel_love,loves){ 
 
 var dolover = loves;
 
  $.ajax({
 data:  {
 "panel_love":panel_love,
 "dolover":dolover
  },
 url:   'action_check_love.php',
 type:  'post',
 beforeSend: function (response) {
 $("#loves_" + panel_love).html("+");
 
 },
 success:  function (response) { 
 
 $("#loves_" + panel_love).html(""+response);
 $("#loves_" + panel_love).css("background","url('ico_love_hover.png') no-repeat top left");
  
  $("#ico_love_box" + panel_love).html('<a href="javascript:void_()" onclick="nolove(\''+panel_love+'\',\''+response+'\');" class="  ico_love_checked gris" id="loves_'+panel_love+'" style="display:inline-block;height:19px;">'+response+'</a>');
 
 }
 });

}





function nolove (panel_love,loves){ 
 
 var dolover = loves;
 
  $.ajax({
 data:  {
 "panel_love":panel_love,
 "dolover":dolover
  },
 url:   'action_check_unlove.php',
 type:  'post',
 beforeSend: function (response) {
 $("#loves_" + panel_love).html("-");
 
 },
 success:  function (response) { 
 
 $("#loves_" + panel_love).html(""+response);
 $("#loves_" + panel_love).css("background","url('ico_love.png') no-repeat top left");
    
  $("#ico_love_box" + panel_love).html('<a href="javascript:void_()" onclick="lovep(\''+panel_love+'\',\''+response+'\');" class=" lovep ico_love gris" id="loves_'+panel_love+'" style="display:inline-block;height:19px;">'+response+'</a>');
 
 }
 });

}



function favp (panel_fav,favs){ 
 
 var dofavr = favs;
 
  $.ajax({
 data:  {
 "panel_fav":panel_fav,
 "dofavr":dofavr
  },
 url:   'action_check_fav.php',
 type:  'post',
 beforeSend: function (response) {
 $("#favs_" + panel_fav).html("+");
 
 },
 success:  function (response) { 
 
 $("#favs_" + panel_fav).html(""+response);
 $("#favs_" + panel_fav).css("background","url('ico_fav_hover.png') no-repeat top left");
  
  $("#ico_fav_box" + panel_fav).html('<a href="javascript:void_()" onclick="nofav(\''+panel_fav+'\',\''+response+'\');" class=" lovep ico_fav_checked gris" id="favs_'+panel_fav+'" style="display:inline-block;height:19px;">'+response+'</a>'); 
    // show_boxl('col_posts');
  //S select_menu_post_top_item('posts_fav');
 
 }
 });

}





function nofav (panel_fav,favs){ 
 
 var dofavr = favs;
 
  $.ajax({
 data:  {
 "panel_fav":panel_fav,
 "dofavr":dofavr
  },
 url:   'action_check_unfav.php',
 type:  'post',
 beforeSend: function (response) {
 $("#favs_" + panel_fav).html("-");
 
 $("#item_feet_fav_"+panel_fav).fadeOut(500);
 
 
 },
 success:  function (response) { 
 
 $("#favs_" + panel_fav).html(""+response);
 $("#favs_" + panel_fav).css("background","url('ico_fav.png') no-repeat top left");
    
  $("#ico_fav_box" + panel_fav).html('<a href="javascript:void_()" onclick="favp(\''+panel_fav+'\',\''+response+'\');" class=" gris ico_fav" id="favs_'+panel_fav+'" style="display:inline-block;height:19px;">'+response+'</a>');
 
 }
 });

}






						 /*   love favs threads */
						 
						 


function loveth (panel_love,loves){ 
 
 var dolover = loves;
 
  $.ajax({
 data:  {
 "panel_love":panel_love,
 "dolover":dolover
  },
 url:   'action_check_loveth.php',
 type:  'post',
 beforeSend: function (response) {
 $("#loves_" + panel_love).html("+");
 
 },
 success:  function (response) { 
 
 $("#loves_" + panel_love).html(""+response);
 $("#loves_" + panel_love).css("background","url('ico_love_hover.png') no-repeat top left");
  
  $("#ico_love_box" + panel_love).html('<a href="javascript:void_()" onclick="noloveth(\''+panel_love+'\',\''+response+'\');" class="  ico_love_checked gris" id="loves_'+panel_love+'" style="display:inline-block;height:19px;">'+response+'</a>');
 
 }
 });

}





function noloveth (panel_love,loves){ 
 
 var dolover = loves;
 
  $.ajax({
 data:  {
 "panel_love":panel_love,
 "dolover":dolover
  },
 url:   'action_check_unloveth.php',
 type:  'post',
 beforeSend: function (response) {
 $("#loves_" + panel_love).html("-");
 
 },
 success:  function (response) { 
 
 $("#loves_" + panel_love).html(""+response);
 $("#loves_" + panel_love).css("background","url('ico_love.png') no-repeat top left");
    
  $("#ico_love_box" + panel_love).html('<a href="javascript:void_()" onclick="loveth(\''+panel_love+'\',\''+response+'\');" class=" lovep ico_love gris" id="loves_'+panel_love+'" style="display:inline-block;height:19px;">'+response+'</a>');
 
 }
 });

}



function favth (panel_fav,favs){ 
 
 var dofavr = favs;
 
  $.ajax({
 data:  {
 "panel_fav":panel_fav,
 "dofavr":dofavr
  },
 url:   'action_check_favth.php',
 type:  'post',
 beforeSend: function (response) {
 $("#favs_" + panel_fav).html("+");
 
 },
 success:  function (response) { 
 
 $("#favs_" + panel_fav).html(""+response);
 $("#favs_" + panel_fav).css("background","url('ico_fav_hover.png') no-repeat top left");
  
  $("#ico_fav_box" + panel_fav).html('<a href="javascript:void_()" onclick="nofav(\''+panel_fav+'\',\''+response+'\');" class=" lovep ico_fav_checked gris" id="favs_'+panel_fav+'" style="display:inline-block;height:19px;">'+response+'</a>');
  
      //show_boxl('col_conversations');
    //select_menu_post_top_item('conv_fav');
  
 
 }
 });

}





function nofavth (panel_fav,favs){ 
 
 var dofavr = favs;
  
  $.ajax({
 data:  {
 "panel_fav":panel_fav,
 "dofavr":dofavr
  },
 url:   'action_check_unfavth.php',
 type:  'post',
 beforeSend: function (response) {
 $("#ico_favth_box" + panel_fav).html("-");
 
 
 
 
 },
 success:  function (response) { 
    
  $("#item_fav_thread_col_convers_" + panel_fav).fadeOut(500);
 
 }
 });

}















function unclose_panel (){
//$("#main_1").animate({  left: '0',width:400, opacity: 1},100);
}



function close_panel (id_panel){
$("#panel_" + id_panel).fadeOut(500);

   $('#panel_'+id_panel).remove(); 
  }




function close_thread (id_thread){
$("#thread_" + id_thread).fadeOut(500);
$(".box_rel_conversations").hide();	
   $('#thread_'+id_thread).remove(); 
  }



function close_panel_user (id_panel,id_user) {
  $("#avatar_friend_"+id_user).css("background","#f1f1f1");
 
$("#panel_user_" + id_panel).remove();
 
}






	function fix_panel (id_panel){ 
 var idp = id_panel; 
  $.ajax({
 data:  { 
 "p":idp 
  },
 url:   'fix_panel.php',
 type:  'post',
 beforeSend: function (response) {
  
 },
 success:  function (response) { 
   
 
     $("#button_fix_"+id_panel).remove();
  
     $("#menu_caja_"+id_panel).prepend('<a href="javascript:void_();" class=" button blue small bigrounded" id="button_fix_'+id_panel+'" onclick="unfix_panel(\''+id_panel+'\');" title=\"Fix post\"><b>o</b></a>');
 }
 });
 
  }




	function unfix_panel (id_panel){ 
 var idp = id_panel; 
  $.ajax({
 data:  { 
 "p":idp 
  },
 url:   'unfix_panel.php',
 type:  'post',
 beforeSend: function (response) {
  
 },
 success:  function (response) {
 
 
     $("#button_fix_"+id_panel).remove();
  
     $("#menu_caja_"+id_panel).prepend('<a href="javascript:void_();" class=" button white small bigrounded" id="button_fix_'+id_panel+'" onclick="fix_panel(\''+id_panel+'\');" title=\"Fix post\"><b>o</b></a>');
 }
 });
 
  }












function min_panel (id_panel,title,user_name,fb_id){
    
$("#panel_"+id_panel).fadeOut();  
$("#minimized_"+id_panel).remove();     

/*$("#panel_"+id_panel).animate({
'width':'10px', 
   'bottom': '1%',
   'top': '+=700px',
   'left':'+=300px',
   'opacity':0
} ,    function(){
       $("#panel_" + id_panel).hide();
    });
*/
 
 
 $("#box_minimize").append('<div id="minimized_'+id_panel+'" style="display:inline-block;height:25px;" class="img_minimized"><a href="javascript:void_()" onClick="max_panel(\''+id_panel+'\')" title="'+title+'" style="display:inline-block;height:35px;"><img src="https://graph.facebook.com/'+fb_id+'/picture" width="35" align="absmiddle"  style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;" alt="'+user_name+'"></a></div> ');
 
 
  }

function max_panel (id_panel){
     
       $("#minimized_" + id_panel).remove();
 
 show_panel_main(id_panel, '0');
 
   


 
 
  }






function show_panel_main(id_panel_show, new_p){

new_p = new_p || 0;
 
	 
	 
if ($("#panel_" + id_panel_show).size()){ 
	 $("#panel_" + id_panel_show).remove();
} 
 $("#escenario").append('<div id="panel_'+id_panel_show+'"></div>'); 
 

$("#panel_" + id_panel_show).remove();
$("#minimized_" + id_panel_show).remove();

 
 //$(".item_menu_lat").css("background","#f1f1f1");
 //$(".item_menu_lat a").css("color","#666666");
 
 //$("#tit_col_"+id_panel_show).css("background","#c15034");
 //$("#tit_col_"+id_panel_show + " a").css("color","#ffffff");
   
//alert(id_panel_show);
 $.ajax({
 data:  {
 "p":id_panel_show 
  },
 url:   'show_panel.php',
 type:  'post',
 beforeSend: function (response) { 
   $("#escenario").append('<div id="panel_prev'+id_panel_show+'" class="panel panel_drag"  style="height:100px;width:180px;position:absolute;left:50%;top:30%;z-index:20000;"><div id="caja_frases" style="text-align:center;height:35px;width:150px;font-family:Satisfy;font-size:18px;color:#333;"><img src=\"img/loader.gif\">  Just a sec</div> </div>');  
       $('#panel_prev'+id_panel_show).topZIndex();
   //$("#main_1").hide(); 

 },
 success:  function (response) { 
 
    $("#panel_prev" + id_panel_show).remove(); 
 
   
   $("#escenario").append(response); 
   
    $('#panel_'+id_panel_show).topZIndex();

   var randomnumber=Math.floor(Math.random()*40);
   var randomnumbert=Math.floor(Math.random()*10);

   //$('#panel_'+id_panel_show).animate({left:'+='+randomnumber+'%',top:'+='+randomnumbert+'%'},500);
   $('#panel_'+id_panel_show).animate({left:'+='+randomnumber+'%',top:'+='+randomnumbert+'%', opacity:1},600);

   if (new_p==1){
   alert("new");
   edita_panel(id_panel_show);
   }
   

 }
 });

 
 
}





function hide_panels(){

   $('.panel').animate({opacity:'0',top:'-300'},1500);
   $('.panel_user').animate({opacity:'0',left:'-500'},1500);
   $('.thread').animate({opacity:'0',left:'-700'},1500);
   $('#box_new_conversation').animate({opacity:'0',left:'-700'},1500);
   $('.columna_menus').fadeOut(500); 
 
   
   $('#col_feed').animate({opacity:'0',right:'-300'},500); 
   
   
      /*  $('#col_feed').hide();
        $('#col_lat_right').hide();
        $('#col_conversations').hide();*/
       $('#col_fbpages').hide();
 }
 
 
 
function show_user(idu){  
  
  
  $("#avatar_friend_"+idu).css("background","#88cee8");
  
$("#panel_user_" + idu).remove();

  
 //$(".item_menu_lat").css("background","#f1f1f1");
 //$(".item_menu_lat a").css("color","#666666");
 
 //$("#tit_col_"+id_panel_show).css("background","#c15034");
 //$("#tit_col_"+id_panel_show + " a").css("color","#ffffff");
  
//alert(id_panel_show);
 $.ajax({
 data:  {
 "ufb":idu 
  },
 url:   'show_user.php',
 type:  'post',
 beforeSend: function (response) {
          
     
   $("#escenario").append('<div id="panel_prev'+idu+'" class="panel panel_drag"  style=" width:180px;position:absolute;left:0%;top:5%;z-index:<?php echo $zindex;?>;"><div id="caja_frases" style="  width:150px; font-family:Satisfy;font-size:18px;color:#333;"><img src=\"img/loader.gif\"> Just a sec </div> </div>'); 
   
   //$("#main_user").hide(); 

 },
 success:  function (response) { 
 
   $("#panel_prev"+idu).remove(); 
   
   
   $("#escenario").append(response); 
      
    $('#panel_user_'+idu).topZIndex();



   var randomnumber=Math.floor(Math.random()*10);
   var randomnumbert=Math.floor(Math.random()*10);
    $('#panel_user_'+idu).animate({left:'+='+randomnumber+'%',top:'+='+randomnumbert+'%'},700);
   
   
 }
 });

 
}

function cancel_edit_panel ( idp){
 var idu = idu;
 var idp = idp;
 
 
  $.ajax({
 data:  { 
 "p":idp 
  },
 url:   'show_panel.php',
 type:  'post',
 beforeSend: function (response) {
 //alert(texto_extra_1 + "-" + texto_extra_2 + "-" + texto_extra_3 + "-" + texto_extra_4 + "-" + texto_extra_5 + "-");

$("#box_frases_"+idp).html('<div style="width:90%;padding:20px;"  align="center"><img src="img/loader.gif"> Wait...</div>'); 
  
 },
 success:  function (response) { 
 
 
  
 $("#panel_"+idp).html(response);  
 
 $("#tit_col_"+idp + " a").css("color","#ffffff");
 
 }
 });

}
function cancel_edit_conversation (idp){
 var idu = idu;
 var idp = idp;
 
 
  $.ajax({
 data:  { 
 "p":idp 
  },
 url:   'show_thread.php',
 type:  'post',
 beforeSend: function (response) {
 //alert(texto_extra_1 + "-" + texto_extra_2 + "-" + texto_extra_3 + "-" + texto_extra_4 + "-" + texto_extra_5 + "-");

$("#thread_"+idp+" caja_thread").html('<div style="width:90%;padding:20px;"  align="center"><img src="img/loader.gif"> Wait...</div>'); 
  
 },
 success:  function (response) { 
 
 
  
 $("#thread_"+idp).html(response);  
 
 }
 });

} 

function modif_f_conversation (autor,id_t){
 
 
var title_convers = $("#title_convers_"+id_t).val();
var descrip_convers = $('#descrip_conversation_'+id_t).val();
var descrip_convers_short = descrip_convers.substr(0,200);
var id_convers = id_t;
 var num_chars_tit = $("#title_convers_"+id_t).size(); 
								
								
					 if (num_chars_tit > 0  ){

  $.ajax({
 data:  {
 "autor":autor,
 "id_convers":id_convers,
 "title_convers":title_convers,
 "descrip_convers":descrip_convers 
 },
 url:   'modif_f_conversation.php',
 type:  'post',
 beforeSend: function (response) { 

// $("#thread_"+idp+" caja_thread").html('<div style="width:90%;padding:20px;"  align="center"><img src="img/loader.gif"> Wait...</div>');
 
 
  $("#botonsubmitc"+id_t).hide();
  $("#botonsubmit_waitc"+id_t).show();

 },
 success:  function (response) { 
 
  $("#botonsubmitc"+id_t).show();
  $("#botonsubmit_waitc"+id_t).hide();  
     
  $("#box_edit_convs_"+id_t).fadeOut(200);  
 
  $("#box_title_conversation"+id_t).html(title_convers);
  $("#box_description_complete_txt"+id_t).html(descrip_convers);    
 
  $("#box_description_short_txt"+id_t).html(descrip_convers_short);  
  
  
  
 $("#boton_editc"+id_t).fadeIn(200); 
 $("#boton_close_editc"+id_t).fadeOut(200);   
 
 }
 });
 } else {
 
 alert("Title is required. "); 
  }     // end else not null


}



function modif_f_post (idu,idp,new_p){
tinyMCE.triggerSave();
var t = $("#t_1"+idp).val();
var texto_p = $('#f_post_'+idp).val();
var post_priv = $('#post_priv'+idp).val();
var draft = 0;

	 
var selected_friends_priv = $('#friends_selected'+idp).val();  


var idf_1 = $("#idf_1").val();

								var num_chars_tit = $("#t_1"+idp).size();
  //alert(texto_extra_1 + "-" + texto_extra_2 + "-" + texto_extra_3 + "-" + texto_extra_4 + "-" + texto_extra_5 + "-"); if (t.length > 0 ){

  $.ajax({
 data:  {
 "idu":idu,
 "idp":idp,
 "selected_friends_priv":selected_friends_priv,
 "post_priv":post_priv,
 "t":t,   
  "draft":draft,
  "new_p":new_p, 
  "texto_p":texto_p
  
  },
 url:   'modif_action_panel_post.php',
 type:  'post',
 beforeSend: function (response) {
 //alert(texto_extra_1 + "-" + texto_extra_2 + "-" + texto_extra_3 + "-" + texto_extra_4 + "-" + texto_extra_5 + "-");

 $("#box_frases").html('wait...'); 
 
  $("#botonsubmit"+idp).hide();
  $("#botonsubmit_wait"+idp).show();

 },
 success:  function (response) { 
 
  show_panel_main(response,'0');   
  
  
update_num_posts(idp);
$("#panel_"+idp).fadeOut();
$("#panel_"+idp).remove();  
  $("#item_num_posts" + idu).html(num_posts_user);
 $("#input_num_posts" + idu).val(num_posts_user);
 
 
  view_user_panels(idp,idu);
   

 }
 });
 } else {
 
 alert("Title is required. "); 
  }  
} 




			/* ********************** */
			
			
function create_f_post (idu,idpo){
    if (!idu || idu == "" || idu == 0) {
    	alert("server security notice: session timeout error\nyou appear not to be logged in\nPlease copy your post into a Word Processor, refresh the page and try to post again.\nSorry for the inconvenience");
    	return false;
    } else {
		tinyMCE.triggerSave();
			idpo = idpo || 0;
			var idp = $("#id_new_post").val();
			idp = idp || 0;
			if (idp == 0 ){ var url_ajaxx = "action_create_panel_post.php"; }  else { var url_ajaxx = "modif_action_panel_post.php"; }
			var t = $("#t_1"+idpo).val();

			var texto_p = $('#f_post_'+idpo).val();
			
			var post_priv = $('#post_priv'+idpo).val();
			
			var post_toth = $('#toth').val();
			var draft = 0;
 
			var selected_friends_priv = $('#friends_selected'+idpo).val();  
 
			var idf_1 = $("#idf_1").val();
		
 var num_chars_tit = $("#t_1"+idpo).size();
		 
		  //alert(texto_extra_1 + "-" + texto_extra_2 + "-" + texto_extra_3 + "-" + texto_extra_4 + "-" + texto_extra_5 + "-");
  
  	
 if (t.length > 0 ){
 
				$.ajax({
				data:  {
				"idu":idu,
				"idp":idp,
				"selected_friends_priv":selected_friends_priv,
				"post_priv":post_priv,
				"t":t,   
				"draft":draft, 
				
				"post_toth":post_toth, 
				"texto_p":texto_p
				},
				url: url_ajaxx,
				type:  'post',
				beforeSend: function (response) {
					//alert(texto_extra_1 + "-" + texto_extra_2 + "-" + texto_extra_3 + "-" + texto_extra_4 + "-" + texto_extra_5 + "-");
					
					$("#box_frases").html('wait...'); 
					
					$("#botonsubmit"+idp).hide();
					$("#botonsubmit_wait"+idp).show();
					
				},
				success:  function (response) {
					show_panel_main(response,'0');
					$("#panel_"+idpo).fadeOut();
					$("#panel_"+idpo).remove();
					if (post_toth > 0){    
						$("#add_panel_conversation_"+post_toth).fadeOut(300);
						show_thread(post_toth);
					}
 //var num_posts_user =  ($("#input_num_posts"+idu).val()) + 1 ;
update_num_posts (idu);
				}
			});
 		} else {
		alert("Title is required. "); 
  	}  
	}
}
		
			


function save_draft_f_post (idu,idp,new_p){
 
 tinyMCE.triggerSave();
var t = $("#t_1"+idp).val();

var texto_p = $('#f_post_'+idp).val();

  var draft = 1;


var idf_1 = $("#idf_1").val();

var num_chars_tit = $("#t_1"+idp).size();
  //alert(texto_extra_1 + "-" + texto_extra_2 + "-" + texto_extra_3 + "-" + texto_extra_4 + "-" + texto_extra_5 + "-");
					 if (num_chars_tit > 0 ){

  $.ajax({
 data:  {
 "idu":idu,
 "idp":idp,
 "t":t,
  "draft":draft, 
  "new_p":new_p, 
  "texto_p":texto_p
  },
 url:   'modif_action_panel_post.php',
 type:  'post',
 beforeSend: function (response) {
 //alert(texto_extra_1 + "-" + texto_extra_2 + "-" + texto_extra_3 + "-" + texto_extra_4 + "-" + texto_extra_5 + "-");

 $("#box_frases").html('wait...'); 
 
  $("#botonsavedraft").hide();
  $("#botonsubmitdraft_wait").show();

 },
 success:  function (response) { 
 
  
  $("#botonsavedraft").show();
  
  $("#botonsubmitdraft_wait").hide();
 $("#panel_"+idp).html(response);  
   
 
 }
 });
 } else {
 
 alert("Title is required. "); 
  }     // end else not null


}


	
		function close_edita_conversation (id_thread){

 

 $("#boton_editc"+id_thread).show(); 
 $("#boton_close_editc"+id_thread).hide(); 
 
 $("#box_edit_convs_"+id_thread+"  ").fadeOut(100); 
  
}
	
		function edita_conversation (id_thread, autor){

 

 $("#boton_editc"+id_thread).hide(); 
 $("#boton_close_editc"+id_thread).show(); 
 
 $("#box_edit_convs_"+id_thread+"  ").fadeIn(300); 
  
$.ajax({
 data:  { 
 "id_thread":id_thread 
  },
 url:   'modif_conversation.php',
 type:  'post',
 beforeSend: function (response) {
 
 $("#box_edit_convs_"+id_thread+"  ").html('<div style="width:90%;padding:20px;"  align="center"><img src="img/loader.gif"> Wait...</div>'); 

 },
 success:  function (response) { 
 
 $("#box_edit_convs_"+id_thread+"").html(response);  
 
 
 }
 });
 

}

function edita_panel (id_panel_edit, new_p){


new_p = new_p || 0;


 $("#boton_edit"+id_panel_edit).hide(); 
 $("#boton_close_edit"+id_panel_edit).show(); 
 
  
$.ajax({
 data:  { 
 "p":id_panel_edit, 
 "new_p":new_p 
  },
 url:   'modif_panel.php',
 type:  'post',
 beforeSend: function (response) {
 
 $("#box_frases_"+id_panel_edit).html('<div style="width:90%;padding:20px;"  align="center"><img src="img/loader.gif"> Wait...</div>'); 

 },
 success:  function (response) { 
 
 $("#box_frases_"+id_panel_edit).html(response);  
 
 $('#panel_'+id_panel_edit).animate({opacity:1 },500);
 
 
 }
 });
 

}





function modif_f (idu,idp){
 

var t = $("#t_1").val();
var f1 = $("#f_1").val();
var f2 = $("#f_2").val();
var f3 = $("#f_3").val();
var f4 = $("#f_4").val();
var f5 = $("#f_5").val();

var texto_extra_1 = $("#ttexto_extra_1").val();
var texto_extra_2 = $("#ttexto_extra_2").val();
var texto_extra_3 = $("#ttexto_extra_3").val();
var texto_extra_4 = $("#ttexto_extra_4").val();
var texto_extra_5 = $("#ttexto_extra_5").val();



var idf_1 = $("#idf_1").val();
var idf_2 = $("#idf_2").val();
var idf_3 = $("#idf_3").val();
var idf_4 = $("#idf_4").val();
var idf_5 = $("#idf_5").val();


  //alert(texto_extra_1 + "-" + texto_extra_2 + "-" + texto_extra_3 + "-" + texto_extra_4 + "-" + texto_extra_5 + "-");


  $.ajax({
 data:  {
 "idu":idu,
 "idp":idp,
 "t":t,
 "f1":f1,
 "f2":f2,
 "f3":f3,
 "f4":f4,
 "f5":f5,
 "idf_1":idf_1,
 "idf_2":idf_2,
 "idf_3":idf_3,
 "idf_4":idf_4,
 "idf_5":idf_5,
 "texto_extra_1":texto_extra_1,
 "texto_extra_2":texto_extra_2,
 "texto_extra_3":texto_extra_3,
 "texto_extra_4":texto_extra_4,
 "texto_extra_5":texto_extra_5 
  
  },
 url:   'modif_action_panel.php',
 type:  'post',
 beforeSend: function (response) {
 //alert(texto_extra_1 + "-" + texto_extra_2 + "-" + texto_extra_3 + "-" + texto_extra_4 + "-" + texto_extra_5 + "-");

 $("#box_frases").html('wait...'); 
 
  $("#botonsubmit").hide();
  $("#botonsubmit_wait").show();

 },
 success:  function (response) { 
 
  
  $("#botonsubmit").show();
  
  $("#botonsubmit_wait").hide();
 $("#panel_"+idp).html(response);  
  
 $("#item_lateral_"+idp).html('<a href="javascript:void_()" onclick="show_panel_main('+idp+');"  class=" texto_10 blanco">'+t+'</a>');
 
 
 $("#tit_col_"+idp + " a").css("color","#ffffff");
 
 }
 });


}

 $(function() {
$.fn.showHtml = function(html, speed, callback)
   {
      return this.each(function()
      {
         // The element to be modified
         var el = $(this);

         // Preserve the original values of width and height - they'll need 
         // to be modified during the animation, but can be restored once
         // the animation has completed.
         var finish = {width: this.style.width, height: this.style.height};

         // The original width and height represented as pixel values.
         // These will only be the same as `finish` if this element had its
         // dimensions specified explicitly and in pixels. Of course, if that 
         // was done then this entire routine is pointless, as the dimensions 
         // won't change when the content is changed.
         var cur = {width: el.width()+'px', height: el.height()+'px'};

         // Modify the element's contents. Element will resize.
         el.html(html);

         // Capture the final dimensions of the element 
         // (with initial style settings still in effect)
         var next = {width: el.width()+'px', height: el.height()+'px'};

         el .css(cur) // restore initial dimensions
            .animate(next, speed, function()  // animate to final dimensions
            {
               el.css(finish); // restore initial style settings
               if ( $.isFunction(callback) ) callback();
            });
      
});




}});


 
                                            
    function muestra_box_fb_lista(elementfb, acfb, nfb){
 
  
  //alert(elementfb +" - "+acfb+" - "+nfb );
   $.ajax({
   data:  { "idfb":elementfb,   "acct": acfb, "nfb": nfb},
   url:   'login_facebook_pages.php',
   type:  'post',
   beforeSend: function () {
    
   
   $("#scrollcolfbpages").html('<div align="center"  style="width:255px;"  ><br><br> <div  style="text-align:center;height:35px;width:150px;font-family:Satisfy;font-size:18px;color:#333;"> Just a sec</div>    <b>'+nfb+'</b> profile.<br><br><img src=\"img/loader.gif\"></div>');
 
    $("#val_accesst").val(acfb);
   $("#val_idfb").val(elementfb);  
   },
   
   success:  function (response) {
   
   $("#scrollcolfbpages").html('<div align="center"  style="width:255px;"  ><br><br>Entering <b>'+nfb+'</b> profile.<br><br><img src=\"img/loader.gif\"></div>');
   
  window.location ="index.php";
   }  
  }); // end ajax 
            
               
               
               
    
                                               //alert(elementfb);
    }
    



 
 
 
 
 
 /*	
	TopZIndex plugin for jQuery
	Version: 1.2

	http://topzindex.googlecode.com/
	
	Copyright (c) 2009-2011 Todd Northrop
	http://www.speednet.biz/
	
	October 21, 2010
	
	Calculates the highest CSS z-index value in the current document
	or specified set of elements.  Provides ability to push one or more
	elements to the top of the z-index.  Useful for dynamic HTML
	popup windows/panels.
	
	Based on original idea by Rick Strahl
	http://west-wind.com/weblog/posts/876332.aspx

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version, subject to the following conditions:
	
	The above copyright notice and this permission notice shall be
	included in all copies or substantial portions of the Software.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
------------------------------------------------------ 

(function ($) {

$.topZIndex = function (selector) {
	/// <summary>
	/// 	Returns the highest (top-most) zIndex in the document
	/// 	(minimum value returned: 0).
	/// </summary>	
	/// <param name="selector" type="String" optional="true">
	/// 	(optional, default = "*") jQuery selector specifying
	/// 	the elements to use for calculating the highest zIndex.
	/// </param>
	/// <returns type="Number">
	/// 	The minimum number returned is 0 (zero).
	/// </returns>
	
	return Math.max(0, Math.max.apply(null, $.map(((selector || "*") === "*")? $.makeArray(document.getElementsByTagName("*")) : $(selector),
		function (v) {
			return parseFloat($(v).css("z-index")) || null;
		}
	)));
};

$.fn.topZIndex = function (opt) {
	/// <summary>
	/// 	Increments the CSS z-index of each element in the matched set
	/// 	to a value larger than the highest current zIndex in the document.
	/// 	(i.e., brings all elements in the matched set to the top of the
	/// 	z-index order.)
	/// </summary>	
	/// <param name="opt" type="Object" optional="true">
	/// 	(optional) Options, with the following possible values:
	/// 	increment: (Number, default = 1) increment value added to the
	/// 		highest z-index number to bring an element to the top.
	/// 	selector: (String, default = "*") jQuery selector specifying
	/// 		the elements to use for calculating the highest zIndex.
	/// </param>
	/// <returns type="jQuery" />
	
	// Do nothing if matched set is empty
	if (this.size() === 0) {
		return this;
	}
	
	opt = $.extend({increment: 1}, opt);

	// Get the highest current z-index value
	var zmax = $.topZIndex(opt.selector),
		inc = opt.increment;

	// Increment the z-index of each element in the matched set to the next highest number
	return this.each(function () {
		this.style.zIndex = (zmax += inc);
	});
};

})(jQuery);
*/

		  
		function showZIndex() {

			$status.text("Top z-index: " + $.topZIndex());

		}

function showZIndex() {
			$status.text("Top z-index: " + $.topZIndex());
		}

		

		function start_conversation(panel, id_thread, id_user) {
		$("#box_conversation_"+panel).show();
 
		
$.ajax({
   data:  { "panel":panel, "id_thread":id_thread, "id_user":id_user},
   url:   'crea_conversation.php',
   type:  'post',
   beforeSend: function () {
   $("#box_convers_over"+panel).html('<div align="center"  style="width:200px;"  ><br><br><img src=\"img/loader.gif\"> <div  style="text-align:center;height:35px;width:150px;font-family:Satisfy;font-size:18px;color:#333;"> Just a sec</div> </div>');
  
   },
   
   success:  function (response) {
     $("#box_convers_over"+panel).html(response);
  
   }  
  }); // end ajax 



		}
	function close_u_panel_conversation(thread) {
	
		$("#add_panel_conversation_"+thread).html("");
		$("#add_panel_conversation_"+thread).hide();
		}
		
		
		
		
		function close_box_posts(thread){
		  
		$("#add_panel_conversation_"+thread).slideToggle();
		}
		
		
		

 function add_u_panel_conversation(thread,id_user) {
		
 
   // $("#val_accesst").val(acfb);
	$("#posts_selected_user_conv").val(" ");	
$.ajax({
   data:  { "thread":thread,"id_user":id_user},
   //url:   'add_panel_2_conversation.php', 
   url:   'add_panel_from_post.php',
   type:  'post',
   beforeSend: function () {
   $("#add_panel_conversation_"+thread).html('<div align="center"  style="width:95%;text-align:center;"  ><br><br><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span></div>'); 
		$("#add_panel_conversation_"+thread).slideToggle();
   },
   
   success:  function (response) {              
     $("#add_panel_conversation_"+thread).html(response);
    
   }  
  }); // end ajax  



		}


		function show_embed(thread) {
		
		$("#add_embed_"+thread).show();
 
   // $("#val_accesst").val(acfb);
		
$.ajax({
   data:  { "thread":thread},
   url:   'embed_topic.php',
   type:  'post',
   beforeSend: function () {
   $("#add_embed_"+thread).html('<div align="center"  style="width:200px;"  ><br><br><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span> </div>');
  
   },
   
   success:  function (response) {
     $("#add_embed_"+thread).html(response);
  
   }  
  }); // end ajax  



		}


function add_to_conversation(panel_b){
var panel_to_add = $("#my_panels_at_converse").val(); 
$("#panel_b").val(panel_to_add);

}





function show_thread(id_thread){

$("#thread_" + id_thread).remove();

 
 $.ajax({
 data:  {
 "p":id_thread 
  },
 url:   'show_thread.php',
 type:  'post',
 beforeSend: function (response) {
     
   
     
  // $("#escenario").append('<div id="prev'+id_thread+'" class="panel "  style="height:120px;width:180px;position:absolute;left:50%;top:30%;z-index:20000;"><div id="caja_frases" style="height:35px;width:150px;"><img src=\"img/loader.gif\">  Loading conversation</div> </div>'); 
     
   // $('#prev'+id_thread).topZIndex();

   
   //$("#main_1").hide(); 

 },
 success:  function (response) { 
 
 
   
   $("#escenario").append(response); 
   
    $('#thread_'+id_thread).topZIndex();

   //$("#panel_prev"+id_thread).remove(); 
  

   var randomnumber=Math.floor(Math.random()*30);
   var randomnumbert=Math.floor(Math.random()*20);
   
   $('#thread_'+id_thread).animate({left:'+='+randomnumber+'%',top:'+='+randomnumbert+'%'},500);
 
 }
 });

 
}







function crear_new_convers(id_panela,autor){   

var id_panel = id_panela; 
var name_new_conversation = $("#name_new_conversation"+id_panela).val();

if (!name_new_conversation  ){ alert("Set the conversation name, please.");


$("#name_new_conversation"+id_panela).css("border","1px solid #ff0000");

 } else {

$.ajax({
   data:  { "id_panel":id_panela,"autor":autor, "name_new_conversation":name_new_conversation},
   url:   'action_create_new_conv_post.php',
   type:  'post',
   beforeSend: function () {
         ver_conversations_in_panel(id_panela,autor);
  $("#box_conver_"+id_panela).prepend('<div align="center"  style="width:200px;"  ><br><br><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span></div>');
  
   },
   
   success:  function (response) {
   //$("#box_conversation_"+id_panela).prepend(response);
   
ver_conversations_in_panel(id_panela,autor);

   
  show_thread(response);
   }  
  }); // end ajax 
  
  
  }

}









function delete_th(id_thread,id_user){

$.ajax({
   data:  { "id_thread":id_thread,"id_user":id_user},
   url:   'borrar_topic_step1.php',
   type:  'post',
   beforeSend: function () {
   $("#delete_panel_conversation_"+id_thread).show();
   $("#delete_panel_conversation_"+id_thread).html('<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"><span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span></div>');
  
   },
   
   success:  function (response) {
   $("#delete_panel_conversation_"+id_thread).html(response);
    // $("#scroll_list_panels"+thread).append(response);
     


   }  
  }); // end ajax 
  

}

function delete_thh(id_thread,id_user){

$.ajax({
   data:  { "id_thread":id_thread,"id_user":id_user},
   url:   'borrar_topic_step2.php',
   type:  'post',
   beforeSend: function () { 
   $("#add_panel_conversation_"+id_thread).html('<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"> Deleting...</div>');
  
   },
   
   success:  function (response) {
   close_thread(id_thread);
	 $("#item_thread_col_convers_"+id_thread).fadeOut(100);
   }  
  }); // end ajax 
  

}

function show_delete_account(){$("#sure_delete").toggle(); 
}

function delete_account(id_u,id_f_u){

$.ajax({
   data:  { "id_u":id_u,"id_f_u":id_f_u},
   url:   'delete_account.php',
   type:  'post',
   beforeSend: function () { 
  
  $("#boton_delete_account").html("Wait...");
  
   },
   
   success:  function (response) { 
 // $("#boton_delete_account").html(response);alert("Your account has been deleted. Thank you.");
document.location.href = "exit.php";
   }  
  }); // end ajax 
  

}


function conf_add_new_convers(id_panela,autor,thread){

//var   id_panel = $("#my_panels_at_converse").val();
 var   id_panel = id_panela;
//var thread = $("#thread").val();

$.ajax({
   data:  { "id_panela":id_panel, "autor":autor, "thread":thread},
   url:   'add_panel_to_conversation.php',
   type:  'post',
   beforeSend: function () {
   $("#box_conversation_"+id_panela).prepend('<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span></div>');
  
   },
   
   success:  function (response) {
   close_u_panel_conversation(thread);
    // $("#scroll_list_panels"+thread).append(response);
     
     
     
     $("#scroll_list_panels"+thread).prepend(response);
 



   }  
  }); // end ajax 
  
   

}



function  show_share(id_share){ 
 
$("#field_url_obj_" + id_share).toggle('slow');
$("INPUT#field_url_obj_" + id_share).select();
}




 function cierra_fancy(){
$.colorbox.close();

}


 function expand_user_content(id_content){
$("#content_user_" + id_content).toggle();
}





$("#img_newpanel").hover(function() {
		$(this).attr("src","ico_newpanel.png");
			}, function() {
		$(this).attr("src","ico_newpanel_h.png");
	});

	 

function ver_conversations_in_panel(id_panel,id_user){
				 
   $("#box_convers_"+id_panel).show();  
   
 $("#caja_comments_"+id_panel).hide();
 $("#box_content_panel_"+id_panel).hide();  
 
$.ajax({
   data:  { "id_panel":id_panel,"id_user":id_user},
   url:   'show_conversations_in_panel.php',
   type:  'post',
   beforeSend: function () {
      
   $("#box_convers_"+id_panel).html('<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span></div>');
   

   },
   
   success:  function (response) {
   
   $("#box_convers_"+id_panel).html(response);
    // $("#scroll_list_panels"+thread).append(response);
 

   }  
  }); // end ajax 
  

}


function  ver_comments(id_panel,id_user){

 $("#box_convers_"+id_panel).hide(); 
 $("#caja_comments_"+id_panel).show();
 $("#box_content_panel_"+id_panel).hide();  
 
 
$.ajax({
   data:  { "id_panel":id_panel,"id_user":id_user},
   url:   'comments.php',
   type:  'post',
   beforeSend: function () {
      
   $("#caja_comments_"+id_panel).html('<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span></div>');
   

   },
   
   success:  function (response) {
   
   $("#caja_comments_"+id_panel).html(response);
    // $("#scroll_list_panels"+thread).append(response);
 

   }  
  }); // end ajax 
  
 
 
}

function  ver_content_panel(id_panel){
             
 $("#box_convers_"+id_panel).hide(); 
 $("#caja_comments_"+id_panel).hide();
 $("#box_content_panel_"+id_panel).show();  
}

function  delete_comments(id_panel,num_comments,id_comment,user_coment){

var num_comments = num_comments-1;
 
$.ajax({
   data:  {"id_comment":id_comment,"user_coment":user_coment},
   url:   'action_delete_comment.php',
   type:  'post',
   beforeSend: function () {
   },
   
success:  function (response) {
                    
  $("#item_commment_"+id_comment).fadeOut(500); 
                     
  $("#box_num_comments_"+id_panel).html(num_comments); 
 
   }  

  }); // end ajax  
 


}


function  insert_comments(id_panel,num_comments){

 num_comments  =  parseInt(num_comments) + parseInt(1);
 
 var tipo_comment ="p"; var rel_comment =""; var sub_comment =""; var estado ="1"; var txt_comment = $("#textarea_comment_"+id_panel).val();

 if (!txt_comment){
 alert("Type some comment first. Thank you.");
 }else {

$.ajax({
   data:  { "num_comments":num_comments,"id_panel":id_panel,"txt_comment":txt_comment,"tipo_comment":tipo_comment,"rel_comment":rel_comment,"sub_comment":sub_comment,"estado":estado},
   url:   'action_guarda_comment.php',
   type:  'post',
   beforeSend: function () {
 $("#button_comment_"+id_panel).html("Wait...");   },
   success:  function (response) {
 $("div#no_comments_text").hide();   
 $("#textarea_comment_"+id_panel).val("");
                                             
 $("#button_comment_"+id_panel).html("Comment");
     $("#lista_comments_"+id_panel).html("");
     $("#lista_comments_"+id_panel).html(response); 


  $("#box_num_comments_"+id_panel).html(num_comments); 

$('#lista_comments_'+id_panel).sbscroller('refresh');
   }  
  }); // end ajax  


} // end control

}


function  open_tour(){
$("#settings_prev").fadeOut(300);
$("#col_feed").fadeOut(300);
$("#col_conversations").fadeOut(300);
$("#col_lat_right").fadeOut(300);
$("#col_fbpages ").fadeOut(300);
$("#start_panel").fadeIn(900);
$("#escenario").append('<div id="fond_start" style="position:relative;top:0:left:0;width:100%;height:600px;background: transparent url(img/fons_m.png) center;z-index:3;"></div>');
$("#fondo_velo").hide();

   $('#col_feed').animate({opacity:'0',right:'-300'},500); 

   
}
 

function skip_tour(){   //$('#button_menu_posts').bind('click');
$("#col_feed").show(600);
$("#col_conversations").fadeIn(600);
$("#col_lat_right").show(600); 
 $("#start_panel").fadeOut(600);
 $("#fond_start").remove();
		//$('#scrollcolfeed').lionbars();
		//$('#scrollcolright').lionbars();
	//	$('#conversations_bottom').lionbars();
        

  
  //$('#scrollcolfeed').sbscroller('refresh');
  
  //show_boxl('col_posts');
    $("#fondo_velo").hide();

   $('#col_feed').animate({opacity:'1',right:'0'},500); 

   
}
 

	
	
function close_settings(){ 
$("#settings_prev").fadeOut(500); 
/*
$("#col_feed").fadeIn(600);
$("#col_conversations").fadeIn(600);
$("#col_lat_right").fadeIn(600);

$("#start_panel").fadeOut(600);
$("#fond_start").remove();
		//$('#scrollcolfeed').lionbars();
		//$('#scrollcolright').lionbars();
		//$('#conversations_bottom').lionbars();
	
$("#fondo_velo").remove();	
		*/
}
 

	
	function delete_from_thread(id_thread, id_panel,autor){ 
  $.ajax({
 data:  {
 "id_thread":id_thread,
 "id_panel":id_panel,
 "autor":autor 
  },
 url:   'action_delete_from_thread.php',
 type:  'post',
 beforeSend: function (response) {
     

 },
 success:  function (response) {  
 $("#tit_col_"+id_panel).fadeOut(100);
 }
 });
  
  
  }

 
 
 
 
 
function show_user_offline(idu){     $("#avatar_friend_"+idu).css("background","#88cee8"); 
$("#panel_user_" + idu).remove();
//alert(idu);
 $.ajax({
 data:  {
 "ufb":idu 
  },
 url:   'show_user.php',
 type:  'post',
 beforeSend: function (response) {
          
     
   $("#escenario").prepend('<div id="panel_prev'+idu+'" class="panel panel_drag"  style="height:50px;width:100px;position:absolute;left:0%;top:5%;z-index:<?php echo $zindex;?>;"><div id="caja_frases" style="height:50px;width:100px;"><img src=\"img/loader.gif\"><span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span></div> </div>'); 
    
 },
 success:  function (response) { 
 
   $("#panel_prev"+idu).remove();  
   $("#escenario").append(response);   
    $('#panel_user_'+idu).topZIndex();
 
   var randomnumber=Math.floor(Math.random()*10);
   var randomnumbert=Math.floor(Math.random()*10);
    $('#panel_user_'+idu).animate({left:'37%',top:'15%'},700);
   
   
 }
 });

 
}
 
 
 
 
 
 

function show_panel_main_offline(id_panel_show, new_p){

new_p = new_p || 0;

 $("#escenario").append('<div id="panel_'+id_panel_show+'"></div>');
 $("#escenario").append('<div id="minimized_'+id_panel_show+'"></div>');

if($("#panel_" + id_panel_show))$("#panel_" + id_panel_show).remove();

if($("#minimized_" + id_panel_show))$("#minimized_" + id_panel_show).remove();
 
 //$(".item_menu_lat").css("background","#f1f1f1");
 //$(".item_menu_lat a").css("color","#666666");
 
 //$("#tit_col_"+id_panel_show).css("background","#c15034");
 //$("#tit_col_"+id_panel_show + " a").css("color","#ffffff");
   
//alert(id_panel_show);
 $.ajax({
 data:  {
 "p":id_panel_show 
  },
 url:   'show_panel.php',
 type:  'post',
 beforeSend: function (response) {
   $("#escenario").append('<div id="panel_prev'+id_panel_show+'" class="panel panel_drag"  style="height:120px;width:180px;position:absolute;left:50%;top:30%;z-index:20000;"><div id="caja_frases" style="height:35px;width:150px;"><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span> </div> </div>'); 
   
       $('#panel_prev'+id_panel_show).topZIndex();
   //$("#main_1").hide(); 

 },
 success:  function (response) { 
 
    $("#panel_prev" + id_panel_show).remove(); 
   
   $("#escenario").append(response); 

    $('#panel_'+id_panel_show).topZIndex();

   var randomnumber=Math.floor(Math.random()*40);
   var randomnumbert=Math.floor(Math.random()*40);
   
   //$('#panel_'+id_panel_show).animate({left:'+='+randomnumber+'%',top:'+='+randomnumbert+'%'},500);
   $('#panel_'+id_panel_show).animate({left:'35%',top:'20%', opacity:1},500);
   
   
   
   if (new_p==1){
   
 //  alert("new");
   edita_panel(id_panel_show);
   }
   
 
 }
 });

 
}






function show_thread_offline(id_thread){

$("#thread_" + id_thread).remove();

 
 $.ajax({
 data:  {
 "p":id_thread 
  },
 url:   'show_thread.php',
 type:  'post',
 beforeSend: function (response) {
     
     
   $("#escenario").append('<div id="thread_prev'+id_thread+'" class="thread thread_drag"  style="height:120px;position:absolute;left:50%;top:30%;z-index:20001;"><div id="caja_frases" style="height:35px;width:150px;"><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span> </div> </div>'); 
   
    $('#thread_prev'+id_thread).topZIndex();

   
   //$("#main_1").hide(); 

 },
 success:  function (response) { 
 
    $("#thread_prev" + id_thread).remove(); 
 
   
   $("#escenario").append(response); 
   
    $('#thread_'+id_thread).topZIndex();



   var randomnumber=Math.floor(Math.random()*30);
   var randomnumbert=Math.floor(Math.random()*20);
   $('#thread_'+id_thread).animate({left:'30%',top:'20%'},500);
 
 }
 });

 
}

function add_post_to_conv(id_panel,id_thread) {

	
$("#box_new_conversation").remove();
		    
 
	$.ajax({
   data:  {"id_panel":id_panel, "id_thread":id_thread},
   url:   'action_create_new_conv_post.php',
   type:  'post',
   beforeSend: function () { 
   $("#box_new_conversation").html('<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span></div>');
  
   },
   
   success:  function (response) {
   $("#box_new_conversation").html(response);
    // $("#scroll_list_panels"+thread).append(response);
     
    
   $('#box_new_conversation').topZIndex();

   }  
  }); // end ajax 
  




}



function crear_a_new_panel_post(th) { 

var $prev_new_panel = $("#box_new_panel");
if ($("#box_new_panel").parent().size()) {   }
else { $("#box_new_panel").fadeOut().remove(); }

  $("#escenario").append('<div id="panel_prev0" class="panel panel_drag"  style="border:0px solid #fff;height:120px;position:absolute;left:50%;top:30%;z-index:20001;"><div  class="texto_18 gris" style="width:100%;text-align:center;font-size:22px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#ccc;font-family:Satisfy, cursive; "><img src="img/loader.gif"><br>Just a sec</div></div>');    

 
    $('#panel_prev0').topZIndex();

    

    

	$.ajax({

   data:  {"th":th},

   url:   'crear_a_panel_post.php',

   type:  'post',

   beforeSend: function () {



    $("#escenario").append('<div id="box_new_panel"    ></div>');

 	   



   },

   success:  function (response) {


    $('#panel_prev0').remove();
       

    $("#escenario").append('<div id="box_new_panel" style="" ></div>');


   $("#box_new_panel").html(response);

   


   $('#box_new_panel').topZIndex();



  var randomnumber  = Math.floor(Math.random()*20);
  var randomnumbert = Math.floor(Math.random()*20);

    

  $('#box_new_panel').animate({left:'+='+randomnumber+'%',top:'+='+randomnumbert+'%', opacity:1},1000);


   }  

  }); // end ajax 

 

}




function update_num_posts (user_p){
 
	$.ajax({
   data:  {"user_p":user_p},
   url:   'update_num_posts.php',
   type:  'post',
   beforeSend: function () {
     
   },
   success:  function (response) {
   
    $("#item_num_posts"+user_p).html(response); 
   }  
}); // end ajax 
 
    
}

function update_follow_button (fbuser_f,uorf){
 
 
var idtofoll = fbuser_f;
 
if (uorf=="u"){
    
       $(".button_follow_"+idtofoll).html('<a href="javascript:void_()" class="   button_f white   bigrounded texto_9 negro"  onClick="follow_user('+idtofoll+')"  style="width:60px;">Subscribe</a>'); 

    
    }
 
if (uorf=="f"){
    
    
    
     $(".button_follow_"+idtofoll).html(' <a href="javascript:void_()" class=" button_f blue   bigrounded texto_9 negro"  onClick="unfollow_user('+idtofoll+')"  style="width:60px;">Subscribed</a>');  
 
    
    }
 
 
}



 
function save_draft_newpost(idu){
 
 
 var idp = 0;

var toth = $("#toth").val();

var t = $("#t_1"+idp).val();

var texto_p = $('#f_post_'+idp).val();
var post_priv = $('#post_priv'+idp).val();
var draft = 0;
var selected_friends_priv = $('#friends_selected'+idp).val();  

var idf_1 = $("#idf_1").val();

var idpd = $("#id_new_post").val();

//var num_chars_tit = $("#t_1"+idp).length;
 
// if (t ){
// if (t || texto_p) {
if (true) {
 if (!t) t = "untitled draft";
 if (!texto_p) texto_p = " ";
    
$.ajax({
 data:  {
 "idu":idu,
 "idpd":idpd,
 "toth":toth,
 "selected_friends_priv":selected_friends_priv,
 "post_priv":'1',
 "t":t,   
  "draft":draft, 
  "texto_p":texto_p
 },
 url:   'action_save_draft_post.php',
 type:  'post',
 beforeSend: function (response) {
},
 success:  function (response) { 
$("#id_new_post").val(response);

 $("#mess_draft").hide('');
 
        var fecha = new Date()
	var hour = fecha.getHours()
	var minutes = fecha.getMinutes()
	var seconds = fecha.getSeconds()
 
 var save_at_time = hour+":"+minutes+":"+seconds;
 
 
 $("#mess_draft").html('Saved as a draft at '+save_at_time).fadeIn(1100);
 
}

});


 } else {
     $("#mess_draft").html('.').fadeIn(1100); 
}
 
 
 
}  // end function



function select_menu_post_top_item(itemf){

$("#menu_post_top li").removeClass("item_menu_selected");
$("#menu_post_top li").addClass("item_menu_normal");
$("#f_"+itemf).removeClass("item_menu_normal");
$("#f_"+itemf).addClass("item_menu_selected");



$("#scrollcolpost").hide();

if (itemf == 'posts_fav'){var item_incl="col_fav";   }
if (itemf == 'post_featured'){var item_incl="col_post_featured"; }
if (itemf == 'posts_community'){var item_incl="col_community_posts"; }
	

$.ajax({ 
   url:   item_incl+'.php',
    type:  'post',
 beforeSend: function () {
$("#scrollcolpost").show();
   $("#scrollcolpost").html("<div  class=\"texto_18 gris  \" style=\"width:100%;text-align:center;font-size:22px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#ccc;font-family: 'Satisfy', cursive; \"><img src=\"img/loader.gif\"><br>Just a sec</div>");
     },
   success:  function (response) {
$("#scrollcolpost").show();
$("#scrollcolpost").html(response);
   }  

  }); // end ajax  
}









function load_rss_box(){
 
		 

   $.ajax({ 

 url:   'xml_connection/connect_rss.php',

 type:  'post',

 beforeSend: function (response) { 

 $("#box_rss_engine").html("");


 $("#box_rss_engine").html("<div  class=\"texto_18 gris  \" style=\"width:100%;text-align:center;font-size:22px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#999;font-family: 'Satisfy', cursive; \"><img src=\"img/loader.gif\"><br>Just a sec</div>");
 
 
 
 alert("a");
 },

 success:  function (response) { 

 alert("b");
 
 $("#box_rss_engine").html(response);

 

 }

 });



}
 
