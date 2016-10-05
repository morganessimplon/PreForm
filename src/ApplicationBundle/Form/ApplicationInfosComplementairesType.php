<?php

namespace ApplicationBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationInfosComplementairesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomContactUrgence',          TextType::class)
            ->add('prenomContactUrgence',       TextType::class)
            ->add('telContactUrgence',          TextType::class)
            ->add('situationProfessionnelle',   ChoiceType::class, array(
                'choices' => array(
                    'CDD' => 'cdd',
                    'CDI' => 'cdi',
                    'Demandeur d\'emploi' => 'demandeurEmploi',
                    'En intérim' => 'interim',
                    'Autre' => 'autre'
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ApplicationBundle\Entity\Application'
        ));
    }
}
