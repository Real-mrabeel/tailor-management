<?php include 'config.php'; 

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $reg_no = $_POST['reg_no'];

    $sql = "INSERT INTO students (name, email, department, reg_no)
            VALUES ('$name', '$email', '$department', '$reg_no')";
    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Add New Student</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Department</label>
            <input type="text" name="department" class="form-control">
        </div>
        <div class="mb-3">
            <label>Registration No</label>
            <input type="text" name="reg_no" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
