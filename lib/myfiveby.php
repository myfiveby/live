<?php
if (!function_exists('Connexion')) {
	function Connexion ($pNom, $pMotPasse, $pBase, $pServeur) {
	  $connexion = mysqli_connect ("p:".$pServeur, $pNom, $pMotPasse, $pBase);
	  // $mysqli = new mysqli('localhost', 'my_user', 'my_password', 'my_db'
	  if (!$connexion) {
	    echo "Not connected \n";
	    exit;
	  } else if (!mysqli_select_db ($connexion, $pBase)) {
	    echo "ERROR: database not selected\n";
	    echo " " . mysqli_error($connexion);
	    exit;
	  } else {
	  	return $connexion;
	  }
	}
}

if (!function_exists('Requete')) {
	function Requete ($requete, $connexion) {
	  $resultat = mysqli_query ($connexion, $requete);
	  if ($resultat) {
	  	return $resultat;
	  } else {  
			echo(mysqli_error($connexion));
	  }  
	}
}

function is_owner($autor,$id_myf) {
require ('conf/sangchaud.php');
$connexion = Connexion (DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_SERVER);
$comprueba_is_panel = Requete ("SELECT autor FROM myfive_panels   WHERE autor  = '$autor'  AND id_myf = '$id_myf'  " , $connexion);
 if (mysqli_num_rows($comprueba_is_panel) == 0 ){return false;} else {return true; }
// mysqli_close($connexion);
// mysqli_free_result($comprueba_is_panel);
}
function url_object($id, $tipo,$date){
$date_unix=1;
$url_id = $id.$tipo.$date_unix;
return $url_id; 
}


function validate_html_insert($cadena){ 
return $cadena; 
}

