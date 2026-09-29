
{{-- =====================================================
    PETIT ECRAN DEBUT
====================================================== --}}

<section class="petit-cran">

    <div class="petit-ecran">

        @forelse($periodicites as $key => $value)

            <div
                class="futureMobileCard"
                data-row="{{ $value->id }}"
            >

                {{-- =====================================================
                     TOP
                ====================================================== --}}

                <div class="futureMobileTop">

                    {{-- NOM DU GROUPE --}}

                    <div class="d-flex align-items-center gap-3">

                        {{-- ICÔNE GROUPE --}}

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
                            <i class="fa fa-users"></i>
                        </div>

                        {{-- NOM + STATUT --}}

                        <div>

                            <h5
                                class="mb-1"
                                title="{{ $value->nom }}"
                            >
                                {{ $value->nom }}
                            </h5>

                            @if($value->statut)

                                <p class="mb-0">

                                    <span class="futureCode">
                                        {{ $value->statut->libelle }}
                                    </span>

                                </p>

                            @else

                                <p class="mb-0">

                                    <span class="futureEmptyText">
                                        Statut non défini
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

                    {{-- CRÉATEUR --}}

                    <div class="futureMobileItem">

                        <span>

                            <i class="fa fa-user me-1"></i>

                            Créateur

                        </span>

                        @if($value->createur)

                            <strong>

                                {{ $value->createur->name }}
                                {{ $value->createur->prenom }}

                            </strong>

                        @else

                            <span class="futureEmptyText">
                                Non défini
                            </span>

                        @endif

                    </div>


                    {{-- COTISATION --}}

                    <div class="futureMobileItem">

                        <span>

                            <i class="fa fa-money me-1"></i>

                            Cotisation

                        </span>

                        @if($value->montant_cotisation !== null)

                            <strong>

                                {{ number_format($value->montant_cotisation, 0, ',', ' ') }}

                            </strong>

                        @else

                            <span class="futureEmptyText">
                                Non définie
                            </span>

                        @endif

                    </div>


                    {{-- PARTICIPANTS --}}

                    <div class="futureMobileItem">

                        <span>

                            <i class="fa fa-users me-1"></i>

                            Participants

                        </span>

                        <strong>

                            {{ $value->nombre_participants_max }}

                        </strong>

                    </div>


                    {{-- PÉRIODICITÉ --}}

                    <div class="futureMobileItem">

                        <span>

                            <i class="fa fa-calendar me-1"></i>

                            Périodicité

                        </span>

                        @if($value->periodicite)

                            <strong>

                                {{ $value->periodicite->nom }}

                            </strong>

                        @else

                            <span class="futureEmptyText">
                                Non définie
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
                    Aucun groupe trouvé
                </h5>

            </div>

        @endforelse

    </div>

</section>

{{-- =====================================================
    PETIT ECRAN FIN
====================================================== --}}

