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
                            <span class="community-preview-overline">PERSONNALISATION</span>
                            <strong>Choisissez le symbole de votre communauté</strong>
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
                    aria-hidden="true">
                    <div class="community-icon-modal-backdrop" data-close-icon-library></div>

                    <div
                        class="community-icon-modal-dialog"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="communityIconModalTitle"
                    >
                        <div class="community-icon-modal-header">
                            <div>
                                <span class="community-preview-overline">BIBLIOTHEQUE</span>
                                <h3 id="communityIconModalTitle">Choisir une icône</h3>
                                <p>Recherchez un symbole ou explorez les catégories.</p>
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

                        <div class="community-icon-categories" aria-label="Catégories d'icônes">
                            <button type="button" class="community-icon-category active" data-icon-category="all">Tout</button>
                            <button type="button" class="community-icon-category" data-icon-category="communaute">Communauté</button>
                            <button type="button" class="community-icon-category" data-icon-category="solidarite">Solidarité</button>
                            <button type="button" class="community-icon-category" data-icon-category="famille">Famille</button>
                            <button type="button" class="community-icon-category" data-icon-category="professionnel">Professionnel</button>
                            <button type="button" class="community-icon-category" data-icon-category="education">Éducation</button>
                            <button type="button" class="community-icon-category" data-icon-category="reussite">Réussite</button>
                            <button type="button" class="community-icon-category" data-icon-category="protection">Protection</button>
                            <button type="button" class="community-icon-category" data-icon-category="nature">Nature</button>
                            <button type="button" class="community-icon-category" data-icon-category="divers">Divers</button>
                        </div>

                        <div class="community-icon-modal-results-heading">
                            <span>Icônes disponibles</span>
                            <span><b id="groupIconVisibleCount">0</b> résultat(s)</span>
                        </div>

                        <div class="community-icon-selector" id="groupIconSelector">
                            @php
                                $groupIcons = [
                                    ['value' => 'fa-users', 'label' => 'Communauté', 'category' => 'communaute', 'keywords' => 'groupe membres collectif association'],
                                    ['value' => 'fa-handshake-o', 'label' => 'Entraide', 'category' => 'solidarite', 'keywords' => 'aide soutien partage coopération'],
                                    ['value' => 'fa-heart', 'label' => 'Solidarité', 'category' => 'solidarite', 'keywords' => 'amour entraide union'],
                                    ['value' => 'fa-home', 'label' => 'Famille', 'category' => 'famille', 'keywords' => 'maison foyer proches'],
                                    ['value' => 'fa-child', 'label' => 'Enfants', 'category' => 'famille', 'keywords' => 'jeunesse enfant'],
                                    ['value' => 'fa-briefcase', 'label' => 'Professionnel', 'category' => 'professionnel', 'keywords' => 'travail métier carrière'],
                                    ['value' => 'fa-building', 'label' => 'Entreprise', 'category' => 'professionnel', 'keywords' => 'société bureau organisation'],
                                    ['value' => 'fa-industry', 'label' => 'Industrie', 'category' => 'professionnel', 'keywords' => 'production usine activité'],
                                    ['value' => 'fa-graduation-cap', 'label' => 'Éducation', 'category' => 'education', 'keywords' => 'école études formation diplôme'],
                                    ['value' => 'fa-book', 'label' => 'Savoir', 'category' => 'education', 'keywords' => 'livre lecture connaissance'],
                                    ['value' => 'fa-flask', 'label' => 'Recherche', 'category' => 'education', 'keywords' => 'science laboratoire innovation'],
                                    ['value' => 'fa-trophy', 'label' => 'Réussite', 'category' => 'reussite', 'keywords' => 'victoire succès récompense'],
                                    ['value' => 'fa-star', 'label' => 'Prestige', 'category' => 'reussite', 'keywords' => 'étoile distinction'],
                                    ['value' => 'fa-bullseye', 'label' => 'Objectif', 'category' => 'reussite', 'keywords' => 'cible ambition but'],
                                    ['value' => 'fa-lightbulb-o', 'label' => 'Innovation', 'category' => 'reussite', 'keywords' => 'idée créativité inspiration'],
                                    ['value' => 'fa-shield', 'label' => 'Protection', 'category' => 'protection', 'keywords' => 'sécurité défense confiance'],
                                    ['value' => 'fa-lock', 'label' => 'Sécurité', 'category' => 'protection', 'keywords' => 'verrou privé confidentialité'],
                                    ['value' => 'fa-leaf', 'label' => 'Nature', 'category' => 'nature', 'keywords' => 'écologie plante environnement'],
                                    ['value' => 'fa-tree', 'label' => 'Arbre', 'category' => 'nature', 'keywords' => 'forêt croissance'],
                                    ['value' => 'fa-globe', 'label' => 'Réseau', 'category' => 'communaute', 'keywords' => 'monde planète connexion'],
                                    ['value' => 'fa-comments', 'label' => 'Discussion', 'category' => 'communaute', 'keywords' => 'échange parole dialogue'],
                                    ['value' => 'fa-bell', 'label' => 'Information', 'category' => 'divers', 'keywords' => 'notification alerte annonce'],
                                    ['value' => 'fa-calendar', 'label' => 'Événement', 'category' => 'divers', 'keywords' => 'date agenda rencontre'],
                                    ['value' => 'fa-gift', 'label' => 'Cadeau', 'category' => 'solidarite', 'keywords' => 'don générosité offrande'],
                                    ['value' => 'fa-money', 'label' => 'Finance', 'category' => 'divers', 'keywords' => 'argent cotisation économie'],
                                    ['value' => 'fa-credit-card', 'label' => 'Cotisation', 'category' => 'divers', 'keywords' => 'paiement contribution'],
                                    ['value' => 'fa-rocket', 'label' => 'Projet', 'category' => 'reussite', 'keywords' => 'lancement évolution ambition'],
                                    ['value' => 'fa-map-marker', 'label' => 'Localité', 'category' => 'communaute', 'keywords' => 'lieu quartier ville'],
                                    ['value' => 'fa-flag', 'label' => 'Engagement', 'category' => 'communaute', 'keywords' => 'cause objectif drapeau'],
                                    ['value' => 'fa-life-ring', 'label' => 'Assistance', 'category' => 'solidarite', 'keywords' => 'secours aide urgence'],
                                    ['value' => 'fa-diamond', 'label' => 'Excellence', 'category' => 'reussite', 'keywords' => 'qualité valeur distinction'],
                                    ['value' => 'fa-bicycle', 'label' => 'Activité', 'category' => 'divers', 'keywords' => 'sport loisir mouvement'],
                                ];
                            @endphp

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

                            <div class="community-icon-no-result" id="groupIconNoResult" style="display:none;">
                                <i class="fa fa-search"></i>
                                <strong>Aucune icône trouvée</strong>
                                <small>Essayez un autre mot-clé ou une autre catégorie.</small>
                            </div>
                        </div>

                        <div class="community-icon-modal-footer">
                            <div class="community-icon-modal-selection">
                                <span class="community-icon-modal-selection-preview">
                                    <i class="fa fa-users" id="groupIconModalPreview"></i>
                                </span>
                                <span>
                                    <small>Votre choix</small>
                                    <strong id="groupIconModalLabel">Communauté</strong>
                                </span>
                            </div>

                            <div class="community-icon-modal-actions">
                                <button type="button" class="community-icon-cancel" data-close-icon-library>
                                    Annuler
                                </button>
                                <button type="button" class="community-icon-confirm" id="confirmGroupIcon">
                                    <i class="fa fa-check"></i>
                                    Confirmer le choix
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INFORMATIONS --}}
                {{-- <div class="col-12">
                    <div class="futureFinal">
                        <i class="fa fa-picture-o"></i>

                        <h3>Donnez une identité visuelle à votre groupe</h3>

                        <p>
                            Choisissez une icône qui représente l'esprit
                            de votre communauté. Elle permettra de reconnaître
                            facilement votre groupe dans l'espace communautaire.
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>

    </div>
</section>
<style>

/* ==========================================================
   COMMUNAUTE — STEEP 2
   PERSONNALISATION ET CHOIX DE L'ICONE
========================================================== */

.steep-2 .community-section-heading {
    margin-bottom: 15px;
}

/* GRILLE DE L'ETAPE */

.steep-2 .community-step2-row {
    margin-left: -10px;
    margin-right: -10px;
}

.steep-2 .community-step2-row > [class*="col-"] {
    padding: 10px;
}

/* APERCU */

.steep-2 .community-icon-preview-panel {
    position: relative;
    display: flex;
    align-items: center;
    gap: 20px;

    width: 100%;
    min-width: 0;
    padding: 22px 25px;
    overflow: hidden;

    border: 1px solid rgba(0,217,239,.19);
    border-radius: 19px;

    background:
        radial-gradient(ellipse at 12% 50%, rgba(0,217,239,.12), transparent 42%),
        linear-gradient(135deg, rgba(255,255,255,.035), transparent 70%),
        #0d1319;

    box-shadow: 0 12px 35px rgba(0,0,0,.15);
}

.steep-2 .community-icon-preview-panel::after {
    position: absolute;
    top: -70px;
    right: -45px;
    width: 190px;
    height: 190px;
    border: 1px solid rgba(0,217,239,.07);
    border-radius: 50%;
    content: "";
    pointer-events: none;
}

.steep-2 .community-icon-preview {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 82px;
    height: 82px;
    flex: 0 0 82px;
    margin: 0;

    border: 1px solid rgba(0,217,239,.22);
    border-radius: 23px;

    background: rgba(0,217,239,.055);
    box-shadow: inset 0 0 25px rgba(0,217,239,.035);
}

.steep-2 .community-icon-preview-circle {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 58px;
    height: 58px;

    border-radius: 17px;
    background: rgba(0,217,239,.11);

    color: var(--community-cyan);
    font-size: 27px;
}

.steep-2 .community-icon-preview-details {
    display: flex;
    flex: 1 1 auto;
    flex-direction: column;
    gap: 5px;
    min-width: 0;
}

.steep-2 .community-preview-overline {
    color: var(--community-cyan);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1.6px;
}

.steep-2 .community-icon-preview-details strong {
    color: #f4fafc;
    font-size: 15px;
    font-weight: 700;
}

.steep-2 .community-icon-preview-details p {
    margin: 0;
    color: #a4b2ba;
    font-size: 11px;
}

.steep-2 .community-preview-status {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    flex-shrink: 0;
    padding: 8px 11px;

    border: 1px solid rgba(0,217,239,.16);
    border-radius: 30px;
    background: rgba(0,217,239,.055);

    color: #b9dce1;
    font-size: 10px;
}

.steep-2 .community-preview-status i {
    color: var(--community-cyan);
}

/* RECHERCHE */

.steep-2 .community-icon-search-panel {
    width: 100%;
    min-width: 0;
    padding: 17px 19px;

    border: 1px solid var(--community-border);
    border-radius: 16px;
    background: rgba(255,255,255,.018);
}

.steep-2 .community-icon-search-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 13px;
}

.steep-2 .community-icon-search-heading > div {
    display: flex;
    align-items: center;
    gap: 9px;
    color: #edf5f7;
    font-size: 12px;
    font-weight: 600;
}

.steep-2 .community-icon-search-heading > div i {
    color: var(--community-cyan);
}

.steep-2 .community-icon-search-heading > small {
    color: var(--community-muted);
    font-size: 10px;
}

.steep-2 .community-icon-search-panel .futureField {
    margin: 0;
}

.steep-2 .community-icon-search-panel .futureInput {
    height: 48px;
}

.steep-2 .community-icon-search-panel .futureInput input {
    height: 100%;
    padding-left: 43px;
    padding-right: 45px;
    background: transparent;
    color: #fff;
}

.steep-2 .community-icon-search-panel .futureInput input::placeholder {
    color: #71818b;
}

.steep-2 .community-search-shortcut {
    position: absolute;
    top: 50%;
    right: 13px;
    transform: translateY(-50%);
    color: #687b85;
    font-size: 13px;
    pointer-events: none;
}

/* BIBLIOTHEQUE */

.steep-2 .community-icon-library {
    width: 100%;
    min-width: 0;
    padding: 19px;

    border: 1px solid var(--community-border);
    border-radius: 17px;

    background:
        linear-gradient(145deg, rgba(255,255,255,.025), transparent),
        rgba(13,19,25,.78);
}

.steep-2 .community-icon-library-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 17px;
    padding-bottom: 13px;
    border-bottom: 1px solid rgba(255,255,255,.065);
}

