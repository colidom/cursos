Carlos Javier Javier Oliva Domínguez
# A2: Acceso remoto VNC

*En la siguiente prántica aprenderemos a tener `Acceso remoto` de una máquina a otra, para ello usaremos Windows 7 y OpenSuse.*

- Ambas máquinas tendrán una configuración de red en `Adaptador puente` y direcciones ip estáticas.

---
### 1.0 Windows to Windows
*La primera parte de esta práctica la haremos desde una máquina Windows que actuará como Servidor y otra máquina Windows que actuará como Cliente.*
#### 1.1 Servidor Windows
El primer paso será configurar la dirección ip de forma estática con lo siguiente:
- 172.18.6.11
- 255.255.0.0
- 172.18.0.1

![image](./img/9_ip_server.png)

Para empezar instalaremos la aplicación `TightVNC` en el equipo Servidor, es decir, al equipo que vamos a acceder remotamente.

![image](./img/1_install_server.png)

En la siguiente ventana vamos a elegir una instalación `Custom` y desmarcamos la opción `TightVNC Viewer` puesto que estamos configurando el servidor.

![image](./img/2_install_server.png)

En la siguiente pantalla vamos a asignar una contraseña para el:
- `Remote Access` (para acceder desde el cliente)
- `Administrative Access` (para acceder al servidor)

![image](./img/3_pass_server.png)

Tras la finalización del paso anterior veremos como se ha instalado la aplicación `TightVNC Server`en la máquina que usaremos como servidor, o en otras palabras, a la que vamos a acceder remotamente.

![image](./img/4_installed_server.png)

Desde la siguiente ventana podremos configurar nuestro servidor VNC parámetros como:
- Puerto
- Contraseña
- Acceso desde Web.
- Otros...

![image](./img/5_config_server.png)

-----

#### 1.2 Cliente Windows

Lo primero que haremos será configurar las direcciones ip en forma estática, de la siguiente forma:

- 172.18.6.11
- 255.255.0.0
- 172.18.0.1

![image](./img/10_ip_client.png)

Como en el apartado anterior, lo siguiente que haremos será ejecutar el instalador con una configuración `Custom` pero esta vez elegimos la opción `TightVNC Viewer`.

![image](./img/6_install_client.png)

A cntinuación podemos comprobar la instalación de la aplicación TightVNC Viewer en nuestro cliente.

![image](./img/7_installed_client.png)

Lo siguiente que haremos será ejecutar la aplicación `TightVNC`en el cliente y pondremos los datos (dirección ip) del servidor.

![image](./img/8_if_client.png)

Como podemos comprobar, hemos accedido desde el Cliente al Servidor mediante la aplicación `TightVNC`.

![image](./img/11_result_client.png)

Para la correcta comprobación del funcionamiento, hemos puesto ambas máquinas una al lado de la otra para una mejor apreciación.

<---A la izquierda tenemos el Cliente.
A la derecha tenemos el Servidor--->.

![image](./img/12_result_both.png)

A modo de comprobación nos dirigiremos al Cliente y mediante el comando `netstat -n` comprobaremos que hay una correcta comunicación entre la máquina Cliente ()`172.18.6.11`) y la máquina Servidor (`172.18.6.10`) mediante el puerto `5900`.

![image](./img/13_netstat.png)

### 2.0 OpenSuse to OpenSuse
*La segunda parte de esta práctica la haremos desde una máquina OpenSuse que actuará como Servidor y otra máquina OpenSuse que actuará como Cliente.*
#### 1.1 Servidor OpenSuse
El primer paso será configurar la dirección ip de forma estática con lo siguiente:
- 172.18.6.31
- 255.255.0.0
- 172.18.0.1

Mediante la aplicación `YaST2` vamos a ejecutar la Administración remota que ya viene incluida en el sistema operativo.

Tendremos en cuenta dos factores:
- Activamos `Permitir administración remota con gestión del sistema.`
- `Puerto abierto en el cortafuegos.`

![image](./img/14_suse_vnc.png)
Tras la ejecución del asistente de `Administración remota` la máquina Servidor se reiniciará y el servicio quedará activado.

El siguiente paso será ejecutar el comando `vncserver` para ejecutar el servicio, éste nos dará un numero identificativo que corresponderá al número de escritorio, este número será usado para acceder posterirmente mediante el puerto 590X, X corresponde al número que nos dará el servidor.

- En nuestro caso ha sido `"3"`.

![image](./img/15_vnc.png)

#### 1.1 Cliente OpenSuse
El primer paso será configurar la dirección ip de forma estática con lo siguiente:
- 172.18.6.32
- 255.255.0.0
- 172.18.0.1
![image](./img/15_ip_client.png)

Ahora para poder acceder al servidor nos iremos a una consola y mediante el comando `vncviewer` intentaremos acceder al Servidor para administrarlo remotamente.



En la última parte de la configuración del servidor y  tras ejecutar el comando `vncserver` en el servidor, éste nos suministró el número "3", número que corresponde al escritorio que se va a administrar, y que junto con el puerto, nos permitirá acceder concretamente a ese escritorio. En este caso usaremos `5903.`

![image](./img/16_viewer.png)

Para la correcta comprobación del funcionamiento, hemos puesto ambas máquinas una al lado de la otra para una mejor apreciación.

- netstat -ntap

<---A la izquierda tenemos el Cliente.
A la derecha tenemos el Servidor--->.

![image](./img/17_result.png)

### 3.0 Windows to OpenSuse
*En la tercera parte de esta práctica vamos a usar el Servidor de OpenSuse que creamos anteriormente para acceder a él desde el cliente Windows que creamos anteriormente.*

Lo que haremos será ejecutar la aplicación `TightVNC` en el cliente Windows, que ya teníamos configurado, para acceder al Servidor OpenSuse que hemos configurado en el punto anterior.

![image](./img/18_client.png)

Introducimos la contraseña que habíamos predefinido en el Servidor.

![image](./img/19_pass.png)

Ahora podemos comprobar que podemos acceder desde el cliente Windows al Servidor OpenSuse para su correspondiente administración remota.

![image](./img/20_result.png)
### 4.0 OpenSuse to Windows
*En la cuarta parte de esta práctica vamos a usar el Servidor de Windows que creamos anteriormente para acceder a él desde el cliente OpenSuse que creamos anteriormente.*

Abriremos una consola y ejecutaremos el comando `vncviewer` e introduciremos la contraseña del servidor Windows.

![image](./img/21_view_client.png)

Ahora podemos comprobar que hemos accedido al Servidor Windows desde el cliente OpenSuse, y podemos adeministrarlo remotamente sin ningún problema.

![image](./img/22_result.png)

Fin de la Práctica.
