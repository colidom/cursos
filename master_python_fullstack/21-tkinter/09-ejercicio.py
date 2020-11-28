"""
CALCULADORA:
- Dos campos de texto
- 4 botones para las operaciones
- Mostrar el resultado en una alerta
"""
from tkinter import *
from tkinter import messagebox

ventana = Tk()
ventana.geometry("500x250")
ventana.title("Ejercicio completo con Tkinter | Carlos Oliva")
ventana.config(
    bd=25
)

def cFloat(numero):
    try:
        result = float(numero)
    except:
        result = 0
        messagebox.showerror("Error", "Introduce bien los datos")
    
    return result

def sumar():
    resultado.set(cFloat(numero1.get()) + cFloat(numero2.get()))
    mostrarResultado()

def restar():
    resultado.set(cFloat(numero1.get()) - cFloat(numero2.get()))
    mostrarResultado()
    
def multiplicar():
    resultado.set(cFloat(numero1.get()) * cFloat(numero2.get()))
    mostrarResultado()

def dividir():
    resultado.set(cFloat(numero1.get()) / cFloat(numero2.get()))
    mostrarResultado()

def mostrarResultado():
    messagebox.showinfo("Resultado", f"El resultado de la operación es: {resultado.get()}")
    numero1.set("")
    numero2.set("")


numero1 = StringVar()
numero2 = StringVar()
resultado = StringVar()

marco = Frame(ventana, width=300, height=250)
marco.config(
    padx=15,
    pady=15,
    bd=5,
    relief=SOLID
)
marco.pack(side=TOP, anchor=CENTER)
marco.pack_propagate(False)

Label(marco, text="Primer número: ").pack()
Entry(marco, textvariable=numero1, justify=CENTER).pack()

Label(marco, text="Segundo número: ").pack()
Entry(marco, textvariable=numero2, justify=CENTER).pack()

# Separador
Label(marco, text="").pack()

Button(marco, text="Sumar", command=sumar).pack(side="left", fill=X, expand=YES)
Button(marco, text="Restar", command=restar).pack(side="left", fill=X, expand=YES)
Button(marco, text="Multiplicar", command=multiplicar).pack(side="left", fill=X, expand=YES)
Button(marco, text="Dividir", command=dividir).pack(side="left", fill=X, expand=YES)


ventana.mainloop()
