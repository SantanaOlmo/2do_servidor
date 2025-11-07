## creacion de la base de datos
Al inicializar MySQL y Apache en XAMPP fui a `localhost/phpmyadmin` para ver las bases de datos y desde ahí creé la base de datos `empresa`. Posteriormente con los scripts dado creé las tablas. 

![phpmyadmin](assets/empresa_db.png)
## /actividad1

### 1. config.php
- Define los parámetros de conexión a la base de datos como constantes:
  - `DB_HOST` → dirección del servidor MySQL.
  - `DB_NAME` → nombre de la base de datos.
  - `DB_USER` → usuario de la base de datos.
  - `DB_PASS` → contraseña del usuario.
  - `DB_CHARSET` → codificación de caracteres.
- Construye la variable `$dsn` (Data Source Name) que PDO utiliza para conectarse a MySQL.

## 2. conexion.php
utilizo la conexión creada en conexion.php y la importo una vez con:
````php
require_once __DIR__ . '/../actividad1/conexion.php';
````
luego genero el statement y guardo en la variable empleados la ejecución de ese statement (select) utilizando fetchAll() y así luego poder recorrer los datos con un forEach y mostrar los datos en el html.

![act2](assets/act2.png)

## /actividad2

### listar_empleados.php
Recupera todos los empleados de la base de datos usando PDO y los muestra en una tabla HTML. Cada campo se muestra con `htmlspecialchars()` para evitar problemas de seguridad como la inyección de código HTML o JavaScript.  
Si no hay registros, se muestra un mensaje indicando que no existen empleados.  

## /actividad3

### buscar_empleado.php

Incluye un formulario que mantiene el valor ingresado tras el envío usando `value="<?=htmlspecialchars($input_nombre)?>"`.  
Muestra resultados solo después de que se haya enviado el formulario, controlando la visualización con `$_SERVER['REQUEST_METHOD']==='POST'`.  
El `try/catch` captura errores específicos de la consulta, evitando que el script se rompa y mostrando un mensaje seguro.
![act3](assets/act3.png)
## /actividad4

### nuevo_usuario.php

## /actividad5

### lista.php
### eempleado.php
### eliminar_empleado.php

## /actividad6

### index.php
### usuario.php
### register.php
### login.php
### logout.php
### usuarios_lista.php
### editar_usuario.php
### eliminar_usuario.php
