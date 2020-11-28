Óscar Moreira

Calos Oliva
___

# Panel de Control Hosting Web
___
![portada](./img/portada.png)

___

# Práctica

Esta práctica consistira en tener un panel de control de hosting en un servidor en el que tengamos: `Linux`, `Apache`, `MySQL` y `PHP`, lo que se conoce por sus siglas como `LAMP`.

En nuestro caso elegimos el panel de control llamado *Webmin* y lo hemos instalado en ***Ubuntu 16.04***.

___
___

# Procedimiento

Empezaremos teniendo instalado el sistema operativo *Ubuntu 16.04* y empezaremos instalando *Apache*, *PHP*, *MySQL* y por último el panel de control *Webmin*.

___

# 1. Apache

- Lo primero que haremos será instalar *Apache* con el comando: `sudo apt install apache2`

  ![install apache](./img/1-install-apache.png)

- Luego verificaremos que el servicio esta corriendo: `sudo systemctl status apache2`

  ![status apache](./img/2-status-apache.png)

- Confirmado que esta corriendo el servicio iremos al navegador e iremos a ***localhost***  y nos debe salir la página por defecto de *Apache*.

  ![web apache](./img/3-web-apache-.png)

___

# 2. PHP

- Instalaremos *PHP* : `sudo apt install php`

  ![install php](./img/4-install-php.png)

- Una vez instalado pasaremos a instalar las librerías de *PHP* para *Apache*. `sudo apt install libapache2-mod-php`

  ![librerias php](./img/5-libreria-php-apache.png)

- Ahora pasaremos a crear un **index.php**, esto lo crearemos en la ruta por defecto `/var/www/html`, dentro habrá un index.html que le cambiaremos el nombre para que no lo detecte y crearemos el **index.php** ahi dentro.

  - Contenido del index.php:

    ~~~
    <?php

    phpinfo();

    ?>
    ~~~

  ![index php](./img/6-index.php.png)

- Ahora si entramos en ***localhost*** en el navegador veremos que ya no nos sale el index de apache y nos sale el **index.php** que acabamos de crear.

  ![web php](./img/7-web-php.png)

___

# 3. MySQL

- Instalaremos *MySQL*: `sudo apt install mysql-server`

  ![install MySQL](./img/8-install-mysql.png)

- En medio de la instalación nos pedira una contraseña ***root*** para *MySQL*.

  ![pass MySQL](./img/9-pass-mysql.png)

  ![pass MySQL](./img/10-pass-mysql-2.png)

- Por último instalaremos *PHP* para *MySQL*.

  ![php MySQL](./img/11-php-mysql.png)

___
___

# 4. Webmin

En este apartado explicaremos como descargar e instalar *Webmin* y también hacer alguna configuración y ajustes para hacer de ejemplo en la práctica.

## 4.1 Instalación Webmin

- Iremos a la página http://www.webmin.com/download.html y descargaremos el que se señala en la imágen.

  ![12 down webmin](./img/12-down-deb-webmin.png)

- Después de esto con el comando `sudo dpkg -i webmin...` instalaremos webmin.

  ![13 install webmin](./img/13-install-webmin-error.png)

- Nos da este error porque faltan paquetes asique ahora ejecutaremos el comando: `sudo apt install -f` para que se instalen antes de volve a ejecutar el comando de instalación.

  ![14 dependencias](./img/14-webmin-dependencias.png)

- Ya instaladas las dependencias ahora volveremos a ejecutar el comando de instalación.

  ![15 install webmin](./img/15-install-webmin.png)

Con esto ya lo tendremos instalado.

___

## 4.2 Inicio Webmin

- Para poder entrar al panel de control iremos a un navegador y pondremos la ruta https://localhost:10000 y dentro nos pedira usuario y contraseña que es el que estamos usando ahora mismo.

  ![18 mywebmin](./img/18-mywebmin.png)

- Una vez dentro nos saldrá un panel que nos dara información sobre el servidor.

  ![17 webmin2](./img/17-webmin-2.png)

___

## 4.3 Configuraciones Webmin

Estas configuraciones son para poner algún ejemplo de algo que se puede hacer desde un panel de control.

- La primera configuración que haremos será cambiar el idioma.

- Iremos al panel izquierdo a `Webmin --> Change your Language and Theme` y lo pondremos en español como en la imagen.

  ![19 idioma webmin](./img/19-webmin-idioma.png)

Con las siguientes imágenes que veremos se vera que el idioma está en español.

___

### 4.3.1 Configuración MySQL en Webmin.

- Para entrar a MySQL en Webmin iremos al panel izquierdo y entraremos en `Servidores --> Servidor de Base de Datos MySQL`. Aquí veremos que tenemos 4 bases de datos.

  ![20 MySQL](./img/20-mysql.png)

- Para verificar que esta correcto abriremos una terminal y entraremos en MySQL y miramos las bases de datos que hay.

  ![21 mysql](./img/21-mysql.png)

- Vemos que son las mismas y esta bien.

- Ahora pasaremos a crear una nueva Base de Datos en nuestro Servidor y le añadiremos una tabla.

  > Esta base de dato tendra unos campos y su propio nombre, asi luego verificamos que todo funciona.

  ![22 mysql base](./img/22-mysql-base.png)

- Terminamos la creación y vemos que ya nos sale en el panel de control la nueva Base de Datos.

  ![23 base](./img/23-base.png)

- Ahora iremos a la terminal con MySQL y verificamos que la nueva Base de Datos nos sale y también su tabla.

  ![24 MySQL](./img/24-mysql.png)

- Y miramos dentro de la tabla que tengamos los campos puestos por webmin.

  ![25 tabla](./img/25_tabla.png)

Vemos que esta todo correcto.

___
___

Fín de la Práctica
