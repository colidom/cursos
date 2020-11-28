import sys

num = int(sys.argv[1])
if num > 0:
    for i in range(2, num):
        resto = num % i
        if resto == 0:
            print("No es primo!")
            break
    else:
        print("Es primo!")
else:
    print("Error, el número introducido no es positivo")

