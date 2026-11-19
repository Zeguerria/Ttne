
{{-- ==========================================================
     STEEP 2 — PERSONNALISATION DU GROUPE
========================================================== --}}

<section class="steep-2">
    <div class="steep-02">

        <div class="container-fluid">
            <div class="row p-2 community-step2-row">

                {{-- EN-TETE --}}
                <div class="col-12">
                    <div class="community-section-heading">
                        <div>
                            <i class="fa fa-magic"></i>
                            <span>Personnalisation du groupe</span>
                        </div>

                        <small>
                            Choisissez une identité visuelle qui permettra
                            à votre communauté de se distinguer.
                        </small>
                    </div>
                </div>

                {{-- APERCU DE L'ICONE --}}
                <div class="col-12">
                    <div class="community-icon-preview-panel">

                        <div class="community-icon-preview">
                            <div class="community-icon-preview-circle">
                                <i class="fa fa-users" id="selectedGroupIconPreview"></i>
                            </div>
                        </div>

                        <div class="community-icon-preview-details">
                            <span class="community-preview-overline">
                                IDENTITÉ VISUELLE
                            </span>

                            <strong>Apparence de votre groupe</strong>

                            <p id="selectedGroupIconLabel">
                                Icône sélectionnée : Communauté
                            </p>
                        </div>

                        <div class="community-preview-status">
                            <i class="fa fa-check-circle"></i>
                            <span>Personnalisable</span>
                        </div>

                    </div>
                </div>

                {{-- VALEUR TRANSMISE AU FORMULAIRE --}}
                <input
                    type="hidden"
                    name="icone"
                    id="selectedGroupIcon"
                    value="fa-users"
                >

                {{-- OUVRIR LA BIBLIOTHEQUE D'ICONES --}}
                <div class="col-12">
                    <div class="community-icon-library-access">

                        <div class="community-icon-library-access-info">
                            <span class="community-preview-overline">
                                PERSONNALISATION
                            </span>

                            <strong>
                                Choisissez le symbole de votre communauté
                            </strong>

                            <small>
                                La bibliothèque s'ouvre uniquement lorsque vous souhaitez
                                rechercher ou changer votre icône.
                            </small>
                        </div>

                        <button
                            type="button"
                            class="community-icon-open-library"
                            data-open-icon-library
                        >
                            <i class="fa fa-th-large"></i>
                            <span>Parcourir les icônes</span>
                            <i class="fa fa-arrow-right"></i>
                        </button>

                    </div>
                </div>

                {{-- BIBLIOTHEQUE D'ICONES : MODALE --}}
                <div
                    class="community-icon-modal"
                    id="communityIconModal"
                    aria-hidden="true"
                >
                    <div
                        class="community-icon-modal-backdrop"
                        data-close-icon-library
                    ></div>

                    <div
                        class="community-icon-modal-dialog"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="communityIconModalTitle"
                    >

                        {{-- EN-TETE DE LA MODALE --}}
                        <div class="community-icon-modal-header">
                            <div>
                                <span class="community-preview-overline">
                                    BIBLIOTHEQUE
                                </span>

                                <h3 id="communityIconModalTitle">
                                    Choisir une icône
                                </h3>

                                <p>
                                    Recherchez un symbole ou explorez les catégories.
                                </p>
                            </div>

                            <button
                                type="button"
                                class="community-icon-modal-close"
                                data-close-icon-library
                                aria-label="Fermer"
                            >
                                <i class="fa fa-times"></i>
                            </button>
                        </div>

                        {{-- RECHERCHE --}}
                        <div class="community-icon-modal-search">
                            <i class="fa fa-search"></i>

                            <input
                                type="search"
                                id="groupIconSearch"
                                placeholder="Rechercher : entraide, famille, éducation..."
                                autocomplete="off"
                            >

                            <span class="community-search-shortcut">
                                <i class="fa fa-keyboard-o"></i>
                            </span>
                        </div>

                        {{-- CATEGORIES --}}
                        <div
                            class="community-icon-categories"
                            aria-label="Catégories d'icônes"
                        >
                            <button
                                type="button"
                                class="community-icon-category active"
                                data-icon-category="all"
                            >
                                Tout
                            </button>

                            <button
                                type="button"
                                class="community-icon-category"
                                data-icon-category="communaute"
                            >
                                Communauté
                            </button>

                            <button
                                type="button"
                                class="community-icon-category"
                                data-icon-category="solidarite"
                            >
                                Solidarité
                            </button>

                            <button
                                type="button"
                                class="community-icon-category"
                                data-icon-category="famille"
                            >
                                Famille
                            </button>

                            <button
                                type="button"
                                class="community-icon-category"
                                data-icon-category="professionnel"
                            >
                                Professionnel
                            </button>

                            <button
                                type="button"
                                class="community-icon-category"
                                data-icon-category="education"
                            >
                                Éducation
                            </button>

                            <button
                                type="button"
                                class="community-icon-category"
                                data-icon-category="reussite"
                            >
                                Réussite
                            </button>

                            <button
                                type="button"
                                class="community-icon-category"
                                data-icon-category="protection"
                            >
                                Protection
                            </button>

                            <button
                                type="button"
                                class="community-icon-category"
                                data-icon-category="nature"
                            >
                                Nature
                            </button>

                            <button
                                type="button"
                                class="community-icon-category"
                                data-icon-category="divers"
                            >
                                Divers
                            </button>
                        </div>

                        {{-- TITRE DES RESULTATS --}}
                        <div class="community-icon-modal-results-heading">
                            <span>Icônes disponibles</span>

                            <span>
                                <b id="groupIconVisibleCount">0</b>
                                résultat(s)
                            </span>
                        </div>

                        {{-- BIBLIOTHEQUE DYNAMIQUE --}}
                        {{-- Les icônes sont transmises par le contrôleur via $groupIcons. --}}
                        <div
                            class="community-icon-selector"
                            id="groupIconSelector"
                        >

                            @foreach($groupIcons as $icon)
                                <label
                                    class="community-icon-option"
                                    data-icon-category="{{ $icon['category'] }}"
                                    data-icon-search="{{ strtolower($icon['label'] . ' ' . $icon['keywords'] . ' ' . $icon['value']) }}"
                                    title="{{ $icon['label'] }}"
                                >
                                    <input
                                        type="radio"
                                        name="icone_selection"
                                        value="{{ $icon['value'] }}"
                                        data-icon-label="{{ $icon['label'] }}"
                                    >

                                    <span class="community-icon-option-content">
                                        <i class="fa {{ $icon['value'] }}"></i>
                                        <small>{{ $icon['label'] }}</small>
                                    </span>
                                </label>
                            @endforeach

                            {{-- AUCUN RESULTAT --}}
                            <div
                                class="community-icon-no-result"
                                id="groupIconNoResult"
                                style="display:none;"
                            >
                                <i class="fa fa-search"></i>

                                <strong>
                                    Aucune icône trouvée
                                </strong>

                                <small>
                                    Essayez un autre mot-clé ou une autre catégorie.
                                </small>
                            </div>

                        </div>

                        {{-- PIED DE LA MODALE --}}
                        <div class="community-icon-modal-footer">

                            <div class="community-icon-modal-selection">
                                <span class="community-icon-modal-selection-preview">
                                    <i
                                        class="fa fa-users"
                                        id="groupIconModalPreview"
                                    ></i>
                                </span>

                                <span>
                                    <small>Votre choix</small>
                                    <strong id="groupIconModalLabel">
                                        Communauté
                                    </strong>
                                </span>
                            </div>

                            <div class="community-icon-modal-actions">

                                <button
                                    type="button"
                                    class="community-icon-cancel"
                                    data-close-icon-library
                                >
                                    Annuler
                                </button>

                                <button
                                    type="button"
                                    class="community-icon-confirm"
                                    id="confirmGroupIcon"
                                >
                                    <i class="fa fa-check"></i>
                                    Confirmer le choix
                                </button>

                            </div>
                        </div>

                    </div>
                </div>

                {{-- INFORMATIONS --}}
                {{--
                <div class="col-12">
                    <div class="futureFinal">
                        <i class="fa fa-picture-o"></i>

                        <h3>
                            Donnez une identité visuelle à votre groupe
                        </h3>

                        <p>
                            Choisissez une icône qui représente l'esprit
                            de votre communauté. Elle permettra de reconnaître
                            facilement votre groupe dans l'espace communautaire.
                        </p>
                    </div>
                </div>
                --}}

            </div>
        </div>

    </div>
</section>

@include('dependances.templates.admins.gestions.communautes.groupes._groupes.modalcreations.cssstep1')


<script>
(function () {
    'use strict';

    function initialiserBibliothequeIcones() {

        const modal = document.getElementById('communityIconModal');
        const selector = document.getElementById('groupIconSelector');
        const hidden = document.getElementById('selectedGroupIcon');
        const preview = document.getElementById('selectedGroupIconPreview');
        const previewLabel = document.getElementById('selectedGroupIconLabel');
        const search = document.getElementById('groupIconSearch');
        const counter = document.getElementById('groupIconVisibleCount');
        const noResult = document.getElementById('groupIconNoResult');
        const modalPreview = document.getElementById('groupIconModalPreview');
        const modalLabel = document.getElementById('groupIconModalLabel');

        // Vérification des éléments indispensables.
        if (!modal || !selector || !hidden || !preview || !search) {
            console.error('Bibliothèque d’icônes : élément HTML introuvable.');
            return;
        }

        // Éviter une double initialisation.
        if (modal.dataset.iconLibraryInitialized === 'true') {
            return;
        }

        modal.dataset.iconLibraryInitialized = 'true';

        // Récupération des icônes générées par Blade.
        const options = Array.from(
            selector.querySelectorAll('.community-icon-option')
        );

        const categories = Array.from(
            modal.querySelectorAll('.community-icon-category')
        );

        let activeCategory = 'all';
        let temporaryValue = hidden.value || 'fa-users';
        let temporaryLabel = 'Communauté';


        // =====================================================
        // NORMALISATION DE LA RECHERCHE
        // Retire les accents pour faciliter la recherche.
        // =====================================================

        function normaliser(texte) {
            return String(texte || '')
                .toLocaleLowerCase('fr')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .trim();
        }


        // =====================================================
        // RETROUVER UNE ICONE
        // =====================================================

        function obtenirOption(valeur) {
            return options.find(function (option) {

                const radio = option.querySelector('input[type="radio"]');

                return radio && radio.value === valeur;

            }) || null;
        }


        // =====================================================
        // MISE A JOUR DU CHOIX TEMPORAIRE
        // =====================================================

        function mettreAJourChoix(option) {

            if (!option) return;

            const radio = option.querySelector('input[type="radio"]');

            if (!radio) return;

            temporaryValue = radio.value;

            const label = option.querySelector('small');

            temporaryLabel =
                radio.dataset.iconLabel ||
                (label ? label.textContent.trim() : 'Icône');

            // Réinitialisation des anciennes sélections.
            options.forEach(function (item) {

                item.classList.remove('selected');

                const input = item.querySelector('input[type="radio"]');

                if (input) {
                    input.checked = false;
                }

            });

            // Activation de la nouvelle sélection.
            option.classList.add('selected');
            radio.checked = true;

            // Aperçu dans la modale.
            if (modalPreview) {
                modalPreview.className = 'fa ' + temporaryValue;
            }

            if (modalLabel) {
                modalLabel.textContent = temporaryLabel;
            }
        }


        // =====================================================
        // RECHERCHE ET FILTRAGE DES ICONES
        // =====================================================

        function filtrerIcones() {

            const recherche = normaliser(search.value);

            let visibles = 0;

            options.forEach(function (option) {

                const categorie = option.dataset.iconCategory || '';

                const motsCles = normaliser(
                    option.dataset.iconSearch || option.textContent
                );

                // Vérifier la correspondance avec la recherche.
                const correspondRecherche =
                    recherche === '' || motsCles.includes(recherche);

                // Vérifier la catégorie sélectionnée.
                const correspondCategorie =
                    activeCategory === 'all' ||
                    categorie === activeCategory;

                const visible =
                    correspondRecherche && correspondCategorie;

                option.classList.toggle('is-filtered', !visible);

                option.setAttribute(
                    'aria-hidden',
                    visible ? 'false' : 'true'
                );

                if (visible) {
                    visibles++;
                }

            });

            // Mise à jour du compteur.
            if (counter) {
                counter.textContent = String(visibles);
            }

            // Affichage du message si aucun résultat.
            if (noResult) {
                noResult.style.display = visibles === 0 ? 'flex' : 'none';
            }
        }


        // =====================================================
        // OUVERTURE DE LA BIBLIOTHEQUE
        // =====================================================

        function ouvrirBibliotheque() {

            const optionActuelle =
                obtenirOption(hidden.value) ||
                obtenirOption('fa-users');

            if (optionActuelle) {
                mettreAJourChoix(optionActuelle);
            }

            // Réinitialiser la catégorie.
            activeCategory = 'all';

            categories.forEach(function (button) {

                button.classList.toggle(
                    'active',
                    button.dataset.iconCategory === 'all'
                );

            });

            // Réinitialiser la recherche.
            search.value = '';

            filtrerIcones();

            // Afficher la modale.
            modal.classList.add('is-open');

            modal.setAttribute('aria-hidden', 'false');

            document.body.classList.add('community-icon-modal-open');

            // Donner le focus à la recherche.
            window.requestAnimationFrame(function () {
                search.focus();
            });
        }


        // =====================================================
        // FERMETURE DE LA BIBLIOTHEQUE
        // =====================================================

        function fermerBibliotheque() {

            modal.classList.remove('is-open');

            modal.setAttribute('aria-hidden', 'true');

            document.body.classList.remove('community-icon-modal-open');
        }


        // =====================================================
        // CONFIRMATION DU CHOIX
        // =====================================================

        function confirmerChoix() {

            if (!temporaryValue) return;

            // Transmettre l'icône choisie au formulaire.
            hidden.value = temporaryValue;

            // Mettre à jour l'aperçu principal.
            preview.className = 'fa ' + temporaryValue;

            if (previewLabel) {

                previewLabel.textContent =
                    'Icône sélectionnée : ' + temporaryLabel;

            }

            // Déclencher l'événement change.
            hidden.dispatchEvent(
                new Event('change', { bubbles: true })
            );

            fermerBibliotheque();
        }


        // =====================================================
        // GESTION DES CLICS
        // =====================================================

        document.addEventListener('click', function (event) {

            // Ouvrir la bibliothèque.
            const ouvrir = event.target.closest('[data-open-icon-library]');

            if (ouvrir) {

                event.preventDefault();

                ouvrirBibliotheque();

                return;
            }

            // Fermer la bibliothèque.
            const fermer = event.target.closest('[data-close-icon-library]');

            if (fermer && modal.classList.contains('is-open')) {

                event.preventDefault();

                fermerBibliotheque();

                return;
            }

            // Confirmer le choix.
            if (event.target.closest('#confirmGroupIcon')) {

                event.preventDefault();

                confirmerChoix();
            }

        });


        // =====================================================
        // RECHERCHE EN TEMPS REEL
        // =====================================================

        search.addEventListener('input', filtrerIcones);

        search.addEventListener('search', filtrerIcones);


        // =====================================================
        // SELECTION D'UNE ICONE
        // =====================================================

        selector.addEventListener('change', function (event) {

            if (event.target.matches('input[name="icone_selection"]')) {

                mettreAJourChoix(
                    event.target.closest('.community-icon-option')
                );

            }

        });


        // =====================================================
        // FILTRAGE PAR CATEGORIE
        // =====================================================

        categories.forEach(function (button) {

            button.addEventListener('click', function () {

                activeCategory =
                    button.dataset.iconCategory || 'all';

                categories.forEach(function (item) {

                    item.classList.toggle('active', item === button);

                });

                filtrerIcones();

            });

        });


        // =====================================================
        // FERMETURE AVEC LA TOUCHE ECHAP
        // =====================================================

        document.addEventListener('keydown', function (event) {

            if (
                event.key === 'Escape' &&
                modal.classList.contains('is-open')
            ) {

                fermerBibliotheque();

            }

        });


        // =====================================================
        // INITIALISATION DE L'APERÇU
        // =====================================================

        const initiale =
            obtenirOption(hidden.value) ||
            obtenirOption('fa-users');

        if (initiale) {

            mettreAJourChoix(initiale);

            preview.className = 'fa ' + temporaryValue;

            if (previewLabel) {

                previewLabel.textContent =
                    'Icône sélectionnée : ' + temporaryLabel;

            }

        }

        // Premier filtrage au chargement.
        filtrerIcones();

    }


    // =========================================================
    // INITIALISATION AVANT OU APRES LE CHARGEMENT DU DOM
    // =========================================================

    if (document.readyState === 'loading') {

        document.addEventListener(
            'DOMContentLoaded',
            initialiserBibliothequeIcones,
            { once: true }
        );

    } else {

        initialiserBibliothequeIcones();

    }

})();
</script>
