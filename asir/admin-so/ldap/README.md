## Servidor LDAP - OpenSUSE
Carlos Javier Oliva Domínguez

----
Hay varias herramientas que implementan el protocolo LDAP, por ejemplo: OpenLDAP, 389-DC, Active Directory, etc. En esta guía vamos a instalar y configurar del servidor LDAP con OpenLDAP.

![image](./img/1_arbol.png)

### 1 Preparar la máquina

Vamos a usar una MV OpenSUSE para montar nuestro servidor LDAP con:
~~~
Configuración MV
Nombre equipo: ldap-server06
Además en /etc/hosts añadiremos:
127.0.0.2   ldap-server06.curso1718   ldap-server06
127.0.0.3   oliva06.curso1718         oliva06
~~~
![image](./img/1_hosts.png)

Configuraremos también una ip que identifique nuestro servidor en la red.

![image](./img/2_hostname.png)

### 1.1 Instalación del Servidor LDAP
Procedemos a la instalación del módulo Yast que sirve para gestionar el servidor LDAP (yast2-auth-server), lo haremos mediante consola.

~~~
sudo zypper install yast2-auth-server
~~~
![image](./img/3_auth.png)

En el proceso de instalación añadiremos también los paquetes:
- openldap2
- krb5-server
- krb5-client

![image](./img/4_paquetes.png)

- Iniciar servidor LDAP -> Sí
- Registrar dameon SLP -> No
- Puerto abierto en el cortafuegos -> Sí

![image](./img/5_start.png)

- Tipo de BD -> hdb
- DN base -> dc=oliva06,dc=curso1718.
- DN administrador -> cn=Administrator
- Añadir DN base -> Sí
- Contraseña del administrador
- Directorio de BD -> /var/lib/ldap
- Usar esta BD predeterminada para clientes LDAP -> Sí.

![image](./img/6_new_db.png)

Tenemos un pequeño resumen de las configuraciones que acabamos de hacer.

![image](./img/7_resumen.png)

Comprobamos:

- `slaptest -f /etc/openldap/slapd.conf` para comprobar la sintaxis del fichero de configuración.

  ![image](./img/8_slaptest.png)

- `systemctl status slapd`, para comprobar el estado del servicio.

  ![image](./img/9_status.png)

- `systemctl enable slapd`, para activar el servicio automáticamente al reiniciar la máquina.

<<<<<<< HEAD:u2/ldap/README.md
  ![PENDIENTE](./img/9_enable.png)
=======
  ![image](./img/9_enable.png)
>>>>>>> a9e004fe090719df9962b767248cc255c0da7ebb:u3/ldap/README.md

- `nmap -Pn localhost | grep -P '389|636'`, para comprobar que el servidor LDAP es accesible desde la red.

  ![image](./img/10_nmap.png)

- `slapcat` para comprobar que la base de datos está bien configurada.

  ![image](./img/11_slapcat.png)

- Podemos comprobar el contenido de la base de datos LDAP usando la herramienta gq. Esta herramienta es un browser LDAP.

- Comprobar que tenemos creadas las unidades organizativas: groups y people.

  ![image](./img/12_gq.png)

### 1.2 Crear usuarios y grupos LDAP

- Yast -> Usuarios Grupos -> Filtro -> LDAP.
Crear el grupo piratas2 (Estos se crearán dentro de la ou=groups).

  ![image](./img/13_groups.png)

- Crear los usuarios pirata21, pirata22 (Estos se crearán dentro de la ou=people).

  ![image](./img/14_users.png)

- Usar gq para consultar/comprobar el contenido de la base de datos LDAP.

  ![image](./img/15_check_gq.png)

`ldapsearch -x -L -u -t "(uid=pirata21)"`, comando para consultar en la base de datos LDAP la información del usuario con uid concreto.

![image](./img/16_ldapsearch_pirata21.png)

## 2. Cliente LDAP Preparativos

Vamos a otra MV OpenSUSE que actuará como Cliente LDAP:

- Configuración MV:
  - Nombre equipo: ldap-client06
  - Dominio: curso1718

Asegurarse que tenemos definido en el fichero `/etc/hosts` del cliente, el nombre DNS con su IP correspondiente:

![image](./img/17_hosts_client.png)

Comprobamos:
Comprobación

- `nmap -Pn ldap-server06 | grep -P '389|636'`, para comprobar que el servidor LDAP es accesible desde el cliente.

![image](./img/18_nmap.png)

- Usar gq en el cliente para comprobar que se han creado bien los usuarios.

 - File -> Preferencias -> Servidor -> Nuevo
 - URI = ldap://ldap-server06
 - Base DN = dc=david06,dc=curso1718

![image](./img/19_new_server.png)

### 2.1 Instalar cliente LDAP

Vamos a configurar de la conexión del cliente con el servidor LDAP.

Debemos instalar el paquete `yast2-auth-client`, que nos ayudará a configurar la máquina para autenticación.
~~~
zsudo zypper install yast2-auth-client
~~~
![image](./img/20_auth_client.png)

Ir a Yast -> LDAP y cliente Kerberos.

Configurar de la siguiente forma:

![image](./img/21_client_conf.png)

### 2.2 Comprobamos desde el cliente

Vamos a la consola con nuestro usuario normal, y probamos lo siguiente:

- `getent passwd pirata21`

  ![image](./img/22_getent_passwd.png)

- `getent group piratas2`

  ![image](./img/23_getent_group.png)

- `id pirata21`

  ![image](./img/24_id.png)

- `finger pirata21`

  ![image](./img/25_finger.png)

- `cat /etc/passwd | grep pirata21`

  ![image](./img/26_cat.png)

- `cat /etc/group | grep piratas2`

  ![image](./img/27_cat.png)

- `su pirata21`

  ![image](./img/28_su.png)

###   2.3 Autenticación
Con autenticacion LDAP prentendemos usar la máquina servidor LDAP, como repositorio centralizado de la información de grupos, usuarios, claves, etc. Desde otras máquinas conseguiremos autenticarnos (entrar al sistema) con los usuarios definidos no en la máquina local, sino en la máquina remota con LDAP. Una especie de Domain Controller.

Entrar en la MV cliente con algún usuario LDAP.

![image](./img/29_su.png)
