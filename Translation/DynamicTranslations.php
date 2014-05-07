<?php
namespace Victoire\TextBundle\Translation;

use JMS\TranslationBundle\Model\Message;
use JMS\TranslationBundle\Translation\TranslationContainerInterface;
use JMS\TranslationBundle\Model\FileSource;

class DynamicTranslations implements TranslationContainerInterface
{
    public static function getTranslationMessages()
    {
        return array(
            new Message('widget.text.new.action.label', 'victoire'),
            new Message('modal.form.widget.type.text.label', 'victoire')
        );
    }
}
