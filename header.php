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
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <!-- Owl-carousel CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
      integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
      integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw="
      crossorigin="anonymous"
    />

    <!-- font awesome icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ="
      crossorigin="anonymous"
    />
    <!-- jQuery and Popper.js (required for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-CSfhmgPniwgp4glwIeG1iI/4wDfSYsAKHQ0RmCEbWQ2k5qKDEBykgHl/O8o+S27Y" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-q6E9RHvbIyZFJoft+2mJbHaEWldHsOKw3d4iV6i67aIeA9H/7UFyClzivvzjGS5g" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7jw3g1R6OWpme1RWQq8l1T6azV/nE4S9qGZIVg1wKQ7ezXQ" crossorigin="anonymous"></script>


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
          width: 200px;
          height: 40px;
           /* Viền ngoài */
          border-radius: 25px;
          padding: 0px 20px;
          padding-right: 0px;
          background-color: white; /* Màu nền của container */
      }

        .search-item {
            width: 100%;
            height: 100%;
        }

        .search input {
            border: none; /* Loại bỏ viền của input */
            width: 100%;
            height: 100%;
            border-radius: 30px;
            padding: 0 10px; /* Padding nhỏ để khớp với viền ngoài */
            box-sizing: border-box; /* Đảm bảo padding không làm thay đổi kích thước */
        }

        .search input:focus {
            outline: none; /* Loại bỏ outline khi focus */
        }
        td a {
          color:black;
          padding-right: 10px; /* Thêm khoảng cách xung quanh icon */
          
      }
    </style>

  </head>

  <body>
    <!-- start #header -->
    <header id="header">

      <!-- Primary Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">

      <a class="navbar-brand" href="index.php"><img src="assets/logo.png" alt="Logo"  style="width: 50px; height: 30px;"> Mobile Shop</a>
    
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
              <a class="nav-link" href="#">On Sale</a>
            </li>
            <li class="nav-item dropdown">
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
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Coming Soon</a>
            </li>
            <li>
              <div class="search">
                  <form action="search.php" method="POST">
                      <table class="search-item">
                          <tr>
                              <td>
                                  <input type="text" placeholder="Search here" name="query" id="">
                              </td>
                              <td>
                                  <button type="submit" style="background: none; border: none; padding: 0; margin-left: 5px;">
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
            <!-- Button to toggle dropdown -->
            <a href="#" class="px-3 text-dark dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
            </a>

            <!-- Dropdown menu with right alignment -->
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