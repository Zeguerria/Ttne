<style>

/* ============================================================
   DASHBOARD - GROUPES À DÉCOUVRIR
============================================================ */

/* ============================================================
   SECTION PRINCIPALE
============================================================ */

.dashboardGroupes {
    --dg-cyan: #00e5ff;
    --dg-purple: #8b5cf6;
    --dg-text: #f4f7ff;
    --dg-muted: #929db4;

    position: relative;
    width: calc(100% - 70px);
    max-width: 1600px;
    margin: 0 auto 40px;
    padding: 35px 35px;

    box-sizing: border-box;
    overflow: hidden;

    background:
        radial-gradient(circle at 95% 0%, rgba(0, 229, 255, .08), transparent 32%),
        radial-gradient(circle at 0% 100%, rgba(124, 77, 255, .07), transparent 30%),
        linear-gradient(145deg, #121727, #0c111f);

    border: 1px solid rgba(0, 229, 255, .13);
    border-radius: 22px;

    box-shadow:
        0 12px 35px rgba(0, 0, 0, .16),
        inset 0 1px 0 rgba(255, 255, 255, .025);
}


/* ============================================================
   HEADER
============================================================ */

.dashboardGroupesHeader {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 25px;
}

.dashboardGroupesHeading {
    display: flex;
    align-items: center;
    gap: 15px;
    min-width: 0;
}

.dashboardGroupesIcon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;

    width: 52px;
    height: 52px;

    color: var(--dg-cyan);
    font-size: 21px;

    background: rgba(0, 229, 255, .09);
    border: 1px solid rgba(0, 229, 255, .2);
    border-radius: 15px;

    box-shadow: 0 0 20px rgba(0, 229, 255, .06);
}

.dashboardGroupesEyebrow {
    display: block;
    margin-bottom: 4px;

    color: var(--dg-cyan);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2px;
}

.dashboardGroupesTitle {
    margin: 0;
    color: var(--dg-text);
    font-size: 20px;
    font-weight: 750;
}

.dashboardGroupesSubtitle {
    margin: 5px 0 0;
    color: var(--dg-muted);
    font-size: 12px;
    line-height: 1.5;
}

.dashboardGroupesHeaderActions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
}


/* ============================================================
   NAVIGATION
============================================================ */

.dashboardGroupesNavigation {
    display: flex;
    gap: 8px;
}

.dashboardGroupesArrow {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 38px;
    height: 38px;

    color: var(--dg-cyan);
    background: rgba(0, 229, 255, .07);

    border: 1px solid rgba(0, 229, 255, .2);
    border-radius: 11px;

    cursor: pointer;
    transition: all .25s ease;
}

.dashboardGroupesArrow:hover:not(:disabled) {
    color: #101827;
    background: var(--dg-cyan);
    border-color: var(--dg-cyan);
    box-shadow: 0 0 16px rgba(0, 229, 255, .3);
    transform: translateY(-2px);
}

.dashboardGroupesArrow:disabled {
    opacity: .25;
    cursor: not-allowed;
}

.dashboardGroupesArrow:focus-visible,
.dashboardGroupesAll:focus-visible,
.dashboardGroupeDetails:focus-visible {
    outline: 2px solid var(--dg-cyan);
    outline-offset: 4px;
}

.dashboardGroupesAll {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    padding: 11px 15px;

    color: var(--dg-cyan);
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;

    background: rgba(0, 229, 255, .07);
    border: 1px solid rgba(0, 229, 255, .2);
    border-radius: 11px;

    transition: all .25s ease;
}

.dashboardGroupesAll:hover {
    color: #101827;
    background: var(--dg-cyan);
    text-decoration: none;
    box-shadow: 0 0 18px rgba(0, 229, 255, .22);
}

.dashboardGroupesAll i {
    transition: transform .25s ease;
}

.dashboardGroupesAll:hover i {
    transform: translateX(4px);
}


/* ============================================================
   CARROUSEL
============================================================ */

/*
   IMPORTANT :
   On réserve un espace en haut et en bas du carrousel.
   Cela permet aux cartes de monter au survol sans être coupées.
*/

.dashboardGroupesCarousel {
    width: 100%;
    padding: 10px 0 12px;
    overflow: hidden;
    box-sizing: border-box;
}

