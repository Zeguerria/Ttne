<div class="dashboardModulesGrid">

    <!-- MODULE GROUPES -->
    <section class="dashboardModule dashboardModule--full theme-orange"
             data-dashboard-module>

        <header class="dashboardModuleHeader">

            <div class="dashboardModuleHeading">
                <div class="dashboardModuleIcon">
                    <i class="fa fa-users"></i>
                </div>

                <div class="dashboardModuleTitles">
                    <h3 class="dashboardModuleTitle">Mes groupes</h3>
                    <p class="dashboardModuleSubtitle">
                        Retrouvez et gérez vos groupes
                    </p>
                </div>
            </div>

            <button type="button"
                    class="dashboardModuleToggle"
                    data-module-toggle
                    aria-expanded="true"
                    aria-label="Réduire ce module">
                <i class="fa fa-chevron-up"></i>
            </button>

        </header>

        <div class="dashboardModuleBody" data-module-body>
            <div class="dashboardModuleContent">

                <section class="dashboardGroupes">
                    <!-- Contenu actuel des groupes -->
                </section>

            </div>
        </div>

    </section>


    <!-- MODULE STATISTIQUES -->
    <section class="dashboardModule theme-purple"
             data-dashboard-module>

        <header class="dashboardModuleHeader">

            <div class="dashboardModuleHeading">
                <div class="dashboardModuleIcon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <div class="dashboardModuleTitles">
                    <h3 class="dashboardModuleTitle">Statistiques</h3>
                    <p class="dashboardModuleSubtitle">
                        Vue générale de votre activité
                    </p>
                </div>
            </div>

            <button type="button"
                    class="dashboardModuleToggle"
                    data-module-toggle
                    aria-expanded="true"
                    aria-label="Réduire ce module">
                <i class="fas fa-chevron-up"></i>
            </button>

        </header>

        <div class="dashboardModuleBody" data-module-body>
            <div class="dashboardModuleContent">
                <!-- Contenu des statistiques -->
            </div>
        </div>

    </section>


    <!-- MODULE COTISATIONS -->
    <section class="dashboardModule theme-green"
             data-dashboard-module>

        <header class="dashboardModuleHeader">

            <div class="dashboardModuleHeading">
                <div class="dashboardModuleIcon">
                    <i class="fas fa-wallet"></i>
                </div>

                <div class="dashboardModuleTitles">
                    <h3 class="dashboardModuleTitle">Cotisations</h3>
                    <p class="dashboardModuleSubtitle">
                        Suivi de vos dernières cotisations
                    </p>
                </div>
            </div>

            <button type="button"
                    class="dashboardModuleToggle"
                    data-module-toggle
                    aria-expanded="true"
                    aria-label="Réduire ce module">
                <i class="fas fa-chevron-up"></i>
            </button>

        </header>

        <div class="dashboardModuleBody" data-module-body>
            <div class="dashboardModuleContent">
                <!-- Contenu des cotisations -->
            </div>
        </div>

    </section>

</div>




{{-- CSS --}}
<style>

/* =========================================================
   1. CONTENEUR GLOBAL DES MODULES
========================================================= */

.dashboardModulesGrid {
    --dashboard-space-x: 30px;
    --dashboard-space-y: 25px;

    width: 100%;
    max-width: 1600px;

    margin: 0 auto;

    /* ESPACEMENT AVEC LES BORDS DU DASHBOARD */
    padding: 25px var(--dashboard-space-x) 40px;

    display: grid;

    grid-template-columns: repeat(2, minmax(0, 1fr));

    /* HAUTEUR INDÉPENDANTE DES MODULES */
    align-items: start;

    gap: var(--dashboard-space-y);

    box-sizing: border-box;
}


/* =========================================================
   2. MODULE PRINCIPAL
========================================================= */

.dashboardModule {
    /* COULEUR PAR DÉFAUT : CYAN */
    --module-accent: #00e5ff;
    --module-accent-rgb: 0, 229, 255;

    position: relative;

    width: 100%;
    min-width: 0;

    height: fit-content;
    align-self: start;

    background:
        linear-gradient(
            145deg,
            rgba(19, 25, 39, 0.97),
            rgba(12, 17, 29, 0.98)
        );

    border: 1px solid rgba(255, 255, 255, 0.075);

    border-radius: 20px;

    overflow: hidden;

    box-shadow:
        0 10px 30px rgba(0, 0, 0, 0.18),
        inset 0 1px 0 rgba(255, 255, 255, 0.025);

    transition:
        border-color 0.3s ease,
        box-shadow 0.3s ease,
        background 0.3s ease;
}


/* =========================================================
   3. THÈMES COULEURS
   Même logique que les cartes de groupes
========================================================= */

