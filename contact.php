<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles/index.css">
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

    <section class="contact-section">
        <h2>Contact Us</h2>
        <p>If you have any questions or would like to get in touch with us, please fill out the contact form below:</p>
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Your Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="btn">Send Message</button>
        </form>
    </section>

    <footer class="footer">
        <p>&copy; 2024 DocApp. All rights reserved.</p>
    </footer>

</body>
</html>
