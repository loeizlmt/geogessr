<html>
<head>
    <title>déconnexion</title>
</head>
<body>
<script>
    localStorage.removeItem('user-id');
    localStorage.removeItem('user-password');
    </script>
    <h1>Vous avez été déconnecté</h1>
    <script>
    timeOut = setTimeout(function(){
        window.location.href = 'index.php';
    }, 3000);
</script>   

</body>


</html>