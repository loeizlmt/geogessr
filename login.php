<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="soumettre-login.php" method="POST">
        <input id="identifiant" type="text" name="identifiant" placeholder="votre identifiant" required>
        <input id="mdp" type="password" name="mot-de-passe" placeholder="votre mot de passe" required>
        <input type="submit" value="Login" onclick="login()">
        <script>
            function login() {
                var identifiant = document.getElementById('identifiant').value;
                var mdp = document.getElementById('mdp').value;
                localStorage.setItem("user-id", identifiant);
                localStorage.setItem("user-password", mdp);
            }

        </script>
    </form>
    <a href="créer_compte.html">créer mon compte</a>
</html>