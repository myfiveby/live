<?php
if (!isset ($FichierConnexion))
{
 $FichierConnexion = 1;

 // Fonction Connexion: connexion à MySQL

 function Connexion ($pNom, $pMotPasse, $pBase, $pServeur)
 {
  // Connexion au serveur 
//  $connexion = mysql_connect ($pServeur, $pNom, $pMotPasse);
  $connexion = mysqli_connect ("p:".$pServeur, $pNom, $pMotPasse, $pBase);

  if (!$connexion) 
  {
    echo "Not connected \n";
    exit;
  }

  // Connexion à la base
  if (!mysqli_select_db ($connexion,$pBase)) 
  {
    echo "ERROR base\n";
    echo " " . mysql_error($connexion);
    exit;
  }

  // On renvoie la variable de connexion
  return $connexion;
 } // Fin de la fonction
} // Fin du test sur $FichierConnexion
?>