<?php
include('../include/connect.php');
$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id_inUser=$id";
if (mysqli_query($con, $sql)) {
    echo "<script>alert('successfully');window.location.href='account.php?user'</script>";
} else {
    echo "<script>alert('error');window.location.href='account.php?user'</script>";
}