<?php

namespace Alexprox\Bundle\FavIconBundle\Controller;

use Alexprox\Bundle\FavIconBundle\Helper\FileResponse;

class XmlController extends CoreController
{
    /**
     * @return FileResponse
     */
    public function getAction()
    {
        $rootNode = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><browserconfig></browserconfig>');

        $msApplication = $rootNode->addChild('msapplication');
        $tile = $msApplication->addChild('tile');
        $tile->addChild('square70x70logo')->addAttribute('src', '/mstile-70x70.png');
        $tile->addChild('square150x150logo')->addAttribute('src', '/mstile-150x150.png');
        $tile->addChild('square310x310logo')->addAttribute('src', '/mstile-310x310.png');
        $tile->addChild('wide310x150logo')->addAttribute('src', '/mstile-310x150.png');
        $tile->addChild('TileColor', '#a780e2');

        return new FileResponse($rootNode->asXML(), 'text/xml');
    }
}
