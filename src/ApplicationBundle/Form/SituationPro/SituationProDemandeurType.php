<?php

namespace ApplicationBundle\Form\SituationPro;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SituationProDemandeurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('indemnisePoleEmploi',        ChoiceType::class, array(
                'choices' => array(
                    'Oui' => true,
                    'Non' => false
                )))
            ->add('dateInscriptionPoleEmploi',  DateType::class)
            ->add('rsa',                        ChoiceType::class, array(
                'choices' => array(
                    'Oui' => true,
                    'Non' => false
                )))
            ->add('autreDemandeurEmploi',       TextType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ApplicationBundle\Entity\SituationPro'
        ));
    }
}
