function menu() {
      // Sélectionner l'élément avec l'ID 'chargement'.
      document.getElementById('titre').textContent = 'TRT Conseil, notre métier vous servir.';

      let chargement = document.getElementById('chargement');

      // Effacer tout le contenu de l'élément 'chargement'.
      chargement.innerHTML = '';

      // Créer un nouvel élément 'h2'.
      let h2 = document.createElement('h2');
      h2.textContent = 'Bienvenue sur TRT Conseil.';

      // Créer un nouvel élément 'article'
      let article = document.createElement('article');

      // Créer un nouvel élément 'b' et 'p' à l'intérieur de 'article'.
      let b = document.createElement('b');
      b.textContent = 'Qui sommes-nous ?';

      let p = document.createElement('p');
      p.textContent = "TRT Conseil est un site qui répertorie toutes les offres d'emploi de la firme TRT.";
      
      let p2 = document.createElement('p');
      p2.textContent = "En effet, ce site est là pour faciliter la mise en relation entre les employeurs et les demandeurs d'emploi au sein de TRT.";
      
      let p3 = document.createElement('p');
      p3.textContent = "Ici, vous pourrez contacter vos futurs employeurs et vérifier s il y a des places disponibles et a quel endroit.";
      
      let p4 = document.createElement('p');
      p4.textContent = "Vous pouvez créer votre compte personnel afin de répertorier les demandes faites ainsi que vous messages reçus.";
      
      let p5 = document.createElement('p');
      p5.textContent = "Vous pouvez également faire en sorte de recevoir des mails avec le contenu des messages reçus afin de suivre plus facilement vos conversations.";
      
      let p6 = document.createElement('p');
      p6.textContent = "À présent, vous savez tout bon courage dans votre recherche d'emploi.";

      // Ajouter le 'h2' et 'article' comme enfants de 'chargement'.
      chargement.appendChild(h2);
      chargement.appendChild(article);

      // Ajouter le 'p' comme enfant de 'article'.
      article.appendChild(b);
      article.appendChild(document.createElement('br'));
      article.appendChild(p);
      article.appendChild(document.createElement('br'));
      article.appendChild(p2);
      article.appendChild(document.createElement('br'));
      article.appendChild(p3);
      article.appendChild(document.createElement('br'));
      article.appendChild(p4);
      article.appendChild(document.createElement('br'));
      article.appendChild(p5);
      article.appendChild(document.createElement('br'));
      article.appendChild(p6);
}

//________________________________________________________________________________________________________

function connection() {
      document.getElementById('titre').textContent = 'Connectez vous a votre compte';
      // Sélectionner l'élément avec l'ID 'chargement'.
      let chargement = document.getElementById('chargement');

      // Effacer tout le contenu de l'élément 'chargement'.

      chargement.innerHTML = '';

      //création du form.
      let form = document.createElement('form');
      //définition des atributs.
      form.setAttribute('method', 'post');
      form.setAttribute('action', '../php/gestion-connection.php');
      form.setAttribute('id', 'form')

      //création des champs et espaces.

      let labelEMail = document.createElement('label');
      let inputEmail = document.createElement('input');

      //implantation des champ du form.

      labelEMail.textContent = 'E-mail';
      inputEmail.setAttribute('name', 'mail');
      inputEmail.setAttribute('type', 'email');


      //ajout des balises au form.

      form.appendChild(document.createElement('br'))
      form.appendChild(labelEMail);
      form.appendChild(document.createElement('br'))
      form.appendChild(inputEmail);

      //saut de ligne.

      form.appendChild(document.createElement('br'))

      //création des var.

      let labelPassword = document.createElement('label');
      let inputPassword = document.createElement('input');

      //implantation du champ password.

      labelPassword.textContent = 'Mot de passe';
      inputPassword.setAttribute('name', 'password');
      inputPassword.setAttribute('type', 'password');

      form.appendChild(labelPassword);
      form.appendChild(document.createElement('br'))
      form.appendChild(inputPassword);

      //implatation du bouton submit.

      let submitButton = document.createElement('button');


      submitButton.textContent = 'Connection';
      submitButton.setAttribute('type', 'submit');

      form.appendChild(document.createElement('br'));
      form.appendChild(submitButton);

      //ajout a l'id.
      chargement.appendChild(form);
}

//________________________________________________________________________________________________________

function inscription() {
      document.getElementById('titre').textContent = 'Créez votre compte';
      // Sélectionner l'élément avec l'ID 'chargement'.
      let chargement = document.getElementById('chargement');

      // Effacer tout le contenu de l'élément 'chargement'.

      chargement.innerHTML = '';

      //création du form.
      let formI = document.createElement('form');
      formI.setAttribute('method','post');
      formI.setAttribute('action','../php/gestion-inscription.php');

      //création des champs du form.

      let labelName = document.createElement('label')
      let inputName = document.createElement('input')

      labelName.textContent = 'Nom';
      inputName.setAttribute('type','text');
      inputName.setAttribute('name','nom');

      formI.appendChild(labelName);
      formI.appendChild(document.createElement('br'));
      formI.appendChild(inputName);
      formI.appendChild(document.createElement('br'));

      // 

      let labelFirstName = document.createElement('label');
      let inputFirstName = document.createElement('input');

      labelFirstName.textContent = 'Prenom';
      inputFirstName.setAttribute('type','text');
      inputFirstName.setAttribute('name','prenom');

      formI.appendChild(labelFirstName);
      formI.appendChild(document.createElement('br'));
      formI.appendChild(inputFirstName);
      formI.appendChild(document.createElement('br'));

      // 

      let labelMailC = document.createElement('label');
      let inputMailC = document.createElement('input');

      labelMailC.textContent = 'E-mail';
      inputMailC.setAttribute('type','email');
      inputMailC.setAttribute('name','mailC')

      formI.appendChild(labelMailC);
      formI.appendChild(document.createElement('br'));
      formI.appendChild(inputMailC);
      formI.appendChild(document.createElement('br'));

      // 

      let labelPassC = document.createElement('label')
      let inputPassC = document.createElement('input');

      labelPassC.textContent = 'Mot de passe';
      inputPassC.setAttribute('type','password');
      inputPassC.setAttribute('name','passwordC');

      formI.appendChild(labelPassC);
      formI.appendChild(document.createElement('br'));
      formI.appendChild(inputPassC);
      formI.appendChild(document.createElement('br'));

      // 

      let labelPConfirm = document.createElement('label');
      let inputPConfirm = document.createElement('input');

      labelPConfirm.textContent = 'Confirmation du mot de passe';
      inputPConfirm.setAttribute('type','password');
      inputPConfirm.setAttribute('name','passConfirm');

      formI.appendChild(labelPConfirm);
      formI.appendChild(document.createElement('br'));
      formI.appendChild(inputPConfirm);

            //implatation du bouton submit.

            let submitButtonC = document.createElement('button');


            submitButtonC.textContent = 'Valider';
            submitButtonC.setAttribute('type', 'submit');
      
            formI.appendChild(document.createElement('br'));
            formI.appendChild(submitButtonC);

      chargement.appendChild(formI);
      // fin de la spa
}

//________________________________________________________________________________________________________
//________________________________________________________________________________________________________
//________________________________________________________________________________________________________

//code AJAX.
function supprimerLigne(ligneId) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../php/gestion-bdd.php", true);
      xhr.setRequestHeader()
}

//ciblages des fonctions pour les boutons de migration de la bdd vers la bdd des personnes acceptées.