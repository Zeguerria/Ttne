<section>
    {{-- MODALS DEBUT --}}
        <div>

        {{-- AJOUTER DEBUT --}}

            <div class="modal fade futuristicModal" tabindex="-1" aria-hidden="true" id="Ajouter" data-stepper="true" data-step="1"  data-max-step="4">

                <div class="modal-dialog modal-xl modal-dialog-centered monstepper">

                    <div class="modal-content futuristicContent ">
                        <form id="futureStepperForm" method="POST" action="{{ route('AjouterGroupe') }}"  enctype="multipart/form-data">
                            @csrf
                            <!-- LIGHT -->
                            <div class="modalLight"></div>


                            <!-- HEADER -->
                            <div class="modal-header futuristicHeader">

                                <div class="headerLeft">

                                    <div class="headerIcon">
                                        <i class="fa fa-users"></i>
                                    </div>

                                    <div>
                                        <h2 class="futuristicTitle">
                                            Nouveau Groupe
                                        </h2>

                                        <p class="futuristicSubTitle">
                                            Création d'un groupe
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
                                                <p>Groupe</p>
                                            </div>

                                            <div class="stepLine"></div>

                                            <!-- STEP 2 -->
                                            <div class="stepItem"
                                                data-step="2">
                                                <span>2</span>
                                                <p>Cotisation</p>
                                            </div>

                                            <div class="stepLine"></div>

                                            <!-- STEP 3 -->
                                            <div class="stepItem"
                                                data-step="3">
                                                <span>3</span>
                                                <p>Fonctionnement</p>
                                            </div>

                                            <div class="stepLine"></div>

                                            <!-- STEP 4 -->
                                            <div class="stepItem"
                                                data-step="4">
                                                <span>4</span>
                                                <p>Administration</p>
                                            </div>

                                            <div class="stepLine"></div>

                                            <!-- STEP 5 -->
                                            <div class="stepItem"
                                                data-step="5">
                                                <span>5</span>
                                                <p>Vérification</p>
                                            </div>

                                        </div>


                                        <!-- =====================================
                                            STEP 1
                                            INFORMATIONS PERSONNELLES
                                        ====================================== -->

                                        <div class="stepContent active" data-content="1">
                                            @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms._modalajouts.steep1')
                                        </div>
                                        <!-- =====================================
                                            STEP 2
                                            CONTACT
                                        ====================================== -->

                                        <div class="stepContent" data-content="2">
                                            @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms._modalajouts.steep2')
                                        </div>
                                        <!-- =====================================
                                            STEP 3
                                            PIÈCE D'IDENTITÉ
                                        ====================================== -->

                                        <div class="stepContent" data-content="3">
                                            @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms._modalajouts.steep3')
                                        </div>
                                        <!-- =====================================
                                            STEP 4
                                            AUTHENTIFICATION
                                        ====================================== -->

                                        <div class="stepContent" data-content="4">

                                            @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms._modalajouts.steep4')
                                        </div>
                                        <!-- =====================================
                                            STEP 5
                                            VALIDATION
                                        ====================================== -->

                                        <div class="stepContent" data-content="5">
                                            @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms._modalajouts.steep5')

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
                    @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms.toutmettrecorbeille')
                </div>
            {{-- TOUT METTRE EN CORBEILLE FIN --}}

            {{-- AUTRES MODALS DEBUT --}}
                @foreach($groupes as $key => $value)
                    {{-- CONSULTER DEBUT --}}
                       {{-- =========================================================
                            CONSULTER DEBUT
                        ========================================================= --}}

                        <div class="modal fade futuristicModal" tabindex="-1"aria-hidden="true" id="consulter{{ $value->id }}"data-stepper="true"
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

                                                <i class="fa fa-eye"></i>

                                            </div>

                                            <div>

                                                <h2 class="futuristicTitle">

                                                    Consultation de :
                                                    {{ $value->nom }}

                                                </h2>

                                                <p class="futuristicSubTitle">

                                                    Consultation détaillée du groupe

                                                </p>

                                            </div>

                                        </div>



                                        <button type="button" class="btn-close btn-close-white futuristicClose"
                                                                data-bs-dismiss="modal">
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

                                                    <!-- STEP 1 -->
                                                    <div class="stepItem active"
                                                        data-step="1">
                                                        <span>1</span>
                                                        <p>Groupe</p>
                                                    </div>

                                                    <div class="stepLine"></div>

                                                    <!-- STEP 2 -->
                                                    <div class="stepItem"
                                                        data-step="2">
                                                        <span>2</span>
                                                        <p>Cotisation</p>
                                                    </div>

                                                    <div class="stepLine"></div>

                                                    <!-- STEP 3 -->
                                                    <div class="stepItem"
                                                        data-step="3">
                                                        <span>3</span>
                                                        <p>Fonctionnement</p>
                                                    </div>

                                                    <div class="stepLine"></div>

                                                    <!-- STEP 4 -->
                                                    <div class="stepItem"
                                                        data-step="4">
                                                        <span>4</span>
                                                        <p>Administration</p>
                                                    </div>

                                                    <div class="stepLine"></div>

                                                    <!-- STEP 5 -->
                                                    <div class="stepItem"
                                                        data-step="5">
                                                        <span>5</span>
                                                        <p>Vérification</p>
                                                    </div>

                                                </div>


                                                {{-- =================================================
                                                    STEP 1
                                                    INFORMATIONS
                                                ================================================== --}}

                                                <div
                                                    class="stepContent active"
                                                    data-content="1">

                                                    {{-- Le contenu viendra ici après réception du STEP 1 --}}
                                                                    @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms._readonlys.steep1')


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
                                                                    @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms._readonlys.steep2')


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
                                                                    @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms._readonlys.steep3')


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
                                                                    @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms._readonlys.steep4')


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
                                                                    @include('dependances.templates.admins.gestions.delicatesses.groupes._consoms._readonlys.steep5')

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
                    {{-- MODIFICATION DEBUT --}}
                       {{-- =========================================================
                            MODIFIER DEBUT
                        ========================================================= --}}

                        <div
                            class="modal fade futuristicModal"
                            tabindex="-1"
                            aria-hidden="true"
                            id="modifier{{ $value->id }}"
                            data-stepper="true"
                            data-step="1"
                            data-max-step="5">

                            <div class="modal-dialog modal-xl modal-dialog-centered monstepper">

                                <div class="modal-content futuristicContent">

                                    {{-- =====================================================
                                        FORMULAIRE
                                    ====================================================== --}}

                                    <form
                                        id="futureModifierForm{{ $value->id }}"
                                        method="POST"
                                        action="{{ route('ModifierGroupe', $value->id) }}"
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

                                                        {{ $value->nom }}

                                                    </h2>


                                                    <p class="futuristicSubTitle">

                                                        Modification détaillée du groupe

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

                                                        <!-- STEP 1 -->
                                                        <div class="stepItem active"
                                                            data-step="1">
                                                            <span>1</span>
                                                            <p>Groupe</p>
                                                        </div>

                                                        <div class="stepLine"></div>

                                                        <!-- STEP 2 -->
                                                        <div class="stepItem"
                                                            data-step="2">
                                                            <span>2</span>
                                                            <p>Cotisation</p>
                                                        </div>

                                                        <div class="stepLine"></div>

                                                        <!-- STEP 3 -->
                                                        <div class="stepItem"
                                                            data-step="3">
                                                            <span>3</span>
                                                            <p>Fonctionnement</p>
                                                        </div>

                                                        <div class="stepLine"></div>

                                                        <!-- STEP 4 -->
                                                        <div class="stepItem"
                                                            data-step="4">
                                                            <span>4</span>
                                                            <p>Administration</p>
                                                        </div>

                                                        <div class="stepLine"></div>

                                                        <!-- STEP 5 -->
                                                        <div class="stepItem"
                                                            data-step="5">
                                                            <span>5</span>
                                                            <p>Vérification</p>
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
                                                            'dependances.templates.admins.gestions.delicatesses.groupes._consoms._modalmodifiers.steep1'
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
                                                            'dependances.templates.admins.gestions.delicatesses.groupes._consoms._modalmodifiers.steep2'
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
                                                            'dependances.templates.admins.gestions.delicatesses.groupes._consoms._modalmodifiers.steep3'
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
                                                            'dependances.templates.admins.gestions.delicatesses.groupes._consoms._modalmodifiers.steep4'
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
                                                            'dependances.templates.admins.gestions.delicatesses.groupes._consoms._modalmodifiers.steep5'
                                                        )

                                                    </div>


                                                </div>

                                            </div>

                                        </div>


                                        {{-- =====================================================
                                            FOOTER
                                        ====================================================== --}}

                                        <div
                                            class="modal-footer futuristicFooter justify-content-between">


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
                                                {{ $value->nom }}
                                                

                                            </h2>


                                            <p class="futuristicSubTitle">

                                                Vérification des informations avant
                                                la mise à la corbeille du groupe

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

                                            <!-- STEP 1 -->
                                            <div class="stepItem active"
                                                data-step="1">
                                                <span>1</span>
                                                <p>Groupe</p>
                                            </div>

                                            <div class="stepLine"></div>

                                            <!-- STEP 2 -->
                                            <div class="stepItem"
                                                data-step="2">
                                                <span>2</span>
                                                <p>Cotisation</p>
                                            </div>

                                            <div class="stepLine"></div>

                                            <!-- STEP 3 -->
                                            <div class="stepItem"
                                                data-step="3">
                                                <span>3</span>
                                                <p>Fonctionnement</p>
                                            </div>

                                            <div class="stepLine"></div>

                                            <!-- STEP 4 -->
                                            <div class="stepItem"
                                                data-step="4">
                                                <span>4</span>
                                                <p>Administration</p>
                                            </div>

                                            <div class="stepLine"></div>

                                            <!-- STEP 5 -->
                                            <div class="stepItem"
                                                data-step="5">
                                                <span>5</span>
                                                <p>Vérification</p>
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
                                                    'dependances.templates.admins.gestions.delicatesses.groupes._consoms._readonlys.steep1'
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
                                                    'dependances.templates.admins.gestions.delicatesses.groupes._consoms._readonlys.steep2'
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
                                                    'dependances.templates.admins.gestions.delicatesses.groupes._consoms._readonlys.steep3'
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
                                                    'dependances.templates.admins.gestions.delicatesses.groupes._consoms._readonlys.steep4'
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
                                                    'dependances.templates.admins.gestions.delicatesses.groupes._consoms._readonlys.steep5'
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
                                            action="{{ route('CorbeilleGroupe') }}"
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
                   

                @endforeach
            {{-- AUTRES MODALS FIN --}}

                <!-- MODAL -->

    {{-- DEBUT --}}

            {{--  --}}
        </div>
    {{-- MODALS FIN --}}
</section>

