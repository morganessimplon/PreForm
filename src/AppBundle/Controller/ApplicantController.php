<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Applicant;
use AppBundle\Form\FirstContactType;

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
        $applicant = new Applicant();
        $form_applicant = $this->get('form.factory')->create(FirstContactType::class, $applicant);

        if($request->isMethod('POST') && $form_applicant->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($applicant);
            $em->flush();

            return $this->redirectToRoute('applicant_list');
        }
        return $this->render('AppBundle:Applicant:new_applicant.html.twig', array('form_applicant' => $form_applicant->createView()
        ));
    }

    /**
     * @Route("/list", name="applicant_list")
     */
    public function listApplicantsAction(Request $request)
    {
        $repoApplicants = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant');
        $listApplicants = $repoApplicants->findAll();

        return $this->render('AppBundle:Applicant:list_applicants.html.twig', array('list_applicants' => $listApplicants));
    }

    /**
     * @Route("/{id}/infos", name="applicant_infos")
     */
    public function infosApplicantAction(Request $request, $id)
    {
        $applicant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Applicant')->find($id);
        $dateNaissance = $applicant->getDateNaissance();
        if($dateNaissance) {
            $date = $dateNaissance->format('d/m/Y');
            $age = floor((time() - strtotime($date)) / 3600 / 24 / 365);
        } else {
            $age = 0;
        }

        return $this->render('AppBundle:Applicant:applicant_infos.html.twig', array('applicant' => $applicant, 'age' => $age));
    }
}
