<?php

namespace Saschakoch\Sync;

// small change 2

class ApiRequest {
    private static $instance;
    private $baseUrl;
    private $token;
    private $teamId;
    //private $databaseId;
    private function __construct()
    {
        // Private constructor to prevent instantiation
        // https://kompass.ninoxdb.de/v1/teams/{ TEAM ID }/databases/{ DATABASE ID }/tables
        $this->token = 'OGYwYjFmZTQtN2QwMy01N2Y5LTk2ODktOTI2NmMxODQwNmI5';
        $this->teamId = 'xdkvuahkuhbw0zn2k';
        $this->baseUrl = 'https://kompass.ninoxdb.de/v1/teams/'.$this->teamId."/";
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getJsonResult($url) {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->token,
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            die(curl_error($ch));
        }

        curl_close($ch);

        $data = json_decode($response, true);
        return $data;
    }

    public function printData($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public function getASchemaForMultipleTables() {
        $this->url = "https://kompass.ninoxdb.de/v1/teams/{$this->teamId}/databases/{$this->databaseId}/tables";
        $this->printData($this->getJsonResult());
    }

    public function getASchemaForASingleDatabase() {
        $this->url = "https://kompass.ninoxdb.de/v1/teams/{$this->teamId}/databases/{$this->databaseId}";
        $this->printData($this->getJsonResult());
    }

}