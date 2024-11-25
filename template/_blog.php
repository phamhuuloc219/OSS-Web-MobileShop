<?php
// Kết nối đến cơ sở dữ liệu
include './admin/login/config.php';

// Số dòng trên mỗi trang
$blogs_per_page = 20;

// Xác định trang hiện tại
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$current_page = $current_page > 0 ? $current_page : 1;

// Tính toán offset cho SQL
$offset = ($current_page - 1) * $blogs_per_page;

// Truy vấn lấy dữ liệu blog
$sql = "SELECT blog_id, blog_title, blog_describe, blog_image FROM blog ORDER BY blog_register DESC LIMIT $blogs_per_page OFFSET $offset";
$result = $conn->query($sql);

// Tổng số blog để phân trang
$total_blogs_sql = "SELECT COUNT(*) AS total FROM blog";
$total_blogs_result = $conn->query($total_blogs_sql);
$total_blogs = $total_blogs_result->fetch_assoc()['total'];

// Tính tổng số trang
$total_pages = ceil($total_blogs / $blogs_per_page);

// Hiển thị dữ liệu blog
if ($result->num_rows > 0): ?>
<section id="blogs" class="blogs-section py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?php echo htmlspecialchars($row['blog_image']); ?>" alt="<?php echo htmlspecialchars($row['blog_title']); ?>" class="card-img-top">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['blog_title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['blog_describe']); ?></p>
                            <a href="blog_detail.php?id=<?php echo $row['blog_id']; ?>" class="mt-auto text-primary">Chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php else: ?>
    <p>Không có bài viết nào!</p>
<?php endif;

// Hiển thị điều hướng phân trang
if ($total_pages > 1): ?>
<nav aria-label="Page navigation" class="mt-4">
    <ul class="pagination justify-content-center">
        <?php if ($current_page > 1): ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page - 1; ?>">Trước</a></li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($current_page < $total_pages): ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Tiếp</a></li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif;

// Đóng kết nối
$conn->close();
?>

<!-- Blogs -->
<section id="blogs" class="blogs-section py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Blog Item 1 -->
            <div class="col">
                <div class="card h-100">
                    <img src="./assets/blog/find_x8.jpg" alt="OPPO Find X8" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Sắp ra mắt</h5>
                        <p class="card-text">Những chiếc điện thoại thông minh sắp ra mắt từ các hãng lớn như Apple, Samsung, và Xiaomi...</p>
                        <a href="https://fptshop.com.vn/tin-tuc/tin-moi/ngay-ra-mat-toan-cau-cua-oppo-find-x8-series-161428" class="mt-auto text-primary">Đi đến trang</a>
                    </div>
                </div>
            </div>

            <!-- Blog Item 2 -->
            <div class="col">
                <div class="card h-100">
                    <img src="./assets/blog/blog2.jpg" alt="Hồ sơ blog" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Hồ sơ blog</h5>
                        <p class="card-text">Shop chúng tôi chuyên cung cấp các dòng điện thoại thông minh chính hãng từ các thương hiệu hàng đầu...</p>
                        <a href="https://phamhuuloc219.github.io" class="mt-auto text-primary">Đi đến trang</a>
                    </div>
                </div>
            </div>

            <!-- Blog Item 3 -->
            <div class="col">
                <div class="card h-100">
                    <img src="./assets/blog/220px-W3Schools_logo.svg.webp" alt="Trở thành nhà phát triển" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Deploy Web</h5>
                        <p class="card-text">Để triển khai một website, đầu tiên bạn cần chọn nền tảng hosting phù hợp như Netlify, Vercel...</p>
                        <a href="https://www.w3schools.com/" class="mt-auto text-primary">Đi đến trang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- !Blogs -->
