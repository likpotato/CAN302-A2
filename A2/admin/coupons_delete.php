<?php
include('../include/connect.php');
$id = $_GET['id'];

$sql = "DELETE FROM coupons WHERE id=$id";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('successfully');window.location.href='account.php?coupons'</script>";
} else {
    echo "<script>alert('error');window.location.href='account.php?coupons'</script>";
}