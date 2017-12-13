function copierColler(objet) {

    if (!document.getElementById(objet)) {
        // Div 1
        maDiv = document.createElement("div");
        maDiv.id = objet;
        maDiv.className = 'col-xs-2 tag2';
        maDiv.innerHTML = objet;
        maDiv.onclick = function(){
            // this.remove();
        };
        document.getElementById('inventory').appendChild(maDiv);

        // Div 3
        maDiv = document.createElement("div");
        maDiv.id = objet + '2';
        maDiv.className = 'col-xs-2 tag3';
        maDiv.innerHTML = '<input id="' + objet + 'Number" type="number" class="number" value="1">';
        maDiv.onclick = function(){
           if (document.getElementById(objet + 'Number').value <= 0) {
               this.remove();
               document.getElementById(objet).remove();
           };
        };
        document.getElementById(objet).append(maDiv);
    }



}