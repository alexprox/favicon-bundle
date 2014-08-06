<?php

namespace Alexprox\Bundle\FavIconBundle\Helper;

class IconMetaTag
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @param string $name
     * @param string $content
     */
    public function __construct($name, $content)
    {
        $this->name = $name;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function generate()
    {
        return sprintf(
            '<meta name="%s" content="%s">',

            $this->name,
            $this->content
        );
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->generate();
    }
}
