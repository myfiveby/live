<?php

$conversation_list = Requete ("SELECT *  FROM rel_threads LEFT JOIN myfive_panels ON id_myf = id_panel WHERE id_th  = '$id_thread' ORDER BY f_rel ASC " , $connexion);

  		
    		
    		while ($datos_conversation_list = mysqli_fetch_array($conversation_list)){

    $nom_panel = $datos_conversation_list['title'];
    
    echo "- ".$nom_panel."<br />";
    
    }
    
    ?>