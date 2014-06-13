<?php
namespace Victoire\Widget\TextBundle\Translation;

use JMS\TranslationBundle\Model\Message;
use JMS\TranslationBundle\Translation\TranslationContainerInterface;
use JMS\TranslationBundle\Model\FileSource;

/**
 *
 * @author Thomas Beaujean
 *
 */
class DynamicTranslations implements TranslationContainerInterface
{
    /**
     * Get the translations
     *
     * @return multitype:\JMS\TranslationBundle\Model\Message
     */
    public static function getTranslationMessages()
    {
        return array(
            new Message('widget.text.new.action.label', 'victoire'),
            new Message('modal.form.widget.type.text.label', 'victoire')
        );
    }
}
