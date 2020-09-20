
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

function validar_string(input) {
    if (input.value.trim() != "") {
        valido(input);
    } else {
        invalido(input);
    }
    submit_form();
}

function validar_fecha(input) {
    const RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{4}$/; 
    if ((input.value.match(RegExPattern)) && (input.value != '')) {
        let fecha = input.value.split("/");
        let day = fecha[0];
        let month = fecha[1];
        let year = fecha[2];
        if (month > 0 && month < 13 && year > 0 && year < 32768 && day > 0 && day <= (new Date(year, month, 0)).getDate()) {
            invalido(input)
        } else {
            valido(input);
        }
    } else {
        valido(input);
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
