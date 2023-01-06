<?php

use longlang\phpkafka\Producer\Producer;
use longlang\phpkafka\Producer\ProducerConfig;

require_once 'vendor/autoload.php';

$config = new ProducerConfig();
$config->setBootstrapServer('localhost:9092');
$config->setUpdateBrokers(true);
$config->setAutoCreateTopic(true);
$config->setAcks(-1);

$producer = new Producer($config);

$message = microtime(true);
$key = uniqid('', true);

$producer->send('fancy-topic', $message, $key);
var_dump('key: '.$key . ' message:' . $message);

