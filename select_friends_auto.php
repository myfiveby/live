      
  <?php					
		      if( $priv == 2){
					
					
					
$query_f_allow_priv = mysqli_query($connexion,"SELECT * FROM rel_privacy_posts  WHERE id_post_priv ='$id_myf'"   );
$view__f_allow_priv= mysqli_fetch_array($query_f_allow_priv);

		$users_allow_priv = $view__f_allow_priv['users_allow_priv'];
					
					
			    	$arr_users_allow_priv = explode (",",$users_allow_priv);
	
		    
	 		$search_t_p = "[";
	 		
	 foreach ($arr_users_allow_priv as $id_user_priv) {
					
				
					
					
$query_friends_s = mysqli_query($connexion,"SELECT id_user,fb_id,name_user,bio,url FROM users  WHERE id_user ='$id_user_priv'  ORDER BY name_user   "   );
 
			$search_t = "[";							 
while($lista_amigos_view_s = mysqli_fetch_array($query_friends_s)){

		$id_user_fw = $lista_amigos_view_s['id_user'];
		$id_user_f = $lista_amigos_view_s['fb_id'];
		$name_user =  addslashes( ($lista_amigos_view_s['name_user']));
		$url_user =  $lista_amigos_view_s['url'];

	
	if($name_user){
	   $search_t_p .= '{id:'.$id_user_fw.',first_name:"'.$name_user.'"},';
 
}
}
}
$search_t_p = $search_t_p."]";
$search_t_p = str_replace("},]","}]",$search_t_p);


}

$query_friends = mysqli_query($connexion,"SELECT id_user,id_to_follow,name_user,bio,url,id_user_to_follow FROM follow LEFT JOIN users ON id_user = id_user_to_follow WHERE  id_user_f='$_SESSION[id]' ORDER BY name_user   "   );
$num_following=mysqli_num_rows($query_friends);
			$search_t = "[";							 
while($lista_amigos_view = mysqli_fetch_array($query_friends)){

		$id_user_fw = $lista_amigos_view['id_user'];
		$id_user_f = $lista_amigos_view['id_to_follow'];
		$name_user =  addslashes( ($lista_amigos_view['name_user']));
		$url_user =  $lista_amigos_view['url'];

	
	if($name_user){
	   $search_t .= '{id:'.$id_user_fw.',"first_name":"'.$name_user.'",
		 "last_name": "'.$url_user.'",
		 "email": "-",
		 "url":"https://graph.facebook.com/'.$id_user_f.'/picture"},';
 
}
}
$search_t = $search_t."]";
$search_t = str_replace("},]","}]",$search_t);


?> 

<script type="text/javascript" src="autofriends/src/jquery.tokeninput.js"></script>

    <link rel="stylesheet" href="autofriends/styles/token-input.css" type="text/css" />
    <link rel="stylesheet" href="autofriends/styles/token-input-facebook.css" type="text/css" />

    <script type="text/javascript">
    $(document).ready(function() {
        $("input[type=button]").click(function () { 
            var selected_f = $(this).siblings(".input_auto").val();
            
            $("#friends_selected<?php echo $id_myf; ?>").val(selected_f);
            
            $("#box_panel_options_<?php echo $id_myf; ?>").fadeOut(200); 
            $("#edit_click_privacy<?php echo $id_myf; ?>").remove(); 
            $("#box_privacity_edit_<?php echo $id_myf;?>").append('  <div id="edit_click_privacy<?php echo $id_myf;?>" style="display:inline-block;cursor:pointer;" onclick="show_friends_privacity()" class="azul">Edit</div>');
            
            
            
            
        });
    });
    </script>
    <div style="padding:10px;">
       
        Type someone following name:<br />
 
        <input type="text" id="demo-input-facebook-theme" name="blah2" class="input_auto" />  <br />
        <input type="button" value="Submit" class="button white small bigrounded" />
        <script type="text/javascript">
        $(document).ready(function() {
            $("#demo-input-facebook-theme").tokenInput(<?php echo $search_t;?>, {
		    prePopulate:<?php echo $search_t_p; ?>,theme: "facebook",
minChars: 1,
preventDuplicates: true,
propertyToSearch: "first_name",
resultsFormatter: function(item){ return "<li>" + "<img src='" + item.url + "' title='" + item.first_name + "' height='25px' width='25px' />" + "<div style='display: inline-block; padding-left: 10px;'><div class='full_name'>" + item.first_name + "</div></div></li>" },
              tokenFormatter: function(item) { return "<li><p  style='cursor:pointer;' onclick='show_user('"+item.id+"')'>" + utf8_encode(item.first_name) + "</p></li>" }
          });
        });
        </script>
    </div>
    
    
    
    
    
    
</div> 