### Samba
Carlos Javier Oliva Domínguez

----
Samba con OpenSUSE y Windows 7.

Vamos a necesitar las siguientes 3 MVs:

MV1: Un servidor GNU/Linux OpenSUSE con IP estática (172.18.6.31).

MV2: Un cliente GNU/Linux OpenSUSE con IP estática (172.18.6.32).

MV3: Un cliente Windows con IP estática (172.18.6.11).

### 1. Servidor Samba (MV1)
#### 1.1 Preparativos

Configuraremos el servidor GNU/Linux. Usar los siguientes valores:

* Nombre de equipo: smb-server6

![image](./img/1_hostname.png)

* Añadiremos en /etc/hosts los equipos smb-cli6a y smb-cli6b.

![image](./img/2_hosts.png)

Capturar salida de los comandos siguientes en el servidor:

* hostname -f
* ip a
* lsblk
* sudo blkid

![image](./img/3_comandos.png)

<a name="locales"></a>

#### 1.2 Usuarios locales
Vamos al Servidor GNU/Linux, y creamos los siguientes grupos y usuarios:

* Crear los grupos piratas, soldados y todos.

![image](./img/4_group.png)

* Crear el usuario smbguest.

![image](./img/5_user.png)

Para asegurarnos que nadie puede usar smbguest para entrar en nuestra máquina mediante login, vamos a modificar este usuario y le ponemos como shell /bin/false.

![image](./img/6_false.png)

* Dentro del grupo piratas incluir a los usuarios pirata1, pirata2 y supersamba.

![image](./img/7_piratas.png)

* Dentro del grupo soldados incluir a los usuarios soldado1 y soldado2 y supersamba.

![image](./img/8_soldados.png)

* Dentro del grupo todos, poner a todos los usuarios soldados, pitatas, supersamba y a smbguest.

![image](./img/9_todos.png)

Comprobamos el resultado:

![image](./img/10_check.png)

#### 1.3 Crear las carpetas para los futuros recursos compartidos

* Vamos a crear las carpetas de los recursos compartidos con los permisos siguientes:
  * /srv/samba6/public.d
    * Usuario propietario supersamba.
    * Grupo propietario todos.
    * Poner permisos 775.
  * /srv/samba6/castillo.d
    * Usuario propietario supersamba.
    * Grupo propietario soldados.
    * Poner permisos 770.
  * /srv/samba6/barco.d
    * Usuario propietario supersamba.
    * Grupo propietario piratas.
    * Poner permisos 770.

###### Capturas del proceso:

Comando propietario.

![image](./img/11_chown.png)

Comando grupo propietario.

![image](./img/12_chgrp.png)

Comando permisos.

![image](./img/13_chmod.png)

Podemos ver el resultado final, tal como se pide en la práctica.

![image](./img/14_ls-l.png)

#### 1.4 Configurar el servidor Samba

* Yast -> Samba Server
  * Workgroup: mar1718

  ![image](./img/15_samba_server.png)

  * Sin controlador de dominio.

  ![image](./img/16_tipo_samba.png)

* En la pestaña de Inicio definimos:

  * Iniciar el servicio durante el arranque de la máquina.

  * Ajustes del cortafuegos -> Abrir puertos.

  ![image](./img/17_conf_samba.png)

#### 1.5 Crear los recursos compartidos de Samba
* Iremos a `/etc/samba/smb.conf` y modificaremos el fichero de configuración con los siguientes datos.

![image](./img/18_smb.png)

Usaremos el comando `testparm` para comprobar la confiuración.

![image](./img/19_testparm.png)

#### 1.6 Usuarios Samba
Tras la reación de los usuarios en el apartado `1.2 Usuarios locales` toca añadirlos a Samba.

* Con `smbpasswd -a nombreusuario`,  crearemos la clave de Samba para un usuario del sistema.

![image](./img/20_users.png)

* Con `pdbedit -L`, comprobaremos la lista de usuarios Samba.

![image](./img/21_check.png)

#### 1.7 Reiniciar
* Ahora que hemos terminado con el servidor, hay que reiniciar el servicio para que se lean los cambios de configuración.

