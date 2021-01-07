function validar_numero(input) {
    let valor = Number(input.value);
    if (!isNaN(valor)) {
        if (valor >= 0 && valor <= 10) {
            valido(input);
        } else {
            invalido(input);
        }
    } else {
        invalido(input);
    }
    submit_form();
}
