<?php

namespace Victoire\Widget\TextBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Bundle\WidgetBundle\Model\Widget;

/**
 * WidgetText form type.
 */
class WidgetTextType extends WidgetType
{
    /**
     * define form fields.
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        if ($options['mode'] == Widget::MODE_STATIC || $options['mode'] === null) {
            $builder->add(
                'content',
                null,
                [
                    'label' => 'widget_text.form.content.label',
                    'required' => true
                ]
            );
        }

    }

    /**
     * bind form to WidgetRedactor entity.
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\TextBundle\Entity\WidgetText',
            'translation_domain' => 'victoire',
            'widget'             => 'Text',
        ]);
    }

    /**
     * get form name.
     *
     * @return string
     */
    public function getName()
    {
        return 'victoire_widget_form_text';
    }
}
