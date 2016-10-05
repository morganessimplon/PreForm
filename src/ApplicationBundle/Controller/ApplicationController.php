<?php

namespace ApplicationBundle\Controller;

use AppBundle\Entity\Applicant;
use AppBundle\Form\ApplicantNameType;
use ApplicationBundle\Entity\Application;
use ApplicationBundle\Entity\Diplome;
use ApplicationBundle\Entity\SituationPro;
use ApplicationBundle\Form\DiplomeType;
use ApplicationBundle\Form\SituationPro\SituationProAutreType;
use ApplicationBundle\Form\SituationPro\SituationProCDDType;
use ApplicationBundle\Form\SituationPro\SituationProCDIType;
use ApplicationBundle\Form\SituationPro\SituationProDemandeurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ApplicantContactType;
use AppBundle\Form\ApplicantAutresInfosType;
use ApplicationBundle\Form\ApplicationInfosComplementairesType;
use ApplicationBundle\Form\ApplicationSituationProType;
use ApplicationBundle\Form\ApplicationEtudesType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use ApplicationBundle\Form\ApplicationProjetProType;
use ApplicationBundle\Form\ApplicationProjetFormationType;
use ApplicationBundle\Form\ApplicationDocumentsType;
use ApplicationBundle\Form\ApplicationOrganismeType;

/**
 * Class ApplicationController
 * @package ApplicationBundle\Controller
 *
 */
class ApplicationController extends Controller
{
    /**
     * @Route("/applicant/{id}/new", name="new_application")
     */
    public function newApplicationAction(Request $request, $id)
    {
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);

        /*if($applicant->getNom() != null && $applicant->getPrenom() != null && $applicant->getSexe() != null){
            return $this->redirectToRoute('new_application_contact', array('id' => $applicant->getId()));
        }*/