.steep-2 .community-icon-library-heading > div {
    display: flex;
    flex-direction: column;
    gap: 5px;
    min-width: 0;
}

.steep-2 .community-icon-library-heading strong {
    color: #f1f8fa;
    font-size: 13px;
}

.steep-2 .community-icon-library-heading small {
    color: var(--community-muted);
    font-size: 10px;
}

.steep-2 .community-icon-count {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    flex-shrink: 0;
    padding: 6px 10px;

    border: 1px solid rgba(0,217,239,.18);
    border-radius: 30px;
    background: rgba(0,217,239,.055);

    color: var(--community-cyan);
    font-size: 11px;
}

/* GRILLE DES ICONES */

.steep-2 .community-icon-selector {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    gap: 11px;

    width: 100%;
    min-width: 0;
    margin: 0;
}

.steep-2 .community-icon-option {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 9px;

    width: 100%;
    max-width: 100%;
    min-width: 0;
    min-height: 105px;
    margin: 0;
    padding: 13px 8px;

    border: 1px solid var(--community-border);
    border-radius: 15px;

    background: rgba(255,255,255,.018);
    color: #bdc8ce;
    cursor: pointer;

    transition: border-color .25s ease,
                background .25s ease,
                transform .25s ease,
                box-shadow .25s ease;
}

