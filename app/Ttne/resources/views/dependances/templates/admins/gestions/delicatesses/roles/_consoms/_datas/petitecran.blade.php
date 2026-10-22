{{-- =====================================================
    PETIT ECRAN DEBUT
====================================================== --}}

<section class="petit-cran">

    <div class="petit-ecran">

        @forelse($roles as $key => $value)

            <div
                class="futureMobileCard"
                data-row="{{ $value->id }}"
            >

                {{-- =====================================================
                    TOP
                ====================================================== --}}

                <div class="futureMobileTop">

                    {{-- CODE + NOM --}}

                    <div class="d-flex align-items-center gap-3">

                        {{-- ICÔNE ROLE GROUPE --}}

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

                            <i class="fa fa-users-cog"></i>

                        </div>


                        {{-- NOM + CODE --}}

                        <div>

                            <h5
                                class="mb-1"
                                title="{{ $value->nom }}"
                            >
                                {{ $value->nom }}
                            </h5>

                            <p class="mb-0">

                                <span class="futureCode">
                                    {{ $value->code }}
                                </span>

                            </p>

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

                    {{-- DESCRIPTION --}}

                    <div class="futureMobileItem">

                        <span>

                            <i class="fa fa-comment me-1"></i>

                            Description

                        </span>

                        @if($value->description)

                            <strong
                                title="{{ $value->description }}"
                            >
                                {{ \Illuminate\Support\Str::limit($value->description, 60) }}
                            </strong>

                        @else

                            <span class="futureEmptyText">
                                Aucune description
                            </span>

                        @endif

                    </div>


                    {{-- ÉTAT --}}

                    <div class="futureMobileItem">

                        <span>

                            <i class="fa fa-toggle-on me-1"></i>

                            État

                        </span>

                        @if($value->active)

                            <strong>
                                Active
                            </strong>

                        @else

                            <span class="futureEmptyText">
                                Inactive
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

                <i class="fa fa-users-cog mb-3"></i>

                <h5>
                    Aucun rôle groupe trouvé
                </h5>

            </div>

        @endforelse

    </div>

</section>

{{-- =====================================================
    PETIT ECRAN FIN
====================================================== --}}
