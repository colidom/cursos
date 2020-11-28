## Servicio SMTP Windows 2012 Server - Instalación y Configuración de un Servidor de Correo SMTP
Carlos Javier Oliva Domínguez

----
## SMTP - Windows Server 2012
![portada](./img/portada_smtp.png)

### Instalar Servicio SMTP en Windows 2012 Server (manualmente o utilizando Asistente).
Primeramente comenzaremos con la instalación de la característica SMTP en nuestro Servidor.

![image](./img/1_role.png)

### Configuración de servicio SMTP a través del administrador de aplicaciones (IIS) 6.0. Realizar las acciones de configuración correspondientes:

Acto seguido, pondremos la dirección IP del servidor , limitamos el numero de conexiones, y habilitamos el registro W3C.

![image](./img/4_limit.png)

En Propiedades del Registro, configuraremos la nueva `Programación de registro` de forma diaria.

![image](./img/6_diario.png)

#### Configurar envío de mensajes dentro de nuestra red local: Aceptar la conexión al servidor y la retransmisión de mensajes a todos los equipos menos los que aparecen en la lista (incluir una IP cualquiera en la lista para impedir su acceso y retransmisión)

![image](./img/7_retransmision.png)

#### Establecer autenticación anónima.

Para esta primera parte, estableceremos la autenticación anónima.

![image](./img/8_anonimo.png)

#### Echar un vistazo al resto de opciones de configuración del servidor. Aplicar cambios y reiniciar servicio.
Tras las configuraciones anteriores, reiniciaremos el servicio, poniéndolo en stop y luego poniéndolo en play.

![image](./img/9_restart.png)

####Comprobar la existencia del dominio AD predeterminado. Crea un dominio de tipo alias para disponer de cuentas en otro dominio.

Crearemos un nuevo dominio tipo `alias`, en mi caso `carlos.edu`.

![image](./img/11_alias.png)

#### Comprueba carpetas de correo creados en `C:\Inetpub\mailroot`.

Comprobaremos también que se han creado las correspondientes carpetas de correo en el Servidor.

![image](./img/12_check_folders.png)

### En el cliente Windows:
Instalaremos el gestor de correo `Opera Mail`.

![image](./img/13_opera_client.png)

#### Configurar el cliente de correo Live mail agregando dos cuentas de correo cualesquiera (usuarios AD -dominio- y no AD). Se deberá especificar: usuario / buzón, contraseña,  servidor SMTP.

Una vez finalizada la instalación de `Opera Mail`, procederemos a agregar una cuenta de correo.

![image](./img/14_conf_mail.png)

Pondremos un usuario y contraseña cualquiera puesto que no es imprescindible, dado que la autenticación por el momento es `anónima`.

![image](./img/15_user.png)

Dentro de la configuración de Servidores, tendremos algo así.

![image](./img/16_servers.png)

#### Enviar varios correos desde / hacia las diferentes cuentas y comprobar envío (real o ficticio) y carpetas mailroot. Las carpetas existentes en mailroot alojan mensajes en cola (Queue), mensajes para destinatarios desconocidos (Badmail) y mensajes entregados (Drop)

Escribiremos un mensaje y lo enviaremos a una cuenta de correo electrónico real.

![image](./img/17_send.png)

Tras enviar el mensaje, nos dirigiremos a la ruta donde se alojan los mensajes enviados `(C:\inetpub\mailroot\Drop)`.

![image](./img/19_drop.png)

Finalmente, nos logueamos con la cuenta a la que enviamos el correo y comprobamos que lo hemos recibido.

![image](./img/18_check.png)

#### Nueva configuración de servicio SMTP a través del administrador de aplicaciones (IIS) 6.0. Establecer autenticación básica de Windows. Probar diferentes configuraciones de dominio predeterminado, cifrado TLS, etc.

Para esta parte vamos a usar una `Autenticación Básica`.

![image](./img/20_basic_auth.png)

Ahora comprobaremos que funciona con los correos, para esto debemos usar cuentas de usuarios existentes dentro de Active Directory y activando la conexión segura TLS.

![image](./img/21_new_acc_tls.png)

Lo siguiente que haremos será enviar un correo a una cuenta que no exista y comprobaremos que pasa.

![image](./img/23_send_bad.png)

Finalmente comprobamos que el correo no ha sido enviado, puesto que la dirección de correo electrónico que introduje no es correcta, podemos comprobar la ruta `Badmails` y veremos lo siguiente:

![image](./img/22_bad_mail.png)

Finalmente comprobamos enviar el mismo mensaje, pero esta vez si, a un correo existente.

![image](./img/23_send.png)

Iremos al cliente, y abriremos el correo, podremos comprobar que hemos recibido el correo perfectamente.

![image](./img/24_check_cli.png)

Fin PRIMERA PARTE.

-----

-----

