<?php include './admin_include/header.php' ?>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Orders /</span> Orders List</h4>
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
              <th>Payment Status</th>
              <th>Address</th>
              <th>Date</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php
            $q_select_order = "SELECT * FROM `order`";
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
                    <?php
                    if ($roww['payment_status'] == "Done") {
                    ?>
                      <span class="badge bg-label-success me-1"><?php echo $roww['payment_status']; ?></span>
                    <?php
                    } else {
                    ?>
                      <a href="checkout.php?id=<?php echo $roww['order_id']; ?>" class="badge bg-label-danger me-1"><?php echo $roww['payment_status']; ?></a>
                    <?php
                    }
                    ?>
                  </td>
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
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter<?php echo $roww['order_id']; ?>">
                          <i class="tf-icons bx bxs-edit"></i>
                        </button>
                        <div class="modal fade" id="modalCenter<?php echo $roww['order_id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle"><?php echo $roww['user_name']; ?> Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="order_list.php" enctype="multipart/form-data" id="fruitkha-contact">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">User Name</label>
                                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter User Name" value="<?php echo $roww['user_name']; ?>" name="edit_user_name<?php echo $roww['order_id']; ?>" readonly/>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Email</label>
                                      <input type="email" id="nameWithTitle" class="form-control" placeholder="Enter Email ID" value="<?php echo $roww['email']; ?>" name="edit_email<?php echo $roww['order_id']; ?>" readonly/>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Item Name</label>
                                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" value="<?php echo $roww['item_name']; ?>" name="edit_item_name<?php echo $roww['order_id']; ?>" readonly/>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Date</label>
                                      <input type="date" id="nameWithTitle" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="edit_item_date<?php echo $roww['order_id']; ?>" required/>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Time</label>
                                      <input type="time" id="nameWithTitle" class="form-control" value="<?php echo date("H:i:s"); ?>" name="edit_item_time<?php echo $roww['order_id']; ?>" required/>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="edit_address<?php echo $roww['order_id']; ?>" readonly><?php echo $roww['address']; ?></textarea>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="formFile" class="form-label">Quantity</label>
                                      <input class="form-control" type="number" id="nameWithTitle" value="<?php echo $roww['quantity']; ?>" name="edit_quantity<?php echo $roww['order_id']; ?>" min="1" max="12" required>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Price</label>
                                      <input type="number" id="nameWithTitle" class="form-control" value="<?php echo $roww['price']; ?>" name="edit_price<?php echo $roww['order_id']; ?>" required/>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Payment Status</label>
                                      <?php
                                      if ($roww['payment_status'] == "Panding") {
                                      ?>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="pay_status<?php echo $roww['order_id']; ?>" value="Done">
                                          <label class="form-check-label" for="defaultRadio1"> Done </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="pay_status<?php echo $roww['order_id']; ?>" value="Panding" checked="">
                                          <label class="form-check-label" for="defaultRadio2"> Panding </label>
                                        </div>
                                      <?php
                                      } else {
                                      ?>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="pay_status<?php echo $roww['order_id']; ?>" value="Done" checked="">
                                          <label class="form-check-label" for="defaultRadio1"> Done </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="pay_status<?php echo $roww['order_id']; ?>" value="Panding">
                                          <label class="form-check-label" for="defaultRadio2"> Panding </label>
                                        </div>
                                      <?php
                                      }
                                      ?>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="edit_order<?php echo $roww['order_id']; ?>">Update</button>
                                </div>
                              </form>

                              <?php
                              if (isset($_POST['edit_order' . $up_order_id])) {
                                $edit_user_name = @$_POST['edit_user_name' . $up_order_id];
                                $edit_email = @$_POST['edit_email' . $up_order_id];
                                $edit_item_name = @$_POST['edit_item_name' . $up_order_id];
                                $edit_quantity = @$_POST['edit_quantity' . $up_order_id];
                                $edit_price =  @$_POST['edit_price' . $up_order_id];
                                $pay_status =  @$_POST['pay_status' . $up_order_id];
                                $edit_address =  @$_POST['edit_address' . $up_order_id];
                                $edit_item_date = @$_POST['edit_item_date' . $up_order_id];
                                $edit_item_time = @$_POST['edit_item_time' . $up_order_id];


                                $q_edit_item = "UPDATE `order` SET `item_name` = '$edit_item_name', `user_name` = '$edit_user_name', `email` = '$edit_email', `quantity` = '$edit_quantity', `price` = '$edit_price', `address` = '$edit_address', `date` = '$edit_item_date', `time` = '$edit_item_time', `payment_status` = '$pay_status' WHERE `order_id`='$up_order_id'";

                                $result_edit = mysqli_query($con, $q_edit_item);

                                if ($result_edit) {
                                  header("location:order_list.php");
                                }
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                        <a href="delete_admin.php?id=<?php echo $roww['order_id']; ?>&data=orders" class="btn btn-outline-danger">
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
<?php include './admin_include/footer.php' ?>