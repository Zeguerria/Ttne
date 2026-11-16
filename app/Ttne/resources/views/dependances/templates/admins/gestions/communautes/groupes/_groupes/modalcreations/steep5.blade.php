
{{-- DEBUT --}}
<section class="steep-5">
    <div class="steep-05">
        <div class="container-fluid">
            <div class="row  p-2">

                {{-- PRESENTATION --}}
                {{-- <div class="col-md-12">
                    <div class="community-section-heading">
                        <div>
                            <i class="fa fa-users"></i>
                            <span>Les participants</span>
                        </div>
                        <small>
                            Ajoutez des membres disposant déjà d'un compte
                            ou invitez une personne par son numéro.
                        </small>
                    </div>
                </div> --}}

                {{-- SELECTION COMMUNE DES MEMBRES --}}
                <div class="col-md-12">
                    <div class="community-selection-panel">

                        <div class="community-selection-header">
                            <div>
                                <i class="fa fa-user-plus"></i>
                                <strong>Participants sélectionnés</strong>
                            </div>

                            <span class="community-selection-counter">
                                <b id="selectedMembersCount">0</b>
                                membre(s)
                            </span>
                        </div>

                        {{-- Les vrais champs transmis au serveur sont générés ici --}}
                        <div id="selectedMembersInputs"></div>

                        <div id="selectedMembersDisplay"
                             class="community-selected-members">
                            <span class="community-selection-empty">
                                Aucun participant sélectionné pour le moment.
                            </span>
                        </div>

                        <div class="community-selection-actions">
                            <small>
                                <i class="fa fa-info-circle"></i>
                                Une même personne ne peut être ajoutée qu'une fois.
                            </small>

                            <button type="button"
                                    class="btn btn-link"
                                    id="clearSelectedMembers">
                                Tout désélectionner
                            </button>
                        </div>
                    </div>
                </div>

                {{-- RECHERCHE PAR NOM --}}
                <div class="col-md-6">
                    <div class="community-member-selector">
                        <div class="community-selector-heading">
                            <span>
                                <i class="fa fa-user"></i>
                                Recherche par nom
                            </span>
                            <small>Nom ou prénom</small>
                        </div>

                        <div class="futureField">
                            <div class="futureInput">
                                <i class="fa fa-search inputIcon"></i>
                                <input type="search"
                                       id="groupMemberNameSearch"
                                       class="form-control"
                                       placeholder="Rechercher un nom ou prénom...">
                            </div>
                        </div>

                        <div class="community-member-list"
                             id="groupMemberNameList">

                            @forelse($membresInvitables ?? [] as $membre)
                                <label class="community-member-option"
                                       data-member-id="{{ $membre->id }}"
                                       data-member-name="{{ strtolower(trim(($membre->prenom ?? '') . ' ' . ($membre->name ?? ''))) }}"
                                       data-member-phone="{{ preg_replace('/\D+/', '', $membre->telephone ?? '') }}"
                                       data-member-search="{{ strtolower(trim(($membre->prenom ?? '') . ' ' . ($membre->name ?? ''))) }}">

                                    <span class="community-member-check">
                                        <input type="checkbox"
                                               class="group-member-checkbox"
                                               data-member-id="{{ $membre->id }}">

                                        <span class="custom-check">
                                            <i class="fa fa-check"></i>
                                        </span>
                                    </span>

                                    <span class="community-member-avatar">
                                        @if(!empty($membre->photo))
                                            <img src="{{ asset('storage/' . $membre->photo) }}"
                                                 alt="Photo de {{ $membre->prenom }} {{ $membre->name }}">
                                        @else
                                            <i class="fa fa-user"></i>
                                        @endif
                                    </span>

                                    <span class="community-member-details">
                                        <strong>{{ $membre->prenom }} {{ $membre->name }}</strong>
                                        <small>{{ $membre->telephone ?? $membre->email ?? 'Coordonnées indisponibles' }}</small>
                                    </span>
                                </label>
                            @empty
                                <div class="community-no-result">
                                    <i class="fa fa-users"></i>
                                    <p>Aucun membre disponible.</p>
                                </div>
                            @endforelse

                            <div class="community-no-result js-member-no-result"
                                 style="display:none;">
                                <i class="fa fa-search"></i>
                                <p>Aucun résultat pour cette recherche.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RECHERCHE PAR NUMERO --}}
                <div class="col-md-6">
                    <div class="community-member-selector">
                        <div class="community-selector-heading">
                            <span>
                                <i class="fa fa-phone"></i>
                                Recherche par numéro
                            </span>
                            <small>Comptes existants uniquement</small>
                        </div>

                        <div class="futureField">
                            <div class="futureInput">
                                <i class="fa fa-search inputIcon"></i>
                                <input type="search"
                                       id="groupMemberPhoneSearch"
                                       class="form-control"
                                       placeholder="Rechercher un numéro...">
                            </div>
                        </div>

                        <div class="community-member-list"
                             id="groupMemberPhoneList">

                            @forelse($membresInvitables ?? [] as $membre)
                                <label class="community-member-option"
                                       data-member-id="{{ $membre->id }}"
                                       data-member-name="{{ strtolower(trim(($membre->prenom ?? '') . ' ' . ($membre->name ?? ''))) }}"
                                       data-member-phone="{{ preg_replace('/\D+/', '', $membre->telephone ?? '') }}"
                                       data-member-search="{{ preg_replace('/\D+/', '', $membre->telephone ?? '') }}">

                                    <span class="community-member-check">
                                        <input type="checkbox"
                                               class="group-member-checkbox"
                                               data-member-id="{{ $membre->id }}">

                                        <span class="custom-check">
                                            <i class="fa fa-check"></i>
                                        </span>
                                    </span>

                                    <span class="community-member-avatar">
                                        @if(!empty($membre->photo))
                                            <img src="{{ asset('storage/' . $membre->photo) }}"
                                                 alt="Photo de {{ $membre->prenom }} {{ $membre->name }}">
                                        @else
                                            <i class="fa fa-user"></i>
                                        @endif
                                    </span>

                                    <span class="community-member-details">
                                        <strong>{{ $membre->prenom }} {{ $membre->name }}</strong>
                                        <small>{{ $membre->telephone ?? 'Aucun numéro renseigné' }}</small>
                                    </span>
                                </label>
                            @empty
                                <div class="community-no-result">
                                    <i class="fa fa-users"></i>
                                    <p>Aucun compte disponible.</p>
                                </div>
                            @endforelse

                            <div class="community-no-result js-member-no-result"
                                 style="display:none;">
                                <i class="fa fa-search"></i>
                                <p>Aucun résultat pour cette recherche.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- INVITATION D'UNE PERSONNE SANS COMPTE --}}
                <div class="col-md-12">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-phone"></i>
                            Inviter une personne sans compte
                        </label>

                        <div class="community-phone-add">
                            <div class="futureInput">
                                <i class="fa fa-phone inputIcon"></i>
                                <input type="tel"
                                       id="groupInvitePhone"
                                       class="form-control"
                                       placeholder="Ex : +241 07 00 00 00">
                            </div>

                            <button type="button"
                                    class="futureBtn successBtn"
                                    id="addGroupInvitePhone">
                                <i class="fa fa-plus"></i>
                                Ajouter
                            </button>
                        </div>

                        <small class="community-field-hint">
                            Cette option permet d'inviter une personne qui ne possède
                            pas encore de compte.
                        </small>

                        <div id="groupPhoneInvitations"
                             class="community-phone-list"></div>
                    </div>
                </div>

                {{-- CANAL D'INVITATION --}}
                <div class="col-md-12">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-paper-plane"></i>
                            Canal d'invitation
                        </label>

                        <div class="community-channel-grid">

                            <label class="community-channel-option selected">
                                <input type="radio"
                                       name="canal_invitation"
                                       value="AUTOMATIQUE"
                                       checked>

                                <span class="community-channel-content">
                                    <i class="fa fa-cogs"></i>
                                    <strong>Automatique</strong>
                                    <small>Le système choisit le canal disponible.</small>
                                </span>
                            </label>

                            <label class="community-channel-option">
                                <input type="radio"
                                       name="canal_invitation"
                                       value="SMS">

                                <span class="community-channel-content">
                                    <i class="fa fa-commenting"></i>
                                    <strong>SMS</strong>
                                    <small>Invitation par message téléphonique.</small>
                                </span>
                            </label>

                            <label class="community-channel-option">
                                <input type="radio"
                                       name="canal_invitation"
                                       value="WHATSAPP">

                                <span class="community-channel-content">
                                    <i class="fa fa-whatsapp"></i>
                                    <strong>WhatsApp</strong>
                                    <small>Invitation par WhatsApp.</small>
                                </span>
                            </label>

                        </div>
                    </div>
                </div>

                {{-- INFORMATIONS --}}
                <div class="col-md-12">
                    <div class="futureFinal">
                        <i class="fa fa-info-circle"></i>
                        <h3>Construisez votre communauté</h3>
                        <p>
                            Vous pouvez ajouter des participants maintenant ou créer
                            votre groupe sans invitation. Les invitations resteront
                            soumises à l'acceptation de leurs destinataires. Les autres
                            personnes pourront également découvrir votre groupe et
                            demander à le rejoindre selon les règles que vous avez définies.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
{{-- FIN --}}
<style>

/* ==========================================================
   COMMUNAUTE — STEEP 5
   PARTICIPANTS ET INVITATIONS
========================================================== */

/* PANNEAUX */

.steep-5 .community-selection-panel,
.steep-5 .community-member-selector {
    width: 100%;
    max-width: 100%;
    min-width: 0;
    padding: 20px;

    border: 1px solid var(--community-border);
    border-radius: 17px;

    background:
        linear-gradient(145deg, rgba(255,255,255,.035), transparent 55%),
        var(--community-panel);

    box-shadow: 0 12px 35px rgba(0,0,0,.13);
}

.steep-5 .community-selection-panel {
    border-color: rgba(0,217,239,.16);
    background:
        radial-gradient(ellipse at top right, rgba(0,217,239,.055), transparent 55%),
        var(--community-panel);
}

/* EN-TETE DE SELECTION */

.steep-5 .community-selection-header,
.steep-5 .community-selection-header > div,
.steep-5 .community-selection-actions,
.steep-5 .community-selector-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}

.steep-5 .community-selection-header {
    padding-bottom: 15px;
    border-bottom: 1px solid var(--community-border);
}

.steep-5 .community-selection-header > div {
    justify-content: flex-start;
    min-width: 0;
    color: #fff;
    font-size: 13px;
}

.steep-5 .community-selection-header > div i {
    flex-shrink: 0;
    color: var(--community-cyan);
    font-size: 15px;
}

.steep-5 .community-selection-counter {
    flex-shrink: 0;
    padding: 6px 11px;
    border: 1px solid rgba(0,217,239,.20);
    border-radius: 30px;
    background: var(--community-cyan-soft);
    color: #b9cbd1;
    font-size: 11px;
}

.steep-5 .community-selection-counter b {
    color: var(--community-cyan);
    font-size: 14px;
}

/* MEMBRES SELECTIONNES */

.steep-5 .community-selected-members {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 9px;

    width: 100%;
    max-width: 100%;
    min-width: 0;
    min-height: 62px;
    padding: 14px 0 8px;
}

.steep-5 .community-selection-empty {
    color: var(--community-muted);
    font-size: 12px;
}

.steep-5 .community-selected-chip {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    max-width: 100%;
    min-width: 0;
    padding: 7px 9px 7px 12px;

    border: 1px solid rgba(0,217,239,.20);
    border-radius: 30px;
    background: rgba(0,217,239,.075);

    color: #eaf9fb;
    font-size: 11px;

    animation: communityChipIn .2s ease both;
}

.steep-5 .community-selected-chip span {
    min-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.steep-5 .community-selected-chip button {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 21px;
    height: 21px;
    flex: 0 0 21px;
    padding: 0;

    border: 0;
    border-radius: 50%;
    background: rgba(255,255,255,.08);
    color: #ff8585;
    font-size: 10px;
    cursor: pointer;

    transition: background .2s ease, color .2s ease;
}

.steep-5 .community-selected-chip button:hover {
    background: rgba(255,95,95,.17);
    color: #fff;
}

/* ACTIONS */

.steep-5 .community-selection-actions {
    flex-wrap: wrap;
    width: 100%;
    min-width: 0;
    padding-top: 12px;
    border-top: 1px solid rgba(255,255,255,.055);
}

.steep-5 .community-selection-actions small {
    color: var(--community-muted);
    font-size: 10px;
    line-height: 1.6;
}

.steep-5 .community-selection-actions small i {
    margin-right: 5px;
    color: var(--community-cyan);
}

.steep-5 .community-selection-actions .btn {
    padding: 4px 0;
    color: var(--community-cyan);
    font-size: 11px;
    text-decoration: none;
    white-space: nowrap;
}

.steep-5 .community-selection-actions .btn:hover {
    color: #fff;
}

/* TITRES DES SELECTEURS */

.steep-5 .community-selector-heading {
    align-items: flex-start;
    min-width: 0;
    margin-bottom: 15px;
}

.steep-5 .community-selector-heading > span {
    display: flex;
    align-items: center;
    gap: 9px;
    min-width: 0;
    color: #f1f6f8;
    font-size: 13px;
    font-weight: 600;
}

.steep-5 .community-selector-heading > span i {
    flex-shrink: 0;
    color: var(--community-cyan);
}

.steep-5 .community-selector-heading small {
    color: var(--community-muted);
    font-size: 10px;
    text-align: right;
}

/* RECHERCHES DES MEMBRES */

.steep-5 .community-member-selector .futureField {
    margin-bottom: 14px;
}

.steep-5 .community-member-selector .futureInput {
    min-width: 0;
}

.steep-5 .community-member-selector .futureInput input {
    width: 100%;
    min-width: 0;
    height: 48px;
    padding-left: 43px;
    padding-right: 14px;
}

/* LISTE */

.steep-5 .community-member-list {
    display: flex;
    flex-direction: column;
    gap: 7px;

    width: 100%;
    max-width: 100%;
    min-width: 0;
    max-height: 300px;

    overflow-x: hidden;
    overflow-y: auto;
    overscroll-behavior: contain;

    padding: 2px 5px 2px 2px;

    scrollbar-width: thin;
    scrollbar-color: rgba(0,217,239,.35) transparent;
}

.steep-5 .community-member-list::-webkit-scrollbar {
    width: 4px;
}

.steep-5 .community-member-list::-webkit-scrollbar-track {
    background: transparent;
}

.steep-5 .community-member-list::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background: rgba(0,217,239,.35);
}

/* CARTE MEMBRE */

.steep-5 .community-member-option {
    position: relative;
    display: flex;
    align-items: center;
    gap: 11px;

    width: 100%;
    max-width: 100%;
    min-width: 0;
    min-height: 66px;
    margin: 0;
    padding: 10px 12px;

    border: 1px solid rgba(255,255,255,.065);
    border-radius: 12px;
    background: rgba(255,255,255,.018);

    cursor: pointer;

    transition: border-color .2s ease,
                background .2s ease,
                transform .2s ease;
}

.steep-5 .community-member-option:hover {
    border-color: rgba(0,217,239,.27);
    background: rgba(0,217,239,.035);
}

.steep-5 .community-member-option.selected {
    border-color: rgba(0,217,239,.42);
    background: rgba(0,217,239,.075);
}

.steep-5 .community-member-option.hidden-by-search {
    display: none !important;
}

/* CHECKBOX */

.steep-5 .community-member-check {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;

    width: 19px;
    height: 19px;
    flex: 0 0 19px;
}

.steep-5 .community-member-check input {
    position: absolute;
    z-index: 2;
    inset: 0;

    width: 100%;
    height: 100%;
    margin: 0;
    opacity: 0;
    cursor: pointer;
}

.steep-5 .community-member-check .custom-check {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 19px;
    height: 19px;

    border: 1px solid rgba(255,255,255,.25);
    border-radius: 6px;
    background: rgba(255,255,255,.025);

    color: transparent;
    font-size: 10px;
    transition: .2s ease;
}

.steep-5 .community-member-option.selected .custom-check {
    border-color: var(--community-cyan);
    background: var(--community-cyan);
    color: #071014;
    box-shadow: 0 0 12px rgba(0,217,239,.18);
}

/* AVATAR */

.steep-5 .community-member-avatar {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 40px;
    height: 40px;
    flex: 0 0 40px;
    overflow: hidden;

    border: 1px solid rgba(0,217,239,.20);
    border-radius: 50%;
    background: rgba(0,217,239,.07);

    color: var(--community-cyan);
    font-size: 15px;
}

.steep-5 .community-member-avatar img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* INFORMATIONS */

.steep-5 .community-member-details {
    display: flex;
    flex: 1 1 auto;
    flex-direction: column;
    gap: 4px;

    min-width: 0;
    overflow: hidden;
}

.steep-5 .community-member-details strong,
.steep-5 .community-member-details small {
    display: block;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.steep-5 .community-member-details strong {
    color: #edf5f7;
    font-size: 11px;
    font-weight: 600;
}

.steep-5 .community-member-details small {
    color: var(--community-muted);
    font-size: 10px;
}

/* AUCUN RESULTAT */

.steep-5 .community-no-result {
    padding: 25px 12px;
    color: var(--community-muted);
    text-align: center;
}

.steep-5 .community-no-result i {
    display: block;
    margin-bottom: 9px;
    color: var(--community-cyan);
    font-size: 21px;
}

.steep-5 .community-no-result p {
    margin: 0;
    font-size: 11px;
}

/* INVITATION PAR TELEPHONE */

.steep-5 .community-phone-add {
    display: flex;
    align-items: stretch;
    gap: 10px;

    width: 100%;
    max-width: 100%;
    min-width: 0;
}

.steep-5 .community-phone-add .futureInput {
    flex: 1 1 auto;
    min-width: 0;
}

.steep-5 .community-phone-add .futureInput input {
    height: 48px;
    padding-left: 43px;
    padding-right: 14px;
}

.steep-5 .community-phone-add .futureBtn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    flex: 0 0 auto;
    min-width: 112px;
    white-space: nowrap;
}

.steep-5 .community-field-hint {
    display: block;
    margin-top: 8px;
    color: var(--community-muted);
    font-size: 10px;
    line-height: 1.6;
}

/* NUMEROS AJOUTES */

.steep-5 .community-phone-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;

    width: 100%;
    max-width: 100%;
    min-width: 0;
    margin-top: 13px;
}

