<?php
include 'database/db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE student_id=$id");
$student = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $college = $_POST['college'];
    $program = $_POST['program'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE students SET name=?, college=?, program=?, email=? WHERE student_id=?");
    $stmt->bind_param("ssssi", $name, $college, $program, $email, $id);

    if ($stmt->execute()) {
        header("Location: student.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Edit Student</h2>
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= $student['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label>College</label>
            <input type="text" name="college" class="form-control" value="<?= $student['college'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Program</label>
            <input type="text" name="program" class="form-control" value="<?= $student['program'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $student['email'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="student.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
