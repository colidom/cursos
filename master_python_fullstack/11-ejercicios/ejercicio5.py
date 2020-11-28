"""
Ejercicio 5. Crear una lista con el contenido de esta tabla:
ACCION      AVENTURA            DEPORTES
GTA         ASSASINS            FIFA 21
COD         CRASH               PRO 21
PUGB        PRINCE OF PERCIA    MOTO GP 21
Mostrar esta información ordenada
"""
tabla = [
    {
        "categoria": "ACCIÓN",
        "juegos": ["GTA", "Call of Dutty", "PUGB"]
    },
    {
        "categoria": "AVENTURA",
        "juegos": ["ASSASINS", "Crash Bandicoot", "Prince of Percia"]
    },
    {
        "categoria": "DEPORTES",
        "juegos": ["FIFA 21", "PES 21", "MOTO GP 21"]
    },

]

for categoria in tabla:
    print(f"------------{categoria['categoria']}--------------")
    for juego in categoria['juegos']:
        print(juego)
        