/* CYAN : THÈME PAR DÉFAUT */
.dashboardModule.theme-cyan {
    --module-accent: #00e5ff;
    --module-accent-rgb: 0, 229, 255;
}

/* VIOLET */
.dashboardModule.theme-purple {
    --module-accent: #b69cff;
    --module-accent-rgb: 182, 156, 255;
}

/* VERT */
.dashboardModule.theme-green {
    --module-accent: #6ee7b7;
    --module-accent-rgb: 110, 231, 183;
}

/* ORANGE */
.dashboardModule.theme-orange {
    --module-accent: #ffb36b;
    --module-accent-rgb: 255, 179, 107;
}

/* ROSE */
.dashboardModule.theme-pink {
    --module-accent: #f9a8d4;
    --module-accent-rgb: 249, 168, 212;
}

/* BLEU */
.dashboardModule.theme-blue {
    --module-accent: #60a5fa;
    --module-accent-rgb: 96, 165, 250;
}

/* ROUGE */
.dashboardModule.theme-red {
    --module-accent: #fb7185;
    --module-accent-rgb: 251, 113, 133;
}

/* JAUNE / DORÉ */
.dashboardModule.theme-gold {
    --module-accent: #facc15;
    --module-accent-rgb: 250, 204, 21;
}

/* TURQUOISE */
.dashboardModule.theme-teal {
    --module-accent: #2dd4bf;
    --module-accent-rgb: 45, 212, 191;
}


/* =========================================================
   4. MODULE PLEINE LARGEUR
========================================================= */

.dashboardModule--full {
    grid-column: 1 / -1;
}


/* =========================================================
   5. EFFET AU SURVOL
========================================================= */

.dashboardModule:hover {
    border-color: rgba(var(--module-accent-rgb), 0.28);

    box-shadow:
        0 12px 35px rgba(0, 0, 0, 0.22),
        0 0 20px rgba(var(--module-accent-rgb), 0.045);
}


/* =========================================================
   6. EN-TÊTE DU MODULE
========================================================= */

.dashboardModuleHeader {
    position: relative;

    width: 100%;
    min-height: 85px;

    padding: 17px 22px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    box-sizing: border-box;

    background:
        linear-gradient(
            100deg,
            rgba(var(--module-accent-rgb), 0.075),
            transparent 65%
        );

    border-bottom: 1px solid rgba(255, 255, 255, 0.055);
}


/* GROUPE ICÔNE + TITRES */

.dashboardModuleHeading {
    min-width: 0;

    display: flex;
    align-items: center;

    gap: 15px;
}


/* =========================================================
   7. ICÔNE
========================================================= */

.dashboardModuleIcon {
    flex-shrink: 0;

    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    color: var(--module-accent);

    font-size: 19px;

    background:
        rgba(var(--module-accent-rgb), 0.11);

    border: 1px solid rgba(var(--module-accent-rgb), 0.20);

    box-shadow:
        0 0 18px rgba(var(--module-accent-rgb), 0.08);
}


/* =========================================================
   8. TITRES
========================================================= */

.dashboardModuleTitles {
    min-width: 0;

    display: flex;
    flex-direction: column;

    gap: 4px;
}

.dashboardModuleTitle {
    margin: 0;

    color: #f3f6fc;

    font-size: 16px;
    font-weight: 700;

    line-height: 1.3;
}

.dashboardModuleSubtitle {
    margin: 0;

    color: #8994a9;

    font-size: 12px;
    font-weight: 400;

    line-height: 1.4;
}


/* =========================================================
   9. BOUTON OUVRIR / RÉDUIRE
========================================================= */

.dashboardModuleToggle {
    flex-shrink: 0;

    width: 37px;
    height: 37px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 11px;

    color: #aeb9ca;

    background: rgba(255, 255, 255, 0.045);

    border: 1px solid rgba(255, 255, 255, 0.08);

    cursor: pointer;

    transition:
        color 0.25s ease,
        background 0.25s ease,
        border-color 0.25s ease;
}

.dashboardModuleToggle:hover {
    color: var(--module-accent);

    background: rgba(var(--module-accent-rgb), 0.10);

    border-color: rgba(var(--module-accent-rgb), 0.30);
}

.dashboardModuleToggle i {
    font-size: 13px;

    transition: transform 0.3s ease;
}


/* =========================================================
   10. CONTENU DU MODULE
========================================================= */

.dashboardModuleBody {
    display: grid;

    grid-template-rows: minmax(0, 1fr);

    opacity: 1;

    transition:
        grid-template-rows 0.35s ease,
        opacity 0.25s ease;
}

.dashboardModuleContent {
    min-height: 0;
    min-width: 0;

    overflow: hidden;

    padding: 22px;

    box-sizing: border-box;
}


