# Misc

## Configuración de la interfaz de red

Si vamos a trabajar en el instituto y en casa, tendremos que poder acceder a la máquina de origen desde las dos localizaciones.

### Asignar una IP fija

Dado que tenemos redes diferentes en el instituto y en casa, vamos a configurar la interfaz de red en la máquina de origen, para que asuma 2 direcciones de red diferentes, y podamos acceder a ella desde ambas localizaciones.

> NOTA:
> El adaptador de red debe configurarse en modo *bridge* o *puente*.

```bash
sdelquin@imwprofe:~$
sdelquin@imwprofe:~$ sudo vi /etc/network/interfaces
```

> Contenido:

```bash
# This file describes the network interfaces available on your system
# and how to activate them. For more information, see interfaces(5).

source /etc/network/interfaces.d/*

# The loopback network interface
auto lo
iface lo inet loopback

# school interface
auto ens33:0
iface ens33:0 inet static
    address 172.18.<tu_numero>.<lo_que_quieras>    # pon una dirección de tu rango
    netmask 255.255.0.0
    broadcast 172.18.255.255
    post-up route add default gw 172.18.0.1
    dns-nameservers 8.8.8.8 8.8.4.4

# home interface
auto ens33:1
iface ens33:1 inet static
    address 192.168.1.118
    netmask 255.255.255.0
    broadcast 192.168.1.255
    post-up route add default gw 192.168.1.1
    dns-nameservers 8.8.8.8 8.8.4.4
```

Ahora debemos reiniciar nuestra máquina, para que todos estos cambios tengan efecto. Ejecutamos como **root**:

```bash
sdelquin@imwprofe:~$ sudo reboot
```

Una vez termine el reinicio, comprobamos que la máquina tiene salida hacia internet:

```bash
sdelquin@hillvalley:~$ ping -c4 google.com
PING google.com (216.58.211.238) 56(84) bytes of data.
64 bytes from mad01s24-in-f14.1e100.net (216.58.211.238): icmp_seq=1 ttl=56 time=28.5 ms
64 bytes from mad01s24-in-f14.1e100.net (216.58.211.238): icmp_seq=2 ttl=56 time=28.8 ms
64 bytes from mad01s24-in-f14.1e100.net (216.58.211.238): icmp_seq=3 ttl=56 time=28.7 ms
64 bytes from mad01s24-in-f14.1e100.net (216.58.211.238): icmp_seq=4 ttl=56 time=28.6 ms

--- google.com ping statistics ---
4 packets transmitted, 4 received, 0% packet loss, time 3006ms
rtt min/avg/max/mdev = 28.584/28.696/28.879/0.114 ms
sdelquin@hillvalley:~$
```

### Acceso por nombre de máquina

Ahora, **desde la máquina de origen**, para no estar todo el tiempo haciendo uso de la IP para conectarnos a la máquina, podemos añadir un alias (*dns local*). Para ello, haremos lo siguiente como usuario **root**:

```bash
~|🍺  sudo vi /etc/hosts
```

> Contenido
```bash
...
<ip_de_la_maquina_de_produccion> debian imw produccion
...
```

Ahora, desde la máquina de origen, te podrás referir a la máquina, con los nombres `debian`, `imw` ó `produccion`:

```bash
~|🍺  ping debian
PING hillvalley (192.168.1.118): 56 data bytes
64 bytes from 192.168.1.118: icmp_seq=0 ttl=64 time=0.278 ms
64 bytes from 192.168.1.118: icmp_seq=1 ttl=64 time=0.433 ms
^C
--- hillvalley ping statistics ---
2 packets transmitted, 2 packets received, 0.0% packet loss
round-trip min/avg/max/stddev = 0.278/0.356/0.433/0.077 ms
~|🍺
```

Dado que vamos a acceder a nuestra máquina, bien desde el instituto o bien desde casa, pondremos un sufijo a los nombres de máquina en el fichero `/etc/hosts` para identificarlos rápidamente. Un ejemplo podría ser lo siguiente:

