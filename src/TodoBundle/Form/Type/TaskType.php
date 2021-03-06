<?php
// src/AppBundle/Form/Type/TaskType.php
namespace TodoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('description')
            ->add('deadline')//,  null, array('widget' => 'single_text'))
            ->add('dateremind')//, null, array('widget' => 'single_text'))
              ->add('statut')
            ->add('category')
            ->add('tag')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TodoBundle\Entity\Tasks',
        ));
    }
}