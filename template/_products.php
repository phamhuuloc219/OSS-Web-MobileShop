<?php
error_reporting(0);
ini_set('log_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['product_submit'])) {
        if (isset($_POST['user_id'], $_POST['item_id'])) {
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }

    if (isset($_POST['product_proceed_submit'])) {
        if (isset($_POST['user_id'], $_POST['item_id'])) {
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
            header("Location: cart.php");
            exit();
        }
    }
}

$item_id = $_GET['item_id'] ?? 1;
foreach ($product->getData() as $item) :
    if ($item['item_id'] == $item_id) :

?>
        <section id="temp">
            <div class="container py-5 text-center">
            </div>
        </section>
        <!--   product  -->
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/xiaomi_14t.png" ?>" alt="product" class="img-fluid">
                        <div class="form-row pt-4 font-size-16 font-baloo">
                            <div class="col">
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])) {
                                        echo '<button type="submit" disable name="product_proceed_submit" class="btn btn-danger form-control" formaction="cart.php">Mua ngay</button>';
                                    } else {
                                        echo '<button type="submit" name="product_proceed_submit" class="btn btn-danger form-control" formaction="cart.php">Mua ngay</button>';
                                    }
                                    ?>
                                </form>
                            </div>

                            <div class="col">
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success form-control">Đã có trong giỏ hàng</button>';
                                    } else {
                                        echo '<button type="submit" name="product_submit" class="btn btn-warning form-control">Thêm vào giỏ hàng</button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small>hãng <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                        <div class="d-flex">
                        <?php
                            $rating = mt_rand(8, 10) / 2;
                            $fullStars = floor($rating);
                            $emptyStars = 5 - ceil($rating);

                            echo '<div class="rating text-warning font-size-15">';
                            for ($i = 0; $i < $fullStars; $i++) {
                                echo '<span><i class="fas fa-star"></i></span>';
                            }

                            if ($rating - $fullStars >= 0.5) {
                                echo '<span><i class="fas fa-star-half-alt"></i></span>';
                            }

                            for ($i = 0; $i < $emptyStars; $i++) {
                                echo '<span><i class="far fa-star"></i></span>';
                            }
                            echo '</div>';
                            ?>
                            <a href="#" class="px-2 font-roboto font-size-14"><?php
                                                                                $randomNumber = mt_rand(400, 1000);
                                                                                echo $randomNumber;
                                                                                ?> đánh giá | <?php
                                                                                                $randomNumber = mt_rand(100, 900);
                                                                                                echo $randomNumber;
                                                                                                ?> bình luận</a>
                        </div>
                        <hr class="m-0">

                        <!---    product price       -->
                        <table class="my-3">
                            <tr class="font-roboto font-size-14">
                                <td>M.R.P:</td>
                                <td><strike><span><?php echo number_format($item['item_price'] + 1000000 ?? 0, 0, '', '.'); ?></span>&#8363;</strike></td>
                            </tr>
                            <tr class="font-roboto font-size-14">
                                <td>Giá ưu đãi:</td>
                                <td class="font-size-20 text-danger"><span><?php echo number_format($item['item_price'] ?? 0, 0, '', '.'); ?></span>&#8363;<small class="text-dark font-size-15">&nbsp;&nbsp;Bao gồm tất cả các loại thuế</small></td>
                            </tr>
                            <tr class="font-roboto font-size-14">
                                <td>Tiết kiệm:</td>
                                <td><span class="font-size-16 text-danger">1.000.000&#8363;</span></td>
                            </tr>
                        </table>
                        <!---    !product price       -->

                        <!--    #policy -->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-roboto font-size-15">10 ngày <br> đổi trả</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-roboto font-size-15">Miễn phí <br>vận chuyển</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-roboto font-size-15">Bảo hành <br>1 năm</a>
                                </div>
                            </div>
                        </div>
                        <!--    !policy -->
                        <hr>

                        <!-- order-details -->
                        <div id="order-details" class="font-roboto d-flex flex-column text-dark">
                            <small>Giao hàng bởi : J&T Express</small>
                            <small>Bán bởi <a href="#">Mobile Shop </a>(<?php
                                                                        $randomFloat = 4.1 + mt_rand(0, 900) / 1000;
                                                                        $roundedFloat = round($randomFloat, 1);
                                                                        echo $roundedFloat;
                                                                        ?>
                                /5 <span><i class="fas fa-star rating text-warning font-size-15"></i></span> | <?php
                                                                                                                $randomNumber = mt_rand(100, 1000);
                                                                                                                echo $randomNumber;
                                                                                                                ?> đánh giá)</small>
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Giao tới khách hàng - 424201</small>
                        </div>
                        <!-- !order-details -->

                        <div class="row">
                            <div class="col-6">
                                <!-- color -->
                                <div class="color my-3">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-baloo">Màu:</h6>
                                        <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                        <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                        <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                    </div>
                                </div>
                                <!-- !color -->
                            </div>
                            <div class="col-6">
                                <!-- product qty section -->
                                <div class="qty d-flex">
                                    <h6 class="font-baloo">Số lượng trong kho</h6>
                                    <div class="px-4 d-flex font-roboto">
                                        <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="<?php
                                                                                                                                        $randomNumber = mt_rand(20, 30);
                                                                                                                                        echo $randomNumber;
                                                                                                                                        ?>" placeholder="<?php echo $randomNumber; ?>">
                                    </div>
                                </div>
                                <!-- !product qty section -->
                            </div>
                        </div>

                        <!-- size -->
                        <div class="size my-3">
                            <h6 class="font-baloo">Cấu hình:</h6>
                            <div class="d-flex justify-content-between w-75">
                                <div class="font-roboto border p-2">
                                    <button class="btn p-0 font-size-14">4GB RAM</button>
                                </div>
                                <div class="font-roboto border p-2">
                                    <button class="btn p-0 font-size-14">6GB RAM</button>
                                </div>
                                <div class="font-roboto border p-2">
                                    <button class="btn p-0 font-size-14">8GB RAM</button>
                                </div>
                            </div>
                        </div>
                        <!-- !size -->


                    </div>

                    <div class="col-15">
                        <h6 class="font-roboto">Mô tả sản phẩm</h6>
                        <hr>
                        <p class="font-roboto font-size-14">Sản phẩm điện thoại này mang đến cho người dùng một trải nghiệm tuyệt vời với thiết kế sang trọng, hiện đại và tính năng vượt trội. Được trang bị màn hình sắc nét, hiệu suất mạnh mẽ và camera chất lượng cao, chiếc điện thoại này giúp bạn dễ dàng thực hiện các tác vụ hàng ngày, từ công việc đến giải trí. Với dung lượng pin lâu dài và khả năng kết nối nhanh chóng, sản phẩm sẽ là lựa chọn lý tưởng cho những ai tìm kiếm một chiếc điện thoại vừa tiện dụng, vừa thời trang.</p>
                        <p class="font-roboto font-size-14">Chiếc điện thoại này sở hữu thiết kế tinh tế, kết hợp giữa vẻ đẹp hiện đại và tính năng vượt trội. Với màn hình lớn, sắc nét và hiệu suất mượt mà, sản phẩm này đáp ứng mọi nhu cầu giải trí và công việc của bạn. Camera chất lượng cao giúp bạn ghi lại những khoảnh khắc tuyệt vời với độ chi tiết rõ nét, trong khi dung lượng pin mạnh mẽ đảm bảo sử dụng lâu dài suốt cả ngày. Được trang bị các công nghệ kết nối nhanh, đây là lựa chọn hoàn hảo cho những ai yêu thích sự tiện lợi và hiệu suất tối ưu.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--   !product  -->
<?php
    endif;
endforeach;
?>