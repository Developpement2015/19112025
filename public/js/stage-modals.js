// Variables globales pour l'édition
let editingEcoleId = null;
let editingOptionId = null;
let editingEncadrantId = null;
let editingTypeStageId = null;

// ==================== GESTION DES ÉCOLES ====================

// Gestion des Écoles
document.getElementById('ecoleForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const nom = document.getElementById('ecole_nom').value;
    const nom_arabe = document.getElementById('ecole_nom_arabe').value;

    const url = editingEcoleId ? `/api/ecoles/${editingEcoleId}` : '/api/ecoles';
    const method = editingEcoleId ? 'PUT' : 'POST';

    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ nom, nom_arabe })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Réinitialiser le formulaire
            document.getElementById('ecoleForm').reset();
            editingEcoleId = null;
            document.getElementById('cancelEditEcole').classList.add('d-none');

            // Recharger la liste
            loadEcoles();

            // Mettre à jour le dropdown principal
            updateEcoleDropdown();

            // Afficher un message de succès
            showAlert(data.message, 'success');
        } else {
            showAlert('Erreur: ' + data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('Une erreur est survenue', 'error');
    });
});

function loadEcoles() {
    fetch('/api/ecoles/data')
    .then(response => response.json())
    .then(data => {
        const tbody = document.querySelector('#ecolesTable tbody');
        tbody.innerHTML = '';

        data.data.forEach(ecole => {
            const row = `
                <tr>
                    <td>${ecole.nom}</td>
                    <td>${ecole.nom_arabe}</td>
                    <td>
                        <button class="btn btn-sm btn-success me-1" onclick="editEcole(${ecole.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteEcole(${ecole.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    });
}

function editEcole(id) {
    fetch(`/api/ecoles/${id}`)
    .then(response => response.json())
    .then(ecole => {
        document.getElementById('ecole_nom').value = ecole.nom;
        document.getElementById('ecole_nom_arabe').value = ecole.nom_arabe;
        editingEcoleId = id;
        document.getElementById('cancelEditEcole').classList.remove('d-none');
    });
}

function deleteEcole(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette école?')) {
        fetch(`/api/ecoles/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadEcoles();
                updateEcoleDropdown();
                showAlert(data.message, 'success');
            } else {
                showAlert('Erreur: ' + data.message, 'error');
            }
        });
    }
}

function updateEcoleDropdown() {
    fetch('/api/ecoles')
    .then(response => response.json())
    .then(ecoles => {
        const select = document.getElementById('ecole_id');
        const currentValue = select.value;

        // Garder la première option
        select.innerHTML = '<option value="">Sélectionner une école</option>';

        ecoles.forEach(ecole => {
            const option = document.createElement('option');
            option.value = ecole.id;
            option.textContent = `${ecole.nom} - ${ecole.nom_arabe}`;
            if (ecole.id == currentValue) {
                option.selected = true;
            }
            select.appendChild(option);
        });
    });
}

// ==================== GESTION DES OPTIONS ====================

// Gestion des Options
document.getElementById('optionForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const nom = document.getElementById('option_nom').value;
    const nom_arabe = document.getElementById('option_nom_arabe').value;

    const url = editingOptionId ? `/api/options/${editingOptionId}` : '/api/options';
    const method = editingOptionId ? 'PUT' : 'POST';

    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ nom, nom_arabe })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Réinitialiser le formulaire
            document.getElementById('optionForm').reset();
            editingOptionId = null;
            document.getElementById('cancelEditOption').classList.add('d-none');

            // Recharger la liste
            loadOptions();

            // Mettre à jour le dropdown principal
            updateOptionDropdown();

            // Afficher un message de succès
            showAlert(data.message, 'success');
        } else {
            showAlert('Erreur: ' + data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('Une erreur est survenue', 'error');
    });
});

function loadOptions() {
    fetch('/api/options/data')
    .then(response => response.json())
    .then(data => {
        const tbody = document.querySelector('#optionsTable tbody');
        tbody.innerHTML = '';

        data.data.forEach(option => {
            const row = `
                <tr>
                    <td>${option.nom}</td>
                    <td>${option.nom_arabe}</td>
                    <td>
                        <button class="btn btn-sm btn-success me-1" onclick="editOption(${option.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteOption(${option.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    });
}

function editOption(id) {
    fetch(`/api/options/${id}`)
    .then(response => response.json())
    .then(option => {
        document.getElementById('option_nom').value = option.nom;
        document.getElementById('option_nom_arabe').value = option.nom_arabe;
        editingOptionId = id;
        document.getElementById('cancelEditOption').classList.remove('d-none');
    });
}

function deleteOption(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette option?')) {
        fetch(`/api/options/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadOptions();
                updateOptionDropdown();
                showAlert(data.message, 'success');
            } else {
                showAlert('Erreur: ' + data.message, 'error');
            }
        });
    }
}

