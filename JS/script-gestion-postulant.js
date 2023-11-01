// Fonction pour ajouter une ligne à relation_employe_ouvrier
function addRowToRelationTable(entry) {
    const row = relationTable.insertRow();
    row.insertCell(0).innerHTML = entry.id;
    row.insertCell(1).innerHTML = entry.id_offre;
    row.insertCell(2).innerHTML = entry.id_cv;

    const actionsCell = row.insertCell(3);

    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Supprimer";
    deleteButton.addEventListener("click", () => {
        // Supprimer la ligne
        relationTable.deleteRow(row.rowIndex);
    });

    const moveButton = document.createElement("button");
    moveButton.textContent = "Déplacer vers Postuler";
    moveButton.addEventListener("click", () => {
        // Déplacer la ligne vers le tableau postuler
        const postulerRow = postulerTable.insertRow();
        postulerRow.insertCell(0).innerHTML = entry.id;
        postulerRow.insertCell(1).innerHTML = entry.id_cv;
        // Vous n'avez plus besoin de la colonne "Action" ici

        // Supprimer la ligne de relation_employe_ouvrier
        relationTable.deleteRow(row.rowIndex);
    });

    actionsCell.appendChild(deleteButton);
    actionsCell.appendChild(moveButton);
}