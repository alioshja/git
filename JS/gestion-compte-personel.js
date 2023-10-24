let menuouvert = false;
let divb = document.createElement('div');

//__________________________________________________________________________________________
//__________________________________________________________________________________________
//__________________________________________________________________________________________

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
    menuouvert = true;

    //parti de spa commune a tout les users.
    let lien3 = document.createElement('a');
    lien3.href = '../php/liste-offres-d\'emploi.php';
    lien3.textContent = 'Voir les offres'

    let o = document.createElement('button');
    o.setAttribute('id','button5');
    o.setAttribute('class','button');

    o.appendChild(lien3);
    divb.appendChild(o);

    //creation de spa.
        if (utilisateurConnecte.role =='consultant') {
        //creation du button1.
        let button1 = document.createElement('button');
        button1.setAttribute('id','button1');
        button1.textContent = 'gérer les comptes';
        button1.setAttribute('class','button');
        divb.appendChild(button1);
        console.log('ok')
        }
        else if (utilisateurConnecte.role == 'employé') {
        //creation du button2.
        let a = document.createElement('button');
        a.setAttribute('class','button');
        a.setAttribute('id', 'button2');
        //lien
        let lien2 = document.createElement('a');
        lien2.href = '../php/upload.php'; 
        lien2.textContent = 'déposer mon cv';
        a.appendChild(lien2);
    
        divb.appendChild(a);
        }
        else if (utilisateurConnecte.role == 'recruteur') {
        //creation du button3.
        let b = document.createElement('button');
        b.setAttribute('class', 'button');
        
        // Création du lien
        let lien = document.createElement('a');
        lien.href = '../php/form-employeur-offre.php'; 
        lien.textContent = 'Créer une offre';
        
        // Ajout du lien à l'intérieur du bouton
        b.appendChild(lien);
        
        // Définition de l'ID du bouton
        b.setAttribute('id', 'button3');
        
        // Ajout du bouton au conteneur "divb"
        divb.appendChild(b);
        }
        else if (utilisateurConnecte.role == 'administrateur') {
        //creation du button4.
        uaces = 'administrateur';
        let button4 = document.createElement('button');
        button4.setAttribute('id','button4');
        button4.textContent = 'back-office';
        button4.setAttribute('onclick','back()');
        button4.setAttribute('class','button');
        divb.appendChild(button4);
        }
}
document.getElementById('ok').appendChild(divb)
};
//fonctionne.

//________________________________________________________________________________________
//________________________________________________________________________________________
//________________________________________________________________________________________

//fonctions pour les différents roles.

function back() {

};

function read() {

};
//la fonction pour gérer les comptes sera coté php.