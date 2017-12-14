function copierColler(objet) {

    if (!document.getElementById(objet)) {

        // Désactiver l'objet
        document.getElementById('tag_' + objet).className = 'col-xs-2 tag bgGris';

        // Div 1
        maDiv = document.createElement("div");
        maDiv.id = objet;
        maDiv.className = 'col-xs-2 tag2';
        maDiv.innerHTML = objet;
        document.getElementById('inventory').appendChild(maDiv);

        // Div 3
        maDiv = document.createElement("div");
        maDiv.id = objet + '2';
        maDiv.className = 'col-xs-2 tag3';
        maDiv.innerHTML = '<input id="' + objet + 'Number" type="number" class="number" value="1">';
        maDiv.onclick = function(){
           if (document.getElementById(objet + 'Number').value <= 0) {
               // Supprimer div et div enfant des objets inventaire
               this.remove();
               document.getElementById(objet).remove();

               // Réactiver objet
               document.getElementById('tag_' + objet).className = 'col-xs-2 tag';
           };
        };
        document.getElementById(objet).append(maDiv);
    }
}

$( document ).ready(function() {
    $("select").on('click', function (e) {


        select = document.getElementsByClassName("selector");
        choice = select.selectedIndex  // Récupération de l'index du <option> choisi
        valeur_cherchee = select.options[choice].value;
        alert(valeur_cherchee);

        // if (valeur_cherchee == '3'){
        //     document.getElementsByClassName('displayNone').style.display = 'block';
        //     document.getElementById('tag_5').innerHTML = 'coucou'
        // }

    })
});



