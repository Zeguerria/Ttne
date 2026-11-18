{{-- DEBUT --}}
<section class="steep-1">
    <div class="steep-01">

        <div class="container-fluid">
            <div class="row g-4 p-2">

                {{-- NOM --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-users"></i>
                            Nom du groupe
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-users inputIcon"></i>

                            <input type="text"
                                   name="nom"
                                   class="form-control"
                                   placeholder="Ex : Les Bâtisseurs"
                                   maxlength="100"
                                   required>
                        </div>
                    </div>
                </div>

                {{-- VISIBILITE --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-eye"></i>
                            Visibilité du groupe
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-eye inputIcon"></i>

                            <select name="visibilite_id"
                                    class="form-control"
                                    required>

                                <option value="" selected disabled>
                                    Choisir la visibilité
                                </option>

                                @foreach($visibilites ?? [] as $visibilite)
                                    <option value="{{ $visibilite->id }}">
                                        {{ $visibilite->libelle }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                {{-- DESCRIPTION --}}
                <div class="col-md-12">
                    <div class="row mt-4">
                        {{-- DESCRIPTION --}}
                        <div class="col-12 col-md-12 mb-4 ">
                                <div class="futureField">
                                    <label class="">
                                        <i class="fa fa-comment"></i>
                                        Description
                                    </label>
                                    <div class="futureTextarea">
                                        <i class="fa fa-align-left inputIcon textareaIcon"></i>

                                            <textarea class="" disabled name="description" value="description" placeholder="Entrer la description"></textarea>

                                    </div>

                                </div>

                        </div>
                    </div>
                </div>

                {{-- INFORMATIONS --}}
                {{-- <div class="col-md-12">
                    <div class="futureFinal">
                        <i class="fa fa-lightbulb-o"></i>

                        <h3>Définissez votre communauté</h3>

                        <p>
                            Donnez un nom à votre groupe, présentez son objectif
                            et choisissez qui pourra le découvrir. Vous pourrez
                            ensuite personnaliser son apparence, définir ses
                            règles de fonctionnement et gérer ses participants.
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>

    </div>
</section>
{{-- FIN --}}




<style>

/* ==========================================================
   COMMUNAUTE — STYLES PARTAGES
   Bootstrap 4 — Font Awesome 4.7
========================================================== */

.steep-2,
.steep-5 {
    --community-cyan: #00d9ef;
    --community-cyan-light: #8af4ff;
    --community-cyan-soft: rgba(0, 217, 239, .10);
    --community-cyan-border: rgba(0, 217, 239, .23);

    --community-border: rgba(255, 255, 255, .085);
    --community-muted: #8d9aa5;
    --community-text: #edf5f7;

    --community-panel: rgba(13, 19, 25, .94);
    --community-input: #101820;

    width: 100%;
    max-width: 100%;
    min-width: 0;
    color: var(--community-text);
}

.steep-2 *,
.steep-5 * {
    box-sizing: border-box;
}

/* CONTENEURS */

.steep-2 .container-fluid,
.steep-5 .container-fluid {
    width: 100%;
    max-width: 100%;
    min-width: 0;
    padding-left: 10px;
    padding-right: 10px;
}

.steep-2 .row,
.steep-5 .row {
    margin-left: -10px;
    margin-right: -10px;
}

.steep-2 .row > [class*="col-"],
.steep-5 .row > [class*="col-"] {
    min-width: 0;
    max-width: 100%;
    padding: 10px;
}

/* CHAMPS */

.steep-2 .futureField,
.steep-5 .futureField {
    position: relative;
    width: 100%;
    max-width: 100%;
    min-width: 0;
    margin-bottom: 17px;
}

.steep-2 .futureField > label,
.steep-5 .futureField > label {
    display: block;
    margin-bottom: 9px;
    color: #dce8ed;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .15px;
}

/* INPUTS */

.steep-2 .futureInput,
.steep-5 .futureInput {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 100%;
    min-width: 0;
    overflow: hidden;

    border: 1px solid rgba(255, 255, 255, .10);
    border-radius: 12px;
    background: var(--community-input);

    transition: border-color .25s ease,
                box-shadow .25s ease,
                background .25s ease;
}

.steep-2 .futureInput:hover,
.steep-5 .futureInput:hover {
    border-color: rgba(0, 217, 239, .25);
}

.steep-2 .futureInput:focus-within,
.steep-5 .futureInput:focus-within {
    border-color: rgba(0, 217, 239, .60);
    background: #121e26;
    box-shadow: 0 0 0 3px rgba(0, 217, 239, .09);
}

.steep-2 .futureInput .inputIcon,
.steep-5 .futureInput .inputIcon {
    position: absolute;
    top: 50%;
    left: 15px;
    z-index: 2;
    transform: translateY(-50%);
    color: var(--community-cyan);
    pointer-events: none;
}

.steep-2 .futureInput input,
.steep-5 .futureInput input,
.steep-2 .futureInput textarea,
.steep-5 .futureInput textarea,
.steep-2 .futureInput select,
.steep-5 .futureInput select {
    display: block;
    flex: 1 1 0%;
    width: 100%;
    max-width: 100%;
    min-width: 0;
    margin: 0;
    border: 0;
    outline: none;
    box-shadow: none;
    box-sizing: border-box;
}

/* Champs avec icône */
.steep-2 .futureInput:has(.inputIcon) input,
.steep-5 .futureInput:has(.inputIcon) input {
    padding-left: 43px;
}

/* RECHERCHES */

#groupIconSearch,
#groupMemberNameSearch,
#groupMemberPhoneSearch {
    width: 100%;
    max-width: 100%;
    min-width: 0;
    height: 48px;
    padding-right: 14px;
    font-size: 13px;
}

/* SELECTS */

.steep-2 .futureField select,
.steep-5 .futureField select {
    display: block;
    width: 100%;
    max-width: 100%;
    min-width: 0;
    min-height: 49px;
    padding: 11px 40px 11px 15px;

    border: 1px solid rgba(255, 255, 255, .10);
    border-radius: 12px;

    background-color: #111820;
    color: #edf5f7;

    font-size: 13px;
    line-height: 1.5;
    outline: none;
    box-shadow: none;

    transition: border-color .25s ease,
                box-shadow .25s ease;
}

.steep-2 .futureField select:focus,
.steep-5 .futureField select:focus {
    border-color: rgba(0, 217, 239, .60);
    box-shadow: 0 0 0 3px rgba(0, 217, 239, .09);
}

.steep-2 .futureField select option,
.steep-5 .futureField select option {
    background: #111820;
    color: #edf5f7;
}

/* TITRES PARTAGES */

.community-section-heading {
    display: flex;
    flex-direction: column;
    gap: 8px;
    width: 100%;
    max-width: 100%;
    min-width: 0;
    padding: 5px 2px 14px;
}

.community-section-heading > div {
    display: flex;
    align-items: center;
    gap: 11px;
    color: #fff;
    font-size: 17px;
    font-weight: 700;
    letter-spacing: .2px;
}

.community-section-heading > div i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 37px;
    height: 37px;
    flex: 0 0 37px;
    border: 1px solid rgba(0, 217, 239, .23);
    border-radius: 11px;
    background: rgba(0, 217, 239, .10);
    color: #00d9ef;
    font-size: 15px;
}

.community-section-heading > small {
    max-width: 650px;
    color: #8d9aa5;
    font-size: 12px;
    line-height: 1.7;
}

/* RESPONSIVE COMMUN */

@media (max-width: 767.98px) {
    .steep-2 .container-fluid,
    .steep-5 .container-fluid {
        padding-left: 12px;
        padding-right: 12px;
    }

    .steep-2 .row,
    .steep-5 .row {
        margin-left: -6px;
        margin-right: -6px;
    }

    .steep-2 .row > [class*="col-"],
    .steep-5 .row > [class*="col-"] {
        padding: 6px;
    }

    .community-section-heading {
        padding-bottom: 8px;
    }

    .community-section-heading > div {
        font-size: 15px;
    }
}

@media (max-width: 480px) {
    #groupIconSearch,
    #groupMemberNameSearch,
    #groupMemberPhoneSearch {
        height: 44px;
        font-size: 12px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .steep-2 *,
    .steep-5 * {
        scroll-behavior: auto !important;
        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: .01ms !important;
    }
}

</style>
