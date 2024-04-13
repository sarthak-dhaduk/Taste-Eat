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
              <form method="post" action="items_list.php" enctype="multipart/form-data" id="newCategoryForm">
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">New Category</label>
                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" name="category_name" />
                      <span class="error-message" style="display: none; color: red;">This field cannot be empty and should not contain integers.</span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="new_category_add">Add</button>
                </div>
              </form>
              <script>
                $(document).ready(function() {
                  $('#newCategoryForm').submit(function(event) {
                    var categoryName = $('input[name="category_name"]').val();
                    if (categoryName.trim() === '' || /^\d+$/.test(categoryName)) {
                      $('input[name="category_name"]').css('border-color', 'red');
                      $('.error-message').show();
                      event.preventDefault();
                    } else {
                      $('input[name="category_name"]').css('border-color', '');
                      $('.error-message').hide();
                    }
                  });

                  $('input[name="category_name"]').on('input', function() {
                    $(this).css('border-color', '');
                    $('.error-message').hide();
                  });
                });
              </script>
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
                              <form method="post" action="items_list.php" enctype="multipart/form-data" id="editCategoryForm<?php echo $category_roww['category_id']; ?>">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Category</label>
                                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" value="<?php echo $category_roww['category']; ?>" name="edit_category<?php echo $category_roww['category_id']; ?>" />
                                      <span class="error-message" style="display: none; color: red;">This field cannot be empty and should not contain integers.</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="edit_category_btn<?php echo $category_roww['category_id']; ?>">Update</button>
                                </div>
                              </form>
                              <script>
                                $(document).ready(function() {
                                  $('#editCategoryForm<?php echo $category_roww['category_id']; ?>').submit(function(event) {
                                    var categoryName = $('input[name="edit_category<?php echo $category_roww['category_id']; ?>"]').val();
                                    if (categoryName.trim() === '' || /^\d+$/.test(categoryName)) {
                                      $('input[name="edit_category<?php echo $category_roww['category_id']; ?>"]').css('border-color', 'red');
                                      $('.error-message').show();
                                      event.preventDefault();
                                    } else {
                                      $('input[name="edit_category<?php echo $category_roww['category_id']; ?>"]').css('border-color', ''); // Reset border color
                                      $('.error-message').hide();
                                    }
                                  });

                                  $('input[name="edit_category<?php echo $category_roww['category_id']; ?>"]').on('input', function() {
                                    $(this).css('border-color', '');
                                    $('.error-message').hide();
                                  });
                                });
                              </script>


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
                <h5 class="modal-title" id="modalCenterTitle">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="post" action="items_list.php" enctype="multipart/form-data" id="addItemForm">
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Item Name</label>
                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" name="item_name" />
                      <span class="error-message-name" style="display: none; color: red; font-size: 15px;">This field is required.</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                      <span class="error-message-description" style="display: none; color: red; font-size: 15px;">This field is required.</span>
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
                      <span class="error-message-price" style="display: none; color: red; font-size: 15px;">This field is required.</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="formFile" class="form-label">Item Image</label>
                      <input class="form-control" type="file" id="formFile" name="item_image">
                      <span class="error-message-image" style="display: none; color: red; font-size: 15px;">Please select a valid image file (jpg, jpeg, png).</span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="add">Add</button>
                </div>
              </form>
              <script>
                $(document).ready(function() {
                  $('#addItemForm').submit(function(event) {
                    var itemName = $('input[name="item_name"]').val();
                    var description = $('textarea[name="description"]').val();
                    var price = $('input[name="price"]').val();
                    var itemImage = $('input[name="item_image"]').val();

                    if (itemName.trim() === '') {
                      $('input[name="item_name"]').css('border-color', 'red');
                      $('.error-message-name').show();
                      event.preventDefault();
                    } else {
                      $('input[name="item_name"]').css('border-color', '');
                      $('.error-message-name').hide();
                    }

                    if (description.trim() === '') {
                      $('textarea[name="description"]').css('border-color', 'red');
                      $('.error-message-description').show();
                      event.preventDefault();
                    } else {
                      $('textarea[name="description"]').css('border-color', '');
                      $('.error-message-description').hide();
                    }

                    if (price.trim() === '') {
                      $('input[name="price"]').css('border-color', 'red');
                      $('.error-message-price').show();
                      event.preventDefault();
                    } else {
                      $('input[name="price"]').css('border-color', '');
                      $('.error-message-price').hide();
                    }

                    if (!itemImage.match(/(?:jpg|jpeg|png)$/)) {
                      $('input[name="item_image"]').css('border-color', 'red');
                      $('.error-message-image').show();
                      event.preventDefault();
                    } else {
                      $('input[name="item_image"]').css('border-color', '');
                      $('.error-message-image').hide();
                    }
                  });

                  $('input[name="item_name"]').on('input', function() {
                    $(this).css('border-color', '');
                    $('.error-message-name').hide();
                  });
                  $('textarea[name="description"]').on('input', function() {
                    $(this).css('border-color', '');
                    $('.error-message-description').hide();
                  });
                  $('input[name="price"]').on('input', function() {
                    $(this).css('border-color', '');
                    $('.error-message-price').hide();
                  });
                  $('input[name="item_image"]').on('change', function() {
                    $(this).css('border-color', '');
                    $('.error-message-image').hide();
                  });
                });
              </script>

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
                  <td><?php echo $roww['description']; ?></td>
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
                                <h5 class="modal-title" id="modalCenterTitle">Edit Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="items_list.php" enctype="multipart/form-data" id="editItemForm<?php echo $roww['item_id']; ?>">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Item Name</label>
                                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" value="<?php echo $roww['item_name']; ?>" name="edit_item_name<?php echo $roww['item_id']; ?>" />
                                      <span class="error-message-name" style="display: none; color: red;">This field is required.</span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="edit_description<?php echo $roww['item_id']; ?>"><?php echo $roww['description']; ?></textarea>
                                      <span class="error-message-description" style="display: none; color: red;">Description should not exceed 300 words.</span>
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
                                      <span class="error-message-price" style="display: none; color: red;">This field is required.</span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="formFile" class="form-label">Item Image</label>
                                      <input class="form-control" type="file" id="formFile" name="edit_item_image<?php echo $roww['item_id']; ?>" accept=".jpg, .jpeg, .png">
                                      <span class="error-message-image" style="display: none; color: red;">Please select a valid image file (jpg, jpeg, png).</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="edit_add<?php echo $roww['item_id']; ?>">Update</button>
                                </div>
                              </form>

                              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                              <script>
                                $(document).ready(function() {
                                  $('#editItemForm<?php echo $roww['item_id']; ?>').submit(function(event) {
                                    var itemName = $('input[name="edit_item_name<?php echo $roww['item_id']; ?>"]').val();
                                    var description = $('textarea[name="edit_description<?php echo $roww['item_id']; ?>"]').val();
                                    var price = $('input[name="edit_price<?php echo $roww['item_id']; ?>"]').val();
                                    var itemImage = $('input[name="edit_item_image<?php echo $roww['item_id']; ?>"]').val();

                                    if (itemName.trim() === '') {
                                      $('input[name="edit_item_name<?php echo $roww['item_id']; ?>"]').css('border-color', 'red');
                                      $('.error-message-name').show();
                                      event.preventDefault();
                                    } else {
                                      $('input[name="edit_item_name<?php echo $roww['item_id']; ?>"]').css('border-color', '');
                                      $('.error-message-name').hide();
                                    }

                                    if (description.split(' ').length > 300) {
                                      $('textarea[name="edit_description<?php echo $roww['item_id']; ?>"]').css('border-color', 'red');
                                      $('.error-message-description').show();
                                      event.preventDefault();
                                    } else {
                                      $('textarea[name="edit_description<?php echo $roww['item_id']; ?>"]').css('border-color', '');
                                      $('.error-message-description').hide();
                                    }

                                    if (price.trim() === '') {
                                      $('input[name="edit_price<?php echo $roww['item_id']; ?>"]').css('border-color', 'red');
                                      $('.error-message-price').show();
                                      event.preventDefault();
                                    } else {
                                      $('input[name="edit_price<?php echo $roww['item_id']; ?>"]').css('border-color', '');
                                      $('.error-message-price').hide();
                                    }

                                    if (!itemImage.match(/(?:jpg|jpeg|png)$/)) {
                                      $('input[name="edit_item_image<?php echo $roww['item_id']; ?>"]').css('border-color', 'red');
                                      $('.error-message-image').show();
                                      event.preventDefault();
                                    } else {
                                      $('input[name="edit_item_image<?php echo $roww['item_id']; ?>"]').css('border-color', '');
                                      $('.error-message-image').hide();
                                    }
                                  });

                                  $('input[name="edit_item_name<?php echo $roww['item_id']; ?>"]').on('input', function() {
                                    $(this).css('border-color', '');
                                    $('.error-message-name').hide();
                                  });
                                  $('textarea[name="edit_description<?php echo $roww['item_id']; ?>"]').on('input', function() {
                                    $(this).css('border-color', '');
                                    $('.error-message-description').hide();
                                  });
                                  $('input[name="edit_price<?php echo $roww['item_id']; ?>"]').on('input', function() {
                                    $(this).css('border-color', '');
                                    $('.error-message-price').hide();
                                  });
                                  $('input[name="edit_item_image<?php echo $roww['item_id']; ?>"]').on('change', function() {
                                    $(this).css('border-color', '');
                                    $('.error-message-image').hide();
                                  });
                                });
                              </script>

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