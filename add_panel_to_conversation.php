<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 


$panel_a = $_POST['id_panela'];


if (isset($_POST['id_panelb']) AND $_POST['id_panelb']!==""){$panel_b = $_POST['id_panelb'];}


$autor = $_POST['autor'];


if (isset($_POST['name_new_conversation']) AND $_POST['name_new_conversation']!==""){
$query_panel = Requete("INSERT INTO  threads (name_th,f_th,autor_th) VALUES ('$_POST[name_new_conversation]',NOW(),'$_SESSION[id]')" , $connexion);
}
 
if (isset($_POST['thread']) AND $_POST['thread']!==""){ $id_thread = $_POST['thread'];
} else {
$id_thread = mysqli_insert_id($connexion);
}


$query_panelb = Requete("INSERT INTO   rel_threads (id_th,id_panel,f_rel) VALUES ('$id_thread','$panel_a',NOW())" , $connexion);


if (isset($panel_b) AND $panel_b!==""){
$query_panelb = Requete("INSERT INTO   rel_threads (id_th,id_panel,f_rel) VALUES ('$id_thread','$panel_b',NOW())" , $connexion);
}
 
 
 

$consulta_user_datos = Requete ("SELECT *  FROM users  WHERE id_user  = '$autor'  $extra_clause " , $connexion);
$datos_user = mysqli_fetch_array($consulta_user_datos) ;
$id_user = $datos_user['id_user'];
$name_user = $datos_user['name_user'];
$fb_id = $datos_user['fb_id'];
 
 
 
$comprueba_exists_p = Requete ("SELECT id_myf, title FROM myfive_panels  WHERE id_myf  = '$panel_a'  " , $connexion);
 
$datos_titp = mysqli_fetch_array($comprueba_exists_p) ;
$id_panel = $datos_titp['id_myf'];
$titulo_panel = $datos_titp['title'];
  
        
     ?>
<li class="item_menu_conversation"  id="tit_col_<?php echo $id_panel; ?>">     
  <a href="javascript:void_()"; onclick="show_panel_main('<?php echo $id_panel; ?>');"  class=" texto_14 negro">         
    <div class="handle_panels_list" style="width:35px;height:60px;float:left;display:inline-block;cursor:pointer;background:transparent;">             
      <?php   echo "<a href=\"javascript:void()\"  onClick=\"show_user('".$id_panel."')\"   class=\" texto_9 negro\"><img src=\"https://graph.facebook.com/".$_SESSION['fb_id']."/picture\" width=\"30\" align=\"absmiddle\" alt=\"\" border=\"0\" ></a>";  ?>              
 
    <?php if ($_SESSION['fb_id'] == $fb_id ){  ?>              
      <a href="javascript:void_()"; onclick="delete_from_thread('<?php echo $id_thread; ?>','<?php echo $id_panel; ?>','                  
        <?php echo $_SESSION['id']; ?>  ');" title="Delete from this conversation.">                  
        <div style="left:0;margin:0px;" class="button white smallest">x                  
        </div></a>             
      <?php } ?>   
      
             
    </div>         
    <div  id="item_lateral_<?php echo $id_panel; ?>">                
      <a href="javascript:void_()"; onclick="show_panel_main('<?php echo $id_panel; ?>');"  class=" texto_14 negro">                 
        <?php echo $titulo_panel; ?></a><br />               
      <a href="javascript:void_()"; onclick="show_user('<?php echo $_SESSION['fb_id']; ?>');"  class=" texto_11 negro"> by                   
        <?php echo $_SESSION['username']; ?>   </a>                
      <span class="texto_10 ">Just now.              
      </span>         
    </div>              
    <div style="margin-left:30px;" id="item_lateral_<?php echo $id_panel; ?>">           
    </div></a>
</li>             
<?php  
  ?>