@extends('dependances.templates.admins.navigations.menus.menu')
@section('titre')
    COMMUNAUTE
@endsection
@section('header')

{{--  --}}
@endsection
@section('corps')
    <section class="">
        <div class="modals">
            {{-- @include('dependances.templates.admins.gestions.delicatesses.periodicites._consoms.modal') --}}
        </div>
    </section>
    <section class="">
        <div class="head-ent">
            {{-- @include('dependances.templates.admins.gestions.delicatesses.periodicites._consoms.head') --}}
        </div>
    </section>
    <div>
        <div>
            <div>


<!-- ============================================================
     COMMUNAUTÉ — TTNE
     Bootstrap 4.6.2 | Font Awesome 4.7 | jQuery | GSAP
     Version statique, données centralisées en JavaScript
============================================================ -->

<div class="community-page">

    <!-- ESPACE DE RESPIRATION APRÈS LE DASHBOARD -->
    <div class="community-container">

        <!-- EN-TÊTE -->
        <section class="community-hero">
            <div class="community-hero-content">
                <div class="community-eyebrow">
                    <span class="eyebrow-line"></span>
                    <span>ESPACE COMMUNAUTAIRE</span>
                </div>

                <h1>
                    Découvrez votre prochaine
                    <span>communauté.</span>
                </h1>

                <p>
                    Explorez les groupes, comprenez leur fonctionnement
                    et prenez le temps de découvrir les membres avant
                    de vous engager.
                </p>

                <div class="community-hero-actions">
                    <button class="community-primary-btn"
                            data-toggle="modal"
                            data-target="#createGroupModal">
                        <i class="fa fa-plus"></i>
                        Créer un groupe
                    </button>

                    <a href="#" class="community-secondary-btn"
                       id="myGroupsShortcut">
                        <i class="fa fa-users"></i>
                        Mes groupes
                    </a>
                </div>
            </div>

            <div class="community-hero-visual">
                <div class="hero-orbit orbit-one"></div>
                <div class="hero-orbit orbit-two"></div>
                <div class="hero-orbit orbit-three"></div>

                <div class="hero-core">
                    <i class="fa fa-users"></i>
                </div>

                <div class="hero-floating hero-floating-one">
                    <i class="fa fa-shield"></i>
                    <span>Confiance</span>
                </div>

                <div class="hero-floating hero-floating-two">
                    <i class="fa fa-handshake-o"></i>
                    <span>Entraide</span>
                </div>

                <div class="hero-floating hero-floating-three">
                    <i class="fa fa-line-chart"></i>
                    <span>Évolution</span>
                </div>
            </div>
        </section>

        <!-- INDICATEURS -->
        <section class="community-overview">
            <div class="overview-item">
                <div class="overview-icon cyan">
                    <i class="fa fa-globe"></i>
                </div>
                <div>
                    <span class="overview-label">Groupes référencés</span>
                    <strong id="overviewGroups">06</strong>
                </div>
            </div>

            <div class="overview-item">
                <div class="overview-icon purple">
                    <i class="fa fa-users"></i>
                </div>
                <div>
                    <span class="overview-label">Membres visibles</span>
                    <strong>248</strong>
                </div>
            </div>

            <div class="overview-item">
                <div class="overview-icon green">
                    <i class="fa fa-check-circle"></i>
                </div>
                <div>
                    <span class="overview-label">Groupes actifs</span>
                    <strong>04</strong>
                </div>
            </div>

            <div class="overview-item">
                <div class="overview-icon orange">
                    <i class="fa fa-eye"></i>
                </div>
                <div>
                    <span class="overview-label">Transparence</span>
                    <strong>Prioritaire</strong>
                </div>
            </div>
        </section>

        <!-- EXPLORATEUR -->
        <section class="community-explorer">

            <div class="community-section-heading">
                <div>
                    <div class="community-eyebrow">
                        <span class="eyebrow-line"></span>
                        <span>EXPLORATION</span>
                    </div>
                    <h2>Trouvez le groupe qui vous correspond</h2>
                    <p>
                        Comparez les conditions et consultez les profils
                        des participants avant de faire votre choix.
                    </p>
                </div>

                <div class="explorer-count">
                    <strong id="resultCount">06</strong>
                    <span>résultats</span>
                </div>
            </div>

            <!-- BARRE DE RECHERCHE -->
            <div class="community-search-panel">
                <div class="community-search-box">
                    <i class="fa fa-search"></i>
                    <input type="text"
                           id="groupSearch"
                           placeholder="Rechercher un groupe, un créateur, une description...">
                    <button type="button" id="clearSearch" title="Effacer">
                        <i class="fa fa-times"></i>
                    </button>
                </div>

                <button class="filter-toggle-btn" type="button"
                        data-toggle="collapse"
                        data-target="#communityFilters">
                    <i class="fa fa-sliders"></i>
                    Filtres
                    <span id="activeFilterCount">0</span>
                </button>
            </div>

            <!-- FILTRES -->
            <div class="collapse show" id="communityFilters">
                <div class="community-filters">

                    <div class="filter-field">
                        <label>Visibilité</label>
                        <select id="filterVisibility">
                            <option value="">Toutes les visibilités</option>
                            <option value="PUBLIC">Public</option>
                            <option value="PRIVE">Privé</option>
                        </select>
                    </div>

                    <div class="filter-field">
                        <label>Statut</label>
                        <select id="filterStatus">
                            <option value="">Tous les statuts</option>
                            <option value="ACTIF">Actif</option>
                            <option value="SUSPENDU">Suspendu</option>
                        </select>
                    </div>

                    <div class="filter-field">
                        <label>Périodicité</label>
                        <select id="filterPeriod">
                            <option value="">Toutes les périodicités</option>
                            <option value="Hebdomadaire">Hebdomadaire</option>
                            <option value="Mensuelle">Mensuelle</option>
                            <option value="Bimensuelle">Bimensuelle</option>
                        </select>
                    </div>

                    <div class="filter-field">
                        <label>Montant maximum</label>
                        <select id="filterAmount">
                            <option value="">Tous les montants</option>
                            <option value="25000">25 000 FCFA</option>
                            <option value="50000">50 000 FCFA</option>
                            <option value="100000">100 000 FCFA</option>
                            <option value="200000">200 000 FCFA</option>
                        </select>
                    </div>

                    <div class="filter-field">
                        <label>Trier par</label>
                        <select id="sortGroups">
                            <option value="recent">Plus récents</option>
                            <option value="members">Plus de membres</option>
                            <option value="amountAsc">Cotisation croissante</option>
                            <option value="amountDesc">Cotisation décroissante</option>
                            <option value="name">Nom du groupe</option>
                        </select>
                    </div>

                    <button type="button" id="resetFilters"
                            class="filter-reset-btn">
                        <i class="fa fa-refresh"></i>
                        Réinitialiser
                    </button>
                </div>
            </div>

            <!-- LISTE DES GROUPES -->
            <div class="community-group-grid" id="communityGroupGrid"></div>

            <!-- AUCUN RÉSULTAT -->
            <div class="community-empty-state" id="emptyGroups" style="display:none;">
                <div class="empty-icon">
                    <i class="fa fa-search"></i>
                </div>
                <h3>Aucun groupe trouvé</h3>
                <p>
                    Essayez de modifier votre recherche ou vos filtres
                    pour découvrir d'autres communautés.
                </p>
                <button type="button" id="emptyResetFilters">
                    Réinitialiser les filtres
                </button>
            </div>

            <!-- PAGINATION -->
            <div class="community-pagination-wrapper">
                <div class="pagination-info" id="paginationInfo">
                    Affichage de 1 à 6 groupes
                </div>

                <nav aria-label="Pagination des groupes">
                    <ul class="community-pagination" id="communityPagination"></ul>
                </nav>
            </div>
        </section>

        <!-- CONFIANCE ET TRANSPARENCE -->
        <section class="trust-section">
            <div class="trust-section-heading">
                <div class="community-eyebrow">
                    <span class="eyebrow-line"></span>
                    <span>ENGAGEMENT ET TRANSPARENCE</span>
                </div>
                <h2>La confiance se construit sur des faits.</h2>
                <p>
                    Avant de rejoindre un groupe, prenez le temps de
                    comprendre son fonctionnement et de consulter les
                    informations disponibles sur ses participants.
                </p>
            </div>

            <div class="trust-grid">
                <div class="trust-card">
                    <div class="trust-icon">
                        <i class="fa fa-bar-chart"></i>
                    </div>
                    <h3>Des statistiques utiles</h3>
                    <p>
                        Consultez les participations, les retards,
                        les pénalités et les réalisations enregistrées.
                    </p>
                </div>

                <div class="trust-card">
                    <div class="trust-icon">
                        <i class="fa fa-user-circle"></i>
                    </div>
                    <h3>Des profils consultables</h3>
                    <p>
                        Découvrez les informations et l'historique
                        de participation des membres.
                    </p>
                </div>

                <div class="trust-card">
                    <div class="trust-icon">
                        <i class="fa fa-shield"></i>
                    </div>
                    <h3>Des décisions éclairées</h3>
                    <p>
                        Comparez les règles du groupe et les indicateurs
                        disponibles avant de vous engager.
                    </p>
                </div>
            </div>
        </section>

        <!-- AIDE -->
        <section class="community-help">
            <div class="help-icon">
                <i class="fa fa-question-circle"></i>
            </div>

            <div class="help-content">
                <h3>Besoin d'un éclaircissement ?</h3>
                <p>
                    Comprendre les groupes, les demandes d'adhésion,
                    les indicateurs de fiabilité ou les règles de cotisation.
                </p>
            </div>

            <a href="#" class="help-link" id="communityHelpLink">
                Centre d'aide
                <i class="fa fa-arrow-right"></i>
            </a>
        </section>

    </div>
</div>


<!-- ============================================================
     MODAL : DÉTAIL COMPLET DU GROUPE
============================================================ -->
<div class="modal fade futuristicModal community-modal"
     id="groupPreviewModal" tabindex="-1" role="dialog"
     aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable"
         role="document">
        <div class="modal-content futuristicContent">

            <div class="modal-header community-modal-header">
                <div>
                    <span class="modal-kicker">DÉCOUVERTE DU GROUPE</span>
                    <h4 class="modal-title" id="modalGroupName">Nom du groupe</h4>
                    <p id="modalGroupSubtitle"></p>
                </div>

                <button type="button" class="close modal-close"
                        data-dismiss="modal" aria-label="Fermer">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body community-modal-body">

                <div class="group-modal-cover">
                    <div class="group-modal-cover-content">
                        <div class="group-modal-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div>
                            <span id="modalGroupVisibility" class="group-badge"></span>
                            <span id="modalGroupStatus" class="group-badge"></span>
                            <h3 id="modalGroupTitle"></h3>
                            <p id="modalGroupDescription"></p>
                        </div>
                    </div>
                </div>

                <!-- CHIFFRES DU GROUPE -->
                <div class="group-detail-stats">
                    <div class="detail-stat">
                        <span>Participants</span>
                        <strong id="modalMembersCount">0</strong>
                    </div>
                    <div class="detail-stat">
                        <span>Cotisation</span>
                        <strong id="modalContribution">0 FCFA</strong>
                    </div>
                    <div class="detail-stat">
                        <span>Places disponibles</span>
                        <strong id="modalAvailablePlaces">0</strong>
                    </div>
                    <div class="detail-stat">
                        <span>Périodicité</span>
                        <strong id="modalPeriod">-</strong>
                    </div>
                </div>

                <!-- INFORMATIONS ET RÈGLES -->
                <div class="group-detail-grid">
                    <div class="group-detail-panel">
                        <div class="detail-panel-heading">
                            <i class="fa fa-info-circle"></i>
                            <h5>Informations générales</h5>
                        </div>

                        <div class="detail-line">
                            <span>Créateur</span>
                            <strong id="modalCreator"></strong>
                        </div>
                        <div class="detail-line">
                            <span>Mode de distribution</span>
                            <strong id="modalDistribution"></strong>
                        </div>
                        <div class="detail-line">
                            <span>Validation des membres</span>
                            <strong id="modalValidation"></strong>
                        </div>
                        <div class="detail-line">
                            <span>Date de démarrage</span>
                            <strong id="modalStartDate"></strong>
                        </div>
                        <div class="detail-line">
                            <span>Fin estimée</span>
                            <strong id="modalEndDate"></strong>
                        </div>
                    </div>

                    <div class="group-detail-panel">
                        <div class="detail-panel-heading">
                            <i class="fa fa-gavel"></i>
                            <h5>Règles et engagements</h5>
                        </div>

                        <div class="detail-line">
                            <span>Pénalité de retard</span>
                            <strong id="modalPenalty"></strong>
                        </div>
                        <div class="detail-line">
                            <span>Fonds d'assurance</span>
                            <strong id="modalInsurance"></strong>
                        </div>
                        <div class="detail-line">
                            <span>Délai de grâce</span>
                            <strong id="modalGrace"></strong>
                        </div>
                        <div class="detail-line">
                            <span>Effectif maximum</span>
                            <strong id="modalMaxMembers"></strong>
                        </div>
                        <div class="detail-line">
                            <span>Conditions d'adhésion</span>
                            <strong id="modalJoinCondition"></strong>
                        </div>
                    </div>
                </div>

                <!-- MEMBRES DU GROUPE -->
                <div class="group-members-section">
                    <div class="members-section-heading">
                        <div>
                            <span class="modal-kicker">COMPOSITION DU GROUPE</span>
                            <h5>Découvrez les participants</h5>
                            <p>
                                Consultez leurs indicateurs de participation
                                avant de prendre votre décision.
                            </p>
                        </div>

                        <span class="members-total" id="modalMembersLabel"></span>
                    </div>

                    <div class="group-members-list" id="modalMembersList"></div>
                </div>

                <div class="trust-disclaimer">
                    <i class="fa fa-info-circle"></i>
                    <span>
                        Les indicateurs présentés sont des données de démonstration.
                        Ils devront être calculés à partir d'événements vérifiables,
                        avec des règles transparentes et une possibilité de contestation.
                        Une note ne constitue pas, à elle seule, une garantie de fiabilité.
                    </span>
                </div>
            </div>

            <div class="modal-footer community-modal-footer">
                <button type="button" class="community-modal-secondary"
                        data-dismiss="modal">
                    Fermer
                </button>

                <button type="button" class="community-primary-btn"
                        id="groupJoinButton">
                    <i class="fa fa-paper-plane"></i>
                    Demander à rejoindre
                </button>
            </div>

        </div>
    </div>
</div>


<!-- ============================================================
     MODAL : PROFIL STATISTIQUE D'UN MEMBRE