function updateOptionDropdown() {
    fetch('/api/options')
    .then(response => response.json())
    .then(options => {
        const select = document.getElementById('option_id');
        const currentValue = select.value;

        // Garder la première option
        select.innerHTML = '<option value="">Sélectionner une option</option>';

        options.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.value = option.id;
            optionElement.textContent = `${option.nom} - ${option.nom_arabe}`;
            if (option.id == currentValue) {
                optionElement.selected = true;
            }
            select.appendChild(optionElement);
        });
    });
}

// ==================== GESTION DES ENCADRANTS ====================

// Gestion des Encadrants
document.getElementById('encadrantForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const nom = document.getElementById('encadrant_nom').value;
    const nom_arabe = document.getElementById('encadrant_nom_arabe').value;
    const fonction = document.getElementById('encadrant_fonction').value;
    const fonction_arabe = document.getElementById('encadrant_fonction_arabe').value;

    const url = editingEncadrantId ? `/api/encadrants/${editingEncadrantId}` : '/api/encadrants';
    const method = editingEncadrantId ? 'PUT' : 'POST';

    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ nom, nom_arabe, fonction, fonction_arabe })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Réinitialiser le formulaire
            document.getElementById('encadrantForm').reset();
            editingEncadrantId = null;
            document.getElementById('cancelEditEncadrant').classList.add('d-none');

            // Recharger la liste
            loadEncadrants();

            // Mettre à jour le dropdown principal
            updateEncadrantDropdown();

            // Afficher un message de succès
            showAlert(data.message, 'success');
        } else {
            showAlert('Erreur: ' + data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('Une erreur est survenue', 'error');
    });
});

function loadEncadrants() {
    fetch('/api/encadrants/data')
    .then(response => response.json())
    .then(data => {
        const tbody = document.querySelector('#encadrantsTable tbody');
        tbody.innerHTML = '';

        data.data.forEach(encadrant => {
            const row = `
                <tr>
                    <td>${encadrant.nom}</td>
                    <td>${encadrant.nom_arabe}</td>
                    <td>${encadrant.fonction}</td>
                    <td>${encadrant.fonction_arabe}</td>
                    <td>
                        <button class="btn btn-sm btn-success me-1" onclick="editEncadrant(${encadrant.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteEncadrant(${encadrant.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    });
}

function editEncadrant(id) {
    fetch(`/api/encadrants/${id}`)
    .then(response => response.json())
    .then(encadrant => {
        document.getElementById('encadrant_nom').value = encadrant.nom;
        document.getElementById('encadrant_nom_arabe').value = encadrant.nom_arabe;
        document.getElementById('encadrant_fonction').value = encadrant.fonction;
        document.getElementById('encadrant_fonction_arabe').value = encadrant.fonction_arabe;
        editingEncadrantId = id;
        document.getElementById('cancelEditEncadrant').classList.remove('d-none');
    });
}

function deleteEncadrant(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet encadrant?')) {
        fetch(`/api/encadrants/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadEncadrants();
                updateEncadrantDropdown();
                showAlert(data.message, 'success');
            } else {
                showAlert('Erreur: ' + data.message, 'error');
            }
        });
    }
}

function updateEncadrantDropdown() {
    fetch('/api/encadrants')
    .then(response => response.json())
    .then(encadrants => {
        const select = document.getElementById('encadrant_id');
        const currentValue = select.value;

        // Garder la première option
        select.innerHTML = '<option value="">Sélectionner un encadrant</option>';

        encadrants.forEach(encadrant => {
            const option = document.createElement('option');
            option.value = encadrant.id;
            option.textContent = `${encadrant.nom} - ${encadrant.fonction}`;
            if (encadrant.id == currentValue) {
                option.selected = true;
            }
            select.appendChild(option);
        });
    });
}

// ==================== ÉVÉNEMENTS ET UTILITAIRES ====================

// Charger les données quand les modales s'ouvrent
document.getElementById('manageEcolesModal').addEventListener('shown.bs.modal', function() {
    loadEcoles();
});

