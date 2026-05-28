<section>

    <div class="head-ent">

        <div>

            <div class="futureBreadWrapper">

                <div class="futureBreadCard">

                    {{-- =========================================================
                    LEFT
                    ========================================================= --}}
                    <div class="futureBreadLeft">

                        <div class="futureBreadIcon">

                            <i class="fa fa-cogs"></i>

                        </div>

                        <div class="futureBreadContent">

                            <h2>

                                Type de paramètre

                            </h2>

                            <div class="futureBreadLinks">

                                <a href="#">

                                    Home

                                </a>

                                <span>/</span>

                                <a href="#">

                                    Paramétrages

                                </a>

                                <span>/</span>

                                <strong>

                                    Type de paramètre

                                </strong>

                            </div>

                        </div>

                    </div>



                    {{-- =========================================================
                    RIGHT
                    ========================================================= --}}
                    <div class="futureBreadRight">

                        {{-- =========================================================
                        HISTORY
                        ========================================================= --}}
                        <div class="futureHistoryWrapper">

                            {{-- BUTTON --}}
                            <button
                                class="futureBtn infoBtn futureHistoryBtn"
                                id="futureHistoryBtn"
                                type="button"
                            >

                                <i class="fa fa-history"></i>

                                Historique

                            </button>



                            {{-- =========================================================
                            PANEL
                            ========================================================= --}}
                            <div class="futureHistoryPanel" id="futureHistoryDropdown">

                                {{-- =========================================================
                                HEADER
                                ========================================================= --}}
                                <div class="futureHistoryHeader">

                                    <div class="futureHistoryHeaderLeft">

                                        <div class="futureHistoryHeaderIcon">

                                            <i class="fa fa-history"></i>

                                        </div>

                                        <div>

                                            <h5 class="futureHistoryTitle">

                                                Historique récent

                                            </h5>

                                            <p class="futureHistorySubTitle">

                                                Activités liées aux types de paramètres

                                            </p>

                                        </div>

                                    </div>



                                    {{-- CLOSE --}}
                                    <button
                                        class="futureHistoryClose"
                                        id="futureHistoryClose"
                                        type="button"
                                    >

                                        <i class="fa fa-times"></i>

                                    </button>

                                </div>



                                {{-- =========================================================
                                BODY
                                ========================================================= --}}
                                <div class="futureHistoryBody" id="futureHistoryBody" >

                                    @include(
                                        'dependances.templates.admins.gestions.parametrages.typeparametres._consoms.historique',
                                        ['historiques' => $historiques]
                                    )

                                </div>



                                {{-- =========================================================
                                FOOTER
                                ========================================================= --}}
                                <div class="futureHistoryFooter">

                                    {{-- =========================================================
                                    PAGINATION
                                    ========================================================= --}}
                                    <div
                                        class="futureHistoryPagination"
                                        id="futureHistoryPagination"
                                    >

                                        {{-- PREVIOUS --}}
                                        @if($historiques->currentPage() > 1)

                                            <button
                                                type="button"
                                                class="futurePageBtn futurePaginationBtn"
                                                data-page="{{ $historiques->currentPage() - 1 }}"
                                            >

                                                <i class="fa fa-angle-left"></i>

                                            </button>

                                        @else

                                            <button
                                                type="button"
                                                class="futurePageBtn disabled"
                                            >

                                                <i class="fa fa-angle-left"></i>

                                            </button>

                                        @endif



                                        {{-- PAGE --}}
                                        <div class="futurePageInfo">

                                            Page
                                            {{ $historiques->currentPage() }}
                                            sur
                                            {{ $historiques->lastPage() }}

                                        </div>



                                        {{-- NEXT --}}
                                        @if($historiques->hasMorePages())

                                            <button
                                                type="button"
                                                class="futurePageBtn futurePaginationBtn"
                                                data-page="{{ $historiques->currentPage() + 1 }}"
                                            >

                                                <i class="fa fa-angle-right"></i>

                                            </button>

                                        @else

                                            <button
                                                type="button"
                                                class="futurePageBtn disabled"
                                            >

                                                <i class="fa fa-angle-right"></i>

                                            </button>

                                        @endif

                                    </div>



                                    {{-- =========================================================
                                    VIEW ALL
                                    ========================================================= --}}
                                    <a
                                        href="#"
                                        class="futureBtn primaryBtn futureHistoryAllBtn"
                                    >

                                        <i class="fa fa-history"></i>

                                        Voir tout

                                    </a>

                                </div>

                            </div>

                        </div>



                        {{-- =========================================================
                        ADD BUTTON
                        ========================================================= --}}
                        <button
                            class="futureBtn primaryBtn"
                            data-toggle="modal"
                            data-target="#Ajouter"
                            title="Ajouter"
                        >

                            <i class="fa fa-plus"></i>

                            Nouveau

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


