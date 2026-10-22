{{-- =========================================================
GRAND ECRAN - GROUPES
========================================================= --}}

<section class="grand-ecran">


<div class="grand-ecran">

   @forelse($roles as $key => $value)

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
            CODE
        ================================================== --}}

        <td>

            <span
                class="futureCode"
                title="{{ $value->code }}"
            >
                {{ $value->code }}
            </span>

        </td>


        {{-- =================================================
            NOM
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
            DESCRIPTION
        ================================================== --}}

        <td>

            @if($value->description)

                <span
                    title="{{ $value->description }}"
                >
                    {{ \Illuminate\Support\Str::limit($value->description, 50) }}
                </span>

            @else

                <span class="futureEmptyText">
                    Aucune description
                </span>

            @endif

        </td>


        {{-- =================================================
            ÉTAT
        ================================================== --}}

        <td>

            @if($value->active)

                <span class="futureStatus success">
                    Active
                </span>

            @else

                <span class="futureStatus danger">
                    Inactive
                </span>

            @endif

        </td>


        {{-- =================================================
            ACTIONS ROLE GROUPE
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

        <td colspan="7">

            <div class="futureEmpty">

                <i class="fa fa-users mb-3"></i>

                <h5>
                    Aucun rôle groupe trouvé
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
