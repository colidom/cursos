Oscar Moreira

Carlos Oliva

# Informe IIS - Servidor Web avanzado - PHP, MySQL, phpMyAdmin, FTP y Drupal

![portada](./img/portada.jpg)

___

# Prácticas

### Parte 1:
- La primera parte de la práctica consistirá en crear un servidor web con soporte PHP, acceso FTP y gestor de bases de datos y phpMyAdmin.

### Parte 2:
- En esta segunda parte instalaremosy configuraremos un servidor FTP y el CMS llamado Drupal.

### Parte 3:
- En esta parte lo que haremos sera por nuestra cuenta elegir un cms e instalarlo desde el cliente transfiriendolo al servidor.

___
___

# 1. Parte 1

## 1.0 IIS Windows Server 2012 V

En este apartado instalaremos y configuraremos todas las características necesarias para nuestro servidor de tal forma que luego podremos trabajar desde el cliente y configurar desde el cliente.

## 1.1 Instalación PHP

- Lo primero que haremos será descargar PHP la versión 5.3.8

  ![php_download](./img/1/1_php_download.png)

- Descargado lo siguiente sera instalarlo y seguiremos los pasos que veremos en las imágenes siguientes.

  ![php_install](./img/1/2_php_install_1.png)

  ![php_install](./img/1/2_php_install_2.png)

  ![php_install](./img/1/2_php_install_3.png)

  ![php_install](./img/1/2_php_install_4.png)

  ![php_install](./img/1/2_php_install_5.png)

- Ahora añadiremos la carácterística llamada CGI en el servidor.

  ![cgi](./img/1/3_add_cgi.png)

  ![cgi](./img/1/4_cgi_added.png)

- Una vez instalado el CGI pasaremos a crear nuestro sitio web y lo primero sera crear la carpeta llamada *cms*

  ![cms folder](./img/1/6_cms_folder.png)

- Dentro de esta carpeta crearemos un fichero *index.php* con el código siguiente dentro de él.

  ~~~
  <?php phpinfo(); ?>
  ~~~

  ![cms index](./img/1/6_cms_index.png)

- Crearemos un alias.

  ![new alias](./img/1/8_new_alias.png)

- Despuñes de esto iremos a *IIS* y crearemos el sitio web *cms.miepresa.com*.

  ![new site](./img/1/7_new_site.png)

- Por último en el sitio web en *IIS* en documentos predeterminados pondremos el *index.php* al principio.

  ![php up](./img/1/9_admit_php.png)

- Ahora ya comprobaremso que entrando en nuestro sitio web en un navegador nos saldrá el contanido de PHP.

  ![php version](./img/1/10_php_version.png)

___

## 1.2 Instalación MySQL

