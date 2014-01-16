<?php
if (!isset ($FichierConnexion))
{
 $FichierConnexion = 1;

 // Fonction Connexion: connexion à MySQL

 function Connexion ($pNom, $pMotPasse, $pBase, $pServeur)
 {
  // Connexion au serveur 
  $connexion = mysqli_connect ("p:".$pServeur, $pNom, $pMotPasse, $pBase);

  if (!$connexion) 
  {
    echo "Désolé, connexion au serveur $pServeur impossible\n";
    exit;
  }

  // Connexion à la base
  if (!mysqli_select_db ($connexion,$pBase)) 
  {
    echo "Aceso a la base : $pBase imposible\n";
    echo " Mensage de MySQL : " . mysql_error($connexion);
    exit;
  }

  // On renvoie la variable de connexion
  return $connexion;
 } // Fin de la fonction
} // Fin du test sur $FichierConnexion
?>