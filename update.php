<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado correctamente";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

?>

<form method="POST" action="update.php?id=<?php echo $user['id']; ?>">
  <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
  Nombre: <input type="text" name="name" value="<?php echo $user['name']; ?>"><br>
  Email: <input type="email" name="email" value="<?php echo $user['email']; ?>"><br>
  <input type="submit" value="Actualizar Usuario">
</form>
