function copierColler(objet) {
    maDiv = document.createElement("div");
    maDiv.id = 'id_de_la_div';
    maDiv.style.border = '1px solid black'; //Pour mettre un border à ta div, par exemple
    maDiv.innerHTML = objet; //Peut contenir de l'html
    maDiv.onclick = function(){alert('click !');}; //Évènement ayant lieu lors du click sur la div
    document.getElementById('inventory').appendChild(maDiv);
}