```bash
172.18.10.22    debian.ies imw.ies produccion.ies
192.168.1.118   debian.home imw.home produccion.home
```

## Instalación de servicio SSH

```bash
sdelquin@imwprofe:~$ sudo apt-get update
sdelquin@imwprofe:~$ sudo apt-get install openssh-server
```

## Acceso por SSH (sin password)

La primera vez que intentamos entrar a nuestra máquina (en mi caso se llama `hillvalley`) aparece un mensaje de autenticidad. Escribimos `yes` y pondremos nuestra contraseña.

```bash
~|🍋  ssh imw.home
The authenticity of host 'imw.home (192.168.1.119)' can't be established.
ECDSA key fingerprint is SHA256:WXdhgwFlATz5mI6GArf0u6XXRG1+WMFkcZm6jO2gO1M.
Are you sure you want to continue connecting (yes/no)? yes
Warning: Permanently added 'imw.home,192.168.1.119' (ECDSA) to the list of known hosts.
sdelquin@imw.home's password:
Welcome to Ubuntu 16.04.3 LTS (GNU/Linux 4.4.0-93-generic x86_64)

 * Documentation:  https://help.ubuntu.com
 * Management:     https://landscape.canonical.com
 * Support:        https://ubuntu.com/advantage
Last login: Sun Sep 17 16:21:59 2017
sdelquin@imwprofe:~$
```

Al hacer esto, se añadirán los datos del host destino en el fichero `~/.ssh/known_hosts`.

Para no tener que escribir la contraseña de usuario cada vez que nos conectamos a la máquina, podemos hacer uso de la clave pública *RSA*

Lo primero es comprobar si ya disponemos de una clave *RSA* en la máquina de origen. Para eso comprobamos que existan ficheros en el directorio `~.ssh`:

```bash
~|🍋  tree .ssh
.ssh
├── config
├── id_rsa
├── id_rsa.pub
└── known_hosts

0 directories, 4 files
~|🍋
```

En este caso, sí disponemos de las claves *RSA*:
- `id_rsa`: clave privada. **No compartir nunca con nadie**
- `id_rsa.pub`: clave pública.

En el caso de que no tuviéramos la pareja de claves *RSA*, tenemos que generarlas con el comando `ssh-keygen`.

> NOTA: Ejecutar este comando como usuario **normal**.

```bash
~|🍋 ssh-keygen
Generating public/private rsa key pair.
Enter file in which to save the key (/home/sdelquin/.ssh/id_rsa):
Enter passphrase (empty for no passphrase):
Enter same passphrase again:
Your identification has been saved in /home/sdelquin/.ssh/id_rsa.
Your public key has been saved in /home/sdelquin/.ssh/id_rsa.pub.
The key fingerprint is:
b7:5f:51:52:22:46:02:18:19:80:64:85:64:88:12:d9 sdelquin@delorean
The key's randomart image is:
+---[RSA 2048]----+
|oB=+o.o=....+ . .|
|=oE   o    o . o |
|.             . .|
|               o |
|        S .   .  |
|         . .   . |
|          .   .  |
|           . .   |
|            .    |
+-----------------+
~|🍺
```

Ahora debemos copiar (ó añadir) nuestra clave pública `id_rsa.pub` al fichero `authorized_keys` de la máquina (`hillvalley` en mi caso):

```bash
~|🍋 scp .ssh/id_rsa.pub imw.home:~/.ssh/authorized_keys
sdelquin@imw.home's password:
id_rsa.pub                                                                  100%  405     0.4KB/s   00:00
~|🍋  
```

> NOTA1: El directorio `~/.ssh` debe existir en la máquina. Si no es así, el comando anterior nos dará un error. Para crearlo, habría que entrar por SSH a la máquina, y crear el directorio: `mkdir ~/.ssh`

