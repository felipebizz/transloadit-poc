<?php

require_once __DIR__ . '/../src/bootstrap.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection(, RABBITMQ_PORT, RABBITMQ_USER, RABBITMQ_PASS, RABBITMQ_VHOST);
$channel = $connection->channel();

$message = serialize($_POST);
$message = new AMQPMessage($message, array('content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));
$channel->basic_publish($message, RABBITMQ_EXCHANGE);
$channel->close();
$connection->close();