.steep-2 .community-icon-option input {
    position: absolute;
    width: 1px;
    height: 1px;
    opacity: 0;
    pointer-events: none;
}

.steep-2 .community-icon-option-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;

    width: 100%;
    min-width: 0;
}

.steep-2 .community-icon-option-content > i {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 43px;
    height: 43px;

    border: 1px solid rgba(255,255,255,.07);
    border-radius: 13px;
    background: rgba(255,255,255,.025);

    color: #93a3ad;
    font-size: 23px;

    transition: color .25s ease,
                transform .25s ease;
}

.steep-2 .community-icon-option small {
    max-width: 100%;
    color: #aab8bf;
    font-size: 10px;
    text-align: center;
    overflow-wrap: anywhere;
}

.steep-2 .community-icon-option:hover {
    transform: translateY(-3px);
    border-color: rgba(0,217,239,.35);
    background: rgba(0,217,239,.045);
}

.steep-2 .community-icon-option:hover .community-icon-option-content > i {
    color: var(--community-cyan);
    transform: scale(1.08);
}

.steep-2 .community-icon-option.selected {
    border-color: rgba(0,217,239,.55);
    background: linear-gradient(145deg, rgba(0,217,239,.11), rgba(0,217,239,.025));
    color: #fff;
    box-shadow: inset 0 0 18px rgba(0,217,239,.025);
}