============================================================ -->
<div class="modal fade futuristicModal community-modal member-profile-modal"
     id="memberProfileModal" tabindex="-1" role="dialog"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
         role="document">
        <div class="modal-content futuristicContent">

            <div class="modal-header community-modal-header">
                <div>
                    <span class="modal-kicker">PROFIL PARTICIPANT</span>
                    <h4 class="modal-title">Fiche de participation</h4>
                </div>

                <button type="button" class="close modal-close"
                        data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body community-modal-body">

                <div class="member-profile-header">
                    <div class="member-profile-avatar" id="profileAvatar"></div>

                    <div class="member-profile-identity">
                        <h3 id="profileName"></h3>
                        <p id="profileRole"></p>
                        <span id="profileSince"></span>
                    </div>

                    <div class="member-score">
                        <strong id="profileScore">0</strong>
                        <span>/100</span>
                        <small>Indice indicatif</small>
                    </div>
                </div>

                <div class="profile-stat-grid">
                    <div class="profile-stat-card">
                        <i class="fa fa-trophy"></i>
                        <strong id="profileCompleted">0</strong>
                        <span>Cycles réalisés</span>
                    </div>

                    <div class="profile-stat-card">
                        <i class="fa fa-check-circle"></i>
                        <strong id="profileParticipations">0</strong>
                        <span>Participations</span>
                    </div>

                    <div class="profile-stat-card">
                        <i class="fa fa-clock-o"></i>
                        <strong id="profileOnTime">0%</strong>
                        <span>Paiements à temps</span>
                    </div>

                    <div class="profile-stat-card">
                        <i class="fa fa-exclamation-triangle"></i>
                        <strong id="profileLate">0</strong>
                        <span>Retards enregistrés</span>
                    </div>

                    <div class="profile-stat-card">
                        <i class="fa fa-gavel"></i>
                        <strong id="profilePenalties">0</strong>
                        <span>Pénalités appliquées</span>
                    </div>

                    <div class="profile-stat-card">
                        <i class="fa fa-star"></i>
                        <strong id="profileRating">0/5</strong>
                        <span>Évaluation moyenne</span>
                    </div>
                </div>

                <div class="profile-detail-grid">
                    <div class="group-detail-panel">
                        <div class="detail-panel-heading">
                            <i class="fa fa-line-chart"></i>
                            <h5>Performance de participation</h5>
                        </div>

                        <div class="performance-row">
                            <div>
                                <span>Régularité des cotisations</span>
                                <strong id="profileRegularityText">0%</strong>
                            </div>
                            <div class="performance-track">
                                <span id="profileRegularityBar"></span>
                            </div>
                        </div>

                        <div class="performance-row">
                            <div>
                                <span>Respect des échéances</span>
                                <strong id="profileDeadlineText">0%</strong>
                            </div>
                            <div class="performance-track">
                                <span id="profileDeadlineBar"></span>
                            </div>
                        </div>

                        <div class="performance-row">
                            <div>
                                <span>Engagement global</span>
                                <strong id="profileEngagementText">0%</strong>
                            </div>
                            <div class="performance-track">
                                <span id="profileEngagementBar"></span>
                            </div>
                        </div>
                    </div>

                    <div class="group-detail-panel">
                        <div class="detail-panel-heading">
                            <i class="fa fa-commenting"></i>
                            <h5>Évaluations reçues</h5>
                        </div>

                        <div class="profile-rating-summary">
                            <strong id="profileRatingLarge">0.0</strong>
                            <div>
                                <div class="rating-stars" id="profileStars"></div>
                                <span id="profileReviewCount">0 évaluation</span>
                            </div>
                        </div>

                        <p class="profile-rating-note">
                            Les évaluations doivent être associées à une
                            participation réelle et respecter les règles
                            de modération de la plateforme.
                        </p>
                    </div>
                </div>

                <div class="profile-history">
                    <div class="detail-panel-heading">
                        <i class="fa fa-history"></i>
                        <h5>Historique récent</h5>
                    </div>
                    <div id="profileHistoryList"></div>
                </div>

                <div class="trust-disclaimer">
                    <i class="fa fa-info-circle"></i>
                    <span>
                        Ces données sont fictives pour la maquette.
                        Les pénalités doivent être distinguées des retards,
                        et les évaluations ne doivent jamais remplacer
                        les faits vérifiables.
                    </span>
                </div>

            </div>

            <div class="modal-footer community-modal-footer">
                <button type="button" class="community-modal-secondary"
                        data-dismiss="modal">
                    Fermer le profil
                </button>
            </div>

        </div>
    </div>
</div>


<!-- ============================================================
     MODAL : CRÉATION DE GROUPE / APERÇU DES INVITÉS
============================================================ -->
{{-- <div class="modal fade futuristicModal community-modal"
     id="createGroupModal" tabindex="-1" role="dialog"
     aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable"
         role="document">
        <div class="modal-content futuristicContent">

            <div class="modal-header community-modal-header">
                <div>
                    <span class="modal-kicker">NOUVELLE COMMUNAUTÉ</span>
                    <h4 class="modal-title">Créer un groupe</h4>
                    <p>Préparez votre groupe et sélectionnez vos futurs participants.</p>
                </div>

                <button type="button" class="close modal-close"
                        data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body community-modal-body">

                <form id="staticCreateGroupForm">

                    <div class="create-group-section">
                        <div class="detail-panel-heading">
                            <i class="fa fa-sliders"></i>
                            <h5>Informations du groupe</h5>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="create-field">
                                    <label>Nom du groupe</label>
                                    <input type="text" class="form-control"
                                           name="nom" required
                                           placeholder="Ex. Les bâtisseurs">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="create-field">
                                    <label>Montant de cotisation (FCFA)</label>
                                    <input type="number" class="form-control"
                                           name="montant_cotisation"
                                           min="1" required
                                           placeholder="Ex. 50000">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="create-field">
                                    <label>Périodicité</label>
                                    <select class="form-control" name="periodicite_id">
                                        <option value="1">Mensuelle</option>
                                        <option value="2">Hebdomadaire</option>
                                        <option value="3">Bimensuelle</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="create-field">
                                    <label>Nombre maximum de participants</label>
                                    <input type="number" class="form-control"
                                           name="nombre_participants_max"
                                           min="2" value="10">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="create-field">
                                    <label>Visibilité</label>
                                    <select class="form-control" name="visibilite_id">
                                        <option value="17">Public</option>
                                        <option value="18">Privé</option>
                                        <option value="19">Secret</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="create-field">
                                    <label>Validation des membres</label>
                                    <select class="form-control" name="validation_membre_id">
                                        <option value="16">Validation par le créateur</option>
                                        <option value="15">Automatique</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="create-field">
                                    <label>Description</label>
                                    <textarea class="form-control"
                                              name="description" rows="3"
                                              placeholder="Présentez votre groupe et ses objectifs..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="create-group-section invite-section">
                        <div class="members-section-heading">
                            <div>
                                <span class="modal-kicker">CONSTITUTION DU GROUPE</span>
                                <h5>Choisissez vos futurs participants</h5>
                                <p>
                                    Consultez leurs profils et leurs indicateurs
                                    avant de sélectionner les personnes à inviter.
                                </p>
                            </div>

                            <span class="members-total" id="selectedInviteCount">
                                0 sélectionné
                            </span>
                        </div>

                        <div class="invite-search">
                            <i class="fa fa-search"></i>
                            <input type="text" id="inviteSearch"
                                   placeholder="Rechercher un membre...">
                        </div>

                        <div class="invite-members-grid" id="inviteMembersGrid"></div>
                    </div>

                </form>

                <div class="trust-disclaimer">
                    <i class="fa fa-info-circle"></i>
                    <span>
                        La sélection est une démonstration front-end.
                        Les invitations réelles seront gérées par les règles
                        d'adhésion et les autorisations de ton application.
                    </span>
                </div>
            </div>

            <div class="modal-footer community-modal-footer">
                <button type="button" class="community-modal-secondary"
                        data-dismiss="modal">
                    Annuler
                </button>

                <button type="button" class="community-primary-btn"
                        id="staticCreateGroupButton">
                    <i class="fa fa-check"></i>
                    Préparer le groupe
                </button>
            </div>

        </div>
    </div>
</div> --}}

<div class="modal fade futuristicModal"
     tabindex="-1"
     aria-hidden="true"
     id="createGroupModal"
     data-stepper="true"
     data-step="1"
     data-max-step="5">

    <div class="modal-dialog modal-xl modal-dialog-centered monstepper">
        <div class="modal-content futuristicContent">

            <form id="staticCreateGroupForm"
                  method="POST"
                  action="{{route('AjouterGroupeUtilisateur')}}">

                @csrf

                <div class="modalLight"></div>

                {{-- HEADER --}}
                <div class="modal-header futuristicHeader">

                    <div class="headerLeft">

                        <div class="headerIcon">
                            <i class="fa fa-users"></i>
                        </div>

                        <div>
                            <h2 class="futuristicTitle">Nouveau groupe</h2>
                            <p class="futuristicSubTitle">
                                Création d'un espace communautaire
                            </p>
                        </div>

                    </div>

                    <button type="button"
                            class="close futuristicClose"
                            data-dismiss="modal"
                            aria-label="Fermer">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <div class="form">

                    {{-- BODY --}}
                    <div class="modal-body futuristicBody">

                        {{-- STEPPER --}}
                        <div class="futureStepper">

                            <div class="stepItem active" data-step="1">
                                <span>1</span>
                                <p>Identité</p>
                            </div>

                            <div class="stepLine"></div>

                            <div class="stepItem" data-step="2">
                                <span>2</span>
                                <p>Cotisation</p>
                            </div>

                            <div class="stepLine"></div>

                            <div class="stepItem" data-step="3">
                                <span>3</span>
                                <p>Finances</p>
                            </div>

                            <div class="stepLine"></div>

                            <div class="stepItem" data-step="4">
                                <span>4</span>
                                <p>Fonctionnement</p>
                            </div>

                            <div class="stepLine"></div>

                            <div class="stepItem" data-step="5">
                                <span>5</span>
                                <p>Personnalisation</p>
                            </div>

                        </div>

                        {{-- STEP 1 : IDENTITÉ --}}
                        <div class="stepContent active" data-content="1">
                            @include('dependances.templates.admins.gestions.communautes.groupes._groupes.modalcreations.steep1')
                        </div>

                        {{-- STEP 2 : COTISATION --}}
                        <div class="stepContent" data-content="2">
                            @include('dependances.templates.admins.gestions.communautes.groupes._groupes.modalcreations.steep2')
                        </div>

                        {{-- STEP 3 : FINANCES --}}
                        <div class="stepContent" data-content="3">
                            @include('dependances.templates.admins.gestions.communautes.groupes._groupes.modalcreations.steep3')
                        </div>

                        {{-- STEP 4 : FONCTIONNEMENT --}}
                        <div class="stepContent" data-content="4">
                            @include('dependances.templates.admins.gestions.communautes.groupes._groupes.modalcreations.steep4')
                        </div>

                        {{-- STEP 5 : PERSONNALISATION ET INVITATIONS --}}
                        <div class="stepContent" data-content="5">
                            @include('dependances.templates.admins.gestions.communautes.groupes._groupes.modalcreations.steep5')
                        </div>

                    </div>
                </div>

                {{-- FOOTER --}}
                <div class="modal-footer futuristicFooter justify-content-between">

                    <button type="button"
                            class="futureBtn darkBtn examenBtnFermer"
                            data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        Annuler
                    </button>

                    <div class="examenDemandeActions" style="gap:15px;">

                        {{-- PRÉCÉDENT --}}
                        <button type="button"
                                class="futureBtn dangerBtn prevStep"
                                style="display:none;">
                            <i class="fa fa-arrow-left"></i>
                            Retour
                        </button>

                        {{-- SUIVANT --}}
                        <button type="button"
                                class="futureBtn successBtn nextStep">
                            Continuer
                            <i class="fa fa-arrow-right"></i>
                        </button>

                        {{-- CRÉATION --}}
                        <button type="submit"
                                class="futureBtn successBtn submitStep"
                                form="staticCreateGroupForm"
                                >
                            <i class="fa fa-check"></i>
                            Créer le groupe
                        </button>

                    </div>

                </div>

            </form>

        </div>
    </div>
</div>



<style>
/* ============================================================
   COMMUNAUTÉ — IDENTITÉ VISUELLE
============================================================ */

.community-page {
    --community-bg: #080708;
    --community-panel: #111116;
    --community-panel-soft: #17171e;
    --community-border: rgba(255,255,255,.075);
    --community-text: #fffdfd;
    --community-muted: #92909b;
    --community-cyan: #00e5ff;
    --community-purple: #9b72ff;
    --community-green: #39d6a1;
    --community-orange: #ffb86b;
    color: var(--community-text);
    width: 100%;
    padding: 0 0 45px;
    position: relative;
    font-family: inherit;
}

/* Cet espace sépare le contenu du dashboard existant. */
.community-container {
    width: 100%;
    max-width: 1600px;
    margin: 0 auto;
    padding: 38px 30px 0;
}

.community-page * {
    box-sizing: border-box;
}

.community-page button,
.community-page input,
.community-page select,
.community-page textarea {
    font-family: inherit;
}

.community-page button:focus,
.community-page input:focus,
.community-page select:focus,
.community-page textarea:focus {
    outline: none;
    box-shadow: none;
}

/* HERO */
.community-hero {
    min-height: 300px;
    padding: 42px 48px;
    border: 1px solid rgba(0,229,255,.13);
    border-radius: 22px;
    background:
        radial-gradient(circle at 78% 50%, rgba(0,229,255,.10), transparent 29%),
        radial-gradient(circle at 95% 5%, rgba(155,114,255,.13), transparent 32%),
        linear-gradient(120deg, #111116, #10121b 65%, #11101a);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
    overflow: hidden;
    position: relative;
}

.community-hero:before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(255,255,255,.018) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(255,255,255,.018) 1px, transparent 1px);
    background-size: 34px 34px;
    mask-image: linear-gradient(to right, transparent, black);
    pointer-events: none;
}

.community-hero-content {
    position: relative;
    z-index: 2;
    max-width: 650px;
}

.community-eyebrow {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--community-cyan);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2.2px;
    margin-bottom: 16px;
}

.eyebrow-line {
    display: inline-block;
    width: 27px;
    height: 2px;
    background: var(--community-cyan);
    box-shadow: 0 0 12px var(--community-cyan);
}

.community-hero h1 {
    font-size: clamp(30px, 4vw, 48px);
    font-weight: 800;
    line-height: 1.12;
    letter-spacing: -1.5px;
    margin: 0 0 18px;
    color: #fff;
}

.community-hero h1 span {
    color: var(--community-cyan);
    text-shadow: 0 0 24px rgba(0,229,255,.22);
}

.community-hero-content > p {
    color: #aaa8b4;
    font-size: 14px;
    line-height: 1.8;
    max-width: 570px;
    margin-bottom: 25px;
}

.community-hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.community-primary-btn,
.community-secondary-btn,
.community-modal-secondary {
    min-height: 44px;
    border-radius: 9px;
    padding: 0 19px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none !important;
    cursor: pointer;
    transition: .25s ease;
}

.community-primary-btn {
    color: #071014;
    border: 1px solid var(--community-cyan);
    background: var(--community-cyan);
    box-shadow: 0 7px 24px rgba(0,229,255,.12);
}

.community-primary-btn:hover {
    color: #071014;
    background: #75f1ff;
    transform: translateY(-2px);
    box-shadow: 0 10px 28px rgba(0,229,255,.22);
}

