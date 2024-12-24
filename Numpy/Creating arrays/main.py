import numpy as np

# Version
print(np.__version__)

# Declaración array
arrList = np.array([1, 2, 3, 4, 5])
arrTuple = np.array((1, 2, 3, 4, 5))

print(arrList)
print(arrTuple)
print(type(arrList))
print(type(arrTuple))

# 0-D Arrays
a = np.array(42)
print(a.ndim)

# 1-D Arrays
b = np.array([1, 2, 3, 4, 5])
print(b.ndim)

# 2-D Arrays
c = np.array([[1, 2, 3], [4, 5, 6]])
print(c.ndim)

# 3-D Arrays
d = np.array([[[1, 2, 3], [4, 5, 6]], [[1, 2, 3], [4, 5, 6]]])
print(d.ndim)

arr = np.array([1, 2, 3, 4], ndmin=5)
print(arr)
print("number of dimensions :", arr.ndim)
