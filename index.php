<?php

namespace Saschakoch\Sync;
require __DIR__ . '/vendor/autoload.php';

$api = ApiRequest::getInstance();
$api->getASchemaForMultipleTables();
//$api->getASchemaForASingleDatabase();