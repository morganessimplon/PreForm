<?php
/**
 * Created by PhpStorm.
 * User: William
 * Date: 05/10/2016
 * Time: 15:55
 */

namespace ApplicationBundle\TestUser;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class TestUser
{
    private $container;

    public function __construct(Container $container) { //Son constructeur avec l'entity manager en paramètre
        $this->container = $container;
    }

    public function testerUser($mail){
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByEmail($mail);
        echo $user;
        return $user;
    }
}