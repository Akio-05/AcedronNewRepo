<?php
include '../database/db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM students WHERE student_id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../student.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}
?>
