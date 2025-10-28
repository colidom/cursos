""" Misaligned dimensions o Dimensiones desalineadas: Aunque a primera vista las formas parezcan 
compatibles para la difusión, la alineación de las dimensiones es clave. La difusión funciona con las 
cotas posteriores (desde la derecha), así que asegúrese de que las cotas que desea difundir están bien 
alineadas. Por ejemplo:  

123456"""

import numpy as np

arr1 = np.array([[1, 2, 3],
                 [4, 5, 6]]) # Shape: (2, 3)

arr2 = np.array([10, 20]) # Shape: (2,)

result = arr1 + arr2 # ValueError

""" Aquí, la difusión o broadcasting falla porque un usuario podría suponer que arr2 (forma (2,)) podría 
sumarse a cada columna de arr1 (forma (2, 3)), esperando que los 2 se alinearan intuitivamente. Sin embargo, 
las dimensiones finales no coinciden: 3 (de (2, 3)) frente a 2 (de (2,)), y ninguna es 1. NumPy intenta 
alinear (2, 3) con (1, 2) (anteponiendo un 1 a arr2), pero 3 frente a 2 es incompatible. Para alinear las 
dimensiones correctamente, puede introducir un nuevo eje con np.newaxis para difundir arr2 a través de las 
filas:   """

arr2_newaxis = arr2[:, np.newaxis] # Shape: (2, 1)

result = arr1 + arr2_newaxis # Shape: (2, 3)


""" Esto funciona porque arr2_newaxis (forma (2, 1)) se alinea con arr1 (forma (2, 3)): el 2 coincide, y 
el 1 se extiende a 3, dando como resultado:

[[11 12 13]

 [24 25 26]] """
