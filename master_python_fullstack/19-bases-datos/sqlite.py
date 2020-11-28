# importar módulo
import sqlite3

# Conexión
conexion = sqlite3.connect('pruebas.db')

# Crear cursos
cursor = conexion.cursor()


# Crear tabla
cursor.execute("""
CREATE TABLE IF NOT EXISTS productos(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo VARCHAR(255),
    descripcion TEXT,
    precio int(255)
);
""")

# Guardar cambios
conexion.commit()

# Insertar datos
"""
cursor.execute("INSERT INTO productos VALUES (null, 'Segundo producto', 'Descripción de mi producto', 550)")
conexion.commit()
"""

# Borrar registros
"""
cursor.execute("DELETE FROM productos;")
conexion.commit()
"""
# Insertar muchos registros de golpe
productos = [
    ("Ordenador portátil", "Buen PC", 700),
    ("Teléfono móvil", "Buen Teléfono", 140),
    ("Placa base", "Buena Placa", 80),
    ("Tablet 15", "Buena Tablet", 300)
]
cursor.executemany("INSERT INTO productos VALUES (null,?,?,?)", productos)
conexion.commit()

# Update
cursor.execute("UPDATE productos SET precio=678 WHERE precio=80")
# Listar datos
cursor.execute("SELECT * FROM productos WHERE precio >= 300;")
productos = cursor.fetchall()

for producto in productos:
    print(f"ID: {producto[0]}")
    print(f"Título: {producto[1]}")
    print(f"Descripción: {producto[2]}")
    print(f"Precio: {producto[3]}")
    print("\n")

cursor.execute("SELECT titulo FROM productos;")
producto = cursor.fetchone()
print(producto)

# Cerrar conexión
conexion.close()
