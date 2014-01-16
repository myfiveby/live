<script type="text/javascript">

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

</script>


   <?php

$clause_where_list="f_rel DESC";
$cont_p_th=0;
$consulta_thread_panel_list =  Requete ("SELECT *  FROM rel_threads LEFT JOIN myfive_panels ON myfive_panels.id_myf = rel_threads.id_panel  WHERE rel_threads.id_th  = '$id_thread' ORDER BY $clause_where_list " , $connexion);
  
 while($datos_consulta_thread_panel_list = mysqli_fetch_array($consulta_thread_panel_list)){
 
        $id_thread = $datos_consulta_thread_panel_list['id_th']; 
        //$id_thread = $datos_consulta_thread_panel_list['id_panel']; 
        
        
        $id_myf = $datos_consulta_thread_panel_list['id_myf'];
$titulo_panel = stripslashes($datos_consulta_thread_panel_list['title']);

$f_creado = $datos_consulta_thread_panel_list['f_creado'];

     
$autor = $datos_consulta_thread_panel_list['autor'];
     
$loves = $datos_consulta_thread_panel_list['loves'];
$favs = $datos_consulta_thread_panel_list['favs'];
$url_post = $datos_consulta_thread_panel_list['url'];

$f_creado = time_ago($f_creado);



$consulta_user_datos = Requete ("SELECT id_user,name_user,url,fb_id  FROM users  WHERE id_user  = '$autor'  $extra_clause " , $connexion);
$datos_user = mysqli_fetch_array($consulta_user_datos) ;
$id_user = $datos_user['id_user'];
$name_user = $datos_user['name_user'];
$fb_id = $datos_user['fb_id'];
$url_user = $datos_user['url'];

 
        
     ?>
<li class="item_menu_conversation"  id="tit_col_<?php echo $id_myf; ?>" style="width:97%;">

<a href="<?php echo  $base_url_.$url_post;?>";  class=" texto_14 negro" target="_blank">

<div class="handle_panels_list" style="width:35px;height:60px;float:left;display:inline-block;cursor:pointer;background:transparent;">
<?php   echo "<a href=\"".$base_url_.$url_user."\"   class=\" texto_9 negro\" target=\"_blank\"><img src=\"https://graph.facebook.com/".$fb_id."/picture\" width=\"30\" align=\"absmiddle\" alt=\"\" border=\"0\" ></a>";  ?>
</div>

<div  id="item_lateral_<?php echo $id_myf; ?>" style="width:98%;">
 

<a href="<?php echo  $base_url_.$url_post;?>" class=" texto_14 negro" target="_blank">
<?php echo $titulo_panel; ?></a>
<br />
 <a href=""<?php echo  $base_url_.$url_user;?>"  class=" texto_11 negro"> by <?php echo $name_user; ?> </a>
  <span class="texto_10 "><?php echo $f_creado; ?></span></div>
 
 
<div style="margin-left:30px;" id="item_lateral_<?php echo $id_myf; ?>"><?php echo $date_item; ?></div>
</a>
</li>
     
     <?php    
        $cont_p_th++;
}




?> 