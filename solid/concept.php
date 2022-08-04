<?php

class Concept {

    private $client;

    public function __construct() {

        $this->client = new \GuzzleHttp\Client();
    }

    public function getUserData() {
        
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    public function getSecretKey()
    {
        return Key::getToken();
    }
}

class Key {
    
    public static function getToken(): string
    {
        // запрос к БД в зависимости от фреймворка или нативного, сделал по аналогии laravel
        $key = DB::table('secret_keys')->where('created_at', '>=', Carbon::subDay())->first();

        if (!$key) {

            $key = new Token;

            DB::table('secret_keys')->insert([
                'key' => $token
            ]);
        }

        return $key;
    }
}