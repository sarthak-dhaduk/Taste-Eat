<?php include './admin_include/header.php' ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
    <?php
    $username = $_SESSION['u'];
    $q_register = "SELECT * FROM `register` WHERE `username`='$username'";
    $q_register_r = mysqli_query($con, $q_register);
    if (mysqli_num_rows($q_register_r) == 1) {
      $register_row = mysqli_fetch_assoc($q_register_r);
      $up_username = $register_row['username'];
    ?>
      <div class="row">
        <div class="col-md-8">
          <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->

            <form enctype="multipart/form-data" method="post" id="editForm">
              <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                  <img src="<?php $pic = $register_row['profilepic'];
                            $word = "https";
                            $avatarUrl = (strpos($pic, $word) === false) ? "uploaded_image/" . $pic : $pic;
                            echo $avatarUrl; ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Upload new photo</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input type="file" name="edit_profilepic" id="upload" class="account-file-input" hidden onchange="previewFile()" accept="image/png, image/jpeg" />
                    </label>
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4 refresh-button">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Reset</span>
                    </button>
                    <script>
                      const refreshButton = document.querySelector('.refresh-button');

                      const refreshPage = () => {
                        location.reload();
                      }

                      refreshButton.addEventListener('click', refreshPage)
                    </script>

                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                  </div>
                </div>
              </div>
              <hr class="my-0" />
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="username" class="form-label">User Name</label>
                    <input class="form-control" type="text" id="username" name="edit_username" value="<?php echo $register_row['username'] ?>" autofocus />
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="email" id="email" name="edit_email" value="<?php echo $register_row['email'] ?>" />
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="edit_pwd" value="<?php echo $register_row['password'] ?>" />
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="edit_cpwd" value="<?php echo $register_row['password'] ?>" />
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2" name="edit_add">Save changes</button>
                </div>
              </div>
            </form>
            <?php
            if (isset($_POST['edit_add'])) {
              $edit_username = @$_POST['edit_username'];
              $edit_email = @$_POST['edit_email'];
              $edit_pwd =  @$_POST['edit_pwd'];
              $edit_cpwd =  @$_POST['edit_cpwd'];
              $edit_profilepic = uniqid() . $_FILES['edit_profilepic']['name'];

              $pic_check = $_FILES['edit_profilepic']['name'];


              if ($pic_check !=  "") {
                if ((move_uploaded_file($_FILES['edit_profilepic']['tmp_name'], "uploaded_image/" . $edit_profilepic))  && ($edit_cpwd == $edit_pwd)) {
                  $q_edit_user_1 = "UPDATE `register` SET `username` = '$edit_username', `email` = '$edit_email', `profilepic` = '$edit_profilepic', `password` = '$edit_pwd' WHERE `username`='$up_username'";
                  $result_q_edit_user_1 = mysqli_query($con, $q_edit_user_1);

                  if ($result_q_edit_user_1) {
                    $_SESSION['u'] = $edit_username;
                    $_SESSION['e'] = $edit_email;
                    $_SESSION['p'] = $edit_pwd;
                    header("location:account.php");
                  }
                }
              } else {
                $q_edit_user_2 = "UPDATE `register` SET `username` = '$edit_username', `email` = '$edit_email', `password` = '$edit_pwd' WHERE `username`='$up_username'";
                $result_q_edit_user_2 = mysqli_query($con, $q_edit_user_2);

                if ($result_q_edit_user_2) {
                  $_SESSION['u'] = $edit_username;
                  $_SESSION['e'] = $edit_email;
                  $_SESSION['p'] = $edit_pwd;
                  header("location:account.php");
                }
              }
            }
            ?>
            <!-- /Account -->
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
  <!-- / Content -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#editForm').submit(function(event) {
        var isValid = true;
        // Reset validation
        $('#editForm :input').removeClass('is-invalid');
        $('#editForm .invalid-feedback').text('');

        // Validate username
        var username = $('#username').val();
        if (!username) {
          $('#username').addClass('is-invalid');
          $('#username').next('.invalid-feedback').text('Username is required.');
          isValid = false;
        }

        // Validate email
        var email = $('#email').val();
        if (!email) {
          $('#email').addClass('is-invalid');
          $('#email').next('.invalid-feedback').text('Email is required.');
          isValid = false;
        }

        // Validate password
        var password = $('#password').val();
        if (!password) {
          $('#password').addClass('is-invalid');
          $('#password').next('.invalid-feedback').text('Password is required.');
          isValid = false;
        }

        // Validate confirm password
        var confirmPassword = $('#confirmPassword').val();
        if (!confirmPassword) {
          $('#confirmPassword').addClass('is-invalid');
          $('#confirmPassword').next('.invalid-feedback').text('Confirm Password is required.');
          isValid = false;
        }

        // Check if passwords match
        if (password !== confirmPassword) {
          $('#password').addClass('is-invalid');
          $('#confirmPassword').addClass('is-invalid');
          $('#confirmPassword').next('.invalid-feedback').text('Passwords do not match.');
          isValid = false;
        }

        if (!isValid) {
          event.preventDefault();
        }

        return isValid;
      });

      // Reset form and uploaded image
      $('.refresh-button').click(function() {
        $('#editForm').trigger('reset');
        $('#uploadedAvatar').attr('src', '<?php echo $avatarUrl; ?>');
      });
    });
  </script>
<?php include './admin_include/footer.php' ?>