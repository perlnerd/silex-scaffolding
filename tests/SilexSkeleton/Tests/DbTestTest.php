<?php

use Silex\WebTestCase;

class DbTestTest extends WebTestCase
{
    public function createApplication()
    {
        return require __DIR__.'/../../../app/app.php';
    }

    public function testDBDisplay()
    {
        // This stops the "Cannot send session cache limiter - headers already sent" exception
        @session_start();
        $client  = $this->createClient();
        $crawler = $client->request('GET', '/database');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertContains(
            'Donegan',
            $client->getResponse()->getContent()
        );
    }
}
