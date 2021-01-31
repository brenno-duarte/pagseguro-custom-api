<?php

namespace PagSeguroCustomAPI;

/**
 * [Description PagSeguroStatus]
 */
class PagSeguroStatus
{
    /**
     * @var string
     */
    private $status;

    /**
     * @return PagSeguroStatus
     */
    private function curl(): PagSeguroStatus
    {
        sleep(5);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, PAGSEGURO_URL . "transactions/" . $_POST['id'] . "?email=" . PAGSEGURO_EMAIL . "&token=" . PAGSEGURO_TOKEN);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml; charset=ISO-8859-1'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $data = curl_exec($ch);
        $dataXML = simplexml_load_string($data);

        header('Content-Type: application/json; charset=UTF-8');
        $data = (json_encode($dataXML));

        $this->status =  (json_decode($data)->status);
        curl_close($ch);

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        $this->curl();
        
        return $this->status;
    }
}
