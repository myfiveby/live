<?php
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');

class APICall {
	private $id = null;
	private $db = null;
	private $query = null;
	private $dataArr = null;
	private $getUserFromDatabaseString = "SELECT u.id_user AS id, u.name_user AS name, u.url_user, u.url AS url, u.bio AS bio, u.fb_id, 
			COUNT( DISTINCT (t.id_th)) AS conversations, 
			COUNT( DISTINCT (p.id_myf)) AS posts, 
			COUNT( DISTINCT (f.id_user_to_follow)) AS following, 
			COUNT( DISTINCT (fd.id_user_f)) AS followedby 
			FROM users AS u 
			LEFT JOIN threads AS t ON u.id_user = t.autor_th 
			LEFT JOIN myfive_panels AS p ON u.id_user = p.autor 
			LEFT JOIN follow AS f ON u.id_user = f.id_user_f 
			LEFT JOIN follow AS fd ON u.id_user = fd.id_user_to_follow ";			
	private $getUserCommentsFromDatabaseString = "SELECT com.relacionado_coment AS par_contentId, p.id_myf AS panelId, p.title AS title, p.autor AS author, com.texto_coment AS comtext
			FROM users AS u
			LEFT JOIN myfive_panels AS p ON u.id_user = p.autor
			LEFT JOIN myfive_content AS c ON p.autor = c.autor_mf
			LEFT JOIN comments AS com ON com.relacionado_coment=c.id_myf ";
	private $getUserPostidsDatabaseString = "SELECT p.id_myf AS panelId
			FROM users AS u
			LEFT JOIN myfive_panels AS p ON u.id_user = p.autor
			LEFT JOIN myfive_content AS c ON c.id_myf=p.id_myf ";
	private $getPostsFromDatabaseString = "SELECT p.id_myf AS panelId, p.title AS title, p.autor AS author, c.frase_mf AS content, c.texto_mf AS content_text
			FROM users AS u
			LEFT JOIN myfive_panels AS p ON u.id_user = p.autor
			LEFT JOIN myfive_content AS c ON c.id_myf=p.id_myf";
	private $getThreadsFromDatabaseString = "SELECT t.id_th, t.name_th FROM threads t LEFT JOIN users u ON u.id_user=t.autor_th ";
	private $getRelThreadsFromDatabaseString = "SELECT rel.id_th, rel.id_panel, pan.title, con.frase_mf 
		FROM rel_threads AS rel LEFT JOIN myfive_panels AS pan ON rel.id_panel = pan.id_myf 
		LEFT JOIN myfive_content AS con ON pan.id_myf = con.id_myf ";
	private $getPostFromDatabaseString = "SELECT p.id_myf AS panelId, p.title AS title, p.autor AS author, c.frase_mf AS content, c.texto_mf AS content_text
		FROM myfive_panels AS p
		LEFT JOIN myfive_content AS c ON c.id_myf=p.id_myf";
	private $getStatsFromDatabaseString = "SELECT (SELECT COUNT(*) FROM users) AS people, (SELECT COUNT(*) FROM myfive_panels) AS posts,
		(SELECT COUNT(*) FROM threads) AS conversations, (SELECT COUNT(*) FROM comments) AS comments";
	
	public static function isSpecifiedByGet() {
		return (isset($_GET['id']));
	}
	
	public function __construct($method = "user",$id = false) {
		if ($id) {
			$this->id = $id;
		} else if (isset($_GET['id'])) {
			$this->id = $_GET['id'];
		} else {
			return false;
		}
		$this->db = Connexion (LOGIN_BASE, PASSWORD_BASE, BASE, HOST_BASE);
		switch ($method) {
			case "user":
				$this->doUser();
				break;
			case "comments":
				$this->doComments();
				break;
			case "posts":
				$this->doPosts();
				break;
			case "postids":
				$this->doPostids();
				break;
			case "threads":
				$this->doThreads();
				break;
			case "rel":
				$this->doRelThreads();
				break;
			case "post":
				$this->doGetPost();
				break;
			case "stats":
				$this->doGetStats();
				break;
			default:
				echo "er... you need to \"GET\" an id...";
				return false;
				break;
		}
	}
	
	private function doUser () {		
		return $this->getUserFromDatabase();
	}
	
	private function doComments () {		
		return $this->getCommentsFromDatabase();
	}
	
	private function doPosts () {		
		return $this->getPostsFromDatabase();
	}

	private function doPostids () {		
		return $this->getPostidsFromDatabase();
	}

	private function doThreads () {		
		return $this->getThreadsFromDatabase();
	}
	
	private function doRelThreads () {
		return $this->getRelThreadsFromDatabase();
	}
	
	private function doGetPost () {
		return $this->getPostFromDatabase();
	}
	