.dashboardGroupesTrack {
    display: flex;
    align-items: stretch;
    gap: 17px;

    width: 100%;
    padding: 7px 2px 10px;
    box-sizing: border-box;

    overflow-x: auto;
    overflow-y: hidden;

    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    overscroll-behavior-x: contain;

    scrollbar-width: none;
    -ms-overflow-style: none;
}

.dashboardGroupesTrack::-webkit-scrollbar {
    display: none;
}


/* ============================================================
   CARTES
============================================================ */

.dashboardGroupeCard {
    --card-accent: #00e5ff;
    --card-accent-rgb: 0, 229, 255;

    position: relative;
    display: flex;
    flex-direction: column;

    flex: 0 0 calc((100% - 51px) / 4);
    min-width: 0;
    min-height: 365px;
    padding: 0;

    overflow: hidden;

    background: linear-gradient(155deg, #202b43, #151d30 75%);

    border: 1px solid rgba(255, 255, 255, .075);
    border-radius: 18px;

    scroll-snap-align: start;

    transition:
        transform .3s ease,
        border-color .3s ease,
        box-shadow .3s ease;
}

.dashboardGroupeCard:hover {
    transform: translateY(-5px);

    border-color: rgba(var(--card-accent-rgb), .4);

    box-shadow:
        0 14px 30px rgba(0, 0, 0, .25),
        0 0 20px rgba(var(--card-accent-rgb), .08);
}


/* ============================================================
   VARIANTES DE COULEURS
============================================================ */

.dashboardGroupeCard.theme-purple {
    --card-accent: #b69cff;
    --card-accent-rgb: 139, 92, 246;
}

.dashboardGroupeCard.theme-green {
    --card-accent: #6ee7b7;
    --card-accent-rgb: 52, 211, 153;
}

.dashboardGroupeCard.theme-orange {
    --card-accent: #ffb36b;
    --card-accent-rgb: 249, 115, 22;
}

.dashboardGroupeCard.theme-pink {
    --card-accent: #f9a8d4;
    --card-accent-rgb: 236, 72, 153;
}


/* ============================================================
   BANDEAU GRAPHIQUE
============================================================ */

.dashboardGroupeCover {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;

    min-height: 105px;
    padding: 18px 20px;

    overflow: hidden;

    background:
        radial-gradient(circle at 85% 30%, rgba(var(--card-accent-rgb), .3), transparent 38%),
        linear-gradient(120deg, rgba(var(--card-accent-rgb), .17), rgba(255, 255, 255, .015));
}

.dashboardGroupeCover::before,
.dashboardGroupeCover::after {
    content: "";
    position: absolute;
    border: 1px solid rgba(var(--card-accent-rgb), .15);
    border-radius: 50%;
    pointer-events: none;
}

.dashboardGroupeCover::before {
    width: 130px;
    height: 130px;
    right: 5px;
    top: -75px;
}

.dashboardGroupeCover::after {
    width: 90px;
    height: 90px;
    right: 25px;
    top: -55px;
}

.dashboardGroupeAvatar {
    position: relative;
    z-index: 1;

    display: flex;
    align-items: center;
    justify-content: center;

    width: 53px;
    height: 53px;

    color: var(--card-accent);
    font-size: 21px;

    background: rgba(var(--card-accent-rgb), .12);
    border: 1px solid rgba(var(--card-accent-rgb), .3);
    border-radius: 16px;

    box-shadow: 0 0 25px rgba(var(--card-accent-rgb), .1);
}

.dashboardGroupeCoverLabel {
    position: relative;
    z-index: 1;

    color: rgba(255, 255, 255, .55);
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}


/* ============================================================
   STATUT
============================================================ */

.dashboardGroupeStatus {
    position: relative;
    z-index: 1;

    display: inline-flex;
    align-items: center;
    gap: 6px;

    width: fit-content;
    max-width: 100%;
    padding: 6px 9px;

    color: #78e6b3;
    font-size: 10px;
    font-weight: 700;

    background: rgba(46, 204, 113, .08);
    border: 1px solid rgba(46, 204, 113, .15);
    border-radius: 20px;
}

.dashboardGroupeStatusDot {
    width: 6px;
    height: 6px;
    flex-shrink: 0;

    background: #42d995;
    border-radius: 50%;
    box-shadow: 0 0 8px rgba(66, 217, 149, .7);
}


/* ============================================================
   CONTENU
============================================================ */

.dashboardGroupeContent {
    padding: 17px 18px 0;
}

.dashboardGroupeName {
    margin: 0 0 8px;

    color: #f2f5ff;
    font-size: 15px;
    font-weight: 750;
    line-height: 1.4;
}

.dashboardGroupeDescription {
    min-height: 54px;
    margin: 0;

    color: #929db4;
    font-size: 11px;
    line-height: 1.65;
}


/* ============================================================
   COTISATION
============================================================ */

.dashboardGroupeContribution {
    display: flex;
    align-items: center;
    gap: 10px;

    margin: 16px 18px 0;
    padding: 11px;

    background: rgba(var(--card-accent-rgb), .045);
    border: 1px solid rgba(var(--card-accent-rgb), .12);
    border-radius: 12px;
}

.dashboardGroupeContributionIcon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;

    width: 35px;
    height: 35px;

    color: var(--card-accent);
    background: rgba(var(--card-accent-rgb), .12);
    border-radius: 10px;
}

