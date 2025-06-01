$(document).ready(function() {
    console.log('JavaScript chargé !'); // Test de chargement

    // Gestion de la soumission du formulaire de connexion
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        const username = $('#username').val().trim();
        const password = $('#password').val().trim();
        const remember = $('#remember').is(':checked');
        
        // Validation basique
        if (!username || !password) {
            alert('Veuillez remplir tous les champs');
            return;
        }
        
        // Envoi des données au serveur
        $.ajax({
            url: '/login',
            method: 'POST',
            data: {
                username: username,
                password: password,
                remember: remember
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = '/dashboard';
                } else {
                    alert(response.message || 'Erreur de connexion');
                }
            },
            error: function() {
                alert('Une erreur est survenue. Veuillez réessayer.');
            }
        });
    });
    
    // Animation des champs de formulaire
    $('.form-control').on('focus', function() {
        $(this).parent('.form-group').addClass('focused');
    }).on('blur', function() {
        if (!$(this).val()) {
            $(this).parent('.form-group').removeClass('focused');
        }
    });

    // Gestion du toggle de la sidebar
    $('.btn-toggle-sidebar').on('click', function() {
        $('.sidebar').toggleClass('show');
    });

    // Fermer la sidebar en cliquant en dehors
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.sidebar, .btn-toggle-sidebar').length) {
            $('.sidebar').removeClass('show');
        }
    });

    // Gestion des notifications et messages
    $('.btn-action').on('click', function() {
        // À implémenter : affichage des notifications/messages
        alert('Fonctionnalité à venir');
    });

    // Gestion de la recherche
    let searchTimeout;
    $('.header-search input').on('keyup', function() {
        clearTimeout(searchTimeout);
        const searchValue = $(this).val();
        
        searchTimeout = setTimeout(function() {
            // À implémenter : logique de recherche
            console.log('Recherche :', searchValue);
        }, 500);
    });

    // Gestion du second contact dans le formulaire client
    console.log('Initialisation du gestionnaire de second contact'); // Debug
    
    $('#toggleSecondContact').on('click', function() {
        console.log('Clic sur le bouton détecté'); // Debug
        const section = $('#secondContactSection');
        
        if (section.length === 0) {
            console.log('Section non trouvée !'); // Debug
            return;
        }
        
        if (section.is(':visible')) {
            console.log('Masquage de la section'); // Debug
            section.hide();
            $(this).html('<i class="fas fa-plus me-2"></i>Ajouter un second contact');
        } else {
            console.log('Affichage de la section'); // Debug
            section.show();
            $(this).html('<i class="fas fa-minus me-2"></i>Retirer le second contact');
        }
    });

    // Validation du formulaire client avec gestion améliorée des erreurs
    $('#addClientForm').on('submit', function(e) {
        e.preventDefault();
        
        // Validation du formulaire
        let isValid = true;
        
        // Champs requis pour le contact principal
        const requiredFields = [
            'nom_client_1',
            'prenom_client_1',
            'email_client_1',
            'telephone_client_1',
            'rue',
            'code_postal',
            'ville',
            'pays'
        ];

        // Vérification des champs requis
        requiredFields.forEach(field => {
            const input = $(`[name="${field}"]`);
            if (!input.val().trim()) {
                isValid = false;
                input.addClass('is-invalid');
                input.next('.invalid-feedback').remove();
                input.after(`<div class="invalid-feedback">Ce champ est requis</div>`);
            } else {
                input.removeClass('is-invalid');
                input.next('.invalid-feedback').remove();
            }
        });

        // Si le second contact est visible, vérifier ses champs
        if ($('#secondContactSection').is(':visible')) {
            const secondContactFields = [
                'nom_client_2',
                'prenom_client_2',
                'email_client_2',
                'telephone_client_2'
            ];

            secondContactFields.forEach(field => {
                const input = $(`[name="${field}"]`);
                if (!input.val().trim()) {
                    isValid = false;
                    input.addClass('is-invalid');
                    input.next('.invalid-feedback').remove();
                    input.after(`<div class="invalid-feedback">Ce champ est requis pour le second contact</div>`);
                } else {
                    input.removeClass('is-invalid');
                    input.next('.invalid-feedback').remove();
                }
            });
        }

        if (!isValid) {
            return false;
        }

        // Soumettre le formulaire normalement
        this.submit();
    });

    // Gestion de l'ajout d'une marque
    $('#addMarqueForm').on('submit', function(e) {
        const nomMarque = $('#nomMarque').val().trim();
        
        // Validation basique
        if (!nomMarque) {
            e.preventDefault();
            alert('Veuillez saisir un nom de marque');
            return false;
        }
        
        // Le formulaire sera soumis normalement
        return true;
    });

    // Gestion de la suppression d'une marque
    $('.delete-marque').on('click', function(e) {
        e.preventDefault();
        
        const id_marque = $(this).data('id');
        const nomMarque = $(this).closest('.config-item').find('.item-name').text();
        
        // Mise à jour du modal avec les informations de la marque
        $('#marqueToDelete').text(nomMarque);
        $('#deleteMarqueId').val(id_marque);
        
        // Affichage du modal avec animation
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteMarqueModal'));
        deleteModal.show();
    });

    // Animation du modal de suppression
    $('#deleteMarqueModal').on('show.bs.modal', function() {
        $(this).find('.modal-content')
            .css('transform', 'scale(0.7)')
            .animate({ transform: 'scale(1)' }, 200);
    });

    // Effet de shake sur le bouton de suppression au survol
    $('#deleteMarqueModal .btn-danger').hover(
        function() {
            $(this).addClass('animate__animated animate__headShake');
        },
        function() {
            $(this).removeClass('animate__animated animate__headShake');
        }
    );

    // Gestion de la soumission du formulaire de suppression
    $('#deleteMarqueForm').on('submit', function() {
        const btn = $(this).find('button[type="submit"]');
        btn.prop('disabled', true)
           .html('<i class="fas fa-spinner fa-spin me-2"></i>Suppression...');
    });

    // Gestion du toggle du second contact dans le modal d'édition
    $('#editClientModal #toggleSecondContact').on('click', function() {
        const section = $('#editClientModal #secondContactSection');
        const icon = $(this).find('i');
        
        if (section.hasClass('d-none')) {
            section.removeClass('d-none').addClass('show');
            icon.removeClass('fa-plus').addClass('fa-minus');
            $(this).html('<i class="fas fa-minus me-2"></i>Retirer le second contact');
        } else {
            section.removeClass('show').addClass('d-none');
            icon.removeClass('fa-minus').addClass('fa-plus');
            $(this).html('<i class="fas fa-plus me-2"></i>Ajouter un second contact');
            
            // Réinitialiser les champs du second contact
            $('#nom_client_2, #prenom_client_2, #email_client_2, #telephone_client_2').val('');
        }
    });

    // Validation du formulaire d'édition du client
    $('#editClientForm').on('submit', function(e) {
        let isValid = true;
        
        // Validation des champs requis
        const requiredFields = [
            'nom_client_1',
            'prenom_client_1',
            'email_client_1',
            'telephone_client_1',
            'rue',
            'code_postal',
            'ville',
            'pays'
        ];

        // Vérification des champs requis
        requiredFields.forEach(field => {
            const input = $(`#${field}`);
            if (!input.val().trim()) {
                isValid = false;
                input.addClass('is-invalid');
                if (!input.next('.invalid-feedback').length) {
                    input.after(`<div class="invalid-feedback">Ce champ est requis</div>`);
                }
            } else {
                input.removeClass('is-invalid');
                input.next('.invalid-feedback').remove();
            }
        });

        // Validation du second contact si visible
        if (!$('#secondContactSection').hasClass('d-none')) {
            const secondContactFields = [
                'nom_client_2',
                'prenom_client_2',
                'email_client_2',
                'telephone_client_2'
            ];

            secondContactFields.forEach(field => {
                const input = $(`#${field}`);
                if (!input.val().trim()) {
                    isValid = false;
                    input.addClass('is-invalid');
                    if (!input.next('.invalid-feedback').length) {
                        input.after(`<div class="invalid-feedback">Ce champ est requis pour le second contact</div>`);
                    }
                } else {
                    input.removeClass('is-invalid');
                    input.next('.invalid-feedback').remove();
                }
            });
        }

        if (!isValid) {
            e.preventDefault();
        }
    });

    // Gestion de la recherche d'utilisateurs
    $('#userSearchInput').on('keyup', function() {
        const searchValue = $(this).val().toLowerCase();
        
        $('.users-list tbody tr').each(function() {
            const userName = $(this).find('.user-name').text().toLowerCase();
            const userEmail = $(this).find('.contact-item').text().toLowerCase();
            const userRole = $(this).find('.role-badge').text().toLowerCase();
            const userLogin = $(this).find('.user-username').text().toLowerCase();
            
            if (userName.includes(searchValue) || 
                userEmail.includes(searchValue) || 
                userRole.includes(searchValue) || 
                userLogin.includes(searchValue)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        
        // Afficher ou masquer le message "Aucun résultat"
        const visibleRows = $('.users-list tbody tr:visible').length;
        if (visibleRows === 0) {
            if (!$('.no-results-message').length) {
                $('.users-list tbody').append(`
                    <tr class="no-results-message">
                        <td colspan="5" class="text-center table-cell">
                            <div class="text-center py-4">
                                <i class="fas fa-search fa-3x mb-3 text-light"></i>
                                <p class="text-light">Aucun utilisateur trouvé pour "${searchValue}"</p>
                            </div>
                        </td>
                    </tr>
                `);
            }
        } else {
            $('.no-results-message').remove();
        }
    });

    // Réinitialisation de la recherche quand on efface le champ
    $('#userSearchInput').on('search', function() {
        if (!$(this).val()) {
            $('.users-list tbody tr').show();
            $('.no-results-message').remove();
        }
    });
});

// Configuration des graphiques
document.addEventListener('DOMContentLoaded', function() {
    // Vérifier l'existence des éléments canvas
    const salesCanvas = document.getElementById('salesChart');
    const brandsCanvas = document.getElementById('brandsChart');

    // Initialiser le graphique des ventes si l'élément existe
    if (salesCanvas) {
        const salesCtx = salesCanvas.getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Ventes 2024',
                    data: [25, 30, 28, 35, 32, 28],
                    borderColor: '#3498DB',
                    backgroundColor: 'rgba(52, 152, 219, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#ECF0F1'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#ECF0F1'
                        }
                    }
                }
            }
        });
    }

    // Initialiser le graphique des marques si l'élément existe
    if (brandsCanvas) {
        const brandsCtx = brandsCanvas.getContext('2d');
        new Chart(brandsCtx, {
            type: 'doughnut',
            data: {
                labels: ['BMW', 'Audi', 'Mercedes', 'Volkswagen'],
                datasets: [{
                    data: [30, 25, 20, 15],
                    backgroundColor: [
                        '#3498DB',
                        '#2ECC71',
                        '#E74C3C',
                        '#F1C40F'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#ECF0F1',
                            padding: 20
                        }
                    }
                }
            }
        });
    }
});

