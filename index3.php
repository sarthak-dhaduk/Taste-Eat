<?php include './user_include/header.php' ?>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <h5 class="card-header" style="font-size: 1.5rem;">All Orders</h5>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Order Id</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Item Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Address</th>
              <th>Date</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php
            $username = $_SESSION['u'];
            $q_select_order = "SELECT * FROM `order` WHERE `user_name` = '$username'";
            $q_select_order_result = mysqli_query($con, $q_select_order);
            if (mysqli_num_rows($q_select_order_result) > 0) {
              while ($roww = mysqli_fetch_assoc($q_select_order_result)) {
                $up_order_id = $roww['order_id'];
            ?>
                <tr>
                  <td><?php echo $roww['order_id']; ?></td>
                  <td><span class="fw-medium"><?php echo $roww['user_name']; ?></span></td>
                  <td><?php echo $roww['email']; ?></td>
                  <td>
                    <span class="fw-medium"><?php echo $roww['item_name']; ?></span>
                  </td>
                  <td><?php echo $roww['quantity']; ?></td>
                  <td><?php echo $roww['price']; ?></td>
                  <td>
                    <a href="<?php echo $roww['address']; ?>" target="_blank" class="btn btn-icon btn-primary" fdprocessedid="o3ich">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                        <circle cx="12" cy="10" r="3" />
                      </svg>
                    </a>
                  </td>
                  <td><?php echo $roww['date']; ?></td>
                  <td><?php echo $roww['time']; ?></td>
                  <td>
                    <div class="d-flex justify-content-around">
                      <div class="btn-group" role="group" aria-label="First group">
                        <a href="delete_user.php?id=<?php echo $roww['order_id']; ?>&date=<?php echo $roww['date']; ?>&time=<?php echo $roww['time']; ?>&data=orders" class="btn btn-outline-danger">
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
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <h4 class="card-header">All Issues</h4>
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
                                $username = $_SESSION['u'];
                                $q_select_issue = "SELECT * FROM `issue` WHERE `user_name` = '$username'";
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
                                                                    <form method="post" action="index3.php" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col mb-3">
                                                                                    <label for="nameWithTitle" class="form-label">User Name</label>
                                                                                    <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter User Name" value="<?php echo $roww['user_name']; ?>" name="edit_user_name<?php echo $roww['issue_id']; ?>" readonly />
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col mb-3">
                                                                                    <label for="nameWithTitle" class="form-label">Email</label>
                                                                                    <input type="email" id="nameWithTitle" class="form-control" placeholder="Enter Email ID" value="<?php echo $roww['email']; ?>" name="edit_email<?php echo $roww['issue_id']; ?>" readonly />
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col mb-3">
                                                                                    <label for="nameWithTitle" class="form-label">Date</label>
                                                                                    <input type="date" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" value="<?php echo $roww['date']; ?>" name="edit_date<?php echo $roww['issue_id']; ?>" readonly />
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
                                                                            header("location:index3.php");
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="delete_user.php?id=<?php echo $roww['issue_id']; ?>&data=issues" class="btn btn-outline-danger">
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
</div>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header" style="font-size: 1.5rem;">All Reviews</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Review Id</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Item Name</th>
                            <th>Rating</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $username = $_SESSION['u'];
                        $q_select_review = "SELECT * FROM `review` WHERE `user_name` = '$username'";
                        $q_select_review_result = mysqli_query($con, $q_select_review);
                        if (mysqli_num_rows($q_select_review_result) > 0) {
                            while ($roww = mysqli_fetch_assoc($q_select_review_result)) {
                                $up_review_id = $roww['review_id'];
                        ?>
                                <tr>
                                    <td><?php echo $roww['review_id']; ?></td>
                                    <td><span class="fw-medium"><?php echo $roww['user_name']; ?></span></td>
                                    <td><?php echo $roww['email']; ?></td>
                                    <td>
                                        <span class="fw-medium"><?php echo $roww['item_name']; ?></span>
                                    </td>
                                    <td><?php echo $roww['rating']; ?></td>
                                    <td><?php echo $roww['description']; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter<?php echo $roww['review_id']; ?>">
                                                    <i class="tf-icons bx bxs-edit"></i>
                                                </button>
                                                <div class="modal fade" id="modalCenter<?php echo $roww['review_id']; ?>" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="post" action="index3.php" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">User Name</label>
                                                                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter User Name" value="<?php echo $roww['user_name']; ?>" name="edit_user_name<?php echo $roww['review_id']; ?>" readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">Email</label>
                                                                            <input type="email" id="nameWithTitle" class="form-control" placeholder="Enter Email ID" value="<?php echo $roww['email']; ?>" name="edit_email<?php echo $roww['review_id']; ?>" readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">Item Name</label>
                                                                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" value="<?php echo $roww['item_name']; ?>" name="edit_item_name<?php echo $roww['review_id']; ?>" readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="edit_description<?php echo $roww['review_id']; ?>"><?php echo $roww['description']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">Rating</label>
                                                                            <input type="number" id="nameWithTitle" class="form-control" value="<?php echo $roww['rating']; ?>" name="edit_rating<?php echo $roww['review_id']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary" name="edit_review<?php echo $roww['review_id']; ?>">Update</button>
                                                                </div>
                                                            </form>

                                                            <?php
                                                            if (isset($_POST['edit_review' . $up_review_id])) {
                                                                $edit_user_name = @$_POST['edit_user_name' . $up_review_id];
                                                                $edit_email = @$_POST['edit_email' . $up_review_id];
                                                                $edit_item_name = @$_POST['edit_item_name' . $up_review_id];
                                                                $edit_rating =  @$_POST['edit_rating' . $up_review_id];
                                                                $edit_description =  @$_POST['edit_description' . $up_review_id];


                                                                $q_edit_item = "UPDATE `review` SET `item_name` = '$edit_item_name', `user_name` = '$edit_user_name', `email` = '$edit_email', `rating` = '$edit_rating', `description` = '$edit_description' WHERE `review_id`='$up_review_id'";

                                                                $result_edit = mysqli_query($con, $q_edit_item);

                                                                if ($result_edit) {
                                                                    header("location:index3.php");
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="delete_user.php?id=<?php echo $roww['review_id']; ?>&data=reviews" class="btn btn-outline-danger">
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
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header" style="font-size: 1.5rem;">All Contact</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Contact Id</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $username = $_SESSION['u'];
                        $q_select_contact = "SELECT * FROM `contact_us` WHERE `user_name` = '$username'";
                        $q_select_contact_result = mysqli_query($con, $q_select_contact);
                        if (mysqli_num_rows($q_select_contact_result) > 0) {
                            while ($roww = mysqli_fetch_assoc($q_select_contact_result)) {
                                $up_contact_id = $roww['contact_id'];
                        ?>
                                <tr>
                                    <td><?php echo $roww['contact_id']; ?></td>
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
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter<?php echo $roww['contact_id']; ?>">
                                                    <i class="tf-icons bx bxs-edit"></i>
                                                </button>
                                                <div class="modal fade" id="modalCenter<?php echo $roww['contact_id']; ?>" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="post" action="index3.php" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">User Name</label>
                                                                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter User Name" value="<?php echo $roww['user_name']; ?>" name="edit_user_name<?php echo $roww['contact_id']; ?>" readonly/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">Email</label>
                                                                            <input type="email" id="nameWithTitle" class="form-control" placeholder="Enter Email ID" value="<?php echo $roww['email']; ?>" name="edit_email<?php echo $roww['contact_id']; ?>" readonly/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">Date</label>
                                                                            <input type="date" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" value="<?php echo $roww['date']; ?>" name="edit_date<?php echo $roww['contact_id']; ?>" readonly/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">Subject</label>
                                                                            <input type="text" id="nameWithTitle" class="form-control" value="<?php echo $roww['subject']; ?>" name="edit_subject<?php echo $roww['contact_id']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="edit_description<?php echo $roww['contact_id']; ?>"><?php echo $roww['description']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary" onclick="descriptionIssue()" name="edit_contact<?php echo $roww['contact_id']; ?>">Update</button>
                                                                </div>
                                                            </form>
                                                            <script>
                                                                function descriptionIssue() {
                                                                    const descriptionIssuee = document.getElementById('exampleFormControlTextarea1').value;
                                                                    document.getElementById('exampleFormControlTextarea1').value = descriptionIssuee.replace(/['"]/g, match => match === "'" ? "''" : '""');
                                                                };
                                                            </script>
                                                            <?php
                                                            if (isset($_POST['edit_contact' . $up_contact_id])) {
                                                                $edit_user_name = @$_POST['edit_user_name' . $up_contact_id];
                                                                $edit_email = @$_POST['edit_email' . $up_contact_id];
                                                                $edit_date = @$_POST['edit_date' . $up_contact_id];
                                                                $edit_subject =  @$_POST['edit_subject' . $up_contact_id];
                                                                $edit_description =  @$_POST['edit_description' . $up_contact_id];


                                                                $q_edit_item = "UPDATE `contact_us` SET `date` = '$edit_date', `user_name` = '$edit_user_name', `email` = '$edit_email', `subject` = '$edit_subject', `description` = '$edit_description' WHERE `contact_id`='$up_contact_id'";

                                                                $result_edit = mysqli_query($con, $q_edit_item);

                                                                if ($result_edit) {
                                                                    header("location:index3.php");
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="delete_user.php?id=<?php echo $roww['contact_id']; ?>&data=contact" class="btn btn-outline-danger">
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
<?php include './user_include/footer.php' ?>