* Para ello iremos a la consola de comandos y haremos lo siguiente:

  * Servicio `smb`

    ![image](./img/22_comandos_smb.png)

  * Servicio `nmb`

    ![image](./img/23_comandos_nmb.png)

Comandos de comprobación:

* `sudo testparm`   #
Verifica la sintaxis del fichero de configuración del servidor Samba.

![image](./img/24_check.png)

* `sudo netstat -tap`   # Vemos que el servicio SMB está a la escucha.

![image](./img/25_netstat.png)

### 2. Windows (MV3 smb-cli6b)
* Configurar el cliente Windows.
Configuramos la dirección  IP que hemos establecido.

![image](./img/26_ip_cl6b.png)

* Configuraremos el nombre `smb-cli6b`.

![image](./img/27_hostname.png)

* Configurar el fichero ...\etc\hosts de Windows.

![image](./img/28_hosts.png)

#### 2.1 Cliente Windows GUI
Desde un cliente Windows vamos a acceder a los recursos compartidos del servidor Samba `smb-server6`.

![image](./img/29_check_server.png)

Escribimos \\ip-del-servidor-samba y vemos lo siguiente:

![image](./img/30_ip_server.png)

Comprobaremos los accesos de todas las formas posibles.

Como si fuéramos:

`Un pirata:`

En el primer acceso nos pedirá el nombre de usuario y contraseña de un miembro del grupo `barco`.

![image](./img/31_pirata1.png)

Comprobamos que podemos acceder a la carpeta con el usuario `pirata1` al recurso `barco`.

![image](./img/32_barco_pirata1.png)

Mediante el comando `net use * /d /y`, podemos cerrar las conexión `SMB/CIFS` que se ha realizado desde el cliente al servidor.

![image](./img/33_net_use.png)

`Un soldado:`

En el primer acceso nos pedirá el nombre de usuario y contraseña de un miembro del grupo `castillo`.

![image](./img/34_soldado1.png)

Comprobamos que podemos acceder a la carpeta con el usuario `soldado1` al recurso `castillo`.

![image](./img/35_castillo_soldado1.png)

Comprobaremos resultados con los siguientes comandos:

`smbstatus`, desde el servidor Samba.

![image](./img/36_smbstatus.png)

`netstat -ntap`, desde el servidor Samba.

![image](./img/37_netstat_server.png)

`netstat -n`, desde el cliente Windows.

![image](./img/38_netstat_win.png)

#### 2.2 Cliente Windows comandos
Iremos al cliente Windows para consultar todas las conexiones/recursos conectados hacemos `net use`.

![image](./img/39_net_use.png)

Comprobamos que no tenemos ninguna conexión abierta. En caso de que existiera alguna podríamos cerrarla mediante el comando `net use * /d /y`.

![image](./img/40_net_view.png)

Mediante el comando `net view`, vemos las máquinas (con recursos CIFS) accesibles por la red.

Con el comando `net use S: \\ip-servidor-samba\recurso clave /USER:usuario /p:yes` establece una conexión con el recurso compartido y lo monta en la unidad S. Probemos a montar el recurso barco.

![image](./img/41_use_S.png)

Comprobamos mediante `net use`.

![image](./img/42_net_use.png)

Podemos comprobar que la unidad S la tenemos montada en equipo.

![image](./img/43_comprobamos.png)

* Comprobamos los resultados con los siguientes comandos:

  * smbstatus, desde el servidor Samba.

  ![image](./img/44_smbstatus.png)

  * netstat -ntap, desde el servidor Samba.

  ![image](./img/45_netstat.png)

  * netstat -n, desde el cliente Windows.

  ![image](./img/46_netstat.png)

#### 3 Cliente GNU/Linux (MV2 smb-cli6a)

Usaremos nombre `smb-cli6a` y la IP `172.18.6.32`.

Configuraremos también el archivo `/etc/hosts` con la configuración de red del mismo equipo `smb-cli6a`, el Servidor samba `smb-server6` y del Cliente Windows `smb-cli6b`.

![image](./img/47_hosts.png)

Accederemos al recurso prueba del servidor Samba, pulsamos CTRL+L y escribimos smb://ip-del-servidor-samba:

