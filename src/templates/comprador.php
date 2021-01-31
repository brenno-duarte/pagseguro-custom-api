<div id="buyerData">
    <div>
        <h2>Dados do comprador</h2>
        <div style="margin-top:-20px; text-align:right;">
            <font color="red">* Campos de preenchimento obrigatório</font>
        </div>
    </div>

    <div>
        <label for="senderEmail">E-mail <font color="red">*</font></label>
        <input type="text" name="senderEmail" id="senderEmail" required />
    </div>

    <div>
        <label for="senderName">Nome completo <font color="red">*</font></label>
        <input type="text" name="senderName" id="senderName" required />
    </div>

    <div>
        <label for="senderCPF">CPF (somente números) <font color="red">*</font></label>
        <input type="text" name="senderCPF" id="senderCPF" maxlength="14" required />
    </div>

    <div>
        <label for="senderAreaCode">Telefone <font color="red">*</font></label>
        <input type="text" name="senderAreaCode" id="senderAreaCode" class="areaCode" maxlength="2" required placeholder="DDD" />
        <input type="text" name="senderPhone" id="senderPhone" class="phone" maxlength="9" required placeholder="Número" />
    </div>

    <h2>Endereço Residencial</h2>

    <div>
        <label for="shippingAddressPostalCode">CEP (somente números) <font color="red">*</font></label>
        <input type="text" name="shippingAddressPostalCode" id="shippingAddressPostalCode" maxlength="9" required />
    </div>

    <div>
        <div>
            <label for="shippingAddressStreet">Endereço <font color="red">*</font></label>
            <input type="text" name="shippingAddressStreet" id="shippingAddressStreet" required />
        </div>

        <div>
            <label for="shippingAddressNumber">Número <font color="red">*</font></label>
            <input type="text" name="shippingAddressNumber" id="shippingAddressNumber" size="5" required />
        </div>
    </div>

    <div>
        <label for="shippingAddressComplement">Complemento</label>
        <input type="text" name="shippingAddressComplement" id="shippingAddressComplement" />
    </div>

    <div>
        <label for="shippingAddressDistrict">Bairro <font color="red">*</font></label>
        <input type="text" name="shippingAddressDistrict" id="shippingAddressDistrict" required />
    </div>

    <div>
        <label for="shippingAddressCity">Cidade <font color="red">*</font></label>
        <input type="text" name="shippingAddressCity" id="shippingAddressCity" required />
    </div>

    <div>
        <label for="shippingAddressState">Estado <font color="red">*</font></label>
        <input type="text" name="shippingAddressState" id="shippingAddressState" class="addressState" maxlength="2" style="text-transform: uppercase;" onBlur="this.value=this.value.toUpperCase()" required placeholder="CE" />
    </div>

    <div style="display: none">
        <label for="shippingAddressCountry">País</label>
        <input type="text" name="shippingAddressCountry" id="shippingAddressCountry" value="Brasil" readonly />
    </div>

    <!-- OPCIONAL, NÃO É ORIGATÓRIO -->
    <p style="float: left"><b>Esta compra está sendo feita no Brasil</b></p>
    <p style="clear: both"></p>
    <!-- OPCIONAL, NÃO É ORIGATÓRIO -->

</div>