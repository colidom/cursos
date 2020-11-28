from tkinter import *

ventana = Tk()
ventana.title("Marco Master en Python")
ventana.geometry("700x700")

# Marco padre TOP
marco_padre = Frame(ventana, width=250, height=250)
marco_padre.config(
    bg="lightblue"
)
marco_padre.pack(side=TOP, anchor=N, fill=X, expand=YES)

# Marco 1 dentro de marco padre TOP
marco = Frame(marco_padre, width=250, height=250)
marco.config(
    bg="red",
    bd=3,
    relief=SOLID,
)
marco.pack(side=LEFT, anchor=SW)
marco.pack_propagate(False)

texto = Label(marco, text="Primer marco")
texto.config(
    bg="red",
    fg="white",
    font=("Arial", 20),
    height=10,
    width=10,
    bd=3,
    relief=SOLID,
    anchor=CENTER
)
texto.pack()

# Marco 2 1 dentro de marco padre TOP
marco = Frame(marco_padre, width=250, height=250)
marco.config(
    bg="green",
    bd=3,
    relief=SOLID,
)
marco.pack(side=RIGHT, anchor=SE)

# Marco padre BOTTOM
marco_padre = Frame(ventana, width=250, height=250)
marco_padre.config(
    bg="lightblue"
)
marco_padre.pack(side=BOTTOM, anchor=S, fill=X, expand=YES)


# Marco 3 dentro de marco padre BOTTOM
marco = Frame(marco_padre, width=250, height=250)
marco.config(
    bg="blue",
    bd=3,
    relief=SOLID,
)
marco.pack(side=LEFT)

# Marco 4 dentro de marco padre BOTTOM
marco = Frame(marco_padre, width=250, height=250)
marco.config(
    bg="orange",
    bd=3,
    relief=SOLID,
)
marco.pack(side=RIGHT)

ventana.mainloop()