.community-secondary-btn {
    color: #e9e8ef;
    border: 1px solid rgba(255,255,255,.14);
    background: rgba(255,255,255,.035);
}

.community-secondary-btn:hover {
    color: var(--community-cyan);
    border-color: rgba(0,229,255,.4);
}

/* HERO VISUAL */
.community-hero-visual {
    position: relative;
    width: 310px;
    height: 250px;
    flex: 0 0 310px;
}

.hero-orbit {
    position: absolute;
    border: 1px solid rgba(0,229,255,.18);
    border-radius: 50%;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
}

.orbit-one { width: 145px; height: 145px; }
.orbit-two { width: 205px; height: 205px; border-color: rgba(155,114,255,.2); }
.orbit-three { width: 265px; height: 265px; border-style: dashed; opacity: .65; }

.hero-core {
    position: absolute;
    left: 50%;
    top: 50%;
    width: 82px;
    height: 82px;
    transform: translate(-50%,-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 24px;
    color: var(--community-cyan);
    font-size: 31px;
    background: linear-gradient(145deg, #1c2732, #14131f);
    border: 1px solid rgba(0,229,255,.35);
    box-shadow: 0 0 45px rgba(0,229,255,.18);
}

.hero-floating {
    position: absolute;
    display: flex;
    align-items: center;
    gap: 7px;
    padding: 9px 12px;
    border-radius: 8px;
    font-size: 10px;
    font-weight: 700;
    color: #eaeaf2;
    background: rgba(22,23,32,.94);
    border: 1px solid rgba(255,255,255,.10);
    box-shadow: 0 8px 25px rgba(0,0,0,.25);
}

.hero-floating i { color: var(--community-cyan); }
.hero-floating-one { top: 15px; right: 4px; }
.hero-floating-two { bottom: 28px; left: -3px; }
.hero-floating-three { bottom: 5px; right: 0; }

/* OVERVIEW */
.community-overview {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin: 22px 0 62px;
}

.overview-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 19px;
    min-height: 88px;
    border-radius: 13px;
    border: 1px solid var(--community-border);
    background: linear-gradient(145deg, #14141a, #101015);
}

.overview-icon {
    width: 43px;
    height: 43px;
    flex: 0 0 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 17px;
}

.overview-icon.cyan { color: var(--community-cyan); background: rgba(0,229,255,.09); }
.overview-icon.purple { color: var(--community-purple); background: rgba(155,114,255,.11); }
.overview-icon.green { color: var(--community-green); background: rgba(57,214,161,.09); }
.overview-icon.orange { color: var(--community-orange); background: rgba(255,184,107,.09); }

.overview-label {
    display: block;
    color: var(--community-muted);
    font-size: 10px;
    margin-bottom: 5px;
}

.overview-item strong {
    font-size: 19px;
    color: #fff;
    font-weight: 800;
}

/* EXPLORER */
.community-explorer {
    margin-bottom: 65px;
}

.community-section-heading,
.members-section-heading {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 24px;
}

.community-section-heading h2,
.trust-section-heading h2 {
    color: #fff;
    font-size: clamp(23px, 3vw, 30px);
    font-weight: 800;
    letter-spacing: -.6px;
    margin: 0 0 9px;
}

.community-section-heading p,
.trust-section-heading > p {
    color: var(--community-muted);
    font-size: 12px;
    line-height: 1.7;
    margin: 0;
}

.explorer-count {
    text-align: right;
    white-space: nowrap;
}

.explorer-count strong {
    color: var(--community-cyan);
    font-size: 26px;
    display: block;
}

.explorer-count span {
    color: var(--community-muted);
    font-size: 10px;
}

.community-search-panel {
    display: flex;
    gap: 12px;
    margin-bottom: 12px;
}

.community-search-box,
.invite-search {
    flex: 1;
    display: flex;
    align-items: center;
    min-height: 49px;
    padding: 0 15px;
    border: 1px solid var(--community-border);
    border-radius: 10px;
    background: #111116;
}

.community-search-box > i,
.invite-search > i {
    color: var(--community-cyan);
    margin-right: 12px;
}

.community-search-box input,
.invite-search input {
    width: 100%;
    border: 0;
    background: transparent;
    color: #fff;
    font-size: 12px;
}

.community-search-box input::placeholder,
.invite-search input::placeholder {
    color: #777581;
}

.community-search-box button {
    border: 0;
    background: transparent;
    color: #777581;
    cursor: pointer;
}

.filter-toggle-btn {
    border: 1px solid rgba(155,114,255,.28);
    color: #d6c8ff;
    background: rgba(155,114,255,.08);
    border-radius: 10px;
    padding: 0 17px;
    font-size: 12px;
    font-weight: 700;
}

.filter-toggle-btn span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 19px;
    height: 19px;
    margin-left: 5px;
    border-radius: 50%;
    color: #fff;
    background: rgba(155,114,255,.4);
    font-size: 10px;
}

.community-filters {
    display: grid;
    grid-template-columns: repeat(5, 1fr) auto;
    gap: 11px;
    padding: 17px;
    margin-bottom: 23px;
    border: 1px solid var(--community-border);
    border-radius: 12px;
    background: #101015;
}

.filter-field label {
    display: block;
    margin-bottom: 7px;
    color: #8f8d99;
    font-size: 10px;
    font-weight: 700;
}

.filter-field select {
    width: 100%;
    height: 39px;
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 7px;
    padding: 0 9px;
    color: #e7e6ed;
    background: #191920;
    font-size: 10px;
}

.filter-reset-btn {
    align-self: end;
    height: 39px;
    padding: 0 12px;
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 7px;
    color: #aaa8b4;
    background: transparent;
    font-size: 10px;
    cursor: pointer;
}

/* GROUP CARDS */
.community-group-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
}

.group-card {
    min-width: 0;
    overflow: hidden;
    border-radius: 15px;
    border: 1px solid rgba(255,255,255,.08);
    background: linear-gradient(145deg, #15151c, #101015);
    transition: transform .28s ease, border-color .28s ease, box-shadow .28s ease;
    cursor: pointer;
}

.group-card:hover {
    transform: translateY(-5px);
    border-color: rgba(0,229,255,.28);
    box-shadow: 0 15px 35px rgba(0,0,0,.24), 0 0 25px rgba(0,229,255,.035);
}

.group-card-cover {
    min-height: 105px;
    padding: 17px;
    position: relative;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    background:
        radial-gradient(circle at 80% 20%, rgba(0,229,255,.16), transparent 34%),
        linear-gradient(125deg, #1a202b, #171421);
}

.group-card-cover.purple-cover {
    background: radial-gradient(circle at 80% 20%, rgba(155,114,255,.2), transparent 34%), linear-gradient(125deg,#201a2c,#171421);
}
.group-card-cover.green-cover {
    background: radial-gradient(circle at 80% 20%, rgba(57,214,161,.17), transparent 34%), linear-gradient(125deg,#142722,#171421);
}
.group-card-cover.orange-cover {
    background: radial-gradient(circle at 80% 20%, rgba(255,184,107,.16), transparent 34%), linear-gradient(125deg,#2b2119,#171421);
}

.group-cover-icon {
    width: 47px;
    height: 47px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255,255,255,.13);
    border-radius: 13px;
    color: var(--community-cyan);
    background: rgba(255,255,255,.055);
    font-size: 19px;
}

.group-badge {
    display: inline-flex;
    align-items: center;
    padding: 6px 9px;
    border-radius: 30px;
    color: #c5faff;
    background: rgba(0,229,255,.11);
    border: 1px solid rgba(0,229,255,.15);
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .4px;
    margin: 0 4px 4px 0;
}

.group-badge.private {
    color: #dfd1ff;
    background: rgba(155,114,255,.13);
    border-color: rgba(155,114,255,.2);
}

.group-badge.suspended {
    color: #ffd5a6;
    background: rgba(255,184,107,.1);
    border-color: rgba(255,184,107,.2);
}

.group-card-body {
    padding: 18px;
}

.group-card-title-row {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 10px;
}

.group-card h3 {
    color: #fff;
    font-size: 16px;
    font-weight: 800;
    margin: 0 0 8px;
}

.group-card-description {
    min-height: 42px;
    color: #9694a0;
    font-size: 11px;
    line-height: 1.65;
    margin: 0 0 16px;
}

.group-creator {
    display: flex;
    align-items: center;
    gap: 9px;
    color: #9e9ca8;
    font-size: 10px;
    margin-bottom: 16px;
}

.creator-avatar,
.member-avatar,
.invite-avatar {
    width: 31px;
    height: 31px;
    flex: 0 0 31px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #e9fbff;
    background: linear-gradient(135deg,#245c6b,#4a3d7a);
    font-size: 10px;
    font-weight: 800;
}

.group-creator strong {
    display: block;
    color: #e8e7ee;
    font-size: 10px;
    margin-top: 3px;
}

.group-card-metrics {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 9px;
    padding: 13px 0;
    border-top: 1px solid rgba(255,255,255,.07);
    border-bottom: 1px solid rgba(255,255,255,.07);
}

.group-metric span {
    display: block;
    color: #85838f;
    font-size: 9px;
    margin-bottom: 5px;
}

.group-metric strong {
    color: #f5f4fa;
    font-size: 12px;
}

.group-members-preview {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    padding: 13px 0 2px;
}

.member-avatar-stack {
    display: flex;
    align-items: center;
}

.member-avatar-stack .member-avatar {
    width: 27px;
    height: 27px;
    flex-basis: 27px;
    margin-left: -7px;
    border: 2px solid #15151c;
    font-size: 8px;
}

.member-avatar-stack .member-avatar:first-child { margin-left: 0; }

.member-preview-link {
    color: var(--community-cyan);
    font-size: 10px;
    font-weight: 700;
}

.group-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 13px 18px;
    border-top: 1px solid rgba(255,255,255,.055);
    color: #8d8b97;
    font-size: 10px;
}

.group-card-footer strong {
    color: var(--community-cyan);
    font-weight: 800;
}

.group-card-footer i { margin-left: 5px; }

/* PAGINATION */
.community-pagination-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-top: 27px;
}

.pagination-info {
    color: #85838f;
    font-size: 10px;
}

.community-pagination {
    display: flex;
    align-items: center;
    gap: 6px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.community-pagination button {
    min-width: 34px;
    height: 34px;
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 7px;
    color: #aaa8b4;
    background: #14141a;
    font-size: 11px;
    cursor: pointer;
}

.community-pagination button.active {
    color: #071014;
    border-color: var(--community-cyan);
    background: var(--community-cyan);
    font-weight: 800;
}

.community-pagination button:disabled {
    opacity: .3;
    cursor: not-allowed;
}

/* EMPTY */
.community-empty-state {
    text-align: center;
    padding: 55px 20px;
    border: 1px dashed rgba(255,255,255,.12);
    border-radius: 14px;
    background: rgba(255,255,255,.015);
}

.empty-icon {
    width: 55px;
    height: 55px;
    margin: 0 auto 15px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--community-cyan);
    background: rgba(0,229,255,.08);
    font-size: 20px;
}

.community-empty-state h3 {
    color: #fff;
    font-size: 17px;
    font-weight: 800;
}

.community-empty-state p {
    color: #9997a3;
    font-size: 11px;
}

.community-empty-state button {
    border: 0;
    color: var(--community-cyan);
    background: transparent;
    font-size: 11px;
    font-weight: 800;
    cursor: pointer;
}

/* TRUST */
.trust-section {
    padding: 35px;
    border: 1px solid rgba(155,114,255,.12);
    border-radius: 18px;
    background: radial-gradient(circle at 95% 0, rgba(155,114,255,.08), transparent 35%), #111116;
    margin-bottom: 22px;
}

.trust-section-heading {
    max-width: 700px;
    margin-bottom: 25px;
}

.trust-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 13px;
}

.trust-card {
    padding: 20px;
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,.07);
    background: rgba(255,255,255,.025);
}

.trust-icon {
    width: 39px;
    height: 39px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    color: var(--community-purple);
    background: rgba(155,114,255,.11);
    font-size: 16px;
    margin-bottom: 15px;
}

.trust-card h3 {
    color: #f5f4fa;
    font-size: 13px;
    font-weight: 800;
}

.trust-card p {
    color: #92909b;
    font-size: 11px;
    line-height: 1.7;
    margin: 0;
}

/* HELP */
.community-help {
    display: flex;
    align-items: center;
    gap: 17px;
    padding: 20px 24px;
    border: 1px solid rgba(0,229,255,.13);
    border-radius: 13px;
    background: linear-gradient(100deg, rgba(0,229,255,.055), rgba(155,114,255,.04));
}

.help-icon {
    width: 43px;
    height: 43px;
    flex: 0 0 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--community-cyan);
    background: rgba(0,229,255,.09);
    border-radius: 12px;
    font-size: 19px;
}

.help-content { flex: 1; }
.help-content h3 {
    color: #fff;
    font-size: 13px;
    font-weight: 800;
    margin: 0 0 5px;
}
.help-content p {
    color: #9997a3;
    font-size: 10px;
    margin: 0;
}

.help-link {
    color: var(--community-cyan);
    font-size: 11px;
    font-weight: 800;
    white-space: nowrap;
    text-decoration: none !important;
}

/* ============================================================
   MODALS
============================================================ */
.community-modal .modal-dialog {
    max-width: 1050px;
}

.community-modal .modal-content {
    color: #fff;
    border: 1px solid rgba(0,229,255,.17);
    border-radius: 17px;
    overflow: hidden;
    background: #101015;
    box-shadow: 0 25px 90px rgba(0,0,0,.6);
}

.community-modal .modal-header {
    padding: 22px 26px;
    border-bottom: 1px solid rgba(255,255,255,.07);
    background: #13131a;
}

.community-modal-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
}

.modal-kicker {
    display: block;
    color: var(--community-cyan);
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1.8px;
    margin-bottom: 7px;
}

.community-modal .modal-title {
    color: #fff;
    font-size: 20px;
    font-weight: 800;
    margin: 0;
}

.community-modal-header p {
    color: #92909b;
    font-size: 11px;
    margin: 6px 0 0;
}

.community-modal .modal-close {
    color: #aaa8b4;
    text-shadow: none;
    opacity: 1;
    font-size: 27px;
    font-weight: 300;
}

.community-modal-body {
    padding: 24px 26px;
    max-height: calc(100vh - 190px);
    overflow-y: auto;
}

.community-modal-body::-webkit-scrollbar { width: 5px; }
.community-modal-body::-webkit-scrollbar-thumb {
    background: rgba(0,229,255,.22);
    border-radius: 10px;
}

.group-modal-cover {
    padding: 24px;
    border: 1px solid rgba(0,229,255,.15);
    border-radius: 13px;
    background: radial-gradient(circle at 90% 10%, rgba(0,229,255,.12), transparent 30%), linear-gradient(120deg,#17212b,#171421);
}

.group-modal-cover-content {
    display: flex;
    align-items: center;
    gap: 18px;
}

.group-modal-icon {
    width: 62px;
    height: 62px;
    flex: 0 0 62px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--community-cyan);
    border: 1px solid rgba(0,229,255,.25);
    border-radius: 16px;
    background: rgba(0,229,255,.07);
    font-size: 25px;
}

