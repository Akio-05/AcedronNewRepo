<?php
include '../database/db.php';


$sql = "DELETE FROM students";

if ($conn->query($sql) === TRUE) {
    header("Location: ../student.php");
    exit();
} else {
    echo "Error deleting records: " . $conn->error;
}
?>
