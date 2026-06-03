{{-- TOUT METTRE EN CORBEILLE DEBUT --}}
    <section class="tout-mettre-corbeille">
        <div class="tout-mettre-corbeille">
            {{-- DEBUT --}}
                <div id="bulkDeleteAllModal" class="futureModalOverlay">
                    <div class="futureModalBox danger">

                        <div class="futureModalHeader">

                            <h3>Confirmation</h3>

                            <button id="closeBulkAllModal" class="futureModalClose">✕</button>

                        </div>

                        <div class="futureModalBody">

                            <p>
                                Voulez-vous vraiment supprimer <b>tous les éléments actifs</b> ?
                            </p>

                            <small>
                                Cette action peut avoir de lourde consequences.
                            </small>

                        </div>

                        <!-- FORM DIRECT LARAVEL -->
                        <form method="POST" action="{{route('C-All-CBL-CBL')}}" id="bulkAllForm">

                            @csrf

                            <div class="futureModalFooter">

                                <button type="button" id="cancelBulkAll" class="futureBtn darkBtn">
                                    Annuler
                                </button>

                                <button type="submit" class="futureBtn dangerBtn glowBtn">
                                    Oui, supprimer tout
                                </button>

                            </div>

                        </form>

                    </div>
                </div>
            {{-- FIN --}}
            {{-- SCRIPT DEBUT --}}
                <script>
                    class BulkDeleteAll {

                        constructor() {

                            this.button = document.getElementById("futureDeleteAllBtn");

                            this.modal = document.getElementById("bulkDeleteAllModal");

                            this.closeBtn = document.getElementById("closeBulkAllModal");

                            this.cancelBtn = document.getElementById("cancelBulkAll");

                            this.init();
                        }

                        init() {

                            if (!this.button) return;

                            this.button.addEventListener("click", () => this.open());

                            this.closeBtn?.addEventListener("click", () => this.close());

                            this.cancelBtn?.addEventListener("click", () => this.close());

                            this.modal?.addEventListener("click", (e) => {

                                if (e.target === this.modal) {
                                    this.close();
                                }

                            });
                        }

                        open() {
                            this.modal.style.display = "flex";
                        }

                        close() {
                            this.modal.style.display = "none";
                        }

                    }

                    document.addEventListener("DOMContentLoaded", () => {
                        new BulkDeleteAll();
                    });
                </script>
            {{-- SCRIPT FIN --}}
        </div>
    </section>
{{-- TOUT METTRE EN CORBEILLE FIN --}}
