{{-- SUPPRIMER LA SELECTION EN CORBEILLE DEBUT --}}
    <section class="select-corbeille">
        <div>

            <div id="bulkCorbeilleModal" class="futureModalOverlay">

                <div class="futureModalBox danger">

                    <div class="futureModalGlow"></div>

                    <div class="futureModalHeader">

                        <div>
                            <h3>Confirmation</h3>
                            <small>Suppression définitive</small>
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
                            Voulez-vous vraiment supprimer définitivement les éléments sélectionnés ?
                        </p>

                        <small>
                            Cette action est irréversible.
                        </small>

                    </div>

                    <div class="futureModalFooter">

                        <button id="cancelBulkAction" class="futureBtn darkBtn">
                            Annuler
                        </button>

                        <button id="confirmBulkAction" class="futureBtn dangerBtn glowBtn">
                            Oui, supprimer définitivement
                        </button>

                    </div>

                </div>

            </div>

        </div>
    </section>
    {{-- SCRIPT DEBUT --}}
        <script>
            /* =========================================================
            BULK CORBEILLE ENGINE V5 (FINAL CLEAN)
            SUPPRESSION DEFINITIVE DEPUIS CORBEILLE
            ========================================================= */

            class BulkCorbeille {

                constructor(config = {}) {

                    /* BUTTON */
                    this.button =
                        document.querySelector(config.button || "#bulkDeleteBtn");

                    /* ROUTE BACKEND */
                    this.url =
                        config.url || "/select/supprimer/corbeille";

                    /* CSRF */
                    this.csrf =
                        document.querySelector('meta[name="csrf-token"]')
                            ?.getAttribute("content");

                    /* MODAL */
                    this.modal = document.getElementById("bulkCorbeilleModal");
                    this.modalBox = this.modal?.querySelector(".futureModalBox");

                    this.confirmBtn = document.getElementById("confirmBulkAction");
                    this.cancelBtn = document.getElementById("cancelBulkAction");
                    this.closeBtn = document.getElementById("closeBulkModal");

                    this.selectedIds = [];

                    this.init();
                }

                init() {

                    if (!this.button || !this.modal) return;

                    this.button.addEventListener("click", () => this.openModal());

                    this.cancelBtn?.addEventListener("click", () => this.closeModal());
                    this.closeBtn?.addEventListener("click", () => this.closeModal());

                    this.confirmBtn?.addEventListener("click", () => this.submit());

                    /* click outside */
                    this.modal.addEventListener("click", (e) => {
                        if (e.target === this.modal) {
                            this.closeModal();
                        }
                    });
                }

                getSelectedIds() {

                    let ids = new Set();

                    document.querySelectorAll(".rowCheckbox:checked")
                        .forEach(cb => cb.dataset.row && ids.add(cb.dataset.row));

                    document.querySelectorAll(".futureMobileCheckbox:checked")
                        .forEach(cb => cb.dataset.row && ids.add(cb.dataset.row));

                    return [...ids];
                }

                openModal() {

                    this.selectedIds = this.getSelectedIds();

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

                    this.modal.style.display = "flex";

                    requestAnimationFrame(() => {
                        if (this.modalBox) {
                            this.modalBox.style.transform = "scale(1)";
                        }
                    });
                }

                closeModal() {

                    if (this.modalBox) {
                        this.modalBox.style.transform = "scale(.92)";
                    }

                    setTimeout(() => {
                        this.modal.style.display = "none";
                    }, 150);
                }

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

            /* INIT */
            document.addEventListener("DOMContentLoaded", () => {

                new BulkCorbeille({
                    button: "#bulkDeleteBtn",
                    url: "/select/supprimer/corbeille"
                });

            });
        </script>
    {{-- SCRIPT FIN --}}
{{-- SUPPRIMER LA SELECTION EN CORBEILLE FIN --}}