.steep-5 .community-phone-chip {
    display: inline-flex;
    align-items: center;
    gap: 10px;

    max-width: 100%;
    min-width: 0;
    padding: 8px 10px 8px 13px;

    border: 1px solid rgba(0,217,239,.20);
    border-radius: 30px;
    background: rgba(0,217,239,.065);

    color: #e8f5f8;
    font-size: 11px;
}

.steep-5 .community-phone-chip span {
    min-width: 0;
    overflow-wrap: anywhere;
}

.steep-5 .community-phone-chip button {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 20px;
    height: 20px;
    flex: 0 0 20px;
    padding: 0;

    border: 0;
    border-radius: 50%;
    background: rgba(255,255,255,.08);

    color: #ff8585;
    cursor: pointer;
}

/* CANAUX D'INVITATION */

.steep-5 .community-channel-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 12px;

    width: 100%;
    max-width: 100%;
    min-width: 0;
}

.steep-5 .community-channel-option {
    position: relative;
    display: block;

    min-width: 0;
    max-width: 100%;
    margin: 0;
    cursor: pointer;
}

.steep-5 .community-channel-option input {
    position: absolute;
    width: 1px;
    height: 1px;
    opacity: 0;
    pointer-events: none;
}

.steep-5 .community-channel-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;

    width: 100%;
    min-width: 0;
    height: 100%;
    min-height: 130px;
    padding: 17px 12px;

    border: 1px solid var(--community-border);
    border-radius: 14px;

    background: rgba(255,255,255,.02);
    text-align: center;

    transition: border-color .22s ease,
                background .22s ease,
                transform .22s ease,
                box-shadow .22s ease;
}

