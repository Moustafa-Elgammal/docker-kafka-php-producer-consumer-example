<?php

use longlang\phpkafka\Consumer\ConsumeMessage;
use App\App;
use longlang\phpkafka\Consumer\Consumer;
use longlang\phpkafka\Consumer\ConsumerConfig;

require_once 'vendor/autoload.php';



function consume(ConsumeMessage $message)
{
    var_dump('key: '.$message->getKey() . ' message:' . $message->getValue());
}

$config = new ConsumerConfig();
$config->setBroker('localhost:9092');
$config->setTopic('fancy-topic'); // topic
$config->setGroupId('test'); // group ID
$config->setClientId('test'); // client ID. Use different settings for different consumers.
$config->setGroupInstanceId('test'); // group instance ID. Use different settings for different consumers.
$config->setInterval(0.1);
$consumer = new Consumer($config, 'consume');
$consumer->start();
