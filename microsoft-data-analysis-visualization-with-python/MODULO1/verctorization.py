""" Vectorización
Las capacidades de vectorización de NumPy cambian las reglas del juego, permitiéndole 
reemplazar bucles explícitos por operaciones concisas a nivel de array. Esto no sólo hace 
que su código sea más legible, sino que también aumenta significativamente su eficiencia, 
especialmente cuando se trata de grandes conjuntos de datos.

Imaginemos, por ejemplo, el cálculo de la variación porcentual de una serie de cotizaciones 
bursátiles. El enfoque tradicional de Python implicaría un bucle para iterar a través de cada 
precio, realizando el cálculo paso a paso. NumPy, sin embargo, le permite expresar esta 
operación de forma elegante con el corte de matrices y la aritmética: """

import numpy as np

prices = np.array([100, 105, 112, 98]) 
percentage_change = (prices[1:] - prices[:-1]) / prices[:-1] * 100

print(percentage_change)