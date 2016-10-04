<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));

        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        return $this->render('AppBundle:Default:index.html.twig', array('user' => $user));
    }

}