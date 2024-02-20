<?php
include('../include/connect.php');
$id = $_GET['id'];

$sql = "DELETE FROM orders WHERE id_inOrder=$id";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('successfully');window.location.href='account.php?order'</script>";
} else {
    echo "<script>alert('error');window.location.href='account.php?order'</script>";
}