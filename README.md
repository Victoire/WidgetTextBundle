[![CircleCI](https://circleci.com/gh/Victoire/WidgetTextBundle.svg?style=shield)](https://circleci.com/gh/Victoire/WidgetTextBundle)

Victoire Text Bundle
============

## What is the purpose of this bundle

This bundles gives you access to the *Text Widget*.

## Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/doc/setup.md)*

## Install the bundle

    php composer.phar require victoire/text-widget

### Reminder

Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\TextBundle\VictoireWidgetTextBundle(),
            );

            return $bundles;
        }
    }
