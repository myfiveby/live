<?php if (!session_id() || session_id()==""){
	session_start();
} ?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Anonymous+Pro' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Magra' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="../css/myfiveby.css" type="text/css" media="screen" />

<?php
 $base_url_= "http://myfiveby.com/";

/*
$data[0] = array("nombre" => "Albert", "apellido" => "Camus");
$data[1] = array("nombre" => "Ernesto", "apellido" => "Sabato");
echo json_encode($data);


*/





function time_ago($date,$granularity=2) {
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


require ('../conf/sangchaud.php');
require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$urlthread=$_GET['t'];

$hiit=($_GET['hi'])-180;
$wiit=($_GET['wi'])-50;

$consulta_thread_panel = Requete ("SELECT *  FROM  threads   LEFT JOIN users   ON id_user = autor_th  WHERE url_th = '$urlthread' " , $connexion);
	if (mysqli_num_rows($consulta_thread_panel) > 0 ){
	
	
  
 $datos_consulta_thread_panel = mysqli_fetch_array($consulta_thread_panel);
         
        $id_thread = $datos_consulta_thread_panel['id_th'];
        $name_thread = $datos_consulta_thread_panel['name_th'];
        $name_user = $datos_consulta_thread_panel['name_user'];
        $fb_id = $datos_consulta_thread_panel['fb_id'];
        
        $f_creado = $datos_consulta_thread_panel['f_th'];

        $url_panel = $datos_consulta_thread_panel['url_th'];

$f_creado = time_ago($f_creado);

        } else { echo "no results";}
 ?> 
<div id="thread_<?php echo $id_thread; ?>" class="thread panel_drag"  style="position:absolute;width:98%;background:transparent; ">

<div id="caja_thread" style="width:98%; "> 
<?php
$consulta_thread_panel = Requete ("SELECT *  FROM  threads   LEFT JOIN users   ON id_user = autor_th  WHERE id_th  = '$id_thread' " , $connexion);
	if (mysqli_num_rows($consulta_thread_panel) > 0 ){
	
	
  
 $datos_consulta_thread_panel = mysqli_fetch_array($consulta_thread_panel);
         
        $name_thread = $datos_consulta_thread_panel['name_th'];
        $name_user = $datos_consulta_thread_panel['name_user'];
        $fb_id = $datos_consulta_thread_panel['fb_id'];
        
        $f_creado = $datos_consulta_thread_panel['f_th'];

        $url_panel = $datos_consulta_thread_panel['url_th'];

$f_creado = time_ago($f_creado);
?>

<div style="width:95%;display:inline-block;float:left;padding:4px;padding-left:5px; color:#333; " class="texto_19" >

<div style="letter-spacing:0px;width:100%;display:inline-block;font-size:20px;border-bottom:1px solid #ccc;">
<a href="<?php echo $base_url_; ?>" target="_blank"><img src="http://www.myfiveby.com/myfiveby_logo.png" width="100" height="35" border="0" alt="myFIVEby.com"></a>
<!--<div style="float:right;font-size:13px;color:#ff0000;">Sign up myFIVEby.com</div>-->
</div>
 
<div style="letter-spacing:0px;width:100%;display:inline-block;font-family: 'Magra', sans-serif;font-size:20px;padding-top:10px;">
<a href="<?php echo $base_url_.$url_panel;?>" target="_blank"><?php echo $name_thread; ?></a></div>
 
 
 </div> 

 
 
 
 
<div style="clear:both;"></div>


<div class="icons_panel_content_" style="height:40px; padding:5px;padding-top:5px; color:#999;background:#f1f1f1;">
  
  
  <div class="texto_13 negro" style="float:left; display:inline-block;letter-spacing:0px;padding:0px;padding-top:6px; font-family: 'Open Sans', sans-serif;font-size:12px;"><?php echo "<b>by ".$name_user."</b><br><span class=\"texto_10 negro\">".$f_creado; ?></span></div>
  
  
 <?php  

   $full_url_panel= $base_url_.$url_panel;
        $titulo_panel = $name_thread; ?>
 
 <div   id="box_sharer_<?php echo $url_panel; ?>"  style="float:right;border:0px solid #eeeeee;background:transparent;padding:4px;padding-top:8px;display:inline-block;width:180px;">
 <a href=" <?php echo $full_url_panel; ?>" target="_blank" style="color:#999999;font-size:10px;height:20px;" class="button2"  title="View link" ><img src="<?php echo $base_url_; ?>img/ico_sh_link.png" border="0"></a>

<script>function fbs_click() {u='<?php echo $full_url_panel; ?>';t='<?php echo $titulo_panel; ?>';window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click()" target="_blank" class="button2"  title="Share on Facebook" ><img src="<?php echo $base_url_; ?>img/ico_sh_facebook.png" border="0"></a>
<a href="http://twitter.com/home?status=Reading: <?php echo $titulo_panel; ?> at @myfiveby more... <?php echo $full_url_panel; ?>" title="Click to share this post on Twitter" target="_blank" class="button2"  title="Share on Twitter" ><img src="<?php echo $base_url_; ?>img/ico_sh_twitter.png" border="0"></a>

<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $full_url_panel; ?>&title=<?php echo $titulo_panel; ?>&source=myfiveby.com" target="_blank" class="button2"  title="Share on Linkedin" ><img src="<?php echo $base_url_; ?>img/ico_sh_linkedin.png" border="0" ></a>
 
<a href="javascript:( function(){var w=480;var h=380;var x=Number((window.screen.width-w)/2);var y=Number((window.screen.height-h)/2);
window.open('https://plusone.google.com/_/+1/confirm?hl=en&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'','width='+w+',height='+h+',left='+x+',top='+y+',scrollbars=no');})();" class="button2"   title="Share on Google+" ><img src="<?php echo $base_url_; ?>img/ico_sh_gplus.png" border="0"></a>
</div>
</div>
 
 
  		<link rel="stylesheet" type="text/css" href="<?php echo $base_url_; ?>js/lionsbar/lionbars.css" />
<script type="text/javascript" src="<?php echo $base_url_; ?>/js/jquery-1.6.2.min.js"> </script>
  <script type="text/javascript" src="<?php echo $base_url_; ?>/js/lionsbar/jquery.lionbars.0.3.js"> </script>
 
<script type="text/javascript">
$().ready(function(){
		$('#list_panels_th<?php echo $id_thread; ?>').lionbars();
	}); // end ready
</script>
<div id="list_panels_th<?php echo $id_thread; ?>" style="width:<?php echo $wiit; ?>px;height:<?php echo $hiit; ?>px;display:inline-block;float:left; padding:4px;padding-left:5px;" class="texto_13 negro" >
<?php include("../fonction/lista_panels_th_w.php");?>
 
 
</div>
 
<div style="clear:both;"></div>
  <div align="center" style="width:90%;border:1px solid #eeeeee;text-align:center;display:inline-block; padding:4px;margin:0 auto;" class="texto_13 negro" >
 &nbsp;
</div> 
<?php  } ?>
</div>

<?php
 

?>

</div>
