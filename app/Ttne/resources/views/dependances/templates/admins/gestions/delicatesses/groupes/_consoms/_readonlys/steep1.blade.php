{{-- =========================================================
     STEP 1
     INFORMATIONS PERSONNELLES
========================================================= --}}

<div class="stepContent active" data-content="1">
    <section class="steep-1">
        <div class="steep-01">

            <div class="container-fluid">

                <div class="row g-4 p-2">


                    {{-- =================================================
                         NOM
                    ================================================== --}}

                    <div class="col-md-6">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-user"></i>

                                Nom

                            </label>


                            <div class="futureInput">

                                <i class="fa fa-user inputIcon"></i>

                                <input
                                    type="text"
                                    value="{{ $value->name ?? 'Non renseigné' }}"
                                    readonly
                                >

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         PRÉNOM
                    ================================================== --}}

                    <div class="col-md-6">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-user"></i>

                                Prénom

                            </label>


                            <div class="futureInput">

                                <i class="fa fa-user inputIcon"></i>

                                <input
                                    type="text"
                                    value="{{ $value->prenom ?? 'Non renseigné' }}"
                                    readonly
                                >

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 DATE + PROFIL
            ====================================================== --}}

            <div class="container-fluid">

                <div class="row inter-input">


                    {{-- =================================================
                         DATE DE NAISSANCE
                    ================================================== --}}

                    <div class="col-md-6">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-calendar"></i>

                                Date de naissance

                            </label>


                            <div class="futureInput">

                                <i class="fa fa-calendar inputIcon"></i>

                                <input
                                    type="text"
                                    value="{{
                                        $value->date_naissance
                                        ? \Carbon\Carbon::parse($value->date_naissance)->format('d/m/Y')
                                        : 'Non renseignée'
                                    }}"
                                    readonly
                                >

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         PROFIL
                    ================================================== --}}

                    <div class="col-md-6">

                        <div class="futureField">

                            <label>
                                <i class="fa fa-group"></i>
                                Profil
                            </label>

                            <div class="futureInput">

                                <i class="fa fa-toolbox inputIcon"></i>

                                <select
                                    class="futureSelect"
                                    disabled
                                >

                                    <option value="">
                                        Sélectionner un profil
                                    </option>

                                    @foreach($profils ?? [] as $profil)

                                        <option
                                            value="{{ $profil->id }}"

                                            @if(isset($value->profil_id) && $value->profil_id == $profil->id)
                                                selected
                                            @endif
                                        >

                                            {{ $profil->libelle }}

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

</div>
