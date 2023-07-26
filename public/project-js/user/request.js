$("#request_form").validate({
    rules: {
        message: {
            required: true,
            maxlength: 50,
        },
    },
    messages: {},
    submitHandler: function (form, event) {
        event.preventDefault();
        $("#btn").html("Please Wait..");
        $("#btn").attr("disabled", true);
        $.ajax({
            url: "request",
            method: "POST",
            dataType: "JSON",
            data: new FormData(form),
            processData: false,
            contentType: false,
            success: function (data) {
                $("#btn").html("Send Request");
                $("#btn").attr("disabled", false);
                swal({
                    title: data.title,
                    icon: data.icon,
                });
                if (data.status) {
                    $("#request_form").trigger("reset");
                }
            },
        });
    },
});
