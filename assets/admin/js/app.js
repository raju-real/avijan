$(function () {
    // $(window).on("load", function () {
    //     let preloader = $("#preloader");
    //     if (preloader) {
    //         preloader.remove();
    //     }
    // });

    $(document).on("submit", "#prevent-form", function () {
        let spinTag = "<i class='fa fa-spinner fa-spin me-2 spinner'></i>";
        let text = " Please wait...";
        let buttonText = spinTag + text;
        $("#submit-button").prop("disabled", true).html(buttonText);
    });


    $(document).on("click", ".delete-data", function (e) {
        e.preventDefault();
        let target = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't to delete this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $("#" + target).submit();
            }
        });
    });

    // Common import

    // Initialize the select2
    $(".select2").select2();

    $(".datetimepicker").datetimepicker({
        format: "Y-m-d H:i",
        value: new Date(), // Default to today
        step: 1,
    });

    $(".datepicker").datetimepicker({
        format: "Y-m-d",
        timepicker: false,
        value: new Date(), // Default to today
        theme: "picker-box",
    });
    $(".datepicker").datetimepicker({
        format: "Y-m-d",
        timepicker: false,
        value: new Date(), // Default to today
        theme: "picker-box",
    });

    $(".timepicker").datetimepicker({
        format: "H:i",
        datepicker: false,
        value: new Date(),
        step: 1,
    });
});
