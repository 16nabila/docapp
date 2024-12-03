<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/book-appointment.css">
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
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <section class="appointment-form">
        <h2>Book an Appointment</h2>
        <form action="book-appointment.php" method="post">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="doctor">Select Doctor:</label>
                <select id="doctor" name="doctor" required>
                    <option value="">-- Select a Doctor --</option>
                    <option value="Dr. John Doe">Dr. John Doe (Cardiologist)</option>
                    <option value="Dr. Jane Smith">Dr. Jane Smith (Pediatrician)</option>
                    <option value="Dr. Emily Johnson">Dr. Emily Johnson (Dermatologist)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="time">Select Appointment Time:</label>
                <input type="datetime-local" id="time" name="time" required>
            </div>
            <button type="submit" class="btn">Book Appointment</button>
        </form>
    </section>

    <footer class="footer">
        <p>&copy; 2024 DocApp. All rights reserved.</p>
    </footer>

</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $doctor = $_POST['doctor'];
    $appointmentTime = $_POST['time'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "docapp";

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO appointments (name, email, phone, address, doctor, appointment_time) 
            VALUES ('$name', '$email', '$phone', '$address', '$doctor', '$appointmentTime')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Appointment successfully booked!'); window.location.href='book-appointment.php';</script>";
    } else {
        echo "<script>alert('Error booking appointment: " . $conn->error . "'); window.location.href='book-appointment.php';</script>";
    }

    $conn->close();
}
?>

