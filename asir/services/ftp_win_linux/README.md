## Práctica de Windows 2012 Server - SRD – 2º ASIR
### Instalación y Configuración de un Servidor FTP
Carlos Javier Oliva Domínguez

-----
Siguiendo los pasos detallados en las guías y tutoriales proporcionados:

#### 1. Instalar Servicio FTP en Windows 2012 Server, a través de Agregar roles y características (IIS)

Habilitamos el Servicio FTP:

![image](./img/1_role.png)

Procedemos a instalar dicho Servicio.

![image](./img/2_add_role.png)

#### 2. Acceder a la creación y configuración de Sitios FTP por medio de la Administración de IIS.

Tras la instalación del Servicio FTP, contaremos con un panel como este, que nos permitirá configurar nuestro Servicio FTP.

![image](./img/3_iis_ftp.png)

#### 3. Crear tres nuevos sitios FTP (en todos ellos se debe poder acceder a través de las IPs del servidor y, en algún caso, de un nombre DNS ftp.tudominio.ext):

Primeramente vamos a crear una zona nueva, usaremos `futurama.es` como nombre DNS.

![image](./img/4_new_zona.png)

Dentro de nuestra zona de búsqueda directa, vamos a crear un nuevo host con la ip de nuestro Servidor `(172.18.6.10)`.

![image](./img/5_new_host.png)

Seguidamente, creamos un nuevo alias para acceder a nuestro Servidor FTP `ftp.futurama.es`.

![image](./img/6_ftp_site.png)

##### 3.1.0 Uno asociado a la unidad C: completa. No debe permitir accesos anónimos. Sin uso de SSL. Sólo el usuario Administrador podrá acceder al sitio. Modos lectura y escritura.  Ahora realiza las siguientes acciones:

Primeramente, iremos a nuestro administrador IIS y elegiremos la creación de un nuevo sitio FTP. Elegiremos un nombre y `C:\` como ruta de acceso física.

![image](./img/7_ftp1.png)

Seguidamente, elegiremos la dirección ip, `172.18.6.10` en mi caso, y especificamos el puerto `21`. También podemos optar por poner el nombre del host virtual que creamos anteriormente, `ftp.futurama.es`. Configuramos también un certificado SSL, usando el que habíamos creado en prácticas anteriores.

![image](./img/8_ftp1_ssl.png)

Tal como requiere el enunciado de esta parte del ejercicio, elegiremos la autenticación `Básica`, para impedir el acceso a usuarios anónimos. Daremos también permisos de lectura y escritura al usuario Administrador.

![image](./img/9_auth.png)

##### 3.1.1 Examina todas las opciones de configuración de la página principal de tu Sitio FTP (IIS) y haz una descripción breve de cada una en el informe. No modifiques nada aún.

![image](./img/3_iis_ftp.png)

`Aislamiento de usuario FTP`: El aislamiento de usuario FTP es una solución que permite a los proveedores de acceso a Internet (ISP) ofrecer a sus clientes directorios FTP individuales para cargar contenido.

`Autenticación FTP`: Sirve para configurar los métodos de autenticación que los clientes FTP pueden utilizar para obtener acceso al contenido.

`Compatibilidad con el firewall...`: Con el fin de modificar la configuración de las conexiones pasivas cuando los clientes FTP se conecten a un servidor FTP ubicado detrás de un firewall.

`Configuración SSL de FTP`: Sirve para administrar el cifrado para las transmisiones de canal de control y canal de datos entre el servidor FTP y los clientes.


##### 3.1.2 Trata de acceder al sitio ftp desde el propio servidor a través de un navegador y un explorador de archivos.

Accedemos al sitio ftp mediante el navegador `ftp://ftp.futurama.es`. Nos pedirá usuario y contraseña, recordemos que habíamos concedido el acceso al usuario Administrador.

![image](./img/10_auth_serv.png)

