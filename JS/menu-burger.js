let menuouvert = false;
let divb = document.createElement('div');

function burger() {
    if (menuouvert) {
        //efface le menu déroulant.
        divb.innerHTML = '';
        divb.setAttribute('class','');

        menuouvert = false;
    } else {
        //creation de la div qui contiendras les buttons.
    
    divb.setAttribute('class', 'tailleMenu');
    divb.setAttribute('id','ok');

        //creation du button1.
    let button1 = document.createElement('button');
    button1.setAttribute('id','button1');
    button1.textContent = 'menu';
    button1.setAttribute('onclick','menu()');

        //creation du button2.
    let button2 = document.createElement('button');
    button2.setAttribute('id','button2');
    button2.textContent = 'connection';
    button2.setAttribute('onclick','connection()');

        //creation du button3.
    let button3 = document.createElement('button');
    button3.setAttribute('id','button3');
    button3.textContent = 'inscription';
    button3.setAttribute('onclick','inscription()');

        //définition des emplacements.
    divb.appendChild(button1);
    divb.appendChild(button2);
    divb.appendChild(button3);

    let burger = document.getElementById('burger');
    burger.appendChild(divb);

    menuouvert = true;
}
};