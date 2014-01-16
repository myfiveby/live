<?php
include ("top.php");          
//print_r($session);
 
if (isset($_GET['u'])){$_GET['q']="user";}
if (!isset($_GET['q'])){$_GET['q']="";}
 
 switch ($_GET['q']){
 
	case '': include("main_user.php"); break; // portada
  case 'panelfb': include("panel_fb.php"); break; // portada
  case 'profile': include("profile.php"); break; // portada
  case 'user': include("user.php"); break; // user
	
}       



  include("foot.php"); ?>