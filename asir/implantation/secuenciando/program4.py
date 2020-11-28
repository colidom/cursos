import sys

listanum = sys.argv[1:]
total = len(listanum)
suma = 0

for i in range(0, total):
        suma += float(listanum[i])
media = suma / total
print(f"La media de los valores es: {media}")
