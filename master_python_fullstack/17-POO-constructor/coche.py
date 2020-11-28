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

    soy_publico = "Hola, soy un atributo público"
    __soy_privado = "Hola, soy un atributo privado"

    def __init__(self, color, marca, modelo, velocidad, caballaje, plazas):
        self.color = color
        self.marca = marca
        self.modelo = modelo
        self.velocidad = velocidad
        self.caballaje = caballaje
        self.plazas = plazas

    # Métodos son acciones que hace el objeto (coche) (funciones)
    # Setters
    def setColor(self, color):
        self.color = color
    
    def setModelo(self, modelo):
        self.modelo = modelo
    
    def setMarca(self, marca):
        self.marca = marca

    def acelerar(self):
        self.velocidad += 1

    def frenar(self):
        self.velocidad -= 1  

    def getInfo(self):
        info = "---- Información del coche ----"
        info += "\n Color: " + self.getColor()
        info += "\n Marca: " + self.getMarca()
        info += "\n Modelo: " + self.getModelo()
        info += "\n Velocidad: " + str(self.getVelocidad()) + " kms/h"
        return info

    # Getters
    def getPrivado(self):
        return self.__soy_privado
        
    def getVelocidad(self):
        return self.velocidad

    def getColor(self):
        return self.color

    def getModelo(self):
        return self.modelo
    
    def getMarca(self):
        return self.marca

# fin definición clase