.steep-2 .community-icon-option.selected .community-icon-option-content > i {
    border-color: rgba(0,217,239,.22);
    background: rgba(0,217,239,.09);
    color: var(--community-cyan);
}

.steep-2 .community-icon-option.selected small {
    color: #e7faff;
}

.steep-2 .community-icon-option.selected::after {
    position: absolute;
    top: 8px;
    right: 9px;
    color: var(--community-cyan);
    content: "\f00c";
    font-family: FontAwesome;
    font-size: 10px;
}

.steep-2 .community-icon-option.hidden-by-search {
    display: none !important;
}

/* FOCUS CLAVIER */

.steep-2 .community-icon-option input:focus-visible + .community-icon-option-content {
    outline: 2px solid var(--community-cyan);
    outline-offset: 4px;
}

/* AUCUN RESULTAT */

.steep-2 .community-icon-no-result {
    grid-column: 1 / -1;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;

    min-height: 150px;
    padding: 20px;

    border: 1px dashed rgba(0,217,239,.20);
    border-radius: 14px;
    text-align: center;
}

.steep-2 .community-icon-no-result > i {
    color: var(--community-cyan);
    font-size: 24px;
}

.steep-2 .community-icon-no-result strong {
    color: #edf5f7;
    font-size: 12px;
}

