<?php 
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ('fonction/fonction_requete.php');
require ('fonction/fonction_formato_fecha.php');
require ('fonction/fucntion_obj_elements.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);?>
<!DOCTYPE HTML> 
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>myfiveby </title> 
<base href="/" /> 
 <META name="title" content="myfiveby.com "> 
 <META name="author" content="myfiveby.com "> 
 <META name="copyright" content="&copy; myfiveby.com "> 
 <META name="description" content=""> 
 <META name="keywords" content=""> 
 <META name="distribution" CONTENT="Global"> 
 <META NAME="robots" CONTENT="all"> 
 
 
<meta name="viewport" content="width=320; initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
 <meta name="apple-touch-fullscreen" content="false" />
 
<link rel="icon" href="/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" /> 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/myfiveby.css" type="text/css" media="screen" />
 <script src="js/jquery-1.6.2.min.js"></script>
 <script src="js/core_myfiveby.js"></script> 
 
 
<link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<link type="text/css" href="css/cupertino/jquery-ui-1.8.14.custom.css" rel="stylesheet" />	 
<style>
body {
 background: #e8e8e8 url('img/texture_pages.jpg') repeat top left;
margin:0px auto;
font-size:13px;
line-height:20px;
color:#333;
 
}
#headcompleto_extra {
 background: #e8e8e8 url('img/fons_top_home.png') repeat-x top center;
position:absolute; top:0;left:0;margin:0 auto 0 auto; width:100%; height:40px;
 }
#head_extra{ 
position:relative;margin:0px auto; width:980px; 
}
#wrap {
	background: #fff; 
	margin:60px auto 200px auto;
	width:980px; 
	background: -webkit-gradient(linear, left top, left bottom, from(#f4f8fa), to(#ffffff));
	background: -moz-linear-gradient(top, #f4f8fa, #ffffff);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f4f8fa', endColorstr='#ffffff');
	box-shadow: 0px 1px 6px rgba(0,0,0, .1);
	-webkit-box-shadow: 0px 1px 6px rgba(0,0,0, .1);
	-moz-box-shadow: 0px 1px 6px rgba(0,0,0, .1);
	border:1px solid #ccc; 
	-webkit-border-radius: .4em; 
	-moz-border-radius: .4em; 
	border-radius: .4em; 
}

#logo{
	width:200px; 
	margin:0px;
	float:left; 
}

#col_1{
	float:left;
	width:180px;
	margin:10px; 
	top:30px;
	text-shadow:#fff 1px 1px 1px;
	font-size:15px;
	border-right:1px solid #eee;
	line-height:30px;
	color:#35aad6;
	padding-right:20px;
}

#col_1 li { 
	padding:5px; 
	margin:0px;
	text-shadow:#fff 1px 1px 1px;
	list-style-type:none;
	font-size:15px;
	text-align:right;
}

#col_1 a {  
	color:#35aad6;
	text-decoration:none;
}

#col_1 a:hover {  
	color:#19d2e8;
	text-decoration:underline;
}

#col_2{
	width:625px; 
	margin:20px;
	padding:15px;
	margin-top:30px;
	margin-left:210px;
	line-height:22px;
	font-size:14px;
}

strong { 
	color:#19a5da; 
}

h1 {
	text-decoration:none; 
	text-shadow:#fff 1px 1px 2px;
	color:#19a5da;
	font-weight:normal;
	font-size:32px;
	margin:0px;
	text-align:left;
	width:100%;
	padding-bottom:15px;
	border-bottom:1px solid #8cdaf8;
	letter-spacing:-1px;
}

li{padding:5px;list-style-type:circle;}
 
</style>
</head>
<body> 
 
 
<div id ="headcompleto_extra"> 
<div id ="head_extra"> 
<a href="index.php" title="myfiveby.com"><img src="img/logo_myfiveby.png" border="0" alt="myfiveby.com"></a>
</div>
</div>
 
<div id="wrap" > 
 
