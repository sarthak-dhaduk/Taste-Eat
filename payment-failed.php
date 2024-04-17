<?php
if ($_GET['id']) {
    $id = $_GET['id'];

    header("location:checkout.php?id=$id");

} else {
    header("location:index.php");
}