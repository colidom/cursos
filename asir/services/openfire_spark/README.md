Óscar Moreira Estévez

Carlos Oliva
___

# Servidor de Mensajería Instantánea Windows Server

![portada](./img/portada.png)

___
___

## 1 Requisitos

Para poder comenzar hacer la práctica necesitaremos tener instalado en el servidor:

  - IIS
  - PHP
  - MySQL
  - phpMyAdmin

## 2. Openfire

- Lo primero que haremos será descargar el servidor de mensajería instantánea *OpenFire* desde este [enlace](https://www.igniterealtime.org/downloads/index.jsp#openfire).

- Descargamos el de 64 bits con *bundledJRE*.

  ![1](./img/1.png)

### 2.1 Instalación

- Ahora pasamos a la instalación siguiendo los siguientes pasos como las imágenes:

  ![2](./img/2.png)

  ![3](./img/3.png)

  ![4](./img/4.png)

  ![5](./img/5.png)

  ![6](./img/6.png)

  ![7](./img/7.png)

- Una vez instalado iremos crearemos una base de datos nueva con *phpMyAdmin*.

  ![10](./img/10.png)

### 2.2 Base de Datos

- Creada la base de datos pasamos a entrar en el navegador en la ruta: http://127.0.0.1:9090, en la que comenzaremos la configuración.

  ![8](./img/8.png)

  ![9](./img/9.png)

  ![11](./img/11.png)

  ![12](./img/12.png)

### 2.3 Configuración OpenFire

- En este paso de la instalación deberemos poner la ruta de enlace hacia la base de datos como vemos en la imagen.

  ![13](./img/13.png)

  ![14](./img/14.png)

  ![15](./img/15.png)

- Una vez completada la configuración nos conectaremos e ingresaremos con el usuario admin y contraseña admin.

  ![16](./img/16.png)

- Vemos que ya estamnos dentro.

  ![17](./img/17.png)

___
___

## 3. Spark

- Lo primero será descargar el cliente de mensajería llamado *Spark* desde este [enlace](https://www.igniterealtime.org/downloads/index.jsp#openfire)

  ![18](./img/18.png)

- Luego lo ejecutamos el instaldor y lo instalamos con las opciones por defecto.

  ![19](./img/19.png)

- Una vez instalado abrimos el cliente y nos saldrá algo así.

  ![20](./img/20.png)

- Ahora iremos a la opción de `avanzado` y activaremos las dos siguientes opciones.

  ![22](./img/22.png)

- Hecho esto ya podremos entrar con nuestro usuario.

  ![21](./img/21.png)

- Veremos que entramos

### 3.2 Creación de usuarios

- Iremos a *OpenFire* y crearemos dos usaurios en nuestro caso Oscar y Carlos.

  ![23](./img/23.png)

  ![24](./img/24.png)

- Verificamos que estan creados.

  ![25](./img/25.png)

## 4. Prueba de Conversación Online.

- Ahora lo que haremos será abrir el cliente *Spark* tanto en el servidor como en el cliente y mantendremos una conversación entre los dos usuarios creados.

- Mensajes:

  - Mensaje de Oscar a Carlos responde:

    ![26](./img/26.png)

    ![30](./img/30.png)

  - Mensaje de Carlos a Oscar

    ![27](./img/27.pnf)

- Cuarto de conferencias:

  - Aquí vemos como Oscar invita a Carlos a que se una al cuarto de conferencias.

    ![28](./img/28.png)

    ![29](./img/29.png)

- Transferencia de archivos:

  - En este apartado vemos que Oscar le envía un fichero a Carlos.

    ![31](./img/31.png)

- Capturas de pantalla:

  - Vemos que Carlso recibe una captura de pantalla de Oscar

    ![33](./img/33.png)

    ![32](./img/32.png)

  - Aquí vemos como Varlos lo abre.

    ![34](./img/34.png)

___
___

## 5. SparkWeb

- Para instalar el *SparkWeb* iremos a este [enlace](https://www.igniterealtime.org/downloads/index.jsp#openfire) al final del todo y lo descargamos.

  ![35](./img/35.png)

- Tendremos una carpeta llamada sparkweb.

  ![36](./img/36.png)

- Crearemos un alias nuevo para nuestro sitio.

  ![37](./img/37.png)

- Tambien añadiremos un sitio nuevo de IIS y añadir el fichero que contiene la carpeta.

- Pot último entraremos al sitio creado.

  ![38](./img/38.png)

  ![39](./img/39.png)

> Hemos tenido un error toda la clase incluido el profesor de que no nos logeaba.

___
___

Fín de la práctica.
