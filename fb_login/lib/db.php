<?php
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysqli_select_db($connection, DB_DATABASE) or die(mysql_error());
mysqli_query ($connection,"set character_set_results='utf8'");   
?>
