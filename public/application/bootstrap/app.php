<?php
/* @var Concrete\Core\Application\Application $app */
/* @var Concrete\Core\Console\Application $console only set in CLI environment */

/*
 * ----------------------------------------------------------------------------
 * # Custom Application Handler
 *
 * You can do a lot of things in this file.
 *
 * ## Set a theme by route:
 *
 * Route::setThemeByRoute('/login', 'greek_yogurt');
 *
 *
 * ## Register a class override.
 *
 * $app->bind('helper/feed', function() {
 * 	 return new \Application\Core\CustomFeedHelper();
 * });
 *
 * $app->bind('\Concrete\Attribute\Boolean\Controller', function($app, $params) {
 * 	return new \Application\Attribute\Boolean\Controller($params[0]);
 * });
 *
 * ## Register Events.
 *
 * Events::addListener('on_page_view', function($event) {
 * 	$page = $event->getPageObject();
 * });
 *
 *
 * ## Register some custom MVC Routes
 *
 * Route::register('/test', function() {
 * 	print 'This is a contrived example.';
 * });
 *
 * Route::register('/custom/view', '\My\Custom\Controller::view');
 * Route::register('/custom/add', '\My\Custom\Controller::add');
 *
 * ## Pass some route parameters
 *
 * Route::register('/test/{foo}/{bar}', function($foo, $bar) {
 *  print 'Here is foo: ' . $foo . ' and bar: ' . $bar;
 * });
 *
 *
 * ## Override an Asset
 *
 * use \Concrete\Core\Asset\AssetList;
 * AssetList::getInstance()
 *     ->getAsset('javascript', 'jquery')
 *     ->setAssetURL('/path/to/new/jquery.js');
 *
 * or, override an asset by providing a newer version.
 *
 * use \Concrete\Core\Asset\AssetList;
 * use \Concrete\Core\Asset\Asset;
 * $al = AssetList::getInstance();
 * $al->register(
 *   'javascript', 'jquery', 'path/to/new/jquery.js',
 *   array('version' => '2.0', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false)
 *   );
 *
 * ----------------------------------------------------------------------------
 */

/*
Route::register('/test/{foo}/{bar}', function($foo, $bar) {
	print 'Here is foo: ' . $foo . ' and bar: ' . $bar;
});
*/

Route::register('/add_to_cart/{prod_id}', function($prod_id = null) {
	if((is_numeric($prod_id) && $prod_id > 0 && $prod_id == round($prod_id))) { // check if variable is a positive integer
		$prod_id = (int)$prod_id;
        $session = $this->app['session']; //this is the app session, important!
        $cart_ids = $session->get('cart_ids');
        if(is_null($cart_ids) || empty($cart_ids)) {
            $session->set('cart_ids', [0 => $prod_id]);
        } else {
            if(!in_array($prod_id, $cart_ids)) {
                array_push($cart_ids, $prod_id);
                $session->set('cart_ids', $cart_ids);
            } else {
                return json_encode(['success' => 'already']);
            }
        }
        $cart_ids_final = $session->get('cart_ids');
    } else {
		return json_encode(['success' => 'false']);
	}
	return json_encode(['success' => 'true', 'id' => $prod_id]);
});

Route::register('/remove_from_cart/{prod_id}', function($prod_id = null) {
	if((is_numeric($prod_id) && $prod_id > 0 && $prod_id == round($prod_id))) { // check if variable is a positive integer
        $prod_id = (int)$prod_id;
        $session = $this->app['session']; //this is the app session, important!
        $cart_ids = $session->get('cart_ids');
        if(is_array($cart_ids)) {
            $cart_ids = array_diff($cart_ids, [$prod_id]);
        }
        $cart_ids = array_values($cart_ids);
        $session->set('cart_ids', $cart_ids);
	    return json_encode(['success' => 'true', 'id' => $prod_id]);
    } else {
        return json_encode(['success' => 'false']);
    }
});

Route::register('/empty_cart', function() {
    $session = $this->app['session']; //this is the app session, important!
    $session->set('cart_ids', []);
    return json_encode(['success' => 'true']);
});

