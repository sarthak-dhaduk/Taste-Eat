<?php include_once 'connection.php' ?>
<?php
switch ($_GET['data']) {
    case 'issues':
        $id = $_GET['id'];
        if ($id != "") {
            $query_delete_issues = "DELETE FROM `issue` WHERE  `issue_id`='$id'";
            if (mysqli_query($con, $query_delete_issues)) {
                header("location:index2.php");
            }
        }
        break;

    case 'items':
        $id = $_GET['id'];
        if ($id != "") {
            $query_delete_items = "DELETE FROM `items` WHERE  `item_id`='$id'";
            if (mysqli_query($con, $query_delete_items)) {
                header("location:items_list.php");
            }
        }
        break;

    case 'orders':
        $id = $_GET['id'];
        if ($id != "") {
            $query_delete_orders = "DELETE FROM `order` WHERE  `order_id`='$id'";
            if (mysqli_query($con, $query_delete_orders)) {
                header("location:order_list.php");
            }
        }
        break;

    case 'reviews':
        $id = $_GET['id'];
        if ($id != "") {
            $query_delete_reviews = "DELETE FROM `review` WHERE  `review_id`='$id'";
            if (mysqli_query($con, $query_delete_reviews)) {
                header("location:reviews.php");
            }
        }
        break;

    case 'users':
        $id = $_GET['id'];
        if ($id != "") {
            $query_delete_users = "DELETE FROM `register` WHERE  `username`='$id'";
            if (mysqli_query($con, $query_delete_users)) {
                header("location:users.php");
            }
        }
        break;

    case 'contact':
        $id = $_GET['id'];
        if ($id != "") {
            $query_delete_contact = "DELETE FROM `contact_us` WHERE  `contact_id`='$id'";
            if (mysqli_query($con, $query_delete_contact)) {
                header("location:contact_us.php");
            }
        }
        break;

    case 'category':
        $id = $_GET['id'];
        if ($id != "") {
            $query_delete_category = "DELETE FROM `category` WHERE  `category_id`='$id'";
            if (mysqli_query($con, $query_delete_category)) {
                header("location:items_list.php");
            }
        }
        break;

    default:
        header("location:index.php");
        break;
}
