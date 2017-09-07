<?php
defined('C5_EXECUTE') or die(_("Access Denied."))
?>
<script type="text/javascript">

function reload_cart2() {
    $( "#ccm-image-slider-cart" ).html( '<p>Loading ...</p>' );
    $.ajax({
        url: "/get_cart_prods",
        type: 'post',
        dataType: 'json',
        success: function(response) {
            if(response['success'] == true) {
                products = response['products'];
                cartHTML = '';
                $.each( products, function( key, value ) {
                    cartHTML += '<li>';
                    cartHTML += '<div class="col-xs-12 col-sm-2 col-md-2">';
                    cartHTML += value["img_html"];
                    cartHTML += '</div>';
                    cartHTML += '<div class="col-xs-12 col-sm-2 col-md-2">';
                    cartHTML += '<h2>' + value["title"] + '</h2>';
                    cartHTML += '</div>';
                    cartHTML += '<div class="col-xs-12 col-sm-2 col-md-2">';
                    cartHTML += '<p>' + value["price"] + '</p>';
                    cartHTML += '</div>';
                    cartHTML += '<div class="col-xs-12 col-sm-2 col-md-2">';
                    cartHTML += value["description"];
                    cartHTML += '</div>';
                    cartHTML += '<div class="col-xs-12 col-sm-2 col-md-2">';
                    cartHTML += '<p>' + value["short_description"] + '</p>';
                    cartHTML += '</div>';
                    cartHTML += '<div class="col-xs-12 col-sm-2 col-md-2">';
                    cartHTML += '<button data-id="' + value['id'] + '" class="remove_from_cart">Remove from cart</button>';
                    cartHTML += '</div>';
                    cartHTML += '</li>';
                });
                $( "#ccm-image-slider-cart" ).html( cartHTML );
                $(".cart_form_container").show();
            } else {
                $( "#ccm-image-slider-cart" ).html( '<p>There are no products currently in the cart!</p>' );
                $(".cart_form_container").hide();
            }
        }
    });
}
    
$(document).on('click', '.remove_from_cart', function() { 
    event.preventDefault();
    prod_id = $(this).data('id');
    $.ajax({
        url: "/remove_from_cart/" + prod_id,
        type: 'post',
        dataType: 'json',
        success: function(response) {
            reload_cart2();
        }
    });
});
    
$(document).ready(function() {
    $('.cart_form button').click(function(event) {
        event.preventDefault();
        data = {};
        data['name'] = $('#cart_name').val();
        data['email'] = $('#cart_email').val();
        data['details'] = $('#cart_details').val();
        $.ajax({
            url: '/cart_mail',
            type: 'post',
            dataType: 'json',
            data: data,
            success: function(response) {
                $(".email_fail_notif").remove();
                if(response['success'] == true) {
                    $('.new-cart-block').after('<p class="email_success_notif">The email has been succesfully sent.</p>');
                    reload_cart2();
                    setTimeout( function() {
                        $(".email_success_notif").remove();
                    }, 5000);
                } else if(response['success'] == false) {
                    $('.new-cart-block').after('<p class="email_fail_notif">' + response["error"] + '</p>');
                }
            }
        });
    });
    
    reload_cart2();

    $('a[data-action=empty-cart]').on('click', function(event) {
        event.preventDefault();
//        console.log("pressed empty cart btn");
        $.ajax({
            url: '/empty_cart',
            type: 'post',
            success: function(response) {
                reload_cart2();
            }
        });
    });
});
</script>

<style type="text/css">
.email_fail_notif {
    padding: 5px 10px;
    background: rgba(255,0,0,0.4);
    font-weight: bold;
}
.email_success_notif {
    padding: 5px 10px;
    background: rgba(0,255,0,0.4);
    font-weight: bold;    
}
</style>

<div class="ccm-image-slider-container ccm-block-image-slider-cart new-cart-block" >
    <h2 class="products_title"><?php echo t('Products currently in cart'); ?></h2>
    <div class="ccm-image-slider">
        <div class="ccm-image-slider-inner">
            <div class="table_header">
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p><?php echo t('Image'); ?></p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p><?php echo t('Title'); ?></p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p><?php echo t('Price'); ?></p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p><?php echo t('Description'); ?></p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p><?php echo t('Short description'); ?></p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p></p>
                </div>
            </div>
            <ul class="rslides" id="ccm-image-slider-cart">
                <p>Loading ...</p>
            </ul>
        </div>
    </div>
</div>
<div class="empty_cart_container">
    <a data-action="empty-cart" href="<?php echo $view->action('refresh', Core::make('token')->generate('empty_cart'))?>"><?php echo t('Empty cart'); ?></a>
</div>
<div class="cart_form_container">
    <h2><?php echo t('Order now!'); ?></h2>
    <form action="<?php echo $this->action('cartEmail'); ?>" method="post" class="cart_form">
        <input required placeholder="<?php echo t('Name'); ?>" type="text" name="client" id="cart_name">
        <br>
        <br>
        <input required placeholder="<?php echo t('Email'); ?>" type="text" name="email" id="cart_email">
        <br>
        <br>
        <textarea required placeholder="<?php echo t('Other details...'); ?>" name="details" id="cart_details"></textarea>
        <br>
        <br>
        <button type="submit"><?php echo t('Order now!'); ?></button>
    </form>
</div>