<?php

use Longyan\Kafka\Producer\ProduceMessage;
use Longyan\Kafka\Producer\Producer;
use Longyan\Kafka\Producer\ProducerConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$config = new ProducerConfig();
$config->setBootstrapServer('127.0.0.1:9092');
$config->setUpdateBrokers(true);
$config->setAcks(-1);
$producer = new Producer($config);
$producer->sendBatch([
    new ProduceMessage('test', 'v1', 'k1'),
    new ProduceMessage('test', 'v2', 'k2'),
]);

return;
