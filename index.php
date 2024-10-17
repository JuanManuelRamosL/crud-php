<?php
include 'read.php';
?>

<a href="create.php">Crear nuevo usuario</a>

<?php
// Aquí puedes añadir botones de actualizar y eliminar a cada usuario
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo " | <a href='update.php?id=".$row['id']."'>Editar</a> ";
        echo " | <a href='delete.php?id=".$row['id']."'>Eliminar</a><br>";
    }
}
?>
