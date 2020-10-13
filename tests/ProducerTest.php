<?php

declare(strict_types=1);

namespace Longyan\Kafka\Test;

use Longyan\Kafka\Producer\ProduceMessage;
use Longyan\Kafka\Producer\Producer;
use Longyan\Kafka\Producer\ProducerConfig;
use PHPUnit\Framework\TestCase;

class ProducerTest extends TestCase
{
    public function testSend()
    {
        $config = new ProducerConfig();
        $config->setBootstrapServer(TestUtil::getHost() . ':' . TestUtil::getPort());
        $config->setAcks(-1);
        $producer = new Producer($config);
        $producer->send('test', (string) microtime(true), uniqid('', true));
        $producer->close();
        $this->assertTrue(true);
    }

    public function testSendBatch()
    {
        $config = new ProducerConfig();
        $config->setBootstrapServer(TestUtil::getHost() . ':' . TestUtil::getPort());
        $config->setAcks(-1);
        $producer = new Producer($config);
        $producer->sendBatch([
            new ProduceMessage('test', 'v1', 'k1'),
            new ProduceMessage('test', 'v2', 'k2'),
        ]);
        $producer->close();
        $this->assertTrue(true);
    }
}
