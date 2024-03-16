jQuery(document).ready(function () {
    function toggleComplexField() {
        var checkbox = jQuery('.wawa-photo .cf-field__body input.cf-checkbox__input'); // Selector untuk checkbox
        var complexField = jQuery('.wawa-user-photo-url'); // Selector untuk complex field, sesuaikan dengan markup HTML yang dihasilkan

        if (checkbox.is(':checked')) {
            complexField.show();
        } else {
            complexField.hide();
        }
    }

    // Jalankan saat dokumen siap
    toggleComplexField();

    // Jalankan setiap kali checkbox berubah
    jQuery('.wawa-photo .cf-field__body input.cf-checkbox__input').change(toggleComplexField);
});
