<?php 
if (!session_id() || session_id()==""){
	session_start();
}
ini_set("session.cache_expire", 360);
error_reporting(0);
require ('../conf/sangchaud.php');
require ("../fonction/fonction_connexion.php");
require ('../fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
 
 ?>
<!DOCTYPE HTML> 
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:fb="http://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  

<title>myFIVEby - Create, converse, share.  It's Blogging, reinvented! </title>  

  <META name="title" content="myFIVEby - Create, converse, share.  It's Blogging, reinvented! "> 
  <META name="author" content="myfiveby.com "> 
  <META name="copyright" content="&copy; myfiveby.com "> 
  <META name="description" content=""> 
  <META name="keywords" content=""> 
  <META name="distribution" CONTENT="Global"> 
  <META NAME="robots" CONTENT="all"> 
   
   
   <!--   meta g+ -->
   <meta itemprop="name" content="myFIVEby - Create, converse, share.  It's Blogging, reinvented! ">
   <meta itemprop="image" content="http://www.sioque.es/myfiveby/logo_myfiveby.png">
   
   
 
<meta name="viewport" content="width=320; initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<meta name="apple-touch-fullscreen" content="false" />

 
<link rel="icon" href="favicon.ico" type="image/x-icon" /> 

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />  
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Anonymous+Pro' rel='stylesheet' type='text/css'><link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/myfiveby.css" type="text/css" media="screen" />

	 

</head>



<style>
    
*{outline: none;}


::selection {
	background: #9fe5f4; /* Safari */
	}
::-moz-selection {
	background: #9fe5f4; /* Firefox */
}

::-webkit-input-placeholder {
    color:    #c9c9c9;
}
:-moz-placeholder {
    color:    #c9c9c9;
}
body{

font-family:'Open Sans', sans-serif;
background: #fff url('../img/bg_web.png') repeat-x top center;

}



li {list-style-type:none;}


a{
text-decoration:none;}
    
#container{
    width:980px; 
    margin:0 auto;
    padding: 0px;
    
}
 
 
 h2{
    color:#666;
    font-size:18px;
 }
 
 #header{
    
    height: 300px;
    text-align:center;
    margin: 0 auto;
    
    }
    
   #logo_header {
    
    text-align:center;
    margin: 0 auto; 
    height:260px;
    width:100%;
    
    } 
    
    #slogan_header {
    
    text-align:center;
    margin: 0 auto;
    height:80px;
    width:600px;
    font-size: 28px;
    color:#711817;
    text-shadow: 1px 1px 1px #fff;
    
    font-weight: bold;
     } 
    
       #connect { 
    text-align:center;
    margin: 0 auto;
    height:80px;
    width:600px;
    
     }
     
     
    #items_text_box {
    
    text-align:center;
    margin: 0 auto;
    width:100%;
    height:380px;
    font-size: 15px;
    color:#666;
     }
     
     
     .col_item{
        
        width: 280px;
        height:300px;
        margin:20px;
	    border: 0px solid #333;
        display:inline-block;
        text-align:left;
     }
     
     
     #items_text_col1{ 
        
     }
     
     #foot_box{
        padding:20px;
        height:200px;
        background: #333;
        
     }
     
     
     #box_social_buttons { width:200px; float:left;}
     
     #box_menu_foot {
     margin:0px auto;
     font-size:14px;
     color:#f1f1f1;
    }
    
    #box_menu_foot a {
	display: inline-block;
     margin:0px auto;
     font-size:14px;
     color:#f1f1f1;
     padding:10px;
     margin:5px;
    }
     
     #box_signature{
	
	float:right;
	width:200px;
	font-size:10px;
	color:#787878;
	text-shadow: 1px 0px 1px #000;
	padding-top:10px;
     }
     
     
     a.shine{
text-shadow:#000000 1px 1px 2px;color:#fff; 
color:#fff;
}

a.shine:hover{
text-shadow: #dfe3a6 1px 0px 6px;
color:#fff;
text-decoration:none;
}



    div {}
    .dclear { clear:both;}
    
</style>


<body   >
    <div id="container">
        
        
        <div id="header">
            
        <div id="logo_header"><img src="../img/logo_home.png" alt="myFIVEby - Create, converse, share.  It's Blogging, reinvented!">
        </div>
            
        <div id="slogan_header">It's Blogging, reinvented.
        </div>
            
            
            
            
        </div> <!-- end header div -->
        
        
        <div class="dclear"></div>
        
        
        <div id="connect">
            
            <img src="../img/connect_home.png">
            
            
        </div> <!-- end connect -->
        
        
        
        
        <div class="dclear"></div>
        
        
        
        <div id="items_text_box">
            
            
            <div id="items_text_col1" class="col_item"><img src="http://www.sioque.es/myfiveby/img/img_slider/slide_01.jpg" width="220"><br><h2>Create</h2>A dedicated place for your content - stories, ideas, insights, expertise, passions and more.</div><!-- end items_text_col1 div -->
            <div id="items_text_col2" class="col_item"><img src="http://www.sioque.es/myfiveby/img/img_slider/slide_03.jpg" width="220"><br><h2>Converse</h2>Participate in conversations and start your own to answer life’s big questions.</div><!-- end items_text_col2 div -->
            <div id="items_text_col3" class="col_item"><img src="http://www.sioque.es/myfiveby/img/img_slider/slide_05.jpg" width="220"><br><h2>Share</h2>Be up and running in less than two minutes to easily share and discover new content of substance.</div><!-- end items_text_col2 div -->
            
            
        </div>  <!-- end items_text_box div -->
        
        
      
        <div class="dclear"></div>  
        
        
        <div id="foot_box">
            
            
            <div id="box_social_buttons">
                
                 
                <a href="http://www.soooshial.com/myfiveby" title="soooshial" target="blank" rel="tipster" ><img src="../img/soooshial.png" alt="soooshial"></a>  
                <a href="https://twitter.com/#!/myfiveby" title="Twitter" target="blank" rel="tipster"><img src="../img/twitter.png" alt="Twitter"></a> 
                <a href="https://www.facebook.com/myfiveby" title="Facebook" target="blank" rel="tipster"><img src="../img/facebook.png" alt="Facebook"></a>   
                <a href="http://vimeo.com/myfiveby" title="Vimeo" target="blank" rel="tipster"><img src="../img/vimeo.png" alt="Vimeo"></a>
            </div><!-- end box_social_buttons div -->
            
           
            <div id="box_signature">&copy; myFIVEby.com - 2012
	    </div>

<div id="box_menu_foot">

<?php

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

$_POST['mod_opinionsub']  = $voir_extraer_subparents["mod_opinion"]; 
$_POST['mod_imagenessub']  = $voir_extraer_subparents["mod_imagenes"]; 
$_POST['mod_actualidadsub']  = $voir_extraer_subparents["mod_actualidad"]; 
$_POST['mod_agendsuba']  = $voir_extraer_subparents ["mod_agenda"]; 

    
    echo "<a style=\"cursor:pointer;\" href=\"pages.php?p=$_POST[id_pagina]\" 
    class=\"shine
    ";
   if(isset($_GET['p']) AND ($_GET['p'] == $_POST['id_pagina']))
   {echo "lista_ul_checked_gebta";}else{echo "lista_ul";}
    echo"\"><li   >" .$_POST['nom_pagina']."</li></a>";
} 
?>
</div>   
            
        </div>  <!-- end foot_box div -->
         
        
    </div> <!--  end container div -->
    
    
    
    
</body>


</html>


