<?php

namespace Am\PresenceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class WorkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
            ->add('subtitle', 'text')
            ->add('resume', 'textarea')
            ->add('picture', 'text')
            ->add('dateStart', 'datetime')
            ->add('dateEnd', 'datetime')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Am\PresenceBundle\Entity\Work'
        ));
    }

    public function getName()
    {
        return 'work';
    }
}
