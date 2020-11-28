import random

NUCLEOBASES = "ATGC"
DNA_SIZE = 100
sequence = "".join([random.choice(NUCLEOBASES) for i in range(DNA_SIZE)])
adenine = sequence.count("A")
guanine = sequence.count("G")
cytosine = sequence.count("C")
thymine = sequence.count("T")

secuencia = [adenine, guanine, cytosine, thymine]
secuencia.sort()

for i in range(0, len(secuencia)):
    if secuencia[i] == adenine:
        print("Adenina: ", adenine)
    elif secuencia[i] == guanine:
        print("Guanina: ", guanine)
    elif secuencia[i] == cytosine:
        print("Cytosina: ", cytosine)
    elif secuencia[i] == thymine:
        print("Thymina: ", thymine)
