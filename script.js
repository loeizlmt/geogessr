
function APchangement(){
    // préchargement des images pour un changement plus fluide sans voir un arrière plan blanc
    // pas sur que ça fonctionne super bien
    var img= new Image();
    img.src = 'images/cour-E.webp';
    var img1= new Image();
    img1.src = 'images/skatepark2.webp';
    var img2= new Image();
    img2.src = 'images/cour6-D.webp';
    var img3= new Image();
    img3.src = 'images/escaliers-ext-D.webp';
    var img4= new Image();
    img4.src = 'images/cour4-D.webp';
    var img5= new Image();
    img5.src = 'images/tables-A.webp';
    var img6= new Image();
    img6.src = 'images/arbres.webp';
    var img7= new Image();
    img7.src = 'images/cour2-D.webp';
    var img8= new Image();
    img8.src = 'images/cantine-ext.webp';
    // changement de l'arrière plan toutes les 4 secondes
    document.getElementById("body").style.backgroundImage = `url('${img.src}')`;
    setTimeout(function(){
        document.getElementById("body").style.backgroundImage = `url('${img1.src}')`;
    }, 3000);
    setTimeout(function(){
        document.getElementById("body").style.backgroundImage = `url('${img2.src}')`;
    }, 7000);
    setTimeout(function(){
        document.getElementById("body").style.backgroundImage = `url('${img3.src}')`;
    }, 11000);
    setTimeout(function(){
        document.getElementById("body").style.backgroundImage = `url('${img4.src}')`;
    }, 15000);
    setTimeout(function(){
        document.getElementById("body").style.backgroundImage = `url('${img5.src}')`;
    }, 19000);
    setTimeout(function(){
        document.getElementById("body").style.backgroundImage = `url('${img6.src}')`;
    }, 23000);
    setTimeout(function(){
        document.getElementById("body").style.backgroundImage = `url('${img7.src}')`;
    }, 27000);
    setTimeout(function(){
        document.getElementById("body").style.backgroundImage = `url('${img8.src}')`;
    }, 31000);
    setTimeout(APchangement, 35000);
}

export {
    APchangement
};