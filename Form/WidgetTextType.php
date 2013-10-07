<?php

namespace Victoire\TextBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * WidgetText form type
 */
class WidgetTextType extends AbstractType
{

    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                            ->add('content')
                    ;
    }


    /**
     * bind form to WidgetRedactor entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Victoire\TextBundle\Entity\WidgetText'
        ));
    }


    /**
     * get form name
     */
    public function getName()
    {
        return 'appventus_venatorcmsbundle_widgettexttype';
    }
}