document.getElementById('manageOptionsModal').addEventListener('shown.bs.modal', function() {
    loadOptions();
});

document.getElementById('manageEncadrantsModal').addEventListener('shown.bs.modal', function() {
    loadEncadrants();
});

// Annuler l'édition
document.getElementById('cancelEditEcole').addEventListener('click', function() {
    document.getElementById('ecoleForm').reset();
    editingEcoleId = null;
    this.classList.add('d-none');
});

document.getElementById('cancelEditOption').addEventListener('click', function() {
    document.getElementById('optionForm').reset();
    editingOptionId = null;
    this.classList.add('d-none');
});

document.getElementById('cancelEditEncadrant').addEventListener('click', function() {
    document.getElementById('encadrantForm').reset();
    editingEncadrantId = null;
    this.classList.add('d-none');
});

// Fonction utilitaire pour afficher les alertes
function showAlert(message, type) {
    // Vous pouvez remplacer ceci par une notification plus élégante
    if (type === 'success') {
        alert('✅ ' + message);
    } else {
        alert('❌ ' + message);
    }
}

// ==================== GESTION DES TYPES DE STAGE ====================

// Gestion des Types de Stage
document.getElementById('typeStageForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const nom = document.getElementById('type_stage_nom').value;
    const nom_arabe = document.getElementById('type_stage_nom_arabe').value;

    const url = editingTypeStageId ? `/api/type-stages/${editingTypeStageId}` : '/api/type-stages';
    const method = editingTypeStageId ? 'PUT' : 'POST';

    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ nom, nom_arabe })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Réinitialiser le formulaire
            document.getElementById('typeStageForm').reset();
            editingTypeStageId = null;
            document.getElementById('cancelEditTypeStage').classList.add('d-none');

            // Recharger la liste
            loadTypeStages();

            // Mettre à jour le dropdown principal
            updateTypeStageDropdown();

            // Afficher un message de succès
            showAlert(data.message, 'success');
        } else {
            showAlert('Erreur: ' + data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('Une erreur est survenue', 'error');
    });
});

// Annuler l'édition des types de stage
document.getElementById('cancelEditTypeStage').addEventListener('click', function() {
    document.getElementById('typeStageForm').reset();
    editingTypeStageId = null;
    this.classList.add('d-none');
});

// Charger les types de stage
function loadTypeStages() {
    fetch('/api/type-stages/data')
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#typeStagesTable tbody');
            tbody.innerHTML = '';

            data.data.forEach(typeStage => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${typeStage.nom}</td>
                    <td style="direction: rtl;">${typeStage.nom_arabe}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="editTypeStage(${typeStage.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteTypeStage(${typeStage.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Error loading type stages:', error);
        });
}

// Éditer un type de stage
function editTypeStage(id) {
    fetch(`/api/type-stages/${id}`)
        .then(response => response.json())
        .then(typeStage => {
            document.getElementById('type_stage_nom').value = typeStage.nom;
            document.getElementById('type_stage_nom_arabe').value = typeStage.nom_arabe;
            editingTypeStageId = id;
            document.getElementById('cancelEditTypeStage').classList.remove('d-none');
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('Erreur lors du chargement du type de stage', 'error');
        });
}

// Supprimer un type de stage
function deleteTypeStage(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce type de stage ?')) {
        fetch(`/api/type-stages/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadTypeStages();
                updateTypeStageDropdown();
                showAlert(data.message, 'success');
            } else {
                showAlert('Erreur: ' + data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('Une erreur est survenue', 'error');
        });
    }
}

// Mettre à jour le dropdown des types de stage
function updateTypeStageDropdown() {
    fetch('/api/type-stages')
        .then(response => response.json())
        .then(typeStages => {
            const select = document.getElementById('type_stage_id');
            if (select) {
                // Sauvegarder la valeur actuelle
                const currentValue = select.value;

                // Vider le select sauf la première option
                select.innerHTML = '<option value="">Sélectionner un type</option>';

                // Ajouter les nouvelles options
                typeStages.forEach(typeStage => {
                    const option = document.createElement('option');
                    option.value = typeStage.id;
                    option.textContent = typeStage.nom;
                    if (typeStage.id == currentValue) {
                        option.selected = true;
                    }
                    select.appendChild(option);
                });
            }
        })
        .catch(error => {
            console.error('Error updating type stage dropdown:', error);
        });
}
