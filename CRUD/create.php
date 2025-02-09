<?php
include 'database/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $college = $_POST['college'];
    $program = $_POST['program'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO students (name, college, program, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $college, $program, $email);

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
    <title>Add Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Add New Student</h2>
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>College</label>
            <input type="text" name="college" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Program</label>
            <input type="text" name="program" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="student.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