Tras loguearnos, comprobamos que podemos acceder al disco local `C:\` de nuestra máquina Servidor.

![image](./img/11_check_web_serv.png)

##### 3.1.3 Comprueba accesos permitidos y denegados. Comprueba también permisos asignados. Accede ahora desde un cliente Windows de la misma forma. Realiza comprobaciones.

Autenticación desde un cliente.

![image](./img/12_auth_cli.png)

Comprobación desde un cliente:

![image](./img/13_check_web_cli.png)

##### 3.1.4 Instala el software WinSCP en el cliente Windows, configura la conexión a tu sitio ftp y trata de establecer conexión y realizar comprobaciones.

Instalaremos la app propuesta en el ejercicio.

![image](./img/14_install_winscp.png)

Nos autenticaremos con el usuario `Administrador` y comprobamos:

![image](./img/15_auth_winscp.png)

Podemos comprobar que tenemos acceso al disco local `C:\` gracias al Servicio FTP.

![image](./img/16_check_winscp.png)

##### 3.2.0 El segundo asociado al directorio `wwwroot` de Inetpub. Se permitirá el acceso a todos los usuarios de Active Directory en modo lectura y escritura. No permitimos acceso anónimo y habilitamos en este caso la posibilidad (permitir, no requerir) de conexiones SSL asociadas a uno de los certificados que poseas en IIS.

Para este segundo sitio FTP, daremos acceso solamente al direcotio `wwwroot`.

![image](./img/17_inet_serv.png)

Configuramos la dirección `ip`, el `virtual host` asociado a ésta misma y el `puerto` por el que redigiremos las conexiones. También configuraremos un certificado `SSL`.

![image](./img/18_link_ssl.png)

Permitiremos solamente una autenticación `Básica`.

![image](./img/19_auth.png)

##### 3.2.1 Realizar diferentes comprobaciones válidas e inválidas de conexión y operaciones, tanto desde el servidor como desde el cliente. Realizar una configuración de conexión SSL desde WinSCP.

Comprobación desde el Servidor.

![image](./img/20_check_serv.png)

Comprobación desde el cliente.

![image](./img/21_check_cli.png)

Vemos el contenido del directorio, tras loguearnos con el usuario `empleado1`.

![image](./img/22_checked_client.png)

##### 3.3.0 El tercer sitio FTP debe asociarse a una carpeta cualquiera del servidor que contenga información (archivos y carpetas), pero que no sea importante. Permitiremos acceso anónimo y sólo se podrá consultar y leer. Comprobar desde servidor y cliente.

Para este tercer sitio FTP, vamos a permitir el acceso a una carpeta pública en nuestro directorio Documentos.

![image](./img/23_new_ftp.png)

Al igual que los anteriores sitios, configuramos los Enlaces y el Certificado SSL.

![image](./img/24_links_ssl.png)

Para este último, vamos a permitir la conexión anónima, pudiendo solamente leer.

![image](./img/25_permisos.png)

Daremos permiso a `Todos` a la carpeta en cuestión.

![image](./img/26_permisos_folder.png)

Comprobamos en el Servidor, nos lista el contenido del directorio, sin necesidad de autenticarnos.

![image](./img/27_check_serv.png)

Nos conectaremos desde el cliente Windows.

![image](./img/28_auth_cli.png)

Comprobamos que podemos acceder al contenido.

![image](./img/29_check_cli.png)

##### 3.3.1 Se debe crear un nuevo registro DNS que permita acceder a nuestro sitio FTP a través de la dirección ftp.miServer.com (o el dominio que utilices habitualmente).

Utilizaremos el Host Virtual que llevamos usando en toda la práctica.

##### 3.3.2 En un principio es posible que debas detener un sitio web para que pueda iniciarse otro. Tras comprobar el funcionamiento por separado de los sitios, encontrar una solución para que nuestro servidor ofrezca varios sitios FTP simultáneamente.

Para permitir que nuestro Servidor nos proporsione varios sitios FTP de forma simultanea, basta con cambiar los puertos, así redirigiremos cada uno de ellos por puertos diferentes, permitiendo así una co-existencia.

Para este usaremos el `puerto 2121`

![image](./img/30_inet_conf_2121.png)

Intentamos conectar desde el cliente Windows, especificando eso si, el puerto que hemos predefinido.

![image](./img/31_inet_auth_2121.png)

Comprobamos que accedemos perfectamente al sitio FTP.

![image](./img/32_inet_check_2121.png)

Ahora, sin parar el sitio FTP anterior, configuraremos un nuevo sitio FTP (de los que ya tenemos creados) pero usaremos el `puerto 2222`.

![image](./img/33_doc_conf_2222.png)

Intentaremos acceder al nuevo sitio FTP, especificando el `puerto 2222`.

![image](./img/34_doc_auth_2222.png)

Finalmente, comprobamos que podemos acceder perfectamente al contenido.

![image](./img/35_doc_check_2222.png)

-----
### Instalación y Configuración de un Servidor FTP en Linux

Siguiendo los pasos detallados en las guías y tutoriales proporcionados:

#### 1. Instalar Servicio SSH en el servidor Linux.

Instalamos el `SSH Server`.

![image](./img/36_ssh_in.png)

#### 2. Crear dos usuarios en el sistema, con diferentes privilegios y niveles de acceso al filesystem.

Creamos los usuarios:
-  `user1`
-  `user2`

![image](./img/37_users.png)

#### 3. Comprobar, desde una máquina cliente, acceso de los usuarios mediante ssh.

Antes de hacer las comprobaciones pertinentes, tenemos que instalar el Servicio SSH en el cliente.

![image](./img/38_ssh_client.png)

Vamos a comprobar la conexión desde el cliente, con el usuario `user1`.

![image](./img/39_check_client.png)

#### 4. Tratar de ejecutar una aplicación gráfica del servidor de forma remota, desde el cliente, mediante ssh.

En este punto he optado por instalar la aplicación `Geany` en el Servidor, y mediante el Servicio `ssh` accederemosa  dicha app, que no se encuentra instalada en la máquina Cliente.

# ![image](./img/40_geany.png)

#### 5. Acceder, también desde el cliente, mediante sftp (ftp seguro, incluido en el paquete ssh) al sistema de ficheros del servidor y probar acceso, carga y descarga de archivos con ambos usuarios.

##### Comprobación `GET` desde la máquina Cliente, con user1:

Desde el cliente, accederemos al Servidor mediante `SFTP` usando el usuario `user1`.

![image](./img/40_sftp_user1.png)

#### 6. Realizar varias copias de archivos hacia / desde el servidor mediante scp, utilizando también los dos usuarios creados anteriormente.

Primeramente, desde el `Servidor`, vamos a crear un archivo, que posteriormente copiaremos `Prueba_to_client.txt`.

![image](./img/41_touch_user1.png)

Ahora, desde la máquina cliente, accederemos al usuario `user1` mediante `SFTP`. Y copiaremos el fichero que creamos en el apartado anterior mediante `get {nombre_fichero.txt}`.

![image](./img/42_get.png)

##### Comprobación `GET` desde la máquina Cliente, con user2:

Primeramente, desde el `Servidor`, vamos a crear un archivo, que posteriormente copiaremos `Prueba2_to_client.txt`.

![image](./img/43_touch_user2.png)

Ahora, desde la máquina cliente, accederemos al usuario `user2` mediante `SFTP`. Y copiaremos el fichero que creamos en el apartado anterior mediante `get {nombre_fichero.txt}`.

![image](./img/44_get.png)

##### Comprobación PUT desde la máquina Cliente, con user1:

Desde la máquina Cliente, creamos el archivo que posteriormente subiremos `push_to_user1.txt`.

![image](./img/45_push_user1.png)

Ahora nos loguearemos con el usuario `user1` y subiremos el archivo que creamos en el apartado anterior, al Servidor, mediante `PUT`.

![image](./img/46_put_user1.png)

Realizado lo anterior, nos dirigiremos al `Servidor` y mediante el comando `ls -l` listamos los archivos y directorios, comprobando que el archivo que creamos anteriormente, `push_to_user1.txt` se ha transferido.

![image](./img/47_check_user1.png)

##### Comprobación PUT desde la máquina Cliente, con user2:

Al igual que en el apartado anterior, creamos el archivo que posteriormente subiremos `push_to_user2.txt`.

![image](./img/48_touch_user2.png)

Ahora nos loguearemos con el usuario `user2` y subiremos el archivo que creamos en el apartado anterior, al Servidor, mediante `PUT`.

![image](./img/49_put_user2.png)

De vuelta en el `Servidor` usamos el comando `ls -l` y listamos los archivos y directorios, comprobando que existe el fichero `push_to_user2.txt` que transferimos en el apartado anterior.

![image](./img/50_check_user2.png)

#### 7. Instalar el paquete proftpd.

Instalación del paquete:

![image](./img/51_install.png)

#### 8. Investigar y editar el fichero de configuración `/etc/proftpd/proftpd.conf` buscando información en Internet.

Tras la instalación vamos a descomentar la línea `DefaultRoot`, tal como se muestra a continuación.

![image](./img/52_defaultroot.png)

#### 9. Tratar de conectar al servicio ftp gestionado por proftpd tanto desde el servidor como desde un cliente.

Ahora vamos a hacer la conexión al Servidor FTP, pero esta vez usaremos solamente la dirección IP, y gracias a la gestión del Servicio `proftpd`.

![image](./img/53_ftp.png)

#### 10. Desde la máquina cliente, probar el acceso al ftp mediante los usuarios creados y realizando diferentes operaciones de listado, subida y descarga de archivos.

En este punto vamos a conectarnos al Servidor FTP al igual que el apartado anterior, pero esta vez con el usuario `user1`.

![image](./img/54_logged_user1.png)

#### 11. Informar sobre la configuración, uso y funcionamiento de proftpd.

Tras la conexión, vamos a hacer un listado de directorios, donde podemos ver los archivos que usamos con anterioridad (`Prueba_to_client`, `push_to_user1`, `etc`).

![image](./img/55_ls.png)

Ahora, desde el Servidor vamos a crear un nuevo fichero, que usaremos como ejemplo. `prueba_proftpd.txt`.

![image](./img/56_touch.png)

Seguidamente, mediante el comando `get` vamos al cliente y descargaremos el archivo de prueba que creamos en el apartado anterior `prueba_proftpd.txt`.

![image](./img/57_get.png)

Fin de la práctica.
