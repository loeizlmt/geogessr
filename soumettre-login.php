<?php 
require_once(__DIR__ . '/connexion_bdd.php');
$id = $_POST['identifiant'];
$mdp = $_POST['mot-de-passe'];


$check = $mysqlClient->prepare('SELECT COUNT(*) AS existe FROM utilisateurs WHERE identifiant=:log AND mot_de_passe=:pwd');
$check->bindValue(':log', $id, PDO::PARAM_STR);
$check->bindValue(':pwd', $mdp, PDO::PARAM_STR);
$check->execute();
 
/*
    * On compte le nombre de ligne retourne par la requete
    * Si on a n'a pas de ligne retournee donc  $check->fetchColumn = 0, $user_exist = 0 (false)
    * Sinon si on a une ligne retournee donc $check->fetchColumn > 0, $user_exist = 1 (true)
*/
$user_exist = ($check->fetchColumn() == 0 ) ? 0 : 1;
 
// on libere le curseur
$check->CloseCursor();
 
 
// si on l'tulisateur existe
if ( $user_exist ) {
 
    require_once(__DIR__ . '/index.php');
 
} else {
     
    echo 'Identifiant ou mot de passe incorrect';
 
}