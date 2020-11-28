from tkinter import *

ventana = Tk()
ventana.geometry("700x500")

texto = Label(ventana, text="Bienvenido a mi programa")
texto.config(
    fg="white",
    bg="black",
    padx="200",
    pady="20",
    font=("Consolas", 30),
            )
texto.pack()

texto = Label(ventana, text="Soy Carlos Oliva")
texto.config(
    width=15,
    height=3,
    bg="orange",
    padx=10,
    pady=20,
    cursor="circle"
    
)
texto.pack(anchor=E)

def pruebas(nombre, apellidos, pais):
    return f"Hola {nombre} {apellidos} veo que eres de {pais}"


texto = Label(ventana, text=pruebas(pais="España", apellidos="Oliva", nombre="Carlos"))
texto.config(
    width=15,
    height=3,
    bg="green",
    padx=10,
    pady=20,
    cursor="spider"
    
)
texto.pack(anchor=E)

ventana.mainloop()