Para instalar el *MySQL* seguiremos los siguientes pasos:
- Primero iremos a este [enlace](https://dev.mysql.com/donwloads/installer) y descargamos la segunda opción de 376.3M (instalador completo).

  ![download_mysql](./img/1/11_mysql_download.png)

- Una vez descargado seguiremos los siguientes pasos para la instalación.

  ![mysql](./img/1/12_mysql_installer_1.png)

  ![mysql](./img/1/12_mysql_installer_2.png)

  ![mysql](./img/1/13_mysql_config_1.png)

  ![mysql](./img/1/13_mysql_config_2.png)

  ![mysql](./img/1/13_mysql_config_3.png)

  ![mysql](./img/1/13_mysql_config_4.png)

  ![mysql](./img/1/13_mysql_config_5.png)

- Y siguiente hasta acabar.

## 1.3 phpMyAdmin

- Descargaremos phpMyAdmin en este [enlace](http://www.phpmyadmin.net)

  ![pma](./img/1/14_pma_download.png)

- Crearemos una carpeta llamada phpmyadmin en *miempresa* con todos los ficheros.

  ![pma](./img/1/14_pma_folder.png)

- Ahora creamos un nuevo dominio para phpmyadmin

  ![domini pma](./img/1/16_newalias_myadmin.png)

- Creado el dominio crearemos el sitio web en *IIS*

  ![web pma](./img/1/15_newsite_myadmin.png)

- Ahora verificamos si entrando a la web nos sale la página.

  ![pma check](./img/1/17_check_result.png)

___
___

# Parte 2

## 2.1 Filezilla

> Desde servidor

- Nuestro servidor ftp lo haremos con el programa *Filezilla*

- Lo primero será descagar el Filezilla-server.

  ![server Filezilla](./img/2/18_filezilla_down.png)

- Luego lo instalamos

  ![install Filezilla](./img/2/19_install.png)

- Una vez dentro crearemos un usuario llamado *ftpuser*.

  ![userftp](./img/2/20_user.png)

- Luego añadiremos la carpeta de *cms* de nuestro servidor y le daremos todos los permisos.

  ![permisos ftp](./img/2/21_user_permisos.png)

- Después de esto crearemos un dominio ftp.miempresa.com.

  ![dominio ftp](./img/2/22_ftp_site.png)

___

## 2.2 phpMyAdmin cliente

> Desde cliente

- Desde el cliente entramos em phpmyadmin.miempresa.com y verificamos que funciona.

  ![phpmyadmin cliente](./img/2/23_php_client_1.png)

  ![phpmyadmin cliente](./img/2/23_php_client_2.png)

___

## 2.3 Drupal

- Descargaremos el CMS llamado Drupal.

  ![drupal](./img/2/24_drupal_down.png)

- Luego de esto entraremos en ftp.miempresa.com  y verificamso que podemos entrar al servidor ftp.

  ![ftp user client](./img/2/25_ftp_user_1.png)

  ![ftp user client](./img/2/25_ftp_user_2.png)

- Ahora descargaremos el Filezilla client

  ![Filezilla client](./img/2/26_filezilla_down.png)

- Lo instalaremos

  ![Filezilla client install](./img/2/26_filezilla_install.png)

- Ahora desde el cliente transferiremos los archivos del Drupal descargados al servidor a la carpeta cms.

  ![drupal to server](./img/2/27_transfer_druptal_to_server.png)

- Ahora crearemos una base de datos en phpMyAdmin llamada cms.

  ![bd cms](./img/2/28_new_db.png)

- Ahora creamos un usuario para la base de datos con los privilegios necesarios.

  ![bd user](./img/2/29_new_user_and_priviliges.png)

- Si ahora entramos en la dirección *cms.miempresa.com* irems directamente a la instalación y configuración de Drupal.

- Seguiremos los siguientes pasos.

  ![drupal install](./img/2/30_config_drupal.png)

  ![drupal install](./img/2/31_install_lengu.png)

  ![drupal install](./img/2/32_link_lengu.png)

  ![drupal install](./img/2/33_download_lengu.png)

  ![drupal install](./img/2/34_folder_lengu.png)

  ![drupal install](./img/2/35_select_lengu_esp.png)

  ![drupal install](./img/2/36.1_error.png)

  Con este error iremos al fichero crearemos un fichero llamado settings.php que sera una copia de default.settings.php y le daremos permisos a los usuarios parapoder modificar.

  ![drupal install](./img/2/36.2_settings.png)

  ![drupal install](./img/2/38_permisos.png)

  Veremos que podemos seguir con la instalación.

  ![drupal install](./img/2/39_tipo_db.png)

  ![drupal install](./img/2/40_installing.png)

  ![drupal install](./img/2/41_conf_site.png)

- Ahora para poder usar bien Drupal sin errores iremos al fichero que se encuentra en `cms\sites\default\files` y le daremos permisos de modificación.

  ![permiss files](./img/2/42_permisos_file.png)

- Descargamos el tema marinelli para Drupal y lo subimos para usarlo en Drupal.

  ![arinelli](./img/2/43_install_marinelli.png)

- Luego de esto crearemos un artículo y un menu de link.

  ![articulo](./img/2/46.1_new_articulo.png)

  ![link](./img/2/47_new_menu.png)

- Veremos que lo que hemos creado funciona.

  ![web](./img/2/44_marinelli_tema.png)

  ![web](./img/2/45_new_content.png)

  ![web](./img/2/46.2_posted.png)

___
___

# Parte 3
En nuestro caso hemos elegido como CMS el Joomla.

- Lo primero que haremos sera en la carpeta de mi empresa en el servidor crear otra dentro en la que alojaremos los ficheros de Joomla.

- Desde ftp server compartiremos esa carpeta con todos los permisos para el usuario.

  ![joomla](./img/3/48_moodle_1.png)

- Crearemos un host

  ![joomla](./img/3/48_moodle_2.png)

- Después crearemos un sitio web en *IIS*

  ![web joomla](./img/3/48_moodle_3.png)

- Luego descargaremos el Joomla

  ![joom down](./img/3/48_moodle_4.png)

- Una vez descargado lo que haremos será instalarlo siguiendo los pasos que veremos en las imágenes.

  ![joom install](./img/3/48_moodle_5.png)

  ![joom install](./img/3/48_moodle_6.png)

  ![joom install](./img/3/48_moodle_7.png)

- Hecha la instalación iremos a la dirección creada para este apartado eingresaremos con el usuario y contraseña que creemos.

  ![joom login](./img/3/48_moodle_8.png)

- Si entramos veremos que tenemos todas las opciones para modificar la web.

  ![joom ](./img/3/48_moodle_9.png)

___
___

Fín de la práctica
