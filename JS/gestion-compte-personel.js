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
        divb.setAttribute('class', '');
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
        o.setAttribute('id', 'button5');
        o.setAttribute('class', 'button');

        o.appendChild(lien3);
        divb.appendChild(o);

        //creation de spa.
        if (utilisateurConnecte.role == 'consultant') {
            //creation du button1.
            let button1 = document.createElement('button');
            button1.setAttribute('id', 'button1');
            button1.setAttribute('class', 'button');
            //bouton pour gestion comptes
            let button2 = document.createElement('button');
            button2.setAttribute('id', 'button2');
            button2.setAttribute('class', 'button');
            //bouton pour gestion offres.
            let button3 = document.createElement('button');
            button3.setAttribute('id', 'button2');
            button3.setAttribute('class', 'button');
            //lien1
            let link = document.createElement('a');
            link.setAttribute('href', '../php/controle-postulant.php');
            link.textContent = 'migrer demandes';
            //lien2
            let link2 = document.createElement('a');
            link2.href = '../php/gestion-migration-de-compte.php';
            link2.textContent = 'gestion comptes';
            //link3
            let link3 = document.createElement('a');
            link3.href = '../php/validation-offre-par-consultant.php';
            link3.textContent = 'gestion offres';
            //attribution des emplacements.
            button1.appendChild(link);
            button2.appendChild(link2);
            button3.appendChild(link3);
            divb.appendChild(button1);
            divb.appendChild(button2);
            divb.appendChild(button3);
        }
        else if (utilisateurConnecte.role == 'employé') {
            //creation du button2.
            //, un candidat peut postuler à une offre en appuyant sur un simple bouton qui doit etre validé par consultant 
            //si validé employeur recevra une e-mail avec cv du postulant.
            let a = document.createElement('button');
            a.setAttribute('class', 'button');
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
            //Les recruteurs pourront préciser le nom de l’entreprise ainsi qu’une adresse.
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

            //ajout d'un autre bouton pour executer une fonction qui vas afficher un formulaire
            let fCButton = document.createElement('button');
            fCButton.setAttribute('class', 'button');
            fCButton.textContent = 'coordonées';
            fCButton.setAttribute('onclick', 'fC()');

            // Ajout du bouton pour déclencher fC au conteneur "divb"
            divb.appendChild(fCButton);

        }
        else if (utilisateurConnecte.role == 'administrateur') {
            //creation du button4.
            uaces = 'administrateur';
            let button4 = document.createElement('button');
            button4.setAttribute('id', 'button4');
            button4.textContent = 'back-office';
            button4.setAttribute('onclick', 'back()');
            button4.setAttribute('class', 'button');
            divb.appendChild(button4);
        }
    }
    document.getElementById('ok').appendChild(divb)
};
//fonctionne.

//________________________________________________________________________________________
//________________________________________________________________________________________
//________________________________________________________________________________________


//la fonction pour gérer les comptes sera coté php.

function fC() {
    const mainElement = document.getElementById('chargement');
        const formulaire = document.createElement('form');

        //suppression du contunu actuel du mainElement.
        mainElement.innerHTML = '';

        formulaire.id = 'recruteurForm';
        // Ajoutez la méthode et l'action au formulaire
        formulaire.setAttribute('method', 'POST');
        formulaire.setAttribute('action', '../php/gestion-coordonees-employeur.php');

        // Champ pour le nom de l'entreprise
        const inputNomEntreprise = document.createElement('input');
        inputNomEntreprise.type = 'text';
        inputNomEntreprise.name = 'nomEntreprise';
        inputNomEntreprise.placeholder = 'Nom de l\'entreprise';

        // Champ pour l'adresse
        const inputAdresse = document.createElement('input');
        inputAdresse.type = 'text';
        inputAdresse.name = 'adresse';
        inputAdresse.placeholder = 'Adresse de l\'entreprise';

        // Champ pour le téléphone
        const inputTelephone = document.createElement('input');
        inputTelephone.type = 'text';
        inputTelephone.name = 'telephone';
        inputTelephone.placeholder = 'Téléphone de contact';

        // Champ pour l'email
        const inputEmail = document.createElement('input');
        inputEmail.type = 'text';
        inputEmail.name = 'email';
        inputEmail.placeholder = 'Email de contact';

        // Bouton de soumission
        const submitButton = document.createElement('button');
        submitButton.type = 'submit';
        submitButton.textContent = 'Créer offre';

        // Ajout des champs au formulaire
        formulaire.appendChild(inputNomEntreprise);
        formulaire.appendChild(inputAdresse);
        formulaire.appendChild(inputTelephone);
        formulaire.appendChild(inputEmail);
        formulaire.appendChild(submitButton);

        // Ajout du formulaire à l'intérieur de l'élément main
        mainElement.appendChild(formulaire);

        // Ajoutez le formulaire au conteneur "divb"
        const ide = document.getElementById('chargement');
        ide.appendChild(formulaire);

        formulaire.addEventListener('submit', function (event) {
            // le formulaire se soumet normalement
            // Affichez un message de confirmation après la soumission
            const confirmationMessage = document.createElement('p');
            confirmationMessage.textContent = 'Le formulaire a été soumis avec succès.';
            ide.appendChild(confirmationMessage);
        });

        console.log("Formulaire généré");
    };
