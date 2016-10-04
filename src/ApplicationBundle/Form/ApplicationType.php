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

class ApplicationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomContactUrgence',      TextType::class)
            ->add('prenomContactUrgence',   TextType::class)
            ->add('telContactUrgence',      TextType::class)
            ->add('projetPro',              TextareaType::class)
            ->add('niveauEtudes',           ChoiceType::class, array(
                        'choices' => array(
                                'Sans diplôme' => 'sans diplome',
                                'Brevet des collèges' => 'brevet college',
                                'BEP' => 'bep',
                                'CAP' => 'cap',
                                'BAC' => 'bac',
                                'BAC+1' => 'bac1',
                                'BAC+2' => 'bac2',
                                'BAC+3' => 'bac3',
                                'BAC+4' => 'bac4',
                                'BAC+5' => 'bac5')))
            //->add('diplomes',               DiplomeType::class, array('data_class' => null))
            ->add('diplomes', CollectionType::class, array(
                'entry_type'   => DiplomeType::class,
                'allow_add'    => true,
                'allow_delete' => true))
            ->add('lettreMotiv',            FileType::class)
            ->add('photo',                  FileType::class)
            ->add('handicap',               FileType::class)
            ->add('cv',                     FileType::class)
            ->add('carteIdRecto',           FileType::class)
            ->add('carteIdVerso',           FileType::class)
            ->add('rib',                    FileType::class)
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
