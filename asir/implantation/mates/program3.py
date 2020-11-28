import sys

nota = float(sys.argv[1])

if nota < 0 or nota > 10:
    print("Error: nota no se encuentra entre 0 y 10")
elif nota < 5:
    print("Suspenso")
elif nota >= 5 and nota < 7:
    print("Aprobado")
elif nota >= 7 and nota < 9:
    print("Notable")
elif nota >= 9 and nota < 10:
    print("Sobresaliente")
elif nota == 10:
    print("Matrícula de honor")
