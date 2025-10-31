<?php include 'config.php'; 

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $reg_no = $_POST['reg_no'];

    $conn->query("UPDATE students SET name='$name', email='$email', department='$department', reg_no='$reg_no' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Edit Student</h2>
    <form method="POST">
        <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control mb-3" required>
        <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control mb-3" required>
        <input type="text" name="department" value="<?= $row['department'] ?>" class="form-control mb-3">
        <input type="text" name="reg_no" value="<?= $row['reg_no'] ?>" class="form-control mb-3">
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
