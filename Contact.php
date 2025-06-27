<?php
// Include database connection
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare and bind (prevent SQL injection)
    $stmt = $conn->prepare("INSERT INTO contact_submissions (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    // Execute query
    if ($stmt->execute()) {
        echo '<style>#overlay, #thankYouPopup { display: block !important; }</style>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Sneha Fitness</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .thank-you-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #4CAF50;
            color: white;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            z-index: 1000;
            text-align: center;
            max-width: 80%;
            animation: fadeIn 0.3s;
        }
        .thank-you-popup i {
            font-size: 40px;
            margin-bottom: 15px;
            display: block;
        }
        .thank-you-popup p {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <!-- Thank You Popup -->
    <div class="overlay" id="overlay" style="display: none;"></div>
    <div class="thank-you-popup" id="thankYouPopup" style="display: none;">
        <i class="fas fa-check-circle"></i>
        <p>Thank you! We will contact you soon.</p>
    </div>

    <header>
        <div class="container flex">
            <div class="logo">Sneha<span>Fitness</span></div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="Contact.html" class="active">Contact</a></li>
                    <li><a href="review.html">Review</a></li>
                    <li><a href="logout.php" class="btn" style="background-color: #ff4757;">Sign Out</a></li>
                </ul>
            </nav>
            
        </div>
    </header>

    <section id="contact">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <div class="contact-form">
                <form method="POST" action="Contact.php">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Your Phone Number" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="logo">Sneha<span>Fitness</span></div>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <p>Call us: <a href="tel:+919876543210">+91 98765 43210</a></p>
            <p>&copy; <?php echo date("Y"); ?> Sneha Fitness. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>