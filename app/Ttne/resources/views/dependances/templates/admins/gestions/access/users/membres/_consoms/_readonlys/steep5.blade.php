{{-- =========================================================
     STEP 5
     VALIDATION / RÉCAPITULATIF
========================================================= --}}

    <section class="steep-5">

        <div class="steep-05">

            <div class="futureFinal">

                <i class="fa fa-circle-check"></i>


                <h3>

                    Vérification du compte

                </h3>


                <p>

                    Récapitulatif des principales informations
                    du compte utilisateur.

                </p>


                <div class="row g-1 mt-2">


                    {{-- =================================================
                        NOM
                    ================================================== --}}

                    <div class="col-md-4">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-user"></i>

                                Noms & Prénoms

                            </label>


                            <div class="futureInput">

                                <span>

                                    {{ $value->name ?? 'Non renseigné' }}  {{ $value->prenom ?? 'Non renseigné' }}

                                </span>

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

                                Email

                            </label>


                            <div class="futureInput">

                                <span>

                                    {{ $value->email ?? 'Aucun email' }}

                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        TÉLÉPHONE
                    ================================================== --}}

                    <div class="col-md-4">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-phone"></i>

                                Téléphone

                            </label>


                            <div class="futureInput">

                                <span>

                                    {{ $value->telephone ?? 'Aucun téléphone' }}

                                </span>

                            </div>

                        </div>

                    </div>








                </div>


                {{-- =================================================
                    MESSAGE FINAL
                ================================================== --}}

                <div class="mt-4">

                    <p>

                        <i class="fa fa-info-circle"></i>

                        Les informations présentées correspondent
                        aux données actuellement enregistrées pour
                        cet utilisateur.

                    </p>

                </div>

            </div>

        </div>

    </section>

{{-- =========================================================
     STEP 5 FIN
========================================================= --}}
