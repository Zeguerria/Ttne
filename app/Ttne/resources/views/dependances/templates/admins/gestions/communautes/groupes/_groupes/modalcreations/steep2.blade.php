
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

                {{-- RECHERCHE D'ICONE --}}
                <div class="col-12">
                    <div class="community-icon-search-panel">

                        <div class="community-icon-search-heading">
                            <div>
                                <i class="fa fa-search"></i>
                                <span>Explorer les icônes</span>
                            </div>

                            <small>
                                Retrouvez rapidement le symbole idéal.
                            </small>
                        </div>

                        <div class="futureField">
                            <div class="futureInput">
                                <i class="fa fa-search inputIcon"></i>

                                <input
                                    type="search"
                                    id="groupIconSearch"
                                    class="form-control"
                                    placeholder="Rechercher une icône..."
                                    autocomplete="off"
                                >

                                <span class="community-search-shortcut">
                                    <i class="fa fa-keyboard-o"></i>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- SELECTION DES ICONES --}}
                <div class="col-12">

                    <div class="community-icon-library">

                        <div class="community-icon-library-heading">
                            <div>
                                <strong>Bibliothèque d'icônes</strong>
                                <small>
                                    Sélectionnez une seule icône pour votre groupe.
                                </small>
                            </div>

                            <span class="community-icon-count">
                                <i class="fa fa-th-large"></i>
                                <b id="groupIconVisibleCount">16</b>
                            </span>
                        </div>

                        <div
                            class="community-icon-selector"
                            id="groupIconSelector"
                        >

                            @php
                                $groupIcons = [
                                    ['value' => 'fa-users', 'label' => 'Communauté'],
                                    ['value' => 'fa-handshake-o', 'label' => 'Entraide'],
                                    ['value' => 'fa-home', 'label' => 'Famille'],
                                    ['value' => 'fa-briefcase', 'label' => 'Professionnel'],
                                    ['value' => 'fa-graduation-cap', 'label' => 'Éducation'],
                                    ['value' => 'fa-heart', 'label' => 'Solidarité'],
                                    ['value' => 'fa-star', 'label' => 'Prestige'],
                                    ['value' => 'fa-trophy', 'label' => 'Réussite'],
                                    ['value' => 'fa-lightbulb-o', 'label' => 'Innovation'],
                                    ['value' => 'fa-globe', 'label' => 'Réseau'],
                                    ['value' => 'fa-shield', 'label' => 'Protection'],
                                    ['value' => 'fa-leaf', 'label' => 'Nature'],
                                    ['value' => 'fa-building', 'label' => 'Entreprise'],
                                    ['value' => 'fa-users', 'label' => 'Association'],
                                    ['value' => 'fa-bullseye', 'label' => 'Objectif'],
                                    ['value' => 'fa-diamond', 'label' => 'Excellence'],
                                ];
                            @endphp

                            @foreach($groupIcons as $icon)
                                <label
                                    class="community-icon-option {{ $loop->first ? 'selected' : '' }}"
                                    data-icon-search="{{ strtolower($icon['label']) }}"
                                    title="{{ $icon['label'] }}"
                                >

                                    <input
                                        type="radio"
                                        name="icone_selection"
                                        value="{{ $icon['value'] }}"
                                        {{ $loop->first ? 'checked' : '' }}
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
                                <strong>Aucune icône trouvée</strong>
                                <small>
                                    Essayez avec un autre mot-clé.
                                </small>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- INFORMATIONS --}}
                <div class="col-12">
                    <div class="futureFinal">
                        <i class="fa fa-picture-o"></i>

                        <h3>Donnez une identité visuelle à votre groupe</h3>

                        <p>
                            Choisissez une icône qui représente l'esprit
                            de votre communauté. Elle permettra de reconnaître
                            facilement votre groupe dans l'espace communautaire.
                        </p>
                    </div>
                </div>

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

</style>
<script>

(function ($) {
    'use strict';

    if (!$) {
        console.error('Communauté — Étape 2 : jQuery est requis.');
        return;
    }

    const namespace = '.communityIcons';

    function initialiserIconesGroupe() {

        const $selector = $('#groupIconSelector');
        const $hidden = $('#selectedGroupIcon');
        const $preview = $('#selectedGroupIconPreview');
        const $label = $('#selectedGroupIconLabel');
        const $search = $('#groupIconSearch');
        const $counter = $('#groupIconVisibleCount');
        const $noResult = $('#groupIconNoResult');

        if (
            !$selector.length ||
            !$hidden.length ||
            !$preview.length
        ) {
            return;
        }

        const $options = $selector.find('.community-icon-option');

        /* --------------------------------------------------
           MISE A JOUR DE L'APERÇU
        -------------------------------------------------- */

        function actualiserIcone($radio) {

            if (!$radio || !$radio.length) {
                return;
            }

            const icone = String($radio.val() || '').trim();

            if (!icone) {
                return;
            }

            const $option = $radio.closest('.community-icon-option');
            const nom = $option.find('small').first().text().trim();

            $hidden.val(icone);

            $preview.attr('class', 'fa ' + icone);

            if ($label.length) {
                $label.text('Icône sélectionnée : ' + (nom || 'Personnalisée'));
            }

            $options.removeClass('selected');
            $option.addClass('selected');
        }

        /* --------------------------------------------------
           SELECTION D'UNE ICONE
        -------------------------------------------------- */

        $(document)
            .off('change' + namespace, '#groupIconSelector input[name="icone_selection"]')
            .on(
                'change' + namespace,
                '#groupIconSelector input[name="icone_selection"]',
                function () {
                    actualiserIcone($(this));
                }
            );

        /* --------------------------------------------------
           RECHERCHE D'ICONE
        -------------------------------------------------- */

        function rechercherIcones(recherche) {

            recherche = String(recherche || '')
                .toLocaleLowerCase()
                .trim();

            let resultat = 0;

            $options.each(function () {

                const $option = $(this);

                const contenu = (
                    $option.attr('data-icon-search') + ' ' +
                    $option.find('small').text() + ' ' +
                    $option.find('input').val()
                ).toLocaleLowerCase();

                const visible = contenu.includes(recherche);

                $option.toggleClass('hidden-by-search', !visible);

                if (visible) {
                    resultat++;
                }
            });

            if ($counter.length) {
                $counter.text(resultat);
            }

            if ($noResult.length) {
                $noResult.toggle(resultat === 0);
            }
        }

        if ($search.length) {

            $search
                .off('input' + namespace)
                .on('input' + namespace, function () {
                    rechercherIcones($(this).val());
                });
        }

        /* --------------------------------------------------
           INITIALISATION
        -------------------------------------------------- */

        const $initiale = $selector
            .find('input[name="icone_selection"]:checked')
            .first();

        if ($initiale.length) {
            actualiserIcone($initiale);
        } else if ($hidden.val()) {
            $preview.attr('class', 'fa ' + $hidden.val());
        }

        rechercherIcones($search.val() || '');
    }

    $(document).ready(initialiserIconesGroupe);

})(window.jQuery);

</script>
