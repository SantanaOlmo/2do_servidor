<?php
header('Content-Type: application/json');
require_once 'conexion.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['recurso']) && $_GET['recurso'] == 'empleados') {
            try {
                $stmt = $pdo->query("SELECT * FROM empleados");
                $empleados = $stmt->fetchAll();
                echo json_encode($empleados);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(["error" => "Error al obtener empleados: " . $e->getMessage()]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Recurso no especificado o incorrecto"]);
        }
        break;

    case 'POST':
        // Leer el body JSON
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        // Si no es un JSON válido o está vacío, probar con $_POST (form-data o x-www-form-urlencoded)
        if (json_last_error() !== JSON_ERROR_NONE || empty($input)) {
            $input = $_POST;
        }

        if (isset($_GET['recurso']) && $_GET['recurso'] == 'empleados') {
            
            // Permitir 'salario' como alias de 'sueldo'
            if (!isset($input['sueldo']) && isset($input['salario'])) {
                $input['sueldo'] = $input['salario'];
            }

            $missingFields = [];
            if (!isset($input['nombre'])) $missingFields[] = 'nombre';
            if (!isset($input['puesto'])) $missingFields[] = 'puesto';
            if (!isset($input['sueldo'])) $missingFields[] = 'sueldo (o salario)';

            if (empty($missingFields)) {
                try {
                    $sql = "INSERT INTO empleados (nombre, puesto, salario) VALUES (:nombre, :puesto, :sueldo)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':nombre' => $input['nombre'],
                        ':puesto' => $input['puesto'],
                        ':sueldo' => $input['sueldo']
                    ]);
                    
                    echo json_encode([
                        "status" => "ok",
                        "id" => $pdo->lastInsertId()
                    ]);
                } catch (PDOException $e) {
                    http_response_code(500);
                    echo json_encode(["error" => "Error al insertar empleado: " . $e->getMessage()]);
                }
            } else {
                http_response_code(400);
                echo json_encode([
                    "error" => "Datos incompletos.",
                    "faltan" => $missingFields,
                    "recibido" => $input // Opcional: para depurar qué está llegando
                ]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Recurso no especificado o incorrecto"]);
        }
        break;

    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
?>
