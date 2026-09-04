<section>
    {{-- MODALS DEBUT --}}
        <div>

        {{-- AJOUTER DEBUT --}}

            <div class="modal fade futuristicModal" tabindex="-1" aria-hidden="true" id="Ajouter" data-stepper="true" data-step="1"  data-max-step="4">

                <div class="modal-dialog modal-xl modal-dialog-centered monstepper">

                    <div class="modal-content futuristicContent ">
                        <form id="futureStepperForm" method="POST" action="{{ route('AjouterDemande') }}"  enctype="multipart/form-data">
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
                                            Nouvelle demande
                                        </h2>

                                        <p class="futuristicSubTitle">
                                            Création d'une demande
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
                                            @include('dependances.templates.admins.gestions.access.users.demandes._consoms._modalajouts.steep1')
                                        </div>
                                        <!-- =====================================
                                            STEP 2
                                            CONTACT
                                        ====================================== -->

                                        <div class="stepContent" data-content="2">
                                            @include('dependances.templates.admins.gestions.access.users.demandes._consoms._modalajouts.steep2')
                                        </div>
                                        <!-- =====================================
                                            STEP 3
                                            PIÈCE D'IDENTITÉ
                                        ====================================== -->

                                        <div class="stepContent" data-content="3">
                                            @include('dependances.templates.admins.gestions.access.users.demandes._consoms._modalajouts.steep3')
                                        </div>
                                        <!-- =====================================
                                            STEP 4
                                            AUTHENTIFICATION
                                        ====================================== -->

                                        <div class="stepContent" data-content="4">

                                            @include('dependances.templates.admins.gestions.access.users.demandes._consoms._modalajouts.steep4')
                                        </div>
                                        <!-- =====================================
                                            STEP 5
                                            VALIDATION
                                        ====================================== -->

                                        <div class="stepContent" data-content="5">
                                            @include('dependances.templates.admins.gestions.access.users.demandes._consoms._modalajouts.steep5')

                                        </div>


                                    </div>

                                </div>

                            </div>
                            <!-- FOOTER -->
                             <div class="modal-footer futuristicFooter justify-content-between ">


                                <!-- LEFT -->

                                <button
                                        type="button"
                                        class="futureBtn darkBtn examenBtnFermer"
                                        data-dismiss="modal">

                                        <i class="fa fa-times"></i>

                                        Annuler

                                 </button>




                                <!-- RIGHT -->
                                <div class=" examenDemandeActions"
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




                                    {{-- =================================================
                                        GROUPE DES ACTIONS DU STEPPER
                                    ================================================== --}}



                            </div>

                        </form>



                    </div>

                </div>

            </div>

        {{-- AJOUTER FIN --}}


            {{-- TOUT METTRE EN CORBEILLE DEBUT --}}
                <div class="suprression-selection">
                    @include('dependances.templates.admins.gestions.access.users.demandes._consoms.toutmettrecorbeille')
                </div>
            {{-- TOUT METTRE EN CORBEILLE FIN --}}

            {{-- AUTRES MODALS DEBUT --}}
                @foreach($users as $key => $value)
                    {{-- CONSULTER DEBUT --}}
                    {{-- =========================================================
                        CONSULTER DEBUT
                    ========================================================= --}}
                        <div class="modal fade futuristicModal" tabindex="-1"aria-hidden="true" id="consulter{{ $value->id }}" data-stepper="true"
                            data-step="1" data-max-step="5">

                            <div class="modal-dialog modal-xl modal-dialog-centered monstepper">

                                <div class="modal-content futuristicContent">

                                    {{-- =====================================================
                                        HEADER
                                    ====================================================== --}}

                                    <div class="modal-header futuristicHeader">

                                        <div class="headerLeft">

                                            <div class="headerIcon">

                                                <i class="fa fa-eye"></i>

                                            </div>

                                            <div>

                                                <h2 class="futuristicTitle">

                                                    Consultation de :
                                                    {{ $value->prenom }}
                                                    {{ $value->name }}

                                                </h2>

                                                <p class="futuristicSubTitle">

                                                    Consultation détaillée de la demande

                                                </p>

                                            </div>

                                        </div>



                                        <button type="button" class="btn-close btn-close-white futuristicClose"
                                            data-dismiss="modal">
                                        </button>

                                    </div>


                                    {{-- =====================================================
                                        BODY
                                    ====================================================== --}}

                                    <div>

                                        <div class="form">

                                            <div class="modal-body futuristicBody">


                                                {{-- =================================================
                                                    STEPPER
                                                ================================================== --}}

                                                <div class="futureStepper">


                                                    {{-- STEP 1 --}}
                                                    <div
                                                        class="stepItem active"
                                                        data-step="1"
                                                    >

                                                        <span>1</span>

                                                        <p>
                                                            Informations
                                                        </p>

                                                    </div>


                                                    <div class="stepLine"></div>


                                                    {{-- STEP 2 --}}
                                                    <div
                                                        class="stepItem"
                                                        data-step="2"
                                                    >

                                                        <span>2</span>

                                                        <p>
                                                            Contact
                                                        </p>

                                                    </div>


                                                    <div class="stepLine"></div>


                                                    {{-- STEP 3 --}}
                                                    <div
                                                        class="stepItem"
                                                        data-step="3"
                                                    >

                                                        <span>3</span>

                                                        <p>
                                                            Identité
                                                        </p>

                                                    </div>


                                                    <div class="stepLine"></div>


                                                    {{-- STEP 4 --}}
                                                    <div
                                                        class="stepItem"
                                                        data-step="4"
                                                    >

                                                        <span>4</span>

                                                        <p>
                                                            Compte
                                                        </p>

                                                    </div>


                                                    <div class="stepLine"></div>


                                                    {{-- STEP 5 --}}
                                                    <div
                                                        class="stepItem"
                                                        data-step="5"
                                                    >

                                                        <span>5</span>

                                                        <p>
                                                            Validation
                                                        </p>

                                                    </div>

                                                </div>


                                                {{-- =================================================
                                                    STEP 1
                                                    INFORMATIONS
                                                ================================================== --}}

                                                <div
                                                    class="stepContent active"
                                                    data-content="1"
                                                >

                                                    {{-- Le contenu viendra ici après réception du STEP 1 --}}
                                                    @include('dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep1')


                                                </div>


                                                {{-- =================================================
                                                    STEP 2
                                                    CONTACT
                                                ================================================== --}}

                                                <div
                                                    class="stepContent"
                                                    data-content="2"
                                                >

                                                    {{-- Le contenu viendra ici après réception du STEP 2 --}}
                                                                    @include('dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep2')


                                                </div>


                                                {{-- =================================================
                                                    STEP 3
                                                    IDENTITÉ
                                                ================================================== --}}

                                                <div
                                                    class="stepContent"
                                                    data-content="3"
                                                >

                                                    {{-- Le contenu viendra ici après réception du STEP 3 --}}
                                                                    @include('dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep3')


                                                </div>


                                                {{-- =================================================
                                                    STEP 4
                                                    COMPTE
                                                ================================================== --}}

                                                <div
                                                    class="stepContent"
                                                    data-content="4"
                                                >

                                                    {{-- Le contenu viendra ici après réception du STEP 4 --}}
                                                                    @include('dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep4')


                                                </div>


                                                {{-- =================================================
                                                    STEP 5
                                                    VALIDATION
                                                ================================================== --}}

                                                <div
                                                    class="stepContent"
                                                    data-content="5"
                                                >

                                                    {{-- Le contenu viendra ici après réception du STEP 5 --}}
                                                                    @include('dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep5')

                                                </div>


                                            </div>

                                        </div>

                                    </div>


                                    {{-- =====================================================
                                        FOOTER
                                    ====================================================== --}}



                                    <div class="modal-footer futuristicFooter justify-content-between">


                                        {{-- LEFT --}}

                                        <!-- LEFT -->
                                            <button type="button" class="futureBtn darkBtn" data-dismiss="modal">

                                                <i class="fa fa-times"></i>
                                                Annuler

                                            </button>


                                        {{-- RIGHT --}}

                                        <div
                                            class=" examenDemandeActions"
                                            style="gap:15px;" >


                                            {{-- PREVIOUS --}}

                                            <button
                                                type="button"
                                                class="futureBtn dangerBtn prevStep"
                                                style="display:none;"
                                            >

                                                <i class="fa fa-arrow-left"></i>

                                                Retour

                                            </button>


                                            {{-- NEXT --}}

                                            <button
                                                type="button"
                                                class="futureBtn successBtn nextStep"  >

                                                Continuer

                                                <i class="fa fa-arrow-right"></i>

                                            </button>


                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    {{-- =========================================================
                        CONSULTER FIN
                    ========================================================= --}}
                    {{-- CONSULTER FIN --}}
                    {{-- MODIFICATION DEBUT --}}
                    {{-- =========================================================
                        MODIFIER DEBUT
                    ========================================================= --}}

                    <div
                        class="modal fade futuristicModal"
                        tabindex="-1"
                        aria-hidden="true"
                        id="modifier{{ $value->id }}"
                        data-stepper="true"data-step="1" data-max-step="5">

                        <div class="modal-dialog modal-xl modal-dialog-centered monstepper">

                            <div class="modal-content futuristicContent">

                                {{-- =====================================================
                                    FORMULAIRE
                                ====================================================== --}}

                                <form
                                    id="futureModifierForm{{ $value->id }}"
                                    method="POST"
                                    action="{{ route('ModifierDemande', $value->id) }}"
                                    enctype="multipart/form-data" >
                                        <input type="hidden" name="id" value="{{$value->id}}">


                                    @csrf

                                    {{-- @method('PUT') --}}


                                    {{-- =====================================================
                                        HEADER
                                    ====================================================== --}}

                                    <div class="modal-header futuristicHeader">

                                        <div class="headerLeft">

                                            <div class="headerIcon">

                                                <i class="fa fa-user-edit"></i>

                                            </div>


                                            <div>

                                                <h2 class="futuristicTitle">

                                                    Modifier :

                                                    {{ $value->prenom }}
                                                    {{ $value->name }}

                                                </h2>


                                                <p class="futuristicSubTitle">

                                                    Modification détaillée du compte utilisateur

                                                </p>

                                            </div>

                                        </div>


                                        {{-- =================================================
                                            FERMER
                                        ================================================== --}}

                                        <button
                                            type="button"
                                            class="btn-close btn-close-white futuristicClose"
                                            data-bs-dismiss="modal"
                                        >
                                        </button>

                                    </div>


                                    {{-- =====================================================
                                        BODY
                                    ====================================================== --}}

                                    <div>

                                        <div class="form">

                                            <div class="modal-body futuristicBody">


                                                {{-- =================================================
                                                    STEPPER
                                                ================================================== --}}

                                                <div class="futureStepper">


                                                    {{-- =================================================
                                                        STEP 1
                                                    ================================================== --}}

                                                    <div
                                                        class="stepItem active"
                                                        data-step="1"
                                                    >

                                                        <span>1</span>

                                                        <p>

                                                            Informations

                                                        </p>

                                                    </div>


                                                    <div class="stepLine"></div>


                                                    {{-- =================================================
                                                        STEP 2
                                                    ================================================== --}}

                                                    <div
                                                        class="stepItem"
                                                        data-step="2"
                                                    >

                                                        <span>2</span>

                                                        <p>

                                                            Contact

                                                        </p>

                                                    </div>


                                                    <div class="stepLine"></div>


                                                    {{-- =================================================
                                                        STEP 3
                                                    ================================================== --}}

                                                    <div
                                                        class="stepItem"
                                                        data-step="3"
                                                    >

                                                        <span>3</span>

                                                        <p>

                                                            Identité

                                                        </p>

                                                    </div>


                                                    <div class="stepLine"></div>


                                                    {{-- =================================================
                                                        STEP 4
                                                    ================================================== --}}

                                                    <div
                                                        class="stepItem"
                                                        data-step="4"
                                                    >

                                                        <span>4</span>

                                                        <p>

                                                            Compte

                                                        </p>

                                                    </div>


                                                    <div class="stepLine"></div>


                                                    {{-- =================================================
                                                        STEP 5
                                                    ================================================== --}}

                                                    <div
                                                        class="stepItem"
                                                        data-step="5"
                                                    >

                                                        <span>5</span>

                                                        <p>

                                                            Validation

                                                        </p>

                                                    </div>


                                                </div>


                                                {{-- =================================================
                                                    STEP 1
                                                    INFORMATIONS PERSONNELLES
                                                ================================================== --}}

                                                <div
                                                    class="stepContent active"
                                                    data-content="1"
                                                >

                                                    @include(
                                                        'dependances.templates.admins.gestions.access.users.demandes._consoms._modalmodifiers.steep1'
                                                    )

                                                </div>


                                                {{-- =================================================
                                                    STEP 2
                                                    CONTACT
                                                ================================================== --}}

                                                <div
                                                    class="stepContent"
                                                    data-content="2"
                                                >

                                                    @include(
                                                        'dependances.templates.admins.gestions.access.users.demandes._consoms._modalmodifiers.steep2'
                                                    )

                                                </div>


                                                {{-- =================================================
                                                    STEP 3
                                                    IDENTITÉ
                                                ================================================== --}}

                                                <div
                                                    class="stepContent"
                                                    data-content="3"
                                                >

                                                    @include(
                                                        'dependances.templates.admins.gestions.access.users.demandes._consoms._modalmodifiers.steep3'
                                                    )

                                                </div>


                                                {{-- =================================================
                                                    STEP 4
                                                    COMPTE
                                                ================================================== --}}

                                                <div
                                                    class="stepContent"
                                                    data-content="4"
                                                >

                                                    @include(
                                                        'dependances.templates.admins.gestions.access.users.demandes._consoms._modalmodifiers.steep4'
                                                    )

                                                </div>


                                                {{-- =================================================
                                                    STEP 5
                                                    VALIDATION
                                                ================================================== --}}

                                                <div
                                                    class="stepContent"
                                                    data-content="5"
                                                >

                                                    @include(
                                                        'dependances.templates.admins.gestions.access.users.demandes._consoms._modalmodifiers.steep5'
                                                    )

                                                </div>


                                            </div>

                                        </div>

                                    </div>


                                    {{-- =====================================================
                                        FOOTER
                                    ====================================================== --}}

                                    <div class="modal-footer futuristicFooter justify-content-between">


                                            {{-- =================================================
                                                LEFT
                                            ================================================== --}}

                                            <button
                                                type="button"
                                                class="futureBtn darkBtn"
                                                data-dismiss="modal"
                                            >

                                                <i class="fa fa-times"></i>

                                                Annuler

                                            </button>


                                            {{-- =================================================
                                                RIGHT
                                            ================================================== --}}

                                            <div
                                                class="examenDemandeActions"
                                                style="gap:15px;">


                                                {{-- =================================================
                                                    PREVIOUS
                                                ================================================== --}}

                                                <button
                                                    type="button"
                                                    class="futureBtn dangerBtn prevStep"
                                                    style="display:none;"
                                                >

                                                    <i class="fa fa-arrow-left"></i>

                                                    Retour

                                                </button>


                                                {{-- =================================================
                                                    NEXT
                                                ================================================== --}}

                                                <button
                                                    type="button"
                                                    class="futureBtn successBtn nextStep"
                                                >

                                                    Continuer

                                                    <i class="fa fa-arrow-right"></i>

                                                </button>


                                                {{-- =================================================
                                                    SUBMIT
                                                ================================================== --}}

                                                <button
                                                    type="submit"
                                                    class="futureBtn successBtn submitStep"
                                                    style="display:none;"
                                                    form="futureModifierForm{{ $value->id }}"
                                                >

                                                    <i class="fa fa-check"></i>

                                                    Enregistrer

                                                </button>


                                            </div>

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

                    <div class="modal fade futuristicModal" tabindex="-1" aria-hidden="true" id="corbeille{{ $value->id }}" data-stepper="true"  data-step="1"  data-max-step="5">

                        <div class="modal-dialog modal-xl modal-dialog-centered monstepper">

                            <div class="modal-content futuristicContent">


                                {{-- =====================================================
                                    HEADER
                                ====================================================== --}}

                                <div class="modal-header futuristicHeader">

                                    <div class="headerLeft">

                                        <div class="headerIcon">

                                            <i class="fa fa-trash"></i>

                                        </div>


                                        <div>

                                            <h2 class="futuristicTitle">

                                                Mettre à la corbeille :
                                                {{ $value->prenom }}
                                                {{ $value->name }}

                                            </h2>


                                            <p class="futuristicSubTitle">

                                                Vérification des informations avant
                                                la mise à la corbeille du compte utilisateur

                                            </p>

                                        </div>

                                    </div>


                                    {{-- FERMER --}}

                                    <button
                                        type="button"
                                        class="btn-close btn-close-white futuristicClose"
                                        data-dismiss="modal"
                                        aria-label="Fermer"
                                    >
                                    </button>

                                </div>


                                {{-- =====================================================
                                    BODY
                                ====================================================== --}}

                                <div>

                                    <div class="form">

                                        <div class="modal-body futuristicBody">


                                            {{-- =================================================
                                                STEPPER
                                            ================================================== --}}

                                            <div class="futureStepper">

                                                {{-- STEP 1 --}}

                                                <div  class="stepItem active" data-step="1" >

                                                    <span>1</span>

                                                    <p>
                                                        Informations
                                                    </p>

                                                </div>
                                                <div class="stepLine"></div>
                                                {{-- STEP 2 --}}

                                                <div class="stepItem"  data-step="2" >

                                                    <span>2</span>

                                                    <p>
                                                        Contact
                                                    </p>

                                                </div>
                                                <div class="stepLine"></div>


                                                {{-- STEP 3 --}}

                                                <div
                                                    class="stepItem"
                                                    data-step="3">

                                                    <span>3</span>

                                                    <p>
                                                        Identité
                                                    </p>

                                                </div>


                                                <div class="stepLine"></div>


                                                {{-- STEP 4 --}}

                                                <div
                                                    class="stepItem"
                                                    data-step="4"
                                                >

                                                    <span>4</span>

                                                    <p>
                                                        Compte
                                                    </p>

                                                </div>


                                                <div class="stepLine"></div>


                                                {{-- STEP 5 --}}

                                                <div
                                                    class="stepItem"
                                                    data-step="5"
                                                >

                                                    <span>5</span>

                                                    <p>
                                                        Validation
                                                    </p>

                                                </div>

                                            </div>


                                            {{-- =================================================
                                                STEP 1
                                                INFORMATIONS
                                            ================================================== --}}

                                            <div
                                                class="stepContent active"
                                                data-content="1">

                                                @include(
                                                    'dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep1'
                                                )

                                            </div>


                                            {{-- =================================================
                                                STEP 2
                                                CONTACT
                                            ================================================== --}}

                                            <div
                                                class="stepContent"
                                                data-content="2" >

                                                @include(
                                                    'dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep2'
                                                )

                                            </div>


                                                {{-- =================================================
                                                    STEP 3
                                                    IDENTITÉ
                                                ================================================== --}}

                                            <div
                                                class="stepContent"
                                                data-content="3">

                                                @include(
                                                    'dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep3'
                                                )

                                            </div>


                                            {{-- =================================================
                                                STEP 4
                                                COMPTE
                                            ================================================== --}}

                                            <div
                                                class="stepContent"
                                                data-content="4"
                                            >

                                                @include(
                                                    'dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep4'
                                                )

                                            </div>


                                            {{-- =================================================
                                                STEP 5
                                                VALIDATION
                                            ================================================== --}}

                                            <div
                                                class="stepContent"
                                                data-content="5"
                                            >

                                                @include(
                                                    'dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep5'
                                                )


                                                {{-- =================================================
                                                    AVERTISSEMENT CORBEILLE
                                                ================================================== --}}

                                                <div class="mt-4">

                                                    <div class="futureFinal">

                                                        <i class="fa fa-triangle-exclamation"></i>

                                                        <h3>

                                                            Mise à la corbeille

                                                        </h3>

                                                        <p>

                                                            Vous êtes sur le point de mettre
                                                            cet utilisateur à la corbeille.

                                                            <br>

                                                            Cette action modifiera son statut
                                                            et l'utilisateur ne sera plus affiché
                                                            dans la liste principale.

                                                        </p>

                                                    </div>

                                                </div>

                                            </div>


                                        </div>

                                    </div>

                                </div>


                                {{-- =====================================================
                                    FOOTER
                                ====================================================== --}}

                                <div class="modal-footer futuristicFooter justify-content-between">


                                    {{-- =================================================
                                        GAUCHE : ANNULER
                                    ================================================== --}}

                                    <button
                                        type="button"
                                        class="futureBtn darkBtn"
                                        data-dismiss="modal"
                                    >

                                        <i class="fa fa-times"></i>

                                        Annuler

                                    </button>


                                    {{-- =================================================
                                        DROITE
                                    ================================================== --}}

                                    <div
                                        class="examenDemandeActions"
                                        style="gap:15px;">


                                        {{-- =================================================
                                            RETOUR
                                        ================================================== --}}

                                        <button
                                            type="button"
                                            class="futureBtn dangerBtn prevStep"
                                            style="display:none;"
                                        >

                                            <i class="fa fa-arrow-left"></i>

                                            Retour

                                        </button>


                                        {{-- =================================================
                                            CONTINUER
                                        ================================================== --}}

                                        <button
                                            type="button"
                                            class="futureBtn successBtn nextStep"
                                        >

                                            Continuer

                                            <i class="fa fa-arrow-right"></i>

                                        </button>


                                        {{-- =================================================
                                            CONFIRMER CORBEILLE
                                        ================================================== --}}

                                        <form
                                            method="POST"
                                            action="{{ route('CorbeilleUser') }}"
                                            style="margin:0;">
                                            <input type="hidden" name="id" value="{{$value->id}}">


                                            @csrf

                                            {{-- Si ta route utilise DELETE, décommente ceci --}}
                                            {{-- @method('DELETE') --}}

                                            <button
                                                type="submit"
                                                class="futureBtn dangerBtn submitStep"
                                                style="display:none;"
                                            >

                                                <i class="fa fa-trash"></i>

                                                Mettre à la corbeille

                                            </button>

                                        </form>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- =========================================================
                        CORBEILLE FIN
                    ========================================================= --}}
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


                    {{-- =========================================================
                        EXAMINER LA DEMANDE - DEBUT
                    ========================================================= --}}

                    <div
                        class="modal fade futuristicModal"
                        tabindex="-1"
                        aria-hidden="true"
                        id="examiner{{ $value->id }}"
                        data-stepper="true"
                        data-step="1"
                        data-max-step="5">

                        <div class="modal-dialog modal-xl modal-dialog-centered monstepper">

                            <div class="modal-content futuristicContent">


                                {{-- =====================================================
                                    HEADER
                                ====================================================== --}}

                                <div class="modal-header futuristicHeader">

                                    <div class="headerLeft">

                                        <div class="headerIcon">

                                            <i class="fa fa-user-check"></i>

                                        </div>


                                        <div>

                                            <h2 class="futuristicTitle">

                                                Examen de la demande :
                                                {{ $value->prenom }}
                                                {{ $value->name }}

                                            </h2>


                                            <p class="futuristicSubTitle">

                                                Vérification détaillée de la demande d'adhésion

                                            </p>

                                        </div>

                                    </div>


                                    <button
                                        type="button"
                                        class="btn-close btn-close-white futuristicClose"
                                        data-bs-dismiss="modal"
                                    >
                                    </button>

                                </div>


                                {{-- =====================================================
                                    BODY
                                ====================================================== --}}

                                <div>

                                    <div class="form">

                                        <div class="modal-body futuristicBody">


                                            {{-- =================================================
                                                STEPPER
                                            ================================================== --}}

                                            <div class="futureStepper">


                                                {{-- STEP 1 --}}

                                                <div
                                                    class="stepItem active"
                                                    data-step="1"
                                                >

                                                    <span>1</span>

                                                    <p>
                                                        Informations
                                                    </p>

                                                </div>


                                                <div class="stepLine"></div>


                                                {{-- STEP 2 --}}

                                                <div
                                                    class="stepItem"
                                                    data-step="2"
                                                >

                                                    <span>2</span>

                                                    <p>
                                                        Contact
                                                    </p>

                                                </div>


                                                <div class="stepLine"></div>


                                                {{-- STEP 3 --}}

                                                <div
                                                    class="stepItem"
                                                    data-step="3"
                                                >

                                                    <span>3</span>

                                                    <p>
                                                        Identité
                                                    </p>

                                                </div>


                                                <div class="stepLine"></div>


                                                {{-- STEP 4 --}}

                                                <div
                                                    class="stepItem"
                                                    data-step="4"
                                                >

                                                    <span>4</span>

                                                    <p>
                                                        Compte
                                                    </p>

                                                </div>


                                                <div class="stepLine"></div>


                                                {{-- STEP 5 --}}

                                                <div
                                                    class="stepItem"
                                                    data-step="5"
                                                >

                                                    <span>5</span>

                                                    <p>
                                                        Décision
                                                    </p>

                                                </div>

                                            </div>


                                            {{-- =================================================
                                                STEP 1
                                                INFORMATIONS
                                            ================================================== --}}

                                            <div
                                                class="stepContent active"
                                                data-content="1"
                                            >

                                                @include(
                                                    'dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep1'
                                                )

                                            </div>


                                            {{-- =================================================
                                                STEP 2
                                                CONTACT
                                            ================================================== --}}

                                            <div
                                                class="stepContent"
                                                data-content="2"
                                            >

                                                @include(
                                                    'dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep2'
                                                )

                                            </div>


                                            {{-- =================================================
                                                STEP 3
                                                IDENTITÉ
                                            ================================================== --}}

                                            <div
                                                class="stepContent"
                                                data-content="3"
                                            >

                                                @include(
                                                    'dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep3'
                                                )

                                            </div>


                                            {{-- =================================================
                                                STEP 4
                                                COMPTE
                                            ================================================== --}}

                                            <div
                                                class="stepContent"
                                                data-content="4"
                                            >

                                                @include(
                                                    'dependances.templates.admins.gestions.access.users.demandes._consoms._readonlys.steep4'
                                                )

                                            </div>


                                            {{-- =================================================
                                                STEP 5
                                                DÉCISION
                                            ================================================== --}}



                                            <div
                                                class="stepContent"
                                                data-content="5">

                                                <section class="steep-5">

                                                    <div class="steep-05">


                                                        {{-- =====================================================
                                                            TITRE
                                                        ====================================================== --}}

                                                        <div class="container-fluid">

                                                            <div class="row p-2">

                                                                <div class="col-12">

                                                                    <div class="futureField">

                                                                        <label>

                                                                            <i class="fa fa-user-check"></i>

                                                                            Décision concernant la demande

                                                                        </label>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>


                                                        {{-- =====================================================
                                                            INFORMATIONS DU DEMANDEUR
                                                        ====================================================== --}}

                                                        <div class="container-fluid">

                                                            <div class="row inter-input">


                                                                {{-- =================================================
                                                                    DEMANDEUR
                                                                ================================================== --}}

                                                                <div class="col-md-4">

                                                                    <div class="futureField">

                                                                        <label>

                                                                            <i class="fa fa-user"></i>

                                                                            Demandeur

                                                                        </label>


                                                                        <div class="futureInput">

                                                                            <i class="fa fa-user inputIcon"></i>

                                                                            <input
                                                                                type="text"
                                                                                value="{{ ($value->prenom ?? '') . ' ' . ($value->name ?? '') }}"
                                                                                readonly
                                                                            >

                                                                        </div>

                                                                    </div>

                                                                </div>


                                                                {{-- =================================================
                                                                    EMAIL
                                                                ================================================== --}}

                                                                <div class="col-md-4">

                                                                    <div class="futureField">

                                                                        <label>

                                                                            <i class="fa fa-envelope"></i>

                                                                            Adresse email

                                                                        </label>


                                                                        <div class="futureInput">

                                                                            <i class="fa fa-envelope inputIcon"></i>

                                                                            <input
                                                                                type="text"
                                                                                value="{{ $value->email ?? 'Non renseigné' }}"
                                                                                readonly
                                                                            >

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                {{-- =================================================
                                                                    STATUT
                                                                ================================================== --}}

                                                                <div class="col-md-4">

                                                                    <div class="futureField">

                                                                        <label>

                                                                            <i class="fa fa-hourglass-half"></i>

                                                                            Statut actuel

                                                                        </label>


                                                                        <div class="futureInput">

                                                                            <i class="fa fa-clock inputIcon"></i>

                                                                            <input
                                                                                type="text"
                                                                                value="En attente de validation"
                                                                                readonly
                                                                            >

                                                                        </div>

                                                                    </div>

                                                                </div>


                                                            </div>

                                                        </div>





                                                        {{-- =====================================================
                                                            INFORMATION DE VALIDATION
                                                        ====================================================== --}}

                                                        <div class="container-fluid">

                                                            <div class="row inter-input p-2">

                                                                <div class="col-12">

                                                                    <div class="examenDecisionInfo">

                                                                        <div class="examenDecisionInfoIcon">

                                                                            <i class="fa fa-info-circle"></i>

                                                                        </div>


                                                                        <div class="examenDecisionInfoContent">

                                                                            <strong>
                                                                                Vérification de la demande
                                                                            </strong>

                                                                            <p>

                                                                                Après acceptation, cet utilisateur
                                                                                deviendra automatiquement
                                                                                <strong>Membre de la communauté</strong>.

                                                                                En cas de refus, son compte sera
                                                                                conservé avec le statut
                                                                                <strong>Refusé</strong>.

                                                                            </p>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>


                                                        {{-- =====================================================
                                                            ZONE DE DÉCISION
                                                        ====================================================== --}}

                                                        <div class="container-fluid">

                                                            <div class="row inter-input p-2">

                                                                <div class="col-12">

                                                                    <div class="examenDecisionBox">


                                                                        <div class="examenDecisionHeader">

                                                                            <i class="fa fa-gavel"></i>

                                                                            <div>

                                                                                <strong>
                                                                                    Décision
                                                                                </strong>

                                                                                <span>
                                                                                    Choisissez l'action à effectuer
                                                                                </span>

                                                                            </div>

                                                                        </div>


                                                                        <div class="examenDecisionButtons">


                                                                            {{-- =====================================
                                                                                REFUSER
                                                                            ====================================== --}}

                                                                            <form
                                                                                action="{{ route('RefuserDemandeUser') }}"
                                                                                method="POST"
                                                                                class="examenDecisionForm">
                                                                                @csrf

                                                                                <input
                                                                                    type="hidden"
                                                                                    name="id"
                                                                                    value="{{ $value->id }}">

                                                                                <button
                                                                                    type="submit"
                                                                                    class="examenDecisionBtn examenRefuserBtn"
                                                                                >

                                                                                    <span class="examenDecisionBtnIcon">
                                                                                        <i class="fa fa-times-circle"></i>
                                                                                    </span>

                                                                                    <span class="examenDecisionBtnText">

                                                                                        <strong>
                                                                                            Refuser
                                                                                        </strong>

                                                                                        <small>
                                                                                            Refuser cette demande
                                                                                        </small>

                                                                                    </span>

                                                                                </button>

                                                                            </form>


                                                                            {{-- =====================================
                                                                                ACCEPTER
                                                                            ====================================== --}}

                                                                           <form
                                                                                action="{{ route('ValiderDemandeUser') }}"
                                                                                method="POST"
                                                                                class="examenDecisionForm">
                                                                                @csrf

                                                                                <input
                                                                                    type="hidden"
                                                                                    name="id"
                                                                                    value="{{ $value->id }}"
                                                                                >

                                                                                <button
                                                                                    type="submit"
                                                                                    class="examenDecisionBtn examenAccepterBtn">

                                                                                    <span class="examenDecisionBtnIcon">
                                                                                        <i class="fa fa-check-circle"></i>
                                                                                    </span>

                                                                                    <span class="examenDecisionBtnText">

                                                                                        <strong>
                                                                                            Accepter
                                                                                        </strong>

                                                                                        <small>
                                                                                            Devenir membre de la communauté
                                                                                        </small>

                                                                                    </span>

                                                                                </button>

                                                                            </form>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>


                                                    </div>

                                                </section>

                                            </div>






                                        </div>

                                    </div>

                                </div>

                                {{-- =====================================================
                                    FOOTER
                                ====================================================== --}}

                                {{-- =====================================================
                                    FOOTER EXAMEN DE LA DEMANDE
                                ====================================================== --}}

                                <div class="modal-footer futuristicFooter examenDemandeFooter">


                                    {{-- =================================================
                                        BOUTON FERMER
                                    ================================================== --}}

                                    <button
                                        type="button"
                                        class="futureBtn darkBtn examenBtnFermer"
                                        data-bs-dismiss="modal">

                                        <i class="fa fa-times"></i>

                                        Fermer

                                    </button>


                                    {{-- =================================================
                                        GROUPE DES ACTIONS DU STEPPER
                                    ================================================== --}}

                                    <div class="examenDemandeActions">


                                        {{-- =================================================
                                            RETOUR
                                        ================================================== --}}

                                        <button
                                            type="button"
                                            class="futureBtn dangerBtn examenBtnRetour prevStep"
                                            style="display:none;">

                                            <i class="fa fa-arrow-left"></i>

                                            Retour

                                        </button>


                                        {{-- =================================================
                                            CONTINUER
                                        ================================================== --}}

                                        <button
                                            type="button"
                                            class="futureBtn successBtn examenBtnContinuer nextStep"
                                        >

                                            Continuer

                                            <i class="fa fa-arrow-right"></i>

                                        </button>


                                        {{-- =================================================
                                            ACTIONS FINALES
                                            APPARAISSENT UNIQUEMENT AU STEP 5
                                        ================================================== --}}



                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <script>

                    </script>


                    {{-- =========================================================
                        EXAMINER LA DEMANDE - FIN
                    ========================================================= --}}




                @endforeach
            {{-- AUTRES MODALS FIN --}}

                <!-- MODAL -->

    {{-- DEBUT --}}

            {{--  --}}
        </div>
    {{-- MODALS FIN --}}
</section>

<style>







</style>
