
{{-- ============================================================
    STEEP 2 DEBUT
============================================================ --}}

<section class="steep-2">

    <div class="steep-02">

        <div class="container-fluid">

            <div class="row g-4 p-2">

                {{-- ==================================================
                    MONTANT DE COTISATION
                =================================================== --}}

                <div class="col-md-6">

                    <div class="futureField">

                        <label>
                            <i class="fa fa-money"></i>
                            Montant de cotisation
                        </label>

                        <div class="futureInput">

                            <i class="fa fa-money inputIcon"></i>

                            <input
                                type="number"
                                name="montant_cotisation"
                                class="form-control"
                                placeholder="Ex : 10000"
                                value="{{ old('montant_cotisation', $value->montant_cotisation) }}"
                                min="0"
                                step="500"
                                required
                                data-review="montant_cotisation"
                            >

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                    PÉNALITÉ
                =================================================== --}}

                <div class="col-md-6">

                    <div class="futureField">

                        <label>
                            <i class="fa fa-percent"></i>
                            Pénalité
                        </label>

                        <div class="futureInput">

                            <i class="fa fa-percent inputIcon"></i>

                            <input
                                type="number"
                                name="penalite_pourcentage"
                                class="form-control"
                                placeholder="Ex : 5"
                                value="{{ old('penalite_pourcentage', $value->penalite_pourcentage) }}"
                                min="0"
                                step="1"
                                data-review="penalite_pourcentage"
                            >

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                    FONDS D'ASSURANCE
                =================================================== --}}

                <div class="col-md-6">

                    <div class="futureField">

                        <label>
                            <i class="fa fa-shield"></i>
                            Fonds d'assurance
                        </label>

                        <div class="futureInput">

                            <i class="fa fa-shield inputIcon"></i>

                            <input
                                type="number"
                                name="fonds_assurance_pourcentage"
                                class="form-control"
                                placeholder="Ex : 2"
                                value="{{ old('fonds_assurance_pourcentage', $value->fonds_assurance_pourcentage) }}"
                                min="0"
                                step="1"
                                data-review="fonds_assurance_pourcentage"
                            >

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                    DÉLAI DE GRÂCE
                =================================================== --}}

                <div class="col-md-6">

                    <div class="futureField">

                        <label>
                            <i class="fa fa-clock-o"></i>
                            Délai de grâce
                        </label>

                        <div class="futureInput">

                            <i class="fa fa-clock-o inputIcon"></i>

                            <input
                                type="number"
                                name="delai_grace_heures"
                                class="form-control"
                                placeholder="Ex : 24"
                                value="{{ old('delai_grace_heures', $value->delai_grace_heures) }}"
                                min="0"
                                step="1"
                                data-review="delai_grace_heures"
                            >

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- ============================================================
    STEEP 2 FIN
============================================================ --}}

