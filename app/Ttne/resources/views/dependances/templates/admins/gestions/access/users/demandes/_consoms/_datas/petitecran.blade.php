{{-- PEIT ECRAN DEBUT --}}
    <section class="petit-cran">
        <div class="petit-ecran">
            @forelse($users as $key => $value)

    @php
        $piece = $value->pieces->first();
    @endphp

    <div
        class="futureMobileCard"
        data-row="{{ $value->id }}"
    >

        {{-- =====================================================
             TOP
        ====================================================== --}}

        <div class="futureMobileTop">

            {{-- IDENTITÉ --}}
            <div class="d-flex align-items-center gap-3">

                {{-- PHOTO --}}
                @if($value->photo)

                    <img
                        src="{{ asset('storage/' . $value->photo) }}"
                        alt="{{ $value->prenom }} {{ $value->name }}"
                        title="{{ $value->prenom }} {{ $value->name }}"
                        style="
                            width:48px;
                            height:48px;
                            object-fit:cover;
                            border-radius:50%;
                            flex-shrink:0;
                        "
                    >

                @else

                    <div
                        class="d-flex justify-content-center align-items-center"
                        style="
                            width:48px;
                            height:48px;
                            border-radius:50%;
                            background:rgba(255,255,255,.08);
                            flex-shrink:0;
                        "
                    >
                        <i class="fa fa-user"></i>
                    </div>

                @endif


                {{-- NOM + PROFIL --}}
                <div>

                    <h5 class="mb-1">
                        {{ $value->prenom }} {{ $value->name }}
                    </h5>

                    @if($value->profil)

                        <p class="mb-0">
                            <span class="futureCode">
                                {{ $value->profil->libelle }}
                            </span>
                        </p>

                    @else

                        <p class="mb-0">
                            <span class="futureEmptyText">
                                Profil non défini
                            </span>
                        </p>

                    @endif

                </div>

            </div>


            {{-- CHECKBOX --}}
            <input
                type="checkbox"
                class="futureCheckbox futureMobileCheckbox"
                data-row="{{ $value->id }}"
            >

        </div>


        {{-- =====================================================
             BODY
        ====================================================== --}}

        <div class="futureMobileBody">

            {{-- TÉLÉPHONE --}}
            @if($value->telephone)

                <div class="futureMobileItem">

                    <span>
                        <i class="fa fa-phone me-1"></i>
                        Téléphone
                    </span>

                    <strong>
                        {{ $value->telephone }}
                    </strong>

                </div>

            @endif


            {{-- EMAIL --}}
            @if($value->email)

                <div class="futureMobileItem">

                    <span>
                        <i class="fa fa-envelope me-1"></i>
                        Email
                    </span>

                    <strong
                        style="
                            max-width:65%;
                            overflow:hidden;
                            text-overflow:ellipsis;
                            white-space:nowrap;
                        "
                        title="{{ $value->email }}"
                    >
                        {{ $value->email }}
                    </strong>

                </div>

            @endif


            {{-- PIÈCE D'IDENTITÉ --}}
            <div class="futureMobileItem">

                <span>
                    <i class="fa fa-id-card me-1"></i>
                    Pièce
                </span>

                @if($piece)

                    <button
                        type="button"
                        class="futureMiniBtn infoBtn"
                        data-toggle="modal"
                        data-target="#piece{{ $piece->id }}"
                        title="Consulter la pièce"
                        style="
                            display:inline-flex;
                            align-items:center;
                            justify-content:center;
                            gap:6px;
                            width:auto;
                            min-width:max-content;
                            min-height:30px;
                            padding:5px 10px;
                            white-space:nowrap;
                            border:1px solid rgba(0,200,255,.35);
                            border-radius:6px;
                            background:rgba(0,200,255,.12);
                            color:#00c8ff;
                        "
                    >
                        <i class="fa fa-id-card"></i>

                        <span>
                            {{ $piece->typePiece->libelle ?? 'Pièce' }}
                        </span>
                    </button>

                @else

                    <span class="futureEmptyText">
                        Aucune pièce
                    </span>

                @endif

            </div>

        </div>


        {{-- =====================================================
             MOBILE ACTIONS
        ====================================================== --}}

        <div class="futureMobileActions">

            {{-- CONSULTER --}}
            <button
                class="futureMiniBtn infoBtn"
                data-bs-toggle="tooltip"
                data-placement="bottom"
                data-toggle="modal"
                data-target="#consulter{{ $value->id }}"
                title="Consulter"
                type="button"
            >
                <i class="fa fa-eye"></i>
            </button>


            {{-- MODIFIER --}}
            <button
                class="futureMiniBtn warningBtn"
                data-bs-toggle="tooltip"
                data-placement="bottom"
                data-toggle="modal"
                data-target="#modifier{{ $value->id }}"
                title="Modifier"
                type="button"
            >
                <i class="fa fa-edit"></i>
            </button>
            <button
                class="futureMiniBtn infoBtn"
                data-bs-toggle="tooltip"
                            data-placement="bottom"
                            data-toggle="modal"
                            data-target="#examiner{{ $value->id }}"
                     title="Examiner"type="button">
                <i class="fa fa-shield"></i>
                            {{-- <i class="fa fa-choice"></i> --}}

            </button>


            {{-- SUPPRIMER --}}
            <button
                class="futureMiniBtn dangerBtn"
                data-bs-toggle="tooltip"
                data-placement="bottom"
                data-toggle="modal"
                data-target="#corbeille{{ $value->id }}"
                title="Supprimer"
                type="button"
            >
                <i class="fa fa-trash"></i>
            </button>

        </div>

    </div>

@empty

    <div class="futureEmpty">

        <i class="fa fa-users mb-3"></i>

        <h5>
            Aucun personnel trouvé
        </h5>

    </div>

@endforelse
        </div>
    </section>
{{-- PETIT ECRAN FIN --}}
