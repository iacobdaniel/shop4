<?php

namespace Application\Controller;

use Concrete\Core\Page\Controller\PageController;

class Cart extends PageController
{
    /**
     * The valid products and all other attributes for these products are found in the btImageSliderEntries table in the DB
     * This function adds a product to cart
     *
     * @param null $prod_id - ID of the product to be added to the cart stored in the session variable
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addToCart($prod_id = null)
    {
        $json = \Core::make(\Concrete\Core\Http\ResponseFactoryInterface::class);

        if ((is_numeric($prod_id) && $prod_id > 0 && $prod_id == round($prod_id))) { // check if variable is a positive integer
            $query_string = 'SELECT * from btImageSliderEntries WHERE id = ? ORDER BY sortOrder';
            $db = \Database::connection();
            $prod_id_arr = [];
            $prod_id_arr[] = $prod_id;
            $query = $db->fetchAll($query_string, $prod_id_arr);

            if(empty($query)) {
                return $json->json(['success' => false, 'code' => 'not_exist']); // product does not exist
            }

            $session = $this->app['session'];
            $cart_ids = $session->get('cart_ids') ?: [];

            if (in_array($prod_id, $cart_ids)) {
                return $json->json(['success' => false, 'code' => 'already']); // product is already added to cart
            }

            $cart_ids[] = $prod_id;
            $session->set('cart_ids', $cart_ids);

            return $json->json(['success' => true, 'code' => 'added']); // product succesfully added to cart
        } else {
            return $json->json(['success' => false, 'code' => 'invalid']); // sent product id parameter is not valid
        }
    }

    /**
     * The valid products and all other attributes for these products are found in the btImageSliderEntries table in the DB
     * This function removes a prodct from the cart
     *
     * @param null $prod_id - ID of the product to be removed from the cart by deleting it from the session variable, if it exists
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeFromCart($prod_id = null)
    {
        $json = \Core::make(\Concrete\Core\Http\ResponseFactoryInterface::class);

        if ((is_numeric($prod_id) && $prod_id > 0 && $prod_id == round($prod_id))) { // check if variable is a positive integer
            $prod_id = (int)$prod_id;
            $session = $this->app['session'];
            $cart_ids = $session->get('cart_ids');

            if (is_array($cart_ids)) {
                $cart_ids = array_diff($cart_ids, [$prod_id]);
            }

            $cart_ids = array_values($cart_ids);
            $session->set('cart_ids', $cart_ids);

            return $json->json(['success' => true]);
        } else {
            return $json->json(['success' => false]);
        }
    }

    /**
     * The session variable storing the product ID's in the cart will be set to an empty array
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function emptyCart()
    {
        $session = $this->app['session'];
        $session->set('cart_ids', []);

        return \Core::make(\Concrete\Core\Http\ResponseFactoryInterface::class)->json(['success' => true]);
    }

    /**
     * Get information for the products stored in the session variable in the cart
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getCartProducts()
    {
        $json = \Core::make(\Concrete\Core\Http\ResponseFactoryInterface::class);

        $session = $this->app['session']; //this is the app session, important!
        $cart_ids = $session->get('cart_ids');
        $counter = count($cart_ids);
        if ($counter != 0) {
            $qst_marks = '';
            for ($i = 1; $i <= $counter; $i++) {
                if ($i != $counter) {
                    $qst_marks .= '?,';
                } else {
                    $qst_marks .= '?';
                }
            }

            $query_string = 'SELECT * from btImageSliderEntries WHERE id IN (' . $qst_marks . ') ORDER BY sortOrder';
            $db = \Database::connection();
            $query = $db->fetchAll($query_string, $cart_ids);

            foreach ($query as $key => $product) {
                $f = \File::getByID($product['fID']);

                /** @var \HtmlObject\Image $tag */
                $tag = \Core::make('html/image', array($f, false))->getTag();

                $query[$key]['img_html'] = $tag->render();
            }

            return $json->json(['success' => true, 'products' => $query]);
        } else {
            return $json->json(['success' => fail]);
        }
    }

    /**
     * Send an email with all the products stored in the session variable.
     * Cart will be set to empty.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function cartMail()
    {
        $json = \Core::make(\Concrete\Core\Http\ResponseFactoryInterface::class);

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
            $db = \Database::connection();
            $query = $db->fetchAll($query_string, $cart_ids);

            foreach($query as $key => $product) {
                $products_names .= $product['title'] . ', ';
            }

            $products_names = substr($products_names, 0, -2);
        } else {
            return $json->json(['success' => false, 'error' => t('There are no products in the cart.')]);
        }

        $name = strip_tags($this->post('name'));
        $email = strip_tags($this->post('email'));
        $details = strip_tags($this->post('details'));
        if(!isset($name) || $name == "") {
            return $json->json(['success' => false, 'error' => t('The name field is required.')]);
        }

        if(!isset($email) || $email == "") {
            return $json->json(['success' => false, 'error' => t('The email field is required.')]);
        }

        if(!isset($details) || $details == "") {
            return $json->json(['success' => false, 'error' => t('The details textarea is required.')]);
        }

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
                $bodyHTML .= '<p>' . t("Ordered products") . ': ' . $products_names . '</p>';
            $bodyHTML .= '</div>';
        $bodyHTML .= '</body>';
        $bodyHTML .= '</html>';

        $mailService = \Core::make('mail');
        $mailService->setBodyHTML($bodyHTML);
        $mailService->setSubject(t("New order!"));
        $mailService->from('from_user@server.com', 'From User');
        $mailService->to('client@client.com', 'Client');
        $mailService->sendMail();

        $session->set('cart_ids', []);

        return $json->json(['success' => true]);
    }

}