## Instalación y Configuración DNS W2012
Carlos Javier Oliva Domínguez

----
*En la siguiente práctica vamos a realizar la instalación y configuración de un servidor `DNS` en una máquina con `Windows Server 2012`.*

### 1.0 Crear una zona de búsqueda directa para tu servidor

Para comenzar vamos a crear una zona de `búsqueda directa` en el Servidor.

Primeramente vamos a agregar los roles:

![image](./img/1_role.png)

Ahora elegiremos el Servidor de destino, que en su caso será nuestra máquina Windows Server 2012.

![image](./img/2_server.png)

Seguidamente añadiremos la característica de `Servidor DNS`.

![image](./img/3_dns.png)

Confirmamos las características que vamos a instalar y haremos clic en `Instalar`.

![image](./img/4_confirm_install.png)

Dado que nuestro Servidor DNS es compatible con varios tipos de zonas y almacenamientos, crearemos una `Zona principal`.

![image](./img/5_directa.png)

En la siguiente imágen configuraremos el nombre que queremos que tenga nuestra nueva zona, que especificará la parte del espacio de nombres DNS para el que actuará el servidor de autoruzación.

![image](./img/6_zona1.png)

Crearemos nuestro propio archivo de zona.

![image](./img/7_archivo_zona.png)

Ahora como vemos, tenemos un resumen de todas las características de nuestra zona de `búsqueda directa`.

![image](./img/8_resumen.png)

### 2.0 Crear una zona de búsqueda inversa para tu subred

El segundo paso de la práctica consta de la instalación de una zona de `búsqueda inversa`.

Un paso importante será identificar la red de actuación de dicha zona.

![image](./img/9_inversa.png)

Al igual que en el punto anterior podremos crear un archivo de zona o podremos copiarlo de otro servidor. En nuestro caso vamos a crear uno nuevo, con el nombre por defecto que nos da el asistente.

![image](./img/10_archive_zone.png)

### 3.0 Configuración de reenviadores

Nos disponemos a configurar los reenviadores públicos en nuestro propio Servidor DNS para resulver consultas DNS que éste no pueda.

![image](./img/11_reenviadores.png)

### 4.0 Configurar el servidor para ser servidor DNS Caché (en la configuración estática de red)

En este punto empezaremos creando un nuevo host, para ello iremos a nuestra zona de `búsqueda directa` y lo crearemos.

Pondremos el `FQDN` y la dirección ip estática, que corresponderá con nuestro servidor DNS.

![image](./img/12_new_host.png)

Configuraremos el cliente para que su servidor DNS sea el servidor W2012.

Primeramente la dirección ip.

![image](./img/27_ip_cliente.png)

Y el dominio.

![image](./img/28_domain_name.png)

### 5.0 Registros en la zona de búsqueda directa

#### 5.1 Un alias para tu servidor denominado server
Lo que haremos en este punto será crear un alias (`CNAME`) para nuestro servidor denominado `server`.

![image](./img/13_alias.png)

Comprobamos que se ha creado correctamente en nuestra zona de `búsqueda directa`.

![image](./img/14_check.png)
#### 5.2 Una impresora con IP fija denominada printer
Ahora añadiremos una nueva impresora y la vamos a asociar a una ip fija que hemos dispuesto para ella `172.18.6.15`.

![image](./img/15_printer.png)

#### 5.3 Un servidor de correo (ficticio) denominado correo, asociado a una dirección en tu servidor.

Crearemos un nuevo host al que llamaremos correo con la dirección ip `172.18.6.16`.

![image](./img/16_correo.png)

Crearemos un nuevo registro de recuersos para asociarlo a nuestro Servidor.

![image](./img/17_correo_intercambio.png)

#### 5.4 Subzona
En este punto vamos a crear un nuevo Dominio DNS al que llamaremos servicios.

![image](./img/18_servicios.png)

Tras el paso anterior vamos a crear una nueva impresora, un servidor ftp y el equipo del administrador del sistema.

Crearemos un nuevo host y vamos a asociarle una ip expresamente para la impresora2.

![image](./img/19_printer2.png)

Creamos otro nuevo host y le añadimos una ip también.

![image](./img/20_ftp.png)

Finalmente añadiremos el equipo del administrador del sistema, con su ip correspondiente.

![image](./img/21_admin.png)

Comprobaremos el árbol de zona veremos la subzona (servicios) y los host(Servicios) de tipo `A` que acabamos de crear.

![image](./img/22_servicios.png)

### 6.0 Comprobación de resolución de nombres en el Servidor
Ahora comprobaremos las configuraciones anteriormente efectuadas, desde la consola del Servidor DNS.

![image](./img/23_nslookup_server.png)

A la Impresora 1:

![image](./img/24_nslookup_printer.png)

Al Servidor ftp dentro de la subzona servicios:

![image](./img/25_nslookup_servicios_ftp.png)

A la Impresora 2 dentro de la subzona servicios:

![image](./img/26_nslookup_servicios_printer2.png)

### 7.0 Validar Cliente en el Dominio.

Primeramente vamos a validar el Cliente en el Dominio y comprobamos que éste aparece en la zona de búsqueda del Servidor.

![image](./img/29_client_server.png)

comprobamos la ip del Cliente para ver si concuerda con la que aparece en la zona de búsqueda del Servidor.

![image](./img/30_ip_client.png)

### 8.0 Comprobar desde el Cliente

Comprobaremos los servicios desde el Cliente y veremos que nuestro Servidor DNS `172.18.6.10` es el que hace la resolución de nombres.

Al servidor:

![image](./img/31_check_client.png)

A la impresora 1:

![image](./img/32_check_client.png)

A la impresora 2 perteneciente a servicios:

![image](./img/33_check_client.png)

Al Servidor ftp perteneciente a servicios:

![image](./img/34_check_client.png)

#### 8.1 Comprobar fuera de la intranet

A la página del Instituto.

![image](./img/35_ies_client.png)

 A la página de Google.

![image](./img/36_google_client.png)

Como hemos visto en las comprobaciones el encargado de la Resolución de nombres ha sido nuestro Servidor DNS `(172.18.6.10)` en todos los casos.

Fin de la práctica
