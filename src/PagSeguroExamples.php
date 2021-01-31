<?php

namespace PagSeguroCustomAPI;

/**
 * [Description PagSeguroExamples]
 */
class PagSeguroExamples
{
    /**
     * @param string|null $template
     * 
     * @return PagSeguroExamples
     */
    public function importProducts(): PagSeguroExamples
    {
        include_once 'templates/produtos.php';
        
        return $this;
    }

    /**
     * @param string|null $template
     * 
     * @return PagSeguroExamples
     */
    public function importBuyer(): PagSeguroExamples
    {
        include_once 'templates/comprador.php';
        
        return $this;
    }

    /**
     * @param string|null $template
     * 
     * @return PagSeguroExamples
     */
    public function importPayments(): PagSeguroExamples
    {
        include_once 'templates/pagamento.php';
        
        return $this;
    }

    /**
     * @param string|null $template
     * 
     * @return PagSeguroExamples
     */
    public function importJSMethods(): PagSeguroExamples
    {
        include_once 'templates/javascripts.php';
        
        return $this;
    }

    /**
     * @param int $id
     * 
     * @return string
     */
    public function test(int $id): string
    {
        if ($id == '1') {
            return json_encode(
                array(
                    'id' => '1',
                    'desc' => '4 apostilas em PDF: Linguagens e Códigos + Matemática + Ciências Humanas + Ciências da Natureza',
                    'valor' => '49,90',
                    'img' => 'https://www.infoenem.com.br/wp-content/uploads/2013/02/EcoversDigital300x300.png',
                )
            );
        } else if ($id == '2') {
            return json_encode(
                array(
                    'id' => '2',
                    'desc' => '4 apostilas impressas: Linguagens e Códigos + Matemática + Ciências Humanas + Ciências da Natureza',
                    'valor' => '94,90',
                    'img' => 'https://www.infoenem.com.br/wp-content/uploads/2013/02/Spirals300x300.png',
                )
            );
        } else if ($id == '3') {
            return json_encode(
                array(
                    'id' => '3',
                    'desc' => '4 apostilas em PDF + 4 apostilas impressas: Linguagens, Matemática, Ciências Humanas e da Natureza',
                    'valor' => '99,90',
                    'img' => '<img src="https://www.infoenem.com.br/wp-content/uploads/2013/02/EcoversDigital300x300.png" style="width: 170px;"><img src="https://www.infoenem.com.br/wp-content/uploads/2013/02/Mais(Transparente).png" style="margin-bottom: 65px;"><img src="https://www.infoenem.com.br/wp-content/uploads/2013/02/Spirals300x300.png" style="width: 170px;">',
                )
            );
        } else if ($id == '4') {
            return json_encode(
                array(
                    'id' => '1406385621000',
                    'desc' => 'Apostila Digital de Redação (PDF)',
                    'valor' => '29,90',
                    'img' => 'https://www.infoenem.com.br/wp-content/uploads/2014/08/arteredacao.png',
                )
            );
        } else if ($id == '5') {
            return json_encode(
                array(
                    'id' => '11',
                    'desc' => 'Promoção! Apostila Digital de Redação (PDF)',
                    'valor' => '19,90',
                    'img' => 'https://www.infoenem.com.br/wp-content/uploads/2014/08/arteredacao.png',
                )
            );
        } else if ($id == '6') {
            return json_encode(
                array(
                    'id' => '0007',
                    'desc' => 'Promoção! Kit 4 Apostilas (PDF)',
                    'valor' => '29,80',
                    'img' => 'https://www.infoenem.com.br/wp-content/uploads/2013/02/EcoversDigital300x300.png',
                )
            );
        } else if ($id == '7') {
            return json_encode(
                array(
                    'id' => '11',
                    'desc' => 'Promoção! Apostila Digital de Redação (PDF)',
                    'valor' => '9,80',
                    'img' => 'https://www.infoenem.com.br/wp-content/uploads/2014/08/arteredacao.png',
                )
            );
        }
    }
}
