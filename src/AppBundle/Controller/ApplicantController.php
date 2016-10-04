<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Applicant;
use AppBundle\Form\ApplicantType;
use AppBundle\Form\FirstContactType;
use User\UserBundle\Entity\User;

/**
 * Class ApplicantController
 * @package AppBundle\Controller
 * @Route("/applicant")
 */
class ApplicantController extends Controller
{
    /**
     * @Route("/new", name="new_applicant")
     */
    public function newApplicantAction(Request $request)
    {
        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));

        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        $applicant = new Applicant();
        $new_user = new User();
        $applicant->setDateCreation(new \DateTime());
        $form_applicant = $this->get('form.factory')->create(FirstContactType::class, $applicant);

        if($request->isMethod('POST') && $form_applicant->handleRequest($request)->isValid()){
            $data = $form_applicant->getData();
            $user_name = $data->getNom();
            $user_firstname = $data->getPrenom();
            $user_mail = $data->getMail();
            $user_password = "greta";
            $new_user->setUsername($user_mail)->setEmail($user_mail)->setPlainPassword($user_password);
            $new_user->addRole('ROLE_USER');
            $new_user->setEnabled(true);
            $applicant->setUser($new_user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($applicant);
            $em->persist($new_user);
            $em->flush();

            $lien = "localhost/PreForm/web/app_dev.php/applicant/" . $applicant->getId() . "/new";

            /*$to       = $applicant->getMail();
            $subject  = "Votre dossier d'inscription";
            $message  = '<h1>Boujour ' .$applicant->getPrenom() . " " . $applicant->getNom() . '</h1><br />.
                        Veuillez cliquer sur ce <a href="' . $lien . '">lien</a> afin de remplir votre dossier d\'inscription!';
            $headers  = 'From: boulle.william@gmail.com' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                'Content-type: text/html; charset=utf-8';
            if(mail($to, $subject, $message, $headers))
                echo "Email sent";
            else
                echo "Email sending failed";*/

            return $this->redirectToRoute('applicant_list');
        }
        return $this->render('AppBundle:Applicant:new_applicant.html.twig', array('form_applicant' => $form_applicant->createView(),
            'user' => $user
        ));
    }

    /**
     * @Route("/list", name="applicant_list")
     */
    public function listApplicantsAction(Request $request)
    {
        $user = $this->getUser();
        $repoApplicants = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant');
        $listApplicants = $repoApplicants->findAll();

        return $this->render('AppBundle:Applicant:list_applicants.html.twig', array('list_applicants' => $listApplicants, 'user' => $user));
    }

    /**
     * @Route("/{id}/infos", name="applicant_infos")
     */
    public function infosApplicantAction(Request $request, $id)
    {
        $user = $this->getUser();
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $dateNaissance = $applicant->getDateNaissance();
        if($dateNaissance) {
            $date = $dateNaissance->format('d/m/Y');
            $age = floor((time() - strtotime($date)) / 3600 / 24 / 365);
        } else {
            $age = 0;
        }

        return $this->render('AppBundle:Applicant:applicant_infos.html.twig', array('applicant' => $applicant, 'age' => $age, 'user' => $user));
    }


    /**
     * @Route("/applicant/remove/{id}", name="removeApplicant")
     */
    public function removeApplicantAction(Request $request, $id) {

        $doctrine = $this -> getDoctrine();
        $em = $doctrine -> getManager();
        $repository = $doctrine -> getRepository('AppBundle:Applicant');

        $applicant = $repository -> find($id);
        $em -> remove($applicant);
        $em -> flush();

        return $this -> redirectToRoute('applicant_list');
    }
}
