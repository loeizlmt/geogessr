<html>
    <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>créer compte</title>
    </head>
</html>
<?php 
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
 
 
// si l'utilisateur existe
if ( $user_exist ) {
    echo "<div class='container' >";
    echo "Cet utilisateur existe déjà.";
    echo '<a class="a-créer-compte" href="login.php"> connectez-vous</a>';
    echo "<p> ou </p>";
    echo '<a class="a-créer-compte" href="créer_compte.html"> créez un compte</a>';
    echo "</div>";

// si l'utilisateur n'existe pas :
} else {
     
    // on prépare la requête qui permet de créer un compte
    $sqlQueryUp = "INSERT INTO utilisateurs (identifiant, mot_de_passe, score) VALUES (:id, :mdp, 0)";
    $stmt = $mysqlClient->prepare($sqlQueryUp);

    // on exécute la requête
    if ($stmt->execute(['id' => $id, 'mdp' => $mdp])) {
        echo "<div class='container' >";
        echo "Compte créé avec succès !";
        echo '</div>';
    } else {
        echo "Erreur lors de la création du compte.";
    }
    echo "<div class='container' >";
    echo '<a class="a-créer-compte" href="login.php">maintenant vous pouvez vous connecter</a>';
    echo "<script>
        setTimeout(function() {
            window.location = 'login.php';
        }, 2000);
    </script>";
    echo "</div>";
    
 
}