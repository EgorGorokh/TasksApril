$(document).ready(function () {
    validate();
    $('#login, #pass').on("input", validate);
});

function validate() {
    if ($('#login').val().length > 0 &&
        $('#pass').val().length > 0
    )
    {
        $("#submit").prop("disabled", false);
    }
    else
    {
        $("#submit").prop("disabled", true);
    }
}