.steep-5 .community-channel-content > i {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 39px;
    height: 39px;

    border: 1px solid rgba(255,255,255,.08);
    border-radius: 12px;
    background: rgba(255,255,255,.035);

    color: #9aaab3;
    font-size: 17px;
}

.steep-5 .community-channel-content strong {
    color: #edf5f7;
    font-size: 12px;
    font-weight: 600;
}

.steep-5 .community-channel-content small {
    max-width: 180px;
    color: var(--community-muted);
    font-size: 10px;
    line-height: 1.55;
}

.steep-5 .community-channel-option:hover .community-channel-content {
    transform: translateY(-2px);
    border-color: rgba(0,217,239,.27);
    background: rgba(0,217,239,.035);
}

.steep-5 .community-channel-option.selected .community-channel-content {
    border-color: rgba(0,217,239,.52);
    background: linear-gradient(145deg, rgba(0,217,239,.09), rgba(0,217,239,.025));
    box-shadow: 0 8px 24px rgba(0,0,0,.12),
                inset 0 0 18px rgba(0,217,239,.025);
}

.steep-5 .community-channel-option.selected .community-channel-content > i {
    border-color: rgba(0,217,239,.25);
    background: rgba(0,217,239,.10);
    color: var(--community-cyan);
}

.steep-5 .community-channel-option input:focus-visible + .community-channel-content {
    outline: 2px solid var(--community-cyan);
    outline-offset: 3px;
}