.group-modal-cover h3 {
    color: #fff;
    font-size: 20px;
    font-weight: 800;
    margin: 8px 0 5px;
}

.group-modal-cover p {
    color: #aaa8b4;
    font-size: 11px;
    margin: 0;
    line-height: 1.6;
}

.group-detail-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    margin: 15px 0;
}

.detail-stat {
    padding: 15px;
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 10px;
    background: #17171e;
}

.detail-stat span {
    display: block;
    color: #92909b;
    font-size: 9px;
    margin-bottom: 7px;
}

.detail-stat strong {
    color: #fff;
    font-size: 15px;
    font-weight: 800;
}

.group-detail-grid,
.profile-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 13px;
    margin: 14px 0;
}

.group-detail-panel {
    padding: 18px;
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 11px;
    background: #15151c;
    min-width: 0;
}

.detail-panel-heading {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 17px;
}

.detail-panel-heading > i {
    color: var(--community-cyan);
    font-size: 14px;
}

.detail-panel-heading h5 {
    color: #f4f3fa;
    font-size: 12px;
    font-weight: 800;
    margin: 0;
}

.detail-line {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 12px;
    padding: 9px 0;
    border-bottom: 1px solid rgba(255,255,255,.045);
}

.detail-line:last-child { border-bottom: 0; }

.detail-line span {
    color: #92909b;
    font-size: 10px;
}

.detail-line strong {
    color: #e8e7ee;
    font-size: 10px;
    text-align: right;
}

/* MEMBRES DANS LE MODAL */
.group-members-section {
    margin-top: 27px;
}

.members-section-heading {
    align-items: center;
    margin-bottom: 15px;
}

.members-section-heading h5 {
    color: #fff;
    font-size: 16px;
    font-weight: 800;
    margin: 0 0 6px;
}

.members-section-heading p {
    color: #92909b;
    font-size: 10px;
    margin: 0;
}

.members-total {
    padding: 7px 10px;
    border-radius: 20px;
    color: var(--community-cyan);
    background: rgba(0,229,255,.08);
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
}

.group-members-list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.group-member-row {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 12px;
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 10px;
    background: #15151c;
}

.group-member-row .member-avatar {
    width: 39px;
    height: 39px;
    flex-basis: 39px;
}

.group-member-info {
    flex: 1;
    min-width: 0;
}

.group-member-info strong {
    display: block;
    color: #f3f2f8;
    font-size: 10px;
    margin-bottom: 4px;
}

.group-member-info span {
    color: #8e8c98;
    font-size: 9px;
}

.member-score-mini {
    color: var(--community-green);
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
}

.member-profile-link {
    padding: 7px 9px;
    border: 1px solid rgba(0,229,255,.18);
    border-radius: 7px;
    color: var(--community-cyan);
    background: rgba(0,229,255,.05);
    font-size: 9px;
    font-weight: 800;
    cursor: pointer;
}

.trust-disclaimer {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 13px;
    margin-top: 18px;
    border: 1px solid rgba(255,184,107,.13);
    border-radius: 9px;
    color: #b8a58e;
    background: rgba(255,184,107,.045);
    font-size: 9px;
    line-height: 1.7;
}

.trust-disclaimer i {
    color: var(--community-orange);
    margin-top: 2px;
}

.community-modal-footer {
    padding: 15px 26px;
    border-top: 1px solid rgba(255,255,255,.07);
    background: #13131a;
}

.community-modal-secondary {
    color: #aaa8b4;
    border: 1px solid rgba(255,255,255,.12);
    background: transparent;
}

/* PROFIL MEMBRE */
.member-profile-modal .modal-dialog { max-width: 850px; }

.member-profile-header {
    display: flex;
    align-items: center;
    gap: 17px;
    padding: 20px;
    border: 1px solid rgba(0,229,255,.15);
    border-radius: 12px;
    background: radial-gradient(circle at 90% 10%, rgba(0,229,255,.1), transparent 30%), #17171e;
}

.member-profile-avatar {
    width: 65px;
    height: 65px;
    flex: 0 0 65px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 19px;
    color: #fff;
    background: linear-gradient(135deg,#245c6b,#58417f);
    font-size: 21px;
    font-weight: 800;
}

.member-profile-identity { flex: 1; }
.member-profile-identity h3 {
    color: #fff;
    font-size: 18px;
    font-weight: 800;
    margin: 0 0 5px;
}
.member-profile-identity p {
    color: #aaa8b4;
    font-size: 10px;
    margin: 0 0 5px;
}
.member-profile-identity span {
    color: #85838f;
    font-size: 9px;
}

.member-score {
    min-width: 90px;
    text-align: center;
    padding: 10px;
    border: 1px solid rgba(57,214,161,.18);
    border-radius: 10px;
    background: rgba(57,214,161,.055);
}
.member-score strong {
    color: var(--community-green);
    font-size: 26px;
    font-weight: 900;
}
.member-score span { color: #aaa8b4; font-size: 10px; }
.member-score small {
    display: block;
    color: #92909b;
    font-size: 8px;
}

.profile-stat-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    margin: 14px 0;
}

.profile-stat-card {
    padding: 15px;
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 10px;
    background: #15151c;
}

.profile-stat-card i {
    display: block;
    color: var(--community-cyan);
    font-size: 14px;
    margin-bottom: 10px;
}

.profile-stat-card strong {
    display: block;
    color: #fff;
    font-size: 18px;
    font-weight: 800;
    margin-bottom: 4px;
}

.profile-stat-card span {
    color: #92909b;
    font-size: 9px;
}

.performance-row { margin-bottom: 15px; }
.performance-row > div:first-child {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 7px;
}
.performance-row span {
    color: #aaa8b4;
    font-size: 9px;
}
.performance-row strong {
    color: var(--community-green);
    font-size: 9px;
}
.performance-track {
    height: 6px;
    overflow: hidden;
    border-radius: 10px;
    background: rgba(255,255,255,.08);
}
.performance-track span {
    display: block;
    width: 0;
    height: 100%;
    border-radius: inherit;
    background: linear-gradient(90deg,#00bcd4,#39d6a1);
    transition: width .6s ease;
}

.profile-rating-summary {
    display: flex;
    align-items: center;
    gap: 13px;
}
.profile-rating-summary > strong {
    color: #fff;
    font-size: 35px;
}
.rating-stars {
    color: #ffbd59;
    font-size: 12px;
    letter-spacing: 2px;
}
.profile-rating-summary span {
    display: block;
    color: #92909b;
    font-size: 9px;
    margin-top: 5px;
}
.profile-rating-note {
    color: #92909b;
    font-size: 9px;
    line-height: 1.7;
    margin: 14px 0 0;
}

.profile-history {
    padding: 18px;
    margin-top: 14px;
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 11px;
    background: #15151c;
}

.profile-history-row {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 0;
    border-bottom: 1px solid rgba(255,255,255,.05);
}
.profile-history-row:last-child { border-bottom: 0; }
.history-dot {
    width: 8px;
    height: 8px;
    flex: 0 0 8px;
    border-radius: 50%;
    background: var(--community-green);
}
.history-dot.warning { background: var(--community-orange); }
.profile-history-row div { flex: 1; }
.profile-history-row strong {
    display: block;
    color: #e9e8ef;
    font-size: 10px;
}
.profile-history-row span {
    display: block;
    color: #85838f;
    font-size: 9px;
    margin-top: 3px;
}

/* CRÉATION ET INVITATIONS */
.create-group-section { margin-bottom: 28px; }
.create-field { margin-bottom: 15px; }
.create-field label {
    display: block;
    color: #aaa8b4;
    font-size: 10px;
    font-weight: 700;
    margin-bottom: 7px;
}
.create-field .form-control {
    min-height: 42px;
    color: #fff;
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 8px;
    background: #191920;
    font-size: 11px;
}
.create-field .form-control:focus {
    color: #fff;
    border-color: rgba(0,229,255,.4);
    background: #191920;
}
.create-field .form-control::placeholder { color: #777581; }

.invite-search { margin: 15px 0; }
.invite-members-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.invite-member-card {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px;
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 10px;
    background: #15151c;
}

.invite-member-card.selected {
    border-color: rgba(0,229,255,.38);
    background: rgba(0,229,255,.045);
}

.invite-member-card .invite-avatar {
    width: 38px;
    height: 38px;
    flex-basis: 38px;
}

.invite-member-info {
    flex: 1;
    min-width: 0;
}
.invite-member-info strong {
    display: block;
    color: #f1f0f6;
    font-size: 10px;
}
.invite-member-info span {
    display: block;
    color: #92909b;
    font-size: 9px;
    margin-top: 4px;
}

.invite-member-actions {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 7px;
}

.invite-member-actions button {
    padding: 5px 7px;
    border: 1px solid rgba(0,229,255,.2);
    border-radius: 6px;
    color: var(--community-cyan);
    background: rgba(0,229,255,.05);
    font-size: 8px;
    cursor: pointer;
}

.invite-member-actions label {
    color: #aaa8b4;
    font-size: 9px;
    margin: 0;
}

/* RESPONSIVE */
@media (max-width: 1100px) {
    .community-group-grid { grid-template-columns: repeat(2, minmax(0,1fr)); }
    .community-filters { grid-template-columns: repeat(3, 1fr); }
    .community-hero-visual { transform: scale(.85); margin-right: -20px; }
}

@media (max-width: 767px) {
    .community-container { padding: 24px 15px 0; }
    .community-hero { padding: 30px 23px; min-height: auto; }
    .community-hero-visual { display: none; }
    .community-hero h1 { font-size: 31px; }
    .community-overview { grid-template-columns: repeat(2,1fr); margin-bottom: 45px; }
    .overview-item { padding: 13px; gap: 10px; }
    .overview-icon { width: 36px; height: 36px; flex-basis: 36px; }
    .overview-item strong { font-size: 16px; }
    .community-group-grid { grid-template-columns: 1fr; }
    .community-filters { grid-template-columns: repeat(2,1fr); }
    .community-section-heading { align-items: flex-start; }
    .community-search-panel { flex-direction: column; }
    .filter-toggle-btn { min-height: 42px; }
    .trust-section { padding: 23px 17px; }
    .trust-grid { grid-template-columns: 1fr; }
    .community-help { align-items: flex-start; flex-wrap: wrap; }
    .help-content { min-width: calc(100% - 65px); }
    .help-link { margin-left: 60px; }
    .group-detail-stats { grid-template-columns: repeat(2,1fr); }
    .group-detail-grid,
    .profile-detail-grid { grid-template-columns: 1fr; }
    .group-members-list { grid-template-columns: 1fr; }
    .profile-stat-grid { grid-template-columns: repeat(2,1fr); }
    .invite-members-grid { grid-template-columns: 1fr; }
    .community-pagination-wrapper { align-items: flex-start; flex-direction: column; }
    .community-modal .modal-header,
    .community-modal-body,
    .community-modal-footer { padding-left: 16px; padding-right: 16px; }
    .member-profile-header { flex-wrap: wrap; }
}

@media (max-width: 420px) {
    .community-container { padding-left: 11px; padding-right: 11px; }
    .community-hero { padding: 25px 18px; }
    .community-hero h1 { font-size: 27px; }
    .community-hero-actions { flex-direction: column; align-items: stretch; }
    .community-primary-btn,
    .community-secondary-btn { width: 100%; }
    .community-filters { grid-template-columns: 1fr; }
    .group-modal-cover-content { align-items: flex-start; }
    .group-modal-icon { width: 48px; height: 48px; flex-basis: 48px; }
    .member-profile-header { gap: 10px; }
    .member-score { margin-left: auto; }
}

/* ANIMATIONS */
.community-page .reveal-item {
    opacity: 0;
    transform: translateY(18px);
}

/* ============================================================
   COMPATIBILITÉ — SCRIPT COMMUNAUTÉ
   Bootstrap 4.6.2 / Font Awesome 4.7
   Cartes groupes — Modales — Invitations — Pagination
============================================================ */

/* ============================================================
   1. GRILLE DES GROUPES
============================================================ */

.community-page #communityGroupGrid,
.community-page .community-group-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    align-items: stretch;
    gap: 22px;
    width: 100%;
}

/* Élément enveloppe généré par JavaScript */

.community-page .community-group-item {
    display: flex;
    min-width: 0;
    width: 100%;
    padding: 0;
    margin: 0;
}

/* ============================================================
   2. CARTE GROUPE
============================================================ */

.community-page .community-group-card {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    min-width: 0;
    height: 100%;
    min-height: 390px;
    overflow: hidden;

    border: 1px solid rgba(255,255,255,.08);
    border-radius: 16px;

    background: linear-gradient(
        145deg,
        #171720 0%,
        #111117 100%
    );

    cursor: pointer;

    transition:
        transform .28s ease,
        border-color .28s ease,
        box-shadow .28s ease;
}

.community-page .community-group-card:hover {
    transform: translateY(-5px);
    border-color: rgba(0,229,255,.30);

    box-shadow:
        0 15px 35px rgba(0,0,0,.25),
        0 0 25px rgba(0,229,255,.045);
}

.community-page .community-group-card:focus-visible {
    outline: 2px solid var(--community-cyan);
    outline-offset: 3px;
}

/* ============================================================
   3. EN-TÊTE DE CARTE
============================================================ */

.community-page .community-group-card-header {
    position: relative;
    display: flex;
    flex: 0 0 105px;
    align-items: flex-start;
    justify-content: space-between;

    min-height: 105px;
    max-height: 105px;
    padding: 17px;

    overflow: hidden;

    background:
        radial-gradient(
            circle at 80% 20%,
            rgba(0,229,255,.16),
            transparent 34%
        ),
        linear-gradient(
            125deg,
            #1a202b,
            #171421
        );
}

.community-page .community-group-icon {
    display: flex;
    flex: 0 0 47px;
    align-items: center;
    justify-content: center;

    width: 47px;
    height: 47px;

    border: 1px solid rgba(255,255,255,.13);
    border-radius: 13px;

    color: var(--community-cyan);
    background: rgba(255,255,255,.055);

    font-size: 19px;
}

.community-page .community-group-badges {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    gap: 5px;

    min-width: 0;
    max-width: 70%;
}

.community-page .community-group-badges .badge {
    display: inline-flex;
    align-items: center;

    padding: 6px 9px;
    border-radius: 30px;

    font-size: 9px;
    font-weight: 800;
    line-height: 1.2;
    white-space: nowrap;
}

.community-page .community-group-badges .badge-info {
    color: #c5faff;
    background: rgba(0,229,255,.11);
    border: 1px solid rgba(0,229,255,.15);
}

.community-page .community-group-badges .badge-secondary {
    color: #dfd1ff;
    background: rgba(155,114,255,.13);
    border: 1px solid rgba(155,114,255,.2);
}

.community-page .community-group-badges .badge-success {
    color: #b9ffe4;
    background: rgba(57,214,161,.1);
    border: 1px solid rgba(57,214,161,.13);
}

.community-page .community-group-badges .badge-danger {
    color: #ffd5a6;
    background: rgba(255,184,107,.1);
    border: 1px solid rgba(255,184,107,.14);
}

/* ============================================================
   4. CORPS DE CARTE
============================================================ */

.community-page .community-group-card-body {
    display: flex;
    flex: 1 1 auto;
    flex-direction: column;

    min-width: 0;
    padding: 18px;
}

.community-page .community-group-card-body h5 {
    display: -webkit-box;
    overflow: hidden;

    color: #fff;
    font-size: 16px;
    font-weight: 800;
    line-height: 1.4;

    margin: 0 0 9px;

    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
}

.community-page .community-group-card-body > p {
    display: -webkit-box;
    overflow: hidden;

    min-height: 42px;
    max-height: 42px;

    color: #9694a0;
    font-size: 11px;
    line-height: 1.65;

    margin: 0 0 16px;

    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}

/* ============================================================
   5. INFORMATIONS DU GROUPE
============================================================ */

.community-page .community-group-infos {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px;

    padding: 13px 0;

    border-top: 1px solid rgba(255,255,255,.07);
    border-bottom: 1px solid rgba(255,255,255,.07);
}

.community-page .community-group-infos > div {
    display: flex;
    align-items: center;
    gap: 8px;

    min-width: 0;

    color: #e8e7ee;
    font-size: 10px;
}

.community-page .community-group-infos i {
    flex: 0 0 auto;

    color: var(--community-cyan);
    font-size: 12px;
}

.community-page .community-group-infos span {
    min-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* ============================================================
   6. PROGRESSION DU GROUPE
============================================================ */

.community-page .community-group-progress {
    margin-top: 14px;
}

.community-page .community-group-progress > div:first-child {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;

    margin-bottom: 7px;
}

.community-page .community-group-progress small {
    color: #85838f;
    font-size: 9px;
}

.community-page .community-group-progress .progress {
    height: 5px;

    overflow: hidden;

    border-radius: 10px;
    background: rgba(255,255,255,.08);
}

.community-page .community-group-progress .progress-bar {
    border-radius: 10px;

    background: linear-gradient(
        90deg,
        #00bcd4,
        #9b72ff
    );
}

/* ============================================================
   7. PIED DE CARTE
============================================================ */

.community-page .community-group-card-footer {
    display: flex;
    flex: 0 0 auto;
    align-items: center;
    justify-content: space-between;
    gap: 10px;

    min-height: 54px;
    padding: 12px 18px;

    border-top: 1px solid rgba(255,255,255,.055);

    color: #8d8b97;
    font-size: 10px;
}

.community-page .community-discover-link {
    color: var(--community-cyan);
    font-weight: 800;
    white-space: nowrap;
}

.community-page .community-discover-link i {
    margin-left: 5px;
}

/* ============================================================
   8. MEMBRES DANS LA MODALE
============================================================ */

.community-page .community-modal-member {
    display: flex;
    align-items: center;
    gap: 12px;

    min-width: 0;
    padding: 12px;
    margin-bottom: 9px;

    border: 1px solid rgba(255,255,255,.07);
    border-radius: 10px;

    background: #15151c;

    cursor: pointer;
    transition: .2s ease;
}

.community-page .community-modal-member:hover {
    border-color: rgba(0,229,255,.3);
    background: rgba(0,229,255,.035);
}

.community-page .community-modal-member img {
    flex: 0 0 39px;

    width: 39px;
    height: 39px;

    border-radius: 50%;
    object-fit: cover;
}

.community-page .community-modal-member > div {
    flex: 1;
    min-width: 0;
}

.community-page .community-modal-member strong,
.community-page .community-modal-member small {
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.community-page .community-modal-member strong {
    color: #f3f2f8;
    font-size: 10px;
}

.community-page .community-modal-member small {
    color: #8e8c98;
    font-size: 9px;
    margin-top: 4px;
}

.community-page .community-modal-member > i {
    flex: 0 0 auto;
    color: var(--community-cyan);
}

/* ============================================================
   9. INVITATIONS
============================================================ */

.community-page .community-invite-member {
    display: flex;
    align-items: center;
    gap: 10px;

    min-width: 0;
    padding: 12px;
    margin-bottom: 9px;

    border: 1px solid rgba(255,255,255,.07);
    border-radius: 10px;

    background: #15151c;
}

.community-page .community-invite-member img {
    flex: 0 0 38px;

    width: 38px;
    height: 38px;

    border-radius: 50%;
    object-fit: cover;
}

.community-page .community-invite-info {
    flex: 1;
    min-width: 0;
}

.community-page .community-invite-info strong,
.community-page .community-invite-info small {
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.community-page .community-invite-info strong {
    color: #f1f0f6;
    font-size: 10px;
}

.community-page .community-invite-info small {
    color: #92909b;
    font-size: 9px;
    margin-top: 4px;
}

/* ============================================================
   10. PAGINATION
============================================================ */

.community-page .pagination-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 34px;
    height: 34px;
    padding: 0 8px;

    border: 1px solid rgba(255,255,255,.09);
    border-radius: 7px;

    color: #aaa8b4;
    background: #14141a;

    font-size: 11px;
    cursor: pointer;

    transition: .2s ease;
}

.community-page .pagination-btn:hover:not(:disabled) {
    color: var(--community-cyan);
    border-color: rgba(0,229,255,.35);
}

.community-page .pagination-btn.active {
    color: #071014;
    border-color: var(--community-cyan);
    background: var(--community-cyan);
    font-weight: 800;
}

.community-page .pagination-btn:disabled {
    opacity: .3;
    cursor: not-allowed;
}

/* ============================================================
   11. ÉTAT VIDE
============================================================ */

.community-page #emptyGroups {
    width: 100%;
    color: var(--community-text);
}

.community-page #emptyGroups h3 {
    color: #fff;
}

.community-page #emptyGroups p {
    color: var(--community-muted);
}

/* ============================================================
   12. BOUTON D'ADHÉSION
============================================================ */

.community-page #groupJoinButton:disabled {
    opacity: .45;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

/* ============================================================
   13. MODALES BOOTSTRAP 4
============================================================ */

.community-page .modal-backdrop {
    z-index: 1040;
}

.community-page .modal {
    z-index: 1050;
}

.community-page .community-modal .modal-content {
    overflow: hidden;
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 16px;
    background: #101015;
}

/* ============================================================
   14. RESPONSIVE — TABLETTES
============================================================ */

@media (max-width: 1100px) {
    .community-page #communityGroupGrid,
    .community-page .community-group-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }
}

