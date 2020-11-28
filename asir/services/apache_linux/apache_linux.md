Óscar Moreira

Carlos Oliva

# Apache Linux

![portada](./img/portada.jpg)

___
# Explicación práctica

Esta práctica consistirá en instalar y configurar en Linux los servicios: `Apache`,`PHP`, `MySQL`, `phpMyAdmin` y también haremos configuraciones de acceso a carpetas privadas y configuraciones *SSL*.

 ___
 ___

# Práctica

## 1. Apache

- Lo primero que haremos sera instalar *Apache* : `sudo apt-get install apache2`

  ![1_apache](./img/1_install_apache.png)

- Ahora si vamos al navegador y entramos en `localhost` veremos que nos saldrá el index que se creo en `/var/www/` al instalar *Apache*.

  ![2-works](./img/2_it_works.png)

- Añadimos en `/etc/hosts` la IP con el nombre de *www.,iempresa.com*.

  ![3-hosts](./img/3_hosts.png)

___

## 2. PHP

- Instalamos PHP: `sudo apt-get insall php`

  ![php install](./img/4_php.png)

- Ahora instalaremos las librerias de *Apache* para *PHP*: `sudo apt-ger install libapache2-mod-php`.

  ![lib apache](./img/5_librerias.png)

- Después de esto crearemos un *index.php* en `/var/www/html`.

  ![index.php](./img/6_index.php.png)

- Ahora veremos que si entramos en *www.miempresa.com* nos saldra al index de *PHP*.

  ![php info](./img/7_php_info.png)

___

## 3. Crear hosts virtuales.

En este apartada crearemos sitios web que configuraremos con apache2.

- Lo priemro que haremos será crear el virtual host de *www.empleados.miempresa.com* para esto iremos a la ruta `/etc/apache2/sites-available/` y crearemos un fichero que llamaremos ***empleados.conf***.

  ![8-empelados.conf](./img/8_empleados.conf.png)

- Luego haremos un enlace simbólico a `/etc/apache2/sites-enabled`

- Luego iremos al fichero `/etc/hosts` y lo añadiremos.

  ![9-hosts](./img/9_hosts.png)

- Después de esto iremos a la ruta `/var/www/` y crearemos una carpeta llamada empleados y dentro un *index.html*.

  ![10-INDEX.HTML](./img/10_index.png)

- Ahora comprobaremos que el sitio web esta bien creado y que podemos acceder a la página.

  ![11-result](./img/11_result.png)

___

## 4. Sitios web seguros (SSL)

Ahora pasaremos a crear sitios web pero en este caso con certifiacion *SSL*

- Una vez se instala *Apache* también se instala *SSL*.

- Pasaremos a generar un certificado autofirmado. Ejecutaremos los siguientes comandos:

  ~~~

    - openssl genrsa -des3 -out server.key 1024
    - openssl rsa -in server.key -out server.pem
    - openssl req -new -key server.key -out server.csr
    - openssl x509 -req -days 360 -in server.csr -signkey server.key -out server.crt

  ~~~

  ![12-serverkey](./img/12_server.key.png)

  ![13-rsa-key](./img/13_rsa_key.png)

  ![14-req-new-key](./img/14_req_new_key.png)

  ![15-days](./img/15_days.png)

- Ahora iremos al la ruta `/etc/apache2/sites-available/` y crearemos el virtual host `pagos.conf` con susconfiguración *SSL*.

  ![16-sslpagos](./img/16_ssl.png)

  ![17-server-pagos](./img/17_server_pagos.png)

- Luego haremos un enlace simbólico a `/etc/apache2/sites-enabled`

- Después de esto iremos a la ruta `/var/www/` y crearemos una carpeta llamada pagos en la que crearemos un *index.html*

  ![19-index-pagos](./img/19_index_pagos.png)

- Hecho todo esto lo añadiremos el nombre a `/etc/hosts`

  ![20-pagos-hots](./img/20_pagos_on_hosts.png)

- Cuando acabemos de configurar todo ejecutaremos el comando: `sudo a2enmod ssl` que sera el módulo que habilite el *SSL* en *Apache*.

  ![21-a2enmod](./img/21_a2enmod.png)

- Ahora verificamos que funciona la página y que tendremos la certificación viendo que se muestra con *https*.

  ![21-result-pagos](./img/21_pagos_result.png)

___

## 5. Acceso a carpetas privadas.

- Lo primero que haremos sera crear una carpeta en `/var/www/` llamada *privada*.

- Una vez creada dentro de ella crearemos un fichero llamda `.htaccess`.

  ![24_htaccess](./img/24_htaccess.png)

