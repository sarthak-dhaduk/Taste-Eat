<?php include './admin_include/header.php' ?>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Items /</span> Category List</h4>
    <div class="card">
      <div class="card-header d-flex justify-content-between" style="font-size: 1.5rem;">All Category
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenterCategory">
          Add Category
        </button>
        <div class="modal fade" id="modalCenterCategory" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="post" action="items_list.php" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">New Category</label>
                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" name="category_name" />
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary" name="new_category_add">Add</button>
                </div>
              </form>

              <?php
              if (isset($_POST['new_category_add'])) {

                $category_id = uniqid();
                $category_name = @$_POST['category_name'];

                if ($category_name != "") {

                  $q_add_category_2 = "INSERT INTO `category` (`category_id`, `category`)VALUES('$category_id', '$category_name')";

                  $q_add_category_2_r = mysqli_query($con, $q_add_category_2);

                  if ($q_add_category_2_r) {
                    header("location:items_list.php");
                  }
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Category Id</th>
              <th>Category</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php
            $q_category_1 = "SELECT * FROM category";
            $q_category_r_1 = mysqli_query($con, $q_category_1);
            if (mysqli_num_rows($q_category_r_1) > 0) {
              while ($category_roww = mysqli_fetch_assoc($q_category_r_1)) {
                $up_category_id = $category_roww['category_id'];
            ?>
                <tr>
                  <td><?php echo $category_roww['category_id']; ?></td>
                  <td><span class="fw-medium"><?php echo $category_roww['category']; ?></span></td>
                  <td>
                    <div class="d-flex justify-content-around">
                      <div class="btn-group" role="group" aria-label="First group">
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter<?php echo $category_roww['category_id']; ?>">
                          <i class="tf-icons bx bxs-edit"></i>
                        </button>
                        <div class="modal fade" id="modalCenter<?php echo $category_roww['category_id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Category Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="items_list.php" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Category</label>
                                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" value="<?php echo $category_roww['category']; ?>" name="edit_category<?php echo $category_roww['category_id']; ?>" />
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="edit_category_btn<?php echo $category_roww['category_id']; ?>">Update</button>
                                </div>
                              </form>

                              <?php
                              if (isset($_POST['edit_category_btn' . $up_category_id])) {
                                $edit_category_id = uniqid();
                                $edit_category = @$_POST['edit_category' . $up_category_id];

                                $q_edit_category = "UPDATE `category` SET `category_id` = '$edit_category_id', `category` = '$edit_category' WHERE `category_id`='$up_category_id'";

                                $result_edit_c = mysqli_query($con, $q_edit_category);

                                if ($result_edit_c) {
                                  header("location:items_list.php");
                                }
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                        <a href="delete_admin.php?id=<?php echo $category_roww['category_id']; ?>&data=category" class="btn btn-outline-danger">
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
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Items /</span> Items List</h4>
    <div class="card">
      <div class="card-header d-flex justify-content-between" style="font-size: 1.5rem;">All Items
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
          Add Items
        </button>
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="post" action="items_list.php" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Item Name</label>
                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" name="item_name" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="defaultSelect" class="form-label">Category</label>
                      <select name="category_value" id="defaultSelect" class="form-select" fdprocessedid="eii7j">
                        <?php
                        $q_category = "SELECT * FROM category";
                        $q_category_r = mysqli_query($con, $q_category);
                        if (mysqli_num_rows($q_category_r) > 0) {
                          while ($row = mysqli_fetch_assoc($q_category_r)) {
                        ?>
                            <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Price</label>
                      <input type="number" id="nameWithTitle" class="form-control" placeholder="Enter Price" name="price" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="formFile" class="form-label">Item Image</label>
                      <input class="form-control" type="file" id="formFile" name="item_image">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary" name="add">Add</button>
                </div>
              </form>

              <?php
              if (isset($_POST['add'])) {

                $item_id = uniqid();
                $item_name = @$_POST['item_name'];
                $item_category = @$_POST['category_value'];
                $item_image = uniqid() . $_FILES['item_image']['name'];
                $price =  @$_POST['price'];
                $description =  @$_POST['description'];


                if ($item_image != "" || $item_category != "") {

                  move_uploaded_file($_FILES['item_image']['tmp_name'], "uploaded_image/" . $item_image);

                  $q_add_item = "INSERT INTO items (item_id, item_name, category, item_image, price, description)VALUES('$item_id', '$item_name', '$item_category', '$item_image', '$price', '$description')";

                  $result1 = mysqli_query($con, $q_add_item);

                  if ($result1) {
                    header("location:items_list.php");
                  }
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Item Id</th>
              <th>Item Name</th>
              <th>Category</th>
              <th>Item Image</th>
              <th>Price</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php
            $q2 = "SELECT * FROM items";
            $qr2 = mysqli_query($con, $q2);
            if (mysqli_num_rows($qr2) > 0) {
              while ($roww = mysqli_fetch_assoc($qr2)) {
                $up_item_id = $roww['item_id'];
                $old_file_name = $roww['item_image'];

            ?>
                <tr>
                  <td><?php echo $roww['item_id']; ?></td>
                  <td><span class="fw-medium"><?php echo $roww['item_name']; ?></span></td>
                  <td><?php echo $roww['category']; ?></td>
                  <td>
                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="<?php echo $roww['item_name']; ?>">
                        <img src="uploaded_image/<?php echo $roww['item_image']; ?>" alt="Avatar" class="rounded-circle" />
                      </li>
                    </ul>
                  </td>
                  <td><?php echo $roww['price']; ?></td>
                  <td>
                    <div class="cut-text">
                      <?php
                      $olditem_id = $roww['item_id'];
                      $description = $roww['description'];
                      $words = explode(" ", $description);
                      $trimmed = implode(" ", array_slice($words, 0, 5));
                      echo htmlspecialchars($trimmed, ENT_QUOTES, 'UTF-8');
                      if (count($words) > 5) {
                        echo '...';
                        echo "<br><a href='' class='read-more' data-bs-toggle='modal' data-bs-target='#description$olditem_id'>Read more</a>";
                      }
                      ?>
                    </div>
                    <div class="modal fade" id="description<?php echo $roww['item_id']; ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalLongTitle"><?php echo $roww['item_name']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="edit_description<?php echo $roww['item_id']; ?>"><?php echo $roww['description']; ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex justify-content-around">
                      <div class="btn-group" role="group" aria-label="First group">
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCenter<?php echo $roww['item_id']; ?>">
                          <i class="tf-icons bx bxs-edit"></i>
                        </button>
                        <div class="modal fade" id="modalCenter<?php echo $roww['item_id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="items_list.php" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Item Name</label>
                                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" value="<?php echo $roww['item_name']; ?>" name="edit_item_name<?php echo $roww['item_id']; ?>" />
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="edit_description<?php echo $roww['item_id']; ?>"><?php echo $roww['description']; ?></textarea>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="defaultSelect" class="form-label">Category</label>
                                      <select name="edit_category_value<?php echo $roww['item_id']; ?>" id="defaultSelect" class="form-select" fdprocessedid="eii7j">
                                        <?php
                                        $q_category = "SELECT * FROM category";
                                        $q_category_r = mysqli_query($con, $q_category);
                                        if (mysqli_num_rows($q_category_r) > 0) {
                                          while ($row = mysqli_fetch_assoc($q_category_r)) {
                                        ?>
                                            <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                                        <?php
                                          }
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Price</label>
                                      <input type="number" id="nameWithTitle" class="form-control" value="<?php echo $roww['price']; ?>" name="edit_price<?php echo $roww['item_id']; ?>" />
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="formFile" class="form-label">Item Image</label>
                                      <input class="form-control" type="file" id="formFile" name="edit_item_image<?php echo $roww['item_id']; ?>" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="edit_add<?php echo $roww['item_id']; ?>">Update</button>
                                </div>
                              </form>

                              <?php
                              if (isset($_POST['edit_add' . $up_item_id])) {
                                $edit_item_name = @$_POST['edit_item_name' . $up_item_id];
                                $edit_item_category = @$_POST['edit_category_value' . $up_item_id];
                                $edit_item_image = uniqid() . $_FILES['edit_item_image' . $up_item_id]['name'];
                                $edit_price =  @$_POST['edit_price' . $up_item_id];
                                $edit_description =  @$_POST['edit_description' . $up_item_id];


                                if ($edit_item_image != $old_file_name) {

                                  move_uploaded_file($_FILES['edit_item_image' . $up_item_id]['tmp_name'], "uploaded_image/" . $edit_item_image);
                                  $q_edit_item = "UPDATE items SET item_name = '$edit_item_name', category = '$edit_item_category', item_image = '$edit_item_image', price = '$edit_price', description = '$edit_description' WHERE item_id='$up_item_id'";

                                  $result_edit = mysqli_query($con, $q_edit_item);

                                  if ($result_edit) {
                                    header("location:items_list.php");
                                  }
                                }
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                        <a href="delete_admin.php?id=<?php echo $roww['item_id']; ?>&data=items" class="btn btn-outline-danger">
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