.steep-2 .community-icon-no-result small {
    color: var(--community-muted);
    font-size: 10px;
}

/* RESPONSIVE */

@media (max-width: 767.98px) {
    .steep-2 .community-step2-row {
        margin-left: -6px;
        margin-right: -6px;
    }

    .steep-2 .community-step2-row > [class*="col-"] {
        padding: 6px;
    }

    .steep-2 .community-icon-preview-panel {
        gap: 14px;
        padding: 17px;
        border-radius: 16px;
    }

    .steep-2 .community-icon-preview {
        width: 67px;
        height: 67px;
        flex-basis: 67px;
        border-radius: 19px;
    }

    .steep-2 .community-icon-preview-circle {
        width: 49px;
        height: 49px;
        font-size: 23px;
    }

    .steep-2 .community-icon-preview-details strong {
        font-size: 13px;
    }

    .steep-2 .community-preview-status {
        display: none;
    }

    .steep-2 .community-icon-library,
    .steep-2 .community-icon-search-panel {
        padding: 14px;
    }

    .steep-2 .community-icon-selector {
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 8px;
    }

    .steep-2 .community-icon-option {
        min-height: 91px;
        padding: 9px 5px;
    }
}

@media (max-width: 480px) {
    .steep-2 .community-icon-preview-panel {
        gap: 12px;
        padding: 14px;
    }

    .steep-2 .community-icon-preview {
        width: 57px;
        height: 57px;
        flex-basis: 57px;
        border-radius: 16px;
    }

    .steep-2 .community-icon-preview-circle {
        width: 43px;
        height: 43px;
        border-radius: 13px;
        font-size: 20px;
    }

    .steep-2 .community-icon-preview-details strong {
        font-size: 12px;
    }

    .steep-2 .community-icon-preview-details p {
        font-size: 10px;
        line-height: 1.5;
    }

    .steep-2 .community-icon-search-heading {
        align-items: flex-start;
        flex-direction: column;
    }

    .steep-2 .community-icon-selector {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 7px;
    }

    .steep-2 .community-icon-option {
        min-height: 84px;
    }

    .steep-2 .community-icon-option-content > i {
        width: 37px;
        height: 37px;
        font-size: 19px;
    }

    .steep-2 .community-icon-option small {
        font-size: 9px;
    }
}



/* ==========================================================
   BIBLIOTHEQUE D'ICONES — OUVERTURE A LA DEMANDE
========================================================== */

.steep-2 .community-icon-library-access {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    width: 100%;
    padding: 20px 22px;
    border: 1px solid var(--community-border);
    border-radius: 17px;
    background:
        radial-gradient(circle at 90% 50%, rgba(0,217,239,.07), transparent 35%),
        rgba(13,19,25,.78);
}

.steep-2 .community-icon-library-access-info {
    display: flex;
    flex-direction: column;
    gap: 6px;
    min-width: 0;
}

.steep-2 .community-icon-library-access-info strong {
    color: #f1f8fa;
    font-size: 13px;
}

.steep-2 .community-icon-library-access-info small {
    color: var(--community-muted);
    font-size: 10px;
    line-height: 1.6;
}

.steep-2 .community-icon-open-library,
.steep-2 .community-icon-confirm {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    flex-shrink: 0;
    min-height: 44px;
    padding: 0 17px;
    border: 1px solid rgba(0,217,239,.35);
    border-radius: 12px;
    background: linear-gradient(135deg, rgba(0,217,239,.17), rgba(0,217,239,.07));
    color: #dffbff;
    font-size: 11px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s ease;
}

.steep-2 .community-icon-open-library:hover,
.steep-2 .community-icon-confirm:hover {
    border-color: var(--community-cyan);
    background: rgba(0,217,239,.20);
    transform: translateY(-2px);
}

.steep-2 .community-icon-open-library > i:first-child,
.steep-2 .community-icon-confirm > i {
    color: var(--community-cyan);
}

