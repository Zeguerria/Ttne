{{-- METTRE LA SELECTION EN CORBEILLE DEBUT --}}
    <section class="select-corbeille">
        <div>
            {{--  --}}
                <div id="bulkCorbeilleModal" class="futureModalOverlay">
                    <div class="futureModalBox danger">

                        <div class="futureModalGlow"></div>

                        <div class="futureModalHeader">

                            <div>
                                <h3>Confirmation</h3>
                                <small>Action sensible détectée</small>
                            </div>

                            <button id="closeBulkModal" class="futureModalClose">
                                ✕
                            </button>

                        </div>

                        <div class="futureModalBody">

                            <div class="futureWarningIcon">
                                <i class="fa fa-trash"></i>
                            </div>

                            <p>
                                Voulez-vous vraiment supprimer les éléments sélectionnés ?
                            </p>

                            <small>
                                Cette action peut être ireversive .
                            </small>

                        </div>

                        <div class="futureModalFooter">

                            <button id="cancelBulkAction" class="futureBtn darkBtn">
                                Annuler
                            </button>

                            <button id="confirmBulkAction" class="futureBtn dangerBtn glowBtn">
                                Oui, supprimer
                            </button>

                        </div>

                    </div>
                </div>

            {{--  --}}
        </div>

    </section>
    {{-- SCRIPT DEBUT --}}
        <script>
            /* =========================================================
            BULK CORBEILLE ENGINE V5
            FUTURISTIC MODAL + MOBILE + DESKTOP + CLEAN UX
            ========================================================= */

            class BulkCorbeille {

                constructor(config = {}) {

                    /* =========================================
                    CONFIG
                    ========================================= */

                    this.button =
                        document.querySelector(config.button || "#bulkDeleteBtn");

                    this.url =
                        config.url || "/select/corbeille/personnels";



                    /* =========================================
                    CSRF
                    ========================================= */

                    this.csrf =
                        document.querySelector('meta[name="csrf-token"]')
                            ?.getAttribute("content");



                    /* =========================================
                    MODAL ELEMENTS
                    ========================================= */

                    this.modal = document.getElementById("bulkCorbeilleModal");
                    this.modalBox = this.modal?.querySelector(".futureModalBox");

                    this.confirmBtn = document.getElementById("confirmBulkAction");
                    this.cancelBtn = document.getElementById("cancelBulkAction");
                    this.closeBtn = document.getElementById("closeBulkModal");



                    /* =========================================
                    STATE
                    ========================================= */

                    this.selectedIds = [];



                    this.init();
                }



                /* =========================================
                INIT
                ========================================= */

                init() {

                    if (!this.button || !this.modal) return;

                    this.button.addEventListener("click", () => this.openModal());

                    this.cancelBtn?.addEventListener("click", () => this.closeModal());
                    this.closeBtn?.addEventListener("click", () => this.closeModal());

                    this.confirmBtn?.addEventListener("click", () => this.submit());



                    /* CLICK OUTSIDE MODAL */
                    this.modal.addEventListener("click", (e) => {

                        if (e.target === this.modal) {
                            this.closeModal();
                        }

                    });
                }



                /* =========================================
                GET SELECTED IDS (DESKTOP + MOBILE)
                ========================================= */

                getSelectedIds() {

                    let ids = new Set();



                    /* DESKTOP */

                    document
                        .querySelectorAll(".rowCheckbox:checked")
                        .forEach(cb => {

                            if (cb.dataset.row) {
                                ids.add(cb.dataset.row);
                            }

                        });



                    /* MOBILE */

                    document
                        .querySelectorAll(".futureMobileCheckbox:checked")
                        .forEach(cb => {

                            if (cb.dataset.row) {
                                ids.add(cb.dataset.row);
                            }

                        });



                    return [...ids];
                }



                /* =========================================
                OPEN MODAL (FUTURISTIC ENTRY)
                ========================================= */

                openModal() {

                    this.selectedIds = this.getSelectedIds();



                    /* NO SELECTION */
                    if (!this.selectedIds.length) {

                        if (window.Swal) {

                            Swal.fire({
                                icon: "warning",
                                title: "Aucune sélection",
                                text: "Veuillez sélectionner au moins une ligne"
                            });

                        }

                        return;
                    }



                    /* SHOW MODAL */
                    this.modal.style.display = "flex";

                    requestAnimationFrame(() => {

                        if (this.modalBox) {
                            this.modalBox.style.transform = "scale(1)";
                        }

                    });
                }



                /* =========================================
                CLOSE MODAL (SMOOTH)
                ========================================= */

                closeModal() {

                    if (this.modalBox) {
                        this.modalBox.style.transform = "scale(.92)";
                    }

                    setTimeout(() => {
                        this.modal.style.display = "none";
                    }, 150);
                }



                /* =========================================
                SUBMIT BULK DELETE
                ========================================= */

                submit() {

                    if (!this.selectedIds.length) return;



                    if (!this.csrf) {

                        if (window.Swal) {

                            Swal.fire({
                                icon: "error",
                                title: "Erreur système",
                                text: "Token CSRF introuvable"
                            });

                        }

                        return;
                    }



                    let form = document.createElement("form");
                    form.method = "POST";
                    form.action = this.url;



                    /* CSRF */
                    let csrfInput = document.createElement("input");
                    csrfInput.type = "hidden";
                    csrfInput.name = "_token";
                    csrfInput.value = this.csrf;
                    form.appendChild(csrfInput);



                    /* IDS */
                    this.selectedIds.forEach(id => {

                        let input = document.createElement("input");
                        input.type = "hidden";
                        input.name = "ids[]";
                        input.value = id;

                        form.appendChild(input);

                    });



                    document.body.appendChild(form);
                    form.submit();
                }

            }



            /* =========================================================
            INIT GLOBAL
            ========================================================= */

            document.addEventListener("DOMContentLoaded", () => {

                new BulkCorbeille({

                    button: "#bulkDeleteBtn",
                    url: "/select/corbeille/personnels"

                });

            });
        </script>
    {{-- SCRIPT FIN --}}
{{-- METTRE LA SELECTION EN CORBEILLE FIN --}}
