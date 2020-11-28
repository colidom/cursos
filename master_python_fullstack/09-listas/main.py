"""
LISTAS (arrays)
Son colecciones de datos/valores, bajo un unico nombre.
Para acceder a esos valores podemos usar un índice numérico.
"""

pelicula = "Batman"
# Deninir lista
peliculas = ["Batman", "Spiderman", "El señor de los anillos"]
cantantes = list(('2pac', 'Drake', 'Jennifer López'))   # Doble paréntesis(tupla) para 
                                                        # añadir varios valores a la función list
years = list(range(2020, 2050))
variada = ['Victor', 30, 4.4, True, "Texto"]

# print(peliculas)
# print(cantantes)
# print(years)
# print(variada)


# Indices
pelicula = "Otra cosa" # Modifica el valor de la variable
peliculas[1] = "Gran Torino" # Modifica elementos de la lista(array) existente accediendo al indice
print(peliculas[1])
print(peliculas[-2])
print(cantantes[0:2])
print(peliculas[1:])


# Añadir elementos a lista
cantantes.append("Kase o")
print(cantantes)

# Recorrer lista 
"""
nueva_pelicula = ""
while nueva_pelicula != "parar":
    nueva_pelicula = input("Introduce la nueva película: ")
    
    if nueva_pelicula != "parar":
        peliculas.append(nueva_pelicula)

print("\n******** LISTADO PELÍCULAS ********")
for pelicula in peliculas:
    print(f"{peliculas.index(pelicula)+1}. {pelicula}")

"""
# Listas multidimensionales
print("\n********* Listado de contactos ********")
contactos = [
    [
        'Luis Guerra',
        'luisguerra@gmail.com'
    ],
    [   'Armando Guerra',
        'armandoguerra@gmail.com'
    ],
    [
       'Salvador',
       'salvador@gmail.com'
    ]
]

for contacto in contactos:
    for elemento in contacto:
        if contacto.index(elemento) == 0:
            print("Nombre: " + elemento)
        else:
            print("Email: " + elemento)
    print("\n")
# print(contactos[1][1])