.dashboardGroupeContributionInfo {
    display: flex;
    flex-direction: column;
    min-width: 0;
}

.dashboardGroupeInfoLabel {
    margin-bottom: 3px;
    color: #929db4;
    font-size: 10px;
}

.dashboardGroupeContributionInfo strong {
    color: #f4f7ff;
    font-size: 14px;
    white-space: nowrap;
}

.dashboardGroupeContributionInfo small {
    color: var(--card-accent);
    font-size: 9px;
}

.dashboardGroupePeriod {
    margin-left: auto;
    color: #aab5cc;
    font-size: 9px;
    text-align: right;
}


/* ============================================================
   PARTICIPANTS
============================================================ */

.dashboardGroupeMembers {
    margin: 16px 18px 0;
}

.dashboardGroupeMembersInfo {
    display: flex;
    align-items: center;
    gap: 8px;

    color: #aab5cc;
    font-size: 10px;
}

.dashboardGroupeMembersInfo i {
    color: var(--card-accent);
}

.dashboardGroupeProgress {
    width: 100%;
    height: 5px;
    margin-top: 9px;

    overflow: hidden;

    background: rgba(255, 255, 255, .07);
    border-radius: 10px;
}

.dashboardGroupeProgress span {
    display: block;
    height: 100%;

    background: linear-gradient(90deg, #7c4dff, var(--card-accent));
    border-radius: 10px;

    transition: width .5s ease;
}


/* ============================================================
   FOOTER DE LA CARTE
============================================================ */

.dashboardGroupeCardFooter {
    margin-top: auto;
    padding: 15px 18px 17px;
}

.dashboardGroupeDetails {
    display: flex;
    align-items: center;
    justify-content: space-between;

    width: 100%;
    padding-top: 13px;

    color: var(--card-accent);
    font-size: 11px;
    font-weight: 750;
    text-decoration: none;

    border-top: 1px solid rgba(255, 255, 255, .07);

    transition: color .25s ease;
}

.dashboardGroupeDetails:hover {
    color: #fff;
    text-decoration: none;
}

.dashboardGroupeDetails i {
    transition: transform .25s ease;
}

.dashboardGroupeDetails:hover i {
    transform: translateX(5px);
}


/* ============================================================
   RESPONSIVE - PETITS ORDINATEURS
============================================================ */

@media (max-width: 1200px) {
    .dashboardGroupeCard {
        flex-basis: calc((100% - 34px) / 3);
    }
}


/* ============================================================
   RESPONSIVE - TABLETTES
============================================================ */

@media (max-width: 991px) {
    .dashboardGroupes {
        width: calc(100% - 40px);
    }
}

@media (max-width: 900px) {
    .dashboardGroupes {
        padding: 35px 20px;
    }

    .dashboardGroupeCard {
        flex-basis: calc((100% - 17px) / 2);
    }
}


/* ============================================================
   RESPONSIVE - MOBILES
============================================================ */

@media (max-width: 650px) {
    .dashboardGroupes {
        padding: 28px 18px;
    }

    .dashboardGroupesHeader {
        align-items: flex-start;
        flex-direction: column;
    }

    .dashboardGroupesHeaderActions {
        width: 100%;
        justify-content: space-between;
    }

    .dashboardGroupesTitle {
        font-size: 17px;
    }

    .dashboardGroupesSubtitle {
        max-width: 280px;
    }

    .dashboardGroupeCard {
        flex-basis: 85%;
    }
}

@media (max-width: 576px) {
    .dashboardGroupes {
        width: calc(100% - 30px);
        margin-bottom: 25px;
    }
}

@media (max-width: 420px) {
    .dashboardGroupes {
        padding: 24px 15px;
        border-radius: 17px;
    }

    .dashboardGroupesIcon {
        width: 44px;
        height: 44px;
    }

    .dashboardGroupesAll {
        padding: 9px 11px;
        font-size: 10px;
    }

    .dashboardGroupeCard {
        flex-basis: 92%;
    }
}


/* ============================================================
   ACCESSIBILITÉ : RÉDUCTION DES ANIMATIONS
============================================================ */

@media (prefers-reduced-motion: reduce) {
    .dashboardGroupes *,
    .dashboardGroupes *::before,
    .dashboardGroupes *::after {
        scroll-behavior: auto !important;
        transition-duration: .01ms !important;
        animation-duration: .01ms !important;
    }
}

</style>
<!-- ============================================================
     DASHBOARD - GROUPES À DÉCOUVRIR
============================================================ -->
@php
    $themesGroupes = [
        '',
        'theme-purple',
        'theme-green',
        'theme-orange',
        'theme-pink',
    ];
@endphp

<section class="dashboardGroupes">

    <!-- HEADER -->
    <div class="dashboardGroupesHeader">

        <div class="dashboardGroupesHeading">

            <div class="dashboardGroupesIcon">
                <i class="fas fa-users"></i>
            </div>

            <div>
                <span class="dashboardGroupesEyebrow">
                    COMMUNAUTÉ
                </span>

                <h3 class="dashboardGroupesTitle">
                    Groupes à découvrir
                </h3>

                <p class="dashboardGroupesSubtitle">
                    Rejoignez une communauté et participez à un projet collectif.
                </p>
            </div>

        </div>

        <div class="dashboardGroupesHeaderActions">

            <div class="dashboardGroupesNavigation">

                <button type="button"
                        class="dashboardGroupesArrow dashboardGroupesPrev"
                        aria-label="Groupes précédents">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button type="button"
                        class="dashboardGroupesArrow dashboardGroupesNext"
                        aria-label="Groupes suivants">
                    <i class="fas fa-chevron-right"></i>
                </button>

            </div>

            <a href="#" class="dashboardGroupesAll">
                Voir tous les groupes
                <i class="fas fa-arrow-right"></i>
            </a>

        </div>

    </div>


    <!-- CARROUSEL -->
    <div class="dashboardGroupesCarousel">

        <div class="dashboardGroupesTrack"
             tabindex="0"
             aria-label="Liste des groupes à découvrir">


            {{-- <!-- GROUPE 1 {{ $theme }}--> --}}
            {{-- @foreach($groupes as $index => $groupe)

                @php
                    $theme = $themesGroupes[$index % count($themesGroupes)];
                @endphp

                <article class="dashboardGroupeCard {{ $theme }}">

                    CONTENU DE LA CARTE

                </article>

            @endforeach --}}
            <article class="dashboardGroupeCard ">

                <div class="dashboardGroupeCover">

                    <div class="dashboardGroupeAvatar">
                        <i class="fas fa-people-group"></i>
                    </div>

                    <span class="dashboardGroupeCoverLabel">
                        Entraide
                    </span>

                </div>

                <div class="dashboardGroupeContent">

                    <span class="dashboardGroupeStatus">
                        <span class="dashboardGroupeStatusDot"></span>
                        Disponible
                    </span>

                    <h4 class="dashboardGroupeName">
                        Solidarité Plus
                    </h4>

                    <p class="dashboardGroupeDescription">
                        Un groupe dédié à l'entraide, à la solidarité et au développement de projets collectifs.
                    </p>

                </div>

                <div class="dashboardGroupeContribution">

                    <div class="dashboardGroupeContributionIcon">
                        <i class="fas fa-wallet"></i>
                    </div>

                    <div class="dashboardGroupeContributionInfo">
                        <span class="dashboardGroupeInfoLabel">
                            Cotisation
                        </span>

                        <strong>
                            25 000 <small>FCFA</small>
                        </strong>
                    </div>

                    <div class="dashboardGroupePeriod">
                        Mensuelle
                    </div>

                </div>

                <div class="dashboardGroupeMembers">

                    <div class="dashboardGroupeMembersInfo">
                        <i class="fas fa-user-group"></i>
                        <span>12 / 20 participants</span>
                    </div>

                    <div class="dashboardGroupeProgress">
                        <span style="width: 60%"></span>
                    </div>

                </div>

                <div class="dashboardGroupeCardFooter">

                    <a href="#" class="dashboardGroupeDetails">
                        Découvrir le groupe
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>

            </article>


            <!-- GROUPE 2 -->
            <article class="dashboardGroupeCard theme-purple">

                <div class="dashboardGroupeCover">

                    <div class="dashboardGroupeAvatar">
                        <i class="fas fa-handshake"></i>
                    </div>

                    <span class="dashboardGroupeCoverLabel">
                        Épargne
                    </span>

                </div>

                <div class="dashboardGroupeContent">

                    <span class="dashboardGroupeStatus">
                        <span class="dashboardGroupeStatusDot"></span>
                        Disponible
                    </span>

                    <h4 class="dashboardGroupeName">
                        Ensemble Avenir
                    </h4>

                    <p class="dashboardGroupeDescription">
                        Construisons ensemble un avenir meilleur grâce à l'épargne et à l'entraide.
                    </p>

                </div>

                <div class="dashboardGroupeContribution">

                    <div class="dashboardGroupeContributionIcon">
                        <i class="fas fa-wallet"></i>
                    </div>

                    <div class="dashboardGroupeContributionInfo">
                        <span class="dashboardGroupeInfoLabel">
                            Cotisation
                        </span>

                        <strong>
                            10 000 <small>FCFA</small>
                        </strong>
                    </div>

                    <div class="dashboardGroupePeriod">
                        Hebdomadaire
                    </div>

                </div>

                <div class="dashboardGroupeMembers">

                    <div class="dashboardGroupeMembersInfo">
                        <i class="fas fa-user-group"></i>
                        <span>8 / 15 participants</span>
                    </div>

                    <div class="dashboardGroupeProgress">
                        <span style="width: 53%"></span>
                    </div>

                </div>

                <div class="dashboardGroupeCardFooter">

                    <a href="#" class="dashboardGroupeDetails">
                        Découvrir le groupe
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>

            </article>


            <!-- GROUPE 3 -->
            <article class="dashboardGroupeCard theme-green">

                <div class="dashboardGroupeCover">

                    <div class="dashboardGroupeAvatar">
                        <i class="fas fa-chart-line"></i>
                    </div>

                    <span class="dashboardGroupeCoverLabel">
                        Entrepreneuriat
                    </span>

                </div>

                <div class="dashboardGroupeContent">

                    <span class="dashboardGroupeStatus">
                        <span class="dashboardGroupeStatusDot"></span>
                        Disponible
                    </span>

                    <h4 class="dashboardGroupeName">
                        Vision Entrepreneur
                    </h4>

                    <p class="dashboardGroupeDescription">
                        Un espace de collaboration pour financer des initiatives et développer des activités.
                    </p>

                </div>

                <div class="dashboardGroupeContribution">

                    <div class="dashboardGroupeContributionIcon">
                        <i class="fas fa-wallet"></i>
                    </div>

                    <div class="dashboardGroupeContributionInfo">
                        <span class="dashboardGroupeInfoLabel">
                            Cotisation
                        </span>

                        <strong>
                            50 000 <small>FCFA</small>
                        </strong>
                    </div>

                    <div class="dashboardGroupePeriod">
                        Mensuelle
                    </div>

                </div>

                <div class="dashboardGroupeMembers">

                    <div class="dashboardGroupeMembersInfo">
                        <i class="fas fa-user-group"></i>
                        <span>18 / 25 participants</span>
                    </div>

                    <div class="dashboardGroupeProgress">
                        <span style="width: 72%"></span>
                    </div>

                </div>

                <div class="dashboardGroupeCardFooter">

                    <a href="#" class="dashboardGroupeDetails">
                        Découvrir le groupe
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>

            </article>


            <!-- GROUPE 4 -->
            <article class="dashboardGroupeCard theme-orange">

                <div class="dashboardGroupeCover">

                    <div class="dashboardGroupeAvatar">
                        <i class="fas fa-house"></i>
                    </div>

                    <span class="dashboardGroupeCoverLabel">
                        Habitat
                    </span>

                </div>

                <div class="dashboardGroupeContent">

                    <span class="dashboardGroupeStatus">
                        <span class="dashboardGroupeStatusDot"></span>
                        Disponible
                    </span>

                    <h4 class="dashboardGroupeName">
                        Projet Habitat
                    </h4>

                    <p class="dashboardGroupeDescription">
                        Un groupe qui accompagne ses membres dans leurs projets immobiliers et familiaux.
                    </p>

                </div>

                <div class="dashboardGroupeContribution">

                    <div class="dashboardGroupeContributionIcon">
                        <i class="fas fa-wallet"></i>
                    </div>

                    <div class="dashboardGroupeContributionInfo">
                        <span class="dashboardGroupeInfoLabel">
                            Cotisation
                        </span>

                        <strong>
                            30 000 <small>FCFA</small>
                        </strong>
                    </div>

                    <div class="dashboardGroupePeriod">
                        Mensuelle
                    </div>

                </div>

                <div class="dashboardGroupeMembers">

                    <div class="dashboardGroupeMembersInfo">
                        <i class="fas fa-user-group"></i>
                        <span>10 / 20 participants</span>
                    </div>

                    <div class="dashboardGroupeProgress">
                        <span style="width: 50%"></span>
                    </div>

                </div>

                <div class="dashboardGroupeCardFooter">

                    <a href="#" class="dashboardGroupeDetails">
                        Découvrir le groupe
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>

            </article>


            <!-- GROUPE 5 -->
            <article class="dashboardGroupeCard theme-pink">

                <div class="dashboardGroupeCover">

                    <div class="dashboardGroupeAvatar">
                        <i class="fas fa-graduation-cap"></i>
                    </div>

                    <span class="dashboardGroupeCoverLabel">
                        Jeunesse
                    </span>

                </div>

                <div class="dashboardGroupeContent">

                    <span class="dashboardGroupeStatus">
                        <span class="dashboardGroupeStatusDot"></span>
                        Disponible
                    </span>

                    <h4 class="dashboardGroupeName">
                        Génération Solidaire
                    </h4>

                    <p class="dashboardGroupeDescription">
                        Un groupe qui encourage la solidarité entre jeunes et la réalisation de projets communs.
                    </p>

                </div>

                <div class="dashboardGroupeContribution">

                    <div class="dashboardGroupeContributionIcon">
                        <i class="fas fa-wallet"></i>
                    </div>

                    <div class="dashboardGroupeContributionInfo">
                        <span class="dashboardGroupeInfoLabel">
                            Cotisation
                        </span>

                        <strong>
                            5 000 <small>FCFA</small>
                        </strong>
                    </div>

                    <div class="dashboardGroupePeriod">
                        Hebdomadaire
                    </div>

                </div>

                <div class="dashboardGroupeMembers">

                    <div class="dashboardGroupeMembersInfo">
                        <i class="fas fa-user-group"></i>
                        <span>6 / 12 participants</span>
                    </div>

                    <div class="dashboardGroupeProgress">
                        <span style="width: 50%"></span>
                    </div>

                </div>

                <div class="dashboardGroupeCardFooter">

                    <a href="#" class="dashboardGroupeDetails">
                        Découvrir le groupe
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>

            </article>


        </div>

    </div>

</section>



<script>

/* ============================================================
   DASHBOARD - CARROUSEL DES GROUPES
============================================================ */

$(document).ready(function () {

    $('.dashboardGroupes').each(function () {

        const bloc = $(this);

        const track = bloc.find('.dashboardGroupesTrack');
        const cartes = bloc.find('.dashboardGroupeCard');

        const precedent = bloc.find('.dashboardGroupesPrev');
        const suivant = bloc.find('.dashboardGroupesNext');

        const elementTrack = track[0];
        const total = cartes.length;

        let indexActuel = 0;
        let animationEnCours = false;

        if (!total || !elementTrack) {
            return;
        }


        /* ====================================================
           POSITION D'UNE CARTE DANS LE CARROUSEL
        ==================================================== */

        function obtenirPosition(index) {

            const carte = cartes[index];

            if (!carte) {
                return 0;
            }

            const rectCarte = carte.getBoundingClientRect();
            const rectTrack = elementTrack.getBoundingClientRect();

            return rectCarte.left - rectTrack.left
                + elementTrack.scrollLeft;

        }


        /* ====================================================
           POSITION MAXIMALE DU CARROUSEL
        ==================================================== */

        function obtenirPositionMax() {

            return Math.max(
                0,
                elementTrack.scrollWidth - elementTrack.clientWidth
            );

        }


        /* ====================================================
           DÉTERMINER LA CARTE LA PLUS PROCHE DU DÉBUT
        ==================================================== */

        function trouverIndexActuel() {

            const rectTrack = elementTrack.getBoundingClientRect();

            let distanceMin = Infinity;
            let meilleurIndex = 0;

            cartes.each(function (index) {

                const rectCarte = this.getBoundingClientRect();

                const distance = Math.abs(
                    rectCarte.left - rectTrack.left
                );

                if (distance < distanceMin) {

                    distanceMin = distance;
                    meilleurIndex = index;

                }

            });

            return meilleurIndex;

        }


        /* ====================================================
           ACTUALISER LES FLÈCHES
        ==================================================== */

        function actualiserNavigation() {

            const position = elementTrack.scrollLeft;
            const positionMax = obtenirPositionMax();

            precedent.prop(
                'disabled',
                position <= 2
            );

            suivant.prop(
                'disabled',
                position >= positionMax - 2
            );

            // Masquer la navigation si tout tient dans l'espace.
            const debordement = positionMax > 2;

            bloc.find('.dashboardGroupesNavigation')
                .toggle(debordement);

        }


        /* ====================================================
           ALLER VERS UNE CARTE
        ==================================================== */

        function allerVers(index) {

            index = Math.max(
                0,
                Math.min(index, total - 1)
            );

            indexActuel = index;

            const positionMax = obtenirPositionMax();

            const positionSouhaitee = Math.min(
                obtenirPosition(index),
                positionMax
            );

            const mouvementReduit =
                window.matchMedia &&
                window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            animationEnCours = true;

            track.stop(true).animate(
                {
                    scrollLeft: positionSouhaitee
                },
                mouvementReduit ? 0 : 380,
                function () {

                    animationEnCours = false;

                    indexActuel = trouverIndexActuel();

                    actualiserNavigation();

                }
            );

            actualiserNavigation();

        }


        /* ====================================================
           FLÈCHE PRÉCÉDENTE
        ==================================================== */

        precedent.on('click', function () {

            if (animationEnCours) {
                return;
            }

            indexActuel = trouverIndexActuel();

            allerVers(indexActuel - 1);

        });


        /* ====================================================
           FLÈCHE SUIVANTE
        ==================================================== */

        suivant.on('click', function () {

            if (animationEnCours) {
                return;
            }

            indexActuel = trouverIndexActuel();

            allerVers(indexActuel + 1);

        });


        /* ====================================================
           DÉFILEMENT MANUEL / TACTILE
        ==================================================== */

        track.on('scroll', function () {

            indexActuel = trouverIndexActuel();

            actualiserNavigation();

        });


        /* ====================================================
           NAVIGATION AU CLAVIER
        ==================================================== */

        track.on('keydown', function (event) {

            if (event.key === 'ArrowRight') {

                event.preventDefault();

                allerVers(trouverIndexActuel() + 1);

            }

            if (event.key === 'ArrowLeft') {

                event.preventDefault();

                allerVers(trouverIndexActuel() - 1);

            }

        });


        /* ====================================================
           REDIMENSIONNEMENT
        ==================================================== */

        let resizeTimer;

        $(window).on('resize.dashboardGroupes', function () {

            clearTimeout(resizeTimer);

            resizeTimer = setTimeout(function () {

                indexActuel = trouverIndexActuel();

                actualiserNavigation();

            }, 120);

        });


        /* ====================================================
           INITIALISATION
        ==================================================== */

        actualiserNavigation();

    });

});

</script>
