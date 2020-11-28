## U5.A5-Puppet
Carlos Javier Oliva Domínguez

-----
#### 1.0 Configuración
Vamos a usar 3 MV's con las siguientes configuraciones:

`MV1 - master:` Dará las órdenes de instalación/configuración a los clientes.
Configuración OpenSUSE.
IP estática 172.AA.XX.100
Nombre del equipo: masterXX
Dominio: curso1718

![image](./img/1_ip_master.png)

![image](./img/2_hostname_master.png)

![image](./img/3_hosts_master.png)

`MV2 - cliente 1:` recibe órdenes del master.
Configuración OpenSUSE.
IP estática 172.AA.XX.101
Nombre del equipo: cli1aluXX
Dominio: curso1718

![image](./img/4_ip_cli1.png)

![image](./img/5_hostname_cli1.png)

![image](./img/6_hosts_cli1.png)

`MV3 - client2:` recibe órdenes del master.
Configuración SO Windows 7.
IP estática 172.18.XX.102
Nombre Netbios: cli2aluXX
Nombre del equipo: cli2aluXX

![image](./img/7_ip_cli2.png)

![image](./img/8_hostname_cli2.png)

![image](./img/9_hosts_cli2.png)

`(AA) corresponde a: Año del curso`.

`(XX) corresponde a: Número del alúmno`.

#### 2.0 Instalando y configuración del servidor
Instalamos Puppet Master en la MV master06:
`zypper install rubygem-puppet-master`.

![image](./img/10_install.png)

Comprobamos:
`systemctl enable puppetmaster:` Permitir que el servicio se inicie automáticamente en el inicio de la máquina.

`systemctl start puppetmaster:` Iniciar el servicio.

`systemctl status puppetmaster:` Consultar el estado del servicio.

![image](./img/11_systemctl.png)

En este momento debería haberse creado el directorio /etc/puppet/manifests.

![image](./img/12_dir.png)

Preparamos los ficheros/directorios en el master:
~~~
mkdir /etc/puppet/files
touch /etc/puppet/files/readme.txt
~~~
![image](./img/13_touch_files.png)
~~~
mkdir /etc/puppet/manifests
touch /etc/puppet/manifests/site.pp
mkdir /etc/puppet/manifests/classes
touch /etc/puppet/manifests/classes/hostlinux1.pp
~~~
![image](./img/14_touch_hostlinux.png)

##### 2.1 site.pp
`/etc/puppet/manifests/site.pp` es el fichero principal de configuración de órdenes para los agentes/nodos puppet.

Contenido de nuestro site.pp:
~~~
import "classes/*"

node default {
  include hostlinux1
}
~~~
![image](./img/16_site_cnf.png)

##### 2.2 hostlinux1.pp
Como podemos tener muchas configuraciones, vamos a separarlas en distintos ficheros para organizarnos mejor, y las vamos a guardar en la ruta `/etc/puppet/manifests/classes`.

Vamos a crear una primera configuración para máquina estándar GNU/Linux.

Contenido de nuestro `hostlinux1.pp`:
~~~
class hostlinux1 {
  package { "tree": ensure => installed }
  package { "traceroute": ensure => installed }
  package { "geany": ensure => installed }
}
~~~
![image](./img/17_hostlinux.png)

Con `tree /etc/puppet` podemos consultar los ficheros/directorios que tenemos creados hasta el momento.

![image](./img/18_tree.png)

Comprobar que el directorio /var/lib/puppet tiene usuario/grupo propietario puppet.

![image](./img/19_permisos.png)

Reiniciamos el servicio y comprobamos que el servicio está en ejecución de forma correcta.
systemctl status puppetmaster
netstat -ntap |grep ruby

![image](./img/20_procesos.png)

Consultamos log por si hay errores: `tail /var/log/puppet/*.log`.

![image](./img/21_error_log.png)

Abrir el cortafuegos para el servicio.

![image](./img/22_cortafuegos.png)

