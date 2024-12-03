<?php
session_start(); 



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "docapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM appointments WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Appointment deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $doctor = $_POST['doctor'];
    $appointment_time = $_POST['appointment_time'];

    $sql = "UPDATE appointments SET 
            name='$name', email='$email', phone='$phone', 
            address='$address', doctor='$doctor', 
            appointment_time='$appointment_time' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Appointment updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
<nav class="navbar">
    <div class="logo">DocApp</div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="book-appointment.php">Book Appointment</a></li>
        <li><a href="doctors.php">Doctors</a></li>
        <li><a href="about-us.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="logout.php" class="logout">Logout</a></li> 
    </ul>
</nav>

<div class="container">
    <h2>Admin Dashboard</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Doctor</th>
                <th>Appointment Time</th>
                <th>Reg Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['doctor'] ?></td>
                    <td><?= $row['appointment_time'] ?></td>
                    <td><?= $row['reg_date'] ?></td>
                    <td>
                        <form method="post" style="display: inline-block;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button class="btn btn-delete" name="delete">Delete</button>
                        </form>

                        <button class="btn" onclick="openUpdateForm(<?= $row['id'] ?>)">Update</button>
                    </td>
                </tr>
                <tr id="update-form-<?= $row['id'] ?>" class="update-form">
                    <td colspan="9">
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="text" name="name" value="<?= $row['name'] ?>" required>
                            <input type="email" name="email" value="<?= $row['email'] ?>" required>
                            <input type="tel" name="phone" value="<?= $row['phone'] ?>" required>
                            <input type="text" name="address" value="<?= $row['address'] ?>" required>
                            <input type="text" name="doctor" value="<?= $row['doctor'] ?>" required>
                            <input type="datetime-local" name="appointment_time" value="<?= date('Y-m-d\TH:i', strtotime($row['appointment_time'])) ?>" required>
                            <button class="btn" name="update">Save Changes</button>
                            <button class="btn btn-delete" type="button" onclick="closeUpdateForm(<?= $row['id'] ?>)">Cancel</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function openUpdateForm(id) {
        document.getElementById('update-form-' + id).classList.add('active');
    }

    function closeUpdateForm(id) {
        document.getElementById('update-form-' + id).classList.remove('active');
    }
</script>
</body>
</html>
