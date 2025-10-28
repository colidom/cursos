""" Arsenal matemático: cuidado con los errores silenciosos
Las amplias funciones matemáticas de NumPy tienen un valor incalculable, pero también pueden devolver 
silenciosamente resultados incorrectos en determinadas condiciones. Por ejemplo, al tratar con números 
de coma flotante, puede encontrarse con problemas de precisión numérica. Para ilustrarlo, considere el 
cálculo de la suma de un gran número de pequeños valores en coma flotante: """

import numpy as np

# Create an array of one million elements, each containing 0.1
small_values = np.full(1000000, 0.1)

# Summing one million .1 values should yield 100,000
sum_value = np.sum(small_values)

# Results in an incorrect value (99999.9999999998)
print(sum_value)
