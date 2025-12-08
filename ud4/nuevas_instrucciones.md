# Instrucciones Pendientes / Verificación

## Pruebas con Postman (Parte 4 y 5)
Como modelo de IA, no puedo abrir la aplicación de escritorio Postman en tu ordenador. Debes realizar las pruebas descritas en las instrucciones originales (Parte 4) manualmente:
1.  Abre Postman.
2.  Prueba el endpoint GET (`http://localhost/2do_servidor/ud4/Act_API_rest/api.php?recurso=empleados`). Verifica que recibes el JSON de empleados.
3.  Prueba el endpoint POST. Crea una request POST a la misma URL, y en el Body selecciona `raw` y `JSON`. Envía un JSON como:
    ```json
    {
        "nombre": "Prueba",
        "puesto": "Tester",
        "sueldo": 20000
    }
    ```
4.  Verifica que recibes `{"status": "ok", "id": ...}`.

(Consulta las imágenes `image1.png`, `image2.png`, `image3.png` en la carpeta `imagenes_instrucciones` para guía visual).

## Parte 6 (Opcional)
Esta parte es opcional y requiere una expansión considerable del código (`api.php` y `index.html`) para soportar PUT y DELETE y una interfaz de tabla editable.

**Instrucción original:**
Si os atrevéis y tenéis tiempo podéis intentar replicar el CRUD completo de la actividad anterior en un solo html y haciendo llamadas a la API sin recargar el html.
-   **Tabla editable**: Cada fila tiene inputs con los datos del empleado.
-   **Botón Editar**: Llama a `api.php` con método PUT y los datos actualizados.
-   **Botón Eliminar**: Llama a `api.php` con método DELETE para borrar el registro.
-   **Actualización**: Recargar la tabla tras cada acción.

Si deseas que implemente esta parte, por favor indícamelo en la próxima interacción.
