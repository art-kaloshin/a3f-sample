<?php

class CurlReader implements HttpReader
{

    private string $url;
    private string $result;

    public function setUrl(string $url): HttpReader
    {
        $this->url = $url;
        return $this;
    }

    public function loadPage(): HttpReader
    {
        $curl = curl_init($this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $result && $this->result = $result;
        curl_close($curl);

        return $this;
    }

    public function getContent(): ?string
    {
        if (! empty($this->result)) {
            return $this->result;
        }

        return null;
    }
}