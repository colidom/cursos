# Programación Orientada a Objetos (POO o OOP)

# Definir una clase(Molde para crear más objetos de ese tipo)
class Coche:

    # Atributos o propiedades (variables)
    # Características del coche
    color = "Rojo"
    marca = "Ferrari"
    modelo = "Aventador"
    velocidad = 300
    caballaje = 500
    plaza = 2

    # Métodos son acciones que hace el objeto (coche) (funciones)
    # Setters
    def setColor(self, color):
        self.color = color
    
    def setModelo(self, modelo):
        self.modelo = modelo
    
    def getModelo(self):
        return self.modelo

    def acelerar(self):
        self.velocidad += 1

    def frenar(self):
        self.velocidad -= 1    

    # Getters
    def getVelocidad(self):
        return self.velocidad

    def getColor(self):
        return self.color
    

# fin definición clase

# Crear objeto / Instanciar la clase
coche = Coche()

coche.setColor("Amarillo")
coche.setModelo("Murcielago")

coche.acelerar()
coche.acelerar()
coche.acelerar()
coche.acelerar()
coche.frenar()

print("COCHE 1:")
print(coche.marca, coche.getModelo(), coche.getColor())
print("Velocidad nueva: ", coche.getVelocidad())
print("--------------------------")

# Crear más objetos
coche2 = Coche()

coche2.setColor("Verde")
coche2.setModelo("Gallardo")

print("COCHE 2:")
print(coche2.marca, coche2.getModelo(), coche2.getColor())
print(type(coche2))
