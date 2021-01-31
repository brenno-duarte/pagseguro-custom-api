<?php

namespace PagSeguroCustomAPI;

use PagSeguroCustomAPI\PagSeguroXmlGenerate;

/**
 * [Description PagSeguroPayment]
 */
class PagSeguroPayment extends PagSeguroXmlGenerate
{
	/**
	 * @var string
	 */
	private $xml;

	/**
	 * @param string $type
	 * 
	 * @return PagSeguroPayment
	 */
	private function curl(string $type): PagSeguroPayment
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, PAGSEGURO_URL . "transactions/?email=" . PAGSEGURO_EMAIL . "&token=" . PAGSEGURO_TOKEN);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->xml);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml; charset=ISO-8859-1'));

		$data = curl_exec($ch);

		if ($type == 'billet') {
			$dataXML = simplexml_load_string($data);

			if (empty($dataXML->paymentLink)) {
				header('Content-Type: application/json; charset=UTF-8');
				$errosOcorridos = array('erro' => '1');
				echo json_encode($dataXML);
			} else {
				header('Content-Type: application/json; charset=UTF-8');
				echo json_encode($dataXML);
			}
		} elseif ($type == 'card') {
			#$dataXML = simplexml_load_string($data);
			echo json_encode($data);
			header('Content-Type: application/json; charset=UTF-8');
		}

		curl_close($ch);

		return $this;
	}

	/**
	 * @param object $dadosProduto
	 * 
	 * @return PagSeguroPayment
	 */
	public function getBilletValues(object $dadosProduto): PagSeguroPayment
	{
		$cpf = str_replace(".", "", filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING));
		$cpf = str_replace("-", "", $cpf);

		$valor = $dadosProduto->valor;
		$valor = str_replace(",", ".", $valor);

		$this->xml = (new PagSeguroXmlGenerate())->XMLBillet(
			filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING),
			$dadosProduto->desc,
			$valor,
			filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING),
			$cpf,
			filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'senderHash', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING)
		);

		$this->curl('billet');

		return $this;
	}

	/**
	 * @param object $dadosProduto
	 * 
	 * @return PagSeguroPayment
	 */
	public function getCardValues(object $dadosProduto): PagSeguroPayment
	{
		$cpf = str_replace(".", "", filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING));
		$cpf = str_replace("-", "", $cpf);

		$cardCPF = str_replace(".", "", filter_input(INPUT_POST, 'cardCPF', FILTER_SANITIZE_STRING));
		$cardCPF = str_replace("-", "", $cardCPF);

		$valor = $dadosProduto->valor;
		$valor = str_replace(",", ".", $valor);
		$valor = number_format($valor, 2, '.', '');

		$valorParcelas = filter_input(INPUT_POST, 'valorParcelas', FILTER_SANITIZE_STRING);
		$numParcelas = filter_input(INPUT_POST, 'numParcelas', FILTER_SANITIZE_STRING);

		if (!(isset($valorParcelas)) || empty($valorParcelas)) {
			$valorParcelas = $valor;
		}

		if (!(isset($numParcelas)) || empty($numParcelas)) {
			$numParcelas = 1;
		}

		$valorParcelas = (number_format($valorParcelas, 2));
		$valorParcelas = str_replace(",", ".", $valorParcelas);

		$numParcelas = intval($numParcelas);

		$this->xml = (new PagSeguroXmlGenerate())->XMLCard(
			filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING),
			$dadosProduto->desc,
			$valor,
			filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'senderHash', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'enderecoPagamento', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'numeroPagamento', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'complementoPagamento', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'bairroPagamento', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cepPagamento', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cidadePagamento', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'estadoPagamento', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cardToken', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cardNome', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cardCPF', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cardNasc', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cardFoneArea', FILTER_SANITIZE_STRING),
			filter_input(INPUT_POST, 'cardFoneNum', FILTER_SANITIZE_STRING),
			$numParcelas,
			$valorParcelas
		);

		$this->curl('card');

		return $this;
	}
}
