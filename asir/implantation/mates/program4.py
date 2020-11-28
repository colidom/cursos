import sys
from math import pi

radio = float(sys.argv[1])

print("Usted ha elegido un radio de ", radio, "cm")
print("Elija una opción:")
print("(1)-Calcular el Diámetro...")
print("(2)-Calcular el Perímetro...")
print("(3)-Calcular el Área...")

opcion = int(input("Elija la opción que desee:"))

diametro = 2 * radio
perimetro = 2 * pi * radio
area = pi * (radio ** 2)

if opcion == 1:
    print("Diámetro:", diametro)
elif opcion == 2:
    print("Perímetro:", perimetro)
elif opcion == 3:
    print("Área:", area)
