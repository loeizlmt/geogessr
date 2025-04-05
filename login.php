<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<header>
        <button class="btn-logout" onclick="window.location='logout.php';" >déconnexion</button>
        <div class="h1-header">
            <h1 class="titre-header" >geoguessr</h1>
            </div>
        </header>
    <!-- formulaire de connexion qui envoie les données à soumettre-login.php -->
    <form class="créer-compte" action="soumettre-login.php" method="POST">
        <input id="identifiant" type="text" name="identifiant" placeholder="votre identifiant" required>
        <input id="mdp" type="password" name="mot-de-passe" placeholder="votre mot de passe" required>
        <input class="btn-créer-compte" type="submit" value="Login" onclick="login()">
        <script>
            // quand l'utilisateur clique sur le bouton login, 
            // on stocke son identifiant et son mot de passe dans un cookie
            function login() {
                var identifiant = document.getElementById('identifiant').value;
                var mdp = document.getElementById('mdp').value;
                localStorage.setItem("user-id", identifiant);
                localStorage.setItem("user-password", mdp);
            }

        </script>
            <a style="color:black;" href="créer_compte.html">créer mon compte</a>
    </form>
</html>