## Hmail Windows Server 2012
![image](./img/portada_hmail.png)

#### 1.0 Desinstalar Servicio SMTP
Primeramente tendremos que quitar la característica `SMTP` que instalamos en la primera parte. Para ello vamos a nuestro administrador de roles, `Administrar --> Quitar roles y funciones.`  
![image](./img/25_quitar_smtp.png)  

#### 2.0 Instalación de Servidor hMailServer
El primer paso en esta parte será ir a la pçagina oficial de descarga. Desscargaremos la última versión `(Latest version).`

![image](./img/25_hmail_down.png)

Como parte importante para la instalación de hMailServer, es imprescindible instalar la Característica de `.NET Framework 3.5`.

![image](./img/26_framework.png)

Ahora haremos la instalación de `hMailServer`.

![image](./img/27_install.png)

![image](./img/28_full.png)

Elegiremos la primera opción:   
![image](./img/29_user.png)

Elegiremos una contraseña:   
![image](./img/30_password.png)

Finalmente confirmamos la instalación con las características elegias.   
![image](./img/31_loc.ong.png)

Tras la instalación, lo ejecutaremos y nos conectaremos en `localhost` con el usuario `Administrador`.    
![image](./img/32_conect.png)

Ingresaremos la contraseña que predefinimos en el apartado anterior.    
![image](./img/33_conect_pass.png)

Tras lo anterior, podremos ver la interface principal del programa.    
![image](./img/34_interface.png)

#### 3.0 Dominios
Ahora iremos al apartado `Domains` donde añadiremos nuestros dominios `srd.eu` y `asir.eu`.    
![image](./img/35_domain.png)

![image](./img/36_domain.png)

Comprobamos el resultado, viendo los dos dominios creados.    
![image](./img/37_manage.png)

#### 4.0 Backup
En este apartado vamos a realizar un diagnóstico, y comprobaremos todos los errores que tiene nuestro Servidor, pero vamos a centrarnos en el apartado `Backup`.    
![image](./img/38_diagnostics.png)

Vamos a definir un directorio `(C:\Users\Administrador\Documents\BACKUP)`.    
![image](./img/39_dir.png)

Volveremos a hacer el diagnóstico y comprobamos que hemos corregido el error.    
![image](./img/40_diag_ok.png)

#### 5.0 Usuarios de Dominio
En este punto, vamos a configurar diferentes usuarios en nuestros Dominios y la función `Auto-reply`.

Dominio `asir.eu`: Creamos el usuario `user_asir`.    
![image](./img/41_user.png)

Dominio `srd.eu`: Activamos la función `Auto-reply`.       
![image](./img/42_reply.png)

#### 6.0 Servicio DNS
Vamos a crear dos `Zonas` nuevas en nuestro `Administrador de DNS`.

También crearemos un `host` al que llamaremos `mail` y un `MX` asocialo al mismo, en cada una de las `Zonas` anteriores.

`Zona srd.eu`   
![image](./img/43_dns.png)

`Zona asir.eu`
![image](./img/44_dns2.png)

#### 7.0 Opciones adicionales

En este punto vamos a añadir una función entra al Dominio `asir.eu`. En este caso he elegido la opción  `Forwarding`.

Esto hará que se reenvíe el mensaje a otro correo.    
![image](./img/45_forwarding.png)

#### 8.0 Cliente Windows
Cliente `OperaMail`

#### 9.0 Envío y recepción de correos entre usuarios.

Ahora vamos a enviar un correo con el usuario `user_asir` hacia el usuario `user_srd`.    
![image](./img/45_send.png)

Ahora comprobamos que recibimos el mensaje en el gestor `OperaMail` del cliente `user_srd`.    
![image](./img/47_check_rec.png)

Tras el envío del mensaje, también, comprobaremos que el usuario `user_srd` nos responde automáticamente, gracias a la función `Auto-reply` que configuramos anteriormente.    
![image](./img/46_reply.png)

#### 10.0 Listas de distribución
Mediante las `Listas de distribución` enviaremos correos a una lista de usuarios predefinidos en nuestro Servidor.    
Dentro de `Distribution list` vamos a crear un usuario en modo `público` para que cualquiera pueda mandar un correo a los usuarios de la lista de contactos.    
![image](./img/48_distribucion.png)

Ahora añadoremos miembros:    
![image](./img/49_members.png)

###### 10.1 Comprobación
Para la comprobación lo que haremos será enviar un correo directamente al nombre de la lista de contactos dentro de la `Distribución` que creamos anteriormente `users_asir@asir.eu`.           
![image](./img/50_envio_contacts.png)

Esto hará que el correo que enviemos sea recibido en todos los miembros de `users_asir@asir.eu`.    

Podemos comprobar que hemos recibido varios correos, uno para cada miembro.

![image](./img/51_check.png)

Fín de la actividad.
