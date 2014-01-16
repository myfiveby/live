<?php
// Couleur Background
$bg_color_user_admin_1 = "#DBDBDB";
$bg_color_user_admin_2 = "#E7E7E7";

// message généraux
$message_colonne_menu_vide = "Bienvenida, Bienvenido";
$pied_dni = "<a href=\"$url_home_page_auteur\" class=\"link\" target=\"blank\">www.holaroses.com</a>";
$cabeza_dni = "<a href=\"$url_home_page_site\" class=\"link\"  target=\"blank\">Holaroses.com</a>";


// Zone identification > Formulaire d'entrée
$Titre_form_identification = "Identificación";
$Name_champs_user_identification = "Usuario ";
$Name_champs_pass = "Clave";
$preambultle_dni = "<br> <a href=\"index.php?loG=7\" class=\"link\">¡He olvidado mi password!</a><br><br>
<a href=\"index.php?loG=7\" class=\"link\">¡Es mi primera connexion no conozco mi password!</a>";
$Name_bouton_identifier = "ENTRAR";
// Zone identification > Message d'erreur
$Error_form_identification_champs = "Los dos campos $Name_champs_user_identification y $Name_champs_pass  son obligatorios.";
$Error_form_identification_user_bdd = "Los datos introducidos en $Name_champs_user_identification y $Name_champs_pass no nos permiten identificarle.";
// Zone identification > Oublis password
$texto_explica_forgot_pass = "Introduzca su email, le mandaremos un nuevo password.";
$titre_oublis_password = "Solicitar un nuevo password";
$titre_champs_oublis_mot_pass = "Su email";
$retour_home_forget_password = "Volver al formulario de identificación.";
$name_button_forget_password = "Enviar";
$error_email_forgot_pass = "<div align=\"center\" class=\"err\">La estructura del email introducido es errónea.</div>";
$error_no_hay_email_forgot_pass = "<div align=\"center\" class=\"err\">Email obligatorio. </div>";
$error_no_exist_email_forgot_pass = "<div align=\"center\" class=\"err\">El email introducido no existe en nuestra base de datos.</div>";
$confirma_envois_new_pass = "Operación realizada con exito, acabamos de mandarle en su email un nuevo password.";
$confirma_envois_new_pass_ko = "Operación no realizada, por favor contacte el administrador : $mail_admin";



// Zone Administration >Gestion des groupes
$Name_champs_groupe = "Grupo";
$Name_champs_groupe_actif = "Grupo Activo";
$Name_champs_logo_groupe = "Logo del gupo";
$Coment_maxi__logo_groupe = "Formato .gif peso maxiomo 10ko";
$Name_champs_logo_groupe_actif = "Logo Activo";

$Name_champs_classification = "Classificación";
$Error_form_new_group = "El campo $Name_champs_groupe es obligatorio";
$Error_ya_exist_grup = "Error, $Name_champs_groupe ya existe.";
$Name_bouton_modificar_group = "Modificar grupo";
$Name_bouton_creear_group = "Crear grupo";
$title_tabla_list_grup = "Lista de los grupos actualmente en la base";
$classif_or_not = "1"; // Si valeur == 1 => on propose la classif dans les form de crea et update
$array_classif_group = array ("0" => '...',
 "1" => 'A', "2" => 'B', "3" => 'C', "4" => 'D', "99" =>'No Classificado');
 $route_groupe = '../img/partners/';
 // Zone Administration >Gestion des profils
$name_creer_profil = "Perfil ";
$button_creer_profil = "Crear Perfil";
$button_modifier_profil = "Modificar Perfil";
$profil_actif = "Perfil Activo";
$title_tabla_list_perfil = "Lista de los perfils actualmente en la base";
$Error_form_new_profil ="El campo $name_creer_profil es obligatorio";
$Error_form_new_profil_exist = "El valor introducido en el campo : $name_creer_profil ya existe en la base.";
// Zone Administration >Gestion des users
$Name_champs_nom = "Apellidos";
$Name_champs_prenom = "Nombre";
$Name_champs_login_user ="Usuario";
$Name_champs_email =  "Email";
$Error_ya_exist_email = "Este email ya existe en nuestra base.";
$Error_ya_exist_user = "Este $Name_champs_login_user ya existe en nuestra base.";
$title_tabla_list_user = "Lista de los usuarios actualmente de base";
$Name_champs_pass_actif = "Cuenta Activa";
$Name_champs_pass_log = "Usuario";
$Name_bouton_creear_user = "Crear Usuario";	
$Name_bouton_modificar_user = "Modificar Usuario";
$Error_form_new_user_champs = "Operación no realizada, todo los campos de este formulario son obligatorios.";
$Error_structure_mail="La estructura del email que ha introducido es errónea.";

//Change password
$old_new_pass = " Su clave actual "; 
$fisrt_new_pass = " Eliga una nueva clave "; 
$segond_new_pass = " Confirme la nueva clave "; 
$Name_bouton_chg_password ="Validar";
$error_new_pass_pas_old_pass = "Operación no realizada, los datos introducidos en el campo $old_new_pass no coresponden a las que estan registrada en nuestra base.";
$error_new_pass_pas_egal = "Operación no realizada, la nueva clave y su confirmación deben de ser identicos.";


// Module datos quien
$quien_va_change_pwd = "<a href=\"index_zone.php?act=20\" class=link>Cambiar mi clave</a>";
$quien_va_deconnexion = "Desconexión";


// Message d'erreur tout les champs sont obligatoires
$Msg_err_todos_oblig = "Operación no realizada, Todo los campos son obligatorios";
// Message d'erreur tout les champs sont obligatoires
$Msg_err_todos_estrella_oblig = "Operación no realizada, todo los campos marcados con * son obligatorios.";
// Message d'erreur tout les champs sont obligatoires
$Msg_err_one_opt = "Operación no realizada! Debe elgir una opción.";
// Identification ok mais goupe non actif
$Error_form_identification_noKgrp = "<table width=\"200\" align=\"center\"><tr><td><div class=\"texte\">Su grupo es inactivo</div></td></tr></table>";
// Identification ok mais compte non actif
$Error_form_identification_noKind = "<table width=\"200\" align=\"center\"><tr><td><div class=\"texte\">Su cuenta es inactiva</div></td></tr></table>";





// Titre message d'erreur
$msg_err_ident="Erreur";

?>