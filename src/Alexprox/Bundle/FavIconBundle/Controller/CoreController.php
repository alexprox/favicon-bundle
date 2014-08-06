<?php

namespace Alexprox\Bundle\FavIconBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller
{
    /**
     * @param string $imageId
     * @param string $image
     * @return bool
     */
    protected function saveImageToCache($imageId, $image)
    {
        $cacheService = $this->getCacheService();

        return $cacheService->save($imageId, $image);
    }

    /**
     * @param string $imageId
     * @return null|string
     */
    protected function getImageFromCache($imageId)
    {
        $cacheService = $this->getCacheService();

        if (!$cacheService->contains($imageId)) {
            return null;
        }

        return $cacheService->fetch($imageId);
    }

    /**
     * @return string
     */
    protected function getIconPath()
    {
        return $this->getKernel()->getRootDir().'/../web/icon.png';
    }

    /**
     * @return string
     */
    protected function getIcon()
    {
        return file_get_contents($this->getIconPath());
    }

    /**
     * @return AppKernel
     */
    protected function getKernel()
    {
        return $this->get('kernel');
    }

    /**
     * @return \Doctrine\Common\Cache\FilesystemCache
     */
    protected function getCacheService()
    {
        return $this->get('cache_bundle.cache');
    }

    /**
     * @param string $type
     * @param string $size
     * @return string
     */
    protected function getImageIdByTypeAndSize($type, $size)
    {
        return 'icon_'.md5($type.$size);
    }

    /**
     * @param string $size
     * @return int
     */
    protected function getSizeFromParameter($size)
    {
        $size = explode('x', $size);
        if (isset($size[0])) {
            return intval($size[0]);
        }

        return 260;
    }

    /**
     * @param int $size
     * @return string
     */
    protected function getResized($size)
    {
        $imagick = new \Imagick($this->getIconPath());

        $imagick->resizeImage($size, $size, \Imagick::FILTER_BOX, 1);

        return $imagick->getImageBlob();
    }

    /**
     * @return string
     */
    protected function getIco()
    {
        $imagick = new \Imagick($this->getIconPath());

        $imagick->resizeImage(48, 48, \Imagick::FILTER_BOX, 1);
        $imagick->setImageFormat("ico");

        return $imagick->getImageBlob();
    }
}
