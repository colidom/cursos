import sys

num = int(sys.argv[1])
letras = "TRWAGMYFPDXBNJZSQVHLCKE"

letra = num % 23
num_letra = letras[letra]
print(f"{num}{num_letra}")
