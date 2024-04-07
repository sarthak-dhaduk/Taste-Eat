<?php include './admin_include/header.php' ?>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Users /</span> Users List</h4>
    <div class="card">
      <div class="card-header d-flex justify-content-between" style="font-size: 1.5rem;">
        All Users
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>User Name</th>
              <th>Email Id</th>
              <th>Password</th>
              <th>Role</th>
              <th>Profile Image</th>
              <th>Token</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php
            $q2 = "SELECT * FROM register";
            $qr2 = mysqli_query($con, $q2);
            if (mysqli_num_rows($qr2) > 0) {
              while ($roww = mysqli_fetch_assoc($qr2)) {
                $up_username = $roww['username'];

            ?>
                <tr>
                  <td><span class="fw-medium"><?php echo $roww['username']; ?></span></td>
                  <td><?php echo $roww['email']; ?></td>
                  <td><?php echo $roww['password']; ?></td>
                  <td><?php echo $roww['user']; ?></td>
                  <td>
                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="<?php echo $roww['username']; ?>">
                        <img src="uploaded_image/<?php echo $roww['profilepic']; ?>" alt="Avatar" class="rounded-circle" />
                      </li>
                    </ul>
                  </td>
                  <td><?php echo $roww['token']; ?></td>
                  <td>
                    <div class="d-flex justify-content-around">
                      <div class="btn-group" role="group" aria-label="First group">
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter<?php echo $roww['username']; ?>">
                          <i class="tf-icons bx bxs-edit"></i>
                        </button>
                        <div class="modal fade" id="modalCenter<?php echo $roww['username']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="users.php" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">User Name</label>
                                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter User Name" value="<?php echo $roww['username']; ?>" name="edit_username<?php echo $roww['username']; ?>" />
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Email</label>
                                      <input type="email" id="nameWithTitle" class="form-control" placeholder="Enter Email ID" value="<?php echo $roww['email']; ?>" name="edit_email<?php echo $roww['username']; ?>" />
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Password</label>
                                      <input type="password" id="nameWithTitle" class="form-control" placeholder="Enter Password" value="<?php echo $roww['password']; ?>" name="edit_pwd<?php echo $roww['username']; ?>" />
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Conform Password</label>
                                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Conform Password" value="<?php echo $roww['password']; ?>" name="edit_cpwd<?php echo $roww['username']; ?>" />
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Role</label>
                                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Role" value="<?php echo $roww['user']; ?>" name="edit_user<?php echo $roww['username']; ?>" />
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="formFile" class="form-label">Profile Image</label>
                                      <input class="form-control" type="file" id="formFile" name="edit_profilepic<?php echo $roww['username']; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="edit_add<?php echo $roww['username']; ?>">Update</button>
                                </div>
                              </form>

                              <?php
                              if (isset($_POST['edit_add' . $up_username])) {
                                $edit_username = @$_POST['edit_username' . $up_username];
                                $edit_email = @$_POST['edit_email' . $up_username];
                                $edit_pwd =  @$_POST['edit_pwd' . $up_username];
                                $edit_cpwd =  @$_POST['edit_cpwd' . $up_username];
                                $edit_user =  @$_POST['edit_user' . $up_username];
                                $edit_profilepic = uniqid() . $_FILES['edit_profilepic' . $up_username]['name'];

                                $pic_check = $_FILES['edit_profilepic' . $up_username]['name'];


                                if ($pic_check !=  "") {
                                  if ((move_uploaded_file($_FILES['edit_profilepic' . $up_username]['tmp_name'], "uploaded_image/" . $edit_profilepic))  && ($edit_cpwd == $edit_pwd)) {
                                    $q_edit_user_1 = "UPDATE `register` SET `username` = '$edit_username', `email` = '$edit_email', `profilepic` = '$edit_profilepic', `password` = '$edit_pwd', `user` = '$edit_user' WHERE `username`='$up_username'";
                                    $result_q_edit_user_1 = mysqli_query($con, $q_edit_user_1);

                                    if ($result_q_edit_user_1) {
                                      header("location:users.php");
                                    }
                                  }
                                } else {
                                  $q_edit_user_2 = "UPDATE `register` SET `username` = '$edit_username', `email` = '$edit_email', `password` = '$edit_pwd', `user` = '$edit_user' WHERE `username`='$up_username'";
                                  $result_q_edit_user_2 = mysqli_query($con, $q_edit_user_2);

                                  if ($result_q_edit_user_2) {
                                    header("location:users.php");
                                  }
                                }
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                        <a href="delete_admin.php?id=<?php echo $roww['username']; ?>&data=users" class="btn btn-outline-danger">
                          <i class="tf-icons bx bxs-trash"></i>
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "<h5 class='px-4'>No Record Found...</h5>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php include './admin_include/footer.php' ?>