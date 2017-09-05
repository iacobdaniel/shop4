<?php

namespace Application\Controller;

use Concrete\Core\Page\Controller\PageController;

class Shop extends PageController
{

    public function asd()
    {
        dd($this->post('x'));
    }

}