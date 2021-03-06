<?php

namespace Application\Block\Audio;

use Concrete\Core\Block\BlockController;
use Concrete\Core\Asset\AssetList;
use Concrete\Core\Asset\Asset;


defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends BlockController
{

    protected $btTable = "btAudio";
    protected $btInterfaceWidth = "350";
    protected $btInterfaceHeight = "290";
    protected $btDefaultSet = "multimedia";

    public function getBlockTypeName()
    {
        return t('Audio player');
    }

    public function getBlockTypeDescription()
    {
        return t('Play an audio on your website.');
    }

//    public function on_start()
//    {
//        $al = AssetList::getInstance();
//    }

}