.steep-2 .community-icon-modal {
    position: fixed;
    inset: 0;
    z-index: 100000;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 22px;
}

.steep-2 .community-icon-modal.is-open {
    display: flex;
}

.steep-2 .community-icon-modal-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(2,7,11,.82);
    backdrop-filter: blur(8px);
}

.steep-2 .community-icon-modal-dialog {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    width: min(900px, 100%);
    max-height: min(850px, calc(100vh - 44px));
    min-height: 0;
    padding: 22px;
    overflow: hidden;
    border: 1px solid rgba(0,217,239,.22);
    border-radius: 20px;
    background:
        radial-gradient(ellipse at 0 0, rgba(0,217,239,.09), transparent 36%),
        #0d141b;
    box-shadow: 0 25px 90px rgba(0,0,0,.55);
}

.steep-2 .community-icon-modal-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 15px;
    padding-bottom: 17px;
    border-bottom: 1px solid rgba(255,255,255,.07);
}

.steep-2 .community-icon-modal-header h3 {
    margin: 5px 0;
    color: #f4fafc;
    font-size: 19px;
    font-weight: 700;
}

.steep-2 .community-icon-modal-header p {
    margin: 0;
    color: #91a2ac;
    font-size: 11px;
}

.steep-2 .community-icon-modal-close {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    flex: 0 0 36px;
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 11px;
    background: rgba(255,255,255,.035);
    color: #aab8bf;
    cursor: pointer;
}

.steep-2 .community-icon-modal-close:hover {
    border-color: rgba(255,100,100,.35);
    color: #ff9292;
}

.steep-2 .community-icon-modal-search {
    position: relative;
    display: flex;
    align-items: center;
    margin-top: 17px;
}

.steep-2 .community-icon-modal-search > i {
    position: absolute;
    left: 15px;
    color: var(--community-cyan);
    pointer-events: none;
}

.steep-2 .community-icon-modal-search input {
    width: 100%;
    height: 47px;
    padding: 0 45px 0 43px;
    border: 1px solid rgba(0,217,239,.18);
    border-radius: 12px;
    outline: none;
    background: rgba(255,255,255,.035);
    color: #fff;
    font-size: 12px;
}

.steep-2 .community-icon-modal-search input:focus {
    border-color: rgba(0,217,239,.55);
    box-shadow: 0 0 0 3px rgba(0,217,239,.07);
}

.steep-2 .community-icon-modal-search input::placeholder {
    color: #71818b;
}

.steep-2 .community-icon-categories {
    display: flex;
    gap: 7px;
    padding: 14px 0 12px;
    overflow-x: auto;
    scrollbar-width: thin;
}

.steep-2 .community-icon-category {
    flex: 0 0 auto;
    padding: 7px 11px;
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 30px;
    background: rgba(255,255,255,.025);
    color: #9eafb8;
    font-size: 10px;
    cursor: pointer;
    transition: .2s ease;
}

.steep-2 .community-icon-category:hover,
.steep-2 .community-icon-category.active {
    border-color: rgba(0,217,239,.38);
    background: rgba(0,217,239,.10);
    color: #c9faff;
}

.steep-2 .community-icon-modal-results-heading {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    padding: 0 2px 10px;
    color: #dce8ed;
    font-size: 10px;
}

.steep-2 .community-icon-modal-results-heading span:last-child {
    color: #8fa1aa;
}

.steep-2 .community-icon-modal-results-heading b {
    color: var(--community-cyan);
}

.steep-2 .community-icon-modal .community-icon-selector {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(105px, 1fr));
    gap: 9px;
    min-height: 120px;
    padding: 2px 4px 12px 2px;
    overflow-y: auto;
    overscroll-behavior: contain;
    scrollbar-width: thin;
    scrollbar-color: rgba(0,217,239,.35) rgba(255,255,255,.04);
}

.steep-2 .community-icon-modal .community-icon-option {
    min-height: 92px;
}

.steep-2 .community-icon-modal .community-icon-option.is-filtered {
    display: none !important;
}

.steep-2 .community-icon-modal .community-icon-no-result {
    grid-column: 1 / -1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 150px;
    border: 1px dashed rgba(0,217,239,.20);
    border-radius: 14px;
    text-align: center;
}

