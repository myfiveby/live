<?php if (!isset ($FichierExecRequete))
{
 $FichierExecRequete = 1;
 // Ex�cution d'une requ�te avec MySQL
 function Requete ($requete, $connexion)
 {
  $resultat = mysqli_query ($connexion, $requete);
  if ($resultat)
   return $resultat;
  else 
  {  
 $valor_error = mysqli_error($connexion);
//echo "<B>ERROR ...</B><BR>  $valor_error ";
  }  
 } // Fin de la fonction ExecRequete
} // Fin du test 
?>