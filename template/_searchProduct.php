<section id="search" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Search Result</h5>
        <hr>
        <div class="row"> <!-- Thêm dòng này để bắt đầu hàng ngang -->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['query'])) {
    $search_query = trim($_POST['query']);
    $search_query = strtolower($search_query);

    foreach ($product->getData() as $item) {
        if (strpos(strtolower($item['item_name']), $search_query) !== false) {
            $results[] = $item;
        }
    }

    if (!empty($results)) {
        foreach ($results as $item) {
            ?>
            <div class="col-md-3 col-sm-6 mb-4"> <!-- Sửa lại để chia đều cột theo kích thước màn hình -->
                <div class="product font-rubik">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/xiaomi_14t.png"; ?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?php echo $item['item_price'] ?? 0 ?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <?php
                                    //!Hàm in_array() trong php dùng để kiểm tra giá trị nào đó có tồn tại trong mảng hay không.
                                    //! Nếu như tồn tại thì nó sẽ trả về TRUE và ngược lại sẽ trả về FALSE 
                                    if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                        echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                                    }else{
                                        echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                                    }
                                    ?>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<h5 class='text-center'>No results found for '$search_query'</h5>";
    }
} else {
    echo "<h5 class='text-center'>Invalid search request</h5>";
}
?>
        </div> <!-- Kết thúc hàng ngang -->
    </div>
</section>
