Parte  1:
Coge los archivos de config y conexion de la actividad anterior. Asegúrate de que funcionan.

Vamos a usar la base de datos empresa y la tabla empleados. Asegúrate de tenerlas creadas y con datos.

Puntos: 1


Parte  2: 
Crea tu archivo api.php siguiendo el ejemplo de la presentación, pero que utilice tu archivo de conexión para conectar con la BD y consulte/modifique la base de datos empresa y la tabla empleados, en lugar de las del ejemplo. Si seguís el ejemplo, en el switch enorme, centraos por el momento en el case GET (que sería el que lista todos los empleados). Modifica el query para sacar los datos de empleados.

Ejecuta para probar tu api.php. Debería verse el json de la lista de empleados como un texto plano. Entendéis por qué, no?

Puntos: 1.5



Parte  3: 
Vamos ahora a crear la parte frontEnd básica para mostrar los empleados de la empresa.  Crea un html muy básico que llame a tu API usando fetch y liste los empleados. Consulta el ejemplo de la presentación como ayuda.

Si aun no te queda claro, tienes que usar fetch en un script tal que así:



<script>
    // Hacer una petición GET a nuestra API
    fetch('api.php?recurso=empleados')
      .then(response => response.json())
      .then(empleados=> {
        // Obtener el contenedor donde mostraremos los empleados. 
        // Recorrer cada producto y crear elementos li con los datos de empleados
      .catch(error => {
        console.error('Error al cargar empleados:', error);
      });
  </script>
Si todo está bien, cuando lancéis el html, el fetch realizará la petición, y una vez resuelta asíncronamente mostrará la lista de empleados. Al estar en localhost será instantáneo,  y parecerá que no es asíncrono, pero lo suyo es que antes del fetch mostréis un loading spinner y al finalizar la carga lo ocultéis.

Puntos: 2



Parte  4: 
Vamos ahora a por el POST (el Create del CRUD). Volvemos al api.php, y ahora modificamos la parte del switch donde está el CASE POST. Modifica el código para que inserte un nuevo elemento en la tabla empleados recibiendo nombre, puesto y salario como variables en el POST, como hiciste en la actividad anterior. Si todo ha ido bien, imprime un JSON con dos parámetros:



{
    "status": "ok",
    "id": //y aquí captura el id del nuevo elemento insertado
}
Si se produce un error (porque, por ejemplo falte algún parámetro, imprime un JSON tal que así:

{
    "error": "Datos incompletos o en formato incorrecto."
}
O, si quieres, puedes mostrar más info sobre el error.



Vale, ahoora, a diferencia de la parte del GET, al recibir los datos por POST no podemos probar esta parte directamente accediendo a api.php. Una vez tengamos esta parte ahora tendrías que crear otro html con un formulario para introducir los datos para siquiera poder probarlo. Para acelerar el proceso de prueba, vamos a probar a usar POSTMAN.

Abrea postman.com. Usa tu usuario de ilerna de google para acceder, y descarga la versión de escritorio. Ejecútala. Parece que no hace nada, pero sí que hace: instala lo necesario. Ahora en teoría deberías poder probar llamadas a tu localhost en postman.

Se pueden hacer muchas cositas y deberías bichearlo más tarde con tiempo, pero ahora vamos al grano. Lo que nos interesa es probar una nueva request. Sería aquí: image1.png

Selecciona "GET" por ahora. Vamos a probar lo que ya sabemos que funciona para asegurarnos de que postman conecta bien. Introduce la ruta a tu localhost. Si haces pruebas en un server que esté live no hay problemas. Para probar peticiones en tu local, postman no puede... a no ser que instales la versión de escritorio, que.. BOOM!, es justo  lo que acabamos de hacer. Pues nada, una vez hayas metido la ruta a tu api.php en tu localhost, dale a SEND  y deberías poder ver el JSON con su formato, e incluso verlo en formato tabla:
image2.png

Vale, una vez confirmado que postman funciona y conecta con nuestra api, y de paso, de haber probado con GET, vamos ahora a por el POST. La forma más fácil y rápida de probar POST en postman es usar un JSON con los parámetros que enviaremos en el POST. En nuestro caso queremos crear un nuevo empleado en la tabla pasando nombre, puesto y sueldo, o

sea que sería algo así:
image3.png

Si el formato del JSON es correcto,  y todo ha ido bien, en la parte de abajo deberíamos ver el json de  respuesta  que preparaste con el status ok y el id nuevo. Y si no, pues el error.

Cuando consigas el status ok, vuelve a la request de GET y dale a SEND, para comprobar que, efectivamente, ahí está el nuevo registro.



Puntos: 2.5



Parte  5: 
Vale, ya tienes una api sencilla con GET y POST, sabes realizar pruebas con postman, y tienes un html que llama a tu api para listar los elementos de una tabla. Ahora ya sabes lo que toca: modificar ese html para incluir un formulario sencillo con nombre, puesto y sueldo, que llame a la api para añadir el nuevo elemento a la tabla de la base de datos, y que muestre un mensaje por pantalla indicando el error si se produce, o bien el éxito. Añade también un botón bajo la lista que recargue la lista con la tabla actualizada sin recargar la página.

Particularidades del fetch en el POST:



            fetch('api.php?recurso=empleados', {
                method: 'POST', //al enviarlo por POST la API entiende que no queremos listar (GET) sino insertar (POST)
                headers: {
                    'Content-Type': 'application/json' // Indicamos que enviamos datos JSON
                },
                body: JSON.stringify(nuevoEmpleado) // nuevoEmpleado es el objeto que contiene el nuevo nombre, puesot y salario, y lo convertimos a una cadena JSON
            })


Puntos: 3



Parte  6 (Opcional):
Si os atrevéis y tenéis tiempo podéis intentar replicar el CRUD completo de la actividad anterior en un solo html y haciendo llamadas a la API sin recargar el html. La idea sería tener una tabla que en cada fila tenga un empleado. Cada columna un input para un dato del empleado (nombre, puesto, salario), y luego un botón de editar y otro de eliminar. Si pulsas editar, llamaría a la api al PUT pasando los datos actualizados del empleado. Si se pulsa en el de eliminar, llamaría al DELETE de la api para eliminar el registro de esa fila. Y luego lo que ya teníamos para hacer el POST y el botón para hacer el GET. Cada vez que se recibe respuesta tras llamar a la API, lo más seguro sería recargar la tabla (bueno, el GET ya lo hace de por sí).

Y ya estaría! Con esto ya podemos montarnos nuestro servicio con un MVC mucho más aseado y separado.



Puntos: +1 Punto en otra actividad de servidor a elegir (previa a ésta y que tenga 9 o menos puntos).
