$(document).ready(function () {
    /* Executa a requisição quando o campo CEP perder o foco */
    $('#shippingAddressPostalCode').blur(function () {
        /* Configura a requisição AJAX */
        $.ajax({
            url: 'http://localhost/checkout-transparente-PagSeguro/rCep.php', /* URL que será chamada */
            type: 'POST', /* Tipo da requisição */
            data: 'cep=' + $('#shippingAddressPostalCode').val(), /* dado que será enviado via POST */
            dataType: 'json', /* Tipo de transmissão */
            success: function (data) {
                if (data.sucesso == 1) {
                    $('#shippingAddressStreet').val(data.rua);
                    $('#shippingAddressDistrict').val(data.bairro);
                    $('#shippingAddressCity').val(data.cidade);
                    $('#shippingAddressState').val(data.estado);
                    $('#shippingAddressNumber').focus();
                }
            },
            error: function (data) {
                console.log(data)
            }
        });
        return false;
    })
});
