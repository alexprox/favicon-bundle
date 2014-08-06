<?php

namespace Alexprox\Bundle\FavIconBundle\Helper;

use Symfony\Component\HttpFoundation\Response;

class FileResponse extends Response
{
    /**
     * @param string $data
     * @param string $contentType
     */
    public function __construct($data, $contentType = 'image/png')
    {
        parent::__construct($data, 200, array('Content-Type' => $contentType));
    }
}
