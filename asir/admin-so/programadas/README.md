## Tareas programadas
Carlos Javier Oliva Domínguez

-----
#### 1. Windows - Tarea diferida.

Vamos a hacer una tarea diferida con Windows. Una tarea diferida se define para ejecutarse una sola vez en una fecha futura.

Para ello iremos a `Panel de control--->Herramientas administrativas`.   
![image](./img/1_herramientas.png)

Ahora abriremos el `Programador de tareas`.    
![image](./img/2_programador.png)

En el panel lateral tenemos el apartado `Acciones`, haremos clic en `Crear tarea básica`.    
![image](./img/3_tarea.png)

Configuraremos el `Nombre` y una `Descripción` para nuestra tarea.    
![image](./img/4_name_tarea.png)

En esta primera parte vamos a elegir que se ejecute solamente una vez.    
![image](./img/5_desencadenar.png)

Configuraremos también la hora en la que queremos que se ejecute la tarea.   
![image](./img/6_hora.png)

Elegiremos por acción `Iniciar un programa`.    
![image](./img/7_start.png)

Por programa, vamos a elejor un archivo txt que he creado en el escritorio. Al ejecutarse la tarea, éste debería abrirse automáticamente.    
![image](./img/8_ruta.png)

Veremos un pequeño resumen de las configuraciones que hemos creado.    
![image](./img/9_resumen.png)

Una vez llegada la hora que configuramos en el `Programador de tareas`, veremos que se ejecuta el txt automáticamente.    
![image](./img/10_check_hora.png)

También podemos ver la tarea finalizada en la biblioteca.    
![image](./img/11_check_tarea.png)

#### 2. Windows - Tarea periódica

La tarea programada se define para ejecutarse periódicamente cada intervalo de tiempo.

Vamos a programar una tarea periódica para apagar el equipo.

El comando para apagar el sistema es `shutdown`.

Primeramente configuraremos el `Nombre` y una `Descripción` para la nueva tarea.    
![image](./img/12_periodica.png)

Elegiremos una ejecución diaria.       
![image](./img/13_diario.png)

También vamos a elegir la fecha y hora que queremos que se inicie la ejecución y cada cuántos días queremos que se repita.     
![image](./img/14_fecha.png)

Elegimos `Iniciar un programa`.    
![image](./img/15_accion.png)

Configuramos `shutdown y en argumentos /s.`.    
![image](./img/16_script.png)

Vemos un pequeño resumen de las consiguraciones.    
![image](./img/17_resume.png)

Llegada la hora indicada, vemos que el equipo se apaga automáticamente.    
![image](./img/18_shutdown.png)

## 3. SO GNU/Linux - Tarea diferida

Primeramente vamos a comprobar que el Servicio `atd` se encuentra en ejecución.    
![image](./img/19_atd_status.png)

Luego comprobaremos que no hay ninguna tarea pendiente mediante el comando `atd`.    
![image](./img/20_check.png)

Comprobamos también los permisos, comprobando que nuestro usuario no tiene acceso denegado.     
![image](./img/21_permisos.png)

Configuraremos un Script, con la siguiente información.    
![image](./img/22_nano.png)

Nuestro directorio debería tener la siguiente estructura.    
![image](./img/23_tree.png)

Ahora vamos a instalar `Zenity`.     
![image](./img/24_install.png)

Vamos a crear una nueva `Tarea diferida`.    
![image](./img/25_at.png)

Comprobaremos que tenemos creada la `Tarea programada`.    
![image](./img/26_check_tarea.png)

Pasado un tiempo veremos la el mensaje que configuramos en el Script, nos aparece en pantalla.    
![image](./img/27_check_result.png)

Miramos que no tenemos ninguna tarea pendiente.    
![image](./img/28_tareas.png)

## 4. GNU/Linux - Tarea periódica
Para las tareas periódicas usaremos el comando crontab.

Primero ejecutaremos `crontab -l` para ver que no hay tareas.    
![image](./img/29_crontab.png)

Ahora vamos a usar el comando `contrab -e` para abrir el editor para la configuración de la nueva tarea.

Vamos a definir una tarea periódica para apagar el pc a una hora en concreto cada cierto tiempo.

Comprobamos el contenido de la orden.    
![image](./img/31_check_tarea.png)

Podremos comprobar que el sistema se ha apagado automáticamnete en la hora que hemos definido.    
![image](./img/32_shutdown.png)

Fín de la práctica.
