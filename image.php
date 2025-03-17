<!DOCTYPE html>
<html>
    <head><title>image</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    </head>
    <body>
        <header>
        <button class="btn-logout" onclick="window.location='logout.php';" >déconnexion</button>
        <div class="h1-header">
            <h1 class="titre-header" >geogessr</h1>
            </div>
        </header>
        <script>
            function testImage(){
                let nombresFaits = JSON.parse(localStorage.getItem("nombreAléatoire") || "[]"); 
                nombresFaits.forEach((element) => {
                    if (element == imageAléatoire){ {
                        imageAléatoire = getRandomInt(4);
                        console.log("image déjà faite");
                        
                    }

                }});
            };
            function getRandomInt(max) {
                return Math.floor(Math.random() * max);
            };
            const images = {
                0: "gymnase.webp",
                1: "skatepark.webp",
                2: "photojp.webp",
                3: "D.webp",
                4: "18.jpg",
                5: "bassin-poissons.webp",
                6: "CantineRang.webp",
                7: "cour-interieure.webp",
                8: "CoursD.webp",
            };
            document.addEventListener("DOMContentLoaded", function() {
                console.log(localStorage.getItem("score"));
                image1 = localStorage.getItem("image");
                console.log(localStorage.getItem("imageTerminés"));

                
                imageAléatoire = getRandomInt(9);
                let nombresFaits = JSON.parse(localStorage.getItem("nombreAléatoire") || "[]"); 

                while (nombresFaits.includes(imageAléatoire)) {
                imageAléatoire = getRandomInt(9);
                console.log("image déjà faite");
                };   

                
                nombresFaits.push(imageAléatoire);
                localStorage.setItem("nombreAléatoire", JSON.stringify(nombresFaits));  
                
                localStorage.setItem("nomImg", images[imageAléatoire]);
                img = document.createElement("img");
                img.className = "img-chercher";
                img.id = "image1";
                img.src = images[imageAléatoire];
                document.body.appendChild(img);
                console.log(imageAléatoire);
                localStorage.setItem("image", imageAléatoire);
                console.log(localStorage.getItem("image"));

            });

        </script>
            <div class="map1">
                <div id="map" class="map" style="box-shadow: 0 0 10px;"></div>
                <a href="carte.html"><button class="btn-go-carte">aller à la carte to guess</button></a>
            </div>
            <script>
                var map = L.map('map').setView([49.545845967044144, 0.17996785139144494], 17);
                L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                    maxZoom: 22,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
        </script>
    </body>
</html>