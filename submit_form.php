<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $organ = $_POST['organ'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // File Upload Handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["payment_screenshot"]["name"]);
    move_uploaded_file($_FILES["payment_screenshot"]["tmp_name"], $target_file);

    // Insert Data into Database
    $stmt = $conn->prepare("INSERT INTO donors (fullname, age, organ, email, address, payment_screenshot) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissss", $fullname, $age, $organ, $email, $address, $target_file);

    if ($stmt->execute()) {
        echo "Thank you for registering as a donor!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>
