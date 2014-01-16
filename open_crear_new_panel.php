<?php if (!session_id() || session_id()==""){
	session_start();
} ?>
<script  type="text/javascript" language="javascript">
	

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
		$( ".panel" ).draggable({  cursor: "move", stack:"div", scrollSensitivity:1,containment: "#escenario" , handle:".panel", opacity: 0.9   }); 	}); 




var currentRotation=null;

function checkOrientAndLocation(){
	if(currentRotation != window.orientation){
		setOrientation();
	}
}

function setOrientation(){
	switch(window.orientation){
		case 0:
			orient = 'portrait';
			break;
		case 90:
			orient = 'landscape';
			break;
		case -90:
			orient = 'landscape';
			break;
			 
	}
	currentRotation = window.orientation;
	document.body.setAttribute("orient",orient);
	setTimeout(scrollTo,0,0,1);
}

$().ready(function(){
	setInterval(checkOrientAndLocation,1000);
	$('.panel').touch({
		animate: false,
		sticky: true,
		dragx: true,
		dragy: true,
		rotate: true,
		resort: true,
		scale: true
	});
	
	}); // end ready


	</script>
	
	
<?php
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

if ($_SESSION['id']==$_POST['izt']){ 
 ?>
 
<div id="panel_open" class="panel panel_drag"  style="width:400px;position:absolute;left:15%;top:5%;z-index:3500;cursor:move;">

<div id="caja_frases" style="width:400px;height:160px;">
 <div id="menu_caja" style="display:inline-block;float:right; height:20px;padding:4px;"><a href="javascript:void_()" class=" button white small bigrounded" onclick="close_box('panel_open')"><b>x</b></a></div>
 
 

<span class=" texto_14 tit_col_box"><img src="ico_newpanel.png"   alt="History" align="absmiddle"> Create a new panel</span>
 
<?php echo "<div align=\"center\" style=\"padding:4px;padding-top:10px;display:inline-block;\">
<div class=\"button white medium\" style=\"width:142px;height:90px;\" onClick=\"crear_new_panel_post('".$_SESSION['id']."');\" id=\"button_new_panel\">POST <img src=\"img/picto_post_panel.png\"></div>";?>




 <?php 
// echo "<div align=\"center\" style=\"padding:4px;padding-top:10px;display:inline-block;\"><div class=\"button white medium\" style=\"width:144px;height:90px;\" onClick=\"crear_new_panel('".$_SESSION['id']."');\" id=\"button_new_panel\">TITLES <img src=\"picto_title_panel.png\"></div>";
?>

 
 </div> </div>
 
 
<?php } else {

echo "ERROR!";

}?>