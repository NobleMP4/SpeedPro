// Document Ready Handlers
$(document).ready(function(){
    // Scroll Handler
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            $('#nav').addClass('scroll');
        } else {
            $('#nav').removeClass('scroll');
        }
    });
});

// Fonctions de base pour les modals
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'block';
        modal.classList.add('show');
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('show');
        modal.style.display = 'none';
    }
}

// Fonctions pour l'affichage des formulaires
function openAddVehicleForm() {
    const formSection = document.getElementById('addVehicleFormSection');
    formSection.style.display = 'block';
    formSection.scrollIntoView({ behavior: 'smooth' });
}

function closeAddVehicleForm() {
    const formSection = document.getElementById('addVehicleFormSection');
    formSection.style.display = 'none';
}

function openNewClientForm() {
    const formSection = document.getElementById('newClientFormSection');
    formSection.style.display = 'block';
    formSection.scrollIntoView({ behavior: 'smooth' });
}

function closeNewClientForm() {
    const formSection = document.getElementById('newClientFormSection');
    formSection.style.display = 'none';
}

// Fonctions pour le formulaire d'ajout d'utilisateur
function openAddUserForm() {
    const formSection = document.getElementById('addUserFormSection');
    formSection.style.display = 'block';
    formSection.scrollIntoView({ behavior: 'smooth' });
}

function closeAddUserForm() {
    const formSection = document.getElementById('addUserFormSection');
    formSection.style.display = 'none';
}

// Gestion des formulaires d'ajout
document.addEventListener('DOMContentLoaded', function() {
    // Fonction générique pour gérer les soumissions de formulaire
    function handleFormSubmission(modalId, formId, action) {
        const modal = document.querySelector(modalId);
        const form = document.querySelector(formId);
        const submitBtn = modal.querySelector('.btn-primary');

        submitBtn.addEventListener('click', function() {
            const formData = new FormData(form);
            formData.append('action', action);

            fetch('?p=gestion', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Fermer le modal
                    const bsModal = bootstrap.Modal.getInstance(modal);
                    bsModal.hide();
                    
                    // Recharger la page pour afficher les nouvelles données
                    window.location.href = '?p=gestion';
                } else {
                    alert('Erreur : ' + (data.error || 'Une erreur est survenue'));
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Une erreur est survenue lors de la communication avec le serveur');
            });
        });
    }

    // Gestion de l'ajout de marque
    handleFormSubmission('#addMarqueModal', '#addMarqueForm', 'addMarque');

    // Gestion de l'ajout d'option
    handleFormSubmission('#addOptionModal', '#addOptionForm', 'addOption');

    // Gestion de l'ajout de carburant
    handleFormSubmission('#addCarburantModal', '#addCarburantForm', 'addCarburant');

    // Gestion de l'ajout de modèle
    handleFormSubmission('#addModeleModal', '#addModeleForm', 'addModele');

    // Gestion spéciale pour les générations (avec dépendance marque/modèle)
    const marqueSelect = document.querySelector('#marque_generation');
    const modeleSelect = document.querySelector('#modele_generation');

    if (marqueSelect && modeleSelect) {
        marqueSelect.addEventListener('change', function() {
            const marqueId = this.value;
            
            // Réinitialiser le select des modèles
            modeleSelect.innerHTML = '<option value="">Sélectionnez un modèle</option>';
            
            if (marqueId) {
                // Charger les modèles correspondants à la marque
                fetch(`?p=gestion&action=getModeles&marque=${marqueId}`)
                    .then(response => response.json())
                    .then(modeles => {
                        modeles.forEach(modele => {
                            const option = document.createElement('option');
                            option.value = modele.id_modele;
                            option.textContent = modele.nom_modele;
                            modeleSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Erreur:', error));
            }
        });
    }

    // Gestion de l'ajout de génération
    handleFormSubmission('#addGenerationModal', '#addGenerationForm', 'addGeneration');
});

// Gestion de l'ajout de génération
document.addEventListener('DOMContentLoaded', function() {
    const addGenerationForm = document.getElementById('addGenerationForm');
    if (addGenerationForm) {
        const submitButton = addGenerationForm.closest('.modal-content').querySelector('.btn-primary');
        submitButton.addEventListener('click', function(e) {
            e.preventDefault();
            const nomGeneration = document.getElementById('nom_generation').value.trim();
            const modeleGeneration = document.getElementById('modele_generation').value;
            
            if (!nomGeneration || !modeleGeneration) return;

            const formData = new URLSearchParams();
            formData.append('action', 'addGeneration');
            formData.append('nom_generation', nomGeneration);
            formData.append('modele_generation', modeleGeneration);

            fetch('?p=admin', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData.toString()
            })
            .then(() => window.location.href = '?p=admin')
            .catch(() => window.location.href = '?p=admin');
        });
    }
});

// Gestion du formulaire d'ajout de client
document.addEventListener('DOMContentLoaded', function() {
    const newClientForm = document.getElementById('newClientForm');
    if (newClientForm) {
        newClientForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Création des données du formulaire
            const formData = new URLSearchParams();
            formData.append('action', 'addClient');
            
            // Récupération des champs du formulaire
            const formFields = newClientForm.querySelectorAll('input, select, textarea');
            formFields.forEach(field => {
                formData.append(field.name, field.value);
            });

            // Envoi de la requête
            fetch('?p=clients', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData.toString()
            })
            .then(() => {
                window.location.href = '?p=clients';
            })
            .catch(() => {
                window.location.href = '?p=clients';
            });
        });
    }
});

