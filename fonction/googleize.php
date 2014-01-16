<?php
/*
*		Google wants content and a meta-description. They are retrieved in this file.
*		The googleize() function takes a single variable - the GET variable "u".
*		It returns an array consisting of title and full html text.
*
*		Return value:
* 	array (
* 		"title" 				=> string,
*			"full-text" 		=> string
*		}
*
*		From this the full layout as needed by Google and text readers and facebook can be generated. 
*
*		Author: simon@myfiveby.com
*/

require ($_SERVER['DOCUMENT_ROOT'] . '/conf/sangchaud.php');

function googleize($u) {
	$ret = array(
		"title" 				=> "",
		"full-text" 		=> ""
	);
// first sanitize: $u should be a number. Anything else = die.
	$u = intval($u);
	if ($u>0) {
// $u is a number, now get its contents from the database if they are set to visible...
// rather than do joins which create huge database overhead, we do two SELECTS.
		$db1 = Connexion (DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_SERVER);
		$db2 = Connexion (DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_SERVER);
// first get the internal id to correlate between tables, and the title. Check for privacy
		$db1string = "SELECT id_myf, privacy, title FROM myfive_panels WHERE privacy=0 AND url = ".$u;
//
		$result1 = Requete ($db1string,$db1);
//					echo($result1);
		if ($result1) {
			while($this_row = mysqli_fetch_array($result1)) {
				// there is an article and it's not private
				$id_myf =	$this_row["id_myf"];
				$ret["title"] = $this_row["title"];
				$db2string = "SELECT frase_mf FROM myfive_content WHERE id_myf = ".$id_myf;
				$result2 = Requete ($db2string,$db2);
				if ($result2) {
					while($that_row = mysqli_fetch_array($result2)) {
						// get content
						$ret["full-text"] = $that_row["frase_mf"];
					}
				}
			}
		} else {
			$ret["title"] = "Post not visible due to privacy restrictions.";
		}
	}
	return $ret;
}
?>