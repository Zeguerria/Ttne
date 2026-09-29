
{{-- STEEP 3 DEBUT --}}

<section class="steep-3">

    <div class="steep-03">

        <div class="container-fluid">

            <div class="row g-4 p-2">

                {{-- NOMBRE MAXIMUM DE PARTICIPANTS --}}
                <div class="col-md-6">

                    <div class="futureField">

                        <label>
                            <i class="fa fa-users"></i>
                            Nombre maximum de participants
                        </label>

                        <div class="futureInput">

                            <i class="fa fa-users inputIcon"></i>

                            <input
                                type="number"
                                name="nombre_participants_max"
                                class="form-control"
                                placeholder="Ex : 20"
                                value="{{ old('nombre_participants_max') }}"
                                min="1"
                                step="1"
                                required
                                data-review="nombre_participants_max"
                            >

                        </div>

                    </div>

                </div>


                {{-- PÉRIODICITÉ --}}
                <div class="col-md-6">

                    <div class="futureField">

                        <label>
                            <i class="fa fa-calendar"></i>
                            Périodicité
                        </label>

                        <div class="futureInput">

                            <i class="fa fa-user-check inputIcon"></i>

                            <select name="periodicite_id"   class="futureSelect" required data-review="periodicite_id">

                                <option value="">
                                    Sélectionner une périodicité
                                </option>

                                @foreach($periodicites ?? [] as $periodicite)

                                    <option
                                        value="{{ $periodicite->id }}"
                                        {{ old('periodicite_id') == $periodicite->id ? 'selected' : '' }}
                                    >
                                        {{ $periodicite->nom }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>


                {{-- MODE DE DISTRIBUTION --}}
                <div class="col-md-6">

                    <div class="futureField">

                        <label>
                            <i class="fa fa-random"></i>
                            Mode de distribution
                        </label>

                        <div class="futureInput">

                            <i class="fa fa-random inputIcon"></i>

                            <select
                                name="mode_distribution_id"
                                class="futureSelect"
                                required
                                data-review="mode_distribution_id"
                            >

                                <option value="">
                                    Sélectionner un mode
                                </option>

                                @foreach($modesDistribution ?? [] as $modeDistribution)

                                    <option
                                        value="{{ $modeDistribution->id }}"
                                        {{ old('mode_distribution_id') == $modeDistribution->id ? 'selected' : '' }}
                                    >
                                        {{ $modeDistribution->libelle }}
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
                            <i class="fa fa-user-check"></i>
                            Validation des membres
                        </label>

                        <div class="futureInput">

                            <i class="fa fa-user-check inputIcon"></i>

                            <select
                                name="validation_membre_id"
                                class="futureSelect"
                                required
                                data-review="validation_membre_id"
                            >

                                <option value="">
                                    Sélectionner le mode de validation
                                </option>

                                @foreach($validationsMembre ?? [] as $validationMembre)

                                    <option
                                        value="{{ $validationMembre->id }}"
                                        {{ old('validation_membre_id') == $validationMembre->id ? 'selected' : '' }}
                                    >
                                        {{ $validationMembre->libelle }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- STEEP 3 FIN --}}

