<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 30/09/2016
 * Time: 9:56 AM
 */

namespace FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

class FormationType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            -> add('nom', TextType::class)
            -> add('duree', NumberType::class)
            -> add('date_debut', DateType::class)
            -> add('date_fin', DateType::class)
            -> add('prix', NumberType::class)
            -> add('places', NumberType::class, array('required' => false))
            -> add('objectifs', TextType::class)
            -> add('pre_requis', TextType::class, array('required' => false))
            -> add('contenu', TextType::class)
            -> add('presentationMetier', TextType::class)
            -> add('debouches', TextType::class)
            -> add('lieu', TextType::class)
            -> add('validation', TextType::class)
            ;
    }

    /**
     * @param OptionsResolver $resolver
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver -> setDefaults(array(
            'data_class' => 'FormationBundle\Entity\Formation'
        ));
    }
}