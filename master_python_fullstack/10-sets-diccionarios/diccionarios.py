"""
Diccionario;
Es u ntipo de dato que almacena un conjunto de datos.
En formato clave > valor.
Es parecido a un array asociativo o un objeto json.

"""
persona = {
    "nombre": "Carlos",
    "apellidos": "Oliva",
    "web": "colidom.pythonanywhere.com"
}
print(type(persona))
print(persona["web"])

# Lista con diccionarios

contactos = [
    {
        'nombre': 'Carlos',
        'email': 'carlos.oliva.dom@gmail.com'
    },
    {
        'nombre': 'Luis',
        'email': 'luis@gmail.com'
    },
        {
        'nombre': 'Salvador',
        'email': 'salvador@gmail.com'
    },
]
contactos[1]['nombre'] = "Luisito"
print(contactos[1]['nombre'])

print("\nListado de contactos")

for contacto in contactos:
    print(f"Nombre del contacto: {contacto['nombre']}")
    print(f"Email del contacto: {contacto['email']}")
    print("--------------------------------------")


