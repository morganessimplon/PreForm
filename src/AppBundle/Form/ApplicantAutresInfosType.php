<?php

namespace AppBundle\Form;

use AppBundle\Form\AddressType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use AppBundle\Entity\Address;

class ApplicantAutresInfosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateNaissance',      DateType::class, array('widget' => 'single_text', 'data'=> new \DateTime()))
            ->add('lieuNaissance',      TextType::class)
            ->add('nationalite',        TextType::class)
            ->add('situationFamiliale', ChoiceType::class, array(
                'choices'  => array(
                    'Marié(e)' => "marie",
                    'Célibataire' => "celibataire"
                )))
            ->add('enfants',            NumberType::class)
            ->add('numSecu',            TextType::class)
            ->add('caisse',             ChoiceType::class, array(
                'choices' => array(
                    'CPAM' => 'cpam',
                    'MSA' => 'msa'
                )))
            ->add('handicap',           ChoiceType::class, array(
                'choices' => array(
                    'Oui' => true,
                    'Non' => false
                )
            ));
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Applicant'
        ));
    }
}
