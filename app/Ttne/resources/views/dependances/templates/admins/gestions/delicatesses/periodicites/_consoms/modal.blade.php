<section>
    {{-- MODALS DEBUT --}}
        <div>

        {{-- AJOUTER DEBUT --}}

            <div id="Ajouter" class="modal modal-edu-general fade futuristicModal" tabindex="-1" role="dialog" aria-hidden="true">

                    <div class="modal-dialog modal-xl modal-dialog-centered">

                        <div class="modal-content futuristicContent">

                            {{-- BACK LIGHT --}}
                            <div class="modalLight"></div>

                            {{-- HEADER --}}
                            <div class="modal-header futuristicHeader">

                                <div class="headerLeft">

                                    <div class="headerIcon">
                                        <i class="fa fa-cogs"></i>
                                    </div>

                                    <div>

                                        <h4 class="modal-title futuristicTitle">

                                            Ajouter un Paramètre

                                        </h4>

                                        <p class="futuristicSubTitle">

                                            Configuration avancée du système fintech

                                        </p>

                                    </div>

                                </div>

                                <button type="button"
                                        class="close futuristicClose"
                                        data-dismiss="modal">

                                    <span>&times;</span>

                                </button>

                            </div>


                            {{-- FORM --}}
                            <form
                                method="POST"
                                action="{{ route('AjouterPeriodicite') }}"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- BODY --}}
                                <div class="modal-body futuristicBody">

                                    {{-- =====================================================
                                        INFORMATIONS PRINCIPALES
                                    ====================================================== --}}

                                    <div class="container-fluid">

                                        <div class="row">

                                            {{-- =====================================================
                                                CODE
                                            ====================================================== --}}

                                            <div class="col-12 col-md-6 mb-4">

                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-code"></i>
                                                        Code
                                                    </label>

                                                    <div class="futureInput">

                                                        <i class="fa fa-code inputIcon"></i>

                                                        <input
                                                            type="text"
                                                            name="code"
                                                            class="form-control"
                                                            placeholder="Entrer le code"
                                                            value="{{ old('code') }}"
                                                            required
                                                        >

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- =====================================================
                                                NOM
                                            ====================================================== --}}

                                            <div class="col-12 col-md-6 mb-4">

                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-crosshairs"></i>
                                                        Nom
                                                    </label>

                                                    <div class="futureInput">

                                                        <i class="fa fa-pen inputIcon"></i>

                                                        <input
                                                            type="text"
                                                            name="nom"
                                                            class="form-control"
                                                            placeholder="Entrer le nom"
                                                            value="{{ old('nom') }}"
                                                            required
                                                        >

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- =====================================================
                                                UNITÉ
                                            ====================================================== --}}

                                            <div class="col-12 col-md-6 mb-4">

                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-ruler"></i>
                                                        Unité
                                                    </label>

                                                    <div class="futureInput">

                                                        <i class="fa fa-ruler inputIcon"></i>

                                                        <input
                                                            type="text"
                                                            name="unite"
                                                            class="form-control"
                                                            placeholder="Ex : jours, semaines, mois"
                                                            value="{{ old('unite') }}"
                                                            required
                                                        >

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- =====================================================
                                                VALEUR
                                            ====================================================== --}}

                                            <div class="col-12 col-md-6 mb-4">

                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-hashtag"></i>
                                                        Valeur
                                                    </label>

                                                    <div class="futureInput">

                                                        <i class="fa fa-hashtag inputIcon"></i>

                                                        <input
                                                            type="number"
                                                            name="valeur"
                                                            class="form-control"
                                                            placeholder="Entrer la valeur"
                                                            value="{{ old('valeur') }}"
                                                            min="1"
                                                            required
                                                        >

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- =====================================================
                                        DESCRIPTION
                                    ====================================================== --}}

                                    <div class="container-fluid">

                                        <div class="row mt-2">

                                            {{-- DESCRIPTION --}}

                                            <div class="col-12 col-md-12 mb-4">

                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-comment"></i>
                                                        Description
                                                    </label>

                                                    <div class="futureTextarea">

                                                        <i class="fa fa-align-left inputIcon textareaIcon"></i>

                                                        <textarea
                                                            name="description"
                                                            rows="6"
                                                            class="form-control"
                                                            placeholder="Entrer la description"
                                                        >{{ old('description') }}</textarea>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- =====================================================
                                        ÉTAT
                                    ====================================================== --}}

                                    <div class="container-fluid">

                                        <div class="row">

                                            {{-- ACTIVE --}}

                                            <div class="col-12 col-md-6 mb-4">

                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-toggle-on"></i>
                                                        État
                                                    </label>

                                                    <div class="futureInput">

                                                        <i class="fa fa-toggle-on inputIcon"></i>

                                                        <select
                                                            class="futureSelect"
                                                            name="active"
                                                            required
                                                        >

                                                            <option value="1"
                                                                {{ old('active', '1') == '1' ? 'selected' : '' }}
                                                            >
                                                                Active
                                                            </option>

                                                            <option value="0"
                                                                {{ old('active') === '0' ? 'selected' : '' }}
                                                            >
                                                                Inactive
                                                            </option>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                {{-- FOOTER --}}

                                <div class="modal-footer futuristicFooter">

                                    {{-- FERMER --}}

                                    <button
                                        type="button"
                                        data-dismiss="modal"
                                        class="futureBtn dangerBtn"
                                    >

                                        <i class="fa fa-times"></i>
                                        Fermer

                                    </button>


                                    {{-- VALIDER --}}

                                    <button
                                        type="submit"
                                        class="futureBtn successBtn"
                                    >

                                        <i class="fa fa-check"></i>
                                        Valider

                                    </button>

                                </div>

                            </form>


                        </div>

                    </div>

            </div>

        {{-- AJOUTER FIN --}}


            {{-- TOUT METTRE EN CORBEILLE DEBUT --}}
                <div class="suprression-selection">
                    @include('dependances.templates.admins.gestions.delicatesses.periodicites._consoms.toutmettrecorbeille')
                </div>
            {{-- TOUT METTRE EN CORBEILLE FIN --}}

            {{-- AUTRES MODALS DEBUT --}}
                @foreach($periodicites as $key => $value)
                    {{-- CONSULTER DEBUT --}}
                       {{-- =========================================================
                            CONSULTER DEBUT
                        ========================================================= --}}

                        <div id="consulter{{$value->id}}" class="modal modal-edu-general fade futuristicModal" tabindex="-1" role="dialog" aria-hidden="true">

                            <div class="modal-dialog modal-xl modal-dialog-centered">

                                <div class="modal-content futuristicContent">

                                    {{-- BACK LIGHT --}}
                                    <div class="modalLight"></div>

                                    {{-- HEADER --}}
                                    <div class="modal-header futuristicHeader">

                                        <div class="headerLeft">

                                            <div class="headerIcon">
                                                <i class="fa fa-eye"></i>
                                            </div>

                                            <div>

                                                <h4 class="modal-title futuristicTitle">

                                                    Consultation de : {{$value->nom}}

                                                </h4>

                                                <p class="futuristicSubTitle">

                                                    Info' avancée du système fintech

                                                </p>

                                            </div>

                                        </div>

                                        <button type="button"
                                                class="close futuristicClose"
                                                data-dismiss="modal">

                                            <span>&times;</span>

                                        </button>

                                    </div>

                                    {{-- FORM --}}
                                    <form
                                        method="POST"
                                        enctype="multipart/form-data">

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{ $value->id }}"
                                        >

                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">

                                            <div class="form">

                                                {{-- =====================================================
                                                    CODE + NOM
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        {{-- CODE --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Code
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-code inputIcon"></i>

                                                                    <input
                                                                        type="text"
                                                                        name="code"
                                                                        value="{{ $value->code }}"
                                                                        readonly
                                                                        id="consulter{{ $value->id }}"
                                                                        placeholder="Entrer le code"
                                                                    >

                                                                </div>

                                                            </div>

                                                        </div>


                                                        {{-- NOM --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-tag"></i>
                                                                    Nom
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-pencil inputIcon"></i>

                                                                    <input
                                                                        type="text"
                                                                        name="nom"
                                                                        value="{{ $value->nom }}"
                                                                        readonly
                                                                        id="consulter{{ $value->id }}"
                                                                        placeholder="Entrer le nom"
                                                                    >

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                                {{-- =====================================================
                                                    UNITÉ + VALEUR
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        {{-- UNITÉ --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-clock"></i>
                                                                    Unité
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-clock inputIcon"></i>

                                                                    <select
                                                                        class="futureSelect"
                                                                        name="unite"
                                                                        disabled
                                                                    >

                                                                        <option value="">
                                                                            Sélectionner une unité
                                                                        </option>

                                                                        <option
                                                                            value="heure"
                                                                            {{ $value->unite === 'heure' ? 'selected' : '' }}
                                                                        >
                                                                            Heure
                                                                        </option>

                                                                        <option
                                                                            value="jour"
                                                                            {{ $value->unite === 'jour' ? 'selected' : '' }}
                                                                        >
                                                                            Jour
                                                                        </option>

                                                                        <option
                                                                            value="semaine"
                                                                            {{ $value->unite === 'semaine' ? 'selected' : '' }}
                                                                        >
                                                                            Semaine
                                                                        </option>

                                                                        <option
                                                                            value="mois"
                                                                            {{ $value->unite === 'mois' ? 'selected' : '' }}
                                                                        >
                                                                            Mois
                                                                        </option>

                                                                        <option
                                                                            value="trimestre"
                                                                            {{ $value->unite === 'trimestre' ? 'selected' : '' }}
                                                                        >
                                                                            Trimestre
                                                                        </option>

                                                                        <option
                                                                            value="semestre"
                                                                            {{ $value->unite === 'semestre' ? 'selected' : '' }}
                                                                        >
                                                                            Semestre
                                                                        </option>

                                                                        <option
                                                                            value="année"
                                                                            {{ $value->unite === 'année' ? 'selected' : '' }}
                                                                        >
                                                                            Année
                                                                        </option>

                                                                    </select>

                                                                </div>

                                                            </div>

                                                        </div>


                                                        {{-- VALEUR --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-hashtag"></i>
                                                                    Valeur
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-hashtag inputIcon"></i>

                                                                    <input
                                                                        type="number"
                                                                        name="valeur"
                                                                        value="{{ $value->valeur }}"
                                                                        readonly
                                                                        min="1"
                                                                    >

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                                {{-- =====================================================
                                                    DESCRIPTION
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row mt-4">

                                                        {{-- DESCRIPTION --}}
                                                        <div class="col-12 col-md-12 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-comment"></i>
                                                                    Description
                                                                </label>

                                                                <div class="futureTextarea">

                                                                    <i class="fa fa-align-left inputIcon textareaIcon"></i>

                                                                    <textarea
                                                                        class=""
                                                                        readonly
                                                                        name="description"
                                                                        rows="6"
                                                                        placeholder="Entrer la description"
                                                                    >{{ $value->description ?? 'Aucune description' }}</textarea>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                                {{-- =====================================================
                                                    ÉTAT
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        {{-- ACTIVE --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-toggle-on"></i>
                                                                    État
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-toggle-on inputIcon"></i>

                                                                    <select
                                                                        class="futureSelect"
                                                                        name="active"
                                                                        disabled
                                                                    >

                                                                        <option
                                                                            value="1"
                                                                            {{ $value->active == 1 ? 'selected' : '' }}
                                                                        >
                                                                            Active
                                                                        </option>

                                                                        <option
                                                                            value="0"
                                                                            {{ $value->active == 0 ? 'selected' : '' }}
                                                                        >
                                                                            Inactive
                                                                        </option>

                                                                    </select>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        {{-- FOOTER --}}
                                        <div class="modal-footer futuristicFooter">

                                            <button
                                                type="button"
                                                data-dismiss="modal"
                                                class="futureBtn dangerBtn"
                                            >

                                                <i class="fa fa-times"></i>

                                                Fermer

                                            </button>

                                        </div>

                                    </form>



                                </div>

                            </div>

                        </div>

                        {{-- =========================================================
                            CONSULTER FIN
                        ========================================================= --}}
                    {{-- MODIFICATION DEBUT --}}
                       {{-- =========================================================
                            MODIFIER DEBUT
                        ========================================================= --}}

                        <div id="modifier{{$value->id}}" class="modal modal-edu-general fade futuristicModal" tabindex="-1" role="dialog" aria-hidden="true">

                            <div class="modal-dialog modal-xl modal-dialog-centered">

                                <div class="modal-content futuristicContent">

                                    {{-- BACK LIGHT --}}
                                    <div class="modalLight"></div>

                                    {{-- HEADER --}}
                                    <div class="modal-header futuristicHeader">

                                        <div class="headerLeft">

                                            <div class="headerIcon">
                                                <i class="fa fa-steam"></i>
                                            </div>

                                            <div>

                                                <h4 class="modal-title futuristicTitle">

                                                    Modification de : {{$value->nom}}

                                                </h4>

                                                <p class="futuristicSubTitle">

                                                    Modification avancée du système fintech

                                                </p>

                                            </div>

                                        </div>

                                        <button type="button"
                                                class="close futuristicClose"
                                                data-dismiss="modal">

                                            <span>&times;</span>

                                        </button>

                                    </div>

                                    {{-- FORM --}}
                                    <form
                                        method="POST"
                                        action="{{ route('ModifierPeriodicite') }}"
                                        enctype="multipart/form-data">

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{ $value->id }}"
                                        >

                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">

                                            <div class="form">

                                                {{-- =====================================================
                                                    CODE + NOM
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        {{-- CODE --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Code
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-code inputIcon"></i>

                                                                    <input
                                                                        type="text"
                                                                        name="code"
                                                                        value="{{ old('code', $value->code) }}"
                                                                        id="modifier{{ $value->id }}"
                                                                        placeholder="Entrer le code"
                                                                        required
                                                                    >

                                                                </div>

                                                            </div>

                                                        </div>


                                                        {{-- NOM --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-tag"></i>
                                                                    Nom
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-pencil inputIcon"></i>

                                                                    <input
                                                                        type="text"
                                                                        name="nom"
                                                                        value="{{ old('nom', $value->nom) }}"
                                                                        id="modifier{{ $value->id }}"
                                                                        placeholder="Entrer le nom"
                                                                        required
                                                                    >

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                                {{-- =====================================================
                                                    UNITÉ + VALEUR
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        {{-- UNITÉ --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-clock"></i>
                                                                    Unité
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-clock inputIcon"></i>

                                                                    <select
                                                                        class="futureSelect"
                                                                        name="unite"
                                                                        required
                                                                    >

                                                                        <option value="">
                                                                            Sélectionner une unité
                                                                        </option>

                                                                        <option
                                                                            value="heure"
                                                                            {{ old('unite', $value->unite) === 'heure' ? 'selected' : '' }}
                                                                        >
                                                                            Heure
                                                                        </option>

                                                                        <option
                                                                            value="jour"
                                                                            {{ old('unite', $value->unite) === 'jour' ? 'selected' : '' }}
                                                                        >
                                                                            Jour
                                                                        </option>

                                                                        <option
                                                                            value="semaine"
                                                                            {{ old('unite', $value->unite) === 'semaine' ? 'selected' : '' }}
                                                                        >
                                                                            Semaine
                                                                        </option>

                                                                        <option
                                                                            value="mois"
                                                                            {{ old('unite', $value->unite) === 'mois' ? 'selected' : '' }}
                                                                        >
                                                                            Mois
                                                                        </option>

                                                                        <option
                                                                            value="trimestre"
                                                                            {{ old('unite', $value->unite) === 'trimestre' ? 'selected' : '' }}
                                                                        >
                                                                            Trimestre
                                                                        </option>

                                                                        <option
                                                                            value="semestre"
                                                                            {{ old('unite', $value->unite) === 'semestre' ? 'selected' : '' }}
                                                                        >
                                                                            Semestre
                                                                        </option>

                                                                        <option
                                                                            value="année"
                                                                            {{ old('unite', $value->unite) === 'année' ? 'selected' : '' }}
                                                                        >
                                                                            Année
                                                                        </option>

                                                                    </select>

                                                                </div>

                                                            </div>

                                                        </div>


                                                        {{-- VALEUR --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-hashtag"></i>
                                                                    Valeur
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-hashtag inputIcon"></i>

                                                                    <input
                                                                        type="number"
                                                                        name="valeur"
                                                                        value="{{ old('valeur', $value->valeur) }}"
                                                                        min="1"
                                                                        placeholder="Exemple : 1"
                                                                        required
                                                                    >

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                                {{-- =====================================================
                                                    DESCRIPTION
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row mt-4">

                                                        {{-- DESCRIPTION --}}
                                                        <div class="col-12 col-md-12 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-comment"></i>
                                                                    Description
                                                                </label>

                                                                <div class="futureTextarea">

                                                                    <i class="fa fa-align-left inputIcon textareaIcon"></i>

                                                                    <textarea
                                                                        name="description"
                                                                        rows="6"
                                                                        placeholder="Entrer la description"
                                                                    >{{ old('description', $value->description) }}</textarea>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                                {{-- =====================================================
                                                    ÉTAT
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        {{-- ACTIVE --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-toggle-on"></i>
                                                                    État
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-toggle-on inputIcon"></i>

                                                                    <select
                                                                        class="futureSelect"
                                                                        name="active"
                                                                        required
                                                                    >

                                                                        <option
                                                                            value="1"
                                                                            {{ old('active', $value->active) == 1 ? 'selected' : '' }}
                                                                        >
                                                                            Active
                                                                        </option>

                                                                        <option
                                                                            value="0"
                                                                            {{ old('active', $value->active) == 0 ? 'selected' : '' }}
                                                                        >
                                                                            Inactive
                                                                        </option>

                                                                    </select>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        {{-- FOOTER --}}
                                        <div class="modal-footer futuristicFooter">

                                            <button
                                                type="button"
                                                data-dismiss="modal"
                                                class="futureBtn dangerBtn"
                                            >

                                                <i class="fa fa-times"></i>

                                                Fermer

                                            </button>


                                            <button
                                                type="submit"
                                                class="futureBtn successBtn"
                                            >

                                                <i class="fa fa-check"></i>

                                                Valider

                                            </button>

                                        </div>

                                    </form>



                                </div>

                            </div>

                        </div>

                        {{-- =========================================================
                            MODIFIER FIN
                        ========================================================= --}}
                    {{-- MODIFICATION FIN --}}
                    {{-- CORBEILLE DEBUT --}}
                    {{-- =========================================================
                        CORBEILLE / SUPPRESSION DE L'UTILISATEUR
                    ========================================================= --}}

                    <div id="corbeille{{$value->id}}" class="modal modal-edu-general fade futuristicModal" tabindex="-1" role="dialog" aria-hidden="true">

                            <div class="modal-dialog modal-xl modal-dialog-centered">

                                <div class="modal-content futuristicContent">

                                    {{-- BACK LIGHT --}}
                                    <div class="modalLight"></div>

                                    {{-- HEADER --}}
                                    <div class="modal-header futuristicHeader">

                                        <div class="headerLeft">

                                            <div class="headerIcon">
                                                <i class="fa fa-trash"></i>
                                            </div>

                                            <div>

                                                <h4 class="modal-title futuristicTitle">

                                                    Suppression de : {{$value->nom}}

                                                </h4>

                                                <p class="futuristicSubTitle">

                                                    Suppression avancée du système fintech

                                                </p>

                                            </div>

                                        </div>

                                        <button type="button"
                                                class="close futuristicClose"
                                                data-dismiss="modal">

                                            <span>&times;</span>

                                        </button>

                                    </div>

                                    {{-- FORM --}}
                                    <form
                                        method="POST"
                                        action=""
                                        enctype="multipart/form-data">

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{ $value->id }}"
                                        >

                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">

                                            <div class="form">

                                                {{-- =====================================================
                                                    CODE + NOM
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        {{-- CODE --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Code
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-code inputIcon"></i>

                                                                    <input
                                                                        type="text"
                                                                        name="code"
                                                                        value="{{ $value->code }}"
                                                                        readonly
                                                                        id="corbeille{{ $value->id }}"
                                                                        placeholder="Code"
                                                                    >

                                                                </div>

                                                            </div>

                                                        </div>


                                                        {{-- NOM --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-tag"></i>
                                                                    Nom
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-pencil inputIcon"></i>

                                                                    <input
                                                                        type="text"
                                                                        name="nom"
                                                                        value="{{ $value->nom }}"
                                                                        readonly
                                                                        id="corbeille{{ $value->id }}"
                                                                        placeholder="Nom"
                                                                    >

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                                {{-- =====================================================
                                                    UNITÉ + VALEUR
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        {{-- UNITÉ --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-clock"></i>
                                                                    Unité
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-clock inputIcon"></i>

                                                                    <select
                                                                        class="futureSelect"
                                                                        name="unite"
                                                                        disabled
                                                                    >

                                                                        <option value="">
                                                                            Sélectionner une unité
                                                                        </option>

                                                                        <option
                                                                            value="heure"
                                                                            {{ $value->unite === 'heure' ? 'selected' : '' }}
                                                                        >
                                                                            Heure
                                                                        </option>

                                                                        <option
                                                                            value="jour"
                                                                            {{ $value->unite === 'jour' ? 'selected' : '' }}
                                                                        >
                                                                            Jour
                                                                        </option>

                                                                        <option
                                                                            value="semaine"
                                                                            {{ $value->unite === 'semaine' ? 'selected' : '' }}
                                                                        >
                                                                            Semaine
                                                                        </option>

                                                                        <option
                                                                            value="mois"
                                                                            {{ $value->unite === 'mois' ? 'selected' : '' }}
                                                                        >
                                                                            Mois
                                                                        </option>

                                                                        <option
                                                                            value="trimestre"
                                                                            {{ $value->unite === 'trimestre' ? 'selected' : '' }}
                                                                        >
                                                                            Trimestre
                                                                        </option>

                                                                        <option
                                                                            value="semestre"
                                                                            {{ $value->unite === 'semestre' ? 'selected' : '' }}
                                                                        >
                                                                            Semestre
                                                                        </option>

                                                                        <option
                                                                            value="année"
                                                                            {{ $value->unite === 'année' ? 'selected' : '' }}
                                                                        >
                                                                            Année
                                                                        </option>

                                                                    </select>

                                                                </div>

                                                            </div>

                                                        </div>


                                                        {{-- VALEUR --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-hashtag"></i>
                                                                    Valeur
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-hashtag inputIcon"></i>

                                                                    <input
                                                                        type="number"
                                                                        name="valeur"
                                                                        value="{{ $value->valeur }}"
                                                                        readonly
                                                                        min="1"
                                                                    >

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                                {{-- =====================================================
                                                    DESCRIPTION
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row mt-4">

                                                        {{-- DESCRIPTION --}}
                                                        <div class="col-12 col-md-12 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-comment"></i>
                                                                    Description
                                                                </label>

                                                                <div class="futureTextarea">

                                                                    <i class="fa fa-align-left inputIcon textareaIcon"></i>

                                                                    <textarea
                                                                        name="description"
                                                                        rows="6"
                                                                        readonly
                                                                        placeholder="Description"
                                                                    >{{ $value->description ?? 'Aucune description' }}</textarea>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>


                                                {{-- =====================================================
                                                    ÉTAT
                                                ====================================================== --}}

                                                <div class="container-fluid">

                                                    <div class="row">

                                                        {{-- ACTIVE --}}
                                                        <div class="col-12 col-md-6 mb-4">

                                                            <div class="futureField">

                                                                <label>
                                                                    <i class="fa fa-toggle-on"></i>
                                                                    État
                                                                </label>

                                                                <div class="futureInput">

                                                                    <i class="fa fa-toggle-on inputIcon"></i>

                                                                    <select
                                                                        class="futureSelect"
                                                                        name="active"
                                                                        disabled
                                                                    >

                                                                        <option
                                                                            value="1"
                                                                            {{ $value->active == 1 ? 'selected' : '' }}
                                                                        >
                                                                            Active
                                                                        </option>

                                                                        <option
                                                                            value="0"
                                                                            {{ $value->active == 0 ? 'selected' : '' }}
                                                                        >
                                                                            Inactive
                                                                        </option>

                                                                    </select>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        {{-- FOOTER --}}
                                        <div class="modal-footer futuristicFooter">

                                            <button
                                                type="button"
                                                data-dismiss="modal"
                                                class="futureBtn dangerBtn"
                                            >

                                                <i class="fa fa-times"></i>

                                                Fermer

                                            </button>


                                            <button
                                                type="submit"
                                                class="futureBtn successBtn"
                                            >

                                                <i class="fa fa-trash"></i>

                                                Mettre en corbeille

                                            </button>

                                        </div>

                                    </form>



                                </div>

                            </div>

                        </div>

                    {{-- =========================================================
                        CORBEILLE FIN
                    ========================================================= --}}
                    {{-- CORBEILLE FIN --}}
                   

                @endforeach
            {{-- AUTRES MODALS FIN --}}

                <!-- MODAL -->

    {{-- DEBUT --}}

            {{--  --}}
        </div>
    {{-- MODALS FIN --}}
</section>