function do_feed($fb_id, $name_user, $action, $location, $tipo, $id_location, $you) {
	if (!session_id() || session_id()==""){
		session_start();
	}
	$connexion = Connexion (DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_SERVER);
	$action_text = $location = $privacy = $autor = $name_user = $fb_id = $id_user = $id_location = $extra_text = "";
	if ($_SESSION['id'] == $you ){
		switch ($action){
			case 1:
				$action_text=" created a panel ";
			  $comprueba_location = Requete ("SELECT title, privacy FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);
			  $datos_location = mysqli_fetch_array($comprueba_location) ; 
			  $location = $datos_location['title'];
			  $privacy = $datos_location['privacy'];
			  break;
			case 2:
				$action_text=" just start follow ";
			  $comprueba_location = Requete ("SELECT name_user FROM users WHERE fb_id = '$id_location'    " , $connexion);
			  $datos_location = mysqli_fetch_array($comprueba_location) ; 
			  $location = $datos_location['name_user'];
				break;
			case 3: $action_text=" love panel: ";
			  $comprueba_location = Requete ("SELECT title,privacy,autor FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);
			  $datos_location = mysqli_fetch_array($comprueba_location) ; 
			  $location = $datos_location['title'];          
			  $privacy = $datos_location['privacy'];
			  $autor = $datos_location['autor'];
			  break;
			case 4:
				$action_text=" set fav panel:";
				$comprueba_location = Requete ("SELECT title,privacy FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);
				$datos_location = mysqli_fetch_array($comprueba_location) ; 
				$location = $datos_location['title'];    
				$privacy = $datos_location['privacy'];
				break;
			case 5:
				$action_text=" start a conversation at ";
				$comprueba_location = Requete ("SELECT name_th, privacy FROM threads  WHERE id_th  = '$id_location'    " , $connexion);
				$datos_location = mysqli_fetch_array($comprueba_location) ; 
				$location = $datos_location['name_th'];
				$privacy = $datos_location['privacy'];
				break;
			case 55:
				$action_text=" contribute to conversation:  ";
				$name_user = $_SESSION['username'];
				$fb_id= $_SESSION['fb_id'];
				$query_thread_notif = mysqli_query($connexion,"SELECT autor_th,id_th,name_th FROM  threads  WHERE id_th = '$id_location'");
				$result_thread_notif = mysqli_fetch_array($query_thread_notif);		
				$id_user = $result_thread_notif['autor_th'];
				$id_location = $result_thread_notif['id_th'];
				$location = $result_thread_notif['name_th'];
				$comprueba_autor_post = Requete ("SELECT name_user FROM users WHERE id_user = '$id_user'    " , $connexion);
				$datos_autor_post= mysqli_fetch_array($comprueba_autor_post) ; 
				$extra_text =  " by ".$datos_autor_post['name_user'];
				break;
			case 6:
				$action_text=" add a panel to this conversation: ";
				break;
			case 7:
				$action_text=" commented on ";
				$comprueba_location = Requete ("SELECT title,privacy,autor FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);
				$datos_location = mysqli_fetch_array($comprueba_location) ; 
				$location = $datos_location['title'];          
				$privacy = $datos_location['privacy'];
				$autor_post = $datos_location['autor'];
				$comprueba_autor_post = Requete ("SELECT name_user FROM users WHERE id_user = '$autor_post'    " , $connexion);
				$datos_autor_post= mysqli_fetch_array($comprueba_autor_post) ; 
				$extra_text =  " by ".$datos_autor_post['name_user'];
				break; 
			case 8:
				$action_text=" love conversation: ";
				$comprueba_location = Requete ("SELECT name_th,privacy,autor_th FROM threads  WHERE id_th  = '$id_location'    " , $connexion);
				$datos_location = mysqli_fetch_array($comprueba_location) ; 
				$location = $datos_location['name_th'];          
				$privacy = $datos_location['privacy'];
				$autor = $datos_location['autor_th'];
				$comprueba_autor_post = Requete ("SELECT name_user FROM users WHERE id_user = '$autor'    " , $connexion);
				$datos_autor_post= mysqli_fetch_array($comprueba_autor_post) ; 
				$extra_text =  " by ".$datos_autor_post['name_user'];
				break;
			case 9:
				$action_text=" fav conversation: ";
				$comprueba_location = Requete ("SELECT name_th,privacy,autor_th FROM threads  WHERE id_th  = '$id_location'    " , $connexion);
				$datos_location = mysqli_fetch_array($comprueba_location) ; 
				$location = $datos_location['name_th'];          
				$privacy = $datos_location['privacy'];
				$autor = $datos_location['autor_th'];
				$comprueba_autor_post = Requete ("SELECT name_user FROM users WHERE id_user = '$autor'    " , $connexion);
				$datos_autor_post= mysqli_fetch_array($comprueba_autor_post) ; 
				$extra_text =  " by ".$datos_autor_post['name_user'];
				break;
		}
		if (empty($privacy))$privacy=0;
		$comprueba_feed = Requete ("SELECT * FROM feed  WHERE name_user  = '$name_user'  AND fb_id  = '$fb_id'  AND action_text  = '$action_text'  AND tipo  = '$tipo'  AND id_action  = '$action'  AND id_location  = '$id_location'    AND privacity  = '$privacy'    " , $connexion);
		if (mysqli_num_rows($comprueba_feed) == 0) {
			$query_paneldo_feed = Requete("INSERT INTO feed (name_user,fb_id,id_action,action_text,extra_text,tipo, id_location, location, f_creado, privacity ) VALUES ('$name_user','$fb_id','$action','$action_text','$extra_text','$tipo','$id_location','$location',NOW(),'$privacy')" , $connexion);
			$id_feed= mysqli_insert_id($connexion);
			if ($action==7) {
				$registra_comment_panel =  Requete  ("UPDATE comments SET rel_feed = '$id_feed' WHERE autor_coment = '$_SESSION[id]'  AND relacionado_coment='$id_location'", $connexion);
			}
		}
	} //if ($_SESION['id'] == $you  ){
}

class MyFiveUser {
	private $id_user = null;
	private $f_alta = null;
	private $oauth_provider = null;
	private $acc_tkn = null;
	private $fb_id = null;
	private $email = null;
	private $url_user = null;
	private $url = null;
	private $name_user = null;
	private $timezone = null;
	private $locale = null;
	private $location = null;
	private $hometown = null;
	private $bio = null;
	private $website = null;
	private $relationship = null;
	private $gender = null;
	private $birthday = null;
	private $first_name = null;
	private $lastname = null;
	private $background_user = null;
	private $modif_url = null;
	private $notif_start_followed = null;
	private $notif_conversation_created = null;
	private $notif_are_fav = null;
	private $notif_comment = null;
	private $notif_contribute_mytopic = null;
	private $notif_universal = null;
	private $invitaciones = null;
	private $featured = null;
	public function get_id_user() { return $this->id_user; }
	public function get_f_alta() { return $this->f_alta; }
	public function get_oauth_provider() { return $this->oauth_provider; }
	public function get_acc_tkn() { return $this->acc_tkn; }
	public function get_fb_id() { return $this->fb_id; }
	public function get_email() { return $this->email; }
	public function get_url_user() { return $this->url_user; }
	public function get_url() { return $this->url; }
	public function get_name_user() { return $this->name_user; }
	public function get_timezone() { return $this->timezone; }
	public function get_locale() { return $this->locale; }
	public function get_location() { return $this->location; }
	public function get_hometown() { return $this->hometown; }
	public function get_bio() { return $this->bio; }
	public function get_website() { return $this->website; }
	public function get_relationship() { return $this->relationship; }
	public function get_gender() { return $this->gender; }
	public function get_birthday() { return $this->birthday; }
	public function get_first_name() { return $this->first_name; }
	public function get_lastname() { return $this->lastname; }
	public function get_background_user() { return $this->background_user; }
	public function get_modif_url() { return $this->modif_url; }
	public function get_notif_start_followed() { return $this->notif_start_followed; }
	public function get_notif_conversation_created() { return $this->notif_conversation_created; }
	public function get_notif_are_fav() { return $this->notif_are_fav; }
	public function get_notif_comment() { return $this->notif_comment; }
	public function get_notif_contribute_mytopic() { return $this->notif_contribute_mytopic; }
	public function get_notif_universal() { return $this->notif_universal; }
	public function get_invitaciones() { return $this->invitaciones; }
	public function get_featured() { return $this->featured; } 
	private function set_id_user($val) { $this->id_user=$val; }
	private function set_f_alta($val) { $this->f_alta=$val; }
	private function set_oauth_provider($val) { $this->oauth_provider=$val; }
	private function set_acc_tkn($val) { $this->acc_tkn=$val; }
	private function set_fb_id($val) { $this->fb_id=$val; }
	private function set_email($val) { $this->email=$val; }
	private function set_url_user($val) { $this->url_user=$val; }
	private function set_url($val) { $this->url=$val; }
	private function set_name_user($val) { $this->name_user=$val; }
	private function set_timezone($val) { $this->timezone=$val; }
	private function set_locale($val) { $this->locale=$val; }
	private function set_location($val) { $this->location=$val; }
	private function set_hometown($val) { $this->hometown=$val; }
	private function set_bio($val) { $this->bio=$val; }
	private function set_website($val) { $this->website=$val; }
	private function set_relationship($val) { $this->relationship=$val; }
	private function set_gender($val) { $this->gender=$val; }
	private function set_birthday($val) { $this->birthday=$val; }
	private function set_first_name($val) { $this->first_name=$val; }
	private function set_lastname($val) { $this->lastname=$val; }
	private function set_background_user($val) { $this->background_user=$val; }
	private function set_modif_url($val) { $this->modif_url=$val; }
	private function set_notif_start_followed($val) { $this->notif_start_followed=$val; }
	private function set_notif_conversation_created($val) { $this->notif_conversation_created=$val; }
	private function set_notif_are_fav($val) { $this->notif_are_fav=$val; }
	private function set_notif_comment($val) { $this->notif_comment=$val; }
	private function set_notif_contribute_mytopic($val) { $this->notif_contribute_mytopic=$val; }
	private function set_notif_universal($val) { $this->notif_universal=$val; }
	private function set_invitaciones($val) { $this->invitaciones=$val; }
	private function set_featured($val) { $this->featured=$val; }
	public function __construct($arr = array()) {
		if ($arr && isset($arr)) {
			if (isset($arr['id_user']) && ($arr['id_user'] !=null)) { $this->id_user = $arr['id_user']; }
			if (isset($arr['f_alta']) && ($arr['f_alta'] !=null)) { $this->f_alta = $arr['f_alta']; }
			if (isset($arr['oauth_provider']) && ($arr['oauth_provider'] !=null)) { $this->oauth_provider = $arr['oauth_provider']; }
			if (isset($arr['acc_tkn']) && ($arr['acc_tkn'] !=null)) { $this->acc_tkn = $arr['acc_tkn']; }
			if (isset($arr['fb_id']) && ($arr['fb_id'] !=null)) { $this->fb_id = $arr['fb_id']; }
			if (isset($arr['email']) && ($arr['email'] !=null)) { $this->email = $arr['email']; }
			if (isset($arr['url_user']) && ($arr['url_user'] !=null)) { $this->url_user = $arr['url_user']; }
			if (isset($arr['url']) && ($arr['url'] !=null)) { $this->url = $arr['url']; }
			if (isset($arr['name_user']) && ($arr['name_user'] !=null)) { $this->name_user = $arr['name_user']; }
			if (isset($arr['timezone']) && ($arr['timezone'] !=null)) { $this->timezone = $arr['timezone']; }
			if (isset($arr['locale']) && ($arr['locale'] !=null)) { $this->locale = $arr['locale']; }
			if (isset($arr['location']) && ($arr['location'] !=null)) { $this->location = $arr['location']; }
			if (isset($arr['hometown']) && ($arr['hometown'] !=null)) { $this->hometown = $arr['hometown']; }
			if (isset($arr['bio']) && ($arr['bio'] !=null)) { $this->bio = $arr['bio']; }
			if (isset($arr['website']) && ($arr['website'] !=null)) { $this->website = $arr['website']; }
			if (isset($arr['relationship']) && ($arr['relationship'] !=null)) { $this->relationship = $arr['relationship']; }
			if (isset($arr['gender']) && ($arr['gender'] !=null)) { $this->gender = $arr['gender']; }
			if (isset($arr['birthday']) && ($arr['birthday'] !=null)) { $this->birthday = $arr['birthday']; }
			if (isset($arr['first_name']) && ($arr['first_name'] !=null)) { $this->first_name = $arr['first_name']; }
			if (isset($arr['lastname']) && ($arr['lastname'] !=null)) { $this->lastname = $arr['lastname']; }
			if (isset($arr['background_user']) && ($arr['background_user'] !=null)) { $this->background_user = $arr['background_user']; }
			if (isset($arr['modif_url']) && ($arr['modif_url'] !=null)) { $this->modif_url = $arr['modif_url']; }
			if (isset($arr['notif_start_followed']) && ($arr['notif_start_followed'] !=null)) { $this->notif_start_followed = $arr['notif_start_followed']; }
			if (isset($arr['notif_conversation_created']) && ($arr['notif_conversation_created'] !=null)) { $this->notif_conversation_created = $arr['notif_conversation_created']; }
			if (isset($arr['notif_are_fav']) && ($arr['notif_are_fav'] !=null)) { $this->notif_are_fav = $arr['notif_are_fav']; }
			if (isset($arr['notif_comment']) && ($arr['notif_comment'] !=null)) { $this->notif_comment = $arr['notif_comment']; }
			if (isset($arr['notif_contribute_mytopic']) && ($arr['notif_contribute_mytopic'] !=null)) { $this->notif_contribute_mytopic = $arr['notif_contribute_mytopic']; }
			if (isset($arr['notif_universal']) && ($arr['notif_universal'] !=null)) { $this->notif_universal = $arr['notif_universal']; }
			if (isset($arr['invitaciones']) && ($arr['invitaciones'] !=null)) { $this->invitaciones = $arr['invitaciones']; }
			if (isset($arr['featured']) && ($arr['featured'] !=null)) { $this->featured = $arr['featured']; }
		}
	}
}

/* send an array of user ids (id_user in the users table, these are integer values), return an array of MyFiveUsers in the same order as the array */
function getUsersByIds ($ids = null) {
	if ($ids && is_array($ids)) {
		$idlist = implode(",",$ids);
		$sql = "SELECT * FROM `users` WHERE `id_user` IN (" . $idlist . ") ORDER BY FIELD(id_user," . $idlist . ")" ;
		$ret = array();
		$resultset = Requete ($sql , Connexion (DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_SERVER));
		if ($resultset) {
			// Cycle through the results and populate the array of user objects
			while ($row = $resultset->fetch_array()) {
				$ret[] = new MyFiveUser($row);
			}
			// Free result set
			$resultset->close();
			return $ret;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function getFollowButtons ($ids = null) {
	// takes a list of ids and generates subscribe/unsubscribe buttons for them all in one go - requires user to be logged in
	if (isset($_SESSION['id']) && $ids && is_array($ids)) {
		$idlist = implode(",",$ids);
		$sub_buttons = array();
		foreach ($ids as $i) {
			$sub_buttons[$i] = array('class_color'=>'white', 'onClick'=>'follow_user(\''.$i.'\')', 'text'=>'Subscribe');
		}
		$sql = "SELECT `id_user`, `fb_id` from `users` WHERE `id_user` IN (" . $idlist . ") ORDER BY FIELD (id_user, " . $idlist . ")" ;
		$resultset = Requete ($sql , Connexion (DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_SERVER));
		if ($resultset) {
			while ($row = $resultset->fetch_array()) {
				$sub_buttons[$row['id_user']]['onClick'] = 'follow_user(\'' . $row['fb_id'] . '\')';
			}
			$resultset->close();
		}
		$sql = "SELECT id_user_to_follow, id_to_follow FROM `follow` WHERE `id_user_to_follow` IN (" . $idlist . ") AND `id_user_f` = '".$_SESSION['id']."' ORDER BY FIELD(id_user_to_follow	," . $idlist . ")" ;
		$ret = array();
		$resultset = Requete ($sql , Connexion (DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_SERVER));
		if ($resultset) {
			// ok so the user is already subscribe to some of these people so we need to modify the "subscribe" button to say "subscribed"
			while ($row = $resultset->fetch_array()) {
				$sub_buttons[$row["id_user_to_follow"]] = array('class_color'=>'blue', 'onClick'=>'unfollow_user(\''.$row["id_to_follow"].'\')', 'text'=>'Subscribed');
			}
			$resultset->close();
		}
		foreach ($ids as $i) {
			if ($_SESSION['id'] == $i) {
				$ret[] = "";
			} else {
				$ret[] = "<a href=\"javascript:void_()\" class=\"button_f " . $sub_buttons[$i]["class_color"] . " bigrounded texto_9 negro\"  onClick=\"" . $sub_buttons[$i]["onClick"] . "\" style=\"width:60px;\" >" . $sub_buttons[$i]["text"] . "</a>";
			}
		}
		return $ret;
	}
}
?>