![image](./img/48_smb_to_server.png)

Pondremos usuario y contraseña del recurso `castillo` (establecidos anteriormente).

![image](./img/49_auth_castle.png)

Comprobamos la creación de una carpeta dentro del recurso `castillo`.

![image](./img/50_new_folder_castle.png)

Pondremos usuario y contraseña del recurso `barco` (establecidos anteriormente).

![image](./img/51_auth_barco.png)

Comprobamos la creación de una carpeta dentro del recurso `barco`.

![image](./img/52_new_folder_barco.png)

Comprobaremos que el recurso `public` es de sólo lectura.

![image](./img/52_lectura.png)

Comprobamos los resultados con los siguientes comandos:

`smbstatus`, desde el servidor Samba.

![image](./img/53_smbstatus.png)

`netstat -ntap`, desde el servidor Samba.

![image](./img/54_netstat_server.png)

`netstat -ntap`, desde el cliente Linux.

![image](./img/55_netstat_client.png)

#### 3.2 Cliente GNU/Linux comandos

Vamos a un equipo GNU/Linux `smb-cli6a`. Desde este equipo usaremos comandos para acceder a la carpeta compartida.

Primero comprobar el uso de las siguientes herramientas:
sudo `smbtree`
          # Muestra todos los equipos/recursos de la red SMB/CIFS

![image](./img/56_smbtree.png)

`smbclient --list ip-servidor-samba`
    # Muestra los recursos SMB/CIFS de un equipo concreto

![image](./img/57_smbclient.png)

- Ahora crearemos en local la carpeta `/mnt/samba06-remoto/castillo`.

 ![image](./img/58_new_folder.png)

- MONTAJE: Con el usuario root, usamos el siguiente comando para montar un recurso compartido de Samba Server, como si fuera una carpeta más de nuestro sistema: `mount -t cifs //172.18.6.31/castillo /mnt/samba06-remote/castillo -o username=soldado1`

 ![image](./img/59_mount.png)

 - COMPROBAR: Ejecutar el comando `df -hT`. Veremos que el recurso ha sido montado.

  ![image](./img/60_df-ht.png)

- Comprobando resultados:

  - smbstatus, desde el servidor Samba.
  ![image](./img/61_smbstatus.png)

 - netstat -ntap, desde el servidor Samba.
  ![image](./img/62_netstat_server.png)

 - netstat -ntap, desde el cliente Linux.
  ![image](./img/63_netstat_client.png)

#### 3.3 Montaje automático

Acabamos de acceder a los recursos remotos, realizando un montaje de forma manual (comandos mount/umount). Si reiniciamos el equipo cliente, podremos ver que los montajes realizados de forma manual ya no están (df -hT). Si queremos volver a acceder a los recursos remotos debemos repetir el proceso de montaje manual, a no ser que hagamos una configuración de montaje permanente o automática.

- Para configurar acciones de montaje automáticos cada vez que se inicie el equipo, debemos configurar el fichero `/etc/fstab` y añadir la siguiente línea:

~~~
//smb-server6/public /mnt/samba06-remote/castillo cifs username=soldado1,password=clave 0 0
~~~

![image](./img/64_auto_mount.png)

- Reiniciaremos el equipo y comprobamos que se realiza el montaje automático al inicio.

![image](./img/65_df-ht.png)

#### 4. Preguntas para resolver

- ¿Las claves de los usuarios en GNU/Linux deben ser las mismas que las que usa Samba?

  - Si, dado que Samba usa los usuarios del propio sistema.

- ¿Puedo definir un usuario en Samba llamado soldado3, y que no exista como usuario del sistema?

  - No, puesto que Samba trabaja con los usuarios del sistema.

- ¿Cómo podemos hacer que los usuarios soldado1 y soldado2 no puedan acceder al sistema pero sí al samba? (Consultar /etc/passwd)

  - Al igual que el el apartado [1.2 Usuarios locales](#locales) modificamos los usuarios en cuestión y le ponemos como shell `/bin/false`.

- Añadir el recurso [homes] al fichero smb.conf según los apuntes. ¿Qué efecto tiene?

  - Estaríamos creando un nuevo recurso llamado `homes`.
