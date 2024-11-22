<?php
    
?>

<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Thanh toán</h5>

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
                    <h5 class="font-baloo font-size-20"><?php echo "Sản phẩm trong đơn hàng: "; ?></h5>
                        
                </div>
                <div class="row py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/xiaomi_14t.png"; ?>" style="height: 150px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small>hãng <?php echo $item['item_brand'] ?? "Brand"; ?></small><br>
                        <small>số lượng <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                    </div>
                    

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            <span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo number_format($item['item_price'] ?? 0, 0, '', '.'); ?>&#8363;</span>
                        </div>
                    </div>
                </div>
                <!-- Cart item -->
                <?php
                            return $item['item_price'];
                        }, $cart); // closing array_map function
                    endforeach;
                ?>
                <div class="container mt-5">
                    <div class="form-container">
                            <h4 class="mb-4">Thông tin đặt hàng</h4>
                            
                            <!-- Form -->
                            <form action="" method="POST">
                                <!-- Người đặt hàng -->
                                <div class="form-group">
                                    <label for="fullName">Họ và tên</label>
                                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Nhập họ và tên">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email (Không bắt buộc)</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
                                </div>
                            </form>
                    </div>
                <div class="container mt-5">
                <div class="form-container">        
                        <h4 class="mb-4">Hình thức nhận hàng</h4>
                        
                        <!-- Form -->
                        <form action="" method="POST">
                            <!-- Hình thức nhận hàng -->
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="deliveryMethod" id="delivery" value="delivery">
                                    <label class="form-check-label" for="delivery">Giao hàng tận nơi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="deliveryMethod" id="pickup" value="pickup">
                                    <label class="form-check-label" for="pickup">Nhận tại cửa hàng</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Nhập Tỉnh/Thành phố, Quận/Huyện, Phường/Xã">
                            </div>

                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <textarea class="form-control" id="note" name="note" rows="3" placeholder="Ví dụ: Hãy gọi tôi khi chuẩn bị hàng xong"></textarea>
                            </div>
                    </form>
                    </div></div>
                </div>
                <div class="container mt-5">
                    <div class="form-container">
                        <h4 class="mb-4">Phương thức thanh toán</h4>
                        
                        <!-- Phương thức thanh toán -->
                        <div class="form-group">
                            <!-- Payment Option 1 -->
                            <div class="form-check payment-option">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod1" value="cashOnDelivery">
                                <img src="./assets/payment-image/cod.png" alt="VN">
                                <label class="form-check-label" for="paymentMethod1">
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>

                            <!-- Payment Option 2 -->
                            <div class="form-check payment-option">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod2" value="ATM">
                                <img src="./assets/payment-image/vnpay.png" alt="ATM">
                                <label class="form-check-label" for="paymentMethod2">
                                    Thanh toán bằng thẻ ATM nội địa (Qua VNPay)
                                </label>
                            </div>

                            <!-- Payment Option 3 -->
                            <div class="form-check payment-option">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod3" value="internationalCard">
                                <img src="./assets/payment-image/alepay.png" alt="Visa">
                                <label class="form-check-label" for="paymentMethod3">
                                    Thanh toán bằng thẻ quốc tế Visa, Master, JCB, AMEX, Apple Pay, Google Pay
                                </label>
                                <span class="discount">1 ưu đãi</span>
                            </div>

                            <!-- Payment Option 4 -->
                            <div class="form-check payment-option">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod8" value="momo">
                                <img src="./assets/payment-image/momo.png" alt="MoMo">
                                <label class="form-check-label" for="paymentMethod8">
                                    Thanh toán bằng ví MoMo
                                </label>
                            </div>

                            <!-- Payment Option 5 -->
                            <div class="form-check payment-option">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod9" value="zalopay">
                                <img src="./assets/payment-image/zalopay.png" alt="ZaloPay">
                                <label class="form-check-label" for="paymentMethod9">
                                    Thanh toán bằng ví ZaloPay
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Subtotal section -->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-15 font-roboto text-success py-3"><i class="fas fa-check"></i> Đơn hàng miễn phí vận chuyển.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Tổng ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> sản phẩm):&nbsp; 
                            <span class="text-danger"><span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?>&#8363;</span></span>
                        </h5>
                        <!-- Form for Proceed to Buy -->
                        <form method="post">
                            <button type="submit" name="buy_submit" class="btn btn-warning mt-3">Mua sắm ngay</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Subtotal section -->
        </div>
        <!-- Shopping cart items -->
         
    </div>
</section>
<style>
    .form-container {
    padding: 30px;
    background-color: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.payment-option {
    display: flex;
    align-items: center;
}

.payment-option img {
    width: 30px;
    height: 30px;
    object-fit: contain;
    margin-right: 10px;
}

.payment-option span {
    font-size: 14px;
    color: #555;
}

.payment-option .discount {
    font-size: 15px;
    color: green;
}
</style>