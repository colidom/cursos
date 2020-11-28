# ===================== IMPORTS =====================================
from fabulous.color import green, red, red_bg

# ===================== FUNCIONES ===================================
def is_even(n):
    if n % 2:
        return False
    else:
        return True


def read_int():
    x = input("Introduzca un número entero: ")
    return int(x)


def menu():
    exit = False
    while not exit:
        print("""
        1. Chequear si un número es par ó impar.
        2. Salir.
        """)
        option = input("")
        if option == "1":
            v = read_int()
            if is_even(v):
                print(green("El número es par!"))
            else:
                print(red("El número es impar!"))
        elif option == "2":
            print("👋🏻  Hasta luego Lucas!")
            exit = True
        else:
            print(red_bg("La opción elegida no existe!"))

# ===================== CÓDIGO ======================================
menu()
