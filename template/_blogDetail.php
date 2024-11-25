<?php
// Kết nối đến cơ sở dữ liệu

   
include ('template/_temp.php');
   include './admin/actionBlog.php';

   
   // Lấy ID của bài blog từ URL
   $blog_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
   
   // Truy vấn dữ liệu blog dựa trên ID
   $sql = "SELECT blog_title, blog_content, blog_describe, blog_image, blog_author 
           FROM blog 
           WHERE blog_id = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("i", $blog_id);
   $stmt->execute();
   $result = $stmt->get_result();
   
   // Kiểm tra dữ liệu
   if ($result->num_rows > 0) {
       $blog = $result->fetch_assoc();
   } else {
       echo "<p>Bài viết không tồn tại!</p>";
       exit;
   }
   
   // Đóng kết nối
   $stmt->close();
   $conn->close();
   ?>
   
   <!DOCTYPE html>
   <html lang="en">
   
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title><?php echo htmlspecialchars($blog['blog_title']); ?></title>
       <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="css/utils.css">
       <link rel="stylesheet" href="css/search.css">
       <link rel="stylesheet" href="css/blogpost.css">
   </head>
   
   <body>
       <main>
           <div class="blog max-width-95 margin-auto">
               <!-- Blog Image -->
               <div class="blogImage text-center m-1">
                   <img src="<?php echo htmlspecialchars($blog['blog_image']); ?>" alt="<?php echo htmlspecialchars($blog['blog_title']); ?>">
               </div>
   
               <!-- Blog Text Content -->
               <div class="blogTextAll p-1">
                   <div class="blogHead m-1 text-center">
                       <h1 class="m-1"><?php echo htmlspecialchars($blog['blog_title']); ?></h1>
                       <hr>
                   </div>
   
                   <!-- Blog Metadata -->
                   <div class="blogPostMeta">
                       <div class="authorName text-muted">
                           <b><?php echo htmlspecialchars($blog['blog_author']); ?></b>
                           <br>
                       </div>
                       <!-- Social Share Buttons -->
                       <div class="shareBtn">
                           <a href="https://twitter.com/share?url=<?php echo urlencode("https://yourwebsite.com/blog_detail.php?id=$blog_id"); ?>" target="_blank">
                               <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                   <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                               </svg>
                           </a>
                           <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode("https://yourwebsite.com/blog_detail.php?id=$blog_id"); ?>" target="_blank">
                               <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                   <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                               </svg>
                           </a>
                       </div>
                   </div>
   
                   <!-- Blog Description -->
                   <div class="blogText m-2 p-1">
                       <p><?php echo nl2br(htmlspecialchars($blog['blog_describe'])); ?></p>
                   </div>
   
                   <!-- Blog Content -->
                   <div class="blogText m-2 p-1">
                       <p><?php echo nl2br(htmlspecialchars($blog['blog_content'])); ?></p>
                   </div>
               </div>
           </div>
       </main>
   </body>
   </html>
   
            <div class="otherBlog">
                <h2 class="m-1">Có thể bạn thích </h2>
                <div class="home-articles ">
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
        </div>
    </div>
</section>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
