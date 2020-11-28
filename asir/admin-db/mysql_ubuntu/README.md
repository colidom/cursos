## U1_A3.- Instalación de MySQL Server en Ubuntu
Carlos Javier Oliva Domínguez

----
*En la siguiente práctica vamos a proceder a la instalación de MySQL Server en el Sistema Operativo Ubuntu Desktop 16.4 .*

El primer paso será hacer la instalación base del Servidor desde el repositorio.

![image](./img/1_install_server.png)

Como parte del proceso de instalación, el asistente, nos pedirá poner una contraseña para el usuario root.

![image](./img/2_root_pass.png)

Ahora haremos un reinicio del servicio y comprobaremos que todo esté funcionando correctamente.

![image](./img/4_server_restart.png)

![image](./img/3_status.png)

Una vez finalizada la instalación, vamos a instalar el cliente, también desde el gestor de paquetes.

![image](./img/1_install_client.png)

Ahora reiniciaremos el demonio mysqld, que arranca el núcleo de SGBD. Comprobamos que está corriendo el proceso con: `pps aux | grep mysql`.

![image](./img/5_demon.png)

Lo siguiente que haremos será comprobar el funcionamiento del Servidor utilizando el programa cliente del servidor MySQL.

![image](./img/6_log_mysql.png)

Comprobaremos la seguridad mediante `mysql_secure_installation`.

![image](./img/7_secure_install.png)

En este punto, podemos determinar la fortaleza de la contraseña.

![image](./img/8_pass_strength.png)

Aquí eliminaremos los usuarios anónimos, para que sea root el único que tenga permitida la conexióna localhost.

![image](./img/9_anonymous_users.png)

También vamos a desactivar el acceso remoto para el usuario root, con el objetivo de bridnar una mayor seguridad.

![image](./img/10_root_log.png)

Vamos elegir que no queremos borrar la Base de Datos "test".

![image](./img/11_rm_db.png)

Recargaremos la tabla de privilegios.

![image](./img/12_reload_tab.png)

El siguiente punto importante será instalar la aplicación de gestión `Workbench.`

![image](./img/13_install_work.png)

Ahora vamos a instalar `PhpMyAdmin` sobre `Apache2`que nos permitirá administrar nuestras bases de datos desde una interfaz gráfica.

![image](./img/15_install_phpmyadmin.png)

Elegiremos `Apache2` como servidor web.

![image](./img/16_apache2.png)

Antes de poder usar `PhpMyAdmin` necesitaremos instalar la base de datos por defecto del propio `PhpMyAdmin` para su correcto funcionamiento.

![image](./img/17_db_config.png)

tras los pasos anteriores nos dirigiremos a un navegador web y mediante `localhost/phpmyadmin` accederemos a la interfaz de nuestro Gestor de Bases de Datos.

![image](./img/18_admin_phpmyadmin.png)

Podemos ver la interfaz con las distintas opciones e información necesarias para la gestión de una Base de Datos.

![image](./img/19_interfaz_phpmyadmin.png)

Tras la instalación vamos a indicar las rutas de:
* Direcctorio de instalación.

  ![image](./img/22_dir_datos.png)

* Directorio y Servicio Demonio.

  ![image](./img/21_demon.png)

* Directorio de datos.

  ![image](./img/20_dir_datos.png)

* Fichero `my.cnf` y localización.

  ![image](./img/23_my_cnf.png)

* Veremos que el propietario de la instalación es el usuario `mysql`.

  ![image](./img/24_propietario.png)

* Aplicaremos el lenguaje Español al archivo de mensajes de error.

  ![image](./img/25_lang.png)

Tras las configuraciones realizadas, nuestro sistema estará listo para albergar las Bases de Datos que necesitemos y para su correspondiente administración si así fuera preciso.

Fin de la práctica.
