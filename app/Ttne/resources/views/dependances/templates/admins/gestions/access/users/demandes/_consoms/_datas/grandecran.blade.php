{{-- =========================================================
     GRAND ECRAN - UTILISATEURS
========================================================= --}}

<section class="grand-ecran">

    <div class="grand-ecran">

        @forelse($users as $key => $value)

            @php
                $piece = $value->pieces->first();
            @endphp

            <tr
                class="futureRow" data-row="{{ $value->id }}" >

                {{-- =================================================
                     CHECKBOX
                ================================================== --}}
                <td>

                    <input
                        type="checkbox"
                        class="futureCheckbox rowCheckbox"
                        data-row="{{ $value->id }}"
                    >

                </td>


                {{-- =================================================
                     INDEX
                ================================================== --}}
                <td>

                    {{ $key + 1 }}

                </td>


                {{-- =================================================
                     PHOTO
                ================================================== --}}
                <td>

                    <div class="d-flex justify-content-center align-items-center">

                        @if($value->photo)

                            <img
                                src="{{ asset('storage/' . $value->photo) }}"
                                alt="{{ $value->prenom }} {{ $value->name }}"
                                title="{{ $value->prenom }} {{ $value->name }}"
                                style="
                                    width:45px;
                                    height:45px;
                                    object-fit:cover;
                                    border-radius:50%;
                                "
                            >

                        @else

                            <div
                                class="d-flex justify-content-center align-items-center"
                                style="
                                    width:45px;
                                    height:45px;
                                    border-radius:50%;
                                    background:rgba(255,255,255,.08);
                                "
                            >

                                <i class="fa fa-user"></i>

                            </div>

                        @endif

                    </div>

                </td>


                {{-- =================================================
                     NOM + PRÉNOM
                ================================================== --}}
                <td>

                    <span class="futureCode">
                        {{ $value->name }}

                        {{ $value->prenom }}


                    </span>

                </td>


                {{-- =================================================
                     PROFIL
                ================================================== --}}
                <td>

                    @if($value->profil)

                        {{ $value->profil->libelle }}

                    @else

                        <span class="futureEmptyText">
                            Profil non défini
                        </span>

                    @endif

                </td>


                {{-- =================================================
                     EMAIL
                ================================================== --}}
                <td>

                    @if($value->email)

                        <span title="{{ $value->email }}">

                            {{ $value->email }}

                        </span>

                    @else

                        <span class="futureEmptyText">
                            Aucun email
                        </span>

                    @endif

                </td>


                {{-- =================================================
                     TÉLÉPHONE
                ================================================== --}}
                <td>

                    @if($value->telephone)

                        {{ $value->telephone }}

                    @else

                        <span class="futureEmptyText">
                            Aucun téléphone
                        </span>

                    @endif

                </td>


                {{-- =================================================
                     PIÈCE D'IDENTITÉ
                ================================================== --}}
                <td>

                    @if($piece)

                        <button
                            type="button"
                            class="futureMiniBtn infoBtn"
                            data-toggle="modal"
                            data-target="#piece{{ $piece->id }}"
                            title="Consulter la pièce"
                            style="
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                gap: 7px;

                                width: auto;
                                min-width: max-content;
                                max-width: 100%;

                                height: auto;
                                min-height: 32px;

                                padding: 6px 12px;

                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;

                                border: 1px solid rgba(0, 200, 255, .35);
                                border-radius: 6px;

                                background: rgba(0, 200, 255, .12);
                                color: #00c8ff;

                                cursor: pointer;
                            "
                        >

                            <i
                                class="fa fa-id-card"
                                style="
                                    flex-shrink: 0;
                                "
                            ></i>

                            <span
                                style="
                                    display: block;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;
                                "
                            >

                                {{ $piece->typePiece->libelle ?? 'Pièce' }}

                            </span>

                        </button>

                    @else

                        <span class="futureEmptyText">

                            Aucune pièce

                        </span>

                    @endif

                </td>


                {{-- =================================================
                     ACTIONS UTILISATEUR
                ================================================== --}}
                <td>

                    <div class="futureActions">

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
                            title="Examiner"
                            type="button">
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

                </td>

            </tr>


        @empty

            {{-- =================================================
                 AUCUNE DONNÉE
            ================================================== --}}

            <tr>

                <td colspan="9">

                    <div class="futureEmpty">

                        <i class="fa fa-users mb-3"></i>

                        <h5>
                            Aucun utilisateur trouvé
                        </h5>

                    </div>

                </td>

            </tr>

        @endforelse

    </div>

</section>


{{-- =========================================================
     GRAND ECRAN FIN
========================================================= --}}