.steep-2 .community-icon-modal .community-icon-no-result > i {
    color: var(--community-cyan);
    font-size: 24px;
}

.steep-2 .community-icon-modal .community-icon-no-result strong {
    color: #edf5f7;
    font-size: 12px;
}

.steep-2 .community-icon-modal .community-icon-no-result small {
    color: var(--community-muted);
    font-size: 10px;
}

.steep-2 .community-icon-modal-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-top: 10px;
    padding-top: 15px;
    border-top: 1px solid rgba(255,255,255,.07);
}

.steep-2 .community-icon-modal-selection {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 0;
}

.steep-2 .community-icon-modal-selection-preview {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 39px;
    height: 39px;
    flex: 0 0 39px;
    border: 1px solid rgba(0,217,239,.22);
    border-radius: 12px;
    background: rgba(0,217,239,.08);
    color: var(--community-cyan);
    font-size: 17px;
}

.steep-2 .community-icon-modal-selection > span:last-child {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.steep-2 .community-icon-modal-selection small {
    color: #82949e;
    font-size: 9px;
}

.steep-2 .community-icon-modal-selection strong {
    color: #eaf7fa;
    font-size: 11px;
}

.steep-2 .community-icon-modal-actions {
    display: flex;
    align-items: center;
    gap: 8px;
}

.steep-2 .community-icon-cancel {
    min-height: 42px;
    padding: 0 14px;
    border: 1px solid rgba(255,255,255,.10);
    border-radius: 11px;
    background: rgba(255,255,255,.035);
    color: #b5c1c7;
    font-size: 10px;
    cursor: pointer;
}

.steep-2 .community-icon-cancel:hover {
    background: rgba(255,255,255,.07);
    color: #fff;
}

.steep-2 .community-icon-confirm {
    min-height: 42px;
}

body.community-icon-modal-open {
    overflow: hidden;
}

@media (max-width: 600px) {
    .steep-2 .community-icon-library-access {
        align-items: stretch;
        flex-direction: column;
        padding: 16px;
    }

    .steep-2 .community-icon-open-library {
        width: 100%;
    }

    .steep-2 .community-icon-modal {
        padding: 8px;
    }

    .steep-2 .community-icon-modal-dialog {
        max-height: calc(100vh - 16px);
        padding: 15px;
        border-radius: 16px;
    }

    .steep-2 .community-icon-modal-header h3 {
        font-size: 16px;
    }

    .steep-2 .community-icon-modal .community-icon-selector {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 7px;
    }

    .steep-2 .community-icon-modal .community-icon-option {
        min-height: 82px;
        padding: 8px 4px;
    }

    .steep-2 .community-icon-modal-footer {
        align-items: stretch;
        flex-direction: column;
    }

    .steep-2 .community-icon-modal-actions {
        display: grid;
        grid-template-columns: .8fr 1.2fr;
    }

    .steep-2 .community-icon-cancel,
    .steep-2 .community-icon-confirm {
        width: 100%;
        padding: 0 8px;
    }
}

</style>
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

        if (!modal || !selector || !hidden || !preview || !search) {
            console.error('Bibliothèque d’icônes : élément HTML introuvable.');
            return;
        }

        if (modal.dataset.iconLibraryInitialized === 'true') return;
        modal.dataset.iconLibraryInitialized = 'true';

        const options = Array.from(
            selector.querySelectorAll('.community-icon-option')
        );

        const categories = Array.from(
            modal.querySelectorAll('.community-icon-category')
        );

        let activeCategory = 'all';
        let temporaryValue = hidden.value || 'fa-users';
        let temporaryLabel = 'Communauté';

        // Normalisation : retire les accents pour faciliter la recherche.
        function normaliser(texte) {
            return String(texte || '')
                .toLocaleLowerCase('fr')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .trim();
        }

        function obtenirOption(valeur) {
            return options.find(function (option) {
                const radio = option.querySelector('input[type="radio"]');
                return radio && radio.value === valeur;
            }) || null;
        }

        // Mise à jour de la sélection temporaire.
        function mettreAJourChoix(option) {
            if (!option) return;

            const radio = option.querySelector('input[type="radio"]');
            if (!radio) return;

            temporaryValue = radio.value;

            const label = option.querySelector('small');

            temporaryLabel =
                radio.dataset.iconLabel ||
                (label ? label.textContent.trim() : 'Icône');

            options.forEach(function (item) {
                item.classList.remove('selected');

                const input = item.querySelector('input[type="radio"]');

                if (input) input.checked = false;
            });

            option.classList.add('selected');
            radio.checked = true;

            if (modalPreview) {
                modalPreview.className = 'fa ' + temporaryValue;
            }

            if (modalLabel) {
                modalLabel.textContent = temporaryLabel;
            }
        }

        // Recherche et filtrage combinés.
        function filtrerIcones() {
            const recherche = normaliser(search.value);
            let visibles = 0;

            options.forEach(function (option) {
                const categorie = option.dataset.iconCategory || '';

                const motsCles = normaliser(
                    option.dataset.iconSearch || option.textContent
                );

                const correspondRecherche =
                    recherche === '' || motsCles.includes(recherche);

                const correspondCategorie =
                    activeCategory === 'all' ||
                    categorie === activeCategory;

                const visible =
                    correspondRecherche && correspondCategorie;

                option.classList.toggle('is-filtered', !visible);
                option.setAttribute('aria-hidden', visible ? 'false' : 'true');

                if (visible) visibles++;
            });

            if (counter) {
                counter.textContent = String(visibles);
            }

            if (noResult) {
                noResult.style.display = visibles === 0 ? 'flex' : 'none';
            }
        }

        // Ouverture de la bibliothèque.
        function ouvrirBibliotheque() {
            const optionActuelle =
                obtenirOption(hidden.value) ||
                obtenirOption('fa-users');

            if (optionActuelle) {
                mettreAJourChoix(optionActuelle);
            }

            activeCategory = 'all';

            categories.forEach(function (button) {
                button.classList.toggle(
                    'active',
                    button.dataset.iconCategory === 'all'
                );
            });

            search.value = '';
            filtrerIcones();

            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');

            document.body.classList.add('community-icon-modal-open');

            window.requestAnimationFrame(function () {
                search.focus();
            });
        }

        // Fermeture de la bibliothèque.
        function fermerBibliotheque() {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');

            document.body.classList.remove('community-icon-modal-open');
        }

        // Validation du choix.
        function confirmerChoix() {
            if (!temporaryValue) return;

            hidden.value = temporaryValue;

            preview.className = 'fa ' + temporaryValue;

            if (previewLabel) {
                previewLabel.textContent =
                    'Icône sélectionnée : ' + temporaryLabel;
            }

            hidden.dispatchEvent(
                new Event('change', { bubbles: true })
            );

            fermerBibliotheque();
        }

        // Gestion des clics.
        document.addEventListener('click', function (event) {

            const ouvrir = event.target.closest('[data-open-icon-library]');

            if (ouvrir) {
                event.preventDefault();
                ouvrirBibliotheque();
                return;
            }

            const fermer = event.target.closest('[data-close-icon-library]');

            if (fermer && modal.classList.contains('is-open')) {
                event.preventDefault();
                fermerBibliotheque();
                return;
            }

            if (event.target.closest('#confirmGroupIcon')) {
                event.preventDefault();
                confirmerChoix();
            }
        });

        // Recherche en temps réel.
        search.addEventListener('input', filtrerIcones);
        search.addEventListener('search', filtrerIcones);

        // Sélection d'une icône.
        selector.addEventListener('change', function (event) {
            if (event.target.matches('input[name="icone_selection"]')) {
                mettreAJourChoix(
                    event.target.closest('.community-icon-option')
                );
            }
        });

        // Filtrage par catégorie.
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

        // Fermeture avec Échap.
        document.addEventListener('keydown', function (event) {
            if (
                event.key === 'Escape' &&
                modal.classList.contains('is-open')
            ) {
                fermerBibliotheque();
            }
        });

        // Initialisation de l'aperçu.
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

        filtrerIcones();
    }

    // Fonctionne avant ou après le chargement du DOM.
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
