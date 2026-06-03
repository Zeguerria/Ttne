{{-- BULK RESTORE MODAL --}}
<section class="select-restore">

    <div id="bulkRestoreModal" class="futureModalOverlay">

        <div class="futureModalBox success">

            <div class="futureModalGlow"></div>

            <div class="futureModalHeader">

                <div>
                    <h3>Confirmation</h3>
                    <small>Restauration des éléments</small>
                </div>

                <button id="closeBulkRestoreModal" class="futureModalClose">
                    ✕
                </button>

            </div>

            <div class="futureModalBody">

                <div class="futureWarningIcon successIcon">
                    <i class="fa fa-undo"></i>
                </div>

                <p>
                    Voulez-vous vraiment restaurer les éléments sélectionnés ?
                </p>

                <small>
                    Les éléments seront remis dans la liste active.
                </small>

            </div>

            <div class="futureModalFooter">

                <button id="cancelBulkRestoreAction" class="futureBtn darkBtn">
                    Annuler
                </button>

                <button id="confirmBulkRestoreAction" class="futureBtn successBtn glowBtn">
                    Oui, restaurer
                </button>

            </div>

        </div>

    </div>

</section>

{{-- SCRIPT --}}
<script>
class BulkRestore {

    constructor(config = {}) {

        this.button =
            document.querySelector(config.button || "#bulkRestoreBtn");

        this.url =
            config.url || "/select/restaurer/corbeille";

        this.csrf =
            document.querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content");

        this.modal =
            document.getElementById("bulkRestoreModal");

        this.modalBox =
            this.modal?.querySelector(".futureModalBox");

        this.confirmBtn =
            document.getElementById("confirmBulkRestoreAction");

        this.cancelBtn =
            document.getElementById("cancelBulkRestoreAction");

        this.closeBtn =
            document.getElementById("closeBulkRestoreModal");

        this.selectedIds = [];

        this.init();
    }

    init() {

        if (!this.button || !this.modal) return;

        this.button.addEventListener("click", () => this.openModal());

        this.cancelBtn?.addEventListener("click", () => this.closeModal());
        this.closeBtn?.addEventListener("click", () => this.closeModal());

        this.confirmBtn?.addEventListener("click", () => this.submit());

        this.modal.addEventListener("click", (e) => {
            if (e.target === this.modal) {
                this.closeModal();
            }
        });
    }

    getSelectedIds() {

        let ids = new Set();

        document.querySelectorAll(".rowCheckbox:checked")
            .forEach(cb => ids.add(cb.dataset.row));

        document.querySelectorAll(".futureMobileCheckbox:checked")
            .forEach(cb => ids.add(cb.dataset.row));

        return [...ids];
    }

    openModal() {

        this.selectedIds = this.getSelectedIds();

        if (!this.selectedIds.length) return;

        this.modal.style.display = "flex";
    }

    closeModal() {
        this.modal.style.display = "none";
    }

    submit() {

        if (!this.selectedIds.length) return;

        let form = document.createElement("form");
        form.method = "POST";
        form.action = this.url;

        let csrfInput = document.createElement("input");
        csrfInput.type = "hidden";
        csrfInput.name = "_token";
        csrfInput.value = this.csrf;
        form.appendChild(csrfInput);

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

document.addEventListener("DOMContentLoaded", () => {

    new BulkRestore({
        button: "#bulkRestoreBtn",
        url: "/select/restaurer/corbeille"
    });

});
</script>
