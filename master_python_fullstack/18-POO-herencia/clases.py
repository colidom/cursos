# Herencia es la posibilidad de compartir atributos y métodos
# entre clases y que diferentes clases hereden de otras

class Persona: # Clase padre (Molde para crear personas genéricas)
    """
    nombre
    apellidos
    altura
    edad
    """
    # Getters
    def getNombre(self):
        return self.nombre

    def getApellidos(self):
        return self.apellidos
    
    def getAltura(self):
        return self.altura
    
    def getEdad(self):
        return self.edad
        
        
    # Setters
    def setNombre(self, nombre):
        self.nombre = nombre
    
    def setApellidos(self, apellidos):
        self.apellidos = apellidos
    
    def setAltura(self, altura):
        self.altura = altura
    
    def setEdad(self, edad):
        self.edad = edad
    
    def hablar(self):
        return "Estoy hablando"

    def caminar(self):
        return "Estoy caminando"
    
    def dormir(self):
        return "Estoy durmiendo"


class Informatico(Persona):
    """
    lenguajes
    experiencia
    """
    def __init__(self): # Constructor exclusivo de la clase Informático, no se ejecuta en las clases hijo.
        self.lenguajes = "HTML, CSS, JavaScript, PHP"
        self.experiencia = 5
    
    def getLenguajes(self):
        return self.lenguajes
    
    def aprender(self, lenguajes):
        self.lenguajes = lenguajes
        return self.lenguajes
    
    def programar(self):
        return "Estoy programando"
    
    def repararPC(self):
        return "He reparado tu ordenador"

class TecnicoRedes(Informatico):

    def __init__(self):
        super().__init__() # Llamamos al método __init__ de la clase padre(Informatico) para cargar los datos del constructor
        self.auditarRedes = 'experto'
        self.experienciaRedes = 15
    
    def auditoria(self):
        return "Estoy auditando una red"
