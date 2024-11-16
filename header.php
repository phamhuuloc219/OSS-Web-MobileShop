<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mobile Shope</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CDN -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />

    <!-- Owl-carousel CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    />

    <!-- font awesome icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>  
    <!-- jQuery and Popper.js (required for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css" />

    <?php
      include 'functions.php';
    ?>
    <style>
        #header {
          position: fixed;  
          top: 0;           
          left: 0;          
          width: 100%;      
          z-index: 1000;    
          background-color: #fff; 
          box-shadow: 0 4px 2px -2px gray; 
        }

        #main-site {
          margin-top: 80px; 
        }

        .search {
          margin-left: 100px;
          margin-top: 1px;
          position: relative;
          width: 300px;
          height: 40px;
          border-radius: 25px;
          padding: 0px 20px;
          padding-right: 0px;
          background-color: white;
        }

        .search-item {
            width: 100%;
            height: 100%;
        }

        .search input {
            border: none;
            width: 250px;
            height: 35px;
            border-radius: 30px;
            padding: 5px 5px;
            box-sizing: border-box;
        }

        .search input:focus {
            outline: none;
        }

        td a {
          color:black;
          padding-right: 10px;
        }
    </style>

  </head>

  <body>
    <!-- start #header -->
    <header id="header">

      <!-- Primary Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">

        <a class="navbar-brand" href="index.php"><img src="assets/logo.png" alt="Logo" style="width: 50px; height: 30px;"> Mobile Shop</a>
    
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
          >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav m-auto font-rubik">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">On Sale</a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Category
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Iphone</a>
                  <a class="dropdown-item" href="#">Masstel</a>
                  <a class="dropdown-item" href="#">NOKIA</a>
                  <a class="dropdown-item" href="#">Oppo</a>
                  <a class="dropdown-item" href="#">Samsung</a>
                  <a class="dropdown-item" href="#">Xiaomi</a>
              </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Coming Soon</a>
            </li>
            <li>
              <div class="search">
                <form action="search.php" method="POST">
                  <table class="search-item">
                    <tr>
                      <td>
                        <input type="text" placeholder="Search here" name="query" id="">
                        <button type="search-submit" style="background: none; border: none; padding: 0; margin-left: 5px;">
                          <i class="bx bx-search" style="color: black;"></i>
                        </button>
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            </li>
          </ul>
          <form action="#" class="font-size-14 font-rubik">
                <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
                </a>
          </form>

          <div class="font-rubik font-size-14">
            <a href="#" class="px-3 text-dark dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">Thông tin cá nhân</a>
              <a class="dropdown-item" href="login/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
          </div>

        </div>
      </nav>

      <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rubik font-size-12 text-black-50 m-0">
          <img src="https://cdn2.fptshop.com.vn/unsafe/64x0/filters:quality(100)/black_friday_000169f9af.png" alt="black-friday" width="20px">
        <b style="color: red;">Black Friday trúng iPhone 16 Pro Max</b>
        </p>        
      </div>
      <!-- !Primary Navigation -->
    </header>
    <!-- !start #header -->

    <!-- start #main-site -->
    <main id="main-site">
      <!-- Content here -->
    </main>
    <!-- !start #main-site -->

  </body>
</html>