- Despues de esto dentro de la ruta `/var` ejecutaremos el siguiente comando para crear una clave encriptada con el usuario: `sudo htpasswd -c /var/claves/usuario usuario`.

  ![user y key](./img/25_new_user.png)

- Ahora hecho esto iremos al fichero `/etc/hosts` y añadiremos la web con su IP

  ![26](./img/26_hosts.png)

- Dentro de la carpeta `/var/www/privada` crearemos un *index.html*

  ![27 index](./img/27_index.png)

- Hecho esto iremos a la ruta `/etc/apache2/sites-available` y crearemos el host de la web segura.

  ![28 web segura conf](./img/28_websegura_conf.png)

- Luego haremos un enlace simbólico a `/etc/apache2/sites-enabled`

  ![29 ln-s](./img/29_ln-s.png)

- Ahora entraremos en la página y veremos que nos pide usuario y contraseña y podremos entrar.

  ![30-result](./img/30_result.png)

  ![30_result2](./img/30_result_2.png)

___

## 6. MySQL

- Instalararemos MySQL con: `sudi apt-get install mysql-server` y  en medio de la instalación pondremos contraseña para root de MySQL.

  ![31-mysql](./img/31_install_mysql.png)

- Una vez instalado pasaremos a instalr php para MySQL: `sudo apt-get install php-mysql`

  ![32-php-mysql](./img/32_php_mysql.png)


___

## 7. phpMyAdmin

- Para descargar *phpMyAdmin*  lo que haremos será descargar el fichero tar.gz

  ![33-down-phpmy](./img/33_down_phpmyadmin.png)

- Luego lo descomprimimos y lo pasamos a la ruta `/var/www/`

  ![35-move-to-www](./img/35_move_to_www.png)

- Hecho esto crearemos una linea nueva en `/etc/host/` con el nombre *www.phpmyadmin.miempresa.com*

  ![36-hosts](./img/36_hosts.png)

- Crearemos un *phpmyadmin.conf* en `/etc/apache2/sites-available` y luego haremos un enlace simbolico en `/etc/apache2/sites-enabled`.

  ![37-ln-s](./img/37_ln-s.png)

- Ahora comprobaremos que funciona entrando en la página *www.phpmyadmin.miempresa.com*

  ![38 result](./img/38_result.png)

___

## 8. Plataforma Wordpress

### 8.1 Base de dats y usuarios

- El primer paso que debemos realizar es crear un base de datos para *Wordpress*.

- Para esto entraremos en *MySQL* y crearemos una base de datos llamada *wordpress*.

  ![39 -new-databse](./img/39_new_database.png)

- Luego iremos a *www.phpmyadmin.miempresa.com* y veremos que nos saldrá la base de datos que hemos creado.

  ![40 wordpress in phpmyadmin](./img/40_wordpress_in_phpmyadmin.png)

- Creada la base de datos pasaremos a crear un nuevo usuario.

  ![41 new user](./img/41_new_user.png)

### 8.2 Wordpress

- Hecho todos los pasos anteriores pasaremos a descargar *Wordpress*.

  ![42 download wordpress](./img/42_download_wordpress.png)

- Ahora una vez descargado pasaremos la carpeta a la ruta `/var/www/`.

  ![43 move wordpress](./img/43_move_wordpress.png)

- Luego crearemos el fichero wordpress.conf en la ruta `/etc/apache2/sites-available`

  ![44_wordpress_host.png](./img/44_wordpress_host.png)

- Creado el fichero wordpress.conf  haremos un enlace simbólico en la ruta `/etc/apache2/sites-enabled`

  ![45-ln-s](./img/45_ln-s.png)

- Ahora crearemos una nueva linea con el nombre del host *www.wordpress.miempresa.com*

  ![46 hosts](./img/46_hosts.png)

- Hecho esto entraremos en la web *www.wordpress.miempresa.com*.

  ![47 result](./img/47_result_wordpress.png)

- Configuraremos wordpress diciendole la base de datos, usuario, etc...

  ![48-wordpress-conf](./img/48_wordpress_conf.png)

- Seguiremos configurandolo.

  > Saldrá un error en la configuración del correo porque en realidad no existe pero nos deja seguir con la configuración.

  ![49-wordpress](./img/49_installing_wordpress.png)

- Terminado podremos acceder.

  ![50 installed wordpress](./img/50_installed.png)

- Ya hemos accedido y vemos el panel de control.

  ![51_control_panel.png](./img/51_control_pannel.png)

___
___

Fín de la práctica
