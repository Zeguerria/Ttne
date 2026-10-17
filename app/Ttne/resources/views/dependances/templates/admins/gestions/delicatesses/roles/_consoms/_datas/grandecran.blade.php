{{-- =========================================================
GRAND ECRAN - GROUPES
========================================================= --}}

<section class="grand-ecran">


<div class="grand-ecran">

    @forelse($periodicites as $key => $value)

        <tr
            class="futureRow"
            data-row="{{ $value->id }}"
        >

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
                 NOM DU GROUPE
            ================================================== --}}

            <td>

                <span
                    class="futureCode"
                    title="{{ $value->nom }}"
                >
                    {{ $value->nom }}
                </span>

            </td>


            {{-- =================================================
                 CRÉATEUR
            ================================================== --}}

            <td>

                @if($value->createur)

                    {{ $value->createur->name }}
                    {{ $value->createur->prenom }}

                @else

                    <span class="futureEmptyText">
                        Créateur non défini
                    </span>

                @endif

            </td>


            {{-- =================================================
                 COTISATION
            ================================================== --}}

            <td>

                @if($value->montant_cotisation !== null)

                    {{ number_format($value->montant_cotisation, 0, ',', ' ') }}

                @else

                    <span class="futureEmptyText">
                        Non définie
                    </span>

                @endif

            </td>


            {{-- =================================================
                 PARTICIPANTS
            ================================================== --}}

            <td>

                {{ $value->nombre_participants_max }}

            </td>


            {{-- =================================================
                 PÉRIODICITÉ
            ================================================== --}}

            <td>

                @if($value->periodicite)

                    {{ $value->periodicite->nom }}

                @else

                    <span class="futureEmptyText">
                        Non définie
                    </span>

                @endif

            </td>


            {{-- =================================================
                 STATUT
            ================================================== --}}

            <td>

                @if($value->statut)

                    {{ $value->statut->libelle }}

                @else

                    <span class="futureEmptyText">
                        Statut non défini
                    </span>

                @endif

            </td>


            {{-- =================================================
                 ACTIONS GROUPE
            ================================================== --}}

            <td>

                <div class="futureActions">

                    {{-- ==========================================
                         CONSULTER
                    =========================================== --}}

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


                    {{-- ==========================================
                         MODIFIER
                    =========================================== --}}

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


                    {{-- ==========================================
                         SUPPRIMER
                    =========================================== --}}

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

            <td colspan="8">

                <div class="futureEmpty">

                    <i class="fa fa-users mb-3"></i>

                    <h5>
                        Aucun groupe trouvé
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
