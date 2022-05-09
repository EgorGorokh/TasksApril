function erasingEmail(){
    if(document.getElementById('email').value != document.getElementById('confirmation_email').value){
        document.getElementById('email').value='';
        document.getElementById('confirmation_email').value='';
        alert("email не совпадает!");
    }}


$(document).ready(function () {
    validate();
    $('#name, #email').on("input", validate);
});

function validate() {
    if ($('#name').val().length > 0 &&
        $('#email').val().length > 0
    )
    {
        $("#submit").prop("disabled", false);
    }
    else
    {
        $("#submit").prop("disabled", true);
    }
}