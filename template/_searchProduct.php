<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['search_submit'])) {
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$search_query = $_POST['query'] ?? '';
$results = [];
if (!empty($search_query)) {
    $search_query = trim(strtolower($search_query));
    foreach ($product->getData() as $item) {
        if (strpos(strtolower($item['item_name']), $search_query) !== false) {
            $results[] = $item;
        }
    }
}
?>

<section id="search" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Kết quả tìm kiếm: <?php echo $search_query; ?></h5>
        <hr>
        <div class="row">

<?php
if (!empty($search_query)) {
    if (!empty($results)) {
        foreach ($results as $item) {
            ?>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="product font-roboto">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/xiaomi_14t.png"; ?>" alt="product1" class="img-fluid">
                    </a>
                    <div class="text-center">
                        <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                        <div class="rating text-warning font-size-15">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?php echo $item['item_price'] ?? '0' ?></span>
                        </div>
                        <form method="post" action="cart.php"> 
                            <input type="hidden" name="query" value="<?php echo htmlspecialchars($search_query); ?>">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <?php
                            if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])) {
                                echo '<button type="submit" disabled class="btn btn-success font-size-15">Đã có trong giỏ hàng</button>';
                            } else {
                                echo '<button type="submit" name="search_submit" class="btn btn-warning font-size-15" formaction="cart.php">Thêm vào giỏ hàng</button>';
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
    echo "<h5 class='text-center'>Please enter a search term</h5>";
}
?>
        </div>
    </div>
</section>
