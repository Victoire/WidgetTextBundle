<?php

namespace Victoire\Widget\TextBundle\Widget\Manager;

use Victoire\Bundle\CoreBundle\Widget\Managers\BaseWidgetManager;
use Victoire\Bundle\CoreBundle\Entity\Widget;
use Victoire\Bundle\CoreBundle\Widget\Managers\WidgetManagerInterface;

/**
 * CRUD operations on WidgetRedactor Widget
 *
 * The widget view has two parameters: widget and content
 *
 * widget: The widget to display, use the widget as you wish to render the view
 * content: This variable is computed in this WidgetManager, you can set whatever you want in it and display it in the show view
 *
 * The content variable depends of the mode: static/businessEntity/entity/query
 *
 * The content is given depending of the mode by the methods:
 *  getWidgetStaticContent
 *  getWidgetBusinessEntityContent
 *  getWidgetEntityContent
 *  getWidgetQueryContent
 *
 * So, you can use the widget or the content in the show.html.twig view.
 * If you want to do some computation, use the content and do it the 4 previous methods.
 *
 * If you just want to use the widget and not the content, remove the method that throws the exceptions.
 *
 * By default, the methods throws Exception to notice the developer that he should implements it owns logic for the widget
 *
 */
class WidgetTextManager extends BaseWidgetManager implements WidgetManagerInterface
{
    /**
     * Get the static content of the widget
     * @param Widget $widget
     *
     * @return string The static content
     */
    protected function getWidgetStaticContent(Widget $widget)
    {
        $content = $widget->getContent();

        return $content;
    }

    /**
     * Get the business entity content
     * @param Widget $widget
     *
     * @return Ambigous <string, unknown, \Victoire\Bundle\CoreBundle\Widget\Managers\mixed, mixed>
     */
    protected function getWidgetBusinessEntityContent(Widget $widget)
    {
        //get the entity
        $entity = $widget->getBusinessEntity();

        //display a generic content if no entity were specified
        if ($entity === null) {
            $content = $this->getWidgetGenericBusinessEntityContent($widget);
        } else {
            //get the content of the widget with its entity
            $content = $this->getWidgetEntityContent($widget);
        }

        return $content;
    }

    /**
     * Get the content of the widget by the entity linked to it
     *
     * @param Widget $widget
     *
     * @return string
     *
     * @throws \Exception
     */
    protected function getWidgetEntityContent(Widget $widget)
    {
        //the result
        $content = '';

        $entity = $widget->getBusinessEntity();

        if ($entity === null) {
            throw new \Exception('The widget ['.$widget->getId().'] has no entity to display.');
        }

        $content = $this->getEntityContent($widget, $entity);

        return $content;
    }

    /**
     * Get the content for an entity and a widget given
     * @param Widget  $widget
     * @param unknown $entity
     *
     * @throws \Exception
     * @return \Victoire\Bundle\CoreBundle\Widget\Managers\mixed
     */
    protected function getEntityContent(Widget $widget, $entity)
    {
        $content = '';

        $fields = $widget->getFields();

        //test that the widget has some fields
        if (count($fields) === 0) {
            throw new \Exception('The widget ['.$widget->getId().'] has no field to display.');
        }

        if ($entity !== null) {
            //parse the field
            foreach ($fields as $field) {
                //get the value of the field
                $attributeValue =  $this->getEntityAttributeValue($entity, $field);
                //concantene values
                $content .= $attributeValue;
            }
        }

        return $content;
    }

    /**
     * Get the content of the widget for the query mode
     *
     * @param Widget $widget
     *
     * @return string The Content
     *
     * @throws \Exception
     */
    protected function getWidgetQueryContent(Widget $widget)
    {
        $content = '';

        $entities = $this->getWidgetQueryResults($widget);

        foreach ($entities as $entity) {
            $content .= $this->getEntityContent($widget, $entity). ' ';
        }

        return $content;
    }

    /**
     * Get the generic name of the business EntityWidget
     *
     * @param Widget $widget
     *
     * @return string
     *
     * @throws \Exception
     */
    protected function getWidgetGenericBusinessEntityContent(Widget $widget)
    {
        $entityName = $widget->getBusinessEntityName();

        $content = $entityName.' -> ';

        $fields = $widget->getFields();

        //test that the widget has some fields
        if (count($fields) === 0) {
            throw new \Exception('The widget ['.$widget->getId().'] has no field to display.');
        }

        //parse the field
        foreach ($fields as $field) {
            //concantene values
            $content .= $field;
        }

        return $content;
    }
}
