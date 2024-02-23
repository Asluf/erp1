<?php
include('conn.php');

$title = $_POST['title'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$contact_number = $_POST['contact_number'];
$district = $_POST['district'];

$sql = "INSERT INTO customer (title, first_name, middle_name, last_name, contact_no, district)
        VALUES ('$title', '$first_name', '$middle_name', '$last_name', '$contact_number', $district)";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
