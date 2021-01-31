# PagSeguro Custom API

<p align="center">
  <a href="https://github.com/brenno-duarte/pagseguro-custom-api/releases"><img alt="GitHub release (latest by date)" src="https://img.shields.io/github/v/release/brenno-duarte/pagseguro-custom-api?style=flat-square"></a>
  <a href="https://github.com/brenno-duarte/pagseguro-custom-api/blob/master/LICENSE"><img alt="GitHub" src="https://img.shields.io/github/license/brenno-duarte/pagseguro-custom-api?style=flat-square"></a>
</p>

## Sobre

API customizada do PagSeguro para projetos em PHP

## Instalação

Rode o comando abaixo no terminal do Composer:

```sh
composer require brenno-duarte/pagseguro-custom-api
```

## Como usar

Crie um arquivo `env.php` e adicione o script abaixo:

```php
<?php

define('PAGSEGURO_SANDBOX_MODE', true);

if (PAGSEGURO_SANDBOX_MODE == false) {
    ### MODO PRODUÇÃO ###
	define('PAGSEGURO_EMAIL', 'email_pagseguro@email.com');
	define('PAGSEGURO_TOKEN', 'token_pagseguro');
	define('PAGSEGURO_NOTIFICATION', 'http://loja.exemplo.com/compra/notificacao.php');
	define('PAGSEGURO_SCRIPT', 'https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js');
	define('PAGSEGURO_URL', 'https://ws.pagseguro.uol.com.br/v2/');
} else {
    ### MODO SANDBOX ###
	define('PAGSEGURO_EMAIL', 'email_pagseguro_sandbox@email.com');
	define('PAGSEGURO_TOKEN', 'token_sandbox_pagseguro');
	define('PAGSEGURO_NOTIFICATION', 'http://loja.exemplo.com/compra/notificacao.php');
	define('PAGSEGURO_SCRIPT', 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js');
	define('PAGSEGURO_URL', 'https://ws.sandbox.pagseguro.uol.com.br/v2/');
}
```

Se a constante `PAGSEGURO_SANDBOX_MODE` for `true`, então você estará utilizando as constantes em modo de teste. Para desativar, utilize `false`.

Não altere as constantes `PAGSEGURO_SCRIPT` e `PAGSEGURO_URL`, a não ser que a API dp PagSeguro mude as url's. A constante `PAGSEGURO_NOTIFICATION` é opcional a edição.

### Testando o componente

Para testar o componente e suas credênciais do PagSeguro, copie e cole o script abaixo no seu arquivo `index.php`:

```php
<?php

require 'vendor/autoload.php';
include 'env.php';

use PagSeguroCustomAPI\PagSeguroExamples;

$example = new PagSeguroExamples();

### Você pode utilizar de 1 a 4 no parâmetro do método `test()`
$product = json_decode((new PagSeguroExamples())->test(1));

### Ao invés de variáveis para definir os endpoints, você pode definir constantes para um projeto real
$rota_boleto = "http://rota-para-gerar-boleto";
$rota_cartao = "http://rota-para-gerar-cartao";
$rota_session = "http://rota-para-gerar-session";
$rota_status = "http://rota-para-gerar-status";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Necessário para aplicar a formatação dos dados -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- Necessário para aplicar o endereço automaticamente ao preencher o CEP. Os arquivos JS abaixo se encontram na pasta `templates` -->
    <script src='path/cepC.js'></script>
    <script src='path/cepV.js'></script>
</head>

<body>
    <main>
        <!-- Realiza a importação dos produtos de teste -->
        <?php $example->importProducts(); ?>

        <!-- Realiza a importação dos dados do comprador -->
        <?php $example->importBuyer(); ?>

        <!-- Realiza a importação dos métodos de pagamento -->
        <?php $example->importPayments(); ?>
    </main>

    <!-- Realiza a importação dos métodos javascript -->
    <?php $example->importJSMethods(); ?>

</body>

</html>
```

Os arquivos necessários para um projeto real estão na pasta `templates` do componente. Copie-os e edite sem alterar a estrutura padrão.

## Rotas

Como mostrado no exemplo anterior, o PagSeguro trabalha com endpoints para realizar pagamentos, sessões e status. Abaixo encontra-se um exemplo de como você deve criar as rotas utilizando este componente.

### Rota do boleto:

```php
<?php
require_once 'vendor/autoload.php';

use PagSeguroCustomAPI\PagSeguroPayment;

include_once 'env.php';

(new PagSeguroPayment())->getBilletValues((object)filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
```

### Rota do cartão de crédito

```php
<?php
require_once 'vendor/autoload.php';

use PagSeguroCustomAPI\PagSeguroPayment;

include_once 'env.php';

(new PagSeguroPayment())->getCardValues((object)filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
```

### Rota Session

```php
<?php
require_once 'vendor/autoload.php';

use PagSeguroCustomAPI\PagSeguroSession;

include_once 'env.php';

echo (new PagSeguroSession())->getSession();
```

### Rota Status

```php
<?php
require_once 'vendor/autoload.php';

use PagSeguroCustomAPI\PagSeguroStatus;

include_once 'env.php';

echo (new PagSeguroStatus())->getStatus();
```

### Rota CEP

```php
<?php
$cep = filter_input(INPUT_POST, 'cep');
 
$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
 
$dados['sucesso'] = (string) $reg->resultado;
$dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
$dados['bairro']  = (string) $reg->bairro;
$dados['cidade']  = (string) $reg->cidade;
$dados['estado']  = (string) $reg->uf;
 
echo json_encode($dados);
```

## License

[MIT]("https://github.com/brenno-duarte/pagseguro-custom-api/blob/master/LICENSE)