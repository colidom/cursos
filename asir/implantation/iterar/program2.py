import sys

a = int(sys.argv[1])
if a <= 0:
    print("Error, el número introducido no es positivo")
elif a > 0:
    sum = 0
    for i in range(1, a + 1):
        cuadrado = i ** 2
        sum = cuadrado + sum
    else:
        print(sum)

