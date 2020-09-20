
function validar_numero(input, min = 0, max = 100) {
    let valor = Number(input.value);
    if (!isNaN(valor)) {
        if (valor >= min && valor <= max) {
            valido(input);
        } else {
            invalido(input);
        }
    } else {
        invalido(input);
    }
    submit_form();
}


function validar_nombre(input) {
    if (input.value.trim() != "" && isNaN(Number((input.value)[0]))) {
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

function limpiar_validaciones(){
    $(".invalid-feedback").css("display", 'none');
    $(".is-invalid").removeClass("is-invalid");
    $(".is-valid").removeClass("is-valid");
}
