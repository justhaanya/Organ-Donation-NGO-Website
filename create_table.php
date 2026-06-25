<?php
include 'db.php';

$sql = "CREATE TABLE IF NOT EXISTS donors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    organ VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    address TEXT NOT NULL,
    payment_screenshot VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'donors' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
