<?php

namespace Alexprox\Bundle\FavIconBundle\Twig;

use Alexprox\Bundle\FavIconBundle\Helper\IconMetaTag;
use Alexprox\Bundle\FavIconBundle\Helper\IconLinkTag;

class MetaIconExtension extends \Twig_Extension
{
    /**
     * @param string $hexColor
     * @return array
     */
    private function getTags($hexColor)
    {
        return array(
            new IconLinkTag('apple-touch-icon', '57x57'),
            new IconLinkTag('apple-touch-icon', '60x60'),
            new IconLinkTag('apple-touch-icon', '72x72'),
            new IconLinkTag('apple-touch-icon', '76x76'),
            new IconLinkTag('apple-touch-icon', '114x114'),
            new IconLinkTag('apple-touch-icon', '120x120'),
            new IconLinkTag('apple-touch-icon', '144x144'),
            new IconLinkTag('apple-touch-icon', '152x152'),
            new IconLinkTag('icon', '16x16', 'favicon'),
            new IconLinkTag('icon', '32x32', 'favicon'),
            new IconLinkTag('icon', '96x96', 'favicon'),
            new IconLinkTag('icon', '160x160', 'favicon'),
            new IconLinkTag('icon', '196x196', 'favicon'),

            new IconMetaTag('msapplication-TileColor', $hexColor),
            new IconMetaTag('msapplication-TileImage', '/mstile-144x144.png')
        );
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('icons', array($this, 'iconsFilter'))
        );
    }

    /**
     * @param string $msHexColor
     * @return string
     */
    public function iconsFilter($msHexColor)
    {
        $content = '';

        foreach ($this->getTags($msHexColor) as $tag) {
            /**
             * @var IconLinkTag|IconMetaTag $tag
             */
            $content .= $tag->generate();
        }

        return $content;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'alexprox_favicon_extension';
    }
}
