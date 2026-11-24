{{-- DEBUT --}}
<section class="steep-4">
    <div class="steep-04">

        <div class="container-fluid">
            <div class="row g-4 p-2">

                {{-- MODE DE DISTRIBUTION --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-random"></i>
                            Mode de distribution
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-exchange inputIcon"></i>

                            <select name="mode_distribution_id"
                                    class="futureSelect"
                                    required
                                    data-review="mode_distribution_id">

                                <option value="">
                                    Choisir un mode
                                </option>

                                @foreach($modesDistribution ?? [] as $mode)
                                    <option value="{{ $mode->id }}">
                                        {{ $mode->libelle }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                {{-- VALIDATION DES MEMBRES --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-user"></i>
                            Validation des membres
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-check-circle inputIcon"></i>

                            <select name="validation_membre_id"
                                    class="futureSelect"
                                    required
                                    data-review="validation_membre_id">

                                <option value="">
                                    Choisir une validation
                                </option>

                                @foreach($validationsMembre ?? [] as $validation)
                                    <option value="{{ $validation->id }}">
                                        {{ $validation->libelle }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                {{-- PENALITE --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-percent"></i>
                            Pénalité de retard
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-percent inputIcon"></i>

                            <input type="number"
                                   name="penalite_pourcentage"
                                   class="form-control"
                                   min="0"
                                   max="100"
                                   step="0.01"
                                   placeholder="Ex : 5"
                                   required
                                   data-review="penalite_pourcentage">
                        </div>
                    </div>
                </div>

                {{-- FONDS D'ASSURANCE --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-shield"></i>
                            Fonds d'assurance
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-percent inputIcon"></i>

                            <input type="number"
                                   name="fonds_assurance_pourcentage"
                                   class="form-control"
                                   min="0"
                                   max="100"
                                   step="0.01"
                                   placeholder="Ex : 2"
                                   required
                                   data-review="fonds_assurance_pourcentage">
                        </div>
                    </div>
                </div>

                {{-- DELAI DE GRACE --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-clock-o"></i>
                            Délai de grâce
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-hourglass-half inputIcon"></i>

                            <input type="number"
                                   name="delai_grace_heures"
                                   class="form-control"
                                   min="0"
                                   step="1"
                                   placeholder="Ex : 24"
                                   required
                                   data-review="delai_grace_heures">
                        </div>

                        <small class="text-muted">
                            Délai supplémentaire accordé avant l'application
                            d'une pénalité, exprimé en heures.
                        </small>
                    </div>
                </div>

                {{-- NOMBRE MAXIMAL DE PARTICIPANTS --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-users"></i>
                            Nombre maximal de participants
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-users inputIcon"></i>

                            <input type="number"
                                   name="nombre_participants_max"
                                   class="form-control"
                                   min="2"
                                   step="1"
                                   placeholder="Ex : 20"
                                   required
                                   data-review="nombre_participants_max">
                        </div>
                    </div>
                </div>

                {{-- INFORMATIONS --}}
                {{-- <div class="col-md-12">
                    <div class="futureFinal">
                        <i class="fa fa-cogs"></i>

                        <h3>Organisez le fonctionnement de votre groupe</h3>

                        <p>
                            Définissez les règles de distribution, les modalités
                            d'admission des membres et les paramètres financiers
                            qui encadreront les cotisations de votre communauté.
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>

    </div>
</section>
{{-- FIN --}}
