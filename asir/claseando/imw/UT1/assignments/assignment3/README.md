# UT1-A3: Trabajo con *virtual hosts*

La actividad consiste en configurar 4 sitios web (*virtual hosts*) en nuestro servidor web *Nginx*.

## Sitio web 1

- `http://imw.aluXXXX.me`
    - Debe mostrar una página con la imagen de "Diagrama de unidades de trabajo" de *IMW* (ver *moodle* de la asignatura).
    - La imagen no debe ser enlazada en remoto, sino se debe descargar al directorio de trabajo en la máquina de producción, y luego usar un tag `<img>` apuntando a la ruta local.
- `http://imw.aluXXXX.me/mec/`
    - Debe mostrar una página con un enlace al Real decreto del título de Administración de Sistemas Informáticos en Red - MEC (ver *moodle* de la asignatura).

## Sitio web 2

- `http://varlib.aluXXXX.me:9000`
- Debe mostrar el listado de ficheros y directorios de `/var/lib` de la máquina de producción.

## Sitio web 3

- `https://ssl.aluXXX.me/students/` (ojo, es *https!*)
- Debe pedir usuario/clave. Los datos son:
    - USUARIO: `usuario1`
    - CLAVE: `aula108`
- Debe mostrar una página web con el nombre de todo el alumnado de clase.
- Se debe prohibir explícitamente el acceso al fichero `.htpasswd`

## Sitio web 4

- `http://redirect.aluXXXX.me`
- Se debe redirigir cualquier petición de este dominio a `http://target.aluXXXX.me`
    + `http://redirect.aluXXXX.me/test/` -> `http://target.aluXXXX.me`
    + `http://www.redirect.aluXXXX.me/probando/` -> `http://target.aluXXXX.me`
    + `http://www.redirect.aluXXXX.me/hola/` -> `http://target.aluXXXX.me`  
    ...
- Al acceder a `http://target.aluXXXX.me` se debe mostrar la página web siguiente [initializr-verekia-4.0.zip](initializr-verekia-4.0.zip).
    + Para copiar y descomprimir el fichero `initializr.zip` se recomienda usar alguna de las siguientes herramientas: `curl`, `wget`, `scp`, `unzip`.

- Los *logfiles* deben ser:
    + `/var/log/nginx/redirect/access.log`
    + `/var/log/nginx/redirect/error.log`

## Información a entregar

Se deberá entregar la *url* al commit en el repositorio privado *GitHub* de la asignatura *IMW*, apuntando al `README.md` que contiene un informe detallado de la actividad, donde expliques lo que has hecho, justificando tus decisiones. La *url* debe tener la siguiente estructura:

```
https://github.com/<usuario>/imw/blob/<id del commit>/<ut>/<actividad>/README.md
```

> ⚠️ Al subir la *url*, es importante crear un enlace. Es decir, poner un `href` a la *url* anterior, y no pegar el texto tal cual.
