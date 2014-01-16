<?php
require_once('sp/simplepie.inc');
SimplePie_Misc::display_cached_file($_GET['image'], './cache', 'spi'); 
?>