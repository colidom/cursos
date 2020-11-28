# UT5-A2: Plugins de Wordpress

Esta actividad se desarrollará en grupos de 2 personas:

- **Grupo1**: Jhuanys y Jonay.
- **Grupo2**: Javier y Bruno.
- **Grupo3**: Jesús y Alejandra.
- **Grupo4**: Nieves y José David.
- **Grupo5**: Alexis y Daniel Pérez.
- **Grupo6**: Raúl y Airam.
- **Grupo7**: Adrián y Aitor.
- **Grupo8**: Daniel Barreto y Eduardo.

La actividad consiste en:

- Visitar la página https://www.ciudadano2cero.com/mejores-plugins-wordpress/
- Hacer un análisis de 7 plugins pertenecientes al grupo que les ha tocado.
    + Descripción.
    + Facilidad de instalación/activación (1 a 5).
    + Facilidad de uso (1 a 5).
    + Utilidad (1 a 5).
    + Tipo de páginas en las que sería útil.
    + Widgets asociados.
    + Requerimientos/Dependencias.
- Instalar y probar los plugins elegidos.
- Hacer una presentación explicando el análisis, la instalación y una demostración en vivo de uso de cada plugin.

## Ficheros a entregar

No habrá que entregar ningún fichero. La valoración de la actividad se hará en función de la presentación hecha en clase.

## Orden de presentación

Con este pequeño trozo de código *Python* podemos realizar el sorteo del orden de presentación de la actividad:

```python
import random

groups = list()
order = 1
while len(groups) < 8:
    g = random.randint(1, 8)
    if g not in groups:
        groups.append(g)
        print(f"Lugar {order} -> Grupo {g}")
        order += 1
```

Resultados:

```
Lugar 1 -> Grupo 3
Lugar 2 -> Grupo 8
Lugar 3 -> Grupo 6
Lugar 4 -> Grupo 4
Lugar 5 -> Grupo 7
Lugar 6 -> Grupo 1
Lugar 7 -> Grupo 2
Lugar 8 -> Grupo 5
```
