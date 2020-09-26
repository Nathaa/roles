function validar_campo(input) {
    if (input.value.trim() != "") {
        valido(input);
    } else {
        invalido(input);
    }
    submit_form();
}

function validar_seccion(input) {
    const RegExPattern = /^\x22[a-zA-Z]{1}\x22$/;
    if (input.value.trim() != "" && input.value.match(RegExPattern)) {
        valido(input);
    } else {
        invalido(input);
    }
    submit_form();
}
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

function validar_select(input){
    if(input.value != "")
      {
        valido(input); 
      }
    else{
        invalido(input);
    }
    submit_form();
}

function validar_radio(input){
    if(("[name='categoria']:checked").val()!=undefined){
       valido(input)
    }else{
        invalido(input)
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
