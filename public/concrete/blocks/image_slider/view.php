<?php defined('C5_EXECUTE') or die("Access Denied.");
$navigationTypeText = ($navigationType == 0) ? 'arrows' : 'pages';
$c = Page::getCurrentPage();
if ($c->isEditMode()) {
    $loc = Localization::getInstance();
    $loc->pushActiveContext(Localization::CONTEXT_UI);
    ?>
    <div class="ccm-edit-mode-disabled-item" style="<?php echo isset($width) ? "width: $width;" : '' ?><?php echo isset($height) ? "height: $height;" : '' ?>">
        <i style="font-size:40px; margin-bottom:20px; display:block;" class="fa fa-picture-o" aria-hidden="true"></i>
        <div style="padding: 40px 0px 40px 0px"><?php echo t('Image Slider disabled in edit mode.')?>
			<div style="margin-top: 15px; font-size:9px;">
				<i class="fa fa-circle" aria-hidden="true"></i>
				<?php if (count($rows) > 0) { ?>
					<?php foreach (array_slice($rows, 1) as $row) { ?>
						<i class="fa fa-circle-thin" aria-hidden="true"></i>
						<?php }
					}
				?>
			</div>
        </div>
    </div>
    <?php
    $loc->popActiveContext();
} else {
    ?>
<script>
function reload_cart() {
    $( "#ccm-image-slider-cart" ).html( '<p>Loading ...</p>' );
    $.ajax({
        url: "/index.php/get_cart_prods",
        type: 'post',
        dataType: 'json',
        success: function(response) {
            console.log('success get cart products');
            if(response['success'] == "true") {
                products = response['products'];
//                console.log(products);
                cartHTML = '';
                $.each( products, function( key, value ) {
//                    console.log(value);
                    cartHTML += '<li>';
                        cartHTML += '<div class="col-xs-12 col-sm-2 col-md-2">';
                            cartHTML += '<img src="http://via.placeholder.com/350x150" />';
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
//                console.log(cartHTML);
                $( "#ccm-image-slider-cart" ).html( cartHTML );
                $('.ccm-block-image-slider-cart').next('.container').show();
            } else {
                $( "#ccm-image-slider-cart" ).html( '<p>There are no products currently in the cart!</p>' );
                $('.ccm-block-image-slider-cart').next('.container').hide();
            }
        }
    }).fail(function(response)  {
        console.log('fail get cart products');
    });
}
    
$(document).ready(function() {
    $('.add_to_cart').click(function(event) {
        event.preventDefault();
        console.log('click on add to cart');
        prod_id = $(this).data('id');
        console.log(prod_id);
        $.ajax({
            url: "/index.php/add_to_cart/" + prod_id,
            type: 'post',
            dataType: 'json',
            success: function(response) {
                console.log('success');
                console.log(response);
                if(response['success'] == 'already') {
                    alert('The product has been already added in the cart!');
                } else {
                    reload_cart();
                }
            }
        }).fail(function(response)  {
            console.log('fail add to cart');
            console.log(response);
        });
    });
    
    $('.remove_from_cart').click(function(event) {
        event.preventDefault();
        console.log('click on remove from cart');
        
        prod_id = $(this).data('id');
        console.log(prod_id);
        
        $.ajax({
            url: "/index.php/remove_from_cart/" + prod_id,
            type: 'post',
            dataType: 'json',
            success: function(response) {
                console.log('success');
                console.log(response);
                reload_cart();
            }
        }).done(function(response) {
            console.log('done remove from cart');
            console.log(response);
        }).fail(function(response)  {
            console.log('fail remove from cart');
            console.log(response);
        });
    });
    
    reload_cart();
    
	<?php /*
    $(function () {
        $("#ccm-image-slider-<?php echo $bID ?>").responsiveSlides({
            prevText: "",   // String: Text for the "previous" button
            nextText: "",
		<?php if ($navigationType == 0) {?>
		nav:true,
		<?php
		}elseif($navigationType == 1) {?> 
		pager: true,
		<?php }
		else{?>
		nav:true,
		pager: true,
		<?php }?>
            <?php if ($timeout) { echo "timeout: $timeout,"; } ?>
            <?php if ($speed) { echo "speed: $speed,"; } ?>
            <?php if ($pause) { echo "pause: true,"; } ?>
            <?php if ($noAnimate) { echo "auto: false,"; } ?>
            <?php if ($maxWidth) { echo "maxwidth: $maxWidth,"; } ?>
        });
    });
    */ ?>
});
    
$(document).on('click', '.remove_from_cart', function() { 
    event.preventDefault();
    console.log('click on remove from cart');
    prod_id = $(this).data('id');
    console.log(prod_id);
    $.ajax({
        url: "/index.php/remove_from_cart/" + prod_id,
        type: 'post',
        dataType: 'json',
        success: function(response) {
            console.log('success');
            console.log(response);
            reload_cart();
        }
    }).done(function(response) {
        console.log('done remove from cart');
        console.log(response);
    }).fail(function(response)  {
        console.log('fail remove from cart');
        console.log(response);
    });
});
</script>

<div class="ccm-image-slider-container ccm-block-image-slider-<?php echo $navigationTypeText?>" >
    <h2 class="products_title">My products</h2>
    <div class="ccm-image-slider">
        <div class="ccm-image-slider-inner">
            <div class="table_header">
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p>Image</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p>Title</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p>Price</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p>Description</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p>Short description</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p></p>
                </div>
            </div>
            <?php if (count($rows) > 0) { ?>
            <ul class="rslides" id="ccm-image-slider-<?php echo $bID ?>">
                <?php foreach ($rows as $row) { ?>
                    <li>
                        <?php /* if ($row['linkURL']) { ?>
                            <a href="<?php echo $row['linkURL'] ?>" class="mega-link-overlay"></a>
                        <?php } */ ?>
                        <?php $f = File::getByID($row['fID']) ?>
                        <div class="col-xs-12 col-sm-2 col-md-2">
                            <?php 
                            if (is_object($f)) {
                                $tag = Core::make('html/image', array($f, false))->getTag();
                                if ($row['title']) {
                                    $tag->alt($row['title']);
                                } else {
                                    $tag->alt("slide");
                                }
                                echo $tag;
                            }
                            ?>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2">
                            <?php if ($row['title']) { ?>
                                <h2 class="ccm-image-slider-title"><?php echo $row['title'] ?></h2>
                            <?php } ?>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2">
                            <p><?php echo $row['price'] ?></p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2">
                            <?php echo $row['description'] ?>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2">
                            <p><?php echo $row['short_description'] ?></p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2">
                            <button data-id="<?php echo $row['id'] ?>" class="add_to_cart">Add to cart</button>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <?php } else { ?>
            <div class="ccm-image-slider-placeholder">
                <p><?php echo t('No Slides Entered.'); ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="ccm-image-slider-container ccm-block-image-slider-cart" >
    <h2 class="products_title">Products currently in cart</h2>
    <div class="ccm-image-slider">
        <div class="ccm-image-slider-inner">
            <div class="table_header">
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p>Image</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p>Title</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p>Price</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p>Description</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <p>Short description</p>
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
<?php } ?>
