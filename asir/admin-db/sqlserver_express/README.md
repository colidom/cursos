## Instalación de SQL Server 2014 Express
Carlos Javier Oliva Domínguez

----
*Instalación de SQL Server Express 2014 y Management Studio en un servidor Windows 7.*

Comenzaremos con la descarga de `SQL Server 2014 Express`.

![image](./img/1_descarga.png)

Vamos a elegir la versión de 64bit.

![image](./img/2_download.png)

El siguiente paso será la instalación del programa, para ello elegiremos `Nueva instalación independiente de SQL Server`.

![image](./img/2_install.png)

En este punto vamos a elegir las características que queremos que tenga nuestro SQL Server.

![image](./img/3_caracteristicas.png)

Elegiremos una nueva Instancia y pondremos por nombre `SQLExpress`.

![image](./img/4_instancia.png)

En la siguiente foto nos aparece la configuración del servidor, la dejaremos por defecto.

![image](./img/5_conf.png)

EN el siguiente apartado podremos configurar el modo de autenticación para acceder al servidor.

En mi caso he elegido `Autenticación de Windows`, pero este modo podremos cambiarlo posteriormente.

![image](./img/6_conf_motor.png)

Aquí tenemos un resumen de la correcta instalación de los servicios instalados anteriormente.

![image](./img/7_completed.png)

Finalizada la instalación, se empezará a cargar la configuración de usuario.

![image](./img/8_preparando.png)

Podemos ver las características/herramientas que se han instalado.

![image](./img/9_installed.png)

Ejecutaremos `Microsoft SQL Server 2014`.

![image](./img/12_manage_studio.png)

Ahora vamos a loggear en la aplicación. Previamente he entrado, activado y configurado el usuario `sa` para hacer uso de la autenticación `SQL Server`.

![image](./img/10_log.png)

Tras entrar podemos ver nuestro servidor SQL.

![image](./img/11_logged.png)

Ahora vamos a configurar `SQL Server Browser` porque por defecto está detenido, tendremos que activarlo.

![image](./img/13_down.png)

Podremos ver que el servicio ha sido activado correctamente.

![image](./img/14_active.png)

Ahora vamos a activar la conexión del cliente a nuestro Servidor. Para ello lo configuraremos en `SQL Native Client`.

![image](./img/15_tcp.png)

Lo siguiente será activar el protocolo de SQLExpress `TCP/IP`.

![image](./img/16_active_tcp.png)

#### Comprobación desde el cliente.
*En este punto vamos a hacer la comprobación, conectándonos desde un cliente a nuestro Servidor SQLExpress y conectándonos a un SQLExpress desde nuestro cliente*

Para ello voy a hacer la conexión a la máquina de mi compañero Oscar Moreira, mediante la dirección ip de su máquina.

![image](./img/17_log.png)

Tras iniciar sesión, vemos la información del Servidor del compañero.

![image](./img/18_logged_carlos.png)

Tras esto, el compañero se ha conectado a mi Servidor SQL mediante la ip que le he proporcionado.

![image](./img/19_logged_oscar.png)

Como podemos ver en la imágen anterior, el compañero pudo entrar a mi Servidor SQL y ver la información del mismo.

Fin de la práctica.
