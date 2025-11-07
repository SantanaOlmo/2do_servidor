<?php
$host = 'localhost'; // Servidor de la base de datos
$db = 'mi_base_datos'; // Nombre de la base de datos
$user = 'usuario'; // Usuario de la base de datos
$pass = 'contraseña'; // Contraseña de la base de datos
$charset = 'utf8mb4'; // Codificación
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {

// Crear la conexión PDO
$pdo = new PDO($dsn, $user, $pass);

// Configurar errores para que lance excepciones
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "¡Conexión exitosa!";

} catch (PDOException $e) {
echo "Error en la conexión: " . $e->getMessage();
}
?>