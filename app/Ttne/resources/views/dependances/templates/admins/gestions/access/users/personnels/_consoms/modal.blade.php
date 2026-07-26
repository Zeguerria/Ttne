<section>
    {{-- MODALS DEBUT --}}
        <div>
            {{-- AJOUTER DEBUT --}}

                <div class="modal fade futuristicModal"  tabindex="-1" aria-hidden="true" id="Ajouter">

                    <div class="modal-dialog modal-xl modal-dialog-centered">

                        <div class="modal-content futuristicContent">

                            <!-- LIGHT -->
                            <div class="modalLight"></div>

                            <!-- HEADER -->
                            <div class="modal-header futuristicHeader">

                                <div class="headerLeft">

                                    <div class="headerIcon">
                                        <i class="fa fa-layer-group"></i>
                                    </div>

                                    <div>
                                        <h2 class="futuristicTitle">
                                            Nouveau membre
                                        </h2>

                                        <p class="futuristicSubTitle">
                                            Création multi-étapes
                                        </p>
                                    </div>

                                </div>

                                <button type="button"
                                        class="btn-close btn-close-white futuristicClose"
                                        data-bs-dismiss="modal"></button>

                            </div>

                            <!-- BODY -->
                            <div class="modal-body futuristicBody">

                                <!-- STEPPER -->
                                <div class="futureStepper">

                                    <div class="stepItem active" data-step="1">
                                        <span>1</span>
                                        <p>Infos</p>
                                    </div>

                                    <div class="stepLine"></div>

                                    <div class="stepItem" data-step="2">
                                        <span>2</span>
                                        <p>Contact</p>
                                    </div>

                                    <div class="stepLine"></div>

                                    <div class="stepItem" data-step="3">
                                        <span>3</span>
                                        <p>Documents</p>
                                    </div>

                                    <div class="stepLine"></div>

                                    <div class="stepItem" data-step="4">
                                        <span>4</span>
                                        <p>Validation</p>
                                    </div>

                                </div>

                                <!-- FORM -->
                                <form id="futureStepperForm">

                                    <!-- STEP 1 -->
                                    <div class="stepContent active" data-content="1">

                                        <div class="row g-4">

                                            <div class="col-md-6">
                                                <div class="futureField">

                                                    <div class="futureField">

                                                        {{-- <label>
                                                            <i class="fa fa-users"></i>
                                                            Membres
                                                        </label>

                                                        <div class="futureInput">

                                                            <i class="fa fa-users inputIcon"></i>

                                                            <select class="futureSelect" multiple>

                                                                <option></option>

                                                                <option>Jeremy</option>
                                                                <option>Patrick</option>
                                                                <option>Sandra</option>
                                                                <option>Olivia</option>

                                                            </select>

                                                        </div> --}}
                                                        <div class="futureField">

                                                            <label>
                                                                <i class="fa fa-layer-group"></i>
                                                                Type de membre
                                                            </label>

                                                            <div class="futureInput">

                                                                <i class="fa fa-layer-group inputIcon"></i>

                                                                <select class="futureSelectSingle">

                                                                    <option value=""></option>

                                                                    <option>Administrateur</option>
                                                                    <option>Membre</option>
                                                                    <option>Gestionnaire</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-user"></i>
                                                        Prénom
                                                    </label>

                                                    <div class="futureInput">
                                                        <i class="fa fa-user inputIcon"></i>

                                                        <input type="text"
                                                            placeholder="Entrer le prénom">
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <!-- STEP 2 -->
                                    <div class="stepContent" data-content="2">

                                        <div class="row g-4">

                                            <div class="col-md-6">
                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-phone"></i>
                                                        Téléphone
                                                    </label>

                                                    <div class="futureInput">
                                                        <i class="fa fa-phone inputIcon"></i>

                                                        <input type="text"
                                                            placeholder="+241">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-envelope"></i>
                                                        Email
                                                    </label>

                                                    <div class="futureInput">
                                                        <i class="fa fa-envelope inputIcon"></i>

                                                        <input type="email"
                                                            placeholder="email@gmail.com">
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <!-- STEP 3 -->
                                    <div class="stepContent" data-content="3">

                                        <div class="row g-4">

                                            <div class="col-md-12">
                                                <div class="futureField">

                                                    <div class="futureField">

                                                        <label>
                                                            <i class="fa fa-image"></i>
                                                            Photo
                                                        </label>

                                                        <div class="futureFile">

                                                            <input type="file"
                                                                class="futureFileInput">

                                                            <div class="futureFileBox">

                                                                <div class="futureFileIcon">
                                                                    <i class="fa fa-cloud-arrow-up"></i>
                                                                </div>

                                                                <div class="futureFileTitle">
                                                                    Glisser ou sélectionner un fichier
                                                                </div>

                                                                <p class="futureFileSubTitle">
                                                                    PNG, JPG, PDF...
                                                                </p>

                                                                <div class="futureFileName"></div>

                                                            </div>

                                                        </div>

                                                    </div>


                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                    <!-- STEP 4 -->
                                    <div class="stepContent" data-content="4">

                                        <div class="futureFinal">

                                            <i class="fa fa-circle-check"></i>

                                            <h3>
                                                Vérification finale
                                            </h3>

                                            <p>
                                                Vérifiez les informations avant validation.
                                            </p>

                                        </div>

                                    </div>

                                </form>

                            </div>

                            <!-- FOOTER -->
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
                                <div class="d-flex align-items-center" style="gap:15px;">

                                    <button type="button"
                                            class="futureBtn dangerBtn"
                                            id="prevStep"
                                            style="display:none;">

                                        <i class="fa fa-arrow-left"></i>
                                        Retour

                                    </button>

                                    <button type="button"
                                            class="futureBtn successBtn"
                                            id="nextStep">

                                        Continuer
                                        <i class="fa fa-arrow-right"></i>

                                    </button>

                                    <button type="submit"
                                            class="futureBtn successBtn"
                                            id="submitStep"
                                            style="display:none;">

                                        <i class="fa fa-check"></i>
                                        Valider

                                    </button>

                                </div>

                            </div>

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

