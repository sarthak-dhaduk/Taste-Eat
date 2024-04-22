<?php include './admin_include/header.php' ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Contact/</span> Contact List</h4>
        <div class="card">
            <h5 class="card-header" style="font-size: 1.5rem;">All Reviews</h5>
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
                        $q_select_contact = "SELECT * FROM `contact_us`";
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
                                    <td>
                                        <div class="cut-text">
                                            <?php
                                            $oldcontact_id = $roww['contact_id'];
                                            $description = $roww['description'];
                                            $words = explode(" ", $description);
                                            $trimmed = implode(" ", array_slice($words, 0, 5));
                                            echo htmlspecialchars($trimmed, ENT_QUOTES, 'UTF-8');
                                            if (count($words) > 5) {
                                                echo '...';
                                                echo "<br><a href='' class='read-more' data-bs-toggle='modal' data-bs-target='#description$oldcontact_id'>Read more</a>";
                                            }
                                            ?>
                                        </div>
                                        <div class="modal fade" id="description<?php echo $roww['contact_id']; ?>" tabindex="-1" style="display: none;" aria-hidden="true">
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
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="edit_description<?php echo $roww['contact_id']; ?>"><?php echo $roww['description']; ?></textarea>
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
                                                            <form method="post" action="contact_us.php" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">User Name</label>
                                                                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter User Name" value="<?php echo $roww['user_name']; ?>" name="edit_user_name<?php echo $roww['contact_id']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">Email</label>
                                                                            <input type="email" id="nameWithTitle" class="form-control" placeholder="Enter Email ID" value="<?php echo $roww['email']; ?>" name="edit_email<?php echo $roww['contact_id']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle" class="form-label">Date</label>
                                                                            <input type="date" id="nameWithTitle" class="form-control" placeholder="Enter Item Name" value="<?php echo $roww['date']; ?>" name="edit_date<?php echo $roww['contact_id']; ?>" />
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
                                                                    header("location:contact_us.php");
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="btn btn-outline-danger delete-contact" data-id="<?php echo $roww['contact_id']; ?>">
                                                    <i class="tf-icons bx bxs-trash"></i> 
                                                </a>
                                                <!-- Include SweetAlert library -->
                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        // Select all delete-contact buttons
                                                        const deleteButtons = document.querySelectorAll('.delete-contact');
                                                        deleteButtons.forEach(button => {
                                                            button.addEventListener('click', function(e) {
                                                                e.preventDefault();
                                                                const id = this.getAttribute('data-id');

                                                                Swal.fire({
                                                                    title: 'Are you sure?',
                                                                    text: "You won't be able to revert this!",
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Yes, delete it!'
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        // If confirmed, redirect to delete_admin.php with the appropriate parameters
                                                                        window.location.href = `delete_admin.php?id=${id}&data=contact`;
                                                                    }
                                                                });
                                                            });
                                                        });
                                                    });
                                                </script>
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