let menuouvert = false;
let divb = document.createElement('div');
let uaces = '';

//fonction qui vas permetre de donner un acces different en fonction du role car la page sera généré en fonction du role;
function acces(uaces) {
    const main = document.getElementById('chargement');
    main.innerHTML = '';
    if(uaces=='consultant') {
    let div = document.createElement('div');
    div.setAttribute('class','listeDattente');
    main.appendChild(div);
    }
    else if(uaces=='administrateur') {
        
    }
    else if(uaces=='employeur') {

    }
    else {
    };
}

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
            //utilisation du dom commune a tout type de compte.
    let a = document.createElement('button');
    a.textContent = 'mes messages';
    a.setAttribute('onclick','messagerie()');
    a.setAttribute('id','button5');
    a.setAttribute('class','button');
    divb.appendChild(a);
        //creation du bouton qui créra les messages.
    let b = document.createElement('button');
    b.setAttribute('class','button');
    b.textContent = 'créer un message.';
    b.setAttribute('onclick','sMessage');
    b.setAttribute('id','button6');
    divb.appendChild(b);
    menuouvert = true;


    //creation de spa.
        if (utilisateurConnecte.role=='consultant') {
        //creation du button1.
        uaces = 'consultant';
        let button1 = document.createElement('button');
        button1.setAttribute('id','button1');
        button1.textContent = 'gérer les comptes';
        button1.setAttribute('onclick','acces(uaces)')
        button1.setAttribute('class','button');
        divb.appendChild(button1);
        console.log('ok')
        }
        else if (utilisateurConnecte.role== 'ouvrier') {
        //creation du button2.
        uaces = 'auccun';
        let button2 = document.createElement('button');
        button2.setAttribute('id','button2');
        button2.textContent = 'messagerie';
        button2.setAttribute('onclick','acces(uaces)');
        button2.setAttribute('class','button');
        divb.appendChild(button2);
        }
        else if (utilisateurConnecte.role== 'employeur') {
        //creation du button3.
        uaces = 'employeur';
        let button3 = document.createElement('button');
        button3.setAttribute('id','button3');
        button3.textContent = 'gérer les comptes';
        button3.setAttribute('onclick','acces(uaces)');
        button3.setAttribute('class','button');
        divb.appendChild(button3);
        }
        else if (utilisateurConnecte.role== 'administrateur') {
        //creation du button4.
        uaces = 'administrateur';
        let button4 = document.createElement('button');
        button4.setAttribute('id','button4');
        button4.textContent = 'gérer les comptes';
        button4.setAttribute('onclick','acces(uaces)');
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

//donne acces a la messagerie apres execution en modifiant les dom.

function messagerie() {
let ms = document.createElement()
};