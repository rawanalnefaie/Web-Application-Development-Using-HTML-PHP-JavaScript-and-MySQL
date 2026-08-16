<?php

include "db.php";

$id = $_GET['id'];

$sql = "UPDATE users
        SET status = 1 - status
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();

?>