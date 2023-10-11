let menuouvert = false;
let divb = document.createElement('div');
//classe pour le menu burger apres connection.
function burgerC() {
    if (menuouvert) {
        //efface le menu déroulant.
        divb.innerHTML = '';
        divb.setAttribute('class','');

        menuouvert = false;
    } else {
        //creation de la div qui contiendras les buttons.
    
    divb.setAttribute('class', 'tailleMenu');
    divb.setAttribute('id','ok');
        if (utilisateurConnecte.role=='consultant') {
        //creation du button1.
        let button1 = document.createElement('button');
        button1.setAttribute('id','button1');
        button1.textContent = 'gérer les comptes';
        button1.setAttribute('onclick','consultant()');
        divb.appendChild(button1);
        }
        else if (utilisateurConnecte.role== 'ouvrier') {
        //creation du button2.
        let button2 = document.createElement('button');
        button2.setAttribute('id','button2');
        button2.textContent = 'offres disponibles';
        button2.setAttribute('onclick','ouvrier()');
        divb.appendChild(button2);
        }
        else if (utilisateurConnecte.role== 'employeur') {
        //creation du button3.
        let button3 = document.createElement('button');
        button3.setAttribute('id','button3');
        button3.textContent = 'gérer les comptes';
        button3.setAttribute('onclick','employeur()');
        divb.appendChild(button3);
        }
        else if (utilisateurConnecte.role== 'administrateur') {
        //creation du button4.
        let button4 = document.createElement('button');
        button4.setAttribute('id','button4');
        button4.textContent = 'gérer les comptes';
        button4.setAttribute('onclick','administrateur()');
        divb.appendChild(button4);
        }
    let burger = document.getElementById('burger');
    burger.appendChild(divb);
    menuouvert = true;
}
//fonctionne.
}
//fonction pour les boutons consultants.
function consultant() {

}
//fonction pour // ouvrier.
function ouvrier() {

}
//fonction pour // employeur.
function employeur() {

}
//fonction pour // administrateur.
function administrateur() {

}
//________________________________________________________________________________________
//________________________________________________________________________________________
//________________________________________________________________________________________