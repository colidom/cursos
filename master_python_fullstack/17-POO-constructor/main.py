from coche import Coche


carro  = Coche("Amarillo", "Renault", "Clio", 150, 200, 4)
carro1 = Coche("Verde", "Seat", "Panda", 240, 200, 4)
carro2 = Coche("Azul", "Citroen", "Xara", 100, 180, 4)
carro3 = Coche("Rojo", "Mercedes", "Clase A", 350, 400, 4)

print(carro.getInfo())
print(carro1.getInfo())
print(carro2.getInfo())
print(carro3.getInfo())

# Detecrar tipado
if type(carro3) == Coche:
    print("Es un objeto correcto!!")
else:
    print("No es un objeto!!")

# Visibilidad
print(carro.soy_publico)
print(carro.getPrivado()) # Se ha de definir dentro de un método para acceder al mismo desde fuera de la clase
