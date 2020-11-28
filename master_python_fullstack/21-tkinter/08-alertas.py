from tkinter import *
from tkinter import messagebox as Messagebox

ventana = Tk()
ventana.geometry("700x700")
ventana.config(
    bd=70
)
ventana.title("Alertas en Tkinter | Carlos Oliva")

def sacarAlerta():
    Messagebox.showinfo("Alerta", "Hola soy CARLOS OLIVA")

Button(ventana, text="Mostrar alerta!!!", command=sacarAlerta).pack()


def salir(nombre):
    resultado = Messagebox.askquestion("Salir", "¿Quieres continuar ejecutando la aplicación?")
    
    if resultado != "yes":
        Messagebox.showinfo("Chao!!", f"Adios {nombre}")
        ventana.destroy()

Button(ventana, text="Salir!!!", command=lambda: salir("Carlos Oliva")).pack()

ventana.mainloop()