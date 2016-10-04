<?php

namespace FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use FormationBundle\Entity\Formation;
use FormationBundle\Form\FormationType;

/**
 * Class FormationController
 * @package FormationBundle\Controller
 * @Route("/formation")
 */
class FormationController extends Controller
{
    /**
     * @Route("/new", name="formation_infos")
     */
    public function newFormationAction(Request $request)
    {
        $formation = new Formation();
        $form_formation = $this->get('form.factory')->create(FormationType::class, $formation);

        if ($request->isMethod('POST') && $form_formation->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('list_formations');
        }
        return $this->render('FormationBundle:Formation:formation_infos.html.twig', array('form_formation' => $form_formation->createView()
        ));
    }

    /**
     * @Route("/list", name="list_formations")
     */
    public function listFormationAction(Request $request)
    {
        $repoFormations = $this->getDoctrine()->getManager()->getRepository('FormationBundle:Formation');
        $listFormations = $repoFormations->findAll();

        return $this->render('FormationBundle:Formation:list_formations.html.twig', array('list_formations' => $listFormations));
    }


    /**
     * @Route("/{id}/infos", name="infos_finales")
     */

    public function infosFormationAction(Request $request, $id) {

        $formation = $this -> getDoctrine() -> getManager() -> getRepository('FormationBundle:Formation') -> find($id);

        return $this ->render('FormationBundle:Formation:infos_finales.html.twig', array('formation' => $formation));
    }


    /**
     * @Route("/formation/remove/{id}", name="removeFormation")
     */
    public function removeFormationAction(Request $request, $id) {

        $doctrine = $this -> getDoctrine();
        $em = $doctrine -> getManager();
        $repository = $doctrine -> getRepository('FormationBundle:Formation');

        $formation = $repository -> find($id);
        $em -> remove($formation);
        $em -> flush();

        return $this -> redirectToRoute('list_formations');
    }

}