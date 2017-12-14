// Déplacer les tag
function copierColler(objet) {

    if (!document.getElementById(objet)) {

        // Désactiver l'objet (gris)
        document.getElementById('object_' + objet).className = 'col-xs-2 object bgGris';

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
               document.getElementById('object_' + objet).className = 'col-xs-2 object';
           };
        };
        document.getElementById(objet).append(maDiv);
    }
}

// Rajouter une salle
function addRoom(objet) {
    document.forms[objet].submit();
}

// Afficher le site si Inventaire libre
$( document ).ready(function() {
    $("select").on('click', function (e) {

        var selectElmt = document.getElementById("estate_estate");
        var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;

        if (valeurselectionnee == '8'){
            document.getElementById('objects').style.visibility="visible";
            document.getElementById('colonneD').style.visibility="visible";
        } else {
            document.getElementById('objects').style.visibility="hidden";
            document.getElementById('colonneD').style.visibility="hidden";
        }
    });

    let categoriesSelected = [];

    // Click sur une catégorie pour filtrer les objets
    jQuery('#categories button').click(function(){
        let categChecked = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
        let checked = jQuery(this).children().length;
        let id = jQuery(this).data('id');

        if (0 == checked) {
            categoriesSelected.push(id);
            let url = `/api/furnitures`;
            let data = {'categories': categoriesSelected.join()};

            jQuery.getJSON(url, data)
                .done(function(data){
                    let objectsIds = [];

                    data.forEach(function(value, index, array) {
                        objectsIds.push(value.id.toString());
                    });

                    jQuery('#objects > div').each(function(index){
                        if (jQuery.inArray(jQuery(this).attr('id').substring(7, jQuery(this).attr('id').length), objectsIds) == -1) {
                            jQuery(this).hide();
                        } else {
                            jQuery(this).show();
                        }
                    })
                });
            jQuery(this).append(categChecked);
        } else {
            categoriesSelected.forEach(function(value, index, array) {
                if (id == value) {
                    array.splice(index);
                }
            });
            jQuery(this).children().remove('span');
        }

        // *** LOG ***
        // console.log(categoriesSelected);
    });
});
