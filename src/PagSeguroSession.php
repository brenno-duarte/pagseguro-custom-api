<?php

namespace PagSeguroCustomAPI;

/**
 * [Description PagSeguroSession]
 */
class PagSeguroSession
{
    /**
     * @var string
     */
    private $id;

    /**
     * @return PagSeguroSession
     */
    private function curl(): PagSeguroSession
    {
        $url = PAGSEGURO_URL . 'sessions?email=' . PAGSEGURO_EMAIL . '&token=' . PAGSEGURO_TOKEN;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $data = curl_exec($ch);

        $xml = new \SimpleXMLElement($data);

        $this->id = $xml->id;
        curl_close($ch);

        return $this;
    }

    /**
     * @return string
     */
    public function getSession(): string
    {
        $this->curl();
        
        return $this->id;
    }
}
