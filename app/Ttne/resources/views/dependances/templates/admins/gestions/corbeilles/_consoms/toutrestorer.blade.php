{{-- TOUT RESTAURER DEBUT --}}
<section class="tout-restaurer-corbeille">

    <div>

        {{-- MODAL --}}
        <div id="bulkRestoreAllModal" class="futureModalOverlay">

            <div class="futureModalBox success">

                <div class="futureModalHeader">

                    <h3>Confirmation</h3>

                    <button
                        id="closeBulkRestoreAllModal"
                        class="futureModalClose"
                    >
                        ✕
                    </button>

                </div>

                <div class="futureModalBody">

                    <p>

                        Voulez-vous vraiment restaurer
                        <b>tous les éléments de la corbeille</b> ?

                    </p>

                    <small>

                        Tous les éléments reviendront dans la liste active.

                    </small>

                </div>

                {{-- FORM --}}
                <form
                    method="POST"
                    action="{{ route('C-All-Restore-Corbeille') }}"
                    id="bulkRestoreAllForm"
                >

                    @csrf

                    <div class="futureModalFooter">

                        <button
                            type="button"
                            id="cancelBulkRestoreAll"
                            class="futureBtn darkBtn"
                        >
                            Annuler
                        </button>

                        <button
                            type="submit"
                            class="futureBtn successBtn glowBtn"
                        >
                            Oui, restaurer tout
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    {{-- SCRIPT --}}
    <script>

        class BulkRestoreAll {

            constructor() {

                this.button =
                    document.getElementById(
                        "futureRestoreAllBtn"
                    );

                this.modal =
                    document.getElementById(
                        "bulkRestoreAllModal"
                    );

                this.closeBtn =
                    document.getElementById(
                        "closeBulkRestoreAllModal"
                    );

                this.cancelBtn =
                    document.getElementById(
                        "cancelBulkRestoreAll"
                    );

                this.init();

            }

            init() {

                if (!this.button) return;

                this.button.addEventListener(
                    "click",
                    () => this.open()
                );

                this.closeBtn?.addEventListener(
                    "click",
                    () => this.close()
                );

                this.cancelBtn?.addEventListener(
                    "click",
                    () => this.close()
                );

                this.modal?.addEventListener(
                    "click",
                    (e) => {

                        if (e.target === this.modal) {

                            this.close();

                        }

                    }
                );

            }

            open() {

                this.modal.style.display =
                    "flex";

            }

            close() {

                this.modal.style.display =
                    "none";

            }

        }

        document.addEventListener(
            "DOMContentLoaded",
            () => {

                new BulkRestoreAll();

            }
        );

    </script>

</section>
{{-- TOUT RESTAURER FIN --}}
