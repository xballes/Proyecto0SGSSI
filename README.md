# REFUGIO PERRUNO (Xabier Ballesteros,Alvaro Guerricagoitia y Mikel Pedro)

Este proyecto trata sobre el desarrollo de una pagina web usando HTML,CSS,JavaScript,PHP,MariaDB y Docker.
En este caso hemos decidido que la tematica sea de un refugio para perros.
## Instrucciones para el despliegue
1.Situarse en el directorio:
```
$ cd docker-lamp
```
2.Construir la imagen web:
```
$ docker build -t="web" .
```
3.Introducir el siguiente comando para iniciar el contenedor:
```
$ docker-compose up
```
Una vez realizados estos pasos,hay que introducir la siguiente direccion para acceder a la página:
```
http://localhost:81/
```
Y para acceder a la pagina de PHPMyAdmin donde habrá que importar la base de datos database.sql:
```
http://localhost:8890/
```

## Uso de la página
En la pagina principal,se encuentra la información acerca del refugio,una barra de navegación para acceder a los distintos apartados de la pagina y en la parte inferior dos botones,uno para ver la lista de perros y otro para añadir perros. En la lista de animales es posible tanto modificar los datos del perro seleccionado como eliminar el perro seleccionado.

Para poder acceder al area personal del usuario es necesario registrarse o iniciar sesión.El botón para ello se encuentra en la barra superior, y en caso de que el usuario ya disponga de una cuenta,puede iniciar sesión.

Una vez en el área la única opción disponible es la de modificar los datos del usuario que haya iniciado la sesión o se haya registrado. 

Tambien está disponible un boton 'Galería' que muestra fotos de los perros del refugio y un formulario de contacto ( que no funciona de momento) en caso de que alguien se quiera poner en contacto con el refugio.

