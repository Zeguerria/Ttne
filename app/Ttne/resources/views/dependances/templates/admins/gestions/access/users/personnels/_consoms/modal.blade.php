<section>
    {{-- MODALS DEBUT --}}
        <div>

        {{-- AJOUTER DEBUT --}}

            <div class="modal fade futuristicModal" tabindex="-1" aria-hidden="true" id="Ajouter" data-stepper="true" data-step="1"  data-max-step="4">

                <div class="modal-dialog modal-xl modal-dialog-centered monstepper">

                    <div class="modal-content futuristicContent ">
                        <form id="futureStepperForm" method="POST" action="{{ route('AjouterUser') }}"  enctype="multipart/form-data">
                            @csrf
                            <!-- LIGHT -->
                            <div class="modalLight"></div>


                            <!-- HEADER -->
                            <div class="modal-header futuristicHeader">

                                <div class="headerLeft">

                                    <div class="headerIcon">
                                        <i class="fa fa-user-plus"></i>
                                    </div>

                                    <div>
                                        <h2 class="futuristicTitle">
                                            Nouveau membre
                                        </h2>

                                        <p class="futuristicSubTitle">
                                            Création d'un compte utilisateur
                                        </p>
                                    </div>

                                </div>

                                <button type="button"
                                        class="btn-close btn-close-white futuristicClose"
                                        data-bs-dismiss="modal">
                                </button>

                            </div>
                            <div>

                                <div class="form">

                                    <!-- BODY -->
                                    <div class="modal-body futuristicBody">


                                        <!-- =====================================
                                            STEPPER
                                        ====================================== -->

                                        <div class="futureStepper">

                                            <!-- STEP 1 -->
                                            <div class="stepItem active"
                                                data-step="1">

                                                <span>1</span>
                                                <p>Informations</p>

                                            </div>


                                            <div class="stepLine"></div>


                                            <!-- STEP 2 -->
                                            <div class="stepItem"
                                                data-step="2">

                                                <span>2</span>
                                                <p>Contact</p>

                                            </div>


                                            <div class="stepLine"></div>


                                            <!-- STEP 3 -->
                                            <div class="stepItem"
                                                data-step="3">

                                                <span>3</span>
                                                <p>Identité</p>

                                            </div>


                                            <div class="stepLine"></div>


                                            <!-- STEP 4 -->
                                            <div class="stepItem"
                                                data-step="4">

                                                <span>4</span>
                                                <p>Compte</p>

                                            </div>


                                            <div class="stepLine"></div>


                                            <!-- STEP 5 -->
                                            <div class="stepItem"
                                                data-step="5">

                                                <span>5</span>
                                                <p>Validation</p>

                                            </div>

                                        </div>


                                        <!-- =====================================
                                            STEP 1
                                            INFORMATIONS PERSONNELLES
                                        ====================================== -->

                                        <div class="stepContent active" data-content="1">
                                            @include('dependances.templates.admins.gestions.access.users.personnels._consoms._modalajouts.steep1')
                                        </div>
                                        <!-- =====================================
                                            STEP 2
                                            CONTACT
                                        ====================================== -->

                                        <div class="stepContent" data-content="2">
                                            @include('dependances.templates.admins.gestions.access.users.personnels._consoms._modalajouts.steep2')
                                        </div>
                                        <!-- =====================================
                                            STEP 3
                                            PIÈCE D'IDENTITÉ
                                        ====================================== -->

                                        <div class="stepContent" data-content="3">
                                            @include('dependances.templates.admins.gestions.access.users.personnels._consoms._modalajouts.steep3')
                                        </div>
                                        <!-- =====================================
                                            STEP 4
                                            AUTHENTIFICATION
                                        ====================================== -->

                                        <div class="stepContent" data-content="4">

                                            @include('dependances.templates.admins.gestions.access.users.personnels._consoms._modalajouts.steep4')
                                        </div>
                                        <!-- =====================================
                                            STEP 5
                                            VALIDATION
                                        ====================================== -->

                                        <div class="stepContent" data-content="5">
                                            @include('dependances.templates.admins.gestions.access.users.personnels._consoms._modalajouts.steep5')

                                        </div>


                                    </div>

                                </div>

                            </div>
                            <!-- FOOTER -->
                            <div class="modal-footer futuristicFooter justify-content-between">


                                <!-- LEFT -->
                                <button type="button"
                                        class="futureBtn darkBtn"
                                        data-dismiss="modal">

                                    <i class="fa fa-times"></i>
                                    Annuler

                                </button>


                                <!-- RIGHT -->
                                <div class="d-flex align-items-center"
                                    style="gap:15px;">


                                    <!-- PREVIOUS -->
                                    <button type="button"
                                            class="futureBtn dangerBtn prevStep"
                                            style="display:none;">

                                        <i class="fa fa-arrow-left"></i>
                                        Retour

                                    </button>


                                    <!-- NEXT -->
                                    <button type="button"
                                            class="futureBtn successBtn nextStep">

                                        Continuer

                                        <i class="fa fa-arrow-right"></i>

                                    </button>


                                    <!-- SUBMIT -->
                                    <button type="submit"
                                            class="futureBtn successBtn submitStep"
                                            form="futureStepperForm"
                                            style="display:none;">

                                        <i class="fa fa-check"></i>
                                        Valider

                                    </button>


                                </div>

                            </div>

                        </form>



                    </div>

                </div>

            </div>

        {{-- AJOUTER FIN --}}


            {{-- TOUT METTRE EN CORBEILLE DEBUT --}}
                <div class="suprression-selection">
                    @include('dependances.templates.admins.gestions.access.profils._consoms.toutmettrecorbeille')
                </div>
            {{-- TOUT METTRE EN CORBEILLE FIN --}}

            {{-- AUTRES MODALS DEBUT --}}
                @foreach($users as $key => $value)
                    {{-- CONSULTER DEBUT --}}
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

                                                    Consultation de : {{$value->libelle}}

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
                                    <form method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">
                                            <div class="form">
                                                <div class="container-fluid">

                                                    <div class="row ">
                                                        {{-- CODE --}}
                                                        <div class="col-12 col-md-6 mb-4 ">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Code
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-code inputIcon"></i>
                                                                    <input type="text" name="code" value="{{$value->code}}" readonly id="consulter{{$value->id}}" placeholder="Entrer le code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- LIBELLE --}}
                                                        <div class="col-12 col-md-6 mb-4">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-crosshairs"></i>
                                                                    Libellé
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-pencil inputIcon"></i>
                                                                    <input type="text" name="libelle" value="{{$value->libelle}}" readonly id="consulter{{$value->id}}" placeholder="Entrer le libellé" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                                    @if($value->description !=null)
                                                                        <textarea class="" disabled name="description" value="{{$value->description}}" placeholder="Entrer la description">{{$value->description}}</textarea>
                                                                    @else
                                                                        <textarea class="" disabled name="description" value="{{$value->description}}" placeholder="Entrer la description">Aucune Description</textarea>
                                                                    @endif
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- FOOTER --}}
                                        <div class="modal-footer futuristicFooter">

                                            <button type="button"
                                                    data-dismiss="modal"
                                                    class="futureBtn dangerBtn">

                                                <i class="fa fa-times"></i>

                                                Fermer

                                            </button>

                                            {{-- <button type="submit"
                                                    class="futureBtn successBtn">

                                                <i class="fa fa-check"></i>

                                                Valider

                                            </button> --}}

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>
                    {{-- CONSULTER FIN --}}
                    {{-- MODIFICATION DEBUT --}}
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

                                                    Modification de : {{$value->libelle}}

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
                                    <form method="POST" action="{{route('ModifierProfil')}}" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">
                                            <div class="form">
                                                <div class="container-fluid">

                                                    <div class="row ">
                                                        {{-- CODE --}}
                                                        <div class="col-12 col-md-6 mb-4 ">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Code
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-code inputIcon"></i>
                                                                    <input type="text" name="code" value="{{$value->code}}"  id="consulter{{$value->id}}" placeholder="Entrer le code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- LIBELLE --}}
                                                        <div class="col-12 col-md-6 mb-4">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-crosshairs"></i>
                                                                    Libellé
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-pencil inputIcon"></i>
                                                                    <input type="text" name="libelle" value="{{$value->libelle}}"  id="consulter{{$value->id}}" placeholder="Entrer le libellé" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                                    @if($value->description !=null)
                                                                        <textarea class=""  name="description" value="{{$value->description}}" placeholder="Entrer la description">{{$value->description}}</textarea>
                                                                    @else
                                                                        <textarea class=""  name="description" value="{{$value->description}}" placeholder="Entrer la description">Aucune Description</textarea>
                                                                    @endif
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- FOOTER --}}
                                        <div class="modal-footer futuristicFooter">

                                            <button type="button"
                                                    data-dismiss="modal"
                                                    class="futureBtn dangerBtn">

                                                <i class="fa fa-times"></i>

                                                Fermer

                                            </button>

                                            <button type="submit"
                                                    class="futureBtn successBtn">

                                                <i class="fa fa-check"></i>

                                                Valider

                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>
                    {{-- MODIFICATION FIN --}}
                    {{-- CORBEILLE DEBUT --}}
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

                                                    Suppression de : {{$value->libelle}}

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
                                    <form method="POST" action="{{route('CorbeilleProfil')}}" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">
                                            <div class="form">
                                                <div class="container-fluid">

                                                    <div class="row ">
                                                        {{-- CODE --}}
                                                        <div class="col-12 col-md-6 mb-4 ">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Code
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-code inputIcon"></i>
                                                                    <input type="text" name="code" value="{{$value->code}}" readonly id="consulter{{$value->id}}" placeholder="Entrer le code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- LIBELLE --}}
                                                        <div class="col-12 col-md-6 mb-4">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-crosshairs"></i>
                                                                    Libellé
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-pencil inputIcon"></i>
                                                                    <input type="text" name="libelle" value="{{$value->libelle}}" readonly id="consulter{{$value->id}}" placeholder="Entrer le libellé" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                                    @if($value->description !=null)
                                                                        <textarea class="" disabled name="description" value="{{$value->description}}" placeholder="Entrer la description">{{$value->description}}</textarea>
                                                                    @else
                                                                        <textarea class="" disabled name="description" value="{{$value->description}}" placeholder="Entrer la description">Aucune Description</textarea>
                                                                    @endif
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- FOOTER --}}
                                        <div class="modal-footer futuristicFooter">

                                            <button type="button"
                                                    data-dismiss="modal"
                                                    class="futureBtn dangerBtn">

                                                <i class="fa fa-times"></i>

                                                Fermer

                                            </button>

                                            <button type="submit"
                                                    class="futureBtn successBtn">

                                                <i class="fa fa-check"></i>

                                                Valider

                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>
                    {{-- CORBEILLE FIN --}}
                    {{-- =========================================================
     PIÈCE D'IDENTITÉ DEBUT
========================================================= --}}