<div id="col_1">

<a style="cursor:pointer;" href="about" class="lista_ul"><li >About</li></a>
<a style="cursor:pointer;" href="content" class="lista_ul"><li >Content</li></a>
<a style="cursor:pointer;" href="team" class="lista_ul"><li >Team</li></a>
<a style="cursor:pointer;" href="brands" class="lista_ul"><li >Brands</li></a>
<a style="cursor:pointer;" href="resources" class="lista_ul"><li >Resources</li></a>
<a style="cursor:pointer;" href="press" class="lista_ul"><li >Press</li></a>
<a style="cursor:pointer;" href="privacy" class="lista_ul"><li >Privacy</li></a>
<a style="cursor:pointer;" href="terms" class="lista_ul_checked_gebta"><li >Terms</li></a>

 </div>


<?php
/*
if (!isset($_GET['p']) AND $_GET['p']=="" ){$_GET['p'] = 1;}
$extraer_subparents = Requete("SELECT *
FROM pagines WHERE parent = '$_GET[g]' AND activo_pagina = '1' ORDER BY position", $connexion);
while($voir_extraer_subparents = mysqli_fetch_array($extraer_subparents)){
$_POST['id_pagina'] = $voir_extraer_subparents['id_pagina'];
$_POST['nom_pagina'] = $voir_extraer_subparents['nom_pagina'];
$_POST['descrip_pagina'] = $voir_extraer_subparents['descrip_pagina'];
$_POST['activo_pagina'] = $voir_extraer_subparents['activo_pagina'];
$_POST['nivel'] = $voir_extraer_subparents['nivel'];
$_POST['parent'] = $voir_extraer_subparents['parent'];
$_POST['mod_opinionsub'] = $voir_extraer_subparents["mod_opinion"]; 
$_POST['mod_imagenessub'] = $voir_extraer_subparents["mod_imagenes"]; 
$_POST['mod_actualidadsub'] = $voir_extraer_subparents["mod_actualidad"]; 
$_POST['mod_agendsuba'] = $voir_extraer_subparents ["mod_agenda"]; 
 
 echo "<a style=\"cursor:pointer;\" href=\"pages.php?p=$_POST[id_pagina]\" 
 class=\"";
 if(isset($_GET['p']) AND ($_GET['p'] == $_POST['id_pagina']))
 {echo "lista_ul_checked_gebta";}else{echo "lista_ul";}
 echo"\"><li >" .$_POST['nom_pagina']."</li></a>";
}
*/
?> 
<div id="col_2">
<?php
$extraer_descripciones = Requete("SELECT * FROM pagines WHERE id_pagina = '$_GET[p]' ", $connexion);
while($voir_extraer_descripciones = mysqli_fetch_array($extraer_descripciones)){
$_POST['id_pagina'] = $voir_extraer_descripciones['id_pagina'];
$_POST['nom_pagina'] = $voir_extraer_descripciones['nom_pagina'];
$_POST['descrip_pagina'] = $voir_extraer_descripciones['descrip_pagina'];
$_POST['activo_pagina'] = $voir_extraer_descripciones['activo_pagina'];
$_POST['nivel'] = $voir_extraer_descripciones['nivel'];
$_POST['parent'] = $voir_extraer_descripciones['parent'];
$_POST['mod_opinion'] = $voir_extraer_descripciones["mod_opinion"]; 
$_POST['mod_imagenes'] = $voir_extraer_descripciones["mod_imagenes"]; 
$_POST['mod_actualidad'] = $voir_extraer_descripciones["mod_actualidad"]; 
$_POST['mod_agenda'] = $voir_extraer_descripciones ["mod_agenda"]; 
$_POST['mod_documentos'] = $voir_extraer_descripciones ["mod_documentos"]; 
echo "<h1> ".$_POST['nom_pagina']."</h1>";
echo $_POST['descrip_pagina'];
}
 
?>
 
 </div>
 </div> 
 
</body>
</html>