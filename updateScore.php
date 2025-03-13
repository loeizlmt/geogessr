<?php 

echo '<script>
console.log("' . $_POST['score'] . '");
</script>';

require_once(__DIR__ . '/connexion_bdd.php');
$id = $_POST['identifiant'];
$mdp = $_POST['mot-de-passe'];
$score = $_POST['score'];


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
 
    
$sqlQueryUp = 'UPDATE utilisateurs SET score = :score WHERE identifiant = :identifiant' ; 
$updateUser = $mysqlClient->prepare($sqlQueryUp);
$updateUser->execute([
    'score' => $score,
    'identifiant' => $id
]);
echo '<script>
console.log("succes update score");
</script>';
 
} else {
     
    echo 'Identifiant ou mot de passe incorrect';
    echo  $id . ' ' . $mdp;
    echo  $score;
    echo '<script>
console.log("' . $_POST['identifiant'] . '");
</script>';
echo '<script>
console.log("' . $_POST['mot-de-passe'] . '");
</script>';
 
}
