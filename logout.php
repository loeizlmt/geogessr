<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>déconnexion</title>
</head>
<body>
<header>
        <button class="btn-logout" onclick="window.location='logout.php';" >déconnexion</button>
        <div class="h1-header">
            <h1 class="titre-header" >geoguessr</h1>
            </div>
        </header>
<script>
    // on supprime les cookies qui contiennent l'identifiant et le mot de passe de l'utilisateur
    localStorage.removeItem('user-id');
    localStorage.removeItem('user-password');
    </script>
    <br><br><br><br><br><br>
    <h1>Vous avez été déconnecté</h1>
    <script>
        // on redirige l'utilisateur vers la page d'accueil après 3 secondes
    setTimeout(function(){
        window.location.href = 'index.html';
    }, 100);
</script>   

</body>


</html>