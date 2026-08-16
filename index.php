<?php

include "db.php";

$sql = "SELECT id, name, age, status FROM users";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>

<body>

<h2>Add User</h2>

<form action="insert.php" method="GET">

    <label>Name:</label>
    <input type="text" name="name" required>

    <br><br>

    <label>Age:</label>
    <input type="number" name="age" required>

    <br><br>

    <input type="submit" value="Submit">

</form>

<br>

<h2>Users</h2>

<table border="1">

    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

<?php

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td><button onclick='toggleStatus(" . $row["id"] . ", this)'>Toggle</button></td>";
        echo "</tr>";

    }

}

?>

</table>
<script>
function toggleStatus(id, button) {

    fetch("toggle.php?id=" + id)
        .then(response => response.text())
        .then(data => {

            if (data === "success") {

                let row = button.parentElement.parentElement;
                let statusCell = row.cells[2];

                if (statusCell.innerText == "0") {
                    statusCell.innerText = "1";
                } else {
                    statusCell.innerText = "0";
                }

            }

        });
}
</script>
</body>
</html>

<?php
$conn->close();
?>