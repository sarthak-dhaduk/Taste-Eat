<?php include './admin_include/header.php' ?>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Review/</span> Ratting List</h4>
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
            $q_select_review = "SELECT * FROM `review`";
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
                  <td>
                    <div class="cut-text">
                      <?php
                      $description = $roww['description'];
                      $words = explode(" ", $description);
                      $trimmed = implode(" ", array_slice($words, 0, 10)); // Display first 10 words
                      echo htmlspecialchars($trimmed, ENT_QUOTES, 'UTF-8');
                      if (count($words) > 10) {
                        echo '...'; // Display "..." if there are more than 10 words
                      }
                      ?>
                    </div>
                    <div class="full-text" style="display: none;"><?php echo htmlspecialchars($roww['description'], ENT_QUOTES, 'UTF-8'); ?></div>
                    <a href="#" class="read-more">Read more</a>
                  </td>
                  <script>
                    $(document).ready(function() {
                      $('.read-more').click(function(event) {
                        event.preventDefault();
                        $(this).parent().find('.cut-text').hide();
                        $(this).parent().find('.full-text').show();
                        $(this).hide();
                      });
                    });
                  </script>
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
                                <h5 class="modal-title" id="modalCenterTitle">Edit Review</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form id="editReviewForm" method="post" action="reviews.php" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">User Name</label>
                                      <input type="text" class="form-control" placeholder="Enter User Name" value="<?php echo $roww['user_name']; ?>" name="edit_user_name<?php echo $roww['review_id']; ?>" />
                                      <span class="error-message" style="color: red; display: none;">User Name is required.</span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Email</label>
                                      <input type="email" class="form-control" placeholder="Enter Email ID" value="<?php echo $roww['email']; ?>" name="edit_email<?php echo $roww['review_id']; ?>" />
                                      <span class="error-message" style="color: red; display: none;">Email is required.</span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Item Name</label>
                                      <input type="text" class="form-control" placeholder="Enter Item Name" value="<?php echo $roww['item_name']; ?>" name="edit_item_name<?php echo $roww['review_id']; ?>" />
                                      <span class="error-message" style="color: red; display: none;">Item Name is required.</span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                      <textarea class="form-control" id="edit_description" rows="3" name="edit_description<?php echo $roww['review_id']; ?>"><?php echo $roww['description']; ?></textarea>
                                      <span class="error-message" style="color: red; display: none;">Description is required and should not exceed 300 words.</span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Rating</label>
                                      <input type="number" class="form-control" value="<?php echo $roww['rating']; ?>" name="edit_rating<?php echo $roww['review_id']; ?>" />
                                      <span class="error-message" style="color: red; display: none;">Rating is required.</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="edit_review<?php echo $roww['review_id']; ?>">Update</button>
                                </div>
                              </form>
                              <script>
                                $(document).ready(function() {
                                  $('#editReviewForm').submit(function(event) {
                                    var userName = $('input[name="edit_user_name<?php echo $roww['review_id']; ?>"]').val();
                                    var email = $('input[name="edit_email<?php echo $roww['review_id']; ?>"]').val();
                                    var itemName = $('input[name="edit_item_name<?php echo $roww['review_id']; ?>"]').val();
                                    var description = $('#edit_description').val();
                                    var rating = $('input[name="edit_rating<?php echo $roww['review_id']; ?>"]').val();

                                    var isValid = true;

                                    if (userName.trim() === '') {
                                      $('input[name="edit_user_name<?php echo $roww['review_id']; ?>"]').css('border-color', 'red');
                                      $('input[name="edit_user_name<?php echo $roww['review_id']; ?>"]').siblings('.error-message').show();
                                      isValid = false;
                                    } else {
                                      $('input[name="edit_user_name<?php echo $roww['review_id']; ?>"]').css('border-color', '');
                                      $('input[name="edit_user_name<?php echo $roww['review_id']; ?>"]').siblings('.error-message').hide();
                                    }

                                    if (email.trim() === '') {
                                      $('input[name="edit_email<?php echo $roww['review_id']; ?>"]').css('border-color', 'red');
                                      $('input[name="edit_email<?php echo $roww['review_id']; ?>"]').siblings('.error-message').show();
                                      isValid = false;
                                    } else {
                                      $('input[name="edit_email<?php echo $roww['review_id']; ?>"]').css('border-color', '');
                                      $('input[name="edit_email<?php echo $roww['review_id']; ?>"]').siblings('.error-message').hide();
                                    }

                                    if (itemName.trim() === '') {
                                      $('input[name="edit_item_name<?php echo $roww['review_id']; ?>"]').css('border-color', 'red');
                                      $('input[name="edit_item_name<?php echo $roww['review_id']; ?>"]').siblings('.error-message').show();
                                      isValid = false;
                                    } else {
                                      $('input[name="edit_item_name<?php echo $roww['review_id']; ?>"]').css('border-color', '');
                                      $('input[name="edit_item_name<?php echo $roww['review_id']; ?>"]').siblings('.error-message').hide();
                                    }

                                    if (description.trim() === '') {
                                      $('#edit_description').css('border-color', 'red');
                                      $('#edit_description').siblings('.error-message').show();
                                      isValid = false;
                                    } else {
                                      $('#edit_description').css('border-color', '');
                                      $('#edit_description').siblings('.error-message').hide();
                                    }

                                    if (rating.trim() === '') {
                                      $('input[name="edit_rating<?php echo $roww['review_id']; ?>"]').css('border-color', 'red');
                                      $('input[name="edit_rating<?php echo $roww['review_id']; ?>"]').siblings('.error-message').show();
                                      isValid = false;
                                    } else {
                                      $('input[name="edit_rating<?php echo $roww['review_id']; ?>"]').css('border-color', '');
                                      $('input[name="edit_rating<?php echo $roww['review_id']; ?>"]').siblings('.error-message').hide();
                                    }

                                    return isValid;
                                  });

                                  $('#editReviewForm input, #edit_description').on('input', function() {
                                    $(this).css('border-color', '');
                                    $(this).siblings('.error-message').hide();
                                  });
                                });
                              </script>

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
                                  header("location:reviews.php");
                                }
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                        <a href="delete_admin.php?id=<?php echo $roww['review_id']; ?>&data=reviews" class="btn btn-outline-danger">
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