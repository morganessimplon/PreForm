<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApplicantControllerTest extends WebTestCase
{
    public function testNewapplicant()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new_applicant');
    }

}
