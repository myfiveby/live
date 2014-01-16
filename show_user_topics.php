<?php 
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ("fonction/fonction_requete.php");

$connexion = Connexion ($login_base, $password_base, $base, $host_base);

							  
function time_ago($date,$granularity=2) {
		$retval = "";
    $date = strtotime($date);
    $difference = time() - $date;
    $periods = array('decade' => 315360000,
        'year' => 31536000,
        'month' => 2628000,
        'week' => 604800, 
        'day' => 86400,
        'hour' => 3600,
        'minute' => 60,
        'second' => 1);
    if ($difference < 5) { // less than 5 seconds ago, let's say "just now"
        $retval = "posted just now";
        return $retval;
    } else {                            
        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference/$value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '').$time.' ';
                $retval .= (($time > 1) ? $key.'s' : $key);
                $granularity--;
            }
            if ($granularity == '0') { break; }
        }
        return $retval.' ago';      
    }
}


  
$query_threads = mysqli_query($connexion,"SELECT * FROM threads LEFT JOIN users on id_user = autor_th  WHERE  autor_th='$_POST[id_u]' ORDER BY f_th DESC"  );
$num_thread=mysqli_num_rows($query_threads);

?>
		<div id="scrollbarfollowers<?php echo $_POST['id_u'];?>" style="position: relative; left:0px;float:left;width:310px;height:224px; ">
<?php
while($view_search_threads = mysqli_fetch_array($query_threads)){

 
		$name_th =  $view_search_threads['name_th'];
		$autort =  $view_search_threads['autor_th'];
		$urlt =  $view_search_threads['url_th'];
		$id_th =  $view_search_threads['id_th'];
		                                 
		$f_creadot =  $view_search_threads['f_th'];                      
$f_creadot = time_ago($f_creadot);
	
$search_usert = Requete ("SELECT id_user,email,name_user,fb_id FROM users WHERE id_user='$autort'" , $connexion);

$lista_search_usert = mysqli_fetch_array($search_usert);	 
		$name_usert =  $lista_search_usert['name_user'];
		$id_usert =  $lista_search_usert['id_user'];
		$fb_idt =  $lista_search_usert['fb_id'];  
		$fb_id_usert = $fb_idt;
		
		
$search_rel_posts = Requete ("SELECT id_th FROM rel_threads LEFT JOIN myfive_panels ON myfive_panels.id_myf = rel_threads.id_panel   WHERE rel_threads.id_th='$id_th'  AND myfive_panels.privacy = '0' AND title <> '' " , $connexion);
$num_posts_rel = mysqli_num_rows($search_rel_posts);	 
		
	if($name_th){
	?> 
<div style="position:relative; width:290px; float:left;left:0px;padding-top:0px;text-align:left;"  class="texto_10 gris">
<a  href="javascript:void_()" onclick="show_thread('<?php echo $id_th; ?>');"  class="texto_13 negro"><?php echo $name_th; ?></a>
  	                                                 
  <div class="texto_10 negro" style=" width:295px; letter-spacing:0px;padding:0px;padding-top:0px;" ><?php echo "  <span class=\"texto_10 gris\">&#9638; ".$f_creadot; ?></span>   
	
	

<div id="ico_love_box<?php echo $id_th; ?>" style="float:right; height:18px;"  >
<div  class=" negro  "   style="display:inline-block;height:19px;"><img src="img/ico_post.png" valign="absmiddle"></div>
<div  class=" negro  "   style="display:inline-block;height:19px; text-align:right;"><?php echo $num_posts_rel; ?></div> </div>
  
       </div> 
 </div>			 
 
<div style="width:95%;clear:both;border-top:1px solid #ddd;margin-top:5px;height:10px;"> </div>
 
		<?php
}

}
 
?> 
</div>
<script type="text/javascript">$('#scrollbarfollowers<?php echo $_POST['id_u'];?>').sbscroller(); </script>
 
