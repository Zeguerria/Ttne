{{-- =========================================================
     STEP 2
     CONTACT
========================================================= --}}

<div class="stepContent" data-content="2">

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
                                    value="{{ $value->telephone ?? 'Aucun téléphone' }}"
                                    readonly
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
                                    value="{{ $value->email ?? 'Aucun email' }}"
                                    readonly
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

                                <div
                                    class="futureFileBox"
                                    style="
                                        cursor: default;
                                        min-height: 220px;
                                        display: flex;
                                        flex-direction: column;
                                        align-items: center;
                                        justify-content: center;
                                    "
                                >

                                    @if($value->photo)

                                        {{-- =================================================
                                             PHOTO EXISTANTE
                                        ================================================== --}}

                                        <div
                                            style="
                                                width: 120px;
                                                height: 120px;
                                                border-radius: 50%;
                                                overflow: hidden;
                                                border: 2px solid rgba(0,200,255,.35);
                                                box-shadow: 0 0 25px rgba(0,200,255,.15);
                                                margin-bottom: 15px;
                                            "
                                        >

                                            <img
                                                src="{{ asset('storage/' . $value->photo) }}"
                                                alt="{{ $value->prenom }} {{ $value->name }}"
                                                style="
                                                    width: 100%;
                                                    height: 100%;
                                                    object-fit: cover;
                                                "
                                            >

                                        </div>


                                        <div class="futureFileTitle">

                                            {{ $value->prenom }}
                                            {{ $value->name }}

                                        </div>


                                        <p class="futureFileSubTitle">

                                            Photo de profil

                                        </p>

                                    @else

                                        {{-- =================================================
                                             AUCUNE PHOTO
                                        ================================================== --}}

                                        <div class="futureFileIcon">

                                            <i class="fa fa-user"></i>

                                        </div>


                                        <div class="futureFileTitle">

                                            Aucune photo

                                        </div>


                                        <p class="futureFileSubTitle">

                                            Cet utilisateur ne possède pas de photo de profil.

                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

</div>
