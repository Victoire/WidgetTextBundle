<?php
namespace Victoire\TextBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\CmsBundle\Entity\Widget;
use Victoire\CmsBundle\Annotations as VIC;

/**
 * WidgetText
 *
 * @ORM\Table("cms_widget_text")
 * @ORM\Entity
 */
class WidgetText extends Widget
{
    use \Victoire\CmsBundle\Entity\Traits\WidgetTrait;

    /**
     * @var text
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     * @VIC\ReceiverProperty("textable")
     */
    protected $content;

    /**
     * Set content
     *
     * @param string $content
     * @return content
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
    /**
     * Set secondary
     *
     * @param string $secondary
     * @return secondary
     */
    public function setSecondary($secondary)
    {
        $this->secondary = $secondary;

        return $this;
    }

    /**
     * Get secondary
     *
     * @return string
     */
    public function getSecondary()
    {
        return $this->secondary;
    }

}