Route::register('/get_cart', function() {
    $session = $this->app['session']; //this is the app session, important!
    $cart_ids = $session->get('cart_ids');
    return json_encode(['success' => 'true']);
});

Route::register('/get_cart_prods', function() {
    $session = $this->app['session']; //this is the app session, important!
    $cart_ids = $session->get('cart_ids');
    $counter = count($cart_ids);
    if($counter != 0) {
        $qst_marks = '';
        for ($i = 1; $i <= $counter; $i++) {
            if($i != $counter) {
                $qst_marks .= '?,';
            } else {
                $qst_marks .= '?';
            }
        }
        $query_string = 'SELECT * from btImageSliderEntries WHERE id IN (' . $qst_marks . ') ORDER BY sortOrder';
        $db = Database::get();
        $query = $db->GetAll($query_string, $cart_ids);
        foreach($query as $key => $product) {
            $f = File::getByID($product['fID']);
            $tag = Core::make('html/image', array($f, false))->getTag();
            ob_start();
            echo $tag;
            $img_html = ob_get_clean();
            $query[$key]['img_html'] = $img_html;
        }
        return json_encode(['success' => 'true', 'products' => $query]);
    } else {
        return json_encode(['success' => 'fail']);
    }
});

Route::register('/cart_mail', function() {
    $session = $this->app['session'];
    $cart_ids = $session->get('cart_ids');
    $counter = count($cart_ids);
    $products_names = '';
    if($counter != 0) {
        $qst_marks = '';
        for ($i = 1; $i <= $counter; $i++) {
            if($i != $counter) {
                $qst_marks .= '?,';
            } else {
                $qst_marks .= '?';
            }
        }
        $query_string = 'SELECT * from btImageSliderEntries WHERE id IN (' . $qst_marks . ') ORDER BY sortOrder';
        $db = Database::get();
        $query = $db->GetAll($query_string, $cart_ids);
        foreach($query as $key => $product) {
            $products_names .= $product['title'] . ', ';
        }
        $product_names = substr($product_names, 0, -2);
    } else {
        return json_encode(['success' => 'false', 'error' => t('There are no products in the cart.')]);
    }
    if(!isset($_POST['name']) || $_POST['name'] == "") {
        return json_encode(['success' => 'false', 'error' => t('The name field is required.')]);
    }
    if(!isset($_POST['email']) || $_POST['email'] == "") {
        return json_encode(['success' => 'false', 'error' => t('The email field is required.')]);
    }
    if(!isset($_POST['details']) || $_POST['details'] == "") {
        return json_encode(['success' => 'false', 'error' => t('The details textarea is required.')]);
    }
    
    $name = strip_tags($_POST["name"]);
    $email = strip_tags($_POST["email"]);
    $details = strip_tags($_POST["details"]);
    
    $bodyHTML = '';
    $bodyHTML .= '<!DOCTYPE html>';
    $bodyHTML .= '<html lang="de">';
    $bodyHTML .= '<head>';
        $bodyHTML .= '<meta charset="utf-8">';
    $bodyHTML .= '</head>';
    $bodyHTML .= '<body>';
        $bodyHTML .= '<div>';
            $bodyHTML .= '<p>' . t("Name") . ': ' . $name . '</p>';
            $bodyHTML .= '<p>' . t("Email") . ': ' . $email . '</p>';
            $bodyHTML .= '<p>' . t("Details") . ': ' . $details . '</p>';
            $bodyHTML .= '<p>' . t("Ordered products") . ': ' . $product_names . '</p>';
        $bodyHTML .= '</div>';
    $bodyHTML .= '</body>';
    $bodyHTML .= '</html>';
    
    $mailService = Core::make('mail');
    $mailService->setBodyHTML($bodyHTML);
    $mailService->setSubject(t("New order!"));
    $mailService->from('from_user@server.com', 'From User');
    $mailService->to('client@client.com', 'Client');
    $mailService->sendMail();
    
    $session->set('cart_ids', []);
    
    return json_encode(['success' => 'true']);
});