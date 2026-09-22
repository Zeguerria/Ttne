{{-- =========================================================
     STEP 4
     COMPTE / SÉCURITÉ
========================================================= --}}

<div class="stepContent" data-content="4">

    <section class="steep-4">

        <div class="steep-04">

            <div class="container-fluid">

                <div class="row g-4">


                    {{-- =================================================
                         NOUVEAU MOT DE PASSE
                    ================================================== --}}

                    <div class="col-md-6">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-lock"></i>

                                Nouveau mot de passe

                            </label>


                            <div class="futureInput">

                                <i class="fa fa-lock inputIcon"></i>


                                <input
                                    type="password"
                                    name="password"
                                    id="modifier_password_{{ $value->id }}"
                                    class="form-control"
                                    placeholder="Laisser vide pour conserver"
                                >


                                <button
                                    type="button"
                                    class="passwordToggle"
                                    data-target="#modifier_password_{{ $value->id }}"
                                    aria-label="Afficher le mot de passe"
                                >

                                    <i class="fa fa-eye"></i>

                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         CONFIRMATION
                    ================================================== --}}

                    <div class="col-md-6">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-lock"></i>

                                Confirmation du mot de passe

                            </label>


                            <div class="futureInput">

                                <i class="fa fa-lock inputIcon"></i>


                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="modifier_password_confirmation_{{ $value->id }}"
                                    class="form-control"
                                    placeholder="Confirmer le nouveau mot de passe"
                                >


                                <button
                                    type="button"
                                    class="passwordToggle"
                                    data-target="#modifier_password_confirmation_{{ $value->id }}"
                                    aria-label="Afficher la confirmation du mot de passe"
                                >

                                    <i class="fa fa-eye"></i>

                                </button>

                            </div>


                            {{-- =================================================
                                 ERREUR MOT DE PASSE
                            ================================================== --}}

                            <div class="passwordError">

                                <i class="fa fa-circle-exclamation"></i>

                                Les mots de passe ne correspondent pas.

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         INFORMATION
                    ================================================== --}}

                    <div class="col-md-12">

                        <div class="futureFinal">

                            <i class="fa fa-shield-halved"></i>


                            <h3>

                                Sécurité du compte

                            </h3>


                            <p>

                                Laissez les champs vides si vous souhaitez
                                conserver le mot de passe actuel.
                                Si vous renseignez un nouveau mot de passe,
                                les deux champs doivent correspondre.

                            </p>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

</div>

{{-- =========================================================
     STEP 4 FIN
========================================================= --}}
