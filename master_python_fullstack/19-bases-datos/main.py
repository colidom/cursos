import mysql.connector

#Conexión
database = mysql.connector.connect(
    host = 'localhost',
    user = 'root',
    passwd = '',
    database = 'master_python'
)

# ¿La conexión ha sido correcta?
# print(database)

# Cursor que nos permite crear las consultas
cursor = database.cursor(buffered=True)

#Crear base de datos
cursor.execute("CREATE DATABASE IF NOT EXISTS master_python")
"""
cursor.execute("SHOW DATABASES")

for bd in cursor:
    print(bd)
"""

# Crear tablas
cursor.execute("""
CREATE TABLE IF NOT EXISTS vehiculos(
    id int(10) auto_increment not null,
    marca varchar(40) not null,
    modelo varchar(40) not null,
    precio float(10,2) not null,
    CONSTRAINT pk_vehiculo PRIMARY KEY(id)
)
""")

# Mostrar las tablas de nuestra bd
"""
cursor.execute("SHOW TABLES")
for table in cursor:
    print(table)
"""
# cursor.execute("INSERT INTO vehiculos VALUES(null, 'Opel', 'Astra', 18500)")
coches = [
    ('Seat', 'Ibiza', 5000),
    ('Renault', 'Clio', 15000),
    ('Citroen', 'Saxo', 2000),
    ('Mercedes', 'Clase C', 35000),
]    

# Introducir datos masivos
# cursor.executemany("INSERT INTO vehiculos VALUES(null, %s, %s, %s)", coches)
database.commit()

cursor.execute("SELECT * FROM vehiculos WHERE precio <= 5000 and marca = 'Seat'")
result = cursor.fetchall()
print("---- Todos mis coches ----")
for coche in result:
    print(coche[0], coche[2], coche[3])

cursor.execute("SELECT * FROM vehiculos")
coche = cursor.fetchone()
print(coche)

# Eliminar datos de la tabla
cursor.execute("DELETE FROM vehiculos WHERE marca = 'Mercedes' ")
database.commit()

print(cursor.rowcount, "borrados!!")

# Actualizar datos de la tabla
cursor.execute("UPDATE vehiculos SET modelo = 'León' WHERE marca = 'Seat' ")
database.commit()
print(cursor.rowcount, "actualizados!!")
