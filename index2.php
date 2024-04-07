<?php include './admin_include/header.php' ?>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <?php
                $q_cancelation = "SELECT * FROM `cancelation_time`";
                $q_cancelation_r = mysqli_query($con, $q_cancelation);
                if (mysqli_num_rows($q_cancelation_r) == 1) {
                  $cancelation_row = mysqli_fetch_assoc($q_cancelation_r);
                  $old_cancelation_id = $cancelation_row['cancelation_id'];
                ?>
                  <form method="post">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <button type="submit" name="cancelation_btn" style="border: none; padding: 0px; border-radius: 0.375rem !important;">
                          <img src="./admin/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                        </button>
                      </div>
                    </div>
                    <span class="fw-medium d-block mb-1">Cancelation Time</span>
                    <input type="number" class="card-title mb-2 px-2" value="<?php echo $cancelation_row['time']; ?>" min="0" max="20" name="cancelation_time" style="width: 80px; height: 45px; border: 1px solid #72dd39; font-size: calc(1.1rem + 0.45vw); font-weight: 500;" />
                  </form>
                  <?php
                  if (isset($_POST['cancelation_btn'])) {
                    $cancelation_id = uniqid();
                    $cancelation_time = @$_POST['cancelation_time'];

                    $q_update_cancelation_1 = "UPDATE `cancelation_time` SET `cancelation_id` = '$cancelation_id', `time` = '$cancelation_time' WHERE `cancelation_id`='$old_cancelation_id'";
                    $q_update_cancelation_1_result = mysqli_query($con, $q_update_cancelation_1);

                    if ($q_update_cancelation_1_result) {
                      header("location:index2.php");
                    }
                  }
                  ?>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <div class="rounded d-flex justify-content-center align-items-center" style="background-color: #07c4ed21; width: 100%; height: 100%;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#07c4ed" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                      </svg>
                    </div>
                  </div>
                </div>
                <span class="fw-medium d-block mb-1">Total Users</span>
                <h3 class="card-title text-nowrap p-2" style="margin-bottom: 12px;">
                  <?php
                  $q_total_users = "SELECT * FROM `register`";
                  $q_total_users_r = mysqli_query($con, $q_total_users);

                  if (mysqli_num_rows($q_total_users_r) >= 0) {
                    $total_users_counter = 0;
                    while ($total_users_row = mysqli_fetch_assoc($q_total_users_r)) {
                      $total_users_counter = ($total_users_counter += 1);
                    }
                    echo $total_users_counter;
                  }
                  ?>
                </h3>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <div class="rounded d-flex justify-content-center align-items-center" style="background-color: #ff000022; width: 100%; height: 100%;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                        <line x1="12" y1="9" x2="12" y2="13" />
                        <line x1="12" y1="17" x2="12.01" y2="17" />
                      </svg>
                      </svg>
                    </div>
                  </div>
                </div>
                <span class="fw-medium d-block mb-1">Today's Issues</span>
                <h3 class="card-title text-nowrap mb-2">
                  <?php
                  $today_date = date('Y-m-d');
                  $q_today_issue = "SELECT * FROM `issue` WHERE `date`='$today_date'";
                  $q_today_issue_r = mysqli_query($con, $q_today_issue);

                  if (mysqli_num_rows($q_today_issue_r) >= 0) {
                    $today_issue_counter = 0;
                    while ($today_issue_row = mysqli_fetch_assoc($q_today_issue_r)) {
                      $today_issue_counter = ($today_issue_counter += 1);
                    }
                    echo $today_issue_counter;
                  }
                  ?>
                </h3>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="./admin/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                  </div>
                </div>
                <span class="fw-medium d-block mb-1">Food Items</span>
                <h3 class="card-title mb-2">
                  <?php
                  $q_food_items = "SELECT * FROM `items`";
                  $q_food_items_r = mysqli_query($con, $q_food_items);

                  if (mysqli_num_rows($q_food_items_r) >= 0) {
                    $food_items_counter = 0;
                    while ($food_items_row = mysqli_fetch_assoc($q_food_items_r)) {
                      $food_items_counter = ($food_items_counter += 1);
                    }
                    echo $food_items_counter;
                  }
                  ?>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
          <h5 class="card-header">Issue Table</h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>Issue ID</th>
                  <th>User Name</th>
                  <th>Email Id</th>
                  <th>Date</th>
                  <th>Subject</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $q_select_issue = "SELECT * FROM `issue`";
                $q_select_issue_result = mysqli_query($con, $q_select_issue);
                if (mysqli_num_rows($q_select_issue_result) > 0) {
                  while ($roww = mysqli_fetch_assoc($q_select_issue_result)) {
                    $up_issue_id = $roww['issue_id'];
                ?>
                    <tr>
                      <td><?php echo $roww['issue_id']; ?></td>
                      <td><span class="fw-medium"><?php echo $roww['user_name']; ?></span></td>
                      <td><?php echo $roww['email']; ?></td>
                      <td>
                        <span class="fw-medium"><?php echo $roww['date']; ?></span>
                      </td>
                      <td><?php echo $roww['subject']; ?></td>
                      <td><?php echo $roww['description']; ?></td>
                      <td>
                        <div class="d-flex justify-content-around">
                          <div class="btn-group" role="group" aria-label="First group">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter<?php echo $roww['issue_id']; ?>">
                              <i class="tf-icons bx bxs-edit"></i>
                            </button>
                            <div class="modal fade" id="modalCenter<?php echo $roww['issue_id']; ?>" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form method="post" action="index2.php" enctype="multipart/form-data">
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col mb-3">
                                          <label for="nameWithTitle" class="form-label">User Name</label>
                                          <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter User Name" value="<?php echo $roww['user_name']; ?>" name="edit_user_name<?php echo $roww['issue_id']; ?>" />
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col mb-3">
                                          <label for="nameWithTitle" class="form-label">Email</label>
                                          <input type="email" id="nameWithTitle" class="form-control" placeholder="Enter Email ID" value="<?php echo $roww['email']; ?>" name="edit_email<?php echo $roww['issue_id']; ?>" />
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col mb-3">
                                          <label for="nameWithTitle" class="form-label">Date</label>
                                          <input type="date" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" value="<?php echo $roww['date']; ?>" name="edit_date<?php echo $roww['issue_id']; ?>" />
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col mb-3">
                                          <label for="nameWithTitle" class="form-label">Subject</label>
                                          <input type="text" id="nameWithTitle" class="form-control" value="<?php echo $roww['subject']; ?>" name="edit_subject<?php echo $roww['issue_id']; ?>" />
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col mb-3">
                                          <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="edit_description<?php echo $roww['issue_id']; ?>"><?php echo $roww['description']; ?></textarea>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                      </button>
                                      <button type="submit" class="btn btn-primary" name="edit_issue<?php echo $roww['issue_id']; ?>">Update</button>
                                    </div>
                                  </form>

                                  <?php
                                  if (isset($_POST['edit_issue' . $up_issue_id])) {
                                    $edit_user_name = @$_POST['edit_user_name' . $up_issue_id];
                                    $edit_email = @$_POST['edit_email' . $up_issue_id];
                                    $edit_date = @$_POST['edit_date' . $up_issue_id];
                                    $edit_subject =  @$_POST['edit_subject' . $up_issue_id];
                                    $edit_description =  @$_POST['edit_description' . $up_issue_id];


                                    $q_edit_item = "UPDATE `issue` SET `date` = '$edit_date', `user_name` = '$edit_user_name', `email` = '$edit_email', `subject` = '$edit_subject', `description` = '$edit_description' WHERE `issue_id`='$up_issue_id'";

                                    $result_edit = mysqli_query($con, $q_edit_item);

                                    if ($result_edit) {
                                      header("location:index2.php");
                                    }
                                  }
                                  ?>
                                </div>
                              </div>
                            </div>
                            <a href="delete_admin.php?id=<?php echo $roww['issue_id']; ?>&data=issues" class="btn btn-outline-danger">
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
    </div>
  </div>


  <?php include './admin_include/footer.php' ?>