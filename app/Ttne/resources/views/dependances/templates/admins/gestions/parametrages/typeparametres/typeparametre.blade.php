@extends('dependances.templates.admins.navigations.menus.menu')
@section('titre')
    Types de Paramètre
@endsection
@section('header')

{{--  --}}
@endsection
@section('corps')
    <section class="">
        <div class="modals">
            @include('dependances.templates.admins.gestions.parametrages.typeparametres._consoms.modal')
        </div>
    </section>
    <section class="">
        <div class="head-ent">
            @include('dependances.templates.admins.gestions.parametrages.typeparametres._consoms.head')
        </div>
    </section>
    <div>
        <div>
            <div>

                <div class="futureTableWrapper" data-bulk-delete-url="{{ url('select/corbeille/typeparametre') }}">

                    <div class="futureTableCard">

                        {{-- =========================================
                        HEADER
                        ========================================= --}}
                        <div class="futureTableHeader">

                            {{-- =========================================
                            LEFT
                            ========================================= --}}
                            <div class="futureTableLeft">

                                {{-- ADD --}}
                                <button
                                    class="futureBtn primaryBtn"
                                    data-toggle="modal"
                                    data-target="#Ajouter"
                                    title="Ajouter"
                                    type="button"
                                >

                                    <i class="fa fa-plus"></i>

                                    <span>

                                        Ajouter

                                    </span>

                                </button>



                                {{-- EXPORT GROUP --}}
                                <div class="futureExportGroup">

                                    {{-- EXPORT EXCEL --}}
                                    <button
                                        class="futureBtn successBtn"
                                        id="exportExcel"
                                        type="button"
                                    >

                                        <i class="fa fa-file-excel"></i>

                                        <span>

                                            Excel

                                        </span>

                                    </button>



                                    {{-- EXPORT PDF --}}
                                    <button
                                        class="futureBtn dangerBtn"
                                        id="exportPDF"
                                        type="button"
                                    >

                                        <i class="fa fa-file-pdf"></i>

                                        <span>

                                            PDF

                                        </span>

                                    </button>



                                    {{-- EXPORT XML --}}
                                    <button
                                        class="futureBtn warningBtn"
                                        id="exportXML"
                                        type="button"
                                    >

                                        <i class="fa fa-code"></i>

                                        <span>

                                            XML

                                        </span>

                                    </button>



                                    {{-- EXPORT CSV --}}
                                    <button
                                        class="futureBtn infoBtn"
                                        id="exportCSV"
                                        type="button"
                                    >

                                        <i class="fa fa-file-csv"></i>

                                        <span>

                                            CSV

                                        </span>

                                    </button>

                                </div>



                                {{-- FILTER --}}
                                <button
                                    class="futureBtn warningBtn"
                                    id="futureFilterBtn"
                                    type="button"
                                >

                                    <i class="fa fa-filter"></i>

                                    <span>

                                        Filtrer

                                    </span>

                                </button>

                            </div>



                            {{-- =========================================
                            RIGHT
                            ========================================= --}}
                            <div class="futureTableRight">

                                {{-- =========================================
                                STATS
                                ========================================= --}}
                                <div class="futureTableStats">

                                    {{-- TOTAL --}}
                                    <div
                                        class="futureStatCard primary"
                                        data-bs-toggle="tooltip"
                                        title="Total des éléments"
                                    >

                                        <i class="fa fa-database"></i>

                                        <div>

                                            <span class="futureStatValue">

                                                {{ $TypeParametreT ?? 0 }}

                                            </span>

                                            <small>

                                                Total

                                            </small>

                                        </div>

                                    </div>



                                    {{-- TRASH --}}
                                    <div
                                        class="futureStatCard danger"
                                        data-bs-toggle="tooltip"
                                        title="Éléments dans la corbeille"
                                    >

                                        <i class="fa fa-trash"></i>

                                        <div>

                                            <span class="futureStatValue">

                                                {{ $TypeParametreTC ?? 0 }}

                                            </span>

                                            <small>

                                                Corbeille

                                            </small>

                                        </div>

                                    </div>



                                    {{-- GLOBAL ACTIONS --}}
                                    <div class="futureGlobalActions">

                                        <button
                                            class="futureBtn darkBtn"
                                            id="futureGlobalActionBtn"
                                            type="button"
                                        >

                                            <i class="fa fa-ellipsis-v"></i>

                                        </button>



                                        {{-- DROPDOWN --}}
                                        <div class="futureGlobalDropdown">

                                            {{-- DELETE ALL --}}
                                            <button class="futureDropdownItem" id="futureDeleteAllBtn" type="button" >
                                                <i class="fa fa-trash"></i>
                                                Tout supprimer
                                            </button>
                                            {{-- RESTORE ALL --}}
                                            {{-- <button
                                                class="futureDropdownItem"
                                                id="futureRestoreAllBtn"
                                                type="button"
                                            >

                                                <i class="fa fa-undo"></i>

                                                Tout restaurer

                                            </button> --}}



                                            {{-- FORCE DELETE --}}
                                            {{-- <button
                                                class="futureDropdownItem"
                                                id="futureForceDeleteBtn"
                                                type="button"
                                            >

                                                <i class="fa fa-times-circle"></i>

                                                Vider définitivement

                                            </button> --}}

                                        </div>

                                    </div>

                                </div>



                                {{-- SEARCH --}}
                                <div class="futureSearchBox">

                                    <i class="fa fa-search"></i>

                                    <input
                                        type="text"
                                        id="futureSearch"
                                        data-search="future"
                                        placeholder="Rechercher..."
                                    >

                                </div>

                            </div>

                        </div>



                        {{-- =========================================
                        TABLE
                        ========================================= --}}
                        <div class="futureTableResponsive">

                            <table
                                class="futureTable"
                                data-table="future"
                            >

                                {{-- TABLE HEAD --}}
                                <thead>

                                    <tr>

                                        {{-- CHECKBOX --}}
                                        <th
                                            width="50"
                                            data-export="false"
                                            data-sort="false"
                                        >

                                            <input
                                                type="checkbox"
                                                id="selectAll"
                                                class="futureCheckbox"
                                                data-select-all="future"
                                            >

                                        </th>



                                        {{-- INDEX --}}
                                        <th>

                                            #

                                        </th>



                                        {{-- CODE --}}
                                        <th>

                                            CODE

                                        </th>



                                        {{-- LIBELLE --}}
                                        <th>

                                            LIBELLÉ

                                        </th>



                                        {{-- DESCRIPTION --}}
                                        <th>

                                            DESCRIPTION

                                        </th>



                                        {{-- ACTIONS --}}
                                        <th
                                            width="170"
                                            data-export="false"
                                            data-sort="false"
                                        >

                                            ACTIONS

                                        </th>

                                    </tr>

                                </thead>



                                {{-- TABLE BODY --}}
                                <tbody id="futureTableBody">

                                    @forelse($typeparametres as $key => $value)

                                    <tr
                                        class="futureRow"
                                        data-row="{{ $value->id }}"
                                    >

                                        {{-- CHECKBOX --}}
                                        <td>

                                            <input
                                                type="checkbox"
                                                class="futureCheckbox rowCheckbox"
                                                data-row="{{ $value->id }}"
                                            >

                                        </td>



                                        {{-- INDEX --}}
                                        <td>

                                            {{ $key + 1 }}

                                        </td>



                                        {{-- CODE --}}
                                        <td>

                                            <span class="futureCode">

                                                {{ $value->code }}

                                            </span>

                                        </td>



                                        {{-- LIBELLE --}}
                                        <td>

                                            {{ $value->libelle }}

                                        </td>



                                        {{-- DESCRIPTION --}}
                                        <td>

                                            @if($value->description)

                                                {{ $value->description }}

                                            @else

                                                <span class="futureEmptyText">

                                                    Aucune observation

                                                </span>

                                            @endif

                                        </td>



                                        {{-- ACTIONS --}}
                                        <td>

                                            <div class="futureActions">

                                                {{-- CONSULTER --}}
                                                <button
                                                    class="futureMiniBtn infoBtn"
                                                    data-bs-toggle="tooltip"
                                                    data-placement="bottom"
                                                    data-toggle="modal"
                                                    data-target="#consulter{{$value->id}}"
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
                                                    data-target="#modifier{{$value->id}}"
                                                    title="Modifier"
                                                    type="button"
                                                >

                                                    <i class="fa fa-edit"></i>

                                                </button>



                                                {{-- DELETE --}}
                                                <button
                                                    class="futureMiniBtn dangerBtn"
                                                    data-bs-toggle="tooltip"
                                                    data-placement="bottom"
                                                    data-toggle="modal"
                                                    data-target="#corbeille{{$value->id}}"
                                                    title="Supprimer"
                                                    type="button"
                                                >

                                                    <i class="fa fa-trash"></i>

                                                </button>

                                            </div>

                                        </td>

                                    </tr>

                                    @empty

                                    {{-- EMPTY --}}
                                    <tr>

                                        <td colspan="6">

                                            <div class="futureEmpty">

                                                <i class="fa fa-database mb-3"></i>

                                                <h5>

                                                    Aucune donnée trouvée

                                                </h5>

                                            </div>

                                        </td>

                                    </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>



                        {{-- =========================================
                        MOBILE CARDS
                        ========================================= --}}
                        <div class="futureMobileCards">

                            @foreach($typeparametres as $key => $value)

                            <div
                                class="futureMobileCard"
                                data-row="{{ $value->id }}"
                            >

                                {{-- TOP --}}
                                <div class="futureMobileTop">

                                    <div>

                                        <h5>

                                            {{ $value->code }}

                                        </h5>

                                        <p>

                                            {{ $value->libelle }}

                                        </p>

                                    </div>



                                    <input
                                        type="checkbox"
                                        class="futureCheckbox futureMobileCheckbox"
                                        data-row="{{ $value->id }}"
                                    >

                                </div>



                                {{-- BODY --}}
                                <div class="futureMobileBody">

                                    <div class="futureMobileItem">

                                        <span>

                                            #

                                        </span>

                                        <strong>

                                            {{ $key + 1 }}

                                        </strong>

                                    </div>



                                    <div class="futureMobileItem">

                                        <span>

                                            Code

                                        </span>

                                        <strong>

                                            {{ $value->code }}

                                        </strong>

                                    </div>



                                    <div class="futureMobileItem">

                                        <span>

                                            Libellé

                                        </span>

                                        <strong>

                                            {{ $value->libelle }}

                                        </strong>

                                    </div>



                                    <div class="futureMobileItem">

                                        <span>

                                            Description

                                        </span>

                                        <strong>

                                            {{ $value->description ?? 'Aucune description' }}

                                        </strong>

                                    </div>

                                </div>



                                {{-- MOBILE ACTIONS --}}
                                <div class="futureMobileActions">

                                    {{-- CONSULTER --}}
                                    <button
                                        class="futureMiniBtn infoBtn"
                                        data-bs-toggle="tooltip"
                                        data-placement="bottom"
                                        data-toggle="modal"
                                        data-target="#consulter{{$value->id}}"
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
                                        data-target="#modifier{{$value->id}}"
                                        title="Modifier"
                                        type="button"
                                    >

                                        <i class="fa fa-edit"></i>

                                    </button>



                                    {{-- CORBEILLE --}}
                                    <button
                                        class="futureMiniBtn dangerBtn"
                                        data-bs-toggle="tooltip"
                                        data-placement="bottom"
                                        data-toggle="modal"
                                        data-target="#corbeille{{$value->id}}"
                                        title="Supprimer"
                                        type="button"
                                    >

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </div>

                            </div>

                            @endforeach

                        </div>



                        {{-- =========================================
                        FOOTER
                        ========================================= --}}
                        <div class="futureTableFooter">

                            {{-- BULK ACTIONS --}}
                            <div class="futureSelectedActions">

                                {{-- DELETE --}}
                                <button
                                    class="futureBtn dangerBtn"
                                    id="bulkDeleteBtn"
                                    type="button"
                                >
                                    <i class="fa fa-trash"></i>
                                    <span>Supprimer la sélection</span>
                                </button>



                                {{-- EXPORT SELECTED --}}
                                <div class="futureExportSelectWrapper">

                                    <select
                                        class="futureSelect futureExportSelectedSelect"
                                        id="bulkExportSelect"
                                    >

                                        <option value="">
                                            Exporter la sélection...
                                        </option>

                                        <option value="excel">
                                            Excel
                                        </option>

                                        <option value="pdf">
                                            PDF
                                        </option>

                                        <option value="xml">
                                            XML
                                        </option>

                                        <option value="csv">
                                            CSV
                                        </option>

                                    </select>

                                </div>

                            </div>



                            {{-- PAGINATION --}}
                            <div class="futurePaginationWrapper">

                                {{-- LEFT --}}
                                <div class="futurePaginationLeft">

                                    <span>

                                        Afficher

                                    </span>



                                    <select
                                        id="rowsPerPage"
                                        class="futureSelect"
                                        data-per-page="future"
                                    >

                                        <option value="5">
                                            5
                                        </option>

                                        <option value="10" selected>
                                            10
                                        </option>

                                        <option value="20">
                                            20
                                        </option>

                                        <option value="50">
                                            50
                                        </option>

                                        <option value="100">
                                            100
                                        </option>

                                        <option value="all">
                                            Tout
                                        </option>

                                    </select>



                                    <span>

                                        éléments

                                    </span>

                                </div>



                                {{-- RIGHT --}}
                                <div
                                    class="futurePagination"
                                    id="pagination"
                                    data-pagination="future"
                                >

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
{{-- FIN --}}


@endsection
@section('footer')
    <div class="suprression-selection">
        @include('dependances.templates.admins.gestions.parametrages.typeparametres._consoms.mettreselectcorbeille')
    </div>
@endsection
