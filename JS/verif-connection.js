//configuration de la requette AJAX qui permettra de vérifier la valeur dans le php pour utiliser
//le dom en concéquance en fonction de ce quil y a dans la var (role) je le fait dans une fonction anonyme;
document.addEventListener("DOMContentLoaded", function () {
const xhr = new XMLHttpRequest();
xhr.open("GET", "../php/gestion-connection.php",true);
//initialisation de l'objet et sa configuration;

xhr.onload = function () {
    if (xhr.statut === 200) {
        const reponse = JSON.parse(xhr.responceText);
        //conversion de la valeur json envoyé par php en var js
        if (pformat == 'recruteur') {

        }else if (pformat == '') {

        }else if (pformat == '') {

        }else if (pformat == '') {

        } else ;
    }
}
});