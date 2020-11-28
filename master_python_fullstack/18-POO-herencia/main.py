import clases

persona = clases.Persona()

persona.setNombre("Carlos")
persona.setApellidos("Oliva")
persona.setAltura("180cm")
persona.setEdad("800 años")

print(f"La persona es: {persona.getNombre()} {persona.getApellidos()}")
print(persona.hablar())
print("-----------------------------------")

informatico = clases.Informatico()
informatico.setNombre("Carlos Javier")
informatico.setApellidos("Oliva")
print(f"El informático es: {informatico.getNombre()} {informatico.getApellidos()}")
print(informatico.getLenguajes()) # Propiedad propia de la clase Informático
print(informatico.caminar()) # Propiedad heredada de la clase PADRE (Persona)
print(informatico.experiencia)

print("-----------------------------------")

tecnico = clases.TecnicoRedes()
tecnico.setNombre("Manolo")
print(tecnico.auditarRedes, tecnico.getNombre(), tecnico.lenguajes)
