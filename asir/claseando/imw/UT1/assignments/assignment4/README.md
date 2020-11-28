# UT1-A4: Sirviendo aplicaciones Php y Python

La actividad consiste en configurar 4 sitios web (*virtual hosts*) en nuestro servidor web *Nginx*, con las siguientes características.

## Sitio web 1

- `http://php.imwpto.me`
- Mostrar la aplicación [demo_php.zip](demo_php.zip)

## Sitio web 2

- `http://now.imwpto.me`
- El código del programa *python* es el siguiente:

```python
import datetime
import pytz
from flask import Flask
app = Flask(__name__)

@app.route("/")
def hello():
    now = datetime.datetime.now(pytz.timezone("Atlantic/Canary"))
    return """
    <h1>Testing Python over Nginx</h1>
    <h2>In Canary Islands...</h2>
    Today is: {today}
    <br>
    Now is: {now}
    """.format(
        today=now.strftime("%d/%m/%Y"),
        now=now.strftime("%H:%Mh")
    )
```


- En el entorno virtual hay que instalar, al menos, los paquetes `uwsgi`, `flask` y `pytz`.
- El código debe residir en `$HOME/now`.
- Se debe configurar *supervisor* para gestionar el proceso *uwsgi*.
- Se debe probar los siguientes comandos, y ver cómo es la respuesta del navegador al acceder a la web:
```console
$ supervisorctl status
$ supervisorctl start now
$ supervisorctl stop now
$ supervisorctl restart now
```

## Información a entregar

Se deberá entregar la *url* al commit en el repositorio privado *GitHub* de la asignatura *IMW*, apuntando al `README.md` que contiene un informe detallado de la actividad, donde expliques lo que has hecho, justificando tus decisiones. La *url* debe tener la siguiente estructura:

```
https://github.com/<usuario>/imw/blob/<id del commit>/<ut>/<actividad>/README.md
```

> ⚠️ Al subir la *url*, es importante crear un enlace. Es decir, poner un `href` a la *url* anterior, y no pegar el texto tal cual.
