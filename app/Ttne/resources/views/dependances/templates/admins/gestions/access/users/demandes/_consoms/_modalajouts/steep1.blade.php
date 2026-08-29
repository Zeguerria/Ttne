{{-- STEP 1 DEBUT --}}

<section class="steep-1">

    <div class="steep-01">

        <div class="container-fluid">

            <div class="row g-4 p-2">

                {{-- NOM --}}
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
                                placeholder="Entrer le nom"
                                required
                                data-review="name"
                            >

                        </div>

                    </div>

                </div>


                {{-- PRÉNOM --}}
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
                                placeholder="Entrer le prénom"
                                required
                            >

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="container-fluid">

            <div class="row inter-input">

                {{-- DATE DE NAISSANCE --}}
                <div class="col-md-12">

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
                            >

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- STEP 1 FIN --}}
