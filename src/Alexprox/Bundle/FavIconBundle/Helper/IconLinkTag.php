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
    private $type;

    /**
     * @var string
     */
    private $hrefFileName;

    /**
     * @param string $rel
     * @param string $sizes
     * @param string $type
     * @param bool|string $hrefFileName
     * @return IconLinkTag
     */
    public function __construct($rel, $sizes, $hrefFileName = false, $type = 'image/png')
    {
        if (!$hrefFileName) {
            $hrefFileName = $rel;
        }
        $this->rel = $rel;
        $this->sizes = $sizes;
        $this->type = $type;
        $this->hrefFileName = $hrefFileName;
    }

    /**
     * @return string
     */
    public function generate()
    {
        return sprintf(
            '<link rel="%s" sizes="%s" href="/%s-%s.png">',

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
