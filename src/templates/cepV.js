$(document).ready(function () {
    /* Executa a requisição quando o campo CEP perder o foco */
    $('#billingAddressPostalCode').blur(function () {
        /* Configura a requisição AJAX */
        $.ajax({
            url: 'http://localhost/checkout-transparente-PagSeguro/rCep.php', /* URL que será chamada */
            type: 'POST', /* Tipo da requisição */
            data: 'cep=' + $('#billingAddressPostalCode').val(), /* dado que será enviado via POST */
            dataType: 'json', /* Tipo de transmissão */
            success: function (data) {
                if (data.sucesso == 1) {
                    $('#billingAddressStreet').val(data.rua);
                    $('#billingAddressDistrict').val(data.bairro);
                    $('#billingAddressCity').val(data.cidade);
                    $('#billingAddressState').val(data.estado);
                    $('#billingAddressNumber').focus();
                    $('#billingAddressCountry').val('Brasil');
                }
            },
            error: function (data) {
                console.log(data)
            }
        });
        return false;
    })
});