        $form_applicant = $this->get('form.factory')->create(ApplicantNameType::class, $applicant);

        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        if($request->isMethod('POST') && $form_applicant->handleRequest($request)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($applicant);
            $em->flush();

            return $this->redirectToRoute('new_application_contact', array('id' => $applicant->getId()));
        }
        return $this->render('ApplicationBundle:Application:new_application.html.twig', array('form_applicant' => $form_applicant->createView(), 'user' => $user, 'applicant' => $applicant
        ));
    }

    /**
     * @Route("/applicant/{id}/contact", name="new_application_contact")
     */
    public function newApplicationContactAction(Request $request, $id)
    {
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $form_applicant = $this->get('form.factory')->create(ApplicantContactType::class, $applicant);

        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        if($request->isMethod('POST') && $form_applicant->handleRequest($request)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($applicant);
            $em->flush();

            return $this->redirectToRoute('application_autres_infos', array('id' => $applicant->getId()));
        }
        return $this->render('ApplicationBundle:Application:new_application_contact.html.twig', array('form_applicant' => $form_applicant->createView(), 'user' => $user, 'applicant' => $applicant
        ));
    }

    /**
     * @Route("/applicant/{id}/autres_infos", name="application_autres_infos")
     */
    public function newApplicationAutresInfosAction(Request $request, $id)
    {
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $form_applicant = $this->get('form.factory')->create(ApplicantAutresInfosType::class, $applicant);

        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        if($request->isMethod('POST') && $form_applicant->handleRequest($request)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($applicant);
            $em->flush();

            return $this->redirectToRoute('application_infos_complementaires', array('id' => $applicant->getId()));
        }
        return $this->render('ApplicationBundle:Application:application_autres_infos.html.twig', array('form_applicant' => $form_applicant->createView(), 'user' => $user, 'applicant' => $applicant
        ));
    }

    /**
     * @Route("/applicant/{id}/infos_complementaires", name="application_infos_complementaires")
     */
    public function newApplicationInfosComplementairesAction(Request $request, $id)
    {
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $application = $this->getDoctrine()->getManager()->getRepository('ApplicationBundle:Application')->findOneBy(array('applicant' => $applicant->getId()));
        if($application == null){
            $application = new Application();
        }
        $form_application = $this->get('form.factory')->create(ApplicationInfosComplementairesType::class, $application);

        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        if($request->isMethod('POST') && $form_application->handleRequest($request)){
            $em = $this->getDoctrine()->getManager();
            $application->setApplicant($applicant);
            $em->persist($application);
            $em->flush();

            return $this->redirectToRoute('application_situation_pro', array('id' => $applicant->getId()));
        }
        return $this->render('ApplicationBundle:Application:application_infos_complementaires.html.twig', array('form_application' => $form_application->createView(), 'user' => $user, 'applicant' => $applicant
        ));
    }

    /**
     * @Route("/applicant/{id}/situation_pro", name="application_situation_pro")
     */
    public function newApplicationSituationProAction(Request $request, $id)
    {
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $application = $this->getDoctrine()->getManager()->getRepository('ApplicationBundle:Application')->findOneBy(array('applicant' => $applicant->getId()));
        $situation = $application->getSituationProfessionnelle();
        $situationPro = $application->getSituationPro();
        if($situationPro == null){
            $situationPro = new SituationPro();
        }
        switch ($situation) {
            case 'cdd':
                $form_situation = $this->get('form.factory')->create(SituationProCDDType::class, $situationPro);
                break;
            case 'cdi':
                $form_situation = $this->get('form.factory')->create(SituationProCDIType::class, $situationPro);
                break;
            case 'demandeurEmploi':
                $form_situation = $this->get('form.factory')->create(SituationProDemandeurType::class, $situationPro);
                break;
            case 'interim':
                return $this->redirectToRoute('application_etudes', array('id' => $applicant->getId()));
                break;
            case 'autre':
                $form_situation = $this->get('form.factory')->create(SituationProAutreType::class, $situationPro);
                break;
        }

        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        if($request->isMethod('POST') && $form_situation->handleRequest($request)){
            $em = $this->getDoctrine()->getManager();
            $application->setSituationPro($situationPro);
            $em->persist($application);
            $em->flush();

            return $this->redirectToRoute('application_etudes', array('id' => $applicant->getId()));
        }
        return $this->render('ApplicationBundle:Application:application_situation_pro.html.twig', array('form_situation' => $form_situation->createView(), 'user' => $user, 'applicant' => $applicant, 'application' => $application
        ));
    }

    /**
     * @Route("/applicant/{id}/etudes", name="application_etudes")
     */
    public function newApplicationEtudesAction(Request $request, $id){
        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        if($test) {
           $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
           $user = $this->getUser();
        }

        $em = $this->getDoctrine()->getManager();
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $application = $this->getDoctrine()->getManager()->getRepository('ApplicationBundle:Application')->findOneBy(array('applicant' => $applicant->getId()));
        if (null === $application) {
           throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }
        $form = $this->get('form.factory')->create(ApplicationEtudesType::class, $application);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
           foreach ($application->getDiplomes() as $diplome){
               $diplome->setApplication($application);
           }
           $em->flush();
           return $this->redirectToRoute('application_projet_pro', array('id' => $applicant->getId()));
       }
       return $this->render('ApplicationBundle:Application:application_etudes.html.twig', array(
            'application' => $application,
            'applicant' => $applicant,
            'form_application'   => $form->createView(),
            'user' => $user,
       ));
    }

    /**
     * @Route("/applicant/{id}/projet pro", name="application_projet_pro")
     */
    public function newApplicationProjetProAction(Request $request, $id){
        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        $em = $this->getDoctrine()->getManager();
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $application = $this->getDoctrine()->getManager()->getRepository('ApplicationBundle:Application')->findOneBy(array('applicant' => $applicant->getId()));
        if (null === $application) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }
        $form = $this->get('form.factory')->create(ApplicationProjetProType::class, $application);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('application_projet_formation', array('id' => $applicant->getId()));
        }
        return $this->render('ApplicationBundle:Application:application_projet_pro.html.twig', array(
            'application' => $application,
            'applicant' => $applicant,
            'form_application'   => $form->createView(),
            'user' => $user,
        ));
    }

    /**
     * @Route("/applicant/{id}/projet_formation", name="application_projet_formation")
     */
    public function newApplicationProjetFormationAction(Request $request, $id){
        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        $em = $this->getDoctrine()->getManager();
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $application = $this->getDoctrine()->getManager()->getRepository('ApplicationBundle:Application')->findOneBy(array('applicant' => $applicant->getId()));
        if (null === $application) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }
        $form = $this->get('form.factory')->create(ApplicationProjetFormationType::class, $application);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('application_documents', array('id' => $applicant->getId()));
        }
        return $this->render('ApplicationBundle:Application:application_projet_formation.html.twig', array(
            'application' => $application,
            'applicant' => $applicant,
            'form_application'   => $form->createView(),
            'user' => $user,
        ));
    }

    /**
     * @Route("/applicant/{id}/documents", name="application_documents")
     */
    public function newApplicationDocumentsAction(Request $request, $id){
        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        $em = $this->getDoctrine()->getManager();
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $handicap = $applicant->getHandicap();
        $application = $this->getDoctrine()->getManager()->getRepository('ApplicationBundle:Application')->findOneBy(array('applicant' => $applicant->getId()));
        if (null === $application) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }
        $form = $this->get('form.factory')->create(ApplicationDocumentsType::class, $application);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('application_organisme', array('id' => $applicant->getId()));
        }
        return $this->render('ApplicationBundle:Application:application_documents.html.twig', array(
            'application' => $application,
            'applicant' => $applicant,
            'form_application'   => $form->createView(),
            'user' => $user,
            'handicap' => $handicap
        ));
    }

    /**
     * @Route("/applicant/{id}/organisme", name="application_organisme")
     */
    public function newApplicationOrganismeAction(Request $request, $id){
        $mail = $this->getUser()->getEmail();
        $test = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        if($test) {
            $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->findOneBy(array('mail' => $mail));
        } else{
            $user = $this->getUser();
        }

        $em = $this->getDoctrine()->getManager();
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $application = $this->getDoctrine()->getManager()->getRepository('ApplicationBundle:Application')->findOneBy(array('applicant' => $applicant->getId()));
        if (null === $application) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }
        $form = $this->get('form.factory')->create(ApplicationOrganismeType::class, $application);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('application_signature', array('id' => $applicant->getId()));
        }
        return $this->render('ApplicationBundle:Application:application_organisme.html.twig', array(
            'application' => $application,
            'applicant' => $applicant,
            'form_application'   => $form->createView(),
            'user' => $user,
        ));
    }
}