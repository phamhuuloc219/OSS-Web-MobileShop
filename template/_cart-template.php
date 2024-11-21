<!-- Shopping cart section  -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // delete existing cart
    if (isset($_POST['delete-cart-submit'])) {
        $Cart->deleteCart($_POST['item_id']);
    }
    
    // save for later
    if (isset($_POST['wishlist-submit'])) {
        $Cart->saveForLater($_POST['item_id']);
    }

    // clear cart
    if (isset($_POST['clear-cart-submit'])) {
        $Cart->clearCart();
    }

    // Checkout
    if (isset($_POST['product_proceed_submit'])) {
        header("Location: ./checkout.php");
        exit;
    }
}
?>

<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!-- Shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('cart') as $item) :
                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item) {
                ?>
                <!-- Cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/xiaomi_14t.png" ?>" style="height: 150px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                        <!-- Product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-15">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-roboto font-size-14">20,534 ratings</a>
                        </div>
                        <!-- !Product rating -->

                        <!-- Product quantity -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-roboto w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                            </form>
                        </div>
                        <!-- !Product quantity -->
                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            <span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo number_format($item['item_price'] ?? 0, 0, '', '.'); ?></span>&#8363;
                        </div>
                    </div>
                </div>
                <!-- !Cart item -->
                <?php
                    return $item['item_price'];
                    }, $cart);
                endforeach;
                ?>
            </div>

            <!-- Subtotal section -->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-15 font-roboto text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; 
                            <span class="text-danger"><span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span>&#8363;</span>
                        </h5>
                        <!-- Form for Proceed to Buy -->
                        <form method="post">
                            <button type="submit" name="product_proceed_submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- !Subtotal section -->

            <!-- Clear cart button -->
            <div>
                <form method="post">
                    <button type="submit" name="clear-cart-submit" class="btn btn-clear-cart font-baloo px-3 border-right border-left">Clear Cart</button>
                </form>
            </div>
        </div>
        <!-- !Shopping cart items -->
    </div>
</section>
<style>
    .btn-clear-cart {
    padding: 5px 15px;
    border: 1px solid #dc3545;
    background-color: #dc3545;
    color: white;
    font-family: 'Baloo', sans-serif;
    font-size: 14px;
    text-transform: uppercase;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-clear-cart:hover {
    background-color: #c82333;
}
</style>
