<?php

function retour_date_formater($date, $typo)
{
if($date !== "0000-00-00")
{
if($typo == "1")
{
//date au format d/m/Y  => du formulaire vers la base
   $tab_date = explode("/",$date); 
   $y = $tab_date[2]; 
   $m = $tab_date[1]; 
   $d = $tab_date[0]; 
   
	//retourne une date Y-m-d
   return date("Y-m-d", mktime (0,0,0,$m,$d,$y));  
}

// date au format  Y-m-d => de la base vers le formulaire
if($typo == "2") 
{
	//date au format Y-m-d 
   $tab_date = explode("-",$date); 
   $y = $tab_date[0]; 
   $m = $tab_date[1]; 
   $d = $tab_date[2]; 
   
   
	//retourne une date Y-m-d
   return date("d/m/Y", mktime (0,0,0,$m,$d,$y));  
}

if($typo == "3") 
{
	//date au format Y-m-d hh:mm:ss 
 $explo_dat = explode(" ",$date); 
  							 $jour =  $explo_dat[0];
							 $heure =  $explo_dat[1];
							 
   $tab_date = explode("-",$jour);
   $y = $tab_date[0];
   $m = $tab_date[1];
   $d = $tab_date[2]; 
   
      $tab_heure = explode(":",$heure);
   $hh = $tab_heure[0];
   $mm = $tab_heure[1];
   $ss = $tab_heure[2]; 
   
	//retourne une date Y-m-d
	return date("d/m/Y H:i ", mktime ($hh,$mm,$ss,$m,$d,$y));

}
}
else
{
 return $date;
}




}


?>