#### 3. Instalación y configuración del cliente1
Vamos a instalar y configurar el cliente 1.

`Vamos a la MV cliente 1`.

Instalar el Agente Puppet `zypper install rubygem-puppet`.

![image](./img/23_puppet_client.png)

El cliente puppet debe ser informado de quien será su master. Para ello, vamos a configurar `/etc/puppet/puppet.conf`:

![image](./img/24_main.png)

Desactivaremos los plugin para este agente.

![image](./img/25_agent.png)

Comprobar que el directorio /var/lib/puppet tiene como usuario/grupo propietario puppet.

![image](./img/26_ls-l.png)

systemctl enable puppet: Activar el servicio en cada reinicio de la máquina.

Primero comprobaremos el estado actual:

![image](./img/27_status.png)

Luego activaremos el servicio en cada reinicio:

systemctl start puppet: Iniciar el servicio puppet.

systemctl status puppet: Ver el estado del servicio puppet.

![image](./img/28_start.png)

netstat -ntap |grep ruby: Muestra los servicios conectados a cada puerto.

![image](./img/29_netstat.png)

#### 4. Certificados
Para que el master acepte a cliente1 como cliente, se deben intercambiar los certificados entre ambas máquinas. Esto sólo hay que hacerlo una vez.

##### 4.1 Aceptar certificado
Vamos a la MV `master`.

Nos aseguramos de que somos el usuario root.
`puppet cert list`, consultamos las peticiones pendientes de unión al master:

![image](./img/30_cert_list.png)

Firmamos el Certificado aceptando al nuevo cliente desde el master.

![image](./img/31_signed.png)

Finalmente haremos un `puppet cert print` para completar el proceso.

![image](./img/32_cert_print.png)

##### 4.2 Comprobación
Vamos a comprobar que las órdenes (manifiesto) del master, llega bien al cliente y éste las ejecuta.

Vamos a cliente1
Reiniciamos la máquina y/o el servicio Puppet.

![image](./img/33_restart.png)

Comprobar que los cambios configurados en Puppet se han realizado.

Nos aseguramos de que somos el usuario root.

Ejecutar comando para forzar la ejecución del agente puppet:

`puppet agent --test`

![image](./img/34_agent.png)

#### 5. Segunda versión del fichero pp
Ya hemos probado una configuración sencilla en PuppetMaster. Ahora vamos a pasar a configurar algo más complejo.

`Contenido para /etc/puppet/manifests/classes/hostlinux2.pp`:

![image](./img/35_fickero_pp.png)

Modificar /etc/puppet/manifests/site.pp para que se use la configuración de hostlinux2 el lugar de la anterior:
~~~
import "classes/*"

node default {
  include hostlinux2
}
~~~
![image](./img/36_site.pp.png)

Ejecutar `tree /etc/puppet` para comprobar ficheros y directorios.

![image](./img/37_tree.png)

Reiniciar el servicio. Vamos al cliente1;
Comprobar que se han aplicado los cambios solicitados.

![image](./img/38_check_cli.png)

#### 6. Cliente puppet Windows
Vamos a configurar Puppet para atender también a clientes Windows.

##### 6.1 Configuración hostwindows3.pp

Vamos a la MV master y crearemos una configuración puppet para las máquinas windows:

El fichero:

`/etc/puppet/manifests/classes/hostwindows3.pp`, incluye el siguiente contenido:
~~~
class hostwindows3 {
  file {'C:\warning.txt':
    ensure => 'present',
    content => "Hola Mundo Puppet!",
  }
}
~~~
![image](./img/39_hostwindows.png)

Ahora vamos a modificar el fichero site.pp del master, para que tenga en cuenta la configuración de clientes GNU/Linux y clientes Windows, de modo diferenciado:
~~~
import "classes/*"

node 'cli1alu06.curso1718' {
  include hostlinux2
}