/* ============================================================
   15. RESPONSIVE — MOBILES
============================================================ */

@media (max-width: 767px) {
    .community-page #communityGroupGrid,
    .community-page .community-group-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 15px;
    }

    .community-page .community-group-card {
        min-height: 380px;
    }

    .community-page .community-group-card-header {
        flex-basis: 95px;
        min-height: 95px;
        max-height: 95px;
        padding: 14px;
    }

    .community-page .community-group-card-body {
        padding: 15px;
    }

    .community-page .community-group-card-body h5 {
        font-size: 14px;
    }

    .community-page .community-group-infos {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
    }

    .community-page .community-group-card-footer {
        padding: 12px 15px;
    }
}

/* ============================================================
   16. RESPONSIVE — PETITS MOBILES
============================================================ */

@media (max-width: 520px) {
    .community-page #communityGroupGrid,
    .community-page .community-group-grid {
        grid-template-columns: minmax(0, 1fr);
        gap: 16px;
    }

    .community-page .community-group-card {
        min-height: 370px;
    }

    .community-page .community-group-card-header {
        flex-basis: 100px;
        min-height: 100px;
        max-height: 100px;
    }

    .community-page .community-group-card-body {
        padding: 17px;
    }

    .community-page .community-group-card-body h5 {
        font-size: 16px;
    }

    .community-page .community-group-card-footer {
        align-items: center;
        flex-direction: row;
    }

    .community-page .community-group-infos {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

/* ============================================================
   17. TRÈS PETITS ÉCRANS
============================================================ */

@media (max-width: 360px) {
    .community-page .community-group-card-header {
        padding: 12px;
    }

    .community-page .community-group-card-body {
        padding: 14px;
    }

    .community-page .community-group-card-footer {
        padding: 11px 14px;
    }

    .community-page .community-group-infos {
        grid-template-columns: minmax(0, 1fr);
    }
}


</style>


{{-- <script>
(function attendreJQuery() {

    if (!window.jQuery) {
        setTimeout(attendreJQuery, 50);
        return;
    }

    (function ($) {
        "use strict";
    /* ========================================================
       1. DONNÉES STATIQUES
       Plus tard : remplacer ces tableaux par les données Laravel.
    ======================================================== */

    const membersData = {
        1: {
            id: 1, name: "Mireille Obame", initials: "MO",
            role: "Membre participante", since: "Membre depuis janvier 2024",
            score: 94, completed: 8, participations: 36,
            onTime: 97, late: 1, penalties: 0,
            rating: 4.8, reviews: 12,
            regularity: 97, deadline: 94, engagement: 96,
            history: [
                { title: "Cotisation effectuée à temps", date: "Dernier cycle", type: "success" },
                { title: "Cycle de tontine terminé", date: "Août 2026", type: "success" },
                { title: "Retard régularisé", date: "Mai 2026", type: "warning" }
            ]
        },
        2: {
            id: 2, name: "Patrick Moussavou", initials: "PM",
            role: "Membre participant", since: "Membre depuis mars 2023",
            score: 88, completed: 11, participations: 48,
            onTime: 91, late: 3, penalties: 1,
            rating: 4.6, reviews: 18,
            regularity: 91, deadline: 88, engagement: 90,
            history: [
                { title: "Participation validée", date: "Dernier cycle", type: "success" },
                { title: "Pénalité appliquée puis réglée", date: "Juin 2026", type: "warning" },
                { title: "Cycle de tontine terminé", date: "Avril 2026", type: "success" }
            ]
        },
        3: {
            id: 3, name: "Grâce Ndong", initials: "GN",
            role: "Membre participante", since: "Membre depuis juin 2024",
            score: 96, completed: 6, participations: 28,
            onTime: 100, late: 0, penalties: 0,
            rating: 4.9, reviews: 9,
            regularity: 100, deadline: 100, engagement: 97,
            history: [
                { title: "Cotisation effectuée à temps", date: "Dernier cycle", type: "success" },
                { title: "Cycle de tontine terminé", date: "Juillet 2026", type: "success" }
            ]
        },
        4: {
            id: 4, name: "Serge Abessolo", initials: "SA",
            role: "Membre participant", since: "Membre depuis septembre 2022",
            score: 79, completed: 13, participations: 52,
            onTime: 82, late: 7, penalties: 2,
            rating: 4.1, reviews: 21,
            regularity: 82, deadline: 79, engagement: 84,
            history: [
                { title: "Cotisation régularisée", date: "Dernier cycle", type: "warning" },
                { title: "Pénalité enregistrée", date: "Mars 2026", type: "warning" },
                { title: "Cycle de tontine terminé", date: "Janvier 2026", type: "success" }
            ]
        },
        5: {
            id: 5, name: "Estelle Nguema", initials: "EN",
            role: "Membre participante", since: "Membre depuis février 2025",
            score: 91, completed: 4, participations: 19,
            onTime: 95, late: 1, penalties: 0,
            rating: 4.7, reviews: 7,
            regularity: 95, deadline: 93, engagement: 92,
            history: [
                { title: "Participation validée", date: "Dernier cycle", type: "success" },
                { title: "Cotisation effectuée à temps", date: "Juillet 2026", type: "success" }
            ]
        },
        6: {
            id: 6, name: "Arnaud Ebang", initials: "AE",
            role: "Membre participant", since: "Membre depuis avril 2023",
            score: 85, completed: 9, participations: 40,
            onTime: 89, late: 4, penalties: 1,
            rating: 4.4, reviews: 14,
            regularity: 89, deadline: 85, engagement: 87,
            history: [
                { title: "Cotisation reçue", date: "Dernier cycle", type: "success" },
                { title: "Retard enregistré", date: "Mai 2026", type: "warning" }
            ]
        },
        7: {
            id: 7, name: "Clarisse Mba", initials: "CM",
            role: "Membre participante", since: "Membre depuis août 2024",
            score: 98, completed: 5, participations: 24,
            onTime: 100, late: 0, penalties: 0,
            rating: 5.0, reviews: 11,
            regularity: 100, deadline: 100, engagement: 99,
            history: [
                { title: "Cotisation effectuée à temps", date: "Dernier cycle", type: "success" },
                { title: "Cycle de tontine terminé", date: "Juin 2026", type: "success" }
            ]
        },
        8: {
            id: 8, name: "Didier Essono", initials: "DE",
            role: "Membre participant", since: "Membre depuis décembre 2023",
            score: 72, completed: 7, participations: 31,
            onTime: 76, late: 8, penalties: 3,
            rating: 3.9, reviews: 16,
            regularity: 76, deadline: 72, engagement: 78,
            history: [
                { title: "Retard de cotisation enregistré", date: "Dernier cycle", type: "warning" },
                { title: "Pénalité appliquée", date: "Juillet 2026", type: "warning" }
            ]
        }
    };

    const groupsData = [
        {
            id: 1, name: "Les Bâtisseurs", creator: "Mireille Obame",
            creatorInitials: "MO",
            description: "Une communauté engagée autour de l'épargne collective et de projets durables.",
            amount: 50000, period: "Mensuelle", visibility: "PUBLIC",
            status: "ACTIF", members: [1,2,3,4], maxMembers: 15,
            distribution: "Tour de rôle", validation: "Validation par le créateur",
            penalty: 5, insurance: 2, grace: 48,
            start: "15 janvier 2026", end: "15 mars 2027",
            condition: "Demande soumise au créateur",
            cover: "", icon: "fa-building", createdAt: "2026-09-12"
        },
        {
            id: 2, name: "Solidarité Plus", creator: "Patrick Moussavou",
            creatorInitials: "PM",
            description: "Un groupe de solidarité pour avancer ensemble et soutenir les projets de chacun.",
            amount: 25000, period: "Mensuelle", visibility: "PUBLIC",
            status: "ACTIF", members: [2,3,5,6], maxMembers: 12,
            distribution: "Tirage au sort", validation: "Validation automatique",
            penalty: 3, insurance: 1, grace: 24,
            start: "01 février 2026", end: "01 février 2027",
            condition: "Adhésion automatique selon les places disponibles",
            cover: "purple-cover", icon: "fa-handshake-o", createdAt: "2026-09-10"
        },
        {
            id: 3, name: "Épargne Excellence", creator: "Grâce Ndong",
            creatorInitials: "GN",
            description: "Un cercle d'épargne structuré, avec des règles claires et un suivi régulier.",
            amount: 100000, period: "Mensuelle", visibility: "PRIVE",
            status: "ACTIF", members: [3,1,5,7], maxMembers: 10,
            distribution: "Décision collective", validation: "Validation par le créateur",
            penalty: 5, insurance: 3, grace: 48,
            start: "10 mars 2026", end: "10 janvier 2027",
            condition: "Accès sur invitation ou demande approuvée",
            cover: "green-cover", icon: "fa-diamond", createdAt: "2026-09-08"
        },
        {
            id: 4, name: "Vision 2027", creator: "Serge Abessolo",
            creatorInitials: "SA",
            description: "Préparer l'avenir grâce à une organisation collective et des engagements suivis.",
            amount: 200000, period: "Mensuelle", visibility: "PRIVE",
            status: "ACTIF", members: [4,6,8,2], maxMembers: 20,
            distribution: "Tour de rôle", validation: "Validation par le créateur",
            penalty: 7, insurance: 2, grace: 72,
            start: "01 avril 2026", end: "01 décembre 2027",
            condition: "Invitation ou approbation du créateur",
            cover: "orange-cover", icon: "fa-line-chart", createdAt: "2026-09-05"
        },
        {
            id: 5, name: "Ensemble Réussir", creator: "Estelle Nguema",
            creatorInitials: "EN",
            description: "Un groupe accessible pour développer une habitude d'épargne régulière.",
            amount: 25000, period: "Hebdomadaire", visibility: "PUBLIC",
            status: "ACTIF", members: [5,7,1,3], maxMembers: 10,
            distribution: "Tirage au sort", validation: "Validation automatique",
            penalty: 2, insurance: 1, grace: 12,
            start: "05 mai 2026", end: "05 novembre 2026",
            condition: "Adhésion automatique selon les places disponibles",
            cover: "", icon: "fa-users", createdAt: "2026-09-02"
        },
        {
            id: 6, name: "Cercle Horizon", creator: "Arnaud Ebang",
            creatorInitials: "AE",
            description: "Un cercle privé qui privilégie l'organisation et le respect des engagements.",
            amount: 50000, period: "Bimensuelle", visibility: "PRIVE",
            status: "SUSPENDU", members: [6,8,4,2], maxMembers: 8,
            distribution: "Décision collective", validation: "Validation par le créateur",
            penalty: 4, insurance: 2, grace: 24,
            start: "15 juin 2026", end: "15 juin 2027",
            condition: "Groupe momentanément fermé aux nouvelles demandes",
            cover: "purple-cover", icon: "fa-compass", createdAt: "2026-08-29"
        }
    ];

    /* ========================================================
       2. ÉTAT DE L'EXPLORATEUR
    ======================================================== */

    let currentPage = 1;
    const itemsPerPage = 6;
    let activeGroupId = null;
    let selectedInvites = [];

    const $grid = $("#communityGroupGrid");

    function formatMoney(value) {
        return new Intl.NumberFormat("fr-FR").format(value) + " FCFA";
    }

    function getInitials(name) {
        return name.split(" ").map(part => part.charAt(0)).slice(0, 2).join("").toUpperCase();
    }

    function getMember(id) {
        return membersData[id] || null;
    }

    function escapeHtml(value) {
        return String(value == null ? "" : value).replace(/[&<>"']/g, function (char) {
            return {
                "&": "&amp;",
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#039;"
            }[char];
        });
    }

    function getVisibleGroups() {
        const search = $("#groupSearch").val().toLowerCase().trim();
        const visibility = $("#filterVisibility").val();
        const status = $("#filterStatus").val();
        const period = $("#filterPeriod").val();
        const amount = Number($("#filterAmount").val()) || null;
        const sort = $("#sortGroups").val();

        let filtered = groupsData.filter(group => {
            // Les groupes secrets ne sont jamais exposés dans la découverte publique.
            if (group.visibility === "SECRET") return false;

            const searchText = [
                group.name, group.creator, group.description
            ].join(" ").toLowerCase();

            return (!search || searchText.includes(search))
                && (!visibility || group.visibility === visibility)
                && (!status || group.status === status)
                && (!period || group.period === period)
                && (!amount || group.amount <= amount);
        });

        filtered.sort((a, b) => {
            if (sort === "members") return b.members.length - a.members.length;
            if (sort === "amountAsc") return a.amount - b.amount;
            if (sort === "amountDesc") return b.amount - a.amount;
            if (sort === "name") return a.name.localeCompare(b.name, "fr");
            return new Date(b.createdAt) - new Date(a.createdAt);
        });

        return filtered;
    }

    /* ========================================================
       3. GÉNÉRATION DES CARTES
    ======================================================== */

    function renderGroupCard(group) {
        const previewMembers = group.members.slice(0, 4).map(id => getMember(id)).filter(Boolean);

        const avatars = previewMembers.map(member => `
            <div class="member-avatar" title="${escapeHtml(member.name)}">
                ${escapeHtml(member.initials)}
            </div>
        `).join("");

        const visibilityBadge = group.visibility === "PRIVE"
            ? '<span class="group-badge private">PRIVÉ</span>'
            : '<span class="group-badge">PUBLIC</span>';

        const statusBadge = group.status === "SUSPENDU"
            ? '<span class="group-badge suspended">SUSPENDU</span>'
            : '<span class="group-badge">ACTIF</span>';

        return `
            <article class="group-card" data-group-id="${group.id}">
                <div class="group-card-cover ${group.cover}">
                    <div class="group-cover-icon">
                        <i class="fa ${group.icon}"></i>
                    </div>
                    <div>${visibilityBadge}${statusBadge}</div>
                </div>

                <div class="group-card-body">
                    <div class="group-card-title-row">
                        <h3>${escapeHtml(group.name)}</h3>
                    </div>

                    <p class="group-card-description">
                        ${escapeHtml(group.description)}
                    </p>

                    <div class="group-creator">
                        <div class="creator-avatar">${escapeHtml(group.creatorInitials)}</div>
                        <div>
                            Créé par
                            <strong>${escapeHtml(group.creator)}</strong>
                        </div>
                    </div>

                    <div class="group-card-metrics">
                        <div class="group-metric">
                            <span>Cotisation</span>
                            <strong>${formatMoney(group.amount)}</strong>
                        </div>
                        <div class="group-metric">
                            <span>Périodicité</span>
                            <strong>${escapeHtml(group.period)}</strong>
                        </div>
                        <div class="group-metric">
                            <span>Participants</span>
                            <strong>${group.members.length} / ${group.maxMembers}</strong>
                        </div>
                        <div class="group-metric">
                            <span>Places restantes</span>
                            <strong>${Math.max(0, group.maxMembers - group.members.length)}</strong>
                        </div>
                    </div>

                    <div class="group-members-preview">
                        <div class="member-avatar-stack">${avatars}</div>
                        <span class="member-preview-link">
                            ${group.members.length} membres à découvrir
                        </span>
                    </div>
                </div>

                <div class="group-card-footer">
                    <span>Consulter le groupe</span>
                    <strong>Découvrir <i class="fa fa-arrow-right"></i></strong>
                </div>
            </article>
        `;
    }

    /* ========================================================
       4. PAGINATION ET AFFICHAGE
    ======================================================== */

    function renderPagination(totalItems, totalPages) {
        const $pagination = $("#communityPagination");
        $pagination.empty();

        if (totalPages <= 1) {
            $("#paginationInfo").text(totalItems + " groupe(s) trouvé(s)");
            return;
        }

        const start = (currentPage - 1) * itemsPerPage + 1;
        const end = Math.min(currentPage * itemsPerPage, totalItems);

        $("#paginationInfo").text(
            "Affichage de " + start + " à " + end + " sur " + totalItems + " groupes"
        );

        $pagination.append(`
            <li>
                <button type="button" data-page="${currentPage - 1}"
                        ${currentPage === 1 ? "disabled" : ""}>
                    <i class="fa fa-angle-left"></i>
                </button>
            </li>
        `);

        for (let page = 1; page <= totalPages; page++) {
            $pagination.append(`
                <li>
                    <button type="button"
                            data-page="${page}"
                            class="${page === currentPage ? "active" : ""}">
                        ${page}
                    </button>
                </li>
            `);
        }

        $pagination.append(`
            <li>
                <button type="button" data-page="${currentPage + 1}"
                        ${currentPage === totalPages ? "disabled" : ""}>
                    <i class="fa fa-angle-right"></i>
                </button>
            </li>
        `);
    }

    function updateFilterCounter() {
        let count = 0;

        if ($("#filterVisibility").val()) count++;
        if ($("#filterStatus").val()) count++;
        if ($("#filterPeriod").val()) count++;
        if ($("#filterAmount").val()) count++;

        $("#activeFilterCount").text(count);
    }

    function renderGroups() {
        const groups = getVisibleGroups();
        const totalItems = groups.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        if (currentPage > totalPages && totalPages > 0) currentPage = totalPages;
        if (totalPages === 0) currentPage = 1;

        const startIndex = (currentPage - 1) * itemsPerPage;
        const currentItems = groups.slice(startIndex, startIndex + itemsPerPage);

        console.log("Groupes à afficher :", currentItems);

$grid.html(currentItems.map(renderGroupCard).join(""));

        $("#resultCount").text(String(totalItems).padStart(2, "0"));
        $("#overviewGroups").text(String(groupsData.filter(g => g.visibility !== "SECRET").length).padStart(2, "0"));

        $("#emptyGroups").toggle(totalItems === 0);
        $grid.toggle(totalItems > 0);

        renderPagination(totalItems, totalPages);
        updateFilterCounter();

        if (window.gsap) {
            gsap.fromTo(".group-card",
                { opacity: 0, y: 16 },
                { opacity: 1, y: 0, duration: .38, stagger: .055, ease: "power2.out" }
            );
        }
    }

    /* ========================================================
       5. MODAL DÉTAIL DU GROUPE
    ======================================================== */

    function openGroupModal(groupId) {
        const group = groupsData.find(item => item.id === Number(groupId));
        if (!group) return;

        activeGroupId = group.id;

        $("#modalGroupName").text(group.name);
        $("#modalGroupSubtitle").text("Créé par " + group.creator);
        $("#modalGroupTitle").text(group.name);
        $("#modalGroupDescription").text(group.description);

        $("#modalGroupVisibility")
            .text(group.visibility === "PRIVE" ? "PRIVÉ" : "PUBLIC")
            .toggleClass("private", group.visibility === "PRIVE");

        $("#modalGroupStatus")
            .text(group.status)
            .toggleClass("suspended", group.status === "SUSPENDU");

        $("#modalMembersCount").text(group.members.length);
        $("#modalContribution").text(formatMoney(group.amount));
        $("#modalAvailablePlaces").text(Math.max(0, group.maxMembers - group.members.length));
        $("#modalPeriod").text(group.period);

        $("#modalCreator").text(group.creator);
        $("#modalDistribution").text(group.distribution);
        $("#modalValidation").text(group.validation);
        $("#modalStartDate").text(group.start);
        $("#modalEndDate").text(group.end);

        $("#modalPenalty").text(group.penalty + " %");
        $("#modalInsurance").text(group.insurance + " %");
        $("#modalGrace").text(group.grace + " heures");
        $("#modalMaxMembers").text(group.maxMembers);
        $("#modalJoinCondition").text(group.condition);

        $("#modalMembersLabel").text(group.members.length + " participants");

        const membersHtml = group.members.map(id => {
            const member = getMember(id);
            if (!member) return "";

            return `
                <div class="group-member-row">
                    <div class="member-avatar">${escapeHtml(member.initials)}</div>
                    <div class="group-member-info">
                        <strong>${escapeHtml(member.name)}</strong>
                        <span>${escapeHtml(member.role)} · ${member.completed} cycles réalisés</span>
                    </div>
                    <span class="member-score-mini">${member.score}/100</span>
                    <button type="button" class="member-profile-link"
                            data-member-id="${member.id}">
                        Profil
                    </button>
                </div>
            `;
        }).join("");

        $("#modalMembersList").html(membersHtml);

        const canJoin = group.status === "ACTIF"
            && group.members.length < group.maxMembers;

        $("#groupJoinButton")
            .prop("disabled", !canJoin)
            .html(canJoin
                ? '<i class="fa fa-paper-plane"></i> Demander à rejoindre'
                : '<i class="fa fa-lock"></i> Groupe indisponible');

        $("#groupPreviewModal").modal("show");
    }

    /* ========================================================
       6. MODAL PROFIL MEMBRE
    ======================================================== */

    function openMemberProfile(memberId) {
        const member = getMember(memberId);
        if (!member) return;

        $("#profileAvatar").text(member.initials);
        $("#profileName").text(member.name);
        $("#profileRole").text(member.role);
        $("#profileSince").text(member.since);
        $("#profileScore").text(member.score);

        $("#profileCompleted").text(member.completed);
        $("#profileParticipations").text(member.participations);
        $("#profileOnTime").text(member.onTime + "%");
        $("#profileLate").text(member.late);
        $("#profilePenalties").text(member.penalties);
        $("#profileRating").text(member.rating.toFixed(1) + "/5");

        $("#profileRegularityText").text(member.regularity + "%");
        $("#profileDeadlineText").text(member.deadline + "%");
        $("#profileEngagementText").text(member.engagement + "%");

        $("#profileRegularityBar").css("width", member.regularity + "%");
        $("#profileDeadlineBar").css("width", member.deadline + "%");
        $("#profileEngagementBar").css("width", member.engagement + "%");

        $("#profileRatingLarge").text(member.rating.toFixed(1));
        $("#profileReviewCount").text(member.reviews + " évaluations");

        const roundedRating = Math.round(member.rating);
        let stars = "";
        for (let i = 1; i <= 5; i++) {
            stars += i <= roundedRating
                ? '<i class="fa fa-star"></i>'
                : '<i class="fa fa-star-o"></i>';
        }
        $("#profileStars").html(stars);

        const historyHtml = member.history.map(item => `
            <div class="profile-history-row">
                <span class="history-dot ${item.type === "warning" ? "warning" : ""}"></span>
                <div>
                    <strong>${escapeHtml(item.title)}</strong>
                    <span>${escapeHtml(item.date)}</span>
                </div>
            </div>
        `).join("");

        $("#profileHistoryList").html(historyHtml);

        // Fermer le modal groupe avant d'ouvrir le profil.
        if ($("#groupPreviewModal").hasClass("show")) {
            $("#groupPreviewModal").one("hidden.bs.modal", function () {
                $("#memberProfileModal").modal("show");
            });
            $("#groupPreviewModal").modal("hide");
        } else {
            $("#memberProfileModal").modal("show");
        }
    }

    /* ========================================================
       7. SÉLECTION DES INVITÉS
    ======================================================== */

    function renderInviteMembers(search = "") {
        const normalizedSearch = search.toLowerCase().trim();

        const html = Object.values(membersData)
            .filter(member => member.name.toLowerCase().includes(normalizedSearch))
            .map(member => {
                const selected = selectedInvites.includes(member.id);

                return `
                    <div class="invite-member-card ${selected ? "selected" : ""}">
                        <div class="invite-avatar">${escapeHtml(member.initials)}</div>

                        <div class="invite-member-info">
                            <strong>${escapeHtml(member.name)}</strong>
                            <span>
                                ${member.completed} cycles ·
                                ${member.onTime}% à temps ·
                                ${member.score}/100
                            </span>
                        </div>

                        <div class="invite-member-actions">
                            <button type="button" data-profile-id="${member.id}">
                                Voir le profil
                            </button>
                            <label>
                                <input type="checkbox"
                                       class="invite-checkbox"
                                       value="${member.id}"
                                       ${selected ? "checked" : ""}>
                                Inviter
                            </label>
                        </div>
                    </div>
                `;
            }).join("");

        $("#inviteMembersGrid").html(html || `
            <div class="community-empty-state">
                <p>Aucun membre correspondant.</p>
            </div>
        `);

        $("#selectedInviteCount").text(
            selectedInvites.length + " sélectionné(s)"
        );
    }

    /* ========================================================
       8. ÉVÉNEMENTS
    ======================================================== */

    $("#groupSearch").on("input", function () {
        currentPage = 1;
        renderGroups();
    });

    $("#clearSearch").on("click", function () {
        $("#groupSearch").val("").trigger("input");
    });

    $("#filterVisibility, #filterStatus, #filterPeriod, #filterAmount, #sortGroups")
        .on("change", function () {
            currentPage = 1;
            renderGroups();
        });

    function resetFilters() {
        $("#groupSearch").val("");
        $("#filterVisibility, #filterStatus, #filterPeriod, #filterAmount")
            .val("");
        $("#sortGroups").val("recent");
        currentPage = 1;
        renderGroups();
    }

    $("#resetFilters, #emptyResetFilters").on("click", resetFilters);

    $("#communityPagination").on("click", "button[data-page]", function () {
        const page = Number($(this).data("page"));
        const totalPages = Math.ceil(getVisibleGroups().length / itemsPerPage);

        if (page < 1 || page > totalPages) return;

        currentPage = page;
        renderGroups();

        $("html, body").animate({
            scrollTop: $(".community-explorer").offset().top - 30
        }, 300);
    });

    $grid.on("click", ".group-card", function () {
        openGroupModal($(this).data("group-id"));
    });

    $("#modalMembersList").on("click", ".member-profile-link", function (event) {
        event.stopPropagation();
        openMemberProfile($(this).data("member-id"));
    });

    $("#inviteMembersGrid").on("click", "[data-profile-id]", function () {
        openMemberProfile($(this).data("profile-id"));
    });

    $("#inviteMembersGrid").on("change", ".invite-checkbox", function () {
        const id = Number($(this).val());

        if ($(this).is(":checked")) {
            if (!selectedInvites.includes(id)) selectedInvites.push(id);
        } else {
            selectedInvites = selectedInvites.filter(value => value !== id);
        }

        renderInviteMembers($("#inviteSearch").val());
    });

    $("#inviteSearch").on("input", function () {
        renderInviteMembers($(this).val());
    });

    $("#createGroupModal").on("show.bs.modal", function () {
        renderInviteMembers();
    });

    $("#staticCreateGroupButton").on("click", function () {
        const form = document.getElementById("staticCreateGroupForm");

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        alert(
            "Démonstration : le groupe est prêt à être préparé.\\n" +
            selectedInvites.length + " membre(s) sélectionné(s).\\n\\n" +
            "Aucune donnée n'a été enregistrée."
        );
    });

    $("#groupJoinButton").on("click", function () {
        if (!activeGroupId) return;

        const group = groupsData.find(item => item.id === activeGroupId);
        if (!group) return;

        alert(
            "Démonstration : demande d'adhésion au groupe « " +
            group.name + " ».\\nAucune demande réelle n'a été envoyée."
        );
    });

    $("#myGroupsShortcut, #communityHelpLink").on("click", function (event) {
        event.preventDefault();
        alert("Cette destination sera reliée à la page correspondante.");
    });

    /* ========================================================
       9. GSAP
    ======================================================== */

    function animateCommunity() {
        if (!window.gsap) return;

        gsap.from(".community-hero-content > *", {
            opacity: 0,
            y: 18,
            duration: .7,
            stagger: .1,
            ease: "power3.out"
        });

        gsap.from(".community-hero-visual", {
            opacity: 0,
            scale: .85,
            duration: .9,
            ease: "power3.out"
        });

        gsap.from(".overview-item", {
            opacity: 0,
            y: 15,
            duration: .5,
            stagger: .08,
            delay: .25,
            ease: "power2.out"
        });

        gsap.to(".orbit-one", {
            rotation: 360,
            duration: 35,
            repeat: -1,
            ease: "none"
        });

        gsap.to(".orbit-two", {
            rotation: -360,
            duration: 55,
            repeat: -1,
            ease: "none"
        });

        gsap.to(".hero-core", {
            boxShadow: "0 0 55px rgba(0,229,255,.28)",
            duration: 2,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });
    }

    /* ========================================================
       10. INITIALISATION
    ======================================================== */

         $(document).ready(function () {

            console.log("================================");
            console.log("INITIALISATION COMMUNAUTÉ");
            console.log("================================");

            console.log("jQuery :", $.fn.jquery);
            console.log("Nombre de groupes :", groupsData.length);
            console.log("Conteneur trouvé :", $("#communityGroupGrid").length);

            renderGroups();
            renderInviteMembers();
            animateCommunity();

            console.log("Groupes présents dans le HTML :",
                $("#communityGroupGrid .group-card").length
            );

            console.log("Communauté initialisée.");
        });

    })(window.jQuery);

})();
</script> --}}

<script>
(function attendreDependances() {
    if (
        !window.jQuery ||
        !window.jQuery.fn ||
        !window.jQuery.fn.modal
    ) {
        setTimeout(attendreDependances, 50);
        return;
    }

    (function ($) {
        "use strict";

        $(function () {

            /* =========================================================
               CONFIGURATION
            ========================================================= */

            const SELECTORS = {
                grid: "#communityGroupGrid",
                search: "#groupSearch",
                visibility: "#filterVisibility",
                status: "#filterStatus",
                period: "#filterPeriod",
                amount: "#filterAmount",
                sort: "#sortGroups",
                pagination: "#communityPagination",
                empty: "#emptyGroups",
                visibleCount: "#visibleGroupCount",

                groupModal: "#groupPreviewModal",
                memberModal: "#memberProfileModal",
                createModal: "#createGroupModal",

                membersList: "#modalMembersList",
                joinButton: "#groupJoinButton",
                createForm: "#staticCreateGroupForm"
            };

            const GROUPS_PER_PAGE = 6;

            let currentPage = 1;
            let currentGroup = null;
            let previousModal = null;
            let selectedInvites = [];

            /* =========================================================
               DONNÉES STATIQUES
            ========================================================= */

            const membersData = [
                {
                    id: 1,
                    name: "Jean-Marc Obame",
                    role: "Administrateur",
                    rating: 4.9,
                    groups: 3,
                    performance: 96,
                    photo: "https://i.pravatar.cc/150?img=12"
                },
                {
                    id: 2,
                    name: "Marie-Louise Mba",
                    role: "Membre active",
                    rating: 4.8,
                    groups: 2,
                    performance: 94,
                    photo: "https://i.pravatar.cc/150?img=47"
                },
                {
                    id: 3,
                    name: "Patrick Nguema",
                    role: "Trésorier",
                    rating: 4.7,
                    groups: 4,
                    performance: 91,
                    photo: "https://i.pravatar.cc/150?img=13"
                },
                {
                    id: 4,
                    name: "Estelle Mboumba",
                    role: "Membre active",
                    rating: 4.9,
                    groups: 2,
                    performance: 98,
                    photo: "https://i.pravatar.cc/150?img=44"
                },
                {
                    id: 5,
                    name: "Christian Moussavou",
                    role: "Membre",
                    rating: 4.6,
                    groups: 1,
                    performance: 87,
                    photo: "https://i.pravatar.cc/150?img=11"
                },
                {
                    id: 6,
                    name: "Grâce Ndong",
                    role: "Membre active",
                    rating: 4.9,
                    groups: 3,
                    performance: 97,
                    photo: "https://i.pravatar.cc/150?img=45"
                },
                {
                    id: 7,
                    name: "David Essono",
                    role: "Membre",
                    rating: 4.5,
                    groups: 2,
                    performance: 85,
                    photo: "https://i.pravatar.cc/150?img=14"
                },
                {
                    id: 8,
                    name: "Sandra Andeme",
                    role: "Membre active",
                    rating: 4.8,
                    groups: 2,
                    performance: 93,
                    photo: "https://i.pravatar.cc/150?img=49"
                }
            ];

            const groupsData = [
                {
                    id: 1,
                    name: "Les Bâtisseurs",
                    description: "Un groupe de solidarité financière réunissant des membres ambitieux autour d'un objectif commun.",
                    creator: "Jean-Marc Obame",
                    visibility: "public",
                    status: "active",
                    amount: 50000,
                    period: "Mensuelle",
                    members: 4,
                    maxMembers: 15,
                    memberIds: [1, 2, 3, 4],
                    icon: "fa-building",
                    date: "2026-11-10"
                },
                {
                    id: 2,
                    name: "Solidarité Plus",
                    description: "Un espace d'entraide et d'épargne collective destiné à soutenir les projets de chacun.",
                    creator: "Marie-Louise Mba",
                    visibility: "public",
                    status: "active",
                    amount: 25000,
                    period: "Mensuelle",
                    members: 4,
                    maxMembers: 12,
                    memberIds: [2, 4, 5, 6],
                    icon: "fa-handshake-o",
                    date: "2026-11-09"
                },
                {
                    id: 3,
                    name: "Épargne Excellence",
                    description: "Un cercle d'épargne exigeant, organisé autour de contributions régulières et d'objectifs élevés.",
                    creator: "Patrick Nguema",
                    visibility: "private",
                    status: "active",
                    amount: 100000,
                    period: "Mensuelle",
                    members: 4,
                    maxMembers: 10,
                    memberIds: [1, 3, 5, 7],
                    icon: "fa-diamond",
                    date: "2026-11-08"
                },
                {
                    id: 4,
                    name: "Vision 2027",
                    description: "Un groupe privé tourné vers la réalisation de projets ambitieux à moyen terme.",
                    creator: "Estelle Mboumba",
                    visibility: "private",
                    status: "active",
                    amount: 200000,
                    period: "Mensuelle",
                    members: 4,
                    maxMembers: 20,
                    memberIds: [2, 4, 6, 8],
                    icon: "fa-line-chart",
                    date: "2026-11-07"
                },
                {
                    id: 5,
                    name: "Ensemble Réussir",
                    description: "Une communauté dynamique qui mise sur la régularité et la solidarité.",
                    creator: "Christian Moussavou",
                    visibility: "public",
                    status: "active",
                    amount: 25000,
                    period: "Hebdomadaire",
                    members: 4,
                    maxMembers: 10,
                    memberIds: [1, 5, 6, 8],
                    icon: "fa-users",
                    date: "2026-11-06"
                },
                {
                    id: 6,
                    name: "Cercle Horizon",
                    description: "Un cercle d'épargne à périodicité bimestrielle actuellement suspendu.",
                    creator: "Grâce Ndong",
                    visibility: "private",
                    status: "suspended",
                    amount: 50000,
                    period: "Bimestrielle",
                    members: 4,
                    maxMembers: 8,
                    memberIds: [2, 3, 6, 7],
                    icon: "fa-globe",
                    date: "2026-11-05"
                }
            ];

            /* =========================================================
               OUTILS
            ========================================================= */

            function escapeHtml(value) {
                return String(value == null ? "" : value)
                    .replace(/[&<>"']/g, function (character) {
                        return {
                            "&": "&amp;",
                            "<": "&lt;",
                            ">": "&gt;",
                            '"': "&quot;",
                            "'": "&#039;"
                        }[character];
                    });
            }

            function formatMoney(amount) {
                return new Intl.NumberFormat("fr-FR").format(amount) + " FCFA";
            }

            function getMember(id) {
                return membersData.find(function (member) {
                    return member.id === Number(id);
                });
            }

            function getGroup(id) {
                return groupsData.find(function (group) {
                    return group.id === Number(id);
                });
            }

            function getGroupMembers(group) {
                return group.memberIds
                    .map(getMember)
                    .filter(Boolean);
            }

            function notify(message) {
                if (typeof window.Swal !== "undefined") {
                    Swal.fire({
                        title: "Communauté",
                        text: message,
                        icon: "info",
                        confirmButtonText: "Compris",
                        background: "#080708",
                        color: "#FFFDFD",
                        confirmButtonColor: "#A31621"
                    });
                } else {
                    window.alert(message);
                }
            }

            /* =========================================================
               RECHERCHE ET FILTRES
            ========================================================= */

            function getFilteredGroups() {
                let groups = groupsData.slice();

                const search = String($(SELECTORS.search).val() || "")
                    .toLowerCase()
                    .trim();

                const visibility = $(SELECTORS.visibility).val() || "";
                const status = $(SELECTORS.status).val() || "";
                const period = $(SELECTORS.period).val() || "";
                const amount = $(SELECTORS.amount).val() || "";

                if (search) {
                    groups = groups.filter(function (group) {
                        return (
                            group.name.toLowerCase().includes(search) ||
                            group.description.toLowerCase().includes(search) ||
                            group.creator.toLowerCase().includes(search)
                        );
                    });
                }

                if (visibility) {
                    groups = groups.filter(function (group) {
                        return group.visibility === visibility;
                    });
                }

                if (status) {
                    groups = groups.filter(function (group) {
                        return group.status === status;
                    });
                }

                if (period) {
                    groups = groups.filter(function (group) {
                        return group.period.toLowerCase() === period.toLowerCase();
                    });
                }

                if (amount) {
                    if (amount === "0-25000") {
                        groups = groups.filter(g => g.amount <= 25000);
                    } else if (amount === "25000-50000") {
                        groups = groups.filter(g => g.amount > 25000 && g.amount <= 50000);
                    } else if (amount === "50000-100000") {
                        groups = groups.filter(g => g.amount > 50000 && g.amount <= 100000);
                    } else if (amount === "100000+") {
                        groups = groups.filter(g => g.amount > 100000);
                    }
                }

                const sort = $(SELECTORS.sort).val() || "recent";

                switch (sort) {
                    case "name":
                        groups.sort((a, b) => a.name.localeCompare(b.name, "fr"));
                        break;

                    case "amount-asc":
                        groups.sort((a, b) => a.amount - b.amount);
                        break;

                    case "amount-desc":
                        groups.sort((a, b) => b.amount - a.amount);
                        break;

                    case "members":
                        groups.sort((a, b) => b.members - a.members);
                        break;

                    case "recent":
                    default:
                        groups.sort((a, b) => new Date(b.date) - new Date(a.date));
                        break;
                }

                return groups;
            }

            /* =========================================================
               CARTES DES GROUPES
            ========================================================= */

            function renderGroupCard(group) {
                const full = group.members >= group.maxMembers;
                const suspended = group.status === "suspended";

                const statusLabel = suspended ? "Suspendu" : "Actif";
                const visibilityLabel = group.visibility === "private"
                    ? "Privé"
                    : "Public";

                const actionLabel = suspended
                    ? "Groupe suspendu"
                    : full
                        ? "Groupe complet"
                        : "Découvrir le groupe";

                return `
                    <div class="col-lg-4 col-md-6 mb-4 community-group-item"
                         data-group-id="${group.id}">

                        <div class="community-group-card h-100"
                             role="button"
                             tabindex="0"
                             data-open-group="${group.id}">

                            <div class="community-group-card-header">
                                <div class="community-group-icon">
                                    <i class="fa ${escapeHtml(group.icon)}"></i>
                                </div>

                                <div class="community-group-badges">
                                    <span class="badge ${group.visibility === "private" ? "badge-secondary" : "badge-info"}">
                                        ${visibilityLabel}
                                    </span>

                                    <span class="badge ${suspended ? "badge-danger" : "badge-success"}">
                                        ${statusLabel}
                                    </span>
                                </div>
                            </div>

                            <div class="community-group-card-body">
                                <h5>${escapeHtml(group.name)}</h5>

                                <p>${escapeHtml(group.description)}</p>

                                <div class="community-group-infos">
                                    <div>
                                        <i class="fa fa-money"></i>
                                        <span>${formatMoney(group.amount)}</span>
                                    </div>

                                    <div>
                                        <i class="fa fa-calendar"></i>
                                        <span>${escapeHtml(group.period)}</span>
                                    </div>

                                    <div>
                                        <i class="fa fa-users"></i>
                                        <span>${group.members}/${group.maxMembers} membres</span>
                                    </div>
                                </div>

                                <div class="community-group-progress">
                                    <div class="d-flex justify-content-between">
                                        <small>Capacité du groupe</small>
                                        <small>${Math.round(group.members / group.maxMembers * 100)}%</small>
                                    </div>

                                    <div class="progress">
                                        <div class="progress-bar"
                                             role="progressbar"
                                             style="width:${Math.min(100, group.members / group.maxMembers * 100)}%">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="community-group-card-footer">
                                <span>${escapeHtml(group.creator)}</span>

                                <span class="community-discover-link">
                                    ${actionLabel}
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                            </div>

                        </div>
                    </div>
                `;
            }

            /* =========================================================
               PAGINATION
            ========================================================= */

            function renderPagination(totalPages) {
                const $pagination = $(SELECTORS.pagination);

                if (!$pagination.length) {
                    return;
                }

                $pagination.empty();

                if (totalPages <= 1) {
                    return;
                }

                $pagination.append(`
                    <button type="button"
                            class="pagination-btn"
                            data-page="${currentPage - 1}"
                            ${currentPage === 1 ? "disabled" : ""}>
                        <i class="fa fa-chevron-left"></i>
                    </button>
                `);

                for (let page = 1; page <= totalPages; page++) {
                    $pagination.append(`
                        <button type="button"
                                class="pagination-btn ${page === currentPage ? "active" : ""}"
                                data-page="${page}">
                            ${page}
                        </button>
                    `);
                }

                $pagination.append(`
                    <button type="button"
                            class="pagination-btn"
                            data-page="${currentPage + 1}"
                            ${currentPage === totalPages ? "disabled" : ""}>
                        <i class="fa fa-chevron-right"></i>
                    </button>
                `);
            }

            /* =========================================================
               AFFICHAGE DES GROUPES
            ========================================================= */

            function renderGroups() {
                const $grid = $(SELECTORS.grid);

                if (!$grid.length) {
                    console.warn("Élément introuvable :", SELECTORS.grid);
                    return;
                }

                const groups = getFilteredGroups();
                const total = groups.length;

                const totalPages = Math.max(
                    1,
                    Math.ceil(total / GROUPS_PER_PAGE)
                );

                currentPage = Math.min(currentPage, totalPages);

                const start = (currentPage - 1) * GROUPS_PER_PAGE;
                const visibleGroups = groups.slice(
                    start,
                    start + GROUPS_PER_PAGE
                );

                $grid.empty();

                if (!visibleGroups.length) {
                    $(SELECTORS.empty).removeClass("d-none").show();
                } else {
                    $(SELECTORS.empty).addClass("d-none").hide();

                    visibleGroups.forEach(function (group) {
                        $grid.append(renderGroupCard(group));
                    });
                }

                $(SELECTORS.visibleCount).text(total);

                renderPagination(totalPages);

                animateCards();
            }

            /* =========================================================
               ANIMATION GSAP
            ========================================================= */

            function animateCards() {
                if (
                    !window.gsap ||
                    window.matchMedia("(prefers-reduced-motion: reduce)").matches
                ) {
                    return;
                }

                gsap.fromTo(
                    ".community-group-item",
                    {
                        opacity: 0,
                        y: 20
                    },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 0.45,
                        stagger: 0.07,
                        ease: "power2.out"
                    }
                );
            }

            /* =========================================================
               PROFIL D'UN MEMBRE
            ========================================================= */

            function openMemberProfile(memberId, returnModal) {
                const member = getMember(memberId);

                if (!member) {
                    return;
                }

                previousModal = returnModal || null;

                const $profile = $(SELECTORS.memberModal);

                if (!$profile.length) {
                    notify("La fenêtre du profil membre est introuvable.");
                    return;
                }

                $profile.find("[data-member-name]").text(member.name);
                $profile.find("[data-member-role]").text(member.role);
                $profile.find("[data-member-rating]").text(member.rating + "/5");
                $profile.find("[data-member-groups]").text(member.groups);
                $profile.find("[data-member-performance]").text(member.performance + "%");
                $profile.find("[data-member-photo]").attr("src", member.photo);

                $profile.find(".modal-body").scrollTop(0);

                const $return = returnModal ? $(returnModal) : $();

                if ($return.length && $return.hasClass("show")) {
                    $return.one("hidden.bs.modal", function () {
                        $profile.modal("show");
                    });

                    $return.modal("hide");
                } else {
                    $profile.modal("show");
                }
            }

            /* =========================================================
               DÉTAILS D'UN GROUPE
            ========================================================= */

            function openGroupModal(groupId) {
                const group = getGroup(groupId);

                if (!group) {
                    return;
                }

                currentGroup = group;

                const $modal = $(SELECTORS.groupModal);

                if (!$modal.length) {
                    notify("La fenêtre de présentation du groupe est introuvable.");
                    return;
                }

                $("#selectedGroupName").text(group.name);
                $("#selectedGroupDescription").text(group.description);
                $("#selectedGroupCreator").text(group.creator);
                $("#selectedGroupMembers").text(
                    group.members + " / " + group.maxMembers
                );
                $("#selectedGroupAmount").text(formatMoney(group.amount));
                $("#selectedGroupPeriod").text(group.period);

                const members = getGroupMembers(group);

                const $membersList = $(SELECTORS.membersList);

                if ($membersList.length) {
                    $membersList.empty();

                    members.forEach(function (member) {
                        $membersList.append(`
                            <div class="community-modal-member"
                                 role="button"
                                 tabindex="0"
                                 data-open-member="${member.id}">

                                <img src="${escapeHtml(member.photo)}"
                                     alt="${escapeHtml(member.name)}">

                                <div>
                                    <strong>${escapeHtml(member.name)}</strong>
                                    <small>${escapeHtml(member.role)}</small>
                                </div>

                                <i class="fa fa-angle-right"></i>
                            </div>
                        `);
                    });
                }

                const isFull = group.members >= group.maxMembers;
                const isSuspended = group.status === "suspended";

                const $joinButton = $(SELECTORS.joinButton);

                if ($joinButton.length) {
                    $joinButton
                        .prop("disabled", isFull || isSuspended)
                        .data("group-id", group.id);

                    if (isSuspended) {
                        $joinButton.text("Groupe suspendu");
                    } else if (isFull) {
                        $joinButton.text("Groupe complet");
                    } else {
                        $joinButton.text("Demander à rejoindre");
                    }
                }

                $modal.modal("show");
            }

            /* =========================================================
               LISTE DES INVITATIONS
            ========================================================= */

            function renderInviteMembers() {
                const $list = $("#inviteMembersList");

                if (!$list.length) {
                    return;
                }

                $list.empty();

                membersData.forEach(function (member) {
                    const selected = selectedInvites.includes(member.id);

                    $list.append(`
                        <div class="community-invite-member">

                            <img src="${escapeHtml(member.photo)}"
                                 alt="${escapeHtml(member.name)}">

                            <div class="community-invite-info">
                                <strong>${escapeHtml(member.name)}</strong>
                                <small>${escapeHtml(member.role)}</small>
                            </div>

                            <button type="button"
                                    class="btn btn-sm ${selected ? "btn-success" : "btn-outline-secondary"}"
                                    data-toggle-invite="${member.id}">
                                <i class="fa ${selected ? "fa-check" : "fa-plus"}"></i>
                            </button>

                            <button type="button"
                                    class="btn btn-sm btn-link"
                                    data-open-member="${member.id}">
                                Voir profil
                            </button>

                        </div>
                    `);
                });

                $("#selectedInviteCount").text(selectedInvites.length);
            }

            /* =========================================================
               ÉVÉNEMENTS : RECHERCHE ET FILTRES
            ========================================================= */

            $(document)
                .off("input.community", SELECTORS.search)
                .on("input.community", SELECTORS.search, function () {
                    currentPage = 1;
                    renderGroups();
                });

            $(document)
                .off("change.community", [
                    SELECTORS.visibility,
                    SELECTORS.status,
                    SELECTORS.period,
                    SELECTORS.amount,
                    SELECTORS.sort
                ].join(","))
                .on("change.community", [
                    SELECTORS.visibility,
                    SELECTORS.status,
                    SELECTORS.period,
                    SELECTORS.amount,
                    SELECTORS.sort
                ].join(","), function () {
                    currentPage = 1;
                    renderGroups();
                });

            /* =========================================================
               RÉINITIALISATION DES FILTRES
            ========================================================= */

            $(document)
                .off("click.community", "#resetFilters")
                .on("click.community", "#resetFilters", function (event) {
                    event.preventDefault();

                    $(SELECTORS.search).val("");
                    $(SELECTORS.visibility).val("");
                    $(SELECTORS.status).val("");
                    $(SELECTORS.period).val("");
                    $(SELECTORS.amount).val("");
                    $(SELECTORS.sort).val("recent");

                    currentPage = 1;
                    renderGroups();
                });

            /* =========================================================
               OUVERTURE / FERMETURE DES FILTRES
            ========================================================= */

            $(document)
                .off("click.community", "#filterToggle")
                .on("click.community", "#filterToggle", function () {
                    $("#communityFilters").stop(true, true).slideToggle(250);
                });

            /* =========================================================
               OUVERTURE D'UN GROUPE
            ========================================================= */

            $(document)
                .off("click.community", "[data-open-group]")
                .on("click.community", "[data-open-group]", function (event) {
                    if ($(event.target).closest("button, a").length) {
                        return;
                    }

                    openGroupModal($(this).data("open-group"));
                });

            $(document)
                .off("keydown.community", "[data-open-group]")
                .on("keydown.community", "[data-open-group]", function (event) {
                    if (event.key === "Enter" || event.key === " ") {
                        event.preventDefault();
                        openGroupModal($(this).data("open-group"));
                    }
                });

            /* =========================================================
               PAGINATION
            ========================================================= */

            $(document)
                .off("click.community", ".pagination-btn")
                .on("click.community", ".pagination-btn", function () {
                    const page = Number($(this).data("page"));

                    if (!page || $(this).prop("disabled")) {
                        return;
                    }

                    const totalPages = Math.max(
                        1,
                        Math.ceil(getFilteredGroups().length / GROUPS_PER_PAGE)
                    );

                    if (page < 1 || page > totalPages) {
                        return;
                    }

                    currentPage = page;
                    renderGroups();

                    const $grid = $(SELECTORS.grid);

                    if ($grid.length) {
                        $("html, body").animate({
                            scrollTop: $grid.offset().top - 100
                        }, 300);
                    }
                });

            /* =========================================================
               OUVERTURE D'UN PROFIL DEPUIS UNE MODALE
            ========================================================= */

            $(document)
                .off("click.community", "[data-open-member]")
                .on("click.community", "[data-open-member]", function (event) {
                    event.preventDefault();
                    event.stopPropagation();

                    const activeModal = $(this).closest(".modal").attr("id");
                    const returnModal = activeModal
                        ? "#" + activeModal
                        : null;

                    openMemberProfile(
                        $(this).data("open-member"),
                        returnModal
                    );
                });

            /* =========================================================
               RETOUR À LA MODALE PRÉCÉDENTE
            ========================================================= */

            $(document)
                .off("hidden.bs.modal.community", SELECTORS.memberModal)
                .on("hidden.bs.modal.community", SELECTORS.memberModal, function () {
                    if (previousModal && $(previousModal).length) {
                        $(previousModal).modal("show");
                    }

                    previousModal = null;
                });

            /* =========================================================
               DEMANDE D'ADHÉSION
            ========================================================= */

            $(document)
                .off("click.community", SELECTORS.joinButton)
                .on("click.community", SELECTORS.joinButton, function () {
                    const groupId = $(this).data("group-id");
                    const group = getGroup(groupId);

                    if (!group) {
                        return;
                    }

                    if (group.status === "suspended") {
                        notify("Ce groupe est actuellement suspendu.");
                        return;
                    }

                    if (group.members >= group.maxMembers) {
                        notify("Ce groupe a atteint sa capacité maximale.");
                        return;
                    }

                    notify(
                        "Votre demande d'adhésion au groupe « " +
                        group.name +
                        " » est simulée. Aucune demande n'a été enregistrée."
                    );
                });

            /* =========================================================
               SÉLECTION DES INVITATIONS
            ========================================================= */

            $(document)
                .off("click.community", "[data-toggle-invite]")
                .on("click.community", "[data-toggle-invite]", function () {
                    const id = Number($(this).data("toggle-invite"));

                    if (selectedInvites.includes(id)) {
                        selectedInvites = selectedInvites.filter(
                            memberId => memberId !== id
                        );
                    } else {
                        selectedInvites.push(id);
                    }

                    renderInviteMembers();
                });

            /* =========================================================
               CRÉATION STATIQUE D'UN GROUPE
            ========================================================= */

           
            /* =========================================================
               RACCOURCIS
            ========================================================= */

            $(document)
                .off("click.community", "[data-community-action]")
                .on("click.community", "[data-community-action]", function () {
                    const action = $(this).data("community-action");

                    switch (action) {
                        case "discover":
                            $("html, body").animate({
                                scrollTop: $(SELECTORS.grid).offset().top - 100
                            }, 350);
                            break;

                        case "create":
                            $(SELECTORS.createModal).modal("show");
                            break;

                        case "invite":
                            renderInviteMembers();
                            $("#inviteMembersModal").modal("show");
                            break;

                        case "reset":
                            $("#resetFilters").trigger("click");
                            break;
                    }
                });

            /* =========================================================
               INITIALISATION
            ========================================================= */

            function initCommunity() {
                currentPage = 1;
                selectedInvites = [];

                renderGroups();
                renderInviteMembers();

                console.info("Communauté initialisée.");
                console.info("Groupes disponibles :", groupsData.length);
                console.info("Membres disponibles :", membersData.length);
            }

            initCommunity();

        });

    })(window.jQuery);

})();
</script>

            </div>
        </div>
    </div>
{{-- FIN --}}


@endsection
@section('footer')
    <div class="suprression-selection">
        {{-- @include('dependances.templates.admins.gestions.delicatesses.periodicites._consoms.mettreselectcorbeille') --}}
    </div>
@endsection
