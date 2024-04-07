<?php
ob_start();
session_start();
?>
<?php include_once 'connection.php' ?>
<?php
if (!isset($_SESSION['u']) && !isset($_SESSION['p']) && !isset($_SESSION['use'])) {
  header("location:index.php");
} elseif (isset($_SESSION['u']) && isset($_SESSION['p']) && isset($_SESSION['use'])) {
  if ($_SESSION['use'] != "user") {
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
  <script src="./admin/assets/js/config.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var currentPage = window.location.pathname.split("/").pop();

      var menuLinks = document.querySelectorAll(".menu-item a");

      menuLinks.forEach(function(menuLink) {
        var href = menuLink.getAttribute("href");

        if (currentPage === href) {
          menuLinks.forEach(function(link) {
            link.closest(".menu-item").classList.remove("active");
          });

          menuLink.closest(".menu-item").classList.add("active");

          var parentMenu = menuLink.closest(".menu-sub");
          if (parentMenu) {
            activateMenuItem(parentMenu.closest(".menu-item").querySelector("a"));
          }
        }
      });
    });

    function activateMenuItem(link) {
      link.closest(".menu-item").classList.add("active");

      var parentMenu = link.closest(".menu-sub");
      if (parentMenu) {
        activateMenuItem(parentMenu.closest(".menu-item").querySelector("a"));
      }
    }
  </script>

</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Layout container -->
      <div class="layout-page p-0">
        <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
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
                      <a class="dropdown-item" href="index3.php">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar ">
                              <img src="uploaded_image/<?php echo $register_row['profilepic'] ?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block"><?php echo $register_row['username'] ?></span>
                            <small class="text-muted">User</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="account_user.php">
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