@php

    $piece = $value->pieces->first();

@endphp

@if($piece)

    <div
        id="piece{{ $piece->id }}"
        class="modal modal-edu-general fade futuristicModal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-xl modal-dialog-centered">

            <div class="modal-content futuristicContent">

                {{-- =================================================
                     BACK LIGHT
                ================================================== --}}

                <div class="modalLight"></div>


                {{-- =================================================
                     HEADER
                ================================================== --}}

                <div class="modal-header futuristicHeader">

                    <div class="headerLeft">

                        <div class="headerIcon">

                            <i class="fa fa-id-card"></i>

                        </div>


                        <div>

                            <h4 class="modal-title futuristicTitle">

                                Consultation de la pièce

                            </h4>


                            <p class="futuristicSubTitle">

                                {{ $value->prenom }}
                                {{ $value->name }}

                                @if($piece->typePiece)

                                    — {{ $piece->typePiece->libelle }}

                                @endif

                            </p>

                        </div>

                    </div>


                    {{-- FERMER --}}
                    <button
                        type="button"
                        class="close futuristicClose"
                        data-dismiss="modal"
                    >

                        <span>&times;</span>

                    </button>

                </div>


                {{-- =================================================
                     BODY
                ================================================== --}}

                <div class="modal-body futuristicBody">

                    <div class="form">

                        <div class="container-fluid">

                            <div class="row">


                                {{-- =================================================
                                     INFORMATIONS DE LA PIÈCE
                                ================================================== --}}

                                <div class="col-12 col-md-5">


                                    {{-- TYPE DE PIÈCE --}}
                                    <div class="futureField">

                                        <label>

                                            <i class="fa fa-id-card"></i>

                                            Type de pièce

                                        </label>


                                        <div class="futureInput">

                                            <i class="fa fa-id-card inputIcon"></i>

                                            <input
                                                type="text"
                                                value="{{ $piece->typePiece->libelle ?? 'Non défini' }}"
                                                readonly
                                            >

                                        </div>

                                    </div>


                                    {{-- NUMÉRO --}}
                                    <div class="futureField">

                                        <label>

                                            <i class="fa fa-hashtag"></i>

                                            Numéro de la pièce

                                        </label>


                                        <div class="futureInput">

                                            <i class="fa fa-hashtag inputIcon"></i>

                                            <input
                                                type="text"
                                                value="{{ $piece->numero ?? 'Non renseigné' }}"
                                                readonly
                                            >

                                        </div>

                                    </div>


                                    {{-- DATE D'EXPIRATION --}}
                                    <div class="futureField">

                                        <label>

                                            <i class="fa fa-calendar-times"></i>

                                            Date d'expiration

                                        </label>


                                        <div class="futureInput">

                                            <i class="fa fa-calendar-times inputIcon"></i>

                                            <input
                                                type="text"
                                                value="{{
                                                    $piece->date_expiration
                                                        ? \Carbon\Carbon::parse($piece->date_expiration)->format('d/m/Y')
                                                        : 'Non renseignée'
                                                }}"
                                                readonly
                                            >

                                        </div>

                                    </div>


                                    {{-- TYPE MIME --}}
                                    <div class="futureField">

                                        <label>

                                            <i class="fa fa-file"></i>

                                            Type de fichier

                                        </label>


                                        <div class="futureInput">

                                            <i class="fa fa-file inputIcon"></i>

                                            <input
                                                type="text"
                                                value="{{ $piece->mime_type ?? 'Non renseigné' }}"
                                                readonly
                                            >

                                        </div>

                                    </div>


                                    {{-- NOM DU FICHIER --}}
                                    <div class="futureField">

                                        <label>

                                            <i class="fa fa-paperclip"></i>

                                            Document

                                        </label>


                                        <div class="futureInput">

                                            <i class="fa fa-file-alt inputIcon"></i>

                                            <input
                                                type="text"
                                                value="{{
                                                    $piece->fichier
                                                        ? basename($piece->fichier)
                                                        : 'Aucun fichier'
                                                }}"
                                                readonly
                                            >

                                        </div>

                                    </div>

                                </div>


                                {{-- =================================================
                                     APERÇU DOCUMENT
                                ================================================== --}}

                                <div class="col-12 col-md-7">

                                    <div class="futureField">

                                        <label>

                                            <i class="fa fa-file-alt"></i>

                                            Aperçu du document

                                        </label>


                                        @if($piece->fichier)

                                            @php

                                                $extension = strtolower(
                                                    pathinfo(
                                                        $piece->fichier,
                                                        PATHINFO_EXTENSION
                                                    )
                                                );

                                                $documentUrl = asset(
                                                    'storage/' . $piece->fichier
                                                );

                                            @endphp


                                            {{-- =====================================
                                                 PDF
                                            ====================================== --}}

                                            @if($extension === 'pdf')

                                                <div
                                                    style="
                                                        width:100%;
                                                        height:500px;
                                                        overflow:hidden;
                                                        border-radius:12px;
                                                        background:rgba(0,0,0,.25);
                                                        border:1px solid rgba(255,255,255,.08);
                                                    "
                                                >

                                                    <iframe
                                                        src="{{ $documentUrl }}"
                                                        title="Document PDF"
                                                        style="
                                                            width:100%;
                                                            height:100%;
                                                            border:none;
                                                        "
                                                    ></iframe>

                                                </div>


                                            {{-- =====================================
                                                 IMAGE
                                            ====================================== --}}

                                            @elseif(
                                                in_array(
                                                    $extension,
                                                    [
                                                        'jpg',
                                                        'jpeg',
                                                        'png',
                                                        'webp',
                                                        'jfif'
                                                    ]
                                                )
                                            )

                                                <div
                                                    style="
                                                        width:100%;
                                                        height:500px;
                                                        display:flex;
                                                        align-items:center;
                                                        justify-content:center;
                                                        overflow:auto;
                                                        border-radius:12px;
                                                        background:rgba(0,0,0,.25);
                                                        border:1px solid rgba(255,255,255,.08);
                                                        padding:15px;
                                                    "
                                                >

                                                    <img
                                                        src="{{ $documentUrl }}"
                                                        alt="Document d'identité"
                                                        style="
                                                            max-width:100%;
                                                            max-height:470px;
                                                            object-fit:contain;
                                                            border-radius:8px;
                                                        "
                                                    >

                                                </div>


                                            {{-- =====================================
                                                 AUTRE FORMAT
                                            ====================================== --}}

                                            @else

                                                <div class="futureEmpty">

                                                    <i class="fa fa-file fa-3x mb-3"></i>

                                                    <h5>

                                                        Aperçu indisponible

                                                    </h5>

                                                    <p>

                                                        Ce type de fichier ne peut pas
                                                        être affiché directement.

                                                    </p>

                                                </div>

                                            @endif


                                        @else

                                            {{-- =====================================
                                                 AUCUN DOCUMENT
                                            ====================================== --}}

                                            <div class="futureEmpty">

                                                <i class="fa fa-file fa-3x mb-3"></i>

                                                <h5>

                                                    Aucun document

                                                </h5>

                                                <p>

                                                    Aucun fichier n'est associé
                                                    à cette pièce.

                                                </p>

                                            </div>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     FOOTER
                ================================================== --}}

                <div class="modal-footer futuristicFooter">

                    @if($piece->fichier)

                        <a
                            href="{{ asset('storage/' . $piece->fichier) }}"
                            target="_blank"
                            class="futureBtn infoBtn"
                        >

                            <i class="fa fa-external-link-alt"></i>

                            Ouvrir le document

                        </a>

                    @endif


                    <button
                        type="button"
                        data-dismiss="modal"
                        class="futureBtn dangerBtn"
                    >

                        <i class="fa fa-times"></i>

                        Fermer

                    </button>

                </div>

            </div>

        </div>

    </div>

@endif

{{-- =========================================================
     PIÈCE D'IDENTITÉ FIN
========================================================= --}}


                @endforeach
            {{-- AUTRES MODALS FIN --}}

                <!-- MODAL -->

    {{-- DEBUT --}}

            {{--  --}}
        </div>
    {{-- MODALS FIN --}}
</section>

