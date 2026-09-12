
@extends('dependances.templates.admins.navigations.menus.menu')

@section('titre')
    Demandes
@endsection

@section('header')

    {{--  --}}

@endsection

@section('corps')

    <section class="">
        <div class="modals">

            @include(
                'dependances.templates.admins.gestions.access.users.demandes._consoms.modal'
            )

        </div>
    </section>


    <section class="">

        <div class="head-ent">

            @include(
                'dependances.templates.admins.gestions.access.users.demandes._consoms.headrejets'
            )

        </div>

    </section>


    <div>

        <div>

            <div>

                <div
                    class="futureTableWrapper"
                    data-bulk-delete-url="{{ url('select/corbeille/rejets') }}">

                    <div class="futureTableCard">


                        {{-- =========================================
                            HEADER
                        ========================================= --}}

                        <div class="futureTableHeader">


                            {{-- =========================================
                                LEFT
                            ========================================= --}}

                            <div class="futureTableLeft">
                                 {{-- <button
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

                                </button> --}}


                                {{-- =========================================
                                    EXPORT GROUP
                                ========================================= --}}

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
                                        type="button">

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
                                        title="Total des demandes en attente"
                                    >

                                        <i class="fa fa-database"></i>

                                        <div>

                                            <span class="futureStatValue">

                                                {{ $UserT ?? 0 }}

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
                                        title="Demandes dans la corbeille"
                                    >

                                        <i class="fa fa-trash"></i>

                                        <div>

                                            <span class="futureStatValue">

                                                {{ $UserTC ?? 0 }}

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

                                            <button
                                                class="futureDropdownItem"
                                                id="futureDeleteAllBtn"
                                                type="button"
                                            >

                                                <i class="fa fa-trash"></i>

                                                Tout supprimer

                                            </button>


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


                                        {{-- PHOTO PROFIL --}}

                                        <th>
                                            PHOTO PROFIL
                                        </th>


                                        {{-- NOM & PRENOM --}}

                                        <th>
                                            NOM & PRENOM
                                        </th>


                                        {{-- PROFIL --}}

                                        <th>
                                            PROFIL
                                        </th>


                                        {{-- EMAIL --}}

                                        <th>
                                            EMAIL
                                        </th>


                                        {{-- CONTACT --}}

                                        <th>
                                            CONTACT
                                        </th>


                                        {{-- PIECE --}}

                                        <th>
                                            PIECE
                                        </th>


                                        {{-- ACTIONS --}}

                                        <th
                                            width="220"
                                            data-export="false"
                                            data-sort="false"
                                        >

                                            ACTIONS

                                        </th>

                                    </tr>

                                </thead>


                                {{-- TABLE BODY --}}

                                <tbody id="futureTableBody">

                                    @include(
                                        'dependances.templates.admins.gestions.access.users.demandes._consoms._datas.grandecranrejet'
                                    )

                                </tbody>

                            </table>

                        </div>


                        {{-- =========================================
                            MOBILE CARDS
                        ========================================= --}}

                        <div class="futureMobileCards">

                            @include(
                                'dependances.templates.admins.gestions.access.users.demandes._consoms._datas.petitecranrejet'
                            )

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

                                    <span>
                                        Supprimer la sélection
                                    </span>

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


@endsection


@section('footer')

    <div class="suprression-selection">

        @include(
            'dependances.templates.admins.gestions.access.users.demandes._consoms.mettreselectcorbeillerejet'
        )

    </div>

@endsection
