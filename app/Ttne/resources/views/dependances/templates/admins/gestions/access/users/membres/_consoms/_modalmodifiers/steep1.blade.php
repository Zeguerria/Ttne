{{-- =========================================================
     STEP 1
     INFORMATIONS PERSONNELLES
========================================================= --}}

<div class="stepContent active" data-content="1">

    <section class="steep-1">

        <div class="steep-01">


            {{-- =================================================
                 NOM + PRÉNOM
            ================================================== --}}

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
                                    name="name"
                                    class="form-control"
                                    value="{{ $value->name ?? '' }}"
                                    placeholder="Entrer le nom"
                                    required
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
                                    name="prenom"
                                    class="form-control"
                                    value="{{ $value->prenom ?? '' }}"
                                    placeholder="Entrer le prénom"
                                    required
                                >

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 DATE + PROFIL
            ================================================== --}}

            <div class="container-fluid">

                <div class="row inter-input">


                    {{-- =================================================
                         DATE DE NAISSANCE
                    ================================================== --}}

                    <div class="col-md12">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-calendar"></i>

                                Date de naissance

                            </label>


                            <div class="futureInput">

                                <i class="fa fa-calendar inputIcon"></i>

                                <input
                                    type="date"
                                    name="date_naissance"
                                    class="form-control"
                                    value="{{ $value->date_naissance ?? '' }}"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         PROFIL
                    ================================================== --}}

                    {{-- <div class="col-md-6">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-group"></i>

                                Profil

                            </label>


                            <div class="futureInput">

                                <i class="fa fa-toolbox inputIcon"></i>

                                <select
                                    name="profil_id"
                                    class="futureSelect"
                                    required
                                >

                                    <option value="">

                                        Sélectionner un profil

                                    </option>


                                    @foreach($profils ?? [] as $profil)

                                        <option
                                            value="{{ $profil->id }}"

                                            @if(
                                                isset($value->profil_id)
                                                &&
                                                $value->profil_id == $profil->id
                                            )

                                                selected

                                            @endif
                                        >

                                            {{ $profil->libelle }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div> --}}

                </div>

            </div>


        </div>

    </section>

</div>

{{-- =========================================================
     STEP 1 FIN
========================================================= --}}
