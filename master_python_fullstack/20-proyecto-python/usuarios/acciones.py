import usuarios.usuario as modelo
import notas.acciones

class Acciones:

    def registro(self):
            print("\nOK!!! Vamos a registrate en el sistema...")
            
            nombre = input("¿Cual es tu nombre?: ")
            apellidos = input("¿Cuales son tus apellidos?: ")
            email = input("¿Cual es tu email?: ")
            password = input("¿Cual es tu contraseña?: ")
    
            usuario = modelo.Usuario(nombre, apellidos, email, password)
            registro = usuario.registrar()

            if registro[0] >= 1:
                print(f"\nPerfecto{registro[1].nombre} te has registrado con el email {registro[1].email}")
            else:
                print("\nNo te has registrado correectamente !!!")


    def login(self):
        print("Vale!!! Identifícate en el sistema...")
        
        try:
            email = input("¿Cual es tu email?: ")
            password = input("¿Cual es tu contraseña?: ")

            usuario = modelo.Usuario('','', email, password)
            login = usuario.identificar()

        
            if email == login[3]:
                print(f"\nBienvenido {login[1]}, te has registrado en el sistema {login[5]}.")
                self.proximasAcciones(login)
                
        except Exception: # as identifier:
            # print(type(identifier))
            # print(type(identifier).__name__)
            # print(identifier)
            print(f"Login incorrecto!!! Inténtalo más tarde")
        

    def proximasAcciones(self, usuario):
        print("""
        Acciones disponibles: 
        1- Crear nota (crear)
        2- Mostrar tus notas (mostrar)
        3- Eliminar nota (eliminar)
        4- Salir (salir)
        """)

        accion = input("¿Que quieres hacer?: ")
        hazEl = notas.acciones.Acciones()


        if accion == "crear" or accion == "1":
            hazEl.crear(usuario)
            self.proximasAcciones(usuario)

        elif accion == "mostrar" or accion == "2":
            hazEl.mostrar(usuario)
            self.proximasAcciones(usuario)

        elif accion == "eliminar" or accion == "3":
            hazEl.borrar(usuario)
            self.proximasAcciones(usuario)

        elif accion == "salir" or accion == "4":
            print(f"OK {usuario[1]}, hasta pronto!!!")
            exit()
