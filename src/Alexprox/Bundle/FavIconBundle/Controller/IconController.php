<?php

namespace Alexprox\Bundle\FavIconBundle\Controller;

use Alexprox\Bundle\FavIconBundle\Helper\FileResponse;

class IconController extends CoreController
{
    /**
     * @param string $type
     * @param string $size
     * @return FileResponse
     */
    public function getPngAction($type, $size)
    {
        $id = $this->getImageIdByTypeAndSize($type, $size);

        $image = $this->getImageFromCache($id);

        if (is_null($image)) {
            $size = $this->getSizeFromParameter($size);
            $image = $this->getResized($size);
            $this->saveImageToCache($id, $image);
        }

        return new FileResponse($image);
    }

    /**
     * @return FileResponse
     */
    public function getIcoAction()
    {
        $id = $this->getImageIdByTypeAndSize('favicon', 48);

        $image = $this->getImageFromCache($id);

        if (is_null($image)) {
            $image = $this->getIco();
            $this->saveImageToCache($id, $image);
        }

        return new FileResponse($image, 'image/x-icon');
    }

    /**
     * @return FileResponse
     */
    public function getDefaultAction()
    {
        return $this->forward('AlexproxFavIconBundle:Icon:getPng', array(
            'type' => 'apple-touch-icon',
            'size' => '152x152'
        ));
    }
}
