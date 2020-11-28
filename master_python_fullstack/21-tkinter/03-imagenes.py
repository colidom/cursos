from tkinter import *
from PIL import Image, ImageTk

ventana = Tk()
ventana.geometry("700x500")

Label(ventana, text="Hola, soy Carlos").pack(anchor=W)

imagen = Image.open('21-tkinter/imagenes/lobo.jpeg')
render = ImageTk.PhotoImage(imagen)

Label(ventana, image=render).pack()
ventana.mainloop()
