<?php
///home/avieylka/public_html/myfiveby/trends/usuarios_creados.php
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');  
 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$consulta_user_datos = Requete ("SELECT id_user FROM users" , $connexion);

$n_users = mysqli_num_rows($consulta_user_datos);


$query2 = Requete("INSERT INTO  cron_test (numero, fecha) VALUES ('$n_users',NOW())", $connexion);
 

?>