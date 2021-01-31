<!-- O SCRIPT A SEGUIR É UTILIZADO APENAS PARA TESTES, APAGUE CASO SEJA UTILIZADO EM UM PROJETO REAL -->

<?php global $product; ?>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">

<style>

body {
    font-family: 'Lato', sans-serif;
}

</style>

<h1 style="text-align: center;">PAGSEGURO - CHECKOUT TRANSPARENTE (EXEMPLO)</h1>

<!-- O SCRIPT ABAIXO DEVERÁ SER MANTIDO CASO SEJA UTILIZADO EM UM PROJETO REAL -->

<h2>Dados dos produtos</h2>
<label for="idProduct">ID Produto</label>
<input type="text" name="idProduct" id="idProduct" value="<?= $product->id; ?>" required readonly><br>

<label for="descProduct">Descrição</label>
<input type="text" name="descProduct" id="descProduct" value="<?= $product->desc; ?>" required readonly><br>

<label for="amountProduct">Valor</label>
<input type="text" name="amountProduct" id="amountProduct" value="<?= $product->valor; ?>" required readonly><br>