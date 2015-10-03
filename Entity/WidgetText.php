<?php
namespace Victoire\Widget\TextBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Victoire\Bundle\WidgetBundle\Entity\Widget;
use Victoire\Bundle\CoreBundle\Annotations as VIC;

/**
 * WidgetText
 *
 * @ORM\Table("vic_widget_text")
 * @ORM\Entity
 */
class WidgetText extends Widget
{
    /**
     * @ORM\Column(name="content", type="text", nullable=true)
     * @VIC\ReceiverProperty("textable")
     * @Serializer\Groups({"search"})
     */
    protected $content;

    /**
     * Set content
     * @param string $content
     *
     * @return string
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
