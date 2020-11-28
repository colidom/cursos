import sys

dinero = int(sys.argv[1])

billetes_50 = dinero // 50
if billetes_50 > 0:
    print(dinero // 50, "billete/s de 50 euros")
resto = dinero % 50

billetes_20 = resto // 20
if billetes_20 > 0:
    print(resto // 20, "billete/s de 20 euros")
resto = resto % 20

billetes_10 = resto // 10
if billetes_10 > 0:
    print(resto // 10, "billete/s de 10 euros")
resto = resto % 10

billetes_5 = resto // 5
if billetes_5 > 0:
    print(resto // 5, "billete/s de 5 euros")
resto = resto % 5

monedas_2 = resto // 2
if monedas_2 > 0:
    print(resto // 2, "moneda/s de 2 euros")
resto = resto % 2

monedas_1 = resto // 1
if monedas_1 > 0:
    print(resto // 1, "moneda/s de 1 euro/s")
