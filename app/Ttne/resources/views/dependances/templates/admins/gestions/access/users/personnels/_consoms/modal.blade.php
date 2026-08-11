<section>
    {{-- MODALS DEBUT --}}
        <div>

        {{-- AJOUTER DEBUT --}}

            <div class="modal fade futuristicModal" tabindex="-1" aria-hidden="true" id="Ajouter" data-stepper="true" data-step="1"  data-max-step="4">

                <div class="modal-dialog modal-xl modal-dialog-centered">

                    <div class="modal-content futuristicContent">
                        <form id="futureStepperForm" method="POST" enctype="multipart/form-data">
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

                                        <div class="stepContent active"
                                            data-content="1">

                                            <div class="container-fluid">

                                                <div class="row g-4 p-2">

                                                    <!-- NOM -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-user"></i>
                                                                Nom
                                                            </label>

                                                            <div class="futureInput">

                                                                <i class="fa fa-user inputIcon"></i>

                                                                <input type="text"
                                                                    name="name"
                                                                    class="form-control"
                                                                    placeholder="Entrer le nom"
                                                                    required data-review="name">

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- PRÉNOM -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-user"></i>
                                                                Prénom
                                                            </label>

                                                            <div class="futureInput">

                                                                <i class="fa fa-user inputIcon"></i>

                                                                <input type="text"
                                                                    name="prenom"
                                                                    class="form-control"
                                                                    placeholder="Entrer le prénom"
                                                                    required>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- DATE DE NAISSANCE -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-calendar"></i>
                                                                Date de naissance
                                                            </label>

                                                            <div class="futureInput">

                                                                <i class="fa fa-calendar inputIcon"></i>

                                                                <input type="date"
                                                                    name="date_naissance"
                                                                    class="form-control">

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- PROFIL -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-group"></i>
                                                                Profil
                                                            </label>

                                                            <div class="futureInput">

                                                                <i class="fa fa-toolbox inputIcon"></i>

                                                                <select name="profil_id"
                                                                        class="futureSelect"
                                                                        required>

                                                                    <option value="">
                                                                        Sélectionner un profil
                                                                    </option>

                                                                    @foreach($profils ?? [] as $profil)

                                                                        <option value="{{ $profil->id }}">
                                                                            {{ $profil->libelle }}
                                                                        </option>

                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>



                                        <!-- =====================================
                                            STEP 2
                                            CONTACT
                                        ====================================== -->

                                        <div class="stepContent"
                                            data-content="2">

                                            <div class="container-fluid">

                                                <div class="row g-4 p-2">


                                                    <!-- TÉLÉPHONE -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-phone"></i>
                                                                Téléphone
                                                            </label>

                                                            <div class="futureInput">

                                                                <i class="fa fa-phone inputIcon"></i>

                                                                <input type="text"
                                                                    name="telephone"
                                                                    class="form-control"
                                                                    placeholder="+241 XX XX XX XX"
                                                                    required>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- EMAIL -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-envelope"></i>
                                                                Email
                                                            </label>

                                                            <div class="futureInput">

                                                                <i class="fa fa-envelope inputIcon"></i>

                                                                <input type="email"
                                                                    name="email"
                                                                    class="form-control"
                                                                    placeholder="email@gmail.com"
                                                                    required>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- PHOTO -->
                                                    <div class="col-md-12">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-camera"></i>
                                                                Photo de profil
                                                            </label>

                                                            <div class="futureFile">

                                                                <input type="file"
                                                                    name="photo"
                                                                    class="futureFileInput"
                                                                    accept="image/png,image/jpeg,image/jpg,image/webp">

                                                                <div class="futureFileBox">

                                                                    <div class="futureFileIcon">
                                                                        <i class="fa fa-cloud-download"></i>
                                                                    </div>

                                                                    <div class="futureFileTitle">
                                                                        Sélectionner une photo
                                                                    </div>

                                                                    <p class="futureFileSubTitle">
                                                                        PNG, JPG, WEBP...
                                                                    </p>

                                                                    <div class="futureFileName"></div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>



                                        <!-- =====================================
                                            STEP 3
                                            PIÈCE D'IDENTITÉ
                                        ====================================== -->

                                        <div class="stepContent"
                                            data-content="3">

                                            <div class="container-fluid">

                                                <div class="row g-4 p-2">


                                                    <!-- TYPE DE PIÈCE -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-id-card"></i>
                                                                Type de pièce
                                                            </label>

                                                            <div class="futureInput">

                                                                <i class="fa fa-id-card inputIcon"></i>

                                                                <select name="type_piece_id"
                                                                        class="futureSelect"
                                                                        required>

                                                                    <option value="">
                                                                        Sélectionner le type de pièce
                                                                    </option>

                                                                    @foreach($typesPieces ?? [] as $typePiece)

                                                                        <option value="{{ $typePiece->id }}">
                                                                            {{ $typePiece->libelle }}
                                                                        </option>

                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- NUMÉRO -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-hashtag"></i>
                                                                Numéro de la pièce
                                                            </label>

                                                            <div class="futureInput">

                                                                <i class="fa fa-hashtag inputIcon"></i>

                                                                <input type="text"
                                                                    name="numero"
                                                                    class="form-control"
                                                                    placeholder="Entrer le numéro de la pièce"
                                                                    required>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- DATE D'EXPIRATION -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-calendar-times"></i>
                                                                Date d'expiration
                                                            </label>

                                                            <div class="futureInput">

                                                                <i class="fa fa-calendar-times inputIcon"></i>

                                                                <input type="date"
                                                                    name="date_expiration"
                                                                    class="form-control">

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- FICHIER -->
                                                    <div class="col-md-12">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-file-alt"></i>
                                                                Document d'identité
                                                            </label>

                                                            <div class="futureFile">

                                                                <input type="file"
                                                                    name="fichier"
                                                                    class="futureFileInput"
                                                                    accept=".pdf,image/png,image/jpeg,image/jpg,image/webp"
                                                                    required>

                                                                <div class="futureFileBox">

                                                                    <div class="futureFileIcon">
                                                                        <i class="fa fa-cloud-upload-alt"></i>
                                                                    </div>

                                                                    <div class="futureFileTitle">
                                                                        Sélectionner le document
                                                                    </div>

                                                                    <p class="futureFileSubTitle">
                                                                        PDF, PNG, JPG, WEBP...
                                                                    </p>

                                                                    <div class="futureFileName"></div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- INFORMATION -->
                                                    <div class="col-md-12">

                                                        <div class="futureFinal">

                                                            <i class="fa fa-shield-halved"></i>

                                                            <h3>
                                                                Document d'identité
                                                            </h3>

                                                            <p>
                                                                Veuillez fournir une pièce d'identité
                                                                valide afin de permettre la vérification
                                                                du compte utilisateur.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>



                                        <!-- =====================================
                                            STEP 4
                                            AUTHENTIFICATION
                                        ====================================== -->

                                        <div class="stepContent"
                                            data-content="4">

                                            <div class="row g-4">


                                                <!-- MOT DE PASSE -->
                                                <div class="col-md-6">

                                                    <div class="futureField">

                                                        <label>
                                                            <i class="fa fa-lock"></i>
                                                            Mot de passe
                                                        </label>

                                                        <div class="futureInput">

                                                            <i class="fa fa-lock inputIcon"></i>

                                                            <input type="password"
                                                                name="password"
                                                                id="password"
                                                                class="form-control"
                                                                placeholder="Entrer le mot de passe"
                                                                required>

                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- CONFIRMATION -->
                                                <div class="col-md-6">

                                                    <div class="futureField">

                                                        <label>
                                                            <i class="fa fa-lock"></i>
                                                            Confirmation du mot de passe
                                                        </label>

                                                        <div class="futureInput">

                                                            <i class="fa fa-lock inputIcon"></i>

                                                            <input type="password"
                                                                name="password_confirmation"
                                                                id="password_confirmation"
                                                                class="form-control"
                                                                placeholder="Confirmer le mot de passe"
                                                                required>

                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- INFORMATIONS COMPLÉMENTAIRES -->
                                                <div class="col-md-12">

                                                    <div class="futureFinal">

                                                        <i class="fa fa-shield-halved"></i>

                                                        <h3>
                                                            Sécurité du compte
                                                        </h3>

                                                        <p>
                                                            Le mot de passe sera sécurisé avant
                                                            l'enregistrement du compte.
                                                        </p>

                                                    </div>

                                                </div>


                                            </div>

                                        </div>



                                        <!-- =====================================
                                            STEP 5
                                            VALIDATION
                                        ====================================== -->

                                        <div class="stepContent"
                                            data-content="5">

                                            <div class="futureFinal">

                                                <i class="fa fa-circle-check"></i>

                                                <h3>
                                                    Vérification finale
                                                </h3>

                                                <p>
                                                    Vérifiez les informations saisies avant
                                                    de créer le compte utilisateur.
                                                </p>


                                                <div class="row g-1 mt-2">


                                                    <!-- NOM -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-user"></i>
                                                                Nom
                                                            </label>

                                                            <div class="futureInput">

                                                                <span class="review-name" data-review-value="name">
                                                                    —
                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- PRÉNOM -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-user"></i>
                                                                Prénom
                                                            </label>

                                                            <div class="futureInput">

                                                                <span class="review-prenom">
                                                                    —
                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- TÉLÉPHONE -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-phone"></i>
                                                                Téléphone
                                                            </label>

                                                            <div class="futureInput">

                                                                <span class="review-telephone">
                                                                    —
                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- EMAIL -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-envelope"></i>
                                                                Email
                                                            </label>

                                                            <div class="futureInput">

                                                                <span class="review-email">
                                                                    —
                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- TYPE DE PIÈCE -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-id-card"></i>
                                                                Type de pièce
                                                            </label>

                                                            <div class="futureInput">

                                                                <span class="review-type-piece">
                                                                    —
                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- NUMÉRO DE PIÈCE -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-hashtag"></i>
                                                                Numéro de pièce
                                                            </label>

                                                            <div class="futureInput">

                                                                <span class="review-numero">
                                                                    —
                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- DATE D'EXPIRATION -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-calendar-times"></i>
                                                                Date d'expiration
                                                            </label>

                                                            <div class="futureInput">

                                                                <span class="review-date-expiration">
                                                                    —
                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- DOCUMENT -->
                                                    <div class="col-md-6">

                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-file-alt"></i>
                                                                Document
                                                            </label>

                                                            <div class="futureInput">

                                                                <span class="review-fichier">
                                                                    —
                                                                </span>

                                                            </div>

                                                        </div>

                                                    </div>


                                                </div>

                                            </div>

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
                @endforeach
            {{-- AUTRES MODALS FIN --}}

                <!-- MODAL -->

    {{-- DEBUT --}}

            {{--  --}}
        </div>
    {{-- MODALS FIN --}}
</section>

