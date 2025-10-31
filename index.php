<?php
include 'config.php';

// Protect page (if you're using the auth system)
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3 align-items-center">
        <h2 class="mb-0">Student Record Management</h2>
        <div>
            <a href="add.php" class="btn btn-primary me-2">Add New Student</a>
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Reg. No</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM students");

        if ($result && $result->num_rows > 0) {
            $i = 1; // display counter
            while ($row = $result->fetch_assoc()) {
                // Use htmlspecialchars to avoid XSS when echoing user data
                $name = htmlspecialchars($row['name']);
                $email = htmlspecialchars($row['email']);
                $department = htmlspecialchars($row['department']);
                $reg_no = htmlspecialchars($row['reg_no']);
                $db_id = (int)$row['id']; // for action links

                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>{$name}</td>
                        <td>{$email}</td>
                        <td>{$department}</td>
                        <td>{$reg_no}</td>
                        <td>
                            <a href='edit.php?id={$db_id}' class='btn btn-sm btn-warning'>Edit</a>
                            <a href='delete.php?id={$db_id}' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this student?');\">Delete</a>
                        </td>
                     </tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center'>No students found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
