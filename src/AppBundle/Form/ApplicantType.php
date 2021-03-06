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

class ApplicantType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',                TextType::class)
            ->add('prenom',             TextType::class)
            ->add('nomJeuneFille',      TextType::class)
            ->add('sexe',               ChoiceType::class, array('choices' => array('Homme' => "H", "Femme" => "F")))
            ->add('dateNaissance',      DateType::class, array('widget' => 'single_text', 'data'=> new \DateTime()))
            ->add('lieuNaissance',      TextType::class)
            ->add('nationalite',        TextType::class)
            ->add('situationFamiliale', ChoiceType::class, array(
                'choices'  => array(
                    'Marié(e)' => "marie",
                    'Célibataire' => "celibataire"
                )))
            ->add('enfants',            NumberType::class)
            ->add('mail',               EmailType::class)
            ->add('telephone',          TextType::class, array('required' => false))
            ->add('adresse',            AddressType::class, array('required' => false))
            ->add('numSecu',            TextType::class)
            ->add('caisse',             TextType::class)
        ;
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
