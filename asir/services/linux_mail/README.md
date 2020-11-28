Óscar Moreira Estévez

Carlos Oliva

# Instalación y configuración de un Servidor de correo en LINUX

![portada](./img/portada.png)

## 1. Instalación servicio SMTP

- Lo primero que haremos sera instalar el servidor *Postfix* siguiendo los siguientes pasos:

  ![1](./img/1_apt_install.png)

  ![2](./img/2_postfix_conf.png)

  ![3](./img/3_internet_site.png)

  ![4](./img/4_postfix_name.png)

- Ahora comprobaremos que el servicio esta corriendo.

  ![5](./img/5_postfix_status.png)

  - `netstat -utap`

    ![6](./img/6_service.png)

- En este paso haremos pruebas de envío de mensajes mediante telnet en el que seguiremos los siguientes comandos que veremos dentro de la imagen.

  - `telnet localhost 25`

    ![7](./img/7_telnet.png)

  - Iremos a la ruta `/varspool/mail`  miraremos que se reciba el correo enviado al usuario indicado.

      ![8](./img/8_check_client.png)

### 1.2 Cliente OperaMail

- Instalaremos un cliente de correo en un cliente en nuestro caso ha sido el *OperaMail*.

  ![9](./img/9_operamail.png)

- Creamos dos lineas nuevas en el fichero `/etc/hosts` en el que introduzcadmos la IP del servidor para los dns(smtp.miempresa.com y pop.miempresa.com).

  ![10](./img/10_hosts.png)

  ![11](./img/11_hosts_cli.png)  

- Comprobamos haciendo ping a un dns para verificar que hace conexión.

  ![12](./img/12_ping.png)

- Ahora creamos dos cuentas de usuario.

  ![13](./img/13_users_server.png)

  ![14](./img/14_users_windows.png)

- Ahora comprobaremos que funciona bien el servicio smtp.

  - De Carlos a Oscar:

    ![15](./img/15_send.png)

    ![17](./img/17_check.png)

  - De Oscar a Carlos:

    ![16](./img/16_send.png)

    ![18](./img/18_check.png)

___

## 2. Imap y SquirrelMail

### 2.1 IMAP

- Lo primero instalaremos el servicio IMAP : `apt install imapd`.

  ![19](./img/19_dovecot_install.png)

- Comprobamos que el servicio esta corriendo bien.

  ![20](./img/20_status_dovecot.png)

  - `netstat -utap`

    ![21](./img/21_netstat.png)

### 2.2 SquirrelMail

- Ahora instalaremos la aplicación de correo *SquirrelMail*.

  ![22](./img/22_install_squirrel.png)

- Enla ruta `/usr/share/squirrelmail` se encuentra la carpeta de aplicación.

  ![24](./img/24_squirrel_app_folder.png)

- Ahora iremos a la carpeta de configuración `/etc/squirrelmail`

- Una vez dentro copiaremos el contenido del fichero `apache.conf` y crearemos un host virtual nuesvo en `/etc/apache2/sites-available`, lo habilitamos y reiniciamos el servicio.

  ![23](./img/23_squirrel_conf_folder.png)

  ![25](./img/25_site.conf.png)

  ![26](./img/26_symb_link.png)

- Hecho esto pasaremos a comprobar que ha funcionado.

- Accedemos via http a `localhost/squirrelmail`

  ![27](./img/27_log_squirrel.png)

- Nos logueamos con un usuario de los creados anteriormente.

- Ahora veremos que estando dentro que tenemos uno de los correo que hemos enviado anrteriormente a carlos.

  ![28](./img/28_check_user_carlos.png)

  ![29](./img/29_check_user_carlos.png)

- Y comprobamos con el usuario oscar también.

  ![31](./img/31_check_user_oscar.png)

  ![32](./img/32_check_user_oscar.png)

- Ahora probaremos a enviar mensajes desde *SquirrelMail*.
  - A usuario oscar:

    ![33](./img/33_to_send.png)

    ![34](./img/34_mail_recibido.png)

  - A usuario carlos:

    ![35](./img/35_to_send.png)

    ![36](./img/36_mail_recibido.png)

- Tmabién comprobaremos que se han recibido en la ruta `/var/mail`

  ![37](./img/37_check_varmail.png)

  ![38](./img/38_check_varmail.png)

___

## 3. Servicio POP3

- Instalaremos el servicio *POP3*: `apt install dovecot-pop3d`

  ![40](./img/40_install_pop3.png)

- Comprobamos que el servicio esta funcionando bien.

  ![41](./img/41_status.png)

  - `netstat -utap`

    ![42](./img/42_netstat.png)

- Ahora configuramos nuestro cliente de correo *OperaMail* para que acceda a la recepción de un correo a través del protocolo *POP3*.

  ![43](./img/43_server_opera.png)

- Veremos que tenemos los dos usuarios de correo con el POP activado.

  ![44](./img/44_admin_acc.png)


- Ahora comprobamos que funciona enviando un correo a través del cliente.

- Enviamos un correo de Carlos a Oscar.

  ![45](./img/45_envio_a_oscar.png)

- Vemos que lo recibimos.

    ![53](./img/53_check_oscar.png)

- Hemos enviado otro de Oscar a Carlos y vemos que lo recibimos también.

  ![54](./img/54_check_carlos.png)

- Por último en la ruta `/var/mail` no deberiamos recibir los correos pero los hemos recibido y a todos los alumnos nos ha ocurrido igual.

  ![50](./img/50_check_varmail.png)

  ![51](./img/51_check_varmail.png)

___
___

Fín de la práctica
