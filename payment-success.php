<?php
include_once 'connection.php';

if ($_GET['id']) {
    $id = $_GET['id'];

    $status = "Done";

    $q_edit_order = "UPDATE `order` SET `payment_status` = '$status' WHERE `order_id`='$id'";

    $q_edit_order_r = mysqli_query($con, $q_edit_order);

    if ($q_edit_order_r) {
      header("location:index3.php");
    }
} else {
    header("location:index.php");
}