/* =========================================================
   11. ÉTAT RÉDUIT
========================================================= */

.dashboardModule.is-collapsed {
    height: fit-content;
}

.dashboardModule.is-collapsed .dashboardModuleBody {
    grid-template-rows: minmax(0, 0fr);

    opacity: 0;
}

.dashboardModule.is-collapsed .dashboardModuleContent {
    padding-top: 0;
    padding-bottom: 0;
}

.dashboardModule.is-collapsed .dashboardModuleHeader {
    border-bottom-color: transparent;
}

.dashboardModule.is-collapsed .dashboardModuleToggle i {
    transform: rotate(180deg);
}


/* =========================================================
   12. BARRE COLORÉE À GAUCHE DE L'EN-TÊTE
========================================================= */

.dashboardModuleHeader::before {
    content: "";

    position: absolute;

    left: 0;
    top: 15px;
    bottom: 15px;

    width: 3px;

    border-radius: 0 5px 5px 0;

    background: var(--module-accent);

    opacity: 0.8;
}


/* =========================================================
   13. RESPONSIVE : ÉCRANS INTERMÉDIAIRES
========================================================= */

@media (max-width: 1100px) {

    .dashboardModulesGrid {
        --dashboard-space-x: 22px;
        --dashboard-space-y: 20px;

        padding-top: 20px;
        padding-bottom: 30px;
    }

    .dashboardModuleHeader {
        padding: 15px 18px;
    }

    .dashboardModuleContent {
        padding: 18px;
    }

}


/* =========================================================
   14. RESPONSIVE : TABLETTES
========================================================= */

@media (max-width: 768px) {

    .dashboardModulesGrid {
        grid-template-columns: minmax(0, 1fr);

        --dashboard-space-x: 16px;
        --dashboard-space-y: 18px;

        padding-top: 18px;
        padding-bottom: 30px;
    }

    .dashboardModule,
    .dashboardModule--full {
        grid-column: 1 / -1;

        align-self: start;
    }

}


/* =========================================================
   15. RESPONSIVE : MOBILES
========================================================= */

@media (max-width: 480px) {

    .dashboardModulesGrid {
        --dashboard-space-x: 12px;
        --dashboard-space-y: 14px;

        padding-top: 14px;
        padding-bottom: 25px;
    }

    .dashboardModule {
        border-radius: 16px;
    }

    .dashboardModuleHeader {
        min-height: 72px;

        padding: 13px 14px;

        gap: 10px;
    }

    .dashboardModuleHeading {
        gap: 11px;
    }

    .dashboardModuleIcon {
        width: 39px;
        height: 39px;

        border-radius: 11px;

        font-size: 16px;
    }

    .dashboardModuleTitle {
        font-size: 14px;
    }

    .dashboardModuleSubtitle {
        font-size: 11px;
    }

    .dashboardModuleToggle {
        width: 33px;
        height: 33px;
    }

    .dashboardModuleContent {
        padding: 14px;
    }

    .dashboardModule.is-collapsed .dashboardModuleContent {
        padding-top: 0;
        padding-bottom: 0;
    }

}


/* =========================================================
   16. TRÈS PETITS ÉCRANS
========================================================= */

@media (max-width: 360px) {

    .dashboardModulesGrid {
        --dashboard-space-x: 8px;
        --dashboard-space-y: 12px;
    }

    .dashboardModuleHeader {
        padding: 12px 11px;
    }

    .dashboardModuleHeading {
        gap: 9px;
    }

    .dashboardModuleIcon {
        width: 35px;
        height: 35px;

        font-size: 14px;
    }

    .dashboardModuleTitle {
        font-size: 13px;
    }

    .dashboardModuleSubtitle {
        font-size: 10px;
    }

    .dashboardModuleContent {
        padding: 11px;
    }

}

</style>




{{-- SCRIPT --}}
<script>


/* =========================================================
   DASHBOARD MODULES
   Gestion universelle et indépendante des modules
========================================================= */

document.addEventListener('click', function (event) {

    const toggle = event.target.closest('[data-module-toggle]');

    // Le clic ne concerne pas un bouton de module
    if (!toggle) {
        return;
    }

    // Récupération du module auquel appartient ce bouton
    const module = toggle.closest('[data-dashboard-module]');

    if (!module) {
        return;
    }

    // Inversion de l'état de CE module uniquement
    const isCollapsed = module.classList.toggle('is-collapsed');

    // Mise à jour de l'accessibilité
    toggle.setAttribute(
        'aria-expanded',
        String(!isCollapsed)
    );

    toggle.setAttribute(
        'aria-label',
        isCollapsed
            ? 'Développer ce module'
            : 'Réduire ce module'
    );

});


</script>
