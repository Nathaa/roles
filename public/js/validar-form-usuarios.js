function validar_contrasenia(input) {
    let pattern = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
    if (input.value.match(pattern)) {
        valido(input);
    } else {
        invalido(input);
    }
    submit_form();
}

function submit_form() {
    if ($(".is-invalid").length == 0) {
        $("#btn_submit").removeAttr('disabled');
    } else {
        $("#btn_submit").attr('disabled', 'disabled');
    }
}

function valido(input) {
    $(input).removeClass("is-invalid");
    $(input).addClass("is-valid");
    $(input).next().css("display", "none");
}
function invalido(input) {
    $(input).removeClass("is-valid");
    $(input).addClass("is-invalid");
    $(input).next().css("display", "block");
}