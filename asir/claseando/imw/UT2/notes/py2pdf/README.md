# `py2pdf`

Para entregar las prácticas, será necesario subir, tanto los ficheros `.py` comprimidos en un archivo `.zip`, como un documento PDF con el código de los ficheros `.py`. La idea es que permita al profesor hacer anotaciones sobre el PDF y comentar los aciertos/fallos que haya en el código.

## Instalación de dependencias

Para utilizar este script necesitamos tener dos paquetes instalados en el sistema. Para ello, como usuario *root* ejecutamos lo siguiente:

```console
root@hillvalley:~# apt-get install -y vim ghostscript
Leyendo lista de paquetes... Hecho
Creando árbol de dependencias
Leyendo la información de estado... Hecho
vim ya está en su versión más reciente.
ghostscript ya está en su versión más reciente.
fijado ghostscript como instalado manualmente.
Los paquetes indicados a continuación se instalaron de forma automática y ya no son necesarios.
  python-colorama-whl python-distlib-whl python-html5lib-whl python-requests-whl python-setuptools-whl python-six-whl
  python-stevedore python-urllib3-whl virtualenv-clone
Utilice «apt-get autoremove» para eliminarlos.
0 actualizados, 0 nuevos se instalarán, 0 para eliminar y 67 no actualizados.
root@hillvalley:~#
```

## Carpeta `~/bin` en el PATH

Para poder ejecutar el script que vamos a crear, tendremos que crear una carpeta y ponerla en el path:

```console
sdelquin@hillvalley:~$ mkdir bin
sdelquin@hillvalley:~$ vi ~/.bashrc
```

> Contenido:
```bash
...
export PATH=$PATH:.:$HOME/bin
...
```

Ahora "recargamos" nuestro fichero de configuración de *bash* para que los cambios surtan efecto:

```console
sdelquin@hillvalley:~$ source ~/.bashrc
sdelquin@hillvalley:~$
```

## Creación del fichero

```console
sdelquin@hillvalley:~$ cd bin/
sdelquin@hillvalley:~/bin$ wget http://imw.claseando.es/UT2/py2pdf/py2pdf.py
--2016-11-17 08:21:23--  http://imw.claseando.es/UT2/py2pdf/py2pdf.py
Resolviendo imw.claseando.es (imw.claseando.es)... 185.119.175.4
Conectando con imw.claseando.es (imw.claseando.es)[185.119.175.4]:80... conectado.
Petición HTTP enviada, esperando respuesta... 200 OK
Longitud: 953 [application/octet-stream]
Grabando a: “py2pdf.py”

py2pdf.py                  100%[==========================================>]     953  --.-KB/s   en 0s

2016-11-17 08:21:23 (81,7 MB/s) - “py2pdf.py” guardado [953/953]

sdelquin@hillvalley:~/bin$
```

Ahora damos permisos de ejecución al script descargado:

```console
sdelquin@hillvalley:~/bin$ mv py2pdf.py py2pdf
sdelquin@hillvalley:~/bin$ chmod +x py2pdf
sdelquin@hillvalley:~/bin$ ls -l py2pdf
-rwxr-xr-x 1 sdelquin sdelquin 639 oct 27 17:54 py2pdf
sdelquin@hillvalley:~/bin$
```

## Probando nuestro script

Supongamos que tenemos una carpeta con 4 ficheros python, y queremos generar el pdf asociado:

```console
sdelquin@hillvalley:~$ cd imw/practica1/
sdelquin@hillvalley:~/imw/practica1$ ls *.py
programa1.py  programa2.py  programa3.py  programa4.py
sdelquin@hillvalley:~/imw/practica1$ py2pdf
Modo de uso: /home/sdelquin/bin/py2pdf <fichero.pdf>
sdelquin@hillvalley:~/imw/practica1$ py2pdf practica1.pdf
sdelquin@hillvalley:~/imw/practica1$ ls *
practica1.pdf  programa1.py  programa2.py  programa3.py  programa4.py
sdelquin@hillvalley:~/imw/practica1$ file practica1.pdf
practica1.pdf: PDF document, version 1.4
sdelquin@hillvalley:~/imw/practica1$
```

Ya tenemos generado el informe en el fichero `practica1.pdf`. Puedes ver el resultado usando el comando `evince`:

```console
sdelquin@hillvalley:~/imw/practica1$ evince practica1.pdf
```
