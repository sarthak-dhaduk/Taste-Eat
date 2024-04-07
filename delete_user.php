<?php include_once 'connection.php' ?>
<?php


switch ($_GET['data']) {
    case 'issues':
        $id = $_GET['id'];
        if ($id != "") {
            $query_delete_issues = "DELETE FROM `issue` WHERE  `issue_id`='$id'";
            if (mysqli_query($con, $query_delete_issues)) {
                header("location:index3.php");
            }
        }
        break;

    case 'orders':
        $id = $_GET['id'];
        $date = $_GET['date'];
        $time = $_GET['time'];
        if ($id != "" && $date != "" && $time != "") {

            if ((date('Y-m-d') == $date) && (date('H:i:s') < $time)) {
                // echo date('H:i:s');
                $query_delete_orders = "DELETE FROM `order` WHERE  `order_id`='$id'";
                if (mysqli_query($con, $query_delete_orders)) {
                    header("location:index3.php");
                }
            }else{
                header("location:index3.php");
            }
        }
        break;

    case 'reviews':
        $id = $_GET['id'];
        if ($id != "") {
            $query_delete_reviews = "DELETE FROM `review` WHERE  `review_id`='$id'";
            if (mysqli_query($con, $query_delete_reviews)) {
                header("location:index3.php");
            }
        }
        break;


    case 'contact':
        $id = $_GET['id'];
        if ($id != "") {
            $query_delete_contact = "DELETE FROM `contact_us` WHERE  `contact_id`='$id'";
            if (mysqli_query($con, $query_delete_contact)) {
                header("location:index3.php");
            }
        }
        break;

    default:
        header("location:index.php");
        break;
}
?>