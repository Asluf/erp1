<?php
include('conn.php');

$item_code = $_POST['item_code'];
$item_category = $_POST['item_category'];
$item_subcategory = $_POST['item_subcategory'];
$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$unit_price = $_POST['unit_price'];

$sql = "INSERT INTO item (item_code, item_category, item_subcategory, item_name, quantity, unit_price)
        VALUES ('$item_code', $item_category, $item_subcategory,'$item_name', '$quantity', '$unit_price')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