node 'cli2alu06' {
  include hostwindows3
}
~~~
![image](./img/40_site.pp.png)

En el servidor ejecutamos `tree /etc/puppet`, para confirmar que tenemos los nuevos archivos.

![image](./img/41_check.png)

Reiniciamos el servicio PuppetMaster.

Ejecutamos el comando facter, para ver la versión de Puppet que está usando el master.

![image](./img/42_version.png)

#### 6.2 Instalar el cliente2 Windows

Ahora vamos a instalar `AgentePuppet` en Windows. Recordar que debemos instalar la `misma versión` en ambos equipos.

Descargamos e instalamos la versión de Agente Puppet para Windows similar al Puppet Master.

Descarga:

![image](./img/43_download_puppet.png)

Instalación:

![image](./img/44_installed.png)

El fichero puppet.conf en Windows está en C:\ProgramData\PuppetLabs\puppet\etc\puppet.conf. (ProgramData es una ruta oculta). Revisar que tenga algo como:

![image](./img/45_puppet_conf.png)

Reiniciamos la MV.

Debemos aceptar el Certificado en el master para este nuevo cliente, al igual que hicimos en el apartado anterior.

Primeramente mostramos los Certificados pendientes.

![image](./img/46_cert.png)

Firmamos el Certificado en cuestión.

![image](./img/47_cert_sign.png)

Finalmente hacemos un `puppet cert print` para completar el proceso.

![image](./img/48_cert_print.png)

##### 6.3 Comprobamos los cambios
Vamos al cliente2.

Ejecutamos el agente puppet.

![image](./img/49_puppet_agent.png)

Comprobamos los cambios, vemos el archivo Warning.txt creado correctamente.

![image](./img/50_warning_created.png)

Iniciar consola puppet como administrador y probar los comandos:

`puppet agent --configprint server`, debe mostrar el nombre del servidor puppet.

![image](./img/51_configprint.png)

`puppet agent --server masterXX.curso1718 --test`: Comprobar el estado del agente puppet.

![image](./img/52_agent_server.png)

`puppet agent -t --debug --verbose`: Comprobar el estado del agente puppet.

![image](./img/53_debug.png)

`facter`: Para consultar datos de la máquina windows, como por ejemplo la versión de puppet del cliente.

![image](./img/54_facter.png)

`puppet resource user nombre-alumno1`: Para ver la configuración puppet del usuario.

puppet resource file c:\Users: Para var la configuración puppet de la carpeta.

![image](./img/55_resource.png)

#### 7. Configuración hostwindows4.pp
Configuramos en el master el fichero `/etc/puppet/manifests/classes/hostwindows4.pp` para el cliente Windows:
~~~
class hostwindows4 {
  user { 'soldado1':
    ensure => 'present',
    groups => ['Administradores'],
  }

  user { 'aldeano1':
    ensure => 'present',
    groups => ['Usuarios'],
  }
}
~~~
Comprobar que funciona.

![image](./img/56_hostwindows4.png)

Creamos un `site.pp` para el nuevo host.

![image](./img/57_site.pp.png)

Reiniciaremos el Servicio Puppet.

![image](./img/58_restart.png)

Comprobaremos que tenemos creado el usuario `soldado1` como Administrador del Sistema.

![image](./img/59_check_result.png)

#### 8. Configuración personalizada: hostalumno5.pp
Crear un nuevo fichero de configuración para la máquina cliente Windows con el nombre `/etc/puppet/manifests/classes/hostalumno5.pp`.

Incluir configuraciones elegidas por el alumno y probarlas.

Crearemos el usuario `oliva`.

![image](./img/60_hostwindows5.png)

Creamos nuestra propia versión para el archivo `site.pp`.

![image](./img/61_site.pp.png)

Comprobamos que el usuario oliva se ha creado y está dentro del grupo Administradores. Además se ha creado el archivo .txt que hemos ordenado en nuestra config puppet.

![image](./img/62_check_client.png)

Fin de la práctica.
