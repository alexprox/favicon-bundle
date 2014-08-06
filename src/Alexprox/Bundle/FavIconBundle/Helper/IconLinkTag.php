<?php

namespace Alexprox\Bundle\FavIconBundle\Helper;

class IconLinkTag
{
    /**
     * @var string
     */
    private $rel;

    /**
     * @var string
     */
    private $sizes;

    /**
     * @var string
     */
    private $hrefFileName;

    /**
     * @param string $rel
     * @param string $sizes
     * @param bool|string $hrefFileName
     * @return IconLinkTag
     */
    public function __construct($rel, $sizes, $hrefFileName = false)
    {
        if (!$hrefFileName) {
            $hrefFileName = $rel;
        }
        $this->rel = $rel;
        $this->sizes = $sizes;
        $this->hrefFileName = $hrefFileName;
    }

    /**
     * @return string
     */
    public function generate()
    {
        return sprintf(
            '<link rel="%s" sizes="%s" href="/%s-%s.png" type="image/png">',

            $this->rel,
            $this->sizes,
            $this->hrefFileName,
            $this->sizes
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