// Gestion de la vente de véhicule
document.addEventListener('DOMContentLoaded', function() {
    const sellVehicleModal = document.getElementById('sellVehicleModal');
    if (!sellVehicleModal) return;

    const clientSearch = document.getElementById('clientSearch');
    const clientsResults = document.getElementById('clientsResults');
    const selectedClientInfo = document.getElementById('selectedClientInfo');
    const confirmSaleBtn = document.getElementById('confirmSaleBtn');
    let selectedClientId = null;
    let searchTimeout = null;

    // Fonction de recherche de clients
    function searchClients(query) {
        console.log('Recherche de clients:', query);
        
        const url = `?p=vehicule&api=searchClients&q=${encodeURIComponent(query)}`;
        console.log('URL de recherche:', url);

        fetch(url)
            .then(response => response.text())
            .then(text => {
                // Trouver le début du JSON (premier '{')
                const jsonStart = text.indexOf('{');
                if (jsonStart === -1) {
                    throw new Error('Aucun JSON trouvé dans la réponse');
                }
                // Extraire uniquement la partie JSON
                const jsonText = text.substring(jsonStart);
                console.log('JSON extrait:', jsonText);
                return JSON.parse(jsonText);
            })
            .then(data => {
                clientsResults.innerHTML = '';
                if (!data.success) {
                    throw new Error(data.error || 'Erreur lors de la recherche');
                }
                
                if (data.clients && data.clients.length > 0) {
                    data.clients.forEach(client => {
                        const clientElement = document.createElement('div');
                        clientElement.className = 'client-result-item';
                        clientElement.innerHTML = `
                            <div class="client-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="client-info">
                                <span class="client-name">${client.nom_client_1} ${client.prenom_client_1}</span>
                                <div class="client-details">
                                    <span><i class="fas fa-envelope"></i>${client.email_client_1}</span>
                                    <span><i class="fas fa-phone"></i>${client.telephone_client_1}</span>
                                </div>
                            </div>
                        `;
                        clientElement.addEventListener('click', () => selectClient(client));
                        clientsResults.appendChild(clientElement);
                    });
                } else {
                    clientsResults.innerHTML = '<div class="text-center p-3">Aucun client trouvé</div>';
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                clientsResults.innerHTML = `<div class="text-center p-3 text-danger">Erreur: ${error.message}</div>`;
            });
    }

    // Fonction pour sélectionner un client
    function selectClient(client) {
        // Retirer la sélection précédente
        const previousSelected = document.querySelector('.client-result-item.selected');
        if (previousSelected) {
            previousSelected.classList.remove('selected');
        }

        // Ajouter la classe selected au client cliqué
        const clientElement = event.currentTarget;
        clientElement.classList.add('selected');

        // Afficher les informations du client sélectionné
        const selectedClientInfo = document.getElementById('selectedClientInfo');
        selectedClientInfo.style.display = 'block';
        selectedClientInfo.querySelector('.client-name').textContent = `${client.nom_client_1} ${client.prenom_client_1}`;
        selectedClientInfo.querySelector('.client-email').textContent = client.email_client_1;

        // Activer le bouton de confirmation
        const confirmSaleBtn = document.getElementById('confirmSaleBtn');
        confirmSaleBtn.disabled = false;
        confirmSaleBtn.onclick = () => {
            // Récupérer l'ID du véhicule depuis l'URL
            const urlParams = new URLSearchParams(window.location.search);
            const vehiculeId = urlParams.get('id');

            // Envoyer la requête pour marquer le véhicule comme vendu
            fetch(`?p=vehicule&api=sellVehicle`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id_vehicule=${vehiculeId}&id_client=${client.id_client}`
            })
            .then(response => response.text())
            .then(text => {
                const jsonStart = text.indexOf('{');
                if (jsonStart === -1) {
                    throw new Error('Aucun JSON trouvé dans la réponse');
                }
                return JSON.parse(text.substring(jsonStart));
            })
            .then(data => {
                if (data.success) {
                    // Recharger la page pour afficher les changements
                    window.location.reload();
                } else {
                    throw new Error(data.error || 'Erreur lors de la vente');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de la vente du véhicule: ' + error.message);
            });
        };
    }

    // Événement de recherche
    clientSearch.addEventListener('input', (e) => {
        clearTimeout(searchTimeout);
        const query = e.target.value.trim();
        
        if (query.length < 2) {
            clientsResults.innerHTML = '';
            return;
        }

        searchTimeout = setTimeout(() => searchClients(query), 300);
    });

    // Événement de confirmation de la vente
    confirmSaleBtn.addEventListener('click', () => {
        if (!selectedClientId) return;

        const vehiculeId = new URLSearchParams(window.location.search).get('id');
        if (!vehiculeId) return;

        const formData = new FormData();
        formData.append('action', 'sellVehicle');
        formData.append('id_vehicule', vehiculeId);
        formData.append('id_client', selectedClientId);

        fetch('?p=vehicule', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Recharger la page pour afficher les changements
                window.location.reload();
            } else {
                throw new Error(data.error || 'Erreur lors de la vente');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Une erreur est survenue lors de la vente du véhicule');
        });
    });

    // Réinitialisation du modal à la fermeture
    sellVehicleModal.addEventListener('hidden.bs.modal', () => {
        clientSearch.value = '';
        clientsResults.innerHTML = '';
        selectedClientInfo.style.display = 'none';
        selectedClientId = null;
        confirmSaleBtn.disabled = true;
    });
});

// Gestion des véhicules
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour changer l'image principale
    window.changeMainImage = function(url, alt) {
        const mainImage = document.getElementById('mainImage');
        if (mainImage) {
            mainImage.src = url;
            mainImage.alt = alt;
        }
    };

    // Gestion de la modification du véhicule
    const saveVehicleBtn = document.getElementById('saveVehicleBtn');
    if (saveVehicleBtn) {
        saveVehicleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const form = document.getElementById('editVehicleForm');
            const formData = new FormData(form);
            const vehiculeId = form.getAttribute('data-vehicule-id');
            formData.append('id_vehicule', vehiculeId);

            // Récupération des options cochées
            const checkedOptions = [];
            form.querySelectorAll('input[name="options[]"]:checked').forEach(checkbox => {
                checkedOptions.push(checkbox.value);
            });
            formData.delete('options[]');
            checkedOptions.forEach(optionId => {
                formData.append('options[]', optionId);
            });

            // Envoi de la requête
            fetch(`?p=vehicule&id=${vehiculeId}&api=updateVehicle`, {
                method: 'POST',
                body: formData
            });
        });
    }
});

// Gestion des options
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la recherche avec animation
    const searchInput = document.getElementById('searchOption');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('.options-list tbody tr');
            
            rows.forEach(row => {
                const optionName = row.querySelector('.option-name span')?.textContent.toLowerCase();
                if (optionName) {
                    if (optionName.includes(searchText)) {
                        row.style.display = '';
                        row.classList.add('animate__animated', 'animate__fadeIn');
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    }

    // Gestion du modal de suppression avec animation
    const deleteModal = document.getElementById('deleteOptionModal');
    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nom = button.getAttribute('data-nom');
            
            this.querySelector('#deleteOptionId').value = id;
            this.querySelector('#deleteOptionName').textContent = nom;
        });
    }

    // Animation des boutons d'action
    document.querySelectorAll('.btn-icon').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.classList.add('animate__animated', 'animate__pulse');
        });
        
        btn.addEventListener('animationend', function() {
            this.classList.remove('animate__animated', 'animate__pulse');
        });
    });
});

// Gestion des clients
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la recherche
    const searchInput = document.getElementById('searchClient');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('.clients-list tbody tr');
            
            rows.forEach(row => {
                const clientName = row.querySelector('.client-name')?.textContent.toLowerCase();
                const clientEmail = row.querySelector('.contact-item')?.textContent.toLowerCase();
                const clientAddress = row.querySelector('.client-address')?.textContent.toLowerCase();
                
                if (clientName && clientEmail && clientAddress) {
                    if (clientName.includes(searchText) || clientEmail.includes(searchText) || clientAddress.includes(searchText)) {
                        row.style.display = '';
                        row.classList.add('animate__animated', 'animate__fadeIn');
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    }

    // Gestion du second contact
    const toggleButton = document.getElementById('toggleSecondContact');
    const secondContactSection = document.getElementById('secondContactSection');
    
    if (toggleButton && secondContactSection) {
        toggleButton.addEventListener('click', function() {
            const isVisible = secondContactSection.style.display !== 'none';
            
            if (isVisible) {
                secondContactSection.style.display = 'none';
                this.innerHTML = '<i class="fas fa-plus me-2"></i>Ajouter un second contact';
                
                // Réinitialiser les champs
                const inputs = secondContactSection.querySelectorAll('input');
                inputs.forEach(input => input.value = '');
            } else {
                secondContactSection.style.display = 'block';
                this.innerHTML = '<i class="fas fa-minus me-2"></i>Retirer le second contact';
            }
        });
    }

    // Animation des boutons d'action
    document.querySelectorAll('.btn-icon').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.classList.add('animate__animated', 'animate__pulse');
        });
        
        btn.addEventListener('animationend', function() {
            this.classList.remove('animate__animated', 'animate__pulse');
        });
    });
});

// Gestion de la configuration
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la recherche pour les marques
    const searchMarque = document.getElementById('searchMarque');
    if (searchMarque) {
        searchMarque.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const marqueItems = document.querySelectorAll('#marquesList .config-item');
            
            marqueItems.forEach(item => {
                const marqueNom = item.querySelector('.item-name').textContent.toLowerCase();
                if (marqueNom.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }

    // Gestion de la recherche pour les modèles
    const searchModele = document.getElementById('searchModele');
    if (searchModele) {
        searchModele.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const marqueGroups = document.querySelectorAll('.marque-group');
            
            marqueGroups.forEach(group => {
                let hasVisibleModels = false;
                const modeleItems = group.querySelectorAll('.config-item');
                
                modeleItems.forEach(item => {
                    const modeleName = item.querySelector('.item-name').textContent.toLowerCase();
                    if (modeleName.includes(searchTerm)) {
                        item.style.display = '';
                        hasVisibleModels = true;
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                group.style.display = hasVisibleModels ? '' : 'none';
            });
        });
    }

    // Gestion de la recherche pour les générations
    const searchGeneration = document.getElementById('searchGeneration');
    if (searchGeneration) {
        searchGeneration.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const generationGroups = document.querySelectorAll('.generation-group');
            
            generationGroups.forEach(group => {
                let hasVisibleGenerations = false;
                const generationItems = group.querySelectorAll('.config-item');
                
                generationItems.forEach(item => {
                    const generationName = item.querySelector('.item-name').textContent.toLowerCase();
                    if (generationName.includes(searchTerm)) {
                        item.style.display = '';
                        hasVisibleGenerations = true;
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                group.style.display = hasVisibleGenerations ? '' : 'none';
            });
        });
    }

    // Gestion des sélecteurs en cascade pour l'ajout de génération
    const marqueSelect = document.getElementById('marqueGeneration');
    const modeleSelect = document.getElementById('modeleGeneration');
    
    if (marqueSelect && modeleSelect) {
        marqueSelect.addEventListener('change', function() {
            const marqueId = this.value;
            modeleSelect.disabled = !marqueId;
            
            if (!marqueId) {
                modeleSelect.innerHTML = '<option value="">Sélectionner d\'abord une marque</option>';
                return;
            }

            // Récupération des modèles pour la marque sélectionnée
            fetch('index.php?p=config&action=getModeles&marque=' + marqueId)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur réseau');
                    }
                    return response.text();
                })
                .then(text => {
                    try {
                        return JSON.parse(text);
                    } catch (e) {
                        console.error('Réponse brute du serveur:', text);
                        throw new Error('Réponse invalide du serveur');
                    }
                })
                .then(data => {
                    if (!data.success) {
                        throw new Error(data.error || 'Erreur serveur');
                    }
                    
                    modeleSelect.innerHTML = '<option value="">Sélectionner un modèle</option>';
                    
                    if (Array.isArray(data.modeles)) {
                        data.modeles.forEach(modele => {
                            const option = document.createElement('option');
                            option.value = modele.id_modele;
                            option.textContent = modele.nom_modele;
                            modeleSelect.appendChild(option);
                        });
                        modeleSelect.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Erreur lors du chargement des modèles:', error);
                    modeleSelect.innerHTML = '<option value="">Erreur lors du chargement</option>';
                    modeleSelect.disabled = true;
                });
        });
    }

    // Gestion du modal de suppression de génération
    const deleteGenerationModal = document.getElementById('deleteGenerationModal');
    if (deleteGenerationModal) {
        deleteGenerationModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const generationId = button.getAttribute('data-generation-id');
            const generationName = button.getAttribute('data-generation-nom');
            
            document.getElementById('deleteGenerationId').value = generationId;
            document.getElementById('generationToDelete').textContent = generationName;
        });
    }

    // Gestion du modal de suppression de modèle
    const deleteModeleModal = document.getElementById('deleteModeleModal');
    if (deleteModeleModal) {
        deleteModeleModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const modeleId = button.getAttribute('data-modele-id');
            const modeleName = button.getAttribute('data-modele-nom');
            
            document.getElementById('deleteModeleId').value = modeleId;
            document.getElementById('modeleToDelete').textContent = modeleName;
        });

        // Gestion de la soumission du formulaire de suppression
        const deleteModeleForm = document.getElementById('deleteModeleForm');
        if (deleteModeleForm) {
            deleteModeleForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const modeleId = document.getElementById('deleteModeleId').value;
                
                // Vérification des données avant envoi
                console.log('ID du modèle à supprimer:', modeleId);
                console.log('Action:', formData.get('action'));
                
                fetch('?p=config', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur réseau');
                    }
                    // Fermer le modal
                    const modal = bootstrap.Modal.getInstance(deleteModeleModal);
                    if (modal) {
                        modal.hide();
                    }
                    // Recharger la page
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Erreur lors de la suppression:', error);
                    // Recharger la page même en cas d'erreur
                    window.location.reload();
                });
            });
        }
    }
});

// Gestion des statistiques
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('brandsChart')?.getContext('2d');
    if (ctx && window.chartData) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: window.chartData.labels,
                datasets: [{
                    label: 'Nombre de véhicules',
                    data: window.chartData.values,
                    backgroundColor: 'rgba(52, 152, 219, 0.8)',
                    borderColor: 'rgba(52, 152, 219, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#ffffff',
                            stepSize: 1,
                            precision: 0
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#ffffff',
                            maxRotation: 45,
                            minRotation: 45
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        }
                    }
                }
            }
        });
    }
});

// Gestion des sélecteurs en cascade pour les véhicules
function initVehiculeSelects() {
    // Vérifier si les éléments existent
    var $marque = $('#marque');
    var $modele = $('#modele');
    var $generation = $('#generation');

    if (!$marque.length || !$modele.length || !$generation.length) {
        console.log('Sélecteurs non trouvés');
        return;
    }

    console.log('Sélecteurs trouvés, initialisation...');

    // Événement changement de marque
    $marque.off('change').on('change', function() {
        var marqueId = $(this).val();
        
        // Réinitialiser les autres sélecteurs
        $modele.empty().append('<option value="">Sélectionnez un modèle</option>').prop('disabled', !marqueId);
        $generation.empty().append('<option value="">Sélectionnez une génération</option>').prop('disabled', true);

        if (marqueId) {
            // Charger les modèles
            $.ajax({
                url: '?p=vehicules&action=getModeles',
                method: 'GET',
                data: { marque: marqueId },
                dataType: 'json',
                success: function(response) {
                    if (response.success && Array.isArray(response.modeles)) {
                        // Vider d'abord le select
                        $modele.find('option:not(:first)').remove();
                        
                        response.modeles.forEach(function(modele) {
                            $modele.append(
                                $('<option></option>')
                                    .val(modele.id_modele)
                                    .text(modele.nom_modele)
                            );
                        });
                        $modele.prop('disabled', false);
                    } else {
                        console.error('Format de réponse invalide:', response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erreur lors du chargement des modèles:', error);
                    console.error('Status:', status);
                    console.error('Response:', xhr.responseText);
                }
            });
        }
    });

    // Événement changement de modèle
    $modele.off('change').on('change', function() {
        var modeleId = $(this).val();
        var marqueId = $marque.val();
        console.log('Modèle sélectionné:', modeleId, 'pour marque:', marqueId);

        // Réinitialiser le sélecteur de génération
        $generation.empty().append('<option value="">Sélectionner une génération</option>').prop('disabled', !modeleId);

        if (modeleId && marqueId) {
            // Charger les générations
            $.ajax({
                url: '?p=vehicules&action=getGenerations',
                method: 'GET',
                dataType: 'json',
                data: { 
                    modele: modeleId
                },
                beforeSend: function() {
                    console.log('Envoi de la requête pour les générations...');
                },
                success: function(response) {
                    console.log('Réponse reçue:', response);
                    
                    if (response.success && Array.isArray(response.generations)) {
                        response.generations.forEach(function(generation) {
                            $generation.append(
                                $('<option></option>')
                                    .val(generation.id_generation)
                                    .text(generation.nom_generation)
                            );
                        });
                        $generation.prop('disabled', false);
                        console.log('Générations chargées avec succès');
                    } else {
                        console.error('Format de réponse invalide:', response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erreur lors du chargement des générations:', error);
                    console.error('Error:', error);
                    if (xhr.responseText) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            console.error('Parsed error:', response);
                        } catch(e) {
                            console.error('Response brute:', xhr.responseText);
                        }
                    }
                }
            });
        }
    });

    console.log('Initialisation terminée');
}

// Initialiser les sélecteurs une fois que la page est chargée
$(document).ready(function() {
    // Supprimer tous les gestionnaires d'événements existants
    $('#marque, #modele, #generation').off();
    // Initialiser les sélecteurs
    initVehiculeSelects();
});