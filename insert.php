<?php

include "db.php";

$name = $_GET['name'];
$age = $_GET['age'];

$sql = "INSERT INTO users (name, age)
        VALUES ('$name', '$age')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>