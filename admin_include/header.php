<?php
ob_start();
session_start();
?>
<?php include_once 'connection.php' ?>
<?php
if (!isset($_SESSION['u']) && !isset($_SESSION['p']) && !isset($_SESSION['use'])) {
  header("location:index.php");
} elseif (isset($_SESSION['u']) && isset($_SESSION['p']) && isset($_SESSION['use'])) {
  if ($_SESSION['use'] != "admin") {
    header("location:index.php");
  }
} ?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="./admin/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Taste - Eat</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./admin/assets/img/favicon/favicon2.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="./admin/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="./admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="./admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="./admin/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="./admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="./admin/assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="./admin/assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="./admin/assets/js/config.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Get the current URL or page name (modify this based on your actual implementation)
      var currentPage = window.location.pathname.split("/").pop();

      // Get all menu links
      var menuLinks = document.querySelectorAll(".menu-item a");

      // Loop through each menu link
      menuLinks.forEach(function(menuLink) {
        // Get the href attribute of the link
        var href = menuLink.getAttribute("href");

        // Check if the current page matches the href attribute
        if (currentPage === href) {
          // Remove the 'active' class from all menu items
          menuLinks.forEach(function(link) {
            link.closest(".menu-item").classList.remove("active");
          });

          // Add a class to indicate the active menu item
          menuLink.closest(".menu-item").classList.add("active");

          // Check if the menu item has a parent menu
          var parentMenu = menuLink.closest(".menu-sub");
          if (parentMenu) {
            // If it has a parent menu, activate the parent menu item as well
            activateMenuItem(parentMenu.closest(".menu-item").querySelector("a"));
          }
        }
      });
    });

    function activateMenuItem(link) {
      // Add a class to indicate the active menu item
      link.closest(".menu-item").classList.add("active");

      // Check if the menu item has a parent menu
      var parentMenu = link.closest(".menu-sub");
      if (parentMenu) {
        // If it has a parent menu, activate the parent menu item as well
        activateMenuItem(parentMenu.closest(".menu-item").querySelector("a"));
      }
    }
  </script>

</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <img src="./admin/assets/img/favicon/favicon2.png" alt="" height="50rem" width="50rem">
            <span class="app-brand-text demo menu-text fw-bold ms-2" style="color: #F28123;">Taste - Eat</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboards -->
          <li class="menu-item">
            <a href="index2.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Dashboards">Dashboard</div>
            </a>
          </li>
          <!-- Items -->
          <li class="menu-item">
            <a href="items_list.php" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-shopping-bags"></i>
              <div data-i18n="Layouts">Items</div>
            </a>
          </li>

          <!-- Orders -->
          <li class="menu-item">
            <a href="order_list.php" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-package"></i>
              <div data-i18n="Layouts">Orders</div>
            </a>
          </li>

          <!-- Contact -->
          <li class="menu-item">
            <a href="contact_us.php" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-user"></i>
              <div data-i18n="Layouts">Contact</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Users &amp; Reviews</span>
          </li>

          <!-- Review & Ratting -->
          <li class="menu-item">
            <a href="reviews.php" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-star-half"></i>
              <div data-i18n="Layouts">Reviews</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="users.php" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-user"></i>
              <div data-i18n="Layouts">Users</div>
            </a>
          </li>


          <!-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">All Details</span>
            </li> -->

          <!-- Tables -->
          <!-- <li class="menu-item">
              <a href="all_data.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tables</div>
              </a>
            </li> -->


      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <!-- <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none ps-1 ps-sm-2"
                    placeholder="Search..."
                    aria-label="Search..." />
                </div>
              </div> -->
            <!-- /Search -->
            <!-- <marquee behavior="scroll" direction="left" scrollamount="5" style="color: #F28123;">
                   Unlocking Possibilities, One Login at a Time - Welcome to Your Admin Realm! 
              </marquee> -->


            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <!-- <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li> -->

              <!-- User -->
              <?php
              $username = $_SESSION['u'];
              $q_register = "SELECT * FROM `register` WHERE `username`='$username'";
              $q_register_r = mysqli_query($con, $q_register);
              if (mysqli_num_rows($q_register_r) == 1) {
                $register_row = mysqli_fetch_assoc($q_register_r);
              ?>
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                      <img src="uploaded_image/<?php echo $register_row['profilepic'] ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar ">
                              <img src="uploaded_image/<?php echo $register_row['profilepic'] ?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block"><?php echo $register_row['username'] ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="account.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <form method="post">
                        <button type="submit" class="dropdown-item" name="btn">
                          <i class="bx bx-power-off me-2"></i>
                          <span class="align-middle">Log Out</span>
                        </button>
                      </form>
                      <?php
                      if (isset($_POST['btn'])) {
                        unset($_SESSION['u']);
                        unset($_SESSION['e']);
                        unset($_SESSION['p']);
                        unset($_SESSION['use']);
                        header("location:index.php");
                      }
                      ?>
                    </li>
                  </ul>
                </li>
              <?php
              }
              ?>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->