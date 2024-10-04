(function () {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                // Check for native validation
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                // Add Bootstrap validation class
                form.classList.add('was-validated');

                // Check Select2 validation
                $('.select2[required]').each(function() {
                    if ($(this).val() === "") {
                        $(this).select2('open'); // Open Select2 for required fields
                        $(this).addClass('is-invalid'); // Mark as invalid
                    } else {
                        $(this).removeClass('is-invalid'); // Reset if valid
                    }
                });

                // Check CKEditor validation
                let isValid = true; // Flag to track overall validity
                $('.ckeditor-required').each(function() {
                    const editorId = this.id; // Get the ID of the current textarea
                    const contentLength = CKEDITOR.instances[editorId].getData().replace(/<[^>]*>/gi, '').length; // Get the content length

                    // If content is empty, mark it as invalid
                    if (contentLength === 0) {
                        $('#cke_' + editorId).css('border', '1px solid red'); // Highlight CKEditor
                        $('.content-invalid').show(); // Show the invalid feedback message
                        isValid = false; // Set the validity flag to false
                    } else {
                        $('#cke_' + editorId).removeClass("conten-invalid");
                        $('#cke_' + editorId).css('border', ''); // Reset border if valid
                    }
                });

                // Final validation check before form submission
                if (!isValid) {
                    return false; // Prevent form submission if any validation fails
                } else {
                    // All validations passed
                    $('#post-reply').prop("disabled", true).html(buttonName); // Disable the button
                    $('.reply-post-spin').removeClass('d-none'); // Show loading spinner
                    form.submit(); // Submit the form if valid
                }
            }, false);
        });
})();
