<?php

class XMLHttpService extends XMLHTTPRequestService {

    private $service = null;

    public function get(HttpInterface $Http) 
    {
        if (is_null($this->service))
            return false;

        return $Http->checkout($this->service);
    }
}

interface HttpInterface {

    public function get(string $url, array $options);

    public function checkout($order);
}

class Http implements HttpInterface{

    private $service;

    public function __construct(XMLHttpService $xmlHttpService) { }

    public function checkout($order){}

    public function get(string $url, array $options) {

        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url) {

        $this->service->request($url, 'GET');
    }
}
