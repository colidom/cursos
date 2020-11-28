from tkinter import *

ventana = Tk()
# ventana.geometry("700x500")

texto = Label(ventana, text="Bienvenido a mi programa")
texto.config(
    fg="white",
    bg="black",
    padx="200",
    pady="20",
    font=("Consolas", 30),
            )
texto.pack(side=TOP)

texto = Label(ventana, text="Soy Carlos Oliva")
texto.config(
    width=15,
    height=3,
    bg="orange",
    padx=10,
    pady=20,
    cursor="circle"
    
)
texto.pack(side=TOP, fill=X, expand=YES)

texto = Label(ventana, text="Básico 1")
texto.config(
    height=3,
    bg="green",
    padx=10,
    pady=20,
    cursor="spider"
    
)
texto.pack(side=LEFT, fill=X, expand=YES)

texto = Label(ventana, text="Básico 2")
texto.config(
    height=3,
    bg="red",
    padx=10,
    pady=20,
    cursor="spider"
    
)
texto.pack(side=LEFT, fill=X, expand=YES)

texto = Label(ventana, text="Básico 3")
texto.config(
    height=3,
    bg="pink",
    padx=10,
    pady=20,
    cursor="spider"
    
)

texto.pack(side=LEFT, fill=X, expand=YES)

ventana.mainloop()
