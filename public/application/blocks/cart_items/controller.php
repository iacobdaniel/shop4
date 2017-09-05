<?php
namespace Application\Block\CartItems;

use Concrete\Core\Block\BlockController;
//use Core;
//use Page;
//use Concrete\Core\Block\View\BlockView;

class Controller extends BlockController
{
    protected $btInterfaceWidth = "350";
    protected $btInterfaceHeight = "240";
        
    public function getBlockTypeName()
    {
        return t('Cart items');
    }

    public function getBlockTypeDescription()
    {
        return t('This block should render items currently in the cart and the cart form if there are any products.');
    }

//    public function action_refresh($token = false, $bID = false)
//    {
//        if ($this->bID != $bID) {
//            return false;
//        }
//        if (Core::make('token')->validate('empty_cart', $token)) {
//            $page = Page::getCurrentPage();
//            $u = new User();
//            $this->markLike($page->getCollectionID(), $page->getCollectionTypeID(), $u->getUserID());
//            if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
//            $b = $this->getBlockObject();
//            $bv = new BlockView($b);
//            $bv->render('view');
//            } else {
//                Redirect::page($page)->send();
//            }
//        }
//        exit;
//    }

//    public function action_custom_foo($param1 = null, $param2 = null, $param3 = null)
//    {
//        var_dump($param1);
//        var_dump($param2);
//        var_dump($param3);
//        die();
        // Custom Logic
//        $this->view();
//    }
}