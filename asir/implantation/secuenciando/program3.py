import sys

k = int(sys.argv[1])
cadena = sys.argv[2]

if k < 0:
    print("Error, el número introducido es negativo")
cadenalista = cadena.split()
x = 0
for palabra in cadenalista:
    if len(palabra) == k:
        x += 1
print(f"Hay {x} palabras de tamaño {k}")
