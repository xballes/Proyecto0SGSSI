# REFUGIO PERRUNO (Xabier Ballesteros,Alvaro Guerricagoitia y Mikel Pedro)

Este proyecto trata sobre el desarrollo de una página web usando HTML,CSS,JavaScript,PHP,MariaDB y Docker.
En este caso hemos decidido que la temática sea de un refugio para perros.
## Instrucciones para el despliegue
1.Situarse en el directorio:
```
$ cd docker-lamp
```
2.Construir la imagen web:
```
$ sudo docker build -t="web" .
```
3.Introducir el siguiente comando para iniciar el contenedor:
```
$ sudo docker-compose up
```
4.Acceder a la página de PHPMyAdmin donde habrá que importar la base de datos **database.sql**:
```
http://localhost:8890/
```
5.Una vez en PHPMyAdmin iniciar sesión con Usuario: "admin" Contraseña: "test", despues hacer click en database e importar la base de datos **database.sql**.

6.Después de realizar todos los pasos hay que introducir la siguiente dirección para acceder a la página web:
```
http://localhost:81/
```

## Uso de la página
En la página principal, se encuentra la información acerca del refugio, una barra de navegación para acceder a los distintos apartados de la página y en la parte inferior tres botones, uno para ver la lista de perros, otro para añadir perros y otro para modificar los datos del usuario, que al pulsarlo redigirá al formulario para iniciar sesión. En la lista de animales es posible tanto modificar los datos del perro seleccionado como eliminar el perro seleccionado.

Para poder acceder al área personal del usuario es necesario registrarse o iniciar sesión. El botón para ello se encuentra en la barra superior, y en caso de que el usuario ya disponga de una cuenta, puede iniciar sesión.

Una vez en el área la única opción disponible es la de modificar los datos del usuario que haya iniciado la sesión o se haya registrado. 

También está disponible un botón 'Galería' que muestra fotos de los perros del refugio y un formulario de contacto (que no funciona) en caso de que alguien se quiera poner en contacto con el refugio.
