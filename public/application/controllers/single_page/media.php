<?php
namespace Application\Controller\SinglePage;

use Concrete\Core\Page\Controller\PageController;
//use \Concrete\Block\ImageSlider as Slider;
//use Concrete;

class Media extends PageController
{
//    public function on_start()
//    {
//        var_dump("ceva");
//    }

    public function view()
    {
//        $p = \Page::getByID(172);
//        var_dump($p->getCollectionName());
//        $blocksInArea = $p->getBlocks('Main');
//        $block = \Block::getByID($blocksInArea[0]->bID);
//        var_dump($block);
//        $slider = new \Concrete\Block\ImageSlider\Controller();
//        $list = $slider->getEntries();
//        var_dump($list);
//        die();
        $products = "products in the media singlepage";
        $this->set('products', $products);
    }


}