document.getElementById('addVehicleForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    // Validation des images
    const files = formData.getAll('images[]');
    const maxSize = 52428800; // 50MB en octets
    const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    
    for (let file of files) {
        if (file.size > maxSize) {
            alert(`L'image ${file.name} dépasse la taille maximale autorisée de 50MB`);
            return;
        }
        if (!allowedTypes.includes(file.type)) {
            alert(`Le format de l'image ${file.name} n'est pas autorisé. Utilisez JPG, PNG ou WEBP`);
            return;
        }
    }

    fetch('?p=vehicules&action=add', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Véhicule ajouté avec succès !');
            location.reload();
        } else {
            location.reload(); // Simplement recharger la page sans message d'erreur
        }
    })
    .catch(error => {
        location.reload(); // En cas d'erreur, simplement recharger la page
    });
});

// Gestion du formulaire d'ajout d'utilisateur
document.addEventListener('DOMContentLoaded', function() {
    const addUserForm = document.getElementById('addUserForm');
    if (addUserForm) {
        addUserForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('?p=utilisateurs', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Erreur lors de l\'ajout de l\'utilisateur');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Une erreur est survenue');
            });
        });
    }
});

function toggleUserPanel(button) {
    // Ferme tous les autres panneaux ouverts
    document.querySelectorAll('.user-panel-row.active').forEach(row => {
        if (row !== button.closest('tr').nextElementSibling) {
            row.classList.remove('active');
            row.style.display = 'none';
            row.querySelector('.user-panel').classList.remove('open');
            row.querySelector('.user-panel-content').classList.remove('show');
        }
    });

    const panelRow = button.closest('tr').nextElementSibling;
    const panel = panelRow.querySelector('.user-panel');
    const content = panelRow.querySelector('.user-panel-content');

    if (panelRow.style.display === 'none') {
        // Ouvre le panneau
        panelRow.style.display = 'table-row';
        panelRow.classList.add('active');
        
        // Ajouter un petit délai pour l'animation
        setTimeout(() => {
            panel.classList.add('open');
            content.classList.add('show');
        }, 50);
    } else {
        // Ferme le panneau
        panel.classList.remove('open');
        content.classList.remove('show');
        setTimeout(() => {
            panelRow.classList.remove('active');
            panelRow.style.display = 'none';
        }, 300);
    }
}

function toggleEditForm(element, show) {
    const panel = element.closest('.user-panel');
    const editForm = panel.querySelector('.edit-form');
    const button = panel.closest('tr').previousElementSibling.querySelector('.btn-edit');
    
    if (show) {
        editForm.style.display = 'block';
        // Pré-remplir le formulaire avec les données existantes
        const userName = button.getAttribute('data-user-name').split(' ');
        const userEmail = button.getAttribute('data-user-email');
        
        editForm.querySelector('#edit_nom').value = userName[0];
        editForm.querySelector('#edit_prenom').value = userName[1];
        editForm.querySelector('#edit_email').value = userEmail;
    } else {
        editForm.style.display = 'none';
    }
}