/* MESSAGE FINAL */

.steep-5 .futureFinal {
    width: 100%;
    max-width: 100%;
    padding: 19px 20px;

    border: 1px solid rgba(0,217,239,.15);
    border-radius: 15px;

    background:
        linear-gradient(110deg, rgba(0,217,239,.065), transparent 75%),
        rgba(255,255,255,.018);
}

.steep-5 .futureFinal > i {
    color: var(--community-cyan);
    font-size: 18px;
}

.steep-5 .futureFinal h3 {
    margin: 10px 0 7px;
    color: #f2f8fa;
    font-size: 14px;
    font-weight: 700;
}

.steep-5 .futureFinal p {
    margin: 0;
    color: var(--community-muted);
    font-size: 11px;
    line-height: 1.8;
}

/* ANIMATION */

@keyframes communityChipIn {
    from {
        opacity: 0;
        transform: translateY(5px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* RESPONSIVE */

@media (max-width: 991.98px) {
    .steep-5 .community-selection-panel,
    .steep-5 .community-member-selector {
        padding: 17px;
    }

    .steep-5 .community-member-list {
        max-height: 270px;
    }

    .steep-5 .community-channel-grid {
        gap: 9px;
    }
}

@media (max-width: 767.98px) {
    .steep-5 .community-selection-panel,
    .steep-5 .community-member-selector {
        padding: 15px;
        border-radius: 14px;
    }

    .steep-5 .community-member-list {
        max-height: 250px;
    }

    .steep-5 .community-channel-grid {
        grid-template-columns: 1fr;
        gap: 8px;
    }

    .steep-5 .community-channel-content {
        display: grid;
        grid-template-columns: 42px minmax(0, 1fr);
        grid-template-rows: auto auto;
        justify-content: start;

        min-height: 0;
        padding: 12px;
        text-align: left;
    }

    .steep-5 .community-channel-content > i {
        grid-row: 1 / 3;
        width: 36px;
        height: 36px;
    }

    .steep-5 .community-channel-content strong,
    .steep-5 .community-channel-content small {
        max-width: none;
        text-align: left;
    }

    .steep-5 .community-channel-content strong {
        align-self: end;
    }

    .steep-5 .community-channel-content small {
        align-self: start;
    }
}

@media (max-width: 480px) {
    .steep-5 .community-selection-header {
        align-items: flex-start;
    }

    .steep-5 .community-selection-header > div {
        font-size: 12px;
    }

    .steep-5 .community-selection-counter {
        padding: 5px 8px;
        font-size: 10px;
    }

    .steep-5 .community-selection-actions {
        align-items: flex-start;
        flex-direction: column;
        gap: 8px;
    }

    .steep-5 .community-selector-heading {
        flex-direction: column;
        gap: 5px;
    }

    .steep-5 .community-selector-heading small {
        text-align: left;
    }

    .steep-5 .community-phone-add {
        flex-direction: column;
    }

    .steep-5 .community-phone-add .futureBtn {
        width: 100%;
        min-height: 44px;
    }

    .steep-5 .community-member-option {
        gap: 9px;
        padding: 9px;
    }

    .steep-5 .community-member-avatar {
        width: 35px;
        height: 35px;
        flex-basis: 35px;
    }

    .steep-5 .community-member-details strong {
        font-size: 10px;
    }

    .steep-5 .community-member-details small {
        font-size: 9px;
    }

    .steep-5 .community-member-list {
        max-height: 230px;
    }

    .steep-5 .futureFinal {
        padding: 15px;
    }
}

</style>
<script>


(function ($) {
    'use strict';

    if (!$) {
        console.error('Communauté — Étape 5 : jQuery est requis.');
        return;
    }

    const namespace = '.communityParticipants';

    /* ======================================================
       OUTILS
    ====================================================== */

    function normaliserNumero(numero) {
        return String(numero || '').replace(/\D/g, '');
    }

    function afficherMessage(message, type) {

        type = type || 'info';

        if (typeof window.toast === 'function') {
            window.toast(message);
            return;
        }

        if (window.Swal && typeof window.Swal.fire === 'function') {
            window.Swal.fire({
                toast: true,
                position: 'top-end',
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 3200,
                timerProgressBar: true
            });
            return;
        }

        window.alert(message);
    }

    /* ======================================================
       INITIALISATION DES PARTICIPANTS
    ====================================================== */

    function initialiserParticipants() {

        const $nameList = $('#groupMemberNameList');
        const $phoneList = $('#groupMemberPhoneList');

        if (!$nameList.length || !$phoneList.length) {
            return;
        }

        if ($nameList.data('community-initialized')) {
            return;
        }

        $nameList.data('community-initialized', true);

        /*
         * Source unique de sélection.
         * Un membre ne peut être enregistré qu'une fois.
         */
        const participants = Object.create(null);

        /* --------------------------------------------------
           RECUPERATION DES OPTIONS ET CASES
        -------------------------------------------------- */

        function toutesLesOptions() {
            return $(
                '#groupMemberNameList .community-member-option, ' +
                '#groupMemberPhoneList .community-member-option'
            );
        }

        function toutesLesCases(id) {

            return $('.group-member-checkbox').filter(function () {
                return String($(this).attr('data-member-id')) === String(id);
            });
        }

        /* --------------------------------------------------
           VERIFICATION DES DOUBLONS TELEPHONIQUES
        -------------------------------------------------- */

        function telephoneExisteDansLesComptes(numero) {

            const recherche = normaliserNumero(numero);

            if (!recherche) {
                return false;
            }

            let existe = false;

            toutesLesOptions().each(function () {

                const telephone = normaliserNumero(
                    $(this).attr('data-member-phone')
                );

                if (telephone && telephone === recherche) {
                    existe = true;
                    return false;
                }
            });

            return existe;
        }

        function telephoneExisteDansInvitations(numero) {

            const recherche = normaliserNumero(numero);

            let existe = false;

            $('#groupPhoneInvitations .community-phone-chip').each(function () {

                const telephone = normaliserNumero(
                    $(this).attr('data-phone')
                );

                if (telephone === recherche) {
                    existe = true;
                    return false;
                }
            });

            return existe;
        }

        /* --------------------------------------------------
           SYNCHRONISATION DES CASES
        -------------------------------------------------- */

        function synchroniserCases(id, coche) {

            toutesLesCases(id)
                .prop('checked', coche)
                .closest('.community-member-option')
                .toggleClass('selected', coche);
        }

        /* --------------------------------------------------
           AFFICHAGE DES PARTICIPANTS SELECTIONNES
        -------------------------------------------------- */

        function actualiserSelection() {

            const $inputs = $('#selectedMembersInputs');
            const $display = $('#selectedMembersDisplay');

            if (!$inputs.length || !$display.length) {
                return;
            }

            $inputs.empty();
            $display.empty();

            const ids = Object.keys(participants);

            $('#selectedMembersCount').text(ids.length);

            if (ids.length === 0) {

                $('<span>', {
                    class: 'community-selection-empty',
                    text: 'Aucun participant sélectionné pour le moment.'
                }).appendTo($display);

                return;
            }

            ids.forEach(function (id) {

                const membre = participants[id];

                $('<input>', {
                    type: 'hidden',
                    name: 'membres_invites[]',
                    value: id
                }).appendTo($inputs);

                const $chip = $('<div>', {
                    class: 'community-selected-chip'
                });

                $('<span>', {
                    text: membre.nom
                }).appendTo($chip);

                const $remove = $('<button>', {
                    type: 'button',
                    title: 'Retirer ce participant',
                    'aria-label': 'Retirer ' + membre.nom
                });

                $('<i>', {
                    class: 'fa fa-times'
                }).appendTo($remove);

                $remove.on('click', function () {
                    retirerParticipant(id);
                });

                $chip.append($remove);
                $display.append($chip);
            });
        }

        /* --------------------------------------------------
           AJOUT D'UN PARTICIPANT
        -------------------------------------------------- */

        function ajouterParticipant($option) {

            const id = String($option.attr('data-member-id') || '');

            if (!id) {
                return;
            }

            if (participants[id]) {
                synchroniserCases(id, true);
                return;
            }

            const telephone = normaliserNumero(
                $option.attr('data-member-phone')
            );

            if (
                telephone &&
                telephoneExisteDansInvitations(telephone)
            ) {
                synchroniserCases(id, false);

                afficherMessage(
                    'Ce numéro figure déjà dans les invitations externes.',
                    'warning'
                );

                return;
            }

            const nom = $option
                .find('.community-member-details strong')
                .first()
                .text()
                .trim();

            participants[id] = {
                id: id,
                nom: nom || 'Membre #' + id,
                telephone: telephone
            };

            synchroniserCases(id, true);
            actualiserSelection();
        }

        /* --------------------------------------------------
           RETRAIT D'UN PARTICIPANT
        -------------------------------------------------- */

        function retirerParticipant(id) {

            id = String(id);

            if (!participants[id]) {
                return;
            }

            delete participants[id];

            synchroniserCases(id, false);
            actualiserSelection();
        }

        /* --------------------------------------------------
           EVENEMENT DES CASES
        -------------------------------------------------- */

        $(document)
            .off('change' + namespace, '.group-member-checkbox')
            .on('change' + namespace, '.group-member-checkbox', function () {

                const $checkbox = $(this);
                const id = String($checkbox.attr('data-member-id') || '');
                const $option = $checkbox.closest('.community-member-option');

                if (!id) {
                    return;
                }

                if ($checkbox.is(':checked')) {
                    ajouterParticipant($option);
                } else {
                    retirerParticipant(id);
                }
            });

        /* --------------------------------------------------
           RECHERCHE PAR NOM
        -------------------------------------------------- */

        $('#groupMemberNameSearch')
            .off('input' + namespace)
            .on('input' + namespace, function () {

                const recherche = String($(this).val() || '')
                    .toLocaleLowerCase()
                    .trim();

                let resultats = 0;

                $nameList.find('.community-member-option').each(function () {

                    const $option = $(this);

                    const nom = String(
                        $option.attr('data-member-name') || ''
                    ).toLocaleLowerCase();

                    const visible = nom.includes(recherche);

                    $option.toggleClass('hidden-by-search', !visible);

                    if (visible) {
                        resultats++;
                    }
                });

                $nameList.find('.js-member-no-result')
                    .toggle(resultats === 0);
            });

        /* --------------------------------------------------
           RECHERCHE PAR NUMERO
        -------------------------------------------------- */

        $('#groupMemberPhoneSearch')
            .off('input' + namespace)
            .on('input' + namespace, function () {

                const recherche = normaliserNumero($(this).val());

                let resultats = 0;

                $phoneList.find('.community-member-option').each(function () {

                    const $option = $(this);

                    const numero = normaliserNumero(
                        $option.attr('data-member-search')
                    );

                    const visible = numero.includes(recherche);

                    $option.toggleClass('hidden-by-search', !visible);

                    if (visible) {
                        resultats++;
                    }
                });

                $phoneList.find('.js-member-no-result')
                    .toggle(resultats === 0);
            });

        /* --------------------------------------------------
           TOUT DESELECTIONNER
        -------------------------------------------------- */

        $('#clearSelectedMembers')
            .off('click' + namespace)
            .on('click' + namespace, function () {

                Object.keys(participants).forEach(function (id) {
                    delete participants[id];
                    synchroniserCases(id, false);
                });

                actualiserSelection();
            });

        /* --------------------------------------------------
           AJOUT D'UNE INVITATION PAR TELEPHONE
        -------------------------------------------------- */

        function ajouterInvitationTelephone() {

            const $input = $('#groupInvitePhone');
            const numeroSaisi = String($input.val() || '').trim();

            const numero = numeroSaisi.replace(/[\s().-]/g, '');

            if (!/^\+[1-9]\d{7,14}$/.test(numero)) {

                afficherMessage(
                    'Saisissez un numéro international valide, par exemple +241 07 00 00 00.',
                    'warning'
                );

                $input.trigger('focus');
                return;
            }

            const numeroNormalise = normaliserNumero(numero);

            if (telephoneExisteDansLesComptes(numeroNormalise)) {

                afficherMessage(
                    'Ce numéro appartient déjà à un compte. Retrouvez cette personne dans la recherche par numéro.',
                    'warning'
                );

                return;
            }

            if (telephoneExisteDansInvitations(numeroNormalise)) {

                afficherMessage(
                    'Ce numéro a déjà été ajouté.',
                    'warning'
                );

                return;
            }

            const $chip = $('<div>', {
                class: 'community-phone-chip',
                'data-phone': numeroNormalise
            });

            $('<span>', {
                text: numero
            }).appendTo($chip);

            $('<input>', {
                type: 'hidden',
                name: 'telephones_invitation[]',
                value: numero
            }).appendTo($chip);

            const $remove = $('<button>', {
                type: 'button',
                title: 'Retirer ce numéro',
                'aria-label': 'Retirer le numéro ' + numero
            });

            $('<i>', {
                class: 'fa fa-times'
            }).appendTo($remove);

            $remove.on('click', function () {
                $chip.remove();
            });

            $chip.append($remove);

            $('#groupPhoneInvitations').append($chip);

            $input.val('').trigger('focus');
        }

        $('#addGroupInvitePhone')
            .off('click' + namespace)
            .on('click' + namespace, ajouterInvitationTelephone);

        $('#groupInvitePhone')
            .off('keydown' + namespace)
            .on('keydown' + namespace, function (event) {

                if (event.key === 'Enter') {
                    event.preventDefault();
                    ajouterInvitationTelephone();
                }
            });

        /* --------------------------------------------------
           CANAL D'INVITATION
        -------------------------------------------------- */

        $(document)
            .off(
                'change' + namespace,
                '.community-channel-option input[name="canal_invitation"]'
            )
            .on(
                'change' + namespace,
                '.community-channel-option input[name="canal_invitation"]',
                function () {

                    $('.community-channel-option')
                        .removeClass('selected');

                    $(this)
                        .closest('.community-channel-option')
                        .addClass('selected');
                }
            );

        $('.community-channel-option').removeClass('selected');

        $('.community-channel-option input[name="canal_invitation"]:checked')
            .closest('.community-channel-option')
            .addClass('selected');

        /* --------------------------------------------------
           INITIALISATION DES SELECTIONS EXISTANTES
        -------------------------------------------------- */

        $('.group-member-checkbox:checked').each(function () {
            ajouterParticipant($(this).closest('.community-member-option'));
        });

        actualiserSelection();
    }

    $(document).ready(initialiserParticipants);

})(window.jQuery);

</script>