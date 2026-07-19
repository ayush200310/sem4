<?php
include 'db.php';

$id = $_GET['id'];

// Get existing user
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$user = mysqli_fetch_assoc($result);

// UPDATE
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn,"UPDATE users SET name='$name', email='$email' WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST">

    <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>