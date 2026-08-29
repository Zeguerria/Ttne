{{-- =========================================================
     STEP 2
     CONTACT
========================================================= --}}

<section class="steep-2">

    <div class="steep-02">

        <div class="container-fluid">

            <div class="row g-4 p-2">


                {{-- =================================================
                     TÉLÉPHONE
                ================================================== --}}

                <div class="col-md-6">

                    <div class="futureField">

                        <label>

                            <i class="fa fa-phone"></i>

                            Téléphone

                        </label>


                        <div class="futureInput">

                            <i class="fa fa-phone inputIcon"></i>

                            <input
                                type="text"
                                name="telephone"
                                class="form-control"
                                value="{{ $value->telephone ?? '' }}"
                                placeholder="+241 XX XX XX XX"
                                required
                            >

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     EMAIL
                ================================================== --}}

                <div class="col-md-6">

                    <div class="futureField">

                        <label>

                            <i class="fa fa-envelope"></i>

                            Email

                        </label>


                        <div class="futureInput">

                            <i class="fa fa-envelope inputIcon"></i>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ $value->email ?? '' }}"
                                placeholder="email@gmail.com"
                                required
                            >

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     PHOTO DE PROFIL
                ================================================== --}}

                <div class="col-md-12 inter-input">

                    <div class="futureField">

                        <label>

                            <i class="fa fa-camera"></i>

                            Photo de profil

                        </label>


                        <div class="futureFile">


                            {{-- =================================================
                                 INPUT FICHIER
                            ================================================== --}}

                            <input
                                type="file"
                                name="photo"
                                class="futureFileInput"
                                accept="image/png,image/jpeg,image/jpg,image/webp"
                            >


                            <div class="futureFileBox">


                                {{-- =================================================
                                     PHOTO EXISTANTE
                                ================================================== --}}

                                @if($value->photo)

                                    <div
                                        style="
                                            width:120px;
                                            height:120px;
                                            border-radius:50%;
                                            overflow:hidden;
                                            border:2px solid rgba(0,200,255,.35);
                                            box-shadow:0 0 25px rgba(0,200,255,.15);
                                            margin-bottom:15px;
                                        "
                                    >

                                        <img
                                            src="{{ asset('storage/' . $value->photo) }}"
                                            alt="{{ $value->prenom }} {{ $value->name }}"
                                            style="
                                                width:100%;
                                                height:100%;
                                                object-fit:cover;
                                            "
                                        >

                                    </div>


                                    <div class="futureFileTitle">

                                        Photo actuelle

                                    </div>


                                    <p class="futureFileSubTitle">

                                        Sélectionnez une nouvelle photo
                                        pour remplacer celle-ci.

                                    </p>


                                @else

                                    {{-- =================================================
                                         AUCUNE PHOTO
                                    ================================================== --}}

                                    <div class="futureFileIcon">

                                        <i class="fa fa-user"></i>

                                    </div>


                                    <div class="futureFileTitle">

                                        Aucune photo actuelle

                                    </div>


                                    <p class="futureFileSubTitle">

                                        Sélectionner une photo de profil

                                    </p>

                                @endif


                                {{-- =================================================
                                     NOM DU NOUVEAU FICHIER
                                ================================================== --}}

                                <div class="futureFileName"></div>


                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>

</section>

{{-- =========================================================
     STEP 2 FIN
========================================================= --}}
