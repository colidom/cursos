Oscar Moreira

Carlos Oliva

# 1. Instalación y configuración de un Seridor Multimedia - Smooth Streaming

![portada1](./img/portada1.jpg)

___

## 1.1 Paso a Paso

- Lo primero que haremos será descargar *** IIS Media Service*** que será nuestro soporte de streaming para el Servidor Web IIS.

- Para descargarlo iremos a este [enlace](http://www.microsoft.com/es-es/download/details.aspx?id=27955) y lo instalamos con las opciones por defecto.

  ![1](./img/1.png)

  ![2](./img/2.png)

- Ahora comprobamos que en la herramienta de IIS tendremos el apartado de Servicio multimedia.

  ![3](./img/3.png)

- Hecho esto descargamos unos ejemplo de multimedia para su emisión en streaming.

  ![5](./img/5.png)

  ![8](./img/8.png)

- Luego de esto creamos un dominio nuevo por cada fichero multimedia en neustro caso creamos 2.

  ![4](./img/4.png)

- Hecho los dominios pasaremos a crear el sitio web en *IIS*.

  ![9](./img/9.png.png)
  ![10](./img/10.png)

- A cada sitio les indicamos cual será su ruta de acceso física. Esta será la ruta directa a la carpeta del video.

  ![11](./img/11.png)

  ![12](./img/12.png)

- Ahora descargamos y descomprimimos el cliente de reproducción *SmoothMediaPlayer*.

- Luego al descomprimirlo nos saldrán estos dicheros.

  ![14](./img/14.png)

- Ahora el fichero comprimido lo descomprimimos en la carpeta de cada video.

  ![15](./img/15.png)

  ![16](./img/16.png)

- Luego al *html* lo llamamos *index.html* en cada carpeta.

  ![17](./img/17.png)

- Dentro del fichero le indicamos la ruta al video.

  ![18](./img/18.png)

- Entramos en un navegador en la ruta del dominio creado y comenzamos a instalar el Silverlight.

  ![19](./img/19.png)

  ![20](./img/20.png)

### Comprobación

- Ahora comprobamos que ha funcionado tanto en el cliente como en el servidor desde un navegador.

  - Desde Servidor.

    ![22](./img/22.png)

    ![23](./img/23.png)

  - Desde Cliente.

    ![24](./img/24.png)

    ![25](./img/25.png)

## Presentaciones de Transmisión por secuencia.

![26](./img/26.png)

![27](./img/27.png)

___
___

# 2. Instalación y configuración de un Servidor Multimedia-Codificación de contenidos propios.

- Lo primero que haremos será descargar e instalar *Microsoft Expression Encoder*.

  ![28](./img/28.png)

  ![29](./img/29.png)

- Para que funcione bien debemosactivar la característica en el servidor de *experiencia de Escritorio*.

  ![30](./img/30.png)

- Creamos un nuevo dominio llamado *playlist.streaming.com*

  ![36](./img/36.png)

- Ahora pasamos a crear el sitio web indicando la ruta a la carpeta donde se encontrarán los archivos.

  ![31](./img/31.png)

- En el sitio en el documento predeterminado pondremos el *default.html* primero.

  ![37](./img/37.png)

- Hecho esto pasamos a crear un nuevo proyecto en *microsoft experiencia Encoder* y elegimos *proyecto Silverlight*.

  ![32](./img/32.png)

- Ahora dentro del proyecto metemos el video que queremos codificar y lo codificamos.

  ![33](./img/33.png)

  ![34](./img/34.png)

- El video debe ser exportado a la misma carpeta de la ruta indicada.

  ![35](./img/35.png)

Ahora comprobamos que funciona entrando en un navegador en el dominio indicado.

  ![38](./img/38.png)

___
___

Fín de la práctica
