# Servidor de Impresión en Windows
Carlos Javier Oliva Domínguez

---

Necesitaremos 2 MV:
- 1 Windows Server
- 1 Windows cliente

## 1. Impresora compartida
---

### 1.1 Rol impresión
~~~
Iremos al servidor:
~~~
Instalamos rol de servidor de impresión e incluiremos impresión por Internet.

![image](./img/1_role.png)

### 1.2 Instalar impresora PDF
Vamos a conectar e instalar localmente una impresora al servidor Windows Server 2012, de modo que esté disponible para ser accedida por los clientes del dominio.

Descargaremos `PDFCreator` en su versión FREE y lo  instalamos.

![image](./img/2_download.png)

En `PDFCreator`, configuramos en perfiles -> Guardar -> Automático. Ahí también configuraremos  la carpeta destino donde se guardarán nuestros archivos .pdf.

RUTA: `"C:\users\Administrator\Documents\PDF Architect"`

![image](./img/3_save.png)

### 1.3 Probar la impresora en local
Ahora vamos a imprimir un archivo desde local y para ello primeramente vamos a crear dicho archivo primeramente, para ello usamos el Bloc de notas x ejemplo.

![image](./img/4_imprimir.png)

Tras intentar imprimir el documento .txt anterior se nos abrirá automáticamente el archivo que hemos impreso pero convertido a .PDF.

![image](./img/6_imprimir.png)

Iremos a la ruta que hemos pre establecido en `PDFCreator` y veremos que el archivo se encuentra allí.

![image](./img/5_imprimir_folder.png)

### 1.4 Compartir por red
~~~
Nos dirigimos al servidor:
~~~

`Botón derecho -> Propiedades -> Compartir`

Como nombre del recurso compartido utilizaremos PDFoliva06.

![image](./img/7_share.png)

~~~
Vamos al cliente:
~~~

Buscar recursos de red del servidor, para ello pondremos la ip del Servidor en la barra de navegación.

Seleccionamos la impresora y hacemos clic en el  `botón derecho -> conectar`. Introducimos el usuario y la clave del Windows Server.

![image](./img/8_printer_client.png)

Ya tenemos la impresora remota configurada en el cliente.

Ahora probaremos a imprimir remotamente desde el cliente.

Primeramente vamos a generar un documento .txt con contenido para imprimir.

![image](./img/9_print_from_client.png)

Haremos clic en la opción imprimir y elegiremos la impresora configurada en nuestro Servidor.

![image](./img/10_print_server_ip.png)

Tras lo anterior, si vamos al Servidor de impresión, veremos que se nos ha abierto el archivo que hemos mandado a imprimir desde el Cliente, pero ya convertido en .PDF.

También veremos que se ha guardado en la ruta por defecto.

![image](./img/11_on_server.png)

### 2. Acceso Web
*En este apartado realizaremos una configuración para habilitar el acceso web a las impresoras del dominio.*

### 2.1 Característica impresión WEB
~~~
Vamos al servidor.
~~~
Vamos a usar la `Impresión de Internet` que instalamos al principio.

![image](./img/1_role_internet.png)

### 2.1 Configurar impresión WEB
~~~
Vamos al cliente.
~~~
Abrimos un navegador Web y ponemos la URL http://172.18.6.31/printers para que aparezca en nuestro navegador un entorno que permite gestionar las impresoras de dicho equipo, previa autenticación como uno de los usuarios habilitados para dicho fin como por ejemplo el "Administrador".

![image](./img/12_http_client.png)

Tras acceder y elegir la impresora, vemos una especie de "panel de control" donde vemos distintas opciones como por ejemplo la URL de ésta, que usaremos para añadirla permanentemente al Cliente.

![image](./img/13_webprinter.png)

Agregamos la impresora en el cliente utilizando la URL, como se muestra en la siguiente pantalla:

![image](./img/14_addprinter_client.png)

Comprobaremos que se ha añadido correctamente.

![image](./img/15_printer_installed.png)

### 2.3 Comprobar desde el navegador

Vamos a realizar seguidamente una prueba sencilla en nuestra impresora de red:

![image](./img/16_printer_pannel.png)

A través del navegador pausaremos todos los trabajos en la impresora.

![image](./img/16_printer_paused.png)

Desde el cliente, enviaremos a imprimir un documento del Bloc de notas en nuestra impresora compartida.

![image](./img/17_imprimir.png)

Podremos ver que el Servidor de impresión se encuentra actualemnte en pausa y con un archivo pendiente de impresión.

![image](./img/18_pendiente.png)

Finalmente pulsaremos en reanudar para que el archivo que el documento que mandamos a imprimir se convierta a PDF.

![image](./img/19_reanudar.png)

Comprobaremos nuevamente en el Servidor, que se ha convertido a .PDF el archivo en cuestión y que se encuentra en la ruta pre establecida.

![image](./img/20_to_pdf.png)

Fin de la práctica.
