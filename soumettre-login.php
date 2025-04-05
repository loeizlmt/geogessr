
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>login</title>
    </head>
</html><?php 
// on inclut le fichier connexion_bdd.php qui contient la connexion à la base de données
require_once(__DIR__ . '/connexion_bdd.php');
// on récupère les données envoyées par le formulaire
$id = $_POST['identifiant'];
$mdp = $_POST['mot-de-passe'];

// on prépare la requête qui permet de vérifier si l'utilisateur existe
$check = $mysqlClient->prepare('SELECT COUNT(*) AS existe FROM utilisateurs WHERE identifiant=:log AND mot_de_passe=:pwd');
// on lie les paramètres
$check->bindValue(':log', $id, PDO::PARAM_STR);
$check->bindValue(':pwd', $mdp, PDO::PARAM_STR);
// on exécute la requête
$check->execute();
 
/*
    * On compte le nombre de ligne retourne par la requete
    * Si on a n'a pas de ligne retournee donc  $check->fetchColumn = 0, $user_exist = 0 (false)
    * Sinon si on a une ligne retournee donc $check->fetchColumn > 0, $user_exist = 1 (true)
*/
$user_exist = ($check->fetchColumn() == 0 ) ? 0 : 1;
 
// on libere le curseur
$check->CloseCursor();
 
 
// si on l'tulisateur existe, on affiche la page d'accueil
if ( $user_exist ) {
 
    require_once(__DIR__ . '/index.html');
 
} else { // sinon on affiche un message d'erreur
     
    echo 'Identifiant ou mot de passe incorrect';
 
}