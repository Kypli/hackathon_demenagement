function copierColler(objet) {

    if (!document.getElementById(objet)) {

        // Désactiver l'objet (gris)
        document.getElementById('tag_' + objet).className = 'col-xs-2 tag bgGris';

        // Tag 1 (col G)
        maDiv = document.createElement("div");
        maDiv.id = objet;
        maDiv.className = 'col-xs-2 tag2';
        maDiv.innerHTML = objet;
        document.getElementById('inventory').appendChild(maDiv);

        // Tag 3 (col D)
        maDiv = document.createElement("div");
        maDiv.id = objet + '2';
        maDiv.className = 'col-xs-2 tag3';
        maDiv.innerHTML = '<input id="' + objet + 'Number" type="number" class="number" value="1">';
        maDiv.onclick = function(){
           if (document.getElementById(objet + 'Number').value <= 0) {

               // Supprimer Tag 2 et 3
               this.remove();
               document.getElementById(objet).remove();

               // Réactiver Tag 1 (vert)
               document.getElementById('tag_' + objet).className = 'col-xs-2 tag';
           };
        };
        document.getElementById(objet).append(maDiv);
    }
}

$( document ).ready(function() {
    $("select").on('click', function (e) {

        var selectElmt = document.getElementById("estate_estate");
        var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;

        if (valeurselectionnee == '8'){
            document.getElementById('colonneG').style.visibility="visible";
            document.getElementById('colonneD').style.visibility="visible";
        } else {
            document.getElementById('colonneG').style.visibility="hidden";
            document.getElementById('colonneD').style.visibility="hidden";
        }

    })
});