> NOTA2: Si el fichero `~/.ssh/authorized_keys` no está vacío previamente en la máquina, debemos tener cuidado con el comando anterior, ya que lo podemos sobreescribir. Si existiera habría que añadir el contenido de la clave pública `id_rsa.pub` al final del fichero `authorized_keys`.

Una vez hecho esto, cuando accedamos por *ssh* ya no tendremos que volver a teclear nuestra contraseña:

```bash
🍋  ssh imw.home
Welcome to Ubuntu 16.04.3 LTS (GNU/Linux 4.4.0-93-generic x86_64)

 * Documentation:  https://help.ubuntu.com
 * Management:     https://landscape.canonical.com
 * Support:        https://ubuntu.com/advantage
Last login: Sun Sep 17 16:49:26 2017 from 192.168.1.41
sdelquin@imwprofe:~$
```

### Acceso root a ssh

Como norma general, no es recomendable habilitar el acceso por *ssh* como `root`. Es preferible acceder como usuario *"normal"*, y una vez dentro, cambiar a superusuario con el comando `su`.

Sin embargo, sólo para el entorno de clase, y para facilitar al profesor el acceso a las máquinas, se tendrá que habilitar el acceso root por ssh. Para ello, desde la máquina y como usuario *root*:

```bash
sdelquin@imwprofe:~$ vi /etc/ssh/sshd_config
```

> Contenido
```ini
...
PermitRootLogin yes
...
```

```bash
sdelquin@imwprofe:~$ /etc/init.d/ssh restart
[ ok ] Restarting ssh (via systemctl): ssh.service.
sdelquin@imwprofe:~$
```

Ahora, podemos comprobar que el acceso *root* por *ssh* ya debe de funcionar. Así que ejecutamos lo siguiente desde la *máquina de origen*:

```bash
~|🍺  ssh root@hillvalley
root@hillvalley's password:

The programs included with the Debian GNU/Linux system are free software;
the exact distribution terms for each program are described in the
individual files in /usr/share/doc/*/copyright.

Debian GNU/Linux comes with ABSOLUTELY NO WARRANTY, to the extent
permitted by applicable law.
Last login: Fri Aug 26 19:41:22 2016
sdelquin@imwprofe:~$
```

## Paquetes adicionales

```bash
apt-get install vim
apt-get install ntp
apt-get install unzip
```

## Configuraciones varias

### `ntp.conf`

```bash
root@hillvalley:~# crontab -e
```

> Contenido
```cron
5 * * * * /etc/init.d/ntp restart
```

### `.bashrc`

```bash
vi ~/.bashrc
```

> Contenido
```bash
...
export LS_OPTIONS='--color=auto'
eval "`dircolors`"
alias ls='ls $LS_OPTIONS'
...
export PS1="\[\033[38;5;229m\]\u\[$(tput sgr0)\]\[\033[38;5;15m\]@\[$(tput sgr0)\]\[\033[38;5;214m\]\h\[$(tput sgr0)\]\[\033[38;5;15m\]:\[$(tput sgr0)\]\[\033[48;5;164m\]\w\[$(tput sgr0)\]\[\033[48;5;-1m\]\\$ \[$(tput sgr0)\]"
export PATH=$PATH:.
export EDITOR=vim
```

Puedes configurar un prompt coloreado para *bash* a través de [http://bashrcgenerator.com/](http://bashrcgenerator.com/)

### `.exrc`

```bash
vi ~/.exrc
```

> Contenido
```vim
set ts=4
set sw=4
syntax on
set bg=dark
set ai
set expandtab
set paste
```

## Problemas comunes

* Si tienes problemas con la contraseña de `root` en tu máquina virtual, y no te funciona el que se supone que debe tener. Si crees que tu sistema sufre una *amnesia temporal*, debes hacer lo siguiente. Como usuario normal, ejecuta:

```bash
$> sudo passwd root
```

Ahora escribe tu contraseña de usuario normal, y a continuación tendrás que repetir la NUEVA contraseña de `root`.
