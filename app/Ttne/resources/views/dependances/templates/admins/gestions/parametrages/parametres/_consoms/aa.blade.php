<div class="modal fade futuristicModal" id="Ajouter" tabindex="-1" aria-hidden="true">

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

<script>
 /* =========================================================
    FUTURE FILE INPUT
     ========================================================= */

    $(document).on('change', '.futureFileInput', function(){
        let fileName = this.files[0]?.name;
        let container = $(this).closest('.futureFile');
        let fileBox = container.find('.futureFileName');
        if(fileName){
        fileBox.text(fileName);
        fileBox.fadeIn(200);
            }
    });
</script>
