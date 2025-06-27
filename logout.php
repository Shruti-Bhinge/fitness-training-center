<?php
session_start();
session_destroy(); // End the session
header("Location: index.html"); // Redirect to home page
exit();
?>