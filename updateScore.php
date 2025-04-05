<?php 
// on inclut le fichier connexion_bdd.php qui contient la connexion à la base de données
require_once(__DIR__ . '/connexion_bdd.php');
// on récupère les données envoyées par le formulaire
$id = $_POST['identifiant'];
$mdp = $_POST['mot-de-passe'];
$score = $_POST['score'];
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
 
 
// si l'utilisateur existe
if ( $user_exist ) {
 
// on prépare la requête qui permet de mettre à jour le score de l'utilisateur
$sqlQueryUp = 'UPDATE utilisateurs SET score = :score WHERE identifiant = :identifiant' ; 
$updateUser = $mysqlClient->prepare($sqlQueryUp);
// on lie les paramètres et on exécute la requête
$updateUser->execute([
    'score' => $score,
    'identifiant' => $id
]);
echo "<div class='container-form'<p>Score mis à jour avec succès !</p></div>";
// un peu de js pour rediriger l'utilisateur vers la page d'accueil 
// après 2 secondes pour qu'il puisse avoir le temps de voir le message
echo '<script>
(function() {
    setTimeout(function() {
        window.location = "index.html";
    }, 2000);
})();
</script>';
// si l'utilisateur n'existe pas on affiche un message d'erreur
} else {
     
    echo "<div class='container-form'<p>Identifiant ou mot de passe incorrect</p></div>";
 
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>maj score</title>
    </head>
</html>