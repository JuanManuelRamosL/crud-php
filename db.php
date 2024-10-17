<?php
// Conexión a la base de datos MySQL
$servername = "localhost:3333";
$username = "root";  // Cambia esto si tienes un usuario diferente
$password = "";      // Cambia esto si tienes una contraseña
$dbname = "fede";  // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear la tabla de usuarios si no existe
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

// Ejecutar la consulta de usuarios
if ($conn->query($sql_users) === TRUE) {
    echo "Tabla 'users' está lista o ya existe.<br>";
} else {
    echo "Error al crear la tabla 'users': " . $conn->error . "<br>";
}

// Crear la tabla de productos si no existe
$sql_products = "CREATE TABLE IF NOT EXISTS products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Ejecutar la consulta de productos
if ($conn->query($sql_products) === TRUE) {
    echo "Tabla 'products' está lista o ya existe.<br>";
} else {
    echo "Error al crear la tabla 'products': " . $conn->error . "<br>";
}

// Cerrar conexión
$conn->close();
?>
