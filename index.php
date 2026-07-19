<?php
include 'db.php';

// CREATE
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn, "INSERT INTO users (name, email) VALUES ('$name', '$email')");
}

// // DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
}

// READ
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD</title>
</head>
<body>

<h2>Add User</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Enter Name" required>

    <input type="email" name="email" placeholder="Enter Email" required>

    <button type="submit" name="save">Save</button>
</form>

<h2>User List</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)); { ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

            <a href="index.php?delete=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>