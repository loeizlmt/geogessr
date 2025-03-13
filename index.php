<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>geogessr</title>
</head>
<body>
    <header>
    <button class="btn-logout" onclick="window.location='logout.php';" >déconnexion</button>
    <div class="h1-header">
        <h1 class="titre-header">geogessr</h1>
        </div>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(localStorage.getItem('user-id')) {
            document.getElementById("connecté").innerHTML += "Bienvenue " + localStorage.getItem('user-id');
            document.getElementById("connecté").style.display = "flex";
            document.getElementById("btn-jouer").style.display = "flex";
}
else {
    document.getElementById("pas-de-compte").style.display = "flex";
}
        });
</script>
    <div id="pas-de-compte">
    <H1> Attention si vous n'avez pas de compte vous devez <a href="créer_compte.html">en créer un</a> avant de jouer au risque de tout perdre</H1><br>
    <p>si vous avez un compte il vous suffit de vous <a href="login.php">connecter</a> avant de jouer</p><br>
    </div>
<div id="connecté" style="display:none;">

</div>
<div class="btn-jouer" id="btn-jouer"  style="display:none;">
    <button class="jouer"  onclick="window.location='image.html';">jouer</button>
</div>

</body>
</html>