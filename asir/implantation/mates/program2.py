import sys
import math

x1 = int(sys.argv[1])
y1 = int(sys.argv[2])
x2 = int(sys.argv[3])
y2 = int(sys.argv[4])
x3 = int(sys.argv[5])
y3 = int(sys.argv[6])
distance1 = math.sqrt((x1 - x2) ** 2 + (y1 - y2) ** 2)
distance2 = math.sqrt((x1 - x3) ** 2 + (y1 - y3) ** 2)

if distance1 < distance2:
    print(
        "El punto más cercano a (", x1, ",", y1,
        ") es (", x2, ",", y2, ") está a una distancia de ",
        distance1
    )
else:
    print(
        "El punto más cercano a (", x1, ",", y1,
        ") es (", x3, ",", y3, ") está a una distancia de ",
        distance2
    )
