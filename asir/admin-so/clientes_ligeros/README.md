CARLOS JAVIER OLIVA DOMÍNGUEZ 2º ASIR

**1. Clientes ligeros con LTSP/Ubuntu**

Para esta práctica vamos a necesitar:

* 1 máquina virtual con Ubuntu Desktop que vamos a usar de servidor.

* 1 máquina virtual con Ubuntu Desktop que va a actuar como cliente.


**2.0 Máquina Servidor**

Vamos a comenzar las configuraciones del Servidor y para ello tenemos que tener en cuenta lo siguiente.

Debemos usar dos tarjetas de red:

- La primera en `Adaptador Puente` que va a actuar como red `Externa` y va a contar con la siguiente información de red:

  -  Dirección ip: `172.18.6.41`
  -  Máscara de Subred: `255.255.0.0`
  -  Puerta de enlace: `172.18.0.1`
  -  Servidor DNS: `8.8.4.4`

![EXTERNA](./img/2_ip.png)

- La segunda en `Red Interna` que va a actuar como red `Interna` y va a contar con la siguiente información de red:

  -  Dirección ip: `192.168.67.1`
  -  Máscara de Subred: `255.255.255.0`

![INTERNA](./img/2_ip2.png)

**2.1 Comprobación de configuraciones**

Vamos a incluir una serie de comandos para comprobar las configuraciónes del Servidor.

- Aquí nos mostrará la información de las tarjetas de red:

![ip](./img/3_ip_a.png)

- Seguidamente comprobamos la `Tabla de Rutas IP` del servidor.

![route](./img/4_route.png)

- Con la siguiente linea podemos ver el nombre de la máquina.

![host](./img/4_host.png)


**2.2 Creación de usuarios**

Ahora nos disponemos a crear tres usuarios. Para ello vamos a usar nuestro `Primer Apellido` añadiendo un número al final:

![user](./img/5_users.png)

Comprobación dentro del Servidor:

![user](./img/6_users.png)

**3.0 Instalar el servicio LTSP**

Para comenzar, instalaremos el `OpenSSH-Server` para tener acceso remoto a la máquina.

![ssh](./img/7_ssh.png)

- Modificamos la configuración del SSH para permitir acceso a root.

![ssh](./img/8_ssh.png)

- Ahora vamos a instalar el servidor de `Clientes Ligeros`.

![ltsp](./img/9_stand.png)


**3.1 Creación de la imágen ISO**

- Ahora vamos a crear un imagen del SO a partir del sistema real haciendo `ltsp-build-client`. La imagen del SO se cargará en la memoria de los clientes ligeros.

![iso](./img/10_iso.png)

- Comprobamos que la `imágen ISO` se ha creado satisfactoriamente.

![ltsp](./img/11_ltsp.png)

![ltsp](./img/12_ltsp_info.png)


- Consultamos el fichero de configuración `/etc/ltsp/dhcpd.conf`.
- Comprobaremos las rutas de `option root-path /opt/ltsp/amd64` y de `filename /ltsp/amd64/pxelinux.0`.

![check](./img/13_check.png)

En este punto modificaremos el valor `range 192.168.67.1XX 192.168.67.2XX`. Donde XX es el número de puesto de cada alumno.

![change](./img/14_change.png)

Ahora reiniciaremos el servidor y comprobamos que los siguientes servicios están en marcha.

![greep](./img/15_greep.png)

**4. Preparar MV Cliente**

Crearemos la MV cliente en VirtualBox:

- Sin disco duro y sin unidad de DVD.
- Sólo tiene RAM, floppyTarjeta de red PXE en modo "`red interna`".
- Configurar memoria gráfica a 128MB y habilitar el soporte 3D.

![flopy](./img/16_flopy.png)

![red_interna](./img/17_red_interna.png)

![screen](./img/18_pantalla.png)

Realizadas las configuraciones de la máquina cliente, pocedemos a arrancarla para comprobar su funcionamiento.

![change](./img/19_inicio_cli.png)

*Hemos llegado al final de la práctica pero hemos tenido problema con el inicio de la máquina cliente, no estamos seguros aún de como solucionar este problema, la pantalla se divide en dos.*

![change](./img/20_final.png)
