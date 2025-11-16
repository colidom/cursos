import matplotlib.pyplot as plt

x = [1, 2, 3]
y1 = [4, 5, 6]
y2 = [7, 8, 9]

plt.plot(x, y1, label="Data Series 1")
plt.plot(x, y2, label="Data Series 2")

plt.legend()  # Automatically creates a legend based on labels
plt.show()
