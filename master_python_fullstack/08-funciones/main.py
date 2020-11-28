"""
FUNCIONES:
Una función es un conjunto de instrucciones agrupadas bajo 
un nombre concreto que pueden reutilizarse invocando
a la función tantas veces como sea necesario.

def nombreFuncion(parametros):
    # BLOQUE / CONJUNTO DE INSTRUCCIONES

NombreFuncion(mi_parametro) 
NombreFuncion(mi_parametro)

"""

# Ejemplo 1
print("###### EJEMPLO 1 ######")

# Definir función
def muestraNombres():
    print("Víctor")
    print("Paco")
    print("Juan")
    print("Francisco")
    print("Nestor")
    print("\n")

# Invocar función
muestraNombres()

# Ejemplo 2: Parámetros
print("###### EJEMPLO 2 ######")


def mostrarTuNombre(nombre, edad):
    print(f"Tu nombre es: {nombre}")
    if edad >= 18:
        print("Es mayor de edad")
    else:
        print("Es menor de edad")

# nombre = input("Introduce tu nombre: ")
# edad = int(input("Introduce tu nombre: "))
mostrarTuNombre("carlos", 29)


# Ejemplo 3
print("\n###### EJEMPLO 3 ######")

def tabla(numero):
    print(f"Tabla de multiplicar del número: {numero}")

    for contador in range(0, 11):
        operacion = numero * contador
        print(f"{numero} x {contador} = {operacion}")

# option = int(input("Que tabla decea calcular: "))
tabla(3)

# Ejemplo 4
print("\n###### EJEMPLO 4 ######")

# Parámetros opcionales

def getEmpleado(nombre, dni = None):
    print("EMPLEADO")
    print(f"Nombre: {nombre}")
    
    if dni != None:
        print(f"DNI: {dni}")

getEmpleado("Carlos", 434343)

# Ejemplo 5
print("\n###### EJEMPLO 5 ######")

# Ejemplo 5: return o devolver datos

def saludame(nombre):
    saludo = f"Hola, saludos {nombre}"
    return saludo

print(saludame("Carlos"))

# Ejemplo 6
print("\n###### EJEMPLO 6 ######")

def calculadora(numero1, numero2, basicas = False):

    suma = numero1 + numero2
    resta = numero1 - numero2
    multi = numero1 * numero2
    division = numero1 / numero2

    cadena = ""

    if basicas != False:
        cadena += "Suma: " + str(suma)
        cadena += "\n"
        cadena += "Resta: " + str(resta)
        cadena += "\n"
    else:
        cadena += "Multiplicación: " + str(multi)
        cadena += "\n"
        cadena += "División: " + str(division)
        cadena += "\n"

    return cadena

print(calculadora(10, 5, False))

# Ejemplo 7
print("\n###### EJEMPLO 7 ######")

def getNombre(nombre):
    texto = f"El nombre es: {nombre}"
    return texto

def getApellidos(apellidos):
    texto = f"Los apellidos son: {apellidos}"
    return texto

def devuelveTodo(nombre, apellidos):
    texto = getNombre(nombre) + "\n" + getApellidos(apellidos)
    return texto

print(devuelveTodo("Carlos", "Oliva"))


# Ejemplo 8
print("\n###### EJEMPLO 8 ######")

# Tiene que estar definida en una línea
dime_el_year = lambda year: f"El año es {year}"

print(dime_el_year(2020))