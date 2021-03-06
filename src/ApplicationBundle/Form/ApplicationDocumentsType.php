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

class ApplicationDocumentsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lettreMotiv',            FileType::class, array('required' => false))
            ->add('photo',                  FileType::class, array('required' => false))
            ->add('handicap',               FileType::class, array('required' => false))
            ->add('cv',                     FileType::class, array('required' => false))
            ->add('carteIdRecto',           FileType::class, array('required' => false))
            ->add('carteIdVerso',           FileType::class, array('required' => false))
            ->add('rib',                    FileType::class, array('required' => false))
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
