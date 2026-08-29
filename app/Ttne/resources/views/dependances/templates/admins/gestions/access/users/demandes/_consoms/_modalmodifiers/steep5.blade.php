{{-- =========================================================
     STEP 5
     VALIDATION / RÉCAPITULATIF
========================================================= --}}

<div class="stepContent" data-content="5">

    <section class="steep-5">

        <div class="steep-05">

            <div class="futureFinal">

                <i class="fa fa-circle-check"></i>


                <h3>

                    Vérification des modifications

                </h3>


                <p>

                    Vérifiez les informations avant
                    d'enregistrer les modifications
                    apportées à cet utilisateur.

                </p>


                <div class="row g-1 mt-2">


                    {{-- =================================================
                         NOM + PRÉNOM
                    ================================================== --}}

                    <div class="col-md-4">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-user"></i>

                                Noms & Prénoms

                            </label>


                            <div class="futureInput">

                                <span>

                                    {{ $value->name ?? 'Non renseigné' }}

                                    {{ $value->prenom ?? 'Non renseigné' }}

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


                    {{-- =================================================
                         PROFIL
                    ================================================== --}}

                    <div class="col-md-4">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-user-tag"></i>

                                Profil

                            </label>


                            <div class="futureInput">

                                <span>

                                    @if($value->profil)

                                        {{ $value->profil->libelle }}

                                    @else

                                        Profil non défini

                                    @endif

                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         PIÈCE D'IDENTITÉ
                    ================================================== --}}

                    <div class="col-md-4">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-id-card"></i>

                                Pièce d'identité

                            </label>


                            <div class="futureInput">

                                <span>

                                    @if($value->pieces->first())

                                        {{ $value->pieces->first()->typePiece->libelle ?? 'Pièce' }}

                                    @else

                                        Aucune pièce

                                    @endif

                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         DOCUMENT
                    ================================================== --}}

                    <div class="col-md-4">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-file-alt"></i>

                                Document

                            </label>


                            <div class="futureInput">

                                <span>

                                    @if(
                                        $value->pieces->first() &&
                                        $value->pieces->first()->fichier
                                    )

                                        Document enregistré

                                    @else

                                        Aucun document

                                    @endif

                                </span>

                            </div>

                        </div>

                    </div>


                </div>


                {{-- =================================================
                     SÉCURITÉ
                ================================================== --}}

                <div class="mt-4">

                    <p>

                        <i class="fa fa-shield-halved"></i>

                        Le mot de passe actuel sera conservé
                        si aucun nouveau mot de passe n'est renseigné.

                    </p>

                </div>


                {{-- =================================================
                     MESSAGE FINAL
                ================================================== --}}

                <div class="mt-2">

                    <p>

                        <i class="fa fa-info-circle"></i>

                        Vérifiez les informations saisies dans
                        les étapes précédentes, puis cliquez sur
                        <strong>« Valider »</strong> pour enregistrer
                        les modifications.

                    </p>

                </div>

            </div>

        </div>

    </section>

</div>

{{-- =========================================================
     STEP 5 FIN
========================================================= --}}
