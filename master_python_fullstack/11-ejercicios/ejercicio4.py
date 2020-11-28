"""
Ejercicio 4. Crear un script que tenga cuatro variables, 
una lista, un string, un entero y un booleano y que imprima 
un mensaje según el tipo de dato de cada variable. Usar funciones
"""
def traducirTipo(tipo):
    result = None
    if tipo == list:
        result = "LISTA"
    elif tipo == str:
        result = "CADENA DE TEXTO"
    elif tipo == int:
        result = "NUMERO ENTERO"
    elif tipo == bool:
        result = "BOOLEANO"

    return result

def compruebaDatos(dato, tipo):
    test = isinstance(dato, tipo)
    result = ""
    if test:
        result = f"Este dato es del tipo: {traducirTipo(tipo)}"
    else:
        result = "El tipo de dato no es correcto"
    return result


mi_lista = ["hola mundo", 77]
titulo = "Master en Python"
numero = 100
verdadero = True

print(compruebaDatos(mi_lista, list))
print(compruebaDatos(titulo, str))
print(compruebaDatos(numero, int))
print(compruebaDatos(verdadero, bool))