	private function doGetStats () {
		// eventually this reads the data from the two stats files
		// file 1: updated by a cron job every 5 seconds that does the simple SELECTS
		// file 2: updated by a cron job every 10 minutes that adds IP addresses to a IP addresses table in MySQL - this then produces a total for file 1
		// file 2:
		// 1. read log files, get ip addresses
		// 2. run geoip on ip addresses, get list of countries, count list
		//
		// 
		return $this->getStatsFromDatabase();
	}

	public function getId() { return $this->id; }
	public function getDataArr() { return $this->dataArr; }
	
	private function getCommentsFromDatabase() {
		$this->query = $this->getUserCommentsFromDatabaseString . " WHERE (u.url_user = '$this->id' AND com.relacionado_coment = c.id_myf AND com.relacionado_coment = p.id_myf AND com.autor_coment = u.id_user ) ORDER BY com.id_coment;";
		$this->runCommentsQuery();
	}
	
	private function getPostsFromDatabase() {
		$this->query = $this->getPostsFromDatabaseString . " WHERE u.url_user = '$this->id'";
		$this->runStandardQuery (array("panelId"=>"panelId","title"=>"title","authorID"=>"author","content"=>"content","contentText"=>"content_text"));
	}
	
	private function getPostidsFromDatabase() {
		$this->query = $this->getUserPostidsDatabaseString . " WHERE u.url_user = '$this->id'";
		$this->runStandardQuery (array("panelId"=>"panelId"));
	}
	
	private function getThreadsFromDatabase() {
		$this->query = $this->getThreadsFromDatabaseString . " WHERE u.url_user = '$this->id' ORDER BY t.id_th DESC ";
		$this->runStandardQuery (array("id_th"=>"id_th", "name_th" => "name_th"));
	}
	
	private function getStatsFromDatabase() {
		$this->query = $this->getStatsFromDatabaseString;
		$this->runStandardQuery (array("people"=>"people", "posts"=>"posts", "conversations"=>"conversations", "comments"=>"comments"));
	}
	
	private function getUserFromDatabase () {
		$this->query = $this->getUserFromDatabaseString . " WHERE u.url_user = '$this->id'";
		$userArr = $this->runStandardQuery (array("id"=>"id","name"=>"name","bio"=>"bio","url"=>"url","posts"=>"posts","conversations"=>"conversations","following"=>"following","followedby","followedby"),false);
		$this->dataArr = $userArr;
		$userArr = $this->dataArr[0];
		$userArr["url"] = str_replace("/","\/",$url_site_global.$userArr["url"]);
		$this->dataArr = $userArr;
		return ($this->id);
	}

	private function getRelThreadsFromDatabase() {
		$this->query = $this->getRelThreadsFromDatabaseString . " WHERE rel.id_th = '$this->id' ORDER BY con.id_mf DESC";
		$this->runStandardQuery (array("id_th"=>"id_th","id_panel"=>"id_panel","pan_title"=>"title","frase_mf"=>"frase_mf"));
	}
	
	private function getPostFromDatabase() {
		$this->query = $this->getPostFromDatabaseString . " WHERE c.id_myf = '$this->id' ";
		$this->runStandardQuery (array("panelId"=>"panelId","title"=>"title","authorID"=>"author","content"=>"content","contentText" => "content_text"));
	}

	private function runStandardQuery ($arr, $ret = true) {
		$result = Requete ($this->query, $this->db);
		if (!$result) {
			return false;
		} else {
			$this->dataArr = array();
 			$dataPresent = false;
			while($this_row = mysqli_fetch_array($result)){
				$temparr = array();
				foreach ($arr as $key => $value) {
					$temparr[$key] = $this_row[$value];
				}
				$this->dataArr[] = $temparr;
				$dataPresent = true;
			}
 			if ($dataPresent && $ret) {
				return ($this->id);
			} else if ($ret) {
				$this->dataArr = null;
				return;
			} else {
				return $this->dataArr;
			}
		}
	}
	
	private function runCommentsQuery() {
		$result = Requete ($this->query, $this->db);
		if (!result) {
			return false;
		} else {
			$this->dataArr = array();
 			$dataPresent = false;
 				while($this_row = mysqli_fetch_array($result)){
					if (!isset($this->dataArr["panel ".$this_row["par_contentId"]])) {
						$this->dataArr["panel ".$this_row["par_contentId"]] = array ("title" => $this_row["title"], "comments" => array ($this_row["comtext"]));
					} else {
						$this->dataArr["panel ".$this_row["par_contentId"]]["comments"][] = $this_row["comtext"];
					}
					$dataPresent = true;
				}
			if ($dataPresent) {
				return ($this->id);
			} else {
				$this->dataArr = null;
				return;
			}
		}
	}
}

?>
