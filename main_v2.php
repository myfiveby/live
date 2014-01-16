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
<?php if (empty($_SESSION['id']) AND empty($_GET['u'])){ ?> 


 


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
margin:0;
font-family:'Open Sans', sans-serif;
background: #fff url('../img/bg_web.jpg') repeat-x top center;

}



li {list-style-type:none;}


a{
text-decoration:none;}
    
#container{
    width:980px; 
    margin:0 auto;
    padding: 0px;
    
}
     
#container_foot{
    width:100%; 
    margin:0 auto;
    padding: 0px; 
    height:300px;
background: #333 url('../img/foot.jpg') repeat-x top center;

}
 
 
 h2{
    color:#666; 
        font-size:26px;
    letter-spacing:-1px;
    color:#a1a1a1;
    text-shadow: 1px 1px 1px #fff;
    font-weight: normal;
    margin:2px;
 }
 
 #header{
    
    height: 230px;
    text-align:center;
    margin: 0 auto;
    
    }
    
   #logo_header {
    
    text-align:center;
    margin: 0 auto; 
    height:175px;
    width:100%;
    margin-top: 40px;
    
    } 
    
    #slogan_header {
    
    text-align:center;
    margin: 0 auto;
    height:40px;
    width:100%;
    font-size:31px;
    letter-spacing:-1px;
    color:#666; 
    font-weight: bolder;
    text-shadow: 1px 1px 1px #fff;
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
    height:280px;
    font-size: 15px;
    color:#666;
     }
     
     
     .col_item{
        
        width: 280px;
        height:260px;
        margin:10px;
	margin-top: 0px;
        display:inline-block	;
        text-align:left;
     }
     
 
     
     #foot_box{ 
    margin: 0 auto;
    width:980px;
        padding:20px;
        height:150px;
        
     }
     
     
     #box_social_buttons { width:180px; float:right;}
     
     #box_menu_foot {
     margin:0px auto; 
     font-size:14px;
     color:#f1f1f1;
    }
    
    #box_menu_foot a {
	display: inline-block;
     
     text-align:left;
     font-size:14px;
     color:#f1f1f1;
     padding:10px;
     padding-top:0px;
     margin:5px;
    }
     
     #box_signature{
	
	clear:both;
	margin: 0 auto;
	width:100%;
	text-align:center;
	font-size:10px;
	color:#eee;
	text-shadow: 1px 1px 1px #000;
	padding-top:70px;
     }
     
     
     a.shine{
text-shadow:#000000 1px 1px 1px;color:#fff; 
color:#fff;
}

a.shine:hover{
text-shadow: #dfe3a6 1px 0px 6px;
color:#fff;
text-decoration:none;
}

.box_img_slider{
text-align:center;
position: relative;
top: 0px;
width:260px;
height:200px; 
}

    div {}
    .dclear { clear:both;}
    
</style>


<body   >
    
<div  id ="head_completed">  

<div  id ="head">  
<div  id ="logo">
<a href="index.php" title="myfiveby.com"><img src="/img/logo_myfiveby.png" border="0" alt="myfiveby.com" ></a>
</div>


<?php  /* echo '<a href="https://www.facebook.com/dialog/oauth?client_id=216857658359417&redirect_uri=http%3A%2F%2Fwww.sioque.es%2Fmyfiveby%2Findex.php&state=5ebfd7460a8d334921a16cfbfd70183a&scope=email,manage_pages,user_about_me" ><p class="blanco"><u>SignUp with Facebook</u></p></a>';
*/
?>

 
 
 
</div>
</div>     <div id="container">

  <div id="header">
            
        <div id="logo_header"><img src="../img/logo_home.png" alt="myFIVEby - Create, converse, share.  It's Blogging, reinvented!">
        </div>
            
        <div id="slogan_header">It's Blogging, Reinvented
        </div>
            
            
            
            
        </div> <!-- end header div -->
        
        
        <div class="dclear"></div>
        
        
        <div id="connect">
            
            <img src="../img/fb_connect_button.png">
            
            
        </div> <!-- end connect -->
        
        
        
        
        <div class="dclear"></div>
        
        
        
        <div id="items_text_box">
            
            
            <div id="items_text_col1" class="col_item">
            <div class="box_img_slider"><img src="http://www.sioque.es/myfiveby/img/img_slider/slide_01.jpg" width="200"></div>A dedicated place for <i>your</i> content: stories, ideas, insights, expertise, passions, observations and more.</div><!-- end items_text_col1 div -->
            
            
            <div id="items_text_col2" class="col_item"><div class="box_img_slider"><img src="http://www.sioque.es/myfiveby/img/img_slider/slide_03.jpg" width="200"></div>Participate in conversations and<br> start your own to answer life's big questions.</div><!-- end items_text_col2 div -->
            
            <div id="items_text_col3" class="col_item"><div class="box_img_slider"><img src="http://www.sioque.es/myfiveby/img/img_slider/slide_05.jpg" width="200"></div>Be up and running in two minutes<br> to easily share and discover new<br> content of substance.</div><!-- end items_text_col2 div -->
            
            
        </div>  <!-- end items_text_box div -->
        
        
      
        <div class="dclear"></div>  
        

  
    </div> <!--  end container div -->
    
    
    <div id="container_foot">
    
    
          
        <div id="foot_box">
            
  
            
            <div id="box_social_buttons">
                
                 
                <a href="http://www.soooshial.com/myfiveby" title="soooshial" target="blank" rel="tipster" ><img src="../img/soooshial.png" alt="soooshial"></a>  
                <a href="https://twitter.com/#!/myfiveby" title="Twitter" target="blank" rel="tipster"><img src="../img/twitter.png" alt="Twitter"></a> 
                <a href="https://www.facebook.com/myfiveby" title="Facebook" target="blank" rel="tipster"><img src="../img/facebook.png" alt="Facebook"></a>   
                <a href="http://vimeo.com/myfiveby" title="Vimeo" target="blank" rel="tipster"><img src="../img/vimeo.png" alt="Vimeo"></a>
            </div><!-- end box_social_buttons div -->
            
           
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
   {echo "";}else{echo "lista_ul";}
    echo"\"><li   >" .$_POST['nom_pagina']."</li></a>";
} 
?>
</div>   
          <div id="box_signature">&copy; myFIVEby.com - 2012</div>
                 
        </div>  <!-- end foot_box div -->
         
       
    
    </div>
    
    


<?php } else {

include("main_user.php");


} 


include("foot.php");






?>


