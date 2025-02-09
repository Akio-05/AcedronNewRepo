<?php
include 'database/db.php';
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script>
        function confirmDeleteAll() {
            if (confirm("Are you sure you want to delete all students? This action cannot be undone!")) {
                window.location.href = 'delete_files/delete_all.php'; // Fixed
            }
        }
    </script>
</head>
<body class="container mt-4">
    <h2 class="mb-3">Student Management</h2>
    <a href="create.php" class="btn btn-success mb-3">Add New Student</a>
    <button onclick="confirmDeleteAll()" class="btn btn-danger mb-3">Delete All</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>College</th>
                <th>Program</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['student_id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['college'] ?></td>
                    <td><?= $row['program'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['student_id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="delete_files/delete.php?id=<?= $row['student_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
