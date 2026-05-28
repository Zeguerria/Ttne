$(document).ready(function(){
    $(document).on('shown.bs.modal', '.modal', function () {
        let modal = $(this);
        // SINGLE SELECT
        modal.find('.futureSelectSingle').each(function(){

        if ($(this).hasClass("select2-hidden-accessible")) {
            $(this).select2('destroy');
        }
        $(this).select2({
            dropdownParent: modal,
            placeholder: "Sélectionner",
            allowClear: true,
            width: '100%'
        });
        });
    });
});
$(document).ready(function(){
    // INIT SELECT2 DANS MODAL
    $(document).on('shown.bs.modal', '.modal', function () {
                    let modal = $(this);

                    modal.find('.futureSelect').each(function(){

                        // DESTROY SI EXISTE
                        if ($(this).hasClass("select2-hidden-accessible")) {

                            $(this).select2('destroy');

                        }

                        // INIT
                        $(this).select2({

                            dropdownParent: modal,

                            placeholder: "Sélectionner",

                            width: '100%',

                            allowClear: true